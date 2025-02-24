<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Mail; 
//use App\Openpay; 
use Illuminate\Http\Request;

class Files extends BaseController 
{	      



  public function try() {
    echo asset('tryRoute'); 
  }

  


    public function getFromComercia( $id ) {
      

$url = "https://comerciagold.com/service/Service1.svc/api/woocommerce/getDetailItem";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "Content-Type: text/plain",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "idSecurity": "a13aae427b2e4a7e9a3d6244f71b1827881364974937478172",
  "idClient": "5bce1187c1684bc18ee9d4eb6ed7fb5c182707971349279674",
  "sku": "$id",
  "almacen": 15,
  "moneda": "MXN",
  "idCustomer": 1,
  "convertirPz": true 
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl); 
print_r(($resp));

}

    public function app() {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=begima-app.apk");
        header("Content-Type: application/apk");
        header("Content-Transfer-Encoding: binary");
        // Read the file 
        readfile(public_path().'/app-begima.apk');
        header("Location: https://www.begima.com.mx");
        exit;
    }

    public function cargarImagenMins( Request $request ) {
        ini_set('memory_limit', '2048M'); 
        $_id_ = $request->input('id');
        $idimg = $request->input('idimg');
        $path = public_path().'/thumbnails/';  

        $files = $request->file('avatar'); 
        $fileName = $files->getClientOriginalName();
        $files->move($path, $fileName); 
        $base_url = asset("/thumbnails/".$fileName); 

        $files2 = $request->file('avatar2'); 
        $fileName2 = $files2->getClientOriginalName();
        $files2->move($path, $fileName2); 
        $base_url2 = asset("thumbnails/".$fileName2); 

        $files3 = $request->file('avatar3'); 
        $fileName3 = $files3->getClientOriginalName();
        $files3->move(public_path().'/cropped/', 'cropped-'.$fileName3); 
        $base_url3 = asset("/cropped/"."cropped-".$fileName3); 

        DB::select("UPDATE nissan_nparte2 SET small_img = '$base_url', medium_img = '$base_url2' WHERE id = $_id_");  

        DB::select("UPDATE nissaan_galeria SET link = '$base_url3' WHERE id = $idimg"); 
        echo $base_url3; 
    }

    public function cargarImagen( Request $request ) {
        ini_set('memory_limit', '2048M');
 
        $_id_ = $request->input('id');

        $path = public_path().'/gallery/';  
        $files = $request->file('avatar');
        $fileName = $files->getClientOriginalName();
        $files->move($path, $fileName);
        $base_url = asset('/gallery/'.$fileName);    
        DB::select("UPDATE nissan_nparte2 SET url_textura = '$base_url' WHERE id = $_id_"); 
        echo $base_url; 
    }
  
      public function uploadBrand(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/media/brands/'; 
            $fileName = uniqid() . $file->getClientOriginalName();

            $file->move($path, $fileName);
             
            $link      = asset("/media/brands/".$fileName);  
            $idslider = $request->input('idProuct');        
             
            DB::select("UPDATE nissan_marcas SET img = '$link' WHERE id = $idslider"); 
            echo $link;    
        }


        function getPath() {
          $path = str_replace('\\', '/', public_path()); 
            $path = str_replace("C:/xampp/htdocs", "", $path);  
            return $path; 
        }

      public function uploadBlock(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/media/blocks/'; 
            $fileName = uniqid() . $file->getClientOriginalName();

            $file->move($path, $fileName);
             
            $link      = $this->getPath()."/media/blocks/".$fileName;  
            $idslider = $request->input('idProuct');        
            
            DB::select("UPDATE nissan_config SET content = '$link' WHERE id = $idslider"); 
            echo $link;    
        }

    	public function uploadPhotoSlider(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/media/sliders/'; 
            $fileName = uniqid() . $file->getClientOriginalName();
 
            $file->move($path, $fileName);
            
            $link      = asset("/media/sliders/".$fileName);  
            $idslider = $request->input('idProuct');        
 
            DB::table('config_slider_element')->insert(['id_slider' => $idslider, 'url' => $link, 'status' => 0 ]); 
                          
            echo $link;   
        }

        public function uploadPhoto(Request $request) {
            $file = $request->file('file');
            $path = public_path(); 
            $fileName = uniqid() . $file->getClientOriginalName();

            $file->move($path, $fileName);
            
            $link      = asset($fileName);  
            $idProduct = $request->input('idProuct');        

            $nparte = DB::select("SELECT * FROM nissan_nparte2 WHERE id = $idProduct")[0]->nparte; 
            //DB::select("UPDATE nissan_nparte2 SET img = '$link' WHERE nparte = '$nparte'"); 
   
            DB::table('nissaan_galeria')->insert(['link' => $link, 'id_product' => $idProduct, 'status' => 1 ]); 
                        
            echo $link;   
        }

        public function createFeed() {
        	set_time_limit(200000000);
            ini_set('memory_limit', '1024M'); 
			include_once 'PHPExcel.php';


			$products = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte"); 

			$headers = array(
				array("description" => "# Obligatorio | Identificador de contenido único del artículo", "title" => "id", "column" => "A"), 
				array("description" => "# Obligatorio | Título específico y relevante para el artículo.", "title" => "title", "column" => "B"), 
				array("description" => "# Obligatorio | A short and relevant description of the item.", "title" => "description", "column" => "C"), 
				array("description" => "# Obligatorio | The current availability of the item. ", "title" => "availability", "column" => "D"), 
				array("description" => "# Obligatorio | The condition of the item. ", "title" => "condition", "column" => "E"), 
				array("description" => "# Obligatorio | Precio del artículo.", "title" => "price", "column" => "F"), 
				array("description" => "# Obligatorio | URL de la página del producto específica donde las personas pueden comprar el artículo.", "title" => "link", "column" => "G"), 
				array("description" => "# Obligatorio | URL de la imagen principal de tu artículo. ", "title" => "image_link", "column" => "H"), 
				array("description" => "# Obligatorio | Marca del artículo. En su lugar; también puedes ingresar un número único", "title" => "brand", "column" => "I"), 
				array("description" => "# Opcional | Categoría de productos de Google para el artículo.", "title" => "google_product_category", "column" => "J"), 
				array("description" => "# Opcional | Categoría de productos de Facebook para el artículo.", "title" => "fb_product_category", "column" => "K"), 
				array("description" => "# Opcional | The quantity of this item you have to sell on Facebook and Instagram with checkout.", "title" => "quantity_to_sell_on_facebook", "column" => "L"), 
				array("description" => "# Opcional | Precio con descuento del artículo si está en oferta.", "title" => "sale_price", "column" => "M"), 
				array("description" => "# Opcional | Intervalo del período de oferta;", "title" => "sale_price_effective_date", "column" => "N"), 
				array("description" => "# Opcional | Use this field to create variants of the same item.", "title" => "item_group_id", "column" => "O"), 
				array("description" => "# Opcional | Sexo de las personas a las que se dirige el artículo.", "title" => "gender", "column" => "P"), 
				array("description" => "# Opcional | Color del artículo. Usa una o más palabras para describir el color.", "title" => "color", "column" => "Q"), 
				array("description" => "# Opcional | Tamaño o talle del artículo escrito como una palabra; ", "title" => "size", "column" => "R"), 
				array("description" => "# Opcional | Grupo de edad de las personas a las que se dirige el artículo.", "title" => "age_group", "column" => "S"), 
				array("description" => "# Opcional | The material the item is made from;", "title" => "material", "column" => "T"), 
				array("description" => "# Opcional | The pattern or graphic print on the item. Character limit: 100.", "title" => "pattern", "column" => "U"), 
				array("description" => "# Opcional | Detalles de envío del artículo; con el siguiente formato:", "title" => "shipping", "column" => "V"), 
				array("description" => "# Opcional | Peso del envío del artículo. Incluye la unidad de medida (lb/oz/g/kg).", "title" => "shipping_weight", "column" => "W"), 
			);  

 		  	 $objPHPExcel = new \PHPExcel(); 
		    $objPHPExcel->
		      getProperties()
		        ->setCreator("Begima")
		        ->setLastModifiedBy("Begima")
		        ->setTitle("Begima")
		        ->setSubject("Begima")
		        ->setDescription("Begima") 
		        ->setKeywords("Begima") 
		        ->setCategory("Begima"); 

		        foreach( $headers as $head ) {
		        	$objPHPExcel->getActiveSheet()->SetCellValue($head["column"]."2", $head["title"]);
		        	$objPHPExcel->getActiveSheet()->SetCellValue($head["column"]."1", utf8_encode($head["description"]));
		        }

			    $i = 2; 
		        foreach( $products as $product ) {
		        	$i++; 
			        $objPHPExcel->setActiveSheetIndex(0)
	                                ->setCellValue('A'.$i, $product->id) 
	                                ->setCellValue('B'.$i, $product->title)
	                                ->setCellValue('C'.$i, $product->title)
	                                ->setCellValue('D'.$i, 'in stock')
	                                ->setCellValue('E'.$i, 'new')
	                                ->setCellValue('F'.$i, $product->price)
	                                ->setCellValue('G'.$i, "https://begima.com.mx/producto/".$product->nparte."/pack/0")
	                                ->setCellValue('H'.$i, $product->img)
	                                ->setCellValue('I'.$i, "begima")
	                                ->setCellValue('J'.$i, "Apparel & Accessories > Clothing")
	                                ->setCellValue('K'.$i, "Clothing & Accessories > Clothing")
	                                ->setCellValue('L'.$i, $product->existencia)
	                                ->setCellValue('M'.$i, $product->price)
	                                ->setCellValue('N'.$i, $product->price)
	                                ->setCellValue('O'.$i, "")
	                                ->setCellValue('P'.$i, "female")
	                                ->setCellValue('Q'.$i, "black")
	                                ->setCellValue('R'.$i, "M")
	                                ->setCellValue('S'.$i, "adult")
	                                ->setCellValue('T'.$i, "cotton")
	                                ->setCellValue('U'.$i, "stripes")
	                                ->setCellValue('V'.$i, "")
	                                ->setCellValue('W'.$i, "2 kg")
	                                ; 
		        }

		    $objPHPExcel->getActiveSheet()->setTitle('productos_catalogo');
		    $objPHPExcel->setActiveSheetIndex(0);
		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment;filename="productos-catalogo-'.date("Y-m-d").'.csv"; charset=utf-8');
		    header('Cache-Control: max-age=0'); 
		     
		    $objWriter= \PHPExcel_IOFactory::createWriter($objPHPExcel,'CSV');
		    $objWriter->save(dirname(__FILE__)."/ventas.csv");
		    $objWriter->save('php://output');
        }
        
        public function compyImgTo( Request $data ) {
          $id = $data->input('toId');
          $link = $data->input('link'); 
          DB::select("INSERT INTO nissaan_galeria(link, id_product, status, order_img) VALUES('$link', $id, 1, 2)"); 
        }

        public function borrarFoto( Request $request) {
          $idImg = $request->input('idImg'); 
          DB::select("DELETE FROM nissaan_galeria WHERE id = $idImg"); 
        }

        public function wp_setTallas() {
          $str_tallas = " Meses, 10 a 14, 10 Años, 10-12 Años, 11, 12 Años, 12 Meses, 12-14, 13, 13-18, 14 a 16, 15, 16, 18 Meses, 1X - 2X, 2 a 4, 2 Años, 2-4 Años, 24 meses, 26A, 28, 28 a 32, 28 a 34, 28 a 36, 28A, 2X, 2X - 3X, 3 Años, 3 Meses, 3-5, 30, 30A, 32, 32 a 36, 32A, 32B, 34, 34 a 36, 34A, 34B, 34C, 34D, 34DD, 36, 36 a 40, 36A, 36B, 36C, 36D, 36DD, 38B, 38C, 38D, 38DD, 3X, 3XL, 4 a 6, 4 Años, 40 a 44, 40B, 40C, 40D, 40DD, 42D, 42DD, 44D, 44DD, 4X, 4XL, 5, 5 a 7, 5 Años, 6 Años, 6 Meses, 6-8, 6-8 Años, 6X Años, 7, 7 a 9, 7 Años, 8 a 12, 8 Años, 9, 9 Meses, 9-12, B, C, D, L, L 40-42, L|XL, M, M 36-38, M/L, S, S/M, S|M, Talla 11, Talla 13, Talla 15, Talla 2, Talla 3, Talla 4, Talla 5, Talla 6, Talla 7, Talla 9, Unitalla, XL, XL 44-46, XS, XS 32-34, XXL"; 
          $arr_tallas = explode(",", $str_tallas); 
          echo "<h1>".count($arr_tallas)."</h1>"; 
          DB::select("DELETE FROM nissan_tallas"); 
          foreach ($arr_tallas as $key => $talla) {
            $talla = trim($talla); 
            DB::select("INSERT INTO nissan_tallas(name, orden) VALUES('$talla', 1)"); 
            echo $talla; 
          }
        }

        public function wp_getCategories() {
            $cats = DB::connection('begima')->select("SELECT * FROM wp_term_relationships LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id) LEFT JOIN wp_terms on wp_term_taxonomy.term_taxonomy_id = wp_terms.term_id WHERE wp_term_taxonomy.taxonomy = 'product_cat' GROUP BY wp_term_taxonomy.term_id"); 
            foreach ($cats as $key => $cat) {
              $term_id = $cat->term_id; 
              $parent  = $cat->parent;
              $name    = $cat->name;  
              $slug    = strtolower(str_replace(" ", "-", $cat->name));             
              DB::table('nissan_categorias')->insert([
                'title'     => $name, 
                'id_parent' => $parent,
                'slug'      => $slug, 
                'title'     => $name, 
                'id'        => $term_id 
              ]); 
            }
        }
        
        public function WP() { 
             
            $posts = DB::connection('begima')->select(" SELECT 
                                                          p.ID,
                                                          p.post_title,
                                                          `post_content`,
                                                          `post_excerpt`,
                                                          t.name AS product_category,
                                                          t.term_id AS product_id,
                                                          t.slug AS product_slug,
                                                          tt.term_taxonomy_id AS tt_term_taxonomia,
                                                          tr.term_taxonomy_id AS tr_term_taxonomia,
                                                          MAX(CASE WHEN pm1.meta_key = '_price' then pm1.meta_value ELSE NULL END) as price,
                                                          MAX(CASE WHEN pm1.meta_key = '_regular_price' then pm1.meta_value ELSE NULL END) as regular_price,
                                                          MAX(CASE WHEN pm1.meta_key = '_sale_price' then pm1.meta_value ELSE NULL END) as sale_price,
                                                          MAX(CASE WHEN pm1.meta_key = '_sku' then pm1.meta_value ELSE NULL END) as sku 
                                                        FROM wp_posts p 
                                                        LEFT JOIN wp_postmeta pm1 ON pm1.post_id = p.ID
                                                        LEFT JOIN wp_term_relationships AS tr ON tr.object_id = p.ID
                                                        JOIN wp_term_taxonomy AS tt ON tt.taxonomy = 'product_cat' AND tt.term_taxonomy_id = tr.term_taxonomy_id 
                                                        JOIN wp_terms AS t ON t.term_id = tt.term_id
                                                        WHERE p.post_type in('product', 'product_variation') AND p.post_status = 'publish' AND p.post_content <> ''
                                                        GROUP BY p.ID,p.post_title");
            foreach( $posts as $post ) {
                $title    = $post->post_title; 
                $content  = $post->post_content; 
                $detail   = $post->post_excerpt; 
                $category = $post->product_category; 
                $price    = $post->price; 
                $sku      = $post->sku; 
                 
                $image = "/2020/09/FRENTE-2-370x370.jpg"; 
                 
                echo "<h1>$sku</h1>";  
                
                DB::table('nissan_nparte2')->insert(['nparte' => $sku, 'title' => $title, 'descripcion' => $content, 
                                                     'info' => $detail, 'categoriabase' => $category, 'price' => $price, 'img' => $image]);
                //return; 
                                
            }  
            
            return; 
          
            print_r($users); 
        }
        
		public function getParts() { 
      //14 
			$parts = DB::table('nissan_sources')->where(['id' => 15])->limit(20)->get(); 
  
			print_r( json_encode($parts) );     
		} 
    
 		public function test() {  

 			set_time_limit(200000000);
            ini_set('memory_limit', '1024M'); 
  
 		   $name_xls = 'npartes-500.xls';  
 		  include_once 'PHPExcel.php';
 		  include_once 'PHPExcel.php';
          $path = public_path().'/uploads/'.$name_xls;

          $data_json = array(); 
          $data_row = array(); 

          $xls_file = $path; 
         
          if (file_exists($xls_file)) {
            $Reader = \PHPExcel_IOFactory::createReaderForFile($xls_file); 
            $Reader->setReadDataOnly(true);
            $objXLS = $Reader->load($xls_file); 

              foreach ($objXLS->getWorksheetIterator() as $worksheet) {
                $highestRow         = $worksheet->getHighestRow();
                $highestColumn      = $worksheet->getHighestColumn();
                $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
                  $nrColumns = ord($highestColumn) - 64;
                        for ($row = 1; $row <= $highestRow; ++ $row) {
                            $data_row = []; 
                            for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                                 $val = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                                 $val_= $worksheet->getCellByColumnAndRow($col, 1)->getValue(); 

                                 if( trim($val_) == "Concepto / Referencia Interbancaria" || trim($val_) == "Concepto")
                                   $data_row["concepto"] = trim(str_replace("--,", "", str_replace("- ,", "",  str_replace('<h4 class="text-danger">No analogs found</h4>,', "" ,str_replace("\n", "", $val) ))));

                                  else   if( trim($val_) == "Cargo/Abono")
                                   $data_row["CargoAbono"] = trim(str_replace("--,", "", str_replace("- ,", "",  str_replace('<h4 class="text-danger">No analogs found</h4>,', "" ,str_replace("\n", "", $val) ))));    

                                 else 
                                 $data_row[trim(str_replace(" ", "_", $val_))] = trim(str_replace(" ", "", str_replace("- ,", "",  str_replace('<h4 class="text-danger">No analogs found</h4>,', "" ,str_replace("\n", "", $val) ))));    

                            }
                              $data_json[] = array($data_row); 
                        } 
              }
          } else {
            echo "No existe"; 
          }
          //return ( json_encode( $data_json ) );

          foreach ($data_json as $key => $value) {
          	$nparte = $value[0]['N_PARTE']; 
          	$desc   = $value[0]['SCRIPCION'];   
          	if( $nparte != 'B2401EW61JNW') {
          			DB::table('nissan_nparte2')->insert(['nparte' => $nparte, 'descripcion' => $desc, 'img' => 0]); 
          	}
          }

 		}
  
} 
