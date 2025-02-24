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
 
class MercadoPago extends BaseController
{	


	public function getEnvio() {
		$ml = new Cliente\Home; 
		return $ml->_getSendPrice(); 
	}
	public function tryMl() {  
		if( \Session::get('send')['method'] == 'recoger en tienda') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'"); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								print_r( $direction ); return; 
						}
		return; 
		$ml = new Cliente\Home; 
		echo $this->getEnvio();  
	} 

	public function pago( Request $data ) {
		// SDK de Mercado Pago
		require __DIR__ .  '/mercadopago/vendor/autoload.php';
		// Agrega credenciales 

		//TEST 
		//TEST-7198693691730209-012113-a94341539b264310dd8523d826180c3a-347691321
		//PRODUCCIÓN 
		//APP_USR-7198693691730209-012113-e93eb231b9766b96d65dfc4dd6839b1d-347691321
		 
		\MercadoPago\SDK::setAccessToken('APP_USR-7198693691730209-012113-e93eb231b9766b96d65dfc4dd6839b1d-347691321');

		// Crea un objeto de preferencia
		$preference = new \MercadoPago\Preference();

		// Crea un ítem en la preferencia
		 /*
		$item = new \MercadoPago\Item();
		$item->title = 'Begima'; 
		$item->quantity = 1; 
		$item->unit_price = 20.50;
		*/

		$list_items = array(); 

		$productos = \Session::get('productos');
		foreach ($productos as $key => $producto ) {
			$name_product  = $producto['name']; 
			$price_product = $producto['price']; 
			$cant_product  = $producto['cant']; 
			$img_product   = $producto['img']; 

			if( $producto['promo'] > 0 ) {
				$price_product = $producto['promo']; 
			}

			$item = new \MercadoPago\Item();
			$item->title       = $name_product; 
			$item->quantity    = $cant_product; 
			$item->unit_price  = $price_product;
			$item->picture_url = $img_product; 
			$list_items[]      = $item; 
		}

		$envio = new \MercadoPago\Shipments();
		$envio->cost = $this->getEnvio();   
		//$envio->mode = "custom"; 
    
		$preference->shipments = $envio;  
  
 		$referencia_local = $this->genRandId(7); 

 		$preference->back_urls = array("success" => "https://begima.com.mx/success/".$referencia_local, 
 									   "failure" => "https://begima.com.mx/",
 									   "pending" => "https://begima.com.mx/" 
 									 ); 


		$preference->items                = $list_items;
		$preference->external_reference   = $referencia_local; 
		$preference->statement_descriptor = "Begima S.A DE C.V"; 
		//print_r( $preference->items ); 
		$preference->save();     
		$preference->auto_return = "approved";  

		$cart 	= new Cliente\Home; 
		$_total = $cart->_getTotalCart();

		$client_nombre     = $data->input('nombre'); 
		$client_apellidos  = $data->input('apellidos'); 
		$client_telefono   = $data->input('telefono'); 
		$client_direccion  = $data->input('direccion'); 
		$client_correo     = $data->input('correo'); 
		$client_estado     = $data->input('estado'); 
		$client_ciudad     = $data->input('ciudad'); 
		$client_cp         = $data->input('cp'); 

		$cliente_datos = array('nombre'   => $client_nombre, 
								'apellidos' => $client_apellidos,
								'telefono'  => $client_telefono, 
								'direccion' => $client_direccion, 
								'correo'    => $client_correo, 
								'estado'    => $client_estado,  
								'ciudad'    => $client_ciudad, 
								'cp'        => $client_cp);  
    	 
    	$this->guardarPedido($cliente_datos, $referencia_local, $_total, "MP"); 
 
		print_r( $preference->init_point ); 
	}

  
	function guardarPedido( $client, $local_id, $total, $method ) {
		$dtz = new \DateTimeZone("America/Mexico_City");  
		$dt  = new \DateTime("now", $dtz);   

		 DB::table('nissan_pedidos')->insert([
					'nombre_cliente'    => $client['nombre']." ".$client['apellidos'], 
					'telefono_cliente'  => $client['telefono'], 
					'fecha_encargo'     => $dt->format("Y-m-d h:m:s"), 
					'correo_cliente' 	=> $client['correo'], 
					'estado_cliente'    => $client['estado'],   
					'ciudad_cliente' 	=> $client['ciudad'], 
					'cp_cliente'        => $client['cp'],   
					'direccion_cliente' => $client['direccion'], 
					'method_pay' 	    => $method, 
					'id_orden_pago' 	=> $local_id,  
					'id_openpay' 	    =>  $local_id, 
					'total' 		    => $total,   
					'status' 		    => 'pendiente', 
					'folio' 			=> $local_id, 
					'method_send' => \Session::get('send')['method'], 
					'option_send' => \Session::get('send')['option'], 
					'price_send'  => \Session::get('send')['price'] 
				]);   

			 $last_id = DB::getPdo()->lastInsertId(); 

			foreach ( \Session::get('productos') as $key => $value) {
			 	DB::table('nissan_producto')->insert([ 'id_pedido'      => $last_id, 
			 											'nparte'        => $value['np'], 
			 											'descripcion'   => $value['name'], 
			 											'precio'        => $value['price'],
			 											'talla'         => $value['talla'],
			 											'cant'          => $value['cant'],
			 											'precio_promo'  => $value['promo'],
			 											'img'           => $value['img'] 
			 											]); 
			 } 
	}

	// generar randoms string 
	function genRandId($length = 21) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = ''; 
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    } 
	    return $randomString;
	}



	//* NEW CHECKOUT */ 
 
		public function referenciaMP( Request $data ) {
		// SDK de Mercado Pago
		require __DIR__ .  '/mercadopago/vendor/autoload.php';
		// Agrega credenciales 

		//TEST 
		//TEST-7198693691730209-012113-a94341539b264310dd8523d826180c3a-347691321
		//PRODUCCIÓN 
		//APP_USR-7198693691730209-012113-e93eb231b9766b96d65dfc4dd6839b1d-347691321
		 
		\MercadoPago\SDK::setAccessToken('APP_USR-7198693691730209-012113-e93eb231b9766b96d65dfc4dd6839b1d-347691321');

		// Crea un objeto de preferencia
		$preference = new \MercadoPago\Preference();

		// Crea un ítem en la preferencia
		 /*
		$item = new \MercadoPago\Item();
		$item->title = 'Begima'; 
		$item->quantity = 1; 
		$item->unit_price = 20.50;
		*/

		$list_items = array(); 

		$productos = \Session::get('productos');
		foreach ($productos as $key => $producto ) {
			$name_product  = $producto['name']; 
			$price_product = $producto['price']; 
			$cant_product  = $producto['cant']; 
			$img_product   = $producto['img']; 

			if( $producto['promo'] > 0 ) { 
				$price_product = $producto['promo']; 
			}

     		
			if( $key == 0 AND \Session::get('descuento') > 0 ) {
				$price_product = $price_product - \Session::get('descuento'); 
			}   

			if( $price_product <= 0 ) {
				$price_product = 1; 
			}
			
			if( \Session::has('logueado') AND strlen( \Session::get('logueado')) > 2 ) {
				if ( \Session::get('user')->grupo == 2 ) {
					$price_product = $producto['precio_especial_1']; 
				} else if ( \Session::get('user')->grupo == 3 ) {
					$price_product = $producto['precio_especial_2']; 
				} else if ( \Session::get('user')->grupo == 4 ) {
					$price_product = $producto['precio_especial_3']; 
				} else if ( \Session::get('user')->grupo == 5 ) {
					$price_product = $producto['precio_especial_4']; 
				}
			}

			$item = new \MercadoPago\Item();
			$item->title       = $name_product; 
			$item->quantity    = $cant_product; 
			$item->unit_price  = $price_product;
			$item->picture_url = $img_product; 
			$list_items[]      = $item; 

		}

		$envio = new \MercadoPago\Shipments();
		$envio->cost = $this->getEnvio();   
		//$envio->mode = "custom"; 
    
		$preference->shipments = $envio;  
  
 		$referencia_local = $this->genRandId(7); 

 		$preference->back_urls = array("success" => "https://begima.com.mx/success/".$referencia_local, 
 									   "failure" => "https://begima.com.mx/",
 									   "pending" => "https://begima.com.mx/" 
 									 ); 


		$preference->items                = $list_items;
		$preference->external_reference   = $referencia_local; 
		$preference->statement_descriptor = "Begima S.A DE C.V"; 
		//print_r( $preference->items ); 
		$preference->save();     
		$preference->auto_return = "approved";  

		$cart 	= new Cliente\Home; 
		$_total = $cart->_getTotalCart();


		$client_nombre     = $data->input('nombre'); 
		$client_apellidos  = $data->input('apellidos'); 
		$client_telefono   = $data->input('telefono'); 
		$client_direccion  = $data->input('direccion'); 
		$client_correo     = $data->input('correo'); 
		$client_estado     = $data->input('estado'); 
		$client_ciudad     = $data->input('ciudad'); 
		$client_cp         = $data->input('cp');
		
		$cliente_datos = array('nombre'   => $client_nombre, 
								'apellidos' => $client_apellidos,
								'telefono'  => $client_telefono, 
								'direccion' => $client_direccion, 
								'correo'    => $client_correo, 
								'estado'    => $client_estado,  
								'ciudad'    => $client_ciudad, 
								'cp'        => $client_cp);  
 		echo "registrar pedido"; 
		$this->guardarPedido($cliente_datos, $referencia_local, $_total, "MP");  
		print_r( $preference->init_point ); 
	}
  
} 
