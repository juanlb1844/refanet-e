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

class ImportController extends BaseController 
{	      


	function get_http_response_code($url) {
	    $headers = get_headers($url);
	    return substr($headers[0], 9, 3); 
	}

	function getPath() {
		$path = str_replace('\\', '/', public_path()); 
    	$path = str_replace("C:/xampp/htdocs", "", $path);  
    	return $path; 
	}

	public function importOdoo() {
		return view("admin/importProductsSources", []); 
	}

    public function import( Request $request ) {
 
	    $row = 1; 
	    if (($handle = fopen(dirname(".")."/morsa/total.csv", "r")) !== FALSE) {
	      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        echo "<br>"; 

	        if( $data[0] == "FAMILIA" ) {
	        	$fam = $data[1]; 
	        }

	        if( $data[0] != "FAMILIA" AND $data[0] != "MARCA") {
	        	$_sku   = $data[0];  
	        	$_title = $data[1];  
	        	$_price = $data[3]; 

	        	if ( !$this->existCat($fam) ) {
	        		$idCat = $this->createCat($fam); 
	        	} else {
	        		$idCat = $this->getCat($fam);  
	        	}

	        	$_price = str_replace("$", "", str_replace(",", "", $_price), $_price); 
	        	$_price = floatval($_price);  
	        	$url = "https://www.radec.com.mx/sites/all/files/productos/".$_sku.".jpg"; 
	        	//echo '<img src="'.$url.'">'; 
	        	echo $fam;   
	        	$img = "morsa/".$_sku.".jpg"; 
 
	        	if( $this->get_http_response_code($url) != "404") {
	        		//file_put_contents($img, file_get_contents($url));
	        		$path = $this->getPath();     
	        		$this->newProduct(100, $_sku, $_price, $_title, 1, $_title, $_title, $path."/morsa/".$_sku.".jpg", array($idCat), "radec");  
	        	} else {
	        		echo "<h1>No existe</h1>";  
	        	} 
	        	 
	        }
	        if( $row == 200 ) { 
	        	die(); 
	        }
	      }
	      fclose($handle);
	    }
    } 

    public function createCat( $catName ) {
    	$catName = strtolower($catName); 
    	DB::table('nissan_categorias')->insert(['title' => $catName, 'slug' => $catName, 'id_parent' => 0]);  
    	$idCat = DB::getPdo()->lastInsertId();  
    	return $idCat;  
    }

    public function existCat( $catName ) {
    	$catName = strtolower($catName); 
    	$cat = DB::select("SELECT * FROM nissan_categorias WHERE title = '$catName'"); 
    	$resp = false; 
    	if( count($cat) ) {
    		$resp = true; 
    	}
    	return $resp;  
    }

    public function getCat( $catName ) { 
    	$catName = strtolower($catName); 
    	$cat = DB::select("SELECT * FROM nissan_categorias WHERE title = '$catName'"); 
    	return $cat[0]->id;    
    }


    public function newProduct( $existencia, $sku, $product_price, $title, $status_product, $desc_short, $long_desc, $img_base, $cats, $g) {

        $product_price_1 = 0; 
        $product_price_2 = 0; 
        $product_price_3 = 0;
        $product_price_4 = 0; 
        $product_price_5 = 0;  

        $comercial_id    = 0; 
        $id_marca 	     = 1;
        $id_familia 	 = 1; 
        $promo_price     = 0; 
        $checkPromo      = 0; 
        $check_precios   = 0; 
        $video           = ""; 

        DB::select("INSERT INTO `nissan_nparte2` (`nparte`, `descripcion`, `img`, `altnp`, `namesite`, `price`, `categoriabase`, `title`, `info`, `genero`, `composicion`, `material`, `tipo`, `cantidad`, `paquete`, `portada`, `detalle_tallas`, `tipo_producto`, `id_marca`, `id_familia`, `descripcion_corta`, `existencia`, `precio_especial_1`, `precio_especial_2`, `precio_especial_3`, `precio_especial_4`, status_post, id_interno, precio_promocional, check_promo, check_precios, video_yt, small_img, grupo_productos) VALUES ('$sku', '$long_desc', '', '', '', $product_price, '10', '$title', '', '', '', '', '', '', 0, '0', NULL, NULL, $id_marca, $id_familia, '$desc_short', $existencia, $product_price_1, $product_price_2, $product_price_3, $product_price_4, $status_product, '$comercial_id', $promo_price, $checkPromo, $check_precios, '$video', '$img_base', '$g');");      
        $id_product = DB::getPdo()->lastInsertId();   
 
        DB::select("INSERT INTO `nissaan_galeria` (`link`, `id_product`, `status`) VALUES ('$img_base', '$id_product', '1');"); 

        echo $id_product;  
  	
  		 
	      foreach ($cats as $key => $cat) { 
	      	if( $cat ) {
	        	DB::select("INSERT INTO nissan_categorias_productos (id_producto, id_categoria) VALUES($id_product, $cat)"); 
	      	}
	      }   

    } 

    // -- ------------------------------------------------ 


    function searchLocal( $route, $keyword ) {
    	//$files = scandir('./dealers/morsa/'); 
    	$found_files = []; 
    	$files = scandir($route);  
		foreach ($files as $file) { 
		    //$keyword = '013-311-2951-ASIA'; 
		     if (preg_match('/'.$keyword.'/i', $file)) { 
            	$found_files[] = $file; 
        	} 
		}  
		return $found_files; 
    }

    function fitsDbCheck( $fits ) {
		 
		/* 
    	if( $fits ) {
    		print_r( json_encode($fits) ); 
		} */  
		$id_motor = array(); 

    	if( $fits ) {
	    	foreach ($fits as $key => $fit) {
	    		$brand  = $fit->marca; 
	    		$brand  = strtolower($brand); 
	    		$modelo = strtolower($fit->modelo); 
	    		$year   = strtolower($fit->anio); 
	    		$engine = strtolower($fit->motor); 
 
	    		$brand_search = DB::select("SELECT * FROM fit_brand WHERE title_model = '$brand'"); 
	    		$id_brand = 0;  
	    		if( count($brand_search) < 1 ) { 
	    			DB::select("INSERT INTO fit_brand(title_model) VALUES('$brand')");  
	    			$id_brand = DB::getPdo()->lastInsertId();  
	    		} else {
	    			$id_brand = $brand_search[0]->id_fit_model;  
	    		}
 				 
	    		$model_search = DB::select("SELECT * FROM fit_model WHERE title_model = '$modelo' AND id_parent = $id_brand");  
	    		$id_model = 0; 
	    		if( count( $model_search) < 1 ) { 
	    			DB::select("INSERT INTO fit_model(title_model, id_parent) VALUES('$modelo', $id_brand)");  
	    			$id_model = DB::getPdo()->lastInsertId();  
	    		} else {
	    			$id_model = $model_search[0]->id_fit_model; 
	    		}

	    		$year_search = DB::select("SELECT * FROM fit_model FM INNER JOIN fit_year FY ON FM.id_fit_model = FY.id_parent WHERE FM.id_fit_model = $id_model AND FY.title_model = '$year'"); 
	    		$id_year = 0;
	    		if( count( $year_search) < 1 ) { 
	    			DB::select("INSERT INTO fit_year(title_model, id_parent) VALUES('$year', $id_model)");  
	    			$id_year = DB::getPdo()->lastInsertId();  
	    		} else { 
	    			$id_year = $year_search[0]->id_fit_model; 

	    		} 
  				 
	    		$engine_search = DB::select("SELECT FE.id_fit_model FROM fit_engine FE INNER JOIN fit_year FY ON FE.id_parent = FY.id_fit_model WHERE FY.id_fit_model = $id_year AND FE.title_model = '$engine'");  
  				    
	    		   
	    		if( count( $engine_search) < 1 ) { 
	    			DB::select("INSERT INTO fit_engine(title_model, id_parent) VALUES('$engine', $id_year)");  
	    			$id_motorid = DB::getPdo()->lastInsertId();  
	    		} else { 
	    			$id_motorid = $engine_search[0]->id_fit_model; 
	    		}   
	    		//return; 
	    		$id_motor[] = $id_motorid; 
 	    		echo "<p>".$id_motorid."</p>"; 
	    	}
    	}
    	return $id_motor; 
    }

    function insertRelation( $relations, $sku ) {

    	//print_r( $sku ); die(); 
    	$id_product = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$sku'")[0]->id; 

    	foreach ($relations as $key => $relation ) {
    		//print_r( $relation );   
    		DB::select("INSERT INTO fit_relation_nparte(id_nparte, id_fit) VALUES($id_product, $relation)");  
    		//die(); 
    	}
    }

    function postInSite( $product, $img ) {
    	$path = $this->getPath();     
    	$fam = $product->categoria; 

    	if ( !$this->existCat($fam) ) {
    		$idCat = $this->createCat($fam); 
    	} else {
    		$idCat = $this->getCat($fam);  
    	}   

    	$_price = 0; 
    	if( $product->precio ) {
    		$_price = $product->precio; 
    	}


    	$layout = $this->createHtml( $this->reformatArray( $product->aplicacion ) ); 
    	    
    	$this->newProduct(100, $product->sku, $_price, $product->descripcion, 1, $product->descripcion, $layout, $path.$img, array($idCat), "gmm");   

    	$relation = $this->fitsDbCheck( $product->aplicacion ); 
    	if( $relation ) {  
    		$this->insertRelation( $relation, $product->sku ); 
    		echo "<p>insertar</p>";  
    	}
    }


    function downLoadImg() {
    	$default_img = "default-img-no-img.jpg";  
		$products = $this->getProductsOdoo(1); 
		$ii = 0; 
		foreach ( json_decode($products)->products as $key => $product ) {
			 
				if( ! str_contains($product->sku, "/") ) {
					print_r(  $product->sku ); 
					echo "<p>||</p>"; 
					echo $key;   
					if( count($this->searchLocal("./dealers/morsa/", $product->sku)) < 1 ) {
						$_this_img = $this->downloadPhoto($product->sku, "dealers/morsa"); 
					} else { 
						$img_main = $this->searchLocal("./dealers/morsa/", $product->sku)[0]; 
						echo "<h4>Existe foto</h4>";  
					}
				}  
				$ii++; 
				if( $ii == 100 ) {
					die(); 
				}
			}

		print_r( json_encode( json_decode($products)->products[0] ) ); 
    }

	function testImportOdooTest() {
 		$default_img = "default-img-no-img.jpg";  
		$products = $this->getProductsOdoo(1000); 
		$ii = 0;  
		foreach ( json_decode($products)->products as $key => $product ) {
			
			if( $ii > 100 ) { 
   				 
   				 /*  
   				if( $product->aplicacion ) {
					$this->postInSite( $product, "/dealers/".$default_img ); 
   				} */  
				 
				if( ! str_contains($product->sku, "/") ) {
					print_r(  $product->sku ); 
					echo "<p>||</p>"; 
					echo $key;   
					if( count($this->searchLocal("./dealers/morsa/", $product->sku)) < 1 ) {
						$_this_img = $this->downloadPhoto($product->sku, "dealers/morsa"); 
						if( $_this_img ) {
							$this->postInSite( $product, "/".$_this_img );   
						} else { 
							$this->postInSite( $product, "/dealers/morsa/".$default_img );  
						} 
					} else { 
						$img_main = $this->searchLocal("./dealers/morsa/", $product->sku)[0]; 
						$this->postInSite( $product, "/dealers/morsa/".$img_main ); 
						echo "<h4>No buscar</h4>"; 
					}
				} else {
					$this->postInSite( $product, "/dealers/".$default_img );  
				}    
			}
 
			$ii++;  
			if( $ii == 200 ) { 
				die(); 
			}
		}
		print_r( json_encode( json_decode($products)->products[0] ) ); 
	}


    function getProductsOdoo( $to ) {
		  $curl = curl_init(); 
		  
		  curl_setopt_array($curl, array(  
		    CURLOPT_URL => 'http://3.80.83.130:3001/api/products/'.$to.'/paginated',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => '',
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 0,
		    CURLOPT_FOLLOWLOCATION => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => 'GET',
		    CURLOPT_HTTPHEADER => array(
		      'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJBcGkgQ3VzdG9tZXIgU2VydmljZSIsImF1ZCI6Ind3dy5zZXJ2ZXIuY29tIiwic3ViIjoiam1vbmRyYWdvbkBzZXJ2ZXIuY29tIiwiR2l2ZW5OYW1lIjoiSm9yZ2UiLCJTdXJuYW1lIjoiTW9uZHJhZ29uIiwiRW1haWwiOiJqbW9uZHJhZ29uQG1vcnNhLmNvbSIsIlJvbGUiOlsiTWFuYWdlciIsIlByb2plY3QgQWRtaW5pc3RyYXRvciJdfQ.U1kxpdTda60BTmNcNebzxdxWw4k8TanJShfdtHW6CuYChfAZPdDk6AVkUkK92T6ZGq8cZl7KOcm87IzMoj1_tw'
		    ),
		  )); 

		  $response = curl_exec($curl);

		  curl_close($curl);

		  $response = ($response);  
		  return  ($response); 
	}

	    function getProductsOdooBy( $sku ) {
		  $curl = curl_init(); 
		  
		  curl_setopt_array($curl, array(    
		    CURLOPT_URL => 'http://3.80.83.130:3001/api/products/'.$sku.'/search',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => '',
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 0,
		    CURLOPT_FOLLOWLOCATION => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => 'GET',
		    CURLOPT_HTTPHEADER => array(
		      'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJBcGkgQ3VzdG9tZXIgU2VydmljZSIsImF1ZCI6Ind3dy5zZXJ2ZXIuY29tIiwic3ViIjoiam1vbmRyYWdvbkBzZXJ2ZXIuY29tIiwiR2l2ZW5OYW1lIjoiSm9yZ2UiLCJTdXJuYW1lIjoiTW9uZHJhZ29uIiwiRW1haWwiOiJqbW9uZHJhZ29uQG1vcnNhLmNvbSIsIlJvbGUiOlsiTWFuYWdlciIsIlByb2plY3QgQWRtaW5pc3RyYXRvciJdfQ.U1kxpdTda60BTmNcNebzxdxWw4k8TanJShfdtHW6CuYChfAZPdDk6AVkUkK92T6ZGq8cZl7KOcm87IzMoj1_tw'
		    ),
		  )); 

		  $response = curl_exec($curl);

		  curl_close($curl);

		  $response = ($response);  
		  return  ($response); 
	}


 
	public function showOdooProducts() { 
		return view("admin/odooList"); 
	}

	public function searchImgInSite( $word ) {
		$search = $this->searchLocal("./dealers/morsa/", $word); 
		print_r( json_encode($search) ); 
	}

	public function downLoadImgOne( $sku ) { 

			$search = $this->searchLocal("./dealers/morsa/", $sku); 
			foreach ($search as $key => $item) {
				unlink("dealers/morsa/".$item);  
			} 
			$this->downloadPhoto(trim($sku), "dealers/morsa"); 
	}
 
	public function downloadPhoto( $sku, $ruta = "morsa") {  
		$img = null; 
		$token = 'eyJ0eje$oXAiOiJ_dE5KCC1QiLCJhbGciOi21U|z0Pe$I1NiJ'; 
    	$url = 'https://storage.grupomorsa.com/api/inv-imagenes/index/0?clvArticulo='.$sku.'&Authorization='.$token; 

    	$respHttp = $this->get_http_response_code($url); 
       
 		var_dump($respHttp); 
 		  
 		if(  $respHttp == "200" ) {
			    
 			$ch = curl_init($url); 
 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$imageContent = curl_exec($ch); 

			$extension = curl_getinfo($ch, CURLINFO_CONTENT_TYPE); 
			if( $extension == "image/png") {
				$img = $ruta."/".$sku.".png"; 
			} else { 
				$img = $ruta."/".$sku.".jpg";  
			}
 
			file_put_contents($img, $imageContent);
			curl_close($ch);
 
			$path = $this->getPath();     
			echo "<p>".$sku."</p>";  
		} else {
			echo "<h2>No existe</h2>";  
		} 
	    return $img;  
	}

 




	// 
		// FORMAT 
	//

	function reformatArray( $fix_arr ) {
		  $marcas = array(); 

		  if( $fix_arr ) {
			  foreach ($fix_arr as $key => $fix) {
			    if ( $this->searchInSimple( $marcas, $fix->marca ) == false ) {
			          $marcas[] = array( "name" => $fix->marca, "models" => Array() ); 
			    }
			  }
		  }  

		  $marcas_ = $marcas; 
		  //print_r($fix_arr); return;
		  foreach ($marcas as $key_marca => $marca) {
		      $marcas[$key_marca]['models'] = $this->searchInBrands( $fix_arr, $marca['name'] ); 
		  }

		  //print_r(json_encode( $marcas) );  return; 
		  $brand = ""; 
		  foreach ($marcas as $key_m => $m) {
		    $brand = $m['name']; 
		    foreach ($m['models'] as $key => $model) {
		       foreach ( $model as $k => $m_ ) {
		         $marcas[$key_m]["models"][$key]["motores"] = $this->searchInModels($brand, $m_, $fix_arr); 
		       } 
		     } 
		  }

		   //print_r( json_encode( $marcas ) ); return; 
		   $brand = ""; 
		   foreach ($marcas as $key_m => $m) {
		    $brand = $m['name']; 
		    foreach ($m['models'] as $key => $model) {
		       foreach ( $model as $k => $m_ ) {
		           foreach ($model['motores'] as $key_ => $value) {
		             $marcas[$key_m]["models"][$key]["motores"][$key_]["anios"][] = $this->searchInAnios($brand, $m_, $value['name'], $fix_arr); 
			           } 
			       } 
			     } 
			  }
	  
	 	return ( $marcas );  
	} 


	function createHtml( $array ) {
		  $table = "<style> table, td { border: 1px solid #c1c1c1; } </style>"; 
		  $table .= "<table> <thead> <tr> <th> <span>MARCAS</span> </th> <th> <span>MODELOS</span> </th> <th> <span>MOTORES</span> </th>  <th> <span>AÑOS</span> </th> </tr> </thead> <tbody>";  
		        foreach ($array as $k => $fix) { 
		          foreach( $fix['models'] as $m => $model ) {

		            foreach ($model['motores'] as $e => $motor) {
		               $table.= "<tr><td><span>".$fix['name']."</span></td><td>".$model['name']."</td><td>".$motor['name']."</td><td>".$this->getStringByArr( $motor['anios'][0] )."</td></tr>"; 
		            } 
		          }  
		        }  
		    $table .= "</tbody></table>"; 
		    return $table; 
		}


		function searchInSimple( $search_in, $term ) {
		  $founded = false; 
		  foreach ($search_in as $key => $item) {
		    if( trim($item['name']) == trim($term) ) $founded = true; 
		  } 
		  return $founded;  
		}


		function searchInBrands( $fix_arr, $marca ) { 
		  $arr_modelos = []; 
		  foreach ( $fix_arr as $key => $modelo ) {
		    if( $modelo->marca == $marca ) {
		      if( $this->searchInSimple($arr_modelos, $modelo->modelo) == false ) {
		            $arr_modelos[] = array( 'name' => $modelo->modelo );  
		      } 
		    }
		  }
		  return $arr_modelos; 
		}

		function searchInModels($brand, $model, $array) {
		    $engine = [];
		    foreach ($array as $key => $value) {
		      if( $value->marca == $brand && $value->modelo == $model ) {
		          if( $this->searchInSimple($engine, $value->motor) == false ) {
		            $engine[] = array( 'name' => $value->motor );  
		          }
		      }
		     }
		    return $engine; 
		}

		function searchInAnios( $brand, $model, $version, $array ) {
		  $anios = []; 
		  foreach ($array as $key => $value) {
		    if( $value->marca == $brand && $value->modelo == $model && $value->motor == $version ) {
		      if( $this->searchInSimple($anios, $value->anio ) == false ) {
		        $anios[] = array('name' => $value->anio ); 
		      }
		    }
		  }
		  return $anios; 
		}

		function getStringByArr( $anios ) {
		  $arr_anios = []; 
		  foreach ($anios as $key => $anio) {
		    $arr_anios[] = $anio['name']; 
		  }
		  return implode(",", $arr_anios); 
		}
  
} 
