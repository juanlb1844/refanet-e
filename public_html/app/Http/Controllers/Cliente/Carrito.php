<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Mail;
//use App\Openpay; 
use Illuminate\Http\Request;

include_once 'Home.php';  
 
class Carrito extends BaseController
{	 

	public function updateSend( Request $data ) {
		$method = $data->input('method');  
		$option = $data->input('days');  
		$price  = $data->input('price');  

		$cart = new Home;   

		if( $cart->_getTotalCart() > 1500 ) {
			\Session::put('send', array('method' => $method, 'option' => $option, 'price' => 0 ) );
		} else {
			\Session::put('send', array('method' => $method, 'option' => $option, 'price' => $price ) );
		}

		$info_cart = array('send' => \Session::get('send'), 'total' => $cart->_getTotalCart(), 'subtotal' => $this->getTotalCart());  
		return json_encode($info_cart); 
	}
  
	public function cart() {
		 $cart = new Home; 
 		 return $cart->_getSendPrice(); 
		 //var_dump( \Session::get('send') );
		 //echo \Session::get('send')['price']; 
		 return; 
		 echo $this->countCategorie(\Session::get('productos'), 'Promociones');
		 //print_r( \Session::get('productos') );
		return; 
		$total_carrito = 0; 
		foreach ( \Session::get('productos') as $key => $value) {
		 	$total_carrito += ($value['price'] * $value['cant']); 
		 } 
		echo $total_carrito; 
	}

	public function getTotalCart() {
		$total_carrito = 0; 
		if( null !== \Session::get('productos') ) {
			foreach ( \Session::get('productos') as $key => $value) {
				if( session()->has('logueado') ) { 
					if ( session()->get('user')->grupo == 1 ) {
						$total_carrito += ($value['price'] * $value['cant']); 
					} 
					if ( session()->get('user')->grupo == 2 ) {
						$total_carrito += ($value['precio_especial_1'] * $value['cant']); 
					} else if( session()->get('user')->grupo == 3 ) {
						$total_carrito += ($value['precio_especial_2'] * $value['cant']); 
					} else if( session()->get('user')->grupo == 4 ) {
						$total_carrito += ($value['precio_especial_3'] * $value['cant']); 
					} else if( session()->get('user')->grupo == 5 ) {
						$total_carrito += ($value['precio_especial_4'] * $value['cant']); 
					}
				} else {
					if( $value['promo'] > 0 ) { 
				 		$total_carrito += ($value['promo'] * $value['cant']); 
					} else {
						$total_carrito += ($value['price'] * $value['cant']); 
					}
				} 
			 } 
		} 
		return $total_carrito; 
	}

	////////////////////

	public function deleteCoupon( Request $data ) {
		$id = $data->input('id'); 
		DB::select("DELETE FROM cupones_lista WHERE id = $id"); 
	}

	public function newCoupon( Request $data ) {
		$codigo = $data->input('codigo'); 
		$description = $data->input('description'); 
		$success = $data->input('success');   
		$noApply = $data->input('noApply'); 
		$descType = $data->input('descType'); 
		$cantDesc = $data->input('cantDesc'); 
		$desde = $data->input('desde'); 
		$hasta = $data->input('hasta'); 
		$logueado = $data->input('logueado'); 
		$groups = $data->input('groups'); 
		$methods = $data->input('methods'); 
		
		$categorias = $data->input('categorias'); 

		$skuTiene = $data->input('skuTiene'); 
		$skuAgrega = $data->input('skuAgrega'); 

		if( $categorias === NULL ) $categorias = array();  
		if( $groups === NULL ) $groups = array(); 
		if( $methods === NULL ) $methods = array(); 
  
		DB::table('cupones_lista')->insert([
			'tipo' => $description, 
			'codigo' => $codigo, 
			'descuento' => $cantDesc, 
			'status' => 1, 
			'no_apply' => $noApply, 
			'desct_type' => $descType, 
			'success' => $success, 
			'description' => $description, 
			'valido_desde' => $desde, 
			'valido_hasta' => $hasta, 
			'logueado' => $logueado, 
			'sku_tiene' => $skuTiene,  
			'sku_agrega' => $skuAgrega  
		]); 

		$id = DB::getPdo()->lastInsertId();

			if( count($groups) > 0 ) {
				DB::select("DELETE FROM relation_groups_coupons WHERE id_coupon = $id"); 
				foreach ($groups as $key => $id_group) {
					DB::select("INSERT INTO relation_groups_coupons(id_coupon, id_grupo) VALUES($id, $id_group)"); 
				}
			}  

			if( count($methods) > 0 ) {
				DB::select("DELETE FROM relation_pay_coupons WHERE id_coupon = $id"); 
				foreach ($methods as $key => $id_method) {
					DB::select("INSERT INTO relation_pay_coupons(id_coupon, id_method) VALUES($id, $id_method)"); 
				}
			}  
 
			if( count($categorias) > 0 ) {
				DB::select("DELETE FROM relation_cats_coupons WHERE id_group = $id"); 
				foreach ($categorias as $key => $id_group) { 
					DB::select("INSERT INTO relation_cats_coupons(id_group, id_cat) VALUES($id, $id_group)"); 
				}
			} 

		if( count($categorias) > 0 ) {
			DB::select("UPDATE cupones_lista SET per_cat = 1 WHERE id = $id"); 
		} else {
			DB::select("UPDATE cupones_lista SET per_cat = 0 WHERE id = $id");   
		}
	}   

	public function updateCoupon( Request $data ) {
		$type = $data->input('type'); 
		$cant = $data->input('cant'); 
		$id = $data->input('id'); 
		$desde = $data->input('desde'); 
		$hasta = $data->input('hasta'); 
		$desc = $data->input('desc');
		$mgeSuccess = $data->input('mge_success');
		$mge_n_applied = $data->input('mge_n_applied'); 
		$logueado = $data->input('logueado'); 
		$groups = $data->input('groups'); 
		$methods = $data->input('methods'); 
		

		$skuTiene = $data->input('skuTiene'); 
		$skuAgrega = $data->input('skuAgrega');  

		if( $groups === NULL ) $groups = array(); 
		if( $methods === NULL ) $methods = array(); 
 
		$categorias = $data->input('categorias'); 
		if( $categorias === NULL ) $categorias = array();  

		if( count($groups) > 0 ) {
			DB::select("DELETE FROM relation_groups_coupons WHERE id_coupon = $id"); 
			foreach ($groups as $key => $id_group) {
				DB::select("INSERT INTO relation_groups_coupons(id_coupon, id_grupo) VALUES($id, $id_group)"); 
			}
		}

		if( count($methods) > 0 ) {
			DB::select("DELETE FROM relation_pay_coupons WHERE id_coupon = $id"); 
			foreach ($methods as $key => $id_method) { 
				DB::select("INSERT INTO relation_pay_coupons(id_coupon, id_method) VALUES($id, $id_method)"); 
			}
		}

		if( count($categorias) > 0 ) {
				DB::select("DELETE FROM relation_cats_coupons WHERE id_group = $id"); 
				foreach ($categorias as $key => $id_group) { 
					DB::select("INSERT INTO relation_cats_coupons(id_group, id_cat) VALUES($id, $id_group)"); 
				}
			} 

		DB::table('cupones_lista')
                ->where('id', $id)
                ->update(['desct_type'   => $type, 
            			  'descuento'    => $cant, 
            			  'valido_desde' => $desde, 
            			  'valido_hasta' => $hasta, 
            			  'tipo' => $desc, 
            			  'success' => $mgeSuccess, 
            			  'no_apply' => $mge_n_applied, 
            			  'logueado' => $logueado, 
            			  'sku_tiene' => $skuTiene, 
            			  'sku_agrega' => $skuAgrega]);  

	}

	function checkCats( $id ) {
 		$cats = DB::select("SELECT * FROM relation_cats_coupons WHERE id_group = $id"); 
 		
 		$encontrado = true; 
 		foreach (\Session::get('productos') as $key => $value) {
 			$encontrado_2 = false; 
 		 	$arr = $value['categorias'][0]; 
 		 	$cat_prod = $arr['id']; 
		 		foreach ($cats as $key => $v) {
		 			if( $cat_prod == $v->id_cat ) {
		 				$encontrado_2 = true; 
		 			}
		 		}
		 	if( $encontrado_2 == false ) $encontrado = false;
 		 } 
 		return $encontrado; 
	}

	// revisa el cupon y sus reglas..   
	public function checkCoupon( $coupon ) {
	  date_default_timezone_set('America/Mexico_City'); 
	  \Session::put('cgo', "$coupon"); 
	  $coupon = DB::select("SELECT * FROM cupones_lista WHERE codigo = '$coupon'"); 
	  \Session::forget('descuento'); 

	  if( count($coupon) == 0 ) {
	  	\Session::put('descuento', 0 ); 
	    echo json_encode(array( "type"  => "error", 
								"mge"  => "<p>Cupón no encontrado</p>") 
							);  
	    return; 
	  }

	  $success_mge = $coupon[0]->success;
	  $cant_desc   = $coupon[0]->descuento;
	  $type_desc   = $coupon[0]->desct_type;
	  $desde       = $coupon[0]->valido_desde; 
	  $hasta       = $coupon[0]->valido_hasta; 

	  $logueado       = $coupon[0]->logueado; 
	  
	  $desde = new \DateTime($desde); 
	  $hasta = new \DateTime($hasta);
	  $hoy   = new \DateTime(); 

	  // revisar si pertenece a una categoría 
	  // $this->countCategorie(\Session::get('productos'), 'Promociones') 

	  if( $this->checkCats($coupon[0]->id) == false ) {
	  	$id = $coupon[0]->id;   
	  	\Session::put('descuento', 0 ); 
	    echo json_encode(array( "type"  => "error", 
						"mge" => "<p>Este cupón no aplica para uno o más productos del carrito</p>") 
								);  
	    return; 
	  }
	  
	  \Session::put('descuento_mge_success', $success_mge); 

	  	if( ( $logueado == 1 AND strlen( session()->get('logueado') ) > 1 ) || $logueado == 0 ) {
		if( count($coupon) ) { 
			if( $this->getInTime($hoy, $desde) == true AND $this->getInTime($hoy, $hasta) == false ) {
				switch ($type_desc) {
					case 1:
						\Session::put('descuento', $this->getTotalCart() * ($cant_desc/100));
						break;
					case 2: 
						\Session::put('descuento', $cant_desc );
						break; 
					case 3: 
							if( $this->searchInCart( $coupon[0]->sku_tiene ) == 0 ) {
								echo json_encode( array( "type" => "error", 
													"mge" => "<p style=\"color:orange;\">Agrega el producto con promoción</p>")
								); 
								return; 
							} else {
								if( $this->searchInCart( $coupon[0]->sku_agrega ) == 0 ) {
									$this->addToCartPromo($coupon[0]->sku_agrega,  1, 1, 1 ); 
									echo json_encode( array( "type" => "agregado",  
														"mge" => "<p style=\"color:green;\">Se ha agregado el producto gratis!</p>")
													); 
								} else {
									$this->deleteFromCartPromo( $coupon[0]->sku_agrega ); 
									$this->addToCartPromo($coupon[0]->sku_agrega,  1, 1, 1 ); 
									echo json_encode( array( "type" => "revisado",  
														"mge" => "<p style=\"color:green;\">Se ha descontado un producto!</p>")
													); 
								}
								return; 
							}
						break; 
				} 
				echo json_encode(array( "type" => "success", 
										"mge" => "<p>$success_mge $type_desc</p>")
								);  
			} else { 
				\Session::put('descuento', 0 ); 
				echo json_encode(array( "type" => "error", 
										"mge" => "<p style=\"color:orange;\">El cupón ya ha vencido</p>") );
			}  
		} else { 
			echo json_encode(array( "type" => "notfound", 
									"mge"  =>  "<p style=<\"color:red;\">No existe este cupón</p>") );
		} 
	} else {
		 echo json_encode(array( "type" => "notfound", 
								 "mge"  =>  "<p style=<\"color:red;\">Tienes que tener un usuario para aplicar el cupón</p>") );
	}
		/* 
		if( count($coupon) ) { 
			if(  true ) {
				if( \Session::get('productos')[0]['promo'] > 0 ) {
					\Session::put('descuento', \Session::get('productos')[0]['promo']);
				} else {
					\Session::put('descuento', \Session::get('productos')[0]['price']);
				}
				echo json_encode(array( "type" => "success", 
										"mge" => "<p>$success_mge</p>")
								);  
			} else { 
				echo json_encode(array( "type" => "error", 
										"mge" => "<p style=\"color:orange;\">Para aplicar este cupón tienes que tener dos productos que apliquen</p>")
								);
			}  
		} else { 
			echo json_encode(array( "type" => "notfound", 
									"mge"  =>  "<p style=<\"color:red;\">No existe este cupón</p>")
								);
		}
	
		*/
	} 
 	
 
 	function searchInCart( $sku ) {
 		 $productos = \Session::get('productos'); 
 		 $existe = 0; 
 		 foreach ($productos as $key => $p) {
 		 	if( $p['np'] == $sku ) {
 		 		$existe = 1; 
 		 	}
 		 }
 		 return $existe; 
 	}

	function getInTime( $hoy, $fecha ) {
		return ($hoy > $fecha);
	}
 	
 	public function revisarCondiciones() {

 	}


	//borra los productos del carrito 
	public function restartCart() {
		print_r( \Session::get('productos') ); 
		return; 
		\Session::forget('productos');   
		return; 
	}

	public function countCategorie( $products, $str ) {
		$found = 0; 
		foreach ($products as $key => $product) {
			$cant = $product['cant']; 
			foreach ($product['categorias'] as $k => $cat) {
				if( $cat == $str ) {
					$found+=$cant; 
				}
			}
		}
		return $found; 
	}
 	
	// TO PROMO 

	public function deleteFromCartPromo( $np ) {
		$productos = \Session::get('productos');
		$_k = 0; 
		foreach ($productos as $key => $value) {
			if( $value['np'] == $np ) {
				$_k = $key; 
			}
		}
		unset($productos[$_k]); 
		\Session::forget('productos');   
		\Session::forget('productos');    
		\Session::put('productos', $productos );
	}

	public function addToCartPromo($np,  $cant, $pack, $talla ) {

		 $talla = "MD"; 
		 $np_db =  $np; 
		 $info_product = DB::table('nissan_nparte2')->where([['nparte', '=', $np_db]])->get(); 
		 $_id = $info_product[0]->id; 
		 $_img = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = $_id ORDER BY order_img ASC")[0]->link; 

		 $categorias = null; 
		 $categorias_q = DB::select("SELECT NC.title, NC.id FROM nissan_nparte2 P  INNER JOIN nissan_categorias_productos C ON P.id = C.id_producto  INNER JOIN nissan_categorias NC ON C.id_categoria = NC.id WHERE P.nparte = '$np' GROUP BY C.id_categoria");
		 foreach ($categorias_q as $key => $cat) {
		  	$categorias[] = array( "name" => $cat->title, "id" => $cat->id ); 
		  } 

		 $special_price = 0; 
		 if( $info_product[0]->check_promo == 1 ) {
		 		$special_price = $info_product[0]->precio_promocional; 
		 }  
		    
		 \Session::push('productos', array(
		 								   'id'    => $info_product[0]->id, 
		 								   'precio_especial_1' => 0, 
		 								   'precio_especial_2' => 0,
		 								   'precio_especial_3' => 0,
		 								   'precio_especial_4' => 0,
		 								   'np'      => $np, 
		 								   'name'    => $info_product[0]->title, 
		 								   'price'   => 0, 
		 								   'img'     => $_img, 
		 								   'cant'    => $cant, 
		 								   'talla'   => $talla, 
		 								   'promo'   => $special_price, 
		 								   'categorias' => $categorias, 
		 								   'textura'    => $info_product[0]->url_textura,
		 								   'color'      => $info_product[0]->alfa_color,
		 								   'alias'      => $info_product[0]->id_paquete,
		 								   'paquete'    => $info_product[0]->paquete));  
	} 
	///// 


    /**
     * Agregar productos al carrito
     * @param Request $data
     * @return void
     */
	public function addToCart( Request $data )
    {
		 $np        = $data -> input('np');
		 $cant      = $data -> input('cant');
		 $pack      = $data -> input('pack');
		 $talla     = $data -> input('talla');

		 // para ropa 
		 //$talla = DB::select("SELECT name FROM nissan_tallas WHERE id = $talla")[0]->name; 
		 // para ropa 
		 //$np_db = str_replace("-", "", $np); 
		 // para ropa 
		 //$info_product = DB::table('nissan_nparte2')->where([['nparte', '=', $np_db], ['paquete', '=', $pack]])->get(); 
		 $info_product = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$np'"); 
		 $_id = $info_product[0]->id; 
		 $_img = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = $_id ORDER BY order_img ASC")[0]->link; 

		 $categorias = null; 
		 $categorias_q = DB::select("SELECT NC.title, NC.id FROM nissan_nparte2 P  INNER JOIN nissan_categorias_productos C ON P.id = C.id_producto  INNER JOIN nissan_categorias NC ON C.id_categoria = NC.id WHERE P.nparte = '$np' GROUP BY C.id_categoria");

         foreach ($categorias_q as $key => $cat)
         {
             $categorias[] = [
                    "name"  => $cat->title
                 ,  "id"    => $cat->id
             ];
         }


		 $special_price = 0; 
		 if( $info_product[0]->check_promo == 1 )
         {
		 		$special_price = $info_product[0]->precio_promocional;
		 }

		 \Session::push('productos', [
                'id'                => $info_product[0] -> id
            ,   'precio_especial_1' => $info_product[0] -> precio_especial_1
            ,   'precio_especial_2' => $info_product[0] -> precio_especial_2
            ,   'precio_especial_3' => $info_product[0] -> precio_especial_3
            ,   'precio_especial_4' => $info_product[0] -> precio_especial_4
            ,   'np'                => $np
            ,   'name'              => $info_product[0] -> title
            ,   'price'             => $info_product[0] -> price
            ,   'img'               => $_img
            ,   'cant'              => $cant
            ,   'talla'             => $talla
            ,   'promo'             => $special_price
            ,   'categorias'        => $categorias
            ,   'textura'           => $info_product[0] -> url_textura
            ,   'color'             => $info_product[0] -> alfa_color
            ,   'alias'             => $info_product[0] -> id_paquete
            ,   'paquete'           => $info_product[0] -> paquete
            ,   'max_items'         => $data -> input('exists')
        ]);
	} 
  
	public function addToProduct( Request $data ) {
		  $cant  = $data->input('cant'); 
		  $np    = $data->input('np'); 
		  $prods = \Session::get('productos'); 
		  $index = 0; 
		  for ($i = 0; $i < count($prods); $i++) {
		  	if( $prods[$i]['np'] == $np ) {
		  		$index = $i; 
		  	}
		  } 
		  $prods[$index]['cant'] = $cant; 
		  \Session::forget('productos');    
		  \Session::push('productos', $prods); 
		  print_r($prods);  
	} 
 
	public function deleteFromCart( Request $data ) {
		$np = $data->input('np');
		$productos = \Session::get('productos');

		print_r($productos); 
		$_k = 0; 
		foreach ($productos as $key => $value) {
			if( $value['np'] == $np ) {
				$_k = $key; 
			}
		}
		unset($productos[$_k]); 
		print_r( $productos ); 
		\Session::forget('productos');   
		\Session::forget('productos');    
		\Session::put('productos', $productos );
	}

    /**
     * Actualizar el carrito
     * @param Request $data
     */
	public function updateCantProduct( Request $data )
    {
		$cant      = $data -> input('cant');
		$id        = $data -> input('id');
		$productos = \Session::get('productos');

		$_k = 0; 
		foreach ($productos as $key => $value)
        {
            if( $value['id'] == $id )
            {
				$_k = $key; 
			}
		}
		$productos[$_k]['cant']         = $cant;
        $productos[$_k]['max_items']    = $data -> input('max');

		\Session::forget('productos');
		\Session::put('productos', $productos );
		$subtotal   = $this -> getTotalCart();

        echo json_encode( ['subtotal' => $subtotal] );
	}

}