<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Mail;  
//use App\Openpay; 

include('ThrowViews.php'); 
   
class Admin extends BaseController {	 


  public function gant() {
    return view('Admin/gant2'); 
  }

  public function updateLayout( Request $data ) {
    $css = $data->input('css'); 
    $id  = $data->input('id'); 
    DB::SELECT("UPDATE nissan_config SET custom_css = '$css' WHERE id = $id"); 
  }

  public function addToPromos( Request $data ){
    $sku    = $data->input('sku'); 
    $status = $data->input('status'); 
    $cat = $data->input('cat'); 

    $db = DB::select("SELECT * FROM nissan_categorias_productos WHERE id_producto = $sku AND id_categoria = $cat"); 
  
    if( count($db) > 0 ) {
      DB::select("DELETE FROM nissan_categorias_productos WHERE id_producto = $sku AND id_categoria = $cat");   
    } else {
      DB::select("INSERT INTO nissan_categorias_productos(id_producto, id_categoria) VALUES($sku, $cat)");  
    }
  }

  public function updateStautsProduct( Request $data ) {
    $sku = $data->input('sku'); 
    $status = $data->input('status'); 

    DB::select("UPDATE nissan_nparte2 SET status_post = $status WHERE nparte = '$sku'"); 
  } 

  public function configComments( Request $data ) {
    $back_comments = $data->input('back_comments'); 
    $btn_comments = $data->input('btn_comments'); 
    DB::select("UPDATE nissan_config SET content = '$back_comments' WHERE label = 'back_comments'"); 
    DB::select("UPDATE nissan_config SET content = '$btn_comments' WHERE label = 'btn_comments'"); 
  }

  public function deleteComment( Request $data ) {
    $id = $data->input('id'); 
    DB::select("DELETE FROM comments WHERE id = $id"); 
  }

  public function updateComment( Request $data ) {
    $id = trim($data->input('id')); 
    $resp = $data->input('resp'); 
    $aprovado = $data->input('aprovado'); 
    $id = intval($id); 
    DB::select("UPDATE comments SET respuesta = '$resp', status = $aprovado WHERE id = $id"); 
 
  }
  public function viewComment( $id ) {
    $app = new ThrowViews;  
    $comment  = DB::select("SELECT * FROM comments WHERE id = $id");
    $data = ['comment' => $comment ];  
    return $app->throwView('Admin/comment', $data ); 
  }

  public function updateBlock( Request $data ){
    $id = $data->input('id'); 
    $label = $data->input('label'); 
    $destination = $data->input('destination');  

    DB::SELECT("UPDATE nissan_config SET label = '$label', destination = '$destination' WHERE id = $id"); 
  }

  public function opinion(Request $data) {
    $data    = $data->input('folio'); 
    $opinion = $data->input('opinion'); 
 
    echo $data; 
    echo $opinion; 
  }

  // notifications  
  public function notifications() {
    $_clients = DB::select("SELECT * FROM nissan_usuarios_clientes WHERE viewed = 0"); 
    $_clients_panel = DB::select("SELECT * FROM nissan_usuarios_clientes WHERE viewed_panel = 0"); 

    $notifications = array('type' => 'clients', 'cant' => count($_clients), 'cant_panel' => count($_clients_panel)); 
    if(count($_clients) > 0 ) {
      $notifications['name'] = $_clients[0]->nombre; 
      $notifications['location'] = "https://begima.com.mx/cliente/".$_clients[0]->id;  
    }  

    $_sales       = DB::select("SELECT * FROM nissan_pedidos WHERE viewed = 0"); 
    $_sales_panel = DB::select("SELECT * FROM nissan_pedidos WHERE viewed_panel = 0");
    $notifications_sales = array('type' => 'sales', 'cant' => count($_sales), 'cant_panel' => count($_sales_panel)); 
    if(count($_sales) > 0 ) {
      $notifications_sales['name'] = $_sales[0]->nombre_cliente;  
      $notifications_sales['location'] = "https://begima.com.mx/pedidoDetalles/".$_sales[0]->folio;  
    } 

    DB::select("UPDATE nissan_usuarios_clientes SET viewed = 1");
    DB::select("UPDATE nissan_pedidos SET viewed = 1");

    $list_notifications = array('clients' => $notifications, 'sales' => $notifications_sales); 

    return json_encode($list_notifications); 
  }

  /// notifications 

  public function updatePage( Request $data ) {
    $id = $data->input('id'); 
    $name = $data->input('name'); 
    $title = $data->input('title'); 
    $url = $data->input('url'); 
    $content = $data->input('content'); 
    DB::select("UPDATE paginas SET name = '$name', title = '$title', url = '$url', content = '$content' WHERE id = $id"); 
  }

  public function editPage( $id ) {
    $app = new ThrowViews;  
    $page  = DB::select("SELECT * FROM paginas WHERE id = $id");
    $data = ['page' => $page[0] ];
    return $app->throwView('Admin/editPagina', $data ); 
  }

	public function paginas() {
    header ('Content-type: text/html; charset=utf-8');
    $app = new ThrowViews;  
    $paginas  = DB::select("SELECT * FROM paginas");
    $data = ['productos' => $paginas, 'categories' => array(), 'tallas' => array()];
    return $app->throwView('Admin/paginas', $data );  
  }

	public function deleteSliderItem( Request $data ) {
		  $id = $data->input("id"); 
		  DB::select("DELETE FROM config_slider_element WHERE id = $id"); 
	}

	public function updateSliderConfig( Request $data ) {
		$time = $data->input('time'); 
		$autoplay = $data->input('autoplay'); 
		$id = $data->input('id'); 
    $effect = $data->input('effect'); 
    $timer = $data->input('timer'); 
		DB::select("UPDATE config_sliders SET time = '$time', autoplay = '$autoplay', 
                                          type_t = $effect, timer = $timer WHERE id = $id"); 
	}

	public function updateSlider( Request $data ) {
		$id   = $data->input("id");  
		$data = $data->input("tr");
		$c = '';  
		foreach( $data as $tr ) {
			$campo = $tr['field'];
			$valor = $tr['content']; 
			$str = "UPDATE config_slider_element SET $campo = '$valor' WHERE id = $id"; 
			$c .= $str; 
			DB::select($str);  
		}

		echo $c; 
	}

	public function productos() {    
		$app = new ThrowViews;  
	  	$productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte");
	  	$categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");   
	  	$tallas     = DB::select("SELECT * FROM nissan_tallas"); 
		  $data = ['productos' => $productos, 'categories' => $categories, 'tallas' => $tallas];  
		return $app->throwView('Admin/productos', $data );  
	} 

public function productos2() {     

	$by   = false; 
	$imgs = false; 
	$cats = false; 
	$last = false; 
	$np   = false; 

	if( isset($_GET['filter']) ){
		$by = $_GET['filter']; 
		$filters['by-selected'] = $by; 
	} 
	if( isset($_GET['imgs']) ) 
		$imgs = true; 
	if( isset($_GET['cats']) ) 
		$cats = true; 
	if( isset($_GET['last']) ) 
		$last = true; 
	if( isset($_GET['np']) ) 
		$np = $_GET['np']; 

	$filters['by'] = $by; 
	$filters['imgs'] = $imgs; 
	$filters['cats'] = $cats; 
	$filters['last'] = $last; 
	$filters['np'] = $np; 

	$app = new ThrowViews; 
 	
	if( $np ) {
		$n = $_GET['np']; 
		$productos  = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$n'"); 
	} else {
	 	if( $last ) {
			$productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte ORDER BY id DESC");
		} else {
		  	if( $by > 1 ){
		  		$productos  = DB::select("SELECT n2.id, n2.title, n2.small_img, n2.nparte, n2.price, n2.status_post FROM nissan_nparte2 n2 INNER JOIN nissan_categorias_productos C ON n2.id = C.id_producto WHERE C.id_categoria = $by");
		  	} 
		  	else if( $_GET['filter'] == 'all' ) {
		  		$productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte");
		  	} else {
		  		$productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte");
		  	}
		}
	}

  foreach ($productos as $key => $pr) {
    $id   = $pr->id; 
    $_cats = DB::select("SELECT * FROM nissan_categorias_productos WHERE id_producto = $id"); 
    $pr->categorias = $_cats; 
  }
  
  	$categories = DB::select("SELECT * FROM nissan_categorias WHERE id = 824 OR id = 826 ORDER BY title");    
  	$tallas     = DB::select("SELECT * FROM nissan_tallas"); 
 
	$data = ['filters' => $filters, 'productos' => $productos, 'categories' => $categories, 'tallas' => $tallas];  

  /* 
  print_r($productos); 
  return; 
  */    

	return $app->throwView('Admin/productos2', $data );  
} 

public function admin() {  
	 $productos = DB::table('nissan_producto')->get(); 
	 $data = ['productos' => $productos]; 
	 $app = new ThrowViews;  

	 return $app->throwView('Admin/home', $data);  
}  

 public function pedidos() {
     	$pedidos = DB::select("SELECT * FROM nissan_pedidos ORDER BY id DESC");  
     	$data = ['pedidos' => $pedidos]; 
     	$app = new ThrowViews;  
	 	return $app->throwView('Admin/pedidos', $data);  
    }

   public function cupones() {     
     $cupones  = DB::select("SELECT * FROM cupones_lista");
     $data = ['cupones' => $cupones]; 
     $app = new ThrowViews;  
	 return $app->throwView('Admin/cupones', $data);  
  }

  public function fits() {
    $fitMarca = DB::select("SELECT * FROM fit_brand"); 
    $fitModel = DB::select("SELECT * FROM fit_model"); 
        
    $data = ['fitMarca' => $fitMarca, 'fitModel' => $fitModel]; 
    $app = new ThrowViews;  
    return $app->throwView('Admin/fits', $data);  
  } 

   
  public function getByModel( Request $data ) { 
    $name_model = $data->input("name-model");   
    $models     = DB::select("SELECT * FROM fit_model WHERE id_parent = $name_model");  
    print_r( json_encode($models) );   
  }
 
  public function getByYear( Request $data ) { 
    $name_model = $data->input("name-model");   
    $models     = DB::select("SELECT * FROM fit_year WHERE id_parent = $name_model");  
    print_r( json_encode($models) );     
  }

  public function getByEngine( Request $data ) {
    $name_model = $data->input("name-model");   
    $models     = DB::select("SELECT * FROM fit_engine WHERE id_parent = $name_model");  
    print_r( json_encode($models) );     
  }

  public function newModelFit( Request $data ) { 
    $title_model = $data->input("title_model"); 
    $model       = $data->input("model"); 
    $action      = $data->input("action");  
    $parent      = $data->input("parent");  
    
    switch ($action) {
      case 'new':
            switch ($model) {
              case 'fit_brand':
                  DB::insert("INSERT INTO $model(title_model) VALUES('$title_model')"); 
                break;
              case 'fit_model' || 'fit_year': 
                  DB::insert("INSERT INTO $model(title_model, id_parent) VALUES('$title_model', $parent)"); 
              default:
                # code...
                break;
            }
        break;
      default:
        # code...
        break;
    }

    return; 
  }

  public function catalogosCategorias() {
      $categorias = DB::select("SELECT * FROM nissan_categorias"); 
      $tallas     = DB::select("SELECT * FROM nissan_tallas"); 

      $base_cats = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0"); 
 
      $marcas     = DB::select("SELECT * FROM nissan_marcas");    
      $familias   = DB::select("SELECT * FROM nissan_familias");    

       $data = ['categorias' => $categorias, 'marcas' => $marcas, 'familias' => $familias, 'tallas' => $tallas]; 
       $app = new ThrowViews;  
	   return $app->throwView('Admin/categorias', $data);  
    }

    public function clientes() {
    	$clientes = DB::select("SELECT UC.id, UC.apellidos, UC.nombre AS nombre, UC.correo AS correo, UG.nombre AS grupo, 
          UC.fecha_registro, UC.metodo_registro, viewed, viewed_panel
            FROM nissan_usuarios_clientes UC LEFT JOIN nissan_grupo_clientes UG
              ON UC.grupo = UG.id"); 
    	$data = ['clientes' => $clientes]; 
	    $app = new ThrowViews;  
		return $app->throwView('Admin/clientes', $data);  
    }

    public function grupos() {
      $grupos = DB::select("SELECT * FROM nissan_grupo_clientes"); 
      $data = [ 'grupos' => $grupos ]; 
      $app = new ThrowViews;  
	  return $app->throwView('Admin/grupos', $data);
    }


    public function updateSucursal( Request $data )  {
    	$name 	   = $data->input('name'); 
    	$direciton = $data->input('direction'); 
    	$maps 	   = $data->input('maps'); 
      $maps_mobile      = $data->input('maps_mobile'); 
    	$envio     = $data->input('envio');  
    	$sucursal  = $data->input('sucursal'); 
      $horarios  = $data->input('horarios'); 
      $orden     = $data->input('orden'); 
    	$id  	   = $data->input('id'); 

    	DB::select("UPDATE sucursales SET name = '$name', direction = '$direciton', googlemaps = '$maps', status_envio = $envio, status_sucursales = $sucursal, horarios = '$horarios', orden = $orden, googlemaps_mobile = '$maps_mobile' WHERE id = $id ");
    	echo $name . " - " . $direciton . " - " .$maps . " - " .$envio. " - " .$sucursal . " - " .$id; 
    }
 
    public function newSucursal( Request $data ) {
    	$name 	   = $data->input('name'); 
    	$direciton = $data->input('direction'); 
    	$maps 	   = $data->input('maps'); 
    	$envio     = $data->input('envio');  
    	$sucursal  = $data->input('sucursal'); 

    	DB::insert("INSERT INTO sucursales(name, direction, googlemaps, status_envio, status_sucursales) VALUES('$name', '$direciton', '$maps', $envio, $sucursal)"); 
    }

    public function deleteSucursal( Request $data ) {
    	$id  	   = $data->input('id');  
    	DB::select("DELETE FROM sucursales WHERE id = $id");  
    }

    public function savePaqueterias( Request $data ) {
      $paqueterias = $data->input('paqueterias'); 
      foreach ($paqueterias as $key => $paqueteria) {
        $name = $paqueteria['name']; 
        $status = $paqueteria['status'];  
        DB::select("UPDATE paqueterias_skydropx SET status = $status WHERE nombre = '$name'"); 
      }
    } 

    public function envios() {
      $data = DB::select("SELECT * FROM nissan_config"); 
      $paqueterias = DB::select("SELECT * FROM paqueterias_skydropx"); 
      $data =  
        [ 
         'menu'   => $this->getMenu(), 
         'paqueterias' => $paqueterias 
       ];  
 
      $app = new ThrowViews;   
      return $app->throwView('Admin/envios', $data);
    } 

    public function statusBrandSlider( Request $data ) {
      $id = $data->input('id'); 
      $status = $data->input('status'); 
      DB::select("UPDATE nissan_marcas SET show_in_home = $status WHERE id = $id"); 
    }

 
    public function editSliderType( Request $data ) {
      $id = $data->input('id'); 
      $title = $data->input('title'); 
      $subtitle = $data->input('subtitle'); 
      DB::select("UPDATE config_sliders SET title = '$title', subtitle = '$subtitle' WHERE id = $id"); 
    }
      
    public function payMethod( $id ) {
      $app = new ThrowViews;  
      $comment  = DB::select("SELECT * FROM pay_methods WHERE id = $id");
      $data = ['method' => $comment ];  
      return $app->throwView('Admin/pay-method', $data ); 
    }

    public function updateMethod( Request $data ) {
      $modo = $data->input('modo'); 
      $status = $data->input('status'); 
      $id = $data->input('id'); 

      DB::select("UPDATE pay_methods SET status = $status, modo = $modo WHERE id = $id"); 
    }

    public function payMethods( ) {
      $methods = DB::select("SELECT * FROM pay_methods");  
      $data = ['methods' => $methods]; 
      $app = new ThrowViews;   
      return $app->throwView('Admin/pay-methods', $data);
    }

    public function setboletin( Request $data ) {
      $mail = $data->input('mail'); 
      
      DB::select("INSERT INTO list_boletin(mail, registro) VALUES('$mail', NOW())"); 
    }

    public function boletinAdmin() {
      $boletin = DB::select("SELECT * FROM list_boletin ORDER BY registro DESC");  
      $data = ['clientes' => $boletin]; 
      $app = new ThrowViews;   
      return $app->throwView('Admin/boletin-admin', $data);
    }

    public function configHome() {
      $data = DB::select("SELECT * FROM nissan_config"); 
     
      $sucursales = DB::select("SELECT * FROM sucursales ORDER BY orden ASC"); 

      $block = DB::select("SELECT * FROM nissan_config WHERE id > 10 AND id < 17");
      $marcas = DB::select("SELECT * FROM nissan_marcas");    
      $sliders = DB::select("SELECT * FROM config_sliders WHERE fill_with = 'products'"); 

      //print_r( $this->getSlider(1) ); return; 

      $data =  
        ['clip'                 => $data[0]->content, 
         'ips'                  => $data[1]->content, 
         'colorText'            => $data[3]->content, 
         'colorHeader'          => $data[2]->content, 
         'shipment_option'      => $data[4]->content, 
         'shipment_flat_price'  => $data[5]->content, 
         'mail_contact'         => $data[8]->content, 
         'phone_contact'        => $data[9]->content, 
         'menu'                 => $this->getMenu(), 
         'slider'               => $this->getSlider(1), 
         'slider_2'             => $this->getSlider(2), 
         'sucursales'           => $sucursales,  
         'block'                => $block, 
         'marcas'               => $marcas, 
         'sliders'              => $sliders
       ]; 

      $app = new ThrowViews;   
	    return $app->throwView('Admin/pageConfig', $data);
    }

    public function editProduct( $id ) { 
      $categories = DB::select("SELECT * FROM nissan_categorias");
      $marcas     = DB::select("SELECT * FROM nissan_marcas");    
      $familias   = DB::select("SELECT * FROM nissan_familias");    
      $producto = DB::select("SELECT * FROM nissan_nparte2 WHERE id = $id")[0];
      $data = ['categories' => $categories, 'marcas' => $marcas, 'familias' => $familias, 'idProduct' => $id, '_product' => $producto ]; 
      $app = new ThrowViews;   
	  return $app->throwView('Admin/editProduct', $data); 
    } 

   	public function editCoupon($id) {     
     	$productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte");
     	$cupon      = DB::select("SELECT * FROM cupones_lista WHERE id = $id")[0]; 
      $groups_s   = DB::select("SELECT * FROM relation_groups_coupons WHERE id_coupon = $id");  
      $methods    = DB::select("SELECT * FROM relation_pay_coupons WHERE id_coupon = $id"); 
      $cats       = DB::select("SELECT * FROM relation_cats_coupons R
                                  INNER JOIN nissan_categorias C ON R.id_cat = C.id WHERE id_group = $id");  
 
      $pay_methods = DB::select("SELECT * FROM pay_methods"); 
      $groups_ss   = (array) $groups_s; 
      $data       = ['cupon'        => $cupon,
                     'productos'    => $productos, 
                     'clientGroups' => $this->_getClientGroups(), 
                     'groups_s'       => $groups_ss, 
                     'methods' => $methods,
                     'pay_methods' => $pay_methods, 
                     'cats' => $cats  
                   ]; 
     	$app = new ThrowViews;   
	  	return $app->throwView('Admin/editCoupon', $data); 
  }

  public function newCoupon() {     
      $productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte");
      $pay_methods  = DB::select("SELECT * FROM pay_methods ORDER BY id");
      $data = [ 'productos' => $productos, 
                'clientGroups' => $this->_getClientGroups(), 
                'pay_methods'  => $pay_methods];  
      $app = new ThrowViews;   
      return $app->throwView('Admin/newCoupon', $data); 
  }

 	 public function cliente($id) {  
      $cliente = DB::select("SELECT * FROM nissan_usuarios_clientes WHERE id = $id")[0]; 
      $grupos  = DB::select("SELECT * FROM nissan_grupo_clientes"); 
      $states  = DB::select("SELECT * FROM nissan_states"); 
      DB::select("UPDATE nissan_usuarios_clientes SET viewed_panel = 1, viewed = 1 WHERE id = $id");
      $data =  ['cliente' => $cliente, 'grupos' => $grupos, 'states' => $states ]; 
      $app = new ThrowViews;    
	  return $app->throwView('Admin/cliente', $data); 
  }

  public function deleteClient( Request $data ) {
    $id = $data->input('id'); 
    DB::select("DELETE FROM nissan_usuarios_clientes WHERE id = $id"); 

  }

 //// VISTAS 




public function deleteOptionMenu ( Request $data ) {
  $id = $data->input('id');  
  DB::select("DELETE FROM menu_opciones WHERE id = $id ");   
}

public function deleteOptionMenuL2 ( Request $data ) {
  $id = $data->input('id');  
  DB::select("DELETE FROM menu_opciones_l2 WHERE id = $id "); 
}

public function updateOptionMenu ( Request $data ) {
  $id = $data->input('id');  
  $nombre = $data->input('nombre'); 
  $destino = $data->input('destino'); 

  DB::select("UPDATE menu_opciones SET titulo = '$nombre', destino = '$destino' WHERE id = $id"); 
  
}

public function updateOptionMenuL2 ( Request $data ) {
  $id = $data->input('id');  
  $nombre = $data->input('nombre'); 
  $destino = $data->input('destino'); 

  DB::select("UPDATE menu_opciones_l2 SET titulo = '$nombre', destino = '$destino' WHERE id = $id"); 
  
}

public function getOptionMenuL2 ( Request $data ) {
  $id = $data->input('id');  
  $option = DB::select("SELECT * FROM menu_opciones_l2 WHERE id = $id"); 
  print_r( json_encode($option[0]) ); 
}

public function getOptionMenu ( Request $data ) {
  $id = $data->input('id');  
  $option = DB::select("SELECT * FROM menu_opciones WHERE id = $id"); 
  print_r( json_encode($option[0]) ); 
}

public function deleteGroupMenu ( Request $data ) {
  $id = $data->input('id'); 
 
  $opciones = DB::select("SELECT COUNT(*) AS sons FROM menu_opciones WHERE id_grupo = $id"); 
  if( $opciones[0]->sons > 0 ) {
    echo 0; 
  } else {
    DB::select("DELETE FROM menu_grupos WHERE id = $id "); 
    echo 1; 
  }
  
}

public function updateGroupMenu ( Request $data ) {
  $id = $data->input('id'); 
  $nombre = $data->input('nombre'); 
  $destino = $data->input('destino'); 

  DB::select("UPDATE menu_grupos SET titulo = '$nombre', destino = '$destino' WHERE id = $id"); 
  
}

public function getGroupMenu ( Request $data ) {
  $id = $data->input('id'); 
  $group = DB::select("SELECT * FROM menu_grupos WHERE id = $id"); 
  print_r( json_encode($group[0]) ); 
}

public function newGroupMenu( Request $data ) {
  $name = $data->input('name'); 
  $destination = $data->input('destination'); 
  DB::select("INSERT INTO menu_grupos(titulo, destino) VALUES('$name', '$destination')"); 
}

public function newOptionMenuL2( Request $data ) {
  $id_parent = $data->input('id_parent');   
  $name = $data->input('name');  
  $destination = $data->input('destination');  
  DB::select("INSERT INTO menu_opciones_l2(titulo, destino, id_parent) VALUES('$name', '$destination', $id_parent)");  
} 
 
public function newOptionMenu( Request $data ) {
  $group = $data->input('group');   
  $name = $data->input('name'); 
  $destination = $data->input('destination');  
  DB::select("INSERT INTO menu_opciones(titulo, destino, id_grupo) VALUES('$name', '$destination', '$group')");  
}


public function saveConfigAdmin( Request $data ) {
  $config = $data->input('config'); 
  foreach ($config as $key => $field) {
    foreach ($field as $k => $v) {
      DB::select("UPDATE nissan_config SET content = '$v' WHERE label = '$k'"); 
    }
  }
}

public function restaurar( ) {
    echo "mensaje";  
    $row = 1; 
    if (($handle = fopen(dirname(".")."/back.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        if( $row > 1 ) {
          DB::table("nissan_nparte2")->where("nparte", $data[1])
                                     ->update(["price" => $data[2]]); 
          echo "SKU ".$data[1]. "-".$data[2] . "<br />\n";
        }
      }
      fclose($handle);
    }
}

public function minutos( ) {

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
      $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'delivery.99minutos.com/api/v1/autorization/order',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "apikey": "a2e36b18ff274f778962ad289edee3c8e02557a4",
    "deliveryType": "sameDay",
    "packageSize": "m",
    "notes": "",
    "cahsOnDelivery": true,
    "amountCash": 30,
    "SecurePackage": false,
    "amountSecure": 0,
    "receivedId": "",
    "origin": {
        "sender": "Alfonso",
        "nameSender": "Name",
        "lastNameSender": "LastName",
        "emailSender": "ejemplo@99minutos.com",
        "phoneSender": "0000000000",
        "addressOrigin": "Viena 4837, Villa Verde, Verde, 80184 Culiacán Rosales, Sin., México",
        "numberOrigin": "40",
        "codePostalOrigin": "06700",
        "country": "MEX"
    },
    "destination": {
        "receiver": "Pedro Salas",
        "nameReceiver": "Pedro",
        "lastNameReceiver": "Salas",
        "emailReceiver": "pedro@99minutos.com",
        "phoneReceiver": "5518755128",
        "addressDestination": "C.Monte Camerun 145, Lomas de Chapultepec, Miguel Hidalgo, 11000 Ciudad de México, CDMX, México",
        "numberDestination": "238",
        "codePostalDestination": "06700",
        "country": "MEX" 
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer {{a2e36b18ff274f778962ad289edee3c8e02557a4}}',
    'Content-Type: application/json'
  ),
));


$response = curl_exec($curl);

curl_close($curl);
print_r( $response ); 
echo ".."; 
      
    
}

public function sky2() {
  return "hola"; 
}

public function skydropx( Request $data ) {
 

    $cp_to = $data->input('cp'); 
 
    $url = "https://api.skydropx.com/v1/quotations";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
       "Authorization: Token token=3D6YAKRAlwNzd26ErIFHGO5kDoi0v8H0ZHPuxugyuQot",
       "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 

    // 45239  1kg Altura: 16cm | ancho 26.5 | largo 30cm  
    $data = '{ "zip_from": "45239", "zip_to": "'.$cp_to.'", "parcel": { "weight": "1", "height": "16", "width": "27", "length": "30" } }';
  
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
     
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    $paqueterias = DB::select("SELECT * FROM paqueterias_skydropx WHERE status = 1");  
    //print_r( $resp );   
    $resp = json_decode($resp); 
    //print_r($resp); 
    $resp_sky = [];  
    foreach( $resp as $r ) {
      $p_sky = strtolower($r->provider); 
      foreach( $paqueterias as $p ) { 
         $admitido = strtolower($p->nombre); 
         if( trim($p_sky) == $admitido ) {
              $resp_sky[] = $r; 
         }
      } 
    }

    print_r(json_encode($resp_sky)); 

    }

    public function savePackColor( Request $data ) {
      $color_fondo = $data->input('color_fondo');  
      $color_type = $data->input('color_type'); 
      $color_text = $data->input('color_text'); 
      $id   = $data->input('id'); 
      $status_pack = $data->input('status_pack');   
      $pzas = $data->input('pzas');     
      $data = $data->input('color');   
      DB::select("UPDATE nissan_nparte2 SET tipo_color = 'code', alfa_color = '$data', alfa_texto = '$color_text', tipo_color = '$color_type', alfa_fondo = '$color_fondo', status_pack = $status_pack, pzas_pack = $pzas WHERE id = $id");  
    } 
    
    public function getMenu() {
      $menu = DB::select("SELECT * FROM menu_grupos"); 
      foreach ($menu as $key => $grupo) {
        $menu_row = array(); 
        $menu_l1 = array(); 
        $menu_row['titulo'] = $grupo->titulo; 
        $menu_row['id'] = $grupo->id;  
        $menu_row['destino'] = $grupo->destino; 
        $opciones_q = DB::select("SELECT * FROM menu_opciones WHERE id_grupo = ".$grupo->id); 

        foreach ($opciones_q as $key => $l1) {
          $menu_l1 = DB::select("SELECT * FROM menu_opciones_l2 WHERE id_parent = ".$l1->id); 
          $l1->opciones = $menu_l1; 
        }

        $menu_row['opciones'] = $opciones_q; 

        $menu_arr[] = $menu_row; 
      }
      return $menu_arr; 
    }

    public function getSlider( $id ) {
    	$slider_main = DB::select('SELECT *, DATE_FORMAT(S.desde, "%Y-%m-%dT%H:%m:%s") AS desdee, DATE_FORMAT(S.hasta, "%Y-%m-%dT%H:%m:%s") AS hastaa FROM config_sliders C INNER JOIN config_slider_element S ON C.id = S.id_slider WHERE S.id_slider = '.$id.' ORDER BY S.orders ASC');  
    	return $slider_main; 
    }
 
    public function mercadopago() {
      return view('Admin/mercadopago'); 
    }
    
    public function updateMainImg( Request $data ) {
      $paquete = $data->input('paquete');  
      $link    = $data->input('link');  
      $imgs    = $data->input('imgs');  
      //DB::select("UPDATE nissaan_galeria SET order_img = 2 WHERE id_product = $paquete");   
      foreach ($imgs as $key => $img) {
        if($key == 0) {
            DB::select("UPDATE nissan_nparte2 SET img = '$img' WHERE id = $paquete");  
        }
            DB::select("UPDATE nissaan_galeria SET order_img = $key WHERE id_product = $paquete AND link = '$img'");  

            echo "UPDATE nissaan_galeria SET order_img = $key WHERE id_product = $paquete AND link = '$img'"; 
      }

      echo "ordenadas!";
    }

    // editar una marca 
    public function deleteFamily( Request $data ) {
      $id  = $data->input('id');   
      DB::select("DELETE FROM nissan_familias WHERE id = $id"); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha borrado una familia")); 
    }  

    // editar categoría de tallas 
    public function saveCatTalla( Request $data ) {
      $name_cat = $data->input('categoria'); 
      $descripcion = $data->input('descripcion'); 
      $original = $data->input('original_cat');   
      $familia_cat = $data->input('familia_cat');  
      DB::select("UPDATE nissan_tallas SET categoria = '$name_cat', descripcion_cat = '$descripcion', familia_talla = $familia_cat WHERE categoria = '$original'");  
      echo "UPDATE nissan_tallas SET categoria = '$name_cat', descripcion_cat = '$descripcion' WHERE categoria = '$original'";   
      //echo json_encode(array("type" => "Hecho!", "mge" => "se ha editado la categoría de tallas"));  
    }

    // editar una marca 
    public function edeleteBrand( Request $data ) {
      $id  = $data->input('id');   
      DB::select("DELETE FROM nissan_marcas WHERE id = $id"); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha borrado una marca")); 
    }  

    // editar una familia 
    public function editFamily( Request $data ) {
      $title = $data->input('title'); 
      $desc  = $data->input('desc');  
      $id    = $data->input('id');   
      DB::select("UPDATE nissan_familias SET title = '$desc', nombre = '$title' WHERE id = $id"); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha editado una marca")); 
    } 

    // editar una marca 
    public function editBrand( Request $data ) {
      $title = $data->input('title'); 
      $desc  = $data->input('desc');  
      $id  = $data->input('id');   
      DB::select("UPDATE nissan_marcas SET title = '$desc', nombre = '$title' WHERE id = $id"); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha editado una marca")); 
    }  

     // registrar una nueva marca 
    public function setNewBrand( Request $data ) {
      $title = $data->input('title'); 
      $desc  = $data->input('desc');  
      DB::select("INSERT INTO nissan_marcas SET title = '$desc', nombre = '$title' "); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha registrado una nueva marca")); 
    }

     // registrar una nueva marca 
    public function setNewFamily( Request $data ) {
      $title = $data->input('title'); 
      $desc  = $data->input('desc');    
      DB::select("INSERT INTO nissan_familias SET title = '$desc', nombre = '$title' "); 
      echo json_encode(array("type" => "Hecho!", "mge" => "se ha registrado una nueva familia")); 
    }


     // crear una nueva talla con parent 
     public function setNewTalla ( Request $data ) {
         $titulo = $data->input('titulo'); 
         $parent = $data->input('parent'); 

         DB::table('nissan_tallas')->insert(['categoria' => $parent, 
                                             'name'      => $titulo, 
                                             'orden'     => 1]); 
     }

     public function deleteTalla( Request $data ) {
         $id = $data->input('id'); 
         DB::select("DELETE FROM nissan_tallas WHERE id = $id"); 
     }  
 
     // mover categoria      
      public function moveCategorie( Request $data ) {
          $to_move   = $data->input("idToMove"); 
          $id_to_cat = $data->input("idToCat"); 
          /* echo $to_move;  
          echo "<br>";        
          echo $id_to_cat;  */ 
          DB::select("UPDATE nissan_categorias SET id_parent = $to_move WHERE id = $id_to_cat"); 
      }
 

      /////////////////////// CATEGORÍAS 

      // get cat by id 
      public function getCategorie( $id ) {
         $cat = DB::select("SELECT * FROM nissan_categorias WHERE id = $id"); 
         echo json_encode($cat[0]); 
      }

      // set new cat form admin 
      public function setNewCat( Request $request) {
        $id          = $request->input('parent');  
        $title       = $request->input('title'); 
        $description = $request->input('description'); 
        $slug        = $request->input('slug');    
 
        $slug       = strtolower(str_replace(" ", "-", $slug)); 
        $cat_exists = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$slug'"); 
        $cat_exists = count( $cat_exists ); 
        
        if( $cat_exists > 0 ) {
          echo json_encode(array("type" => "error", "mge" => "ya existe un slug igual para otra categoría")); 
        } else {
          $cat_resp = DB::table('nissan_categorias')->insert(['id_parent'    => $id, 
                                                              'title'        => $title, 
                                                              'slug'         => $slug, 
                                                              'descripcion'  => $description]);   
          echo json_encode(array("type" => "Hecho!", "mge" => "se ha creado la categoría")); 
        }
      }
      // actualizar categoría 
      public function updateCat( Request $data ) {
         $title        = $data->input('title'); 
         $description  = $data->input('description'); 
         $slug         = $data->input('slug');  
         $idCat        = $data->input('id'); 
         $slug       = strtolower(str_replace(" ", "-", $slug));
         DB::select("UPDATE nissan_categorias SET title = '$title', descripcion = '$description', slug = '$slug' WHERE id = $idCat"); 
         echo json_encode(array("type" => "Hecho!", "mge" => "se ha actualizado la categoría")); 
     }

     public function deleteCategorie( $id ) {
        $products_in = DB::select("SELECT * FROM nissan_categorias_productos WHERE id_categoria = $id");
        if( count($products_in) == 0 ) {
            DB::select("DELETE FROM nissan_categorias WHERE id = $id"); 
            echo json_encode(array("type" => "Hecho!", "mge" => "se ha borrado la categoría")); 
        } else {
           echo json_encode(array("type" => "error", "mge" => "no se puede borrar una categoría que tiene productos asignados"));
        }    
      }


      /////////////////////////////////////////////////////////// 

       public function getCatTallas( Request $data ) {
        $cat = $data->input('name'); 
        $categoria_tallas = DB::select("SELECT categoria, descripcion_cat, familia_talla FROM nissan_tallas WHERE categoria = '$cat'")[0]; 
        print_r( json_encode( $categoria_tallas ) ); 
      }

 
      public function setNewCatTalla( Request $data) {
        $name = $data->input('name'); 
        $desc = $data->input('desc');
        $familia = $data->input('familia');
        DB::table('nissan_tallas')->insert(['categoria' => $name, 'descripcion_cat' => $desc, 'familia_talla' => $familia]); 
      }

      //Tallas y categorías para la vista de tallas 
      public function getTreeTallas() {
        $cat_top = DB::select("SELECT id, name, categoria FROM nissan_tallas ORDER BY categoria");
        $cat_sig = DB::select("SELECT categoria FROM nissan_tallas GROUP BY categoria"); 
        $arr = array( array( "tallas" => $cat_top), array( "cats" => $cat_sig ) ); 
        print_r( json_encode($arr) ); 
      }

      // modelo de datos 
      public function getTreeCats() {
        $cat_top = DB::select("SELECT * FROM nissan_categorias ORDER BY id_parent, id ASC"); 
        print_r( json_encode($cat_top));  
        return; 
        foreach ($cat_top as $key => $cat) {
          if( $key < 2 ) {
              echo "<p>". $cat->id ."--". $cat->title. "--". $cat->id_parent."</p>"; 
              $son_cat = DB::select("SELECT * FROM nissan_categorias WHERE id_parent =".$cat->id);
              print_r( $son_cat );  
          }
        }
      }


  		public function setFits( Request $data ) {
  			$cat_name = $data->input('cat');  
  			$data     = ($data->input('fits'));
  			//$data = str_replace('', "\\", $data);  
  			$fits = json_decode($data); 

  			foreach ($fits as $key => $fit) {
  				$anios = $fit->cars; 
  				
  				DB::table('nissan_fits')->insert(['unidad'    => $fit->car, 
  												  'anios'     => '0', 
  												  'nparte' => $fit->np]);  

  				DB::table('nissan_nparte2')->where(['nparte' => trim($fit->np)])->update( ['altnp' => $fit->altnp, 'namesite' => $fit->name, 'price' => $fit->price, 'categoriabase' => $cat_name]);  
 
  				$id_unidad = DB::getPdo()->lastInsertId();   

  				foreach ($anios as $key => $anio) {
  					$aniosql = DB::table('nissan_cat_anios')->where(['anio' => $anio])->get(); 
  					$idLast = null; 
  					if( count( $aniosql ) > 0 ) {
  							$idLast = $aniosql[0]->id; 
  							echo "insertado $idLast<br>";
  					} else {
  							DB::table('nissan_cat_anios')->insert(['anio' => $anio]); 
  							$idLast = DB::getPdo()->lastInsertId(); 
  							echo "insertar $idLast<br>"; 
  					}
  					DB::table('nissan_cat_anio_relation')->insert(['id_cat' => $idLast, 
  															       'id_fit' => $id_unidad]); 
  				}
  
  				//return; 
  			}
  			

  			return;  
  			DB::table('nissan_fits')->insert(['unidad' => '', 'anios' => '', 'id_nparte' => 1]); 
  		}
 
		 
		public function dashboardData() { 
			 //$data = array( array('distributor_name' => 'Nissan', 'CANT' => '1200'), array('distributor_name' => 'Chevrolet', 'CANT' => '1800'), array('distributor_name' => 'Jac', 'CANT' => '120')); 

			 $data = DB::select('SELECT count(*) as CANT, img as distributor_name FROM nissan_nparte2 group by img');  

       $a1 = DB::select("SELECT count(*) as CANT FROM nissan_nparte2 WHERE img = '0'")[0]; 
       $a2 = DB::select("SELECT count(*) as CANT FROM nissan_nparte2 WHERE img != '0'AND img != '1'")[0];

       $res = array( array('distributor_name' => 'Con atraso', 'CANT' => 100), 
                     array('distributor_name' => 'En tiempo ', 'CANT' => 130), 
                     array('distributor_name' => 'En tiempo ', 'CANT' => 140) ); 
        
       // print_r($res); return; 
		    
	 		 print_r( json_encode($res) ); 
		} 

    public function saveTalla( Request $data ) {
      $title             = trim( $data->input('title_talla') );  
      $detalle_talla     = trim( $data->input('detalle_talla')); 
      $description_talla = trim( $data->input('description_talla')); 
      $cat_talla         = trim( $data->input('cat_talla')); 
       
      DB::table('nissan_tallas')->insert(['name' => $title,
                                          'description' => $description_talla, 
                                          'detalle' => $detalle_talla, 
                                          'categoria' => $cat_talla]); 
    } 

    // borrar el paquete ligado a un NParte 
    public function borrarPaquete( Request $data ) {
    	$idPaquete = $data->input('idRelation'); 
    	DB::table('nissaan_galeria')->where('id_product', $idPaquete)->delete(); 
    	DB::table('nissan_nparte2')->where('id', $idPaquete)->delete();   
    }

    public function saveConfig( Request $data ) {
      $data = $data->input("edit"); 
      $layout = $data['layout']; 
      print_r($data);  
      $ips = $data['ips'];  
      
      DB::select("UPDATE nissan_config SET content = '$layout' WHERE label = 'clip'"); 
      DB::select("UPDATE nissan_config SET content = '$ips' WHERE label = 'ips'"); 
    }

    public function saveConfigColor( Request $data ) {
      $color = $data->input("color"); 
      $colorText = $data->input("colorText"); 
      DB::select("UPDATE nissan_config SET content = '$color' WHERE label = 'color_header'"); 
      DB::select("UPDATE nissan_config SET content = '$colorText' WHERE label = 'color_texto'"); 
    }

    public function saveConfigMail( Request $data ) {
      $mail  = $data->input("mail"); 
      $phone = $data->input("phone"); 
      DB::select("UPDATE nissan_config SET content = '$mail' WHERE label = 'mail_contact'"); 
      DB::select("UPDATE nissan_config SET content = '$phone' WHERE label = 'phone_contact'");  
    }

    // agregar un paquete ligado a un NParte 
    public function agregarPaquete( Request $data ) {
    	$sku = $data->input("sku"); 
      $paqueteId = $data->input("paqueteId"); 
      
    	$img = "https://image.flaticon.com/icons/png/512/1554/1554561.png"; 
      
      $last = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$sku' ORDER BY paquete DESC");
 
      $last = $last[0]->paquete; 
      $last = intval($last) + 1;  
 
    	DB::table('nissan_nparte2')->insert(['nparte' => $sku, 'img' => $img, 'paquete' => $last, 'id_paquete' => $paqueteId]);  
    	$idLast = DB::getPdo()->lastInsertId(); 
    	DB::table('nissaan_galeria')->insert(['link' => $img, 'id_product' => $idLast, 'status' => 1]); 
    }

    public function deleteProduct( Request $data ) {
      $nparte = $data->input('nparte'); 
      $product = DB::select("DELETE FROM nissan_nparte2 WHERE nparte = '$nparte'"); 
    }

    public function saveProduct( Request $data ) {
      $new = $data->input('IS_NEW'); 
      $mge = 'editar'; 
      $existencia    = $data->input('existencia');
      if( $new == 1 ) {
        
        $sku = trim( $data->input('sku') );
        $product_price = $data->input('product_price'); 
        $title = $data->input('title'); 
        $product_price_1 = $data->input('product_price_1');
        $product_price_2 = $data->input('product_price_2');
        $product_price_3 = $data->input('product_price_3');
        $product_price_4 = $data->input('product_price_4');
        $product_price_5 = $data->input('product_price_5');
        $status_product  = $data->input('status_product'); 
        $comercial_id   = $data->input('comercial_id');   
        $id_marca = $data->input('marca_id');
        $id_familia = $data->input('familia_id');
        $promo_price     = $data->input('promo_price');   
        $desc_short      = $data->input('desc_short'); 
        $long_desc       = $data->input('desc_long'); 
        $checkPromo      = $data->input('checkPromo');   
        $check_precios   = $data->input('check_precios'); 
        $cats            = $data->input('cat'); 

        $video            = $data->input('video'); 

        DB::select("INSERT INTO `nissan_nparte2` (`nparte`, `descripcion`, `img`, `altnp`, `namesite`, `price`, `categoriabase`, `title`, `info`, `genero`, `composicion`, `material`, `tipo`, `cantidad`, `paquete`, `portada`, `detalle_tallas`, `tipo_producto`, `id_marca`, `id_familia`, `descripcion_corta`, `existencia`, `precio_especial_1`, `precio_especial_2`, `precio_especial_3`, `precio_especial_4`, status_post, id_interno, precio_promocional, check_promo, check_precios, video_yt) VALUES ('$sku', '$long_desc', '', '', '', $product_price, '10', '$title', '', '', '', '', '', '', 0, '0', NULL, NULL, $id_marca, $id_familia, '$desc_short', $existencia, $product_price_1, $product_price_2, $product_price_3, $product_price_4, $status_product, '$comercial_id', $promo_price, $checkPromo, $check_precios, '$video');");   
        $id_product = DB::getPdo()->lastInsertId();   
        DB::select("INSERT INTO `nissaan_galeria` (`id`, `link`, `id_product`, `status`) VALUES (NULL, 'https://image.flaticon.com/icons/png/512/1554/1554561.png', '$id_product', '1');"); 
        echo $id_product;  
  
	      foreach ($cats as $key => $cat) { 
	      	if( $cat ) {
	        	DB::select("INSERT INTO nissan_categorias_productos (id_producto, id_categoria) VALUES($id_product, $cat)"); 
	      	}
	      }
     

        return; 
      } 

      $multitallas   = $data->input('tallas_etiquetadas');
      $sku           = trim( $data->input('sku') ); 
        
      $existencia_paquetes = $data->input('existencia_paquetes'); 
 	    
 	  /*  
      foreach ($existencia_paquetes as $key => $paquete) {
        DB::select("UPDATE nissan_nparte2 SET existencia = ".$paquete['existencia']." WHERE id = ".$paquete['index']);  
        echo "UPDATE nissan_nparte2 SET existencia = ".$paquete['existencia']." WHERE id = ".$paquete['index']; 
      }  */  
 	 
       foreach ($multitallas as $key => $value) {
        $id_producto_talla = $value['index']; 
        DB::select("DELETE FROM nissan_tallas_productos WHERE id_producto = $id_producto_talla"); 
        if( array_key_exists('resp', $value)) {
          $asignadas = $value['resp']; 
          foreach ($asignadas as $key => $asignada) {
            DB::table('nissan_tallas_productos')->insert(['id_talla' => $asignada['talla'], 'id_producto' => $id_producto_talla, 'sku' => $sku, 'cantidad' => $asignada['cantidad']]);  
          }
        } 
 
       } 
           
      $sku 			 = trim( $data->input('sku') ); 
      $tipo_producto = trim( $data->input('tipo_producto') ); 
      $title         = $data->input('title');
      $photos        = $data->input('photos');
      $cats          = $data->input('cat');
      $t_detalle     = $data->input('t_detalle'); 
      $tallas        = $data->input('tallas');  
      $id_paquete    = $data->input('paquete');    
      $desc_short    = $data->input('desc_short'); 
      $long_desc     = $data->input('desc_long'); 
      $paquetes      = $data->input('paquetes'); 
      $product_price = $data->input('product_price'); 
      $familia_id    = $data->input('familia_id'); 
      $marca_id      = $data->input('marca_id'); 
      $status_product = $data->input('status_product'); 
      $comercial_id   = $data->input('comercial_id');   
      $checkPromo     = $data->input('checkPromo');   
       

      if($familia_id == "...") {
        $familia_id = 0; 
      }      
      if($marca_id == "...") {
        $marca_id = 0;  
      }       

      foreach( $paquetes as $paquete ) {
      	 DB::select("DELETE FROM nissan_categorias_productos WHERE id_producto = $paquete"); 
	      foreach ($cats as $key => $cat) { 
	        DB::select("INSERT INTO nissan_categorias_productos (id_producto, id_categoria) VALUES($paquete, $cat)"); 
	      }
      }

     $product_price_1 = $data->input('product_price_1');
      if( !is_numeric( $product_price_1 ) ) $product_price_1 = 0;   
      $product_price_2 = $data->input('product_price_2'); 
      if( !is_numeric( $product_price_2 ) ) $product_price_2 = 0;   
      $product_price_3 = $data->input('product_price_3');  
      if( !is_numeric( $product_price_3 ) ) $product_price_3 = 0;   
      $product_price_4 = $data->input('product_price_4');
      if( !is_numeric( $product_price_4 ) ) $product_price_4 = 0;   
      $product_price_5 = $data->input('product_price_5');
      if( !is_numeric( $product_price_5 ) ) $product_price_5 = 0;   
      $check_precios   = $data->input('check_precios'); 
      $promo_price    = $data->input('promo_price');   
      if( !is_numeric( $promo_price ) ) $promo_price = 0;   
      $existencia    = $data->input('existencia');   
      if( !is_numeric( $existencia ) ) $existencia = 0;   

      $video            = $data->input('video');  

      DB::select("UPDATE nissan_nparte2 SET  detalle_tallas = '$t_detalle', tipo_producto = '$tipo_producto', descripcion_corta = '$desc_short', descripcion = '$long_desc', existencia = $existencia, title = '$title', price = $product_price, id_marca = $marca_id, id_familia = $familia_id, status_post = $status_product, precio_especial_1 = $product_price_1, precio_especial_2 = $product_price_2, precio_especial_3 = $product_price_3, precio_especial_4 = $product_price_4, id_interno = '$comercial_id', check_precios = $check_precios, precio_promocional = $promo_price, check_promo = $checkPromo, video_yt = '$video' WHERE nparte = '$sku'"); 
       
      $arreglo_colores = $data->input('arreglo_colores');  
      echo "DELETE FROM nissan_colores_productos WHERE id_producto = $paquete"; 
      DB::select("DELETE FROM nissan_colores_productos WHERE id_producto = $paquete"); 
      /*
      */ 

      if(  $arreglo_colores ) {
        foreach ($arreglo_colores as $key => $color) {
          DB::table('nissan_colores')->insert(['title' => 'nombre', 'code' => $color]); 
          $id_color = DB::getPdo()->lastInsertId();   
          DB::table('nissan_colores_productos')->insert(['id_producto' => $paquete, 'id_color' => $id_color]); 
        } 
      }

      //echo $id_paquete; 
 
      /* 
      print_r( $arreglo_colores ); 
      return; */ 
      //$id_s = DB::select("SELECT id FROM nissan_nparte2 WHERE nparte = '$sku'");
      // print_r( $id_s ); 
   
      foreach ($photos as $key => $photo) {
        $id_photo = $photo['id'];
        if ( $photo['val'] == 'true' ) {
          DB::select("UPDATE nissaan_galeria SET status = 1 WHERE id = $id_photo"); 
        } else {
          DB::select("UPDATE nissaan_galeria SET status = 0 WHERE id = $id_photo"); 
        }
      } 
  
      DB::select("UPDATE nissan_nparte2 SET categoriabase = $cat WHERE nparte = '$sku'");
      return; 
  
    } 

 
    public function updateTalla( Request $data) {
      $nombre      = trim( $data->input('nombre')); 
      $description = trim( $data->input('description'));
      $detalle     = trim( $data->input('detalle'));
      $id          = trim( $data->input('id'));   

      DB::select("UPDATE nissan_tallas SET name = '$nombre', detalle = '$detalle', description = '$description' WHERE id = $id"); 

    }

    public function getFamilia( Request $data ) {
      $id = $data->input('id'); 
      $familia = DB::select("SELECT * FROM nissan_familias WHERE id = $id"); 
      return (json_encode($familia[0]));  
    }

    public function getTalla( $id ) {
      $talla = DB::select("SELECT * FROM nissan_tallas WHERE id = $id"); 
      return (json_encode($talla[0]));  
    }

    public function getProductById( $id ) {
       $producto = DB::select("SELECT * FROM nissan_nparte2 WHERE id = $id"); 

       $nparte    =  $producto[0]->nparte;  
        
       $paquetes  =  DB::select("SELECT paquete, id, existencia, id_paquete, tipo_color, url_textura, alfa_color, alfa_texto, alfa_fondo, status_pack, pzas_pack FROM nissan_nparte2 WHERE nparte = '$nparte'"); 
       
       $gallery   =  DB::select("SELECT link, status, nissaan_galeria.id, nissan_nparte2.id as idProd, id_paquete FROM nissan_nparte2 INNER JOIN 
                                        nissaan_galeria ON nissan_nparte2.id = nissaan_galeria.id_product 
                                          WHERE nissan_nparte2.nparte = '$nparte' ORDER BY nissaan_galeria.id_product, nissaan_galeria.order_img");

       $tallas_s  =  DB::select("SELECT id_talla, id_producto FROM nissan_tallas_productos WHERE sku = '$nparte'"); 
       $_tallas_s = null;     
       
       foreach ($tallas_s as $key => $talla) {
         $_tallas_s[] = $talla->id_talla."_".$talla->id_producto;   
       } 

       $tallas_seleccionadas_por_paquete = null; 
       $tallas_seleccionadas = null; 
       $tallas_existencias = null; 
       foreach( $paquetes as $key => $paquete ) {
          $seleccionadas = DB::select("SELECT id_talla, id_producto, cantidad FROM nissan_tallas_productos WHERE id_producto = ".$paquete->id); 
          foreach( $seleccionadas as $key => $talla){
            $tallas_seleccionadas[] = $talla->id_talla."_".$paquete->id;
            $tallas_existencias[ $talla->id_talla."_".$paquete->id ] = $talla->cantidad; 
          } 
          $tallas_seleccionadas_por_paquete[ $paquete->id ] = $tallas_seleccionadas; 
          $tallas_seleccionadas = null; 
       }
      
         

       $tallas   = DB::select("SELECT * FROM nissan_tallas WHERE name is not null"); 

       $colores  = DB::select("SELECT * FROM nissan_colores_productos CP
                                INNER JOIN nissan_colores NC ON CP.id_color = NC.id WHERE CP.id_producto = $id"); 
       $categoies_relation = DB::select("SELECT P.id AS IDPRODUCTO, NC.title, NC.slug, NC.id FROM nissan_nparte2 P  
                                            INNER JOIN nissan_categorias_productos C
                                              ON P.id = C.id_producto 
                                                INNER JOIN nissan_categorias NC
                                                  ON C.id_categoria = NC.id WHERE P.id = $id"); 

       return json_encode( array('product'     => $producto, 
                                 'gallery'     => $gallery, 
                                 'paquetes'    => $paquetes, 
                                 '_tallas_s'   => $_tallas_s, 
                                 'tallas'      => $tallas,    
                                 'colores'     => $colores,  
                                 'categores_s' => $categoies_relation, 
                                 'multiple_tallas' => $tallas_seleccionadas_por_paquete, 
                                 'cantidades' => $tallas_existencias ) );  
    } 
 
 
  public function _getClientGroups() {
    return DB::select("SELECT * FROM nissan_grupo_clientes"); 
  }
  
    public function borrarTalla( Request $data ) {
        $id = $data->input('id_talla'); 
        DB::select("DELETE FROM nissan_tallas WHERE id = $id"); 
    }

    public function borrarGrupoTallas( Request $data ) {
      $to_delete = $data->input('to_delete'); 
      $to_delete = trim($to_delete); 
      DB::select("DELETE FROM nissan_tallas WHERE categoria = '$to_delete'"); 
      echo "DELETE FROM nissan_tallas WHERE categoria = '$to_delete'"; 
    }

    public function getProductsToAdd() {
      $productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte ORDER BY id DESC");
      return $productos;  
    }

    public function newPedidoView( ) {
      $productos  = DB::select("SELECT * FROM nissan_nparte2 GROUP BY nparte ORDER BY id DESC");
      return view('Admin/crearOrden', ["productos" => $productos]); 
    }

    public function pedidoDetalles( $folio ) {
      /* 
      $allSessions = [];
      $sessionNames = scandir(\session_save_path());
      //print_r( $sessionNames ); 
      foreach($sessionNames as $sessionName) {
          $sessionName = str_replace("sess_","",$sessionName);
          if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions
              session_id($sessionName);
              session_start();
              $allSessions[$sessionName] = $_SESSION;
              session_abort();
              }
          } */ 
          //print_r($allSessions); 
      $pedido = DB::select("SELECT * FROM nissan_pedidos WHERE folio = '$folio'")[0]; 

      $productos = DB::select("SELECT * FROM nissan_pedidos NP INNER JOIN 
                                nissan_producto NA ON NP.id = NA.id_pedido WHERE NP.folio = '$folio'"); 


      DB::select("UPDATE nissan_pedidos SET viewed_panel = 1, viewed = 1 WHERE folio = '$folio'");

      return view('Admin/pedidoDetalle', ['folio' => $folio, 'pedido' => $pedido, 'productos' => $productos ]);  
  }    
 
    public function getNotImages() {
      $productos = DB::select("SELECT * FROM nissan_nparte2 WHERE price = 0");  
      return json_encode( $productos );  
    }

    public function revisionImgs2() {
        $productos = DB::table('nissan_nparte2')->where('img', '!=', '0')->limit(20000)->get(); 
        echo ".."; 
        foreach ($productos as $key => $product) {
          $np  = $product->altnp; 
          $_np = $product->nparte; 
          $to_search = null; 
          if( strlen($np) > 12 ) {
            //print_r("<p>".$np."</p>");
            $to_search = explode(";", $np); 
            foreach( $to_search as $part ) {
                //echo "<p>$_np : $part</p>"; 
                if( trim($part) != trim($_np) ) {
                    //echo "+"; 
                  if(! strpos($part, "-") ) {
                     $part = $this->getFormat($part); 
                       //echo "<p>$part</p>";
                       for( $i = 1; $i <= 5; $i++ ) {
                          if( file_exists( public_path()."/media/productos/part_$i/".$part."_0.jpg") ) {  
                                $img = "https://nissan.at-cabo.com/sitio/public/media/productos/part_$i/".$part."_0.jpg";  
                                echo "<img style='width:100px;' src='$img'>";  
                              }
                       }
                  }
                } else {
                    echo "*"; 
                }
            }
          }    
          //if( $key > 1 ) break; 
        }
    }

    private function getFormat( $cad ) { 
       return ( substr($cad, 0, 5). '-' .substr($cad, 5, 5) ); 
    }

		public function revisionImgs() {  

			$productos = DB::table('nissan_nparte2')->get();  
			foreach( $productos as $k => $producto ) {  
        $np = $producto->nparte;  
				//$np = ( substr($producto->nparte, 0, 5). '-' .substr($producto->nparte, 5, 5) ); 
				if( file_exists( public_path()."/media/productos/part_6/".$np."_0.jpg") ) {  
					$img = "https://nissan.at-cabo.com/sitio/public/media/productos/part_6/".$np."_0.jpg"; 
					echo "<img style='width:100px;' src='$img'>";   
					DB::table('nissan_nparte2')->where(['nparte' => $producto->nparte])->update(['img' => "part_6/$np"]);   
				} else if( file_exists( public_path()."/media/productos/part_6/".$np."_0.jpg") ) {
					$img = "https://nissan.at-cabo.com/sitio/public/media/productos/part_6/".$np."_0.jpg"; 
					echo "<img style='width:100px;' src='$img'>";  
					DB::table('nissan_nparte2')->where(['nparte' => $producto->nparte])->update(['img' => "part_6/$np"]);   
				}
			} 
		}
 
       public function getCategories() {
      $base_cats = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0"); 

      $categorias = null; 
      foreach ($base_cats as $key => $cat) {
        $id = $cat->id;  
        $cat->sons = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = $id"); 
        $categorias[] = $cat; 
      }
      print_r( json_encode( $categorias ) ); 
    } 

     
    public function getMarca( Request $data ) {
    	$id = trim( $data->input('id') );
    	$marca = DB::select("SELECT * FROM nissan_marcas WHERE id = $id "); 
    	return json_encode( $marca ); 
    } 

    public function login( ) {
    	return view('Admin/login'); 
    }

    public function commentsList() { 
      $boletin = DB::select("SELECT C.id, C.comment, C.fecha, N.img FROM comments C INNER JOIN nissan_nparte2 N ON C.sku = N.nparte");  
      $data = ['clientes' => $boletin]; 
      $app = new ThrowViews;    
      return $app->throwView('Admin/comments_list', $data);
    }

    public function saveComment( Request $data ) {
      $nparte = $data->input("sku"); 
      $name = $data->input("name"); 
      $comment = $data->input("comment"); 
      $calification = $data->input("calification"); 
      DB::select("INSERT INTO comments(sku, name, comment, calification, status, fecha) VALUES('$nparte', '$name', '$comment', $calification, 0, NOW())"); 
    }
  
    public function saveClientData( Request $data ) {
      $name = $data->input('name'); 
      $lastname = $data->input('lastname'); 
      $email    = $data->input('email'); 
      $envio    = $data->input('envio'); 
      $factura  = $data->input('factura'); 
      $city     = $data->input('city'); 
      $group    = $data->input('group'); 
      $zip      = $data->input('zip'); 
      $id      = $data->input('id'); 
      $state      = $data->input('state'); 

      $clientPhone  = $data->input('clientPhone'); 
      
      DB::select("UPDATE nissan_usuarios_clientes SET grupo = $group, nombre = '$name', apellidos = '$lastname', correo = '$email', direccion = '$envio', direccion_facturacion = '$factura', ciudad = '$city', cp = '$zip', telefono = '$clientPhone', estado = $state WHERE id = $id"); 
    }
    
    public function editLabelPack( Request $data ) {
      $id = $data->input('id'); 
      $label = $data->input('label'); 
      DB::select("UPDATE nissan_nparte2 SET id_paquete = '$label' WHERE id = $id"); 
    }

    public function updatePassClient( Request $data ) {
      $id = $data->input('id'); 
      $pass = $data->input('pass'); 
      DB::select("UPDATE nissan_usuarios_clientes SET password = '$pass' WHERE id = $id"); 
    } 
   
}  
   