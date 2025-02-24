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
 
include_once 'Cliente/Carrito.php'; 
include_once 'Cliente/Home.php'; 
 
class Openpay extends BaseController
{	
  
	public function video() {
		return view('video'); 
	}

	public function _getSubTotalCart() {
 			$cart = new Cliente\Carrito; 
 			return $cart->getTotalCart(); 
 		} 

	public function try() { 
		print_r( \Session::get('send') ); 

		return;  
		//\Session::flush();
		$cart 	= new Cliente\Home; 
		print_r( $cart->_getTotalCart() ); 
		print_r( \Session::get('send')['method'] );  
		print_r( \Session::get('send')['option'] ); 
		return; 
		date_default_timezone_set('America/Mexico_City');
	    echo( date("d/m/Y") ); 
		return; 
			$productos = \Session::get('productos');
				foreach ($productos as $key => $producto ) { 
					echo $producto['precio_especial_1']; 
				}


		return; 
		echo \Session::get('user')->grupo; 
		print_r( \Session::get('productos') ); 
		return; 
		$direction = "";  
		echo \Session::get('send')['method']; 
						if( \Session::get('send')['method'] == 'Recoger en sucursal') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE id = ".\Session::get('send')['option']); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}

		print_r( $direction ); 
		return; 
		 //return view('emails-layout-ae'); 

		 	 $to_name = "Juan López Bravo"; 
	 		 $to_email = "juanlb1844@gmail.com";
	 		 $correo = "juanlb1844@gmail.com"; 
	 		 $telefono = "3322035064"; 
	 		 $nombre = "Juan"; 
	 		 $apellidos = "López Bravo";  
	 		 $_total = 1000; 
	 		 $folio_sitio = "FO10198"; 
	 		 $dataEmail  = array($to_email, "juanlb1844@gmial.com");   
	 		 //$dataEmail  = array($to_email);     
 			 
 			 $cart 	= new Cliente\Home; 

	 				 $to_email   = $dataEmail; 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => 
  			 		 	 ['nombre' => $nombre, 
                          'apellidos' => $apellidos, 
                          'correo' => $correo, 
                          'telefono' => $telefono, 
                          'path' => '..',   
                          'code' => "..",     
                          'type' => 'SUCURSAL',  
                          'productos' => \Session::get('productos'), 
                          'subtotal' => $this->_getSubTotalCart(), 
                          'total' => $cart->_getTotalCart(), 
                          'folio' => $folio_sitio,  
                          'method_send' => "FEDEX", 
                          'option_send' => "2 días", 
                          'price_send'  =>  200, 
                          'direction'   => "------",  
                          'direction_susucrsal'  => "----", 
                          'direction_maps'       => "-------------"
		                  ]);
	 	 
					$status = Mail::send("emails-layout-ae", $data, function($message) use ( $to_name, $to_email, $dataEmail ) { 
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});     
 
		return; 
		print_r(  \Session::get('cgo')  ); 
		return; 
		$cart = new Cliente\Home;  
		$cartt = new Cliente\Carrito; 
		print_r( $cartt->getTotalCart() ); 
		echo "<br>"; 
		print_r( \Session::get('descuento') ); 
		echo "<br>"; 
		print_r( \Session::get('send')['method'] ); 
		print_r( \Session::get('send')['option'] ); 
		//print_r( json_encode( \Session::get('productos') ) ); 
		return; 
		Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
          $message->to($dataEmail, $to_name) 
          ->subject("BEGIMA.com");   
          $message->from("contacto@begima.com", "BEGIMA.com");
      	}); 

		return; 

		require_once(dirname(__FILE__) . '/Openpay/sdk/Openpay.php');  
		$openpay = \Openpay::getInstance('mkcuj3uqoeeccp4qhaoi', 'sk_6299845c989844e7945e0ab52106543f');

		$customerData = array( 
				     'name' => "prueba", 
				     'last_name' => "prueba",
				     'email' => "prueba@prueba.com",
				     'requires_account' => false,
				     'phone_number' => "3322010101", 
				     'address' => array( 
				         'line1' => "direccion", 
				         'state' => "direccion", 
				         'city' => "Zapopan", 
				         'postal_code' => "45138", 
				         'country_code' => 'MX'
				      )
				   );
  
		$customer = $openpay->customers->add($customerData);
 
		$chargeRequest = array(
		    'method' => 'bank_account',
		    'amount' => 106.06,  
		    'description' => 'Cargo con tienda',
		    'order_id' => 'ECOMMERCE-1-2-E',
		    'due_date' => '2021-09-05T13:45:00'); 
		$chargeRequest["customer"] = $customerData; 

		$openpay->charges->create($chargeRequest);
		return;  

		$customerData = array( 
				     'name' => "prueba", 
				     'last_name' => "prueba",
				     'email' => "prueba@prueba.com",
				     'requires_account' => false,
				     'phone_number' => "3322010101", 
				     'address' => array( 
				         'line1' => "direccion", 
				         'state' => "direccion", 
				         'city' => "Zapopan", 
				         'postal_code' => "45138", 
				         'country_code' => 'MX'
				      )
				   );
  
		$customer = $openpay->customers->add($customerData);

		$chargeRequest = array(
		    'method' => 'store',
		    'amount' => 105.05,
		    'description' => 'Cargo con tienda',
		    'order_id' => 'ECOMMERCE-1-2-D',
		    'due_date' => '2021-09-05T13:45:00'); 
		$chargeRequest["customer"] = $customerData; 

		$openpay->charges->create($chargeRequest);
		return;  
 	}

	public function tienda() {
		DB::table("nissan_nparte2")->where("id", "65678")->update(["price" => 106.06]); 
		return;   
		$openpay = Openpay::getInstance('mzdtln0bmtms6o3kck8f', 'sk_e568c42a6c384b7ab02cd47d2e407cab');

		$chargeRequest = array(
		    'method' => 'alipay',
		    'amount' => 100,
		    'description' => 'Cargo Alipay',
		    'order_id' => 'oid-00055',
		    'redirect_url' => 'http://www.example.com/myRedirectUrl');

		$customer = $openpay->customers->get('ag4nktpdzebjiye1tlze');
		$charge = $customer->charges->create($chargeRequest);
	}

	public function tryMail() {
		 //print_r( json_encode( $charge->serializableData ) ); 
	 	$nombre = "Prueba"; 
	 	$to_email = "juanlb1844@gmail.com"; 
	 	$correo = $to_email; 
	 	$to_name = $nombre;   
	 	$apellidos = "prueba"; 
	 	$path = "path"; 
	 	$telefono = "3322035964"; 
	 	$to_email = $correo; 
	 	$dataEmail  = array($to_email);   
		$to_email   = $dataEmail; 
	 	$data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
                                                          'apellidos' => $apellidos, 
                                                          'correo' => $correo, 
                                                          'telefono' => $telefono, 
                                                          'path' => $path,   
                                                          'code' => "..", 
                                                          'type' => 'spei',  
                                                          'productos' => \Session::get('productos') ] );
	
		$status = Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
          $message->to($dataEmail, $to_name) 
          ->subject("Datos de tu compra en Begima");    
          $message->from("compras@begima.com.mx", "www.begima.com.mx");
      	});  
	}

	public function registroCompra ( Request $data ) {
		$nombre    		= $data->input('nombre'); 
		$apellidos 		= $data->input('apellidos'); 
		$telefono  		= $data->input('telefono'); 
		$correo    		= $data->input('correo'); 
		$estado    		= $data->input('estado'); 
		$ciudad    		= $data->input('ciudad'); 
		$cp 	   	    = $data->input('cp'); 
		$direccion      = $data->input('cireccion');  
		$method_send    = $data->input('method_send');  
		$option_send    = $data->input('option_send');  
		$registroCompra = $data->input('collection_date'); 
		$payStore       = $data->input('pay-store-option'); 

		$direction 		= ''; 
		$direction_maps = '';  
		if( \Session::get('send')['method'] == 'recoger en tienda') {
				$method_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'")[0]; 
				$direction = $method_send->direction; 
				$direction_maps = $method_send->direction_maps; 
		}

		$dtz = new \DateTimeZone("America/Mexico_City");  
		$dt  = new \DateTime("now", $dtz);
 
		$cart 	= new Cliente\Home; 
		$_total = $cart->_getTotalCart(); 

		$folio_sitio =  $this->genRandId(7); 
 		 		 
		DB::table('nissan_pedidos')->insert([
									'nombre_cliente'    => $nombre. " " .$apellidos, 
									'telefono_cliente'  => $telefono, 
									'fecha_encargo'     => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente'    => $correo, 
									'estado_cliente'    => $estado, 
									'ciudad_cliente'    => $ciudad, 
									'cp_cliente' 	    => $cp,   
									'direccion_cliente' => $direccion, 
									'method_pay' 		=> 'SUCURSAL', 
									'total'			    => $_total, 
									'status' 		    => 'pendiente',  
									'folio' 			=> $folio_sitio,  
									'id_openpay' => $folio_sitio,  
									'method_send' => \Session::get('send')['method'], 
									'option_send' => \Session::get('send')['option'], 
									'price_send'  => \Session::get('send')['price'],  
									'store_to_pay' => $payStore,  
									'fecha_recollection' => $registroCompra
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
		 											'img'           => $value['img'], 
		 											'textura'		=> $value['textura'], 
													'color'			=> $value['color'], 
													'alias'			=> $value['alias'],
													'paquete'		=> $value['paquete']  
		 											]); 
		 } 

  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		  
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");   
  			 		 //$dataEmail  = array($to_email);     
 
	 				 $to_email   = $dataEmail; 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => '..',   
		                                                              'code' => "..",     
		                                                              'type' => 'SUCURSAL',  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
		                                                              'total' => $_total, 
		                                                              'folio' => $folio_sitio,  
		                                                              'method_send' => \Session::get('send')['method'], 
		                                                              'option_send' => \Session::get('send')['option'], 
		                                                              'price_send'  => \Session::get('send')['price'], 
		                                                              'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,  
		                                                              'direction_susucrsal'  => $direction, 
		                                                              'direction_maps'       => $direction_maps
		                                                          ]);
	 	 
					$status = Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) { 
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});     
 
		echo $folio_sitio; 
		
	}

	// función para generar el cargo en OPENPAY 
	public function cargo( Request $data ) {
		require_once(dirname(__FILE__) . '/Openpay/sdk/Openpay.php');  
		//require('Openpay/sdk/Openpay.php'); 
		$cart 	= new Cliente\Home; 
		$dtz    = new \DateTimeZone("America/Mexico_City");  
		$dt     = new \DateTime("now", $dtz);

		$method_pay = $data->input('mathod'); 
		$id         = $data->input('id');  
  
		$config_cargo = $cart->_getTotalCart(); 
   
		$config_due   = 2; 
 		$external_id  = null;  
 		$id_openpay   = null; 

 		//echo $config_cargo; return; 
 
		if( $method_pay == 'tarjeta' ) { 
		 
				$titular  = $data->input('titular'); 
				$anio     = $data->input('expiraAnio'); 
				$mes      = $data->input('expiraMes');  
				$cv       = $data->input('cv'); 
				$apellido = $data->input('apellido'); 
				$telefono = $data->input('telefono'); 
				$correo   = $data->input('correo');  

				// string para antifraudes 
				$device   = $data->input('device'); 
		  	
				$nombre     = $data->input('nombre'); 
				$apellidos  = $data->input('apellidos'); 
				$id_unidad  = $data->input('id_unidad');  
				$path       = $data->input('path');   
				$ciudad     = $data->input('ciudad'); 
				$estado     = $data->input('estado'); 
				$direccion  = $data->input('direccion'); 
				$cp         = $data->input('cp'); 
 
				// CREDENCIALES PRIVADAS  
				// prueba sk_6299845c989844e7945e0ab52106543f
				// producción sk_a8e38ff49d104c099e7fb7b969c47f86
				// prueba mkcuj3uqoeeccp4qhaoi
				// producción mbs3pxfh8gqtec2i5qjy
   
				$openpay = \Openpay::getInstance('mbs3pxfh8gqtec2i5qjy',
				  'sk_a8e38ff49d104c099e7fb7b969c47f86');
				\Openpay::setProductionMode(true); 
				

				$customer = array(
					     'name'         => $titular,
					     'last_name'    => $apellido, 
					     'phone_number' => $telefono,
					     'email'        => $correo
					 ); 
				 
				$folio_sitio =  $this->genRandId(7);

				$chargeData = array( 
					    'method'            => 'card',  
					    'source_id'         => $id,  
					    'currency' 			=> 'MXN', 
					    'amount' 	        => "$config_cargo", 
					    'description'       => 'FOLIO:'. $folio_sitio .' COMPRA DE BEGIMA.COM',
					    'use_card_points'   => false, 
					    'device_session_id' => $device,
					    'customer'          => $customer
				    );
				
				try {
					$charge      = $openpay->charges->create($chargeData);	
				} catch (Exception $e) {
				    return print_r( $e ); 
				}

				$external_id =  $this->genRandId(21); 
 
				// registrar local 
				$id_openpay = $charge->id; 
				$dreferencia = $data->input('dreferencia');  
				DB::table('nissan_pedidos')->insert([
					'nombre_cliente' => $nombre. " " .$apellidos, 
					'telefono_cliente' => $telefono, 
					'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
					'correo_cliente' => $correo, 
					'estado_cliente' => $estado, 
					'ciudad_cliente' => $ciudad, 
					'cp_cliente' => $cp,  
					'direccion_cliente' => $direccion, 
					'method_pay' => 'TARJETA '.$charge->card->brand, 
					'id_orden_pago' => $external_id,  
					'id_openpay' =>  $charge->id, 
					'total' => $config_cargo, 
					'status' => 'pendiente', 
					'folio' => $folio_sitio,  
					'method_send' => \Session::get('send')['method'], 
					'option_send' => \Session::get('send')['option'], 
					'price_send'  => \Session::get('send')['price'], 
					'referencia_direccion' => $dreferencia
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

  			 		 $direction_maps = ""; 
  					 $direction      = ""; 
						if( \Session::get('send')['method'] == 'recoger en tienda') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'"); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}
  			 		 //print_r( json_encode( $charge->serializableData ) ); 
  			 		 $referencia_op = $charge->id;  
  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		 //$dataEmail  = array($to_email);   
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");   
	 				 $to_email   = $dataEmail; 

	 				 $dreferencia = $data->input('dreferencia'); 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'TARJETA',    
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => \Session::get('send')['method'], 
													                  'option_send' => \Session::get('send')['option'], 
													                  'price_send'  => \Session::get('send')['price'], 
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,
													                  'total' => $cart->_getTotalCart(), 
		                                                              'subtotal' => $cart->_getSubTotalCart(),  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps, 
													                  'referencia_direccion' => $dreferencia  ] );
	 		
					$status = Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
 
				//print_r($charge); 
				print_r( json_encode(array("external_id" => $external_id, "folio" => $folio_sitio, "id_openpay" => $charge->id)) );  
    
		} else if ( $method_pay == 'spei' || $method_pay == 'tiendas' ) {
   
				$openpay = \Openpay::getInstance('mbs3pxfh8gqtec2i5qjy','sk_a8e38ff49d104c099e7fb7b969c47f86');
				\Openpay::setProductionMode(true);  

  				$Date     = date("Y-m-d");  
				$due_date = date('Y-m-d', strtotime($Date. ' + '.$config_due.' days'));

  				$nombre      = $data->input('nombre');  
				$apellidos   = $data->input('apellidos'); 
				$telefono    = $data->input('telefono'); 
				$correo      = $data->input('correo'); 
				$estado      = $data->input('estado'); 
				$ciudad      = $data->input('ciudad');  
				$cp          = $data->input('cp'); 
				$direccion   = $data->input('cireccion'); 

				if( strlen($direccion) > 48 ) {
					$direccion = substr($direccion, 0, 49); 
				}
				$id_unidad = $data->input('id_unidad');  
				$path      = $data->input('path');  
 
				$external_id =  $this->genRandId(21);

  				$customerData = array( 
				     'external_id'      => $external_id,
				     'name'             => $nombre, 
				     'last_name'        => $apellidos,
				     'email'            => $correo, 
				     'requires_account' => false,
				     'phone_number'     => $telefono, 
				     'address' => array( 
				         'line1' => $direccion, 
				         'line2' => $direccion, 
				         'line3' => $direccion,
				         'state' => $estado, 
				         'city' => $ciudad, 
				         'postal_code' => $cp, 
				         'country_code' => 'MX'
				      )
				   );

				$customer = $openpay->customers->add($customerData);

				if($method_pay == 'tiendas') {
					$chargeRequest = array(
					    'method' => 'store', 
					    'amount' => $config_cargo, 
					    'description' => 'Compra en www.begima.com.mx',
					    'order_id' => $this->genRandId(9), 
					    'due_date' => $due_date.'T23:00:00');

					$customer = $openpay->customers->get( $customer->id );
					$charge = $customer->charges->create($chargeRequest); 

					$forma_pago = "PAGO EN TIENDA"; 
					//print_r( $charge->payment_method ); 
					//print_r( $charge->payment_method->reference ); 
  			 		$referencia_op = $charge->payment_method->reference; 

  			 		 $data = array("name"=>"BEGIMA", "body" => ['nombre' => $nombre, 
                                                                   'apellidos' => $apellidos, 
                                                                   'correo' => $correo, 
                                                                   'telefono' => $telefono, 
                                                                   'path' => $path,   
                                                                   'code' => $charge->payment_method->reference, 
                                                                   'type' => 'tienda' ] );
  			 		 $folio_sitio =  $this->genRandId(7);
  			 		 $external_id =  $this->genRandId(21);

  			 		 $dreferencia = $data->input('dreferencia'); 

  			 		 DB::table('nissan_pedidos')->insert([
									'nombre_cliente' => $nombre. " " .$apellidos, 
									'telefono_cliente' => $telefono, 
									'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente' => $correo, 
									'estado_cliente' => $estado, 
									'ciudad_cliente' => $ciudad, 
									'cp_cliente' => $cp,   
									'direccion_cliente' => $direccion, 
									'method_pay' => 'PAYNET', 
									'id_orden_pago' => $external_id,  
									'id_openpay' =>  $referencia_op, 
									'total' => $config_cargo, 
									'status' => 'pendiente', 
									'folio' => $folio_sitio, 
									'method_send' => \Session::get('send')['method'], 
									'option_send' => \Session::get('send')['option'], 
									'price_send'  => \Session::get('send')['price'], 
									'referencia_direccion' => $dreferencia 
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

  			 		 
  			 		  $direction_maps = ""; 
  					 $direction = ""; 
						if( \Session::get('send')['method'] == 'recoger en tienda') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'"); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}
  			 		 //print_r( json_encode( $charge->serializableData ) ); 
  			 		 print_r( $referencia_op ); 
  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		 //$dataEmail  = array($to_email);  
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");    
	 				 $to_email   = $dataEmail; 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'PAYNET',  
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => \Session::get('send')['method'], 
													                  'option_send' => \Session::get('send')['option'], 
													                  'price_send'  => \Session::get('send')['price'], 
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,
													                  'total' => $cart->_getTotalCart(), 
		                                                              'subtotal' => $cart->_getSubTotalCart(),  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps ] );
	 		
					$status = Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
			  		 
				} else if( $method_pay == 'spei' ) {

				$dreferencia = $data->input('dreferencia');  

				$forma_pago = "TRANSEFERENCIA O DEPÓSITO BANCARIO"; 
				$chargeRequest = array( 
									    'method'	   => 'bank_account', 
									    'amount'	   => $config_cargo, 
									    'description'  => 'Compra en www.begima.com.mx',
									    'order_id' 	   => $this->genRandId(9),  
									    'redirect_url' => 'http://www.begima.com.mx/'); 
				 
				$customer = $openpay->customers->get( $customer->id );
				$charge = $customer->charges->create($chargeRequest);
				
				$folio_sitio =  $this->genRandId(7);

				$external_id =  $this->genRandId(21);
 
				 print_r( $charge->id ); 
				//print_r( $charge->payment_method->id );  
  			 	    
  			 	 $referencia_op = $charge->id;  

  			 	   DB::table('nissan_pedidos')->insert([
									'nombre_cliente' => $nombre. " " .$apellidos, 
									'telefono_cliente' => $telefono, 
									'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente' => $correo, 
									'estado_cliente' => $estado, 
									'ciudad_cliente' => $ciudad, 
									'cp_cliente' => $cp,   
									'direccion_cliente' => $direccion, 
									'method_pay' => 'SPEI', 
									'id_orden_pago' => $external_id,  
									'id_openpay' =>  $referencia_op, 
									'total' => $config_cargo, 
									'status' => 'pendiente', 
									'folio' => $folio_sitio,  
									'referencia_direccion' => $dreferencia, 
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


 				  	$direction_maps = ""; 
  					$direction = ""; 
						if( \Session::get('send')['method'] == 'recoger en tienda') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'"); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}	

  			 	  $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'SPEI',  
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => \Session::get('send')['method'], 
													                  'option_send' => \Session::get('send')['option'], 
													                  'price_send'  => \Session::get('send')['price'], 
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,
													                  'total' => $cart->_getTotalCart(), 
		                                                              'subtotal' => $cart->_getSubTotalCart(),  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps ] );
	 				$to_name    = $nombre; 
  			 		$to_email   = $correo; 
  			 		//$dataEmail  = array($to_email);   
  			 		$dataEmail  = array($to_email, "peni.begima@gmail.com");   
	 				$to_email   = $dataEmail; 
 
					$status = Mail::send("emails-apartado-spei", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");     
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
				}
 
				  
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


	////////////////////////////////////// 
	///////////////////////////////////// MAIN


	public function registroCompra2( Request $data ) {


		$nombre    		= $data->input('nombre'); 
		$apellidos 		= $data->input('apellidos'); 
		$telefono  		= $data->input('telefono'); 
		$correo    		= $data->input('correo'); 
		//$estado    	= $data->input('estado'); 
		//$ciudad    	= $data->input('ciudad'); 
		//$cp 	   	    = $data->input('cp'); 
		//$direccion    = $data->input('cireccion');  
		$method_send    = $data->input('method_send');  
		$option_send    = $data->input('option_send');  
		$registroCompra = $data->input('collection_date'); 
		//$payStore       = $data->input('pay-store-option'); 

		$direction 		= '';  
		$direction_maps = '';  
		$direction_name = '';  
		$_option = trim(\Session::get('send')['option']);  
		if( \Session::get('send')['method'] == 'Recoger en sucursal') {
				$_option = intval($_option); 
				$method_send = DB::select("SELECT * FROM sucursales WHERE id = ".$_option."")[0]; 
				$direction = $method_send->direction; 
				$direction_maps = $method_send->direction_maps; 
				$direction_name = $method_send->name; 
		}


		$dtz = new \DateTimeZone("America/Mexico_City");  
		$dt  = new \DateTime("now", $dtz);
 
		$cart 	= new Cliente\Home; 
		$_total = $cart->_getTotalCart(); 

		$folio_sitio =  $this->genRandId(7); 
 		 		 
		DB::table('nissan_pedidos')->insert([
									'nombre_cliente'    => $nombre. " " .$apellidos, 
									'telefono_cliente'  => $telefono, 
									'fecha_encargo'     => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente'    => $correo, 
									'estado_cliente'    => "", 
									'ciudad_cliente'    => "",  
									'cp_cliente' 	    => "",   
									'direccion_cliente' => "", 
									'method_pay' 		=> 'SUCURSAL', 
									'total'			    => $_total, 
									'status' 		    => 'pendiente',  
									'folio' 			=> $folio_sitio,  
									'id_openpay'  => $folio_sitio,   
									'method_send' => \Session::get('send')['method'], 
									'option_send' => $direction_name, 
									'price_send'  => \Session::get('send')['price'],  
									'store_to_pay' => "",   
									'fecha_recollection' => $registroCompra
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
		 											'img'           => $value['img'], 
		 											'textura'		=> $value['textura'], 
													'color'			=> $value['color'], 
													'alias'			=> $value['alias'],
													'paquete'		=> $value['paquete']  
		 											]); 
		 } 




  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		  
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");   
  			 		 //$dataEmail  = array($to_email);       
  
	 				 $to_email   = $dataEmail; 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo,  
		                                                              'telefono' => $telefono, 
		                                                              'path' => '..',   
		                                                              'code' => "..",      
		                                                              'type' => 'SUCURSAL',  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
		                                                              'total' => $_total, 
		                                                              'folio' => $folio_sitio,  
		                                                              'method_send' => \Session::get('send')['method'], 
		                                                              'option_send' => \Session::get('send')['option'], 
		                                                              'price_send'  => \Session::get('send')['price'], 
		                                                              'direction'   => "Jalisco",  
		                                                              'direction_susucrsal'  => $direction, 
		                                                              'direction_maps'       => $direction_maps
		                                                          ]);
	 	 
					$status = Mail::send("emails-layout-ae", $data, function($message) use ( $to_name, $to_email, $dataEmail ) { 
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});     
 
		echo $folio_sitio;  
		
	} 


	// función para generar el cargo en OPENPAY 
	public function cargo2( Request $data ) { 
		require_once(dirname(__FILE__) . '/Openpay/sdk/Openpay.php');  
		//require('Openpay/sdk/Openpay.php'); 
		$cart 	= new Cliente\Home; 
		$dtz    = new \DateTimeZone("America/Mexico_City");  
		$dt     = new \DateTime("now", $dtz);

		$method_pay = $data->input('mathod'); 
		$id         = $data->input('id');  
    
		$config_cargo = $cart->_getTotalCart() - \Session::get('descuento'); 
   
		$config_due   = 2; 
 		$external_id  = null;  
 		$id_openpay   = null; 

 		//echo $config_cargo; return; 
 
		if( $method_pay == 'tarjeta' ) { 
		 
				$titular  = $data->input('titular'); 
				$anio     = $data->input('expiraAnio'); 
				$mes      = $data->input('expiraMes');  
				$cv       = $data->input('cv'); 
				$apellido = $data->input('apellido'); 
				$telefono = $data->input('telefono'); 
				$correo   = $data->input('correo');  

				// string para antifraudes 
				$device   = $data->input('device'); 
		  	 
				$nombre     = $data->input('nombre'); 
				$apellidos  = $data->input('apellidos'); 
				$id_unidad  = $data->input('id_unidad');  
				$path       = $data->input('path');   
				$ciudad     = $data->input('ciudad'); 
				$estado     = $data->input('estado'); 
				$direccion  = $data->input('direccion'); 
				$cp         = $data->input('cp');

				$terminacion = $data->input('terminacion');   
 
				// CREDENCIALES PRIVADAS  
				// prueba sk_6299845c989844e7945e0ab52106543f
				// producción sk_a8e38ff49d104c099e7fb7b969c47f86
				// prueba mkcuj3uqoeeccp4qhaoi
				// producción mbs3pxfh8gqtec2i5qjy
       
				$openpay = \Openpay::getInstance('mbs3pxfh8gqtec2i5qjy',
				  'sk_a8e38ff49d104c099e7fb7b969c47f86');
				\Openpay::setProductionMode(true); 
				  
 
				$customer = array(
					     'name'         => $titular,
					     'last_name'    => $apellido, 
					     'phone_number' => $telefono,
					     'email'        => $correo
					 ); 
				 
				$folio_sitio =  $this->genRandId(7);

				$chargeData = array( 
					    'method'            => 'card',  
					    'source_id'         => $id,  
					    'currency' 			=> 'MXN', 
					    'amount' 	        => "$config_cargo", 
					    'description'       => 'FOLIO:'. $folio_sitio .' COMPRA DE BEGIMA.COM',
					    'use_card_points'   => false, 
					    'device_session_id' => $device,
					    'customer'          => $customer
				    );
				
				try {
					$charge      = $openpay->charges->create($chargeData);	
				} catch (Exception $e) {
				    return print_r( $e ); 
				}

				$external_id =  $this->genRandId(21); 
 
				// registrar local 
				$id_openpay = $charge->id; 
				$dreferencia = $data->input('dreferencia');  
				DB::table('nissan_pedidos')->insert([
					'nombre_cliente' => $nombre. " " .$apellidos, 
					'telefono_cliente' => $telefono, 
					'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
					'correo_cliente' => $correo, 
					'estado_cliente' => $estado, 
					'ciudad_cliente' => $ciudad, 
					'cp_cliente' => $cp,  
					'direccion_cliente' => $direccion, 
					'method_pay' => 'TARJETA '.$charge->card->brand, 
					'id_orden_pago' => $external_id,  
					'id_openpay' =>  $charge->id, 
					'total' => $config_cargo, 
					'status' => 'pendiente', 
					'folio' => $folio_sitio,   
					'method_send' => \Session::get('send')['method'], 
					'option_send' => \Session::get('send')['option'], 
					'price_send'  => \Session::get('send')['price'], 
					'referencia_direccion' => $dreferencia, 
					'terminacion' => $terminacion 
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

  			 		 $direction_maps = ""; 
  					 $direction      = ""; 
						if( \Session::get('send')['method'] == 'recoger en tienda') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE name = '".\Session::get('send')['option']."'"); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}
  			 		 //print_r( json_encode( $charge->serializableData ) ); 
  			 		 $referencia_op = $charge->id;  
  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		 //$dataEmail  = array($to_email);   
  			 		 $dataEmail  = array($to_email);   
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");     
	 				 $to_email   = $dataEmail; 

	 				 $dreferencia = $data->input('dreferencia'); 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'TARJETA',
		                                                              'terminacion'  => $terminacion, 
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => \Session::get('send')['method'], 
													                  'option_send' => \Session::get('send')['option'], 
													                  'price_send'  => \Session::get('send')['price'], 
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,
													                  'total' => $cart->_getTotalCart(), 
		                                                              'subtotal' => $cart->_getSubTotalCart(),  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps, 
													                  'referencia_direccion' => $dreferencia  ] );
	 		
					$status = Mail::send("emails-layout-ae", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
 
				//print_r($charge); 
				print_r( json_encode(array("external_id" => $external_id, "folio" => $folio_sitio, "id_openpay" => $charge->id)) );  
    
		} else if ( $method_pay == 'spei' || $method_pay == 'tiendas' ) {
   				
   				$dreferencia = $data->input('dreferencia'); 
   				// CREDENCIALES PRIVADAS  
				// prueba sk_6299845c989844e7945e0ab52106543f
				// producción sk_a8e38ff49d104c099e7fb7b969c47f86
				// prueba mkcuj3uqoeeccp4qhaoi
				// producción mbs3pxfh8gqtec2i5qjy
				$openpay = \Openpay::getInstance('mbs3pxfh8gqtec2i5qjy','sk_a8e38ff49d104c099e7fb7b969c47f86');
				\Openpay::setProductionMode(true);  
   
  				$Date     = date("Y-m-d");  
				$due_date = date('Y-m-d', strtotime($Date. ' + '.$config_due.' days'));

  				$nombre      = $data->input('nombre');  
				$apellidos   = $data->input('apellidos'); 
				$telefono    = $data->input('telefono'); 
				$correo      = $data->input('correo'); 
				$estado      = $data->input('estado'); 
				$ciudad      = $data->input('ciudad');  
				$cp          = $data->input('cp'); 
				$direccion   = $data->input('cireccion'); 

				if( strlen($direccion) > 48 ) {
					$direccion = substr($direccion, 0, 49); 
				}
				$id_unidad = $data->input('id_unidad');  
				$path      = $data->input('path');  
 
				$external_id =  $this->genRandId(21);


				 $method_en = \Session::get('send')['method']; 
  			 		 $option_send = \Session::get('send')['option']; 
  			 		 $price_send = \Session::get('send')['price']; 
  			 		 if( trim($method_en) == 'Recoger en sucursal') {
  			 		 	$option_send = DB::select("SELECT * FROM sucursales WHERE id = ".\Session::get('send')['option'])[0]->name; 
  			 		 	$price_send = 0; 
  			 		 	$estado = "Jalisco"; 
  			 		 	$direccion = "no solicitada";  
  			 		 	$cp = "NS"; 
  			 		 	$ciudad = "no solicitada"; 
  			 		 	$collection_date = $data->input('collection_date'); 
  			 		 }

  				$customerData = array( 
				     'external_id'      => $external_id,
				     'name'             => $nombre, 
				     'last_name'        => $apellidos,
				     'email'            => $correo, 
				     'requires_account' => false,
				     'phone_number'     => $telefono, 
				     'address' => array( 
				         'line1' => $direccion, 
				         'line2' => $direccion, 
				         'line3' => $direccion,
				         'state' => $estado, 
				         'city' => $ciudad, 
				         'postal_code' => $cp, 
				         'country_code' => 'MX'
				      )
				   );

				$customer = $openpay->customers->add($customerData);

				if($method_pay == 'tiendas') {
					$chargeRequest = array(
					    'method' => 'store', 
					    'amount' => $config_cargo, 
					    'description' => 'Compra en www.begima.com.mx',
					    'order_id' => $this->genRandId(9), 
					    'due_date' => $due_date.'T23:00:00');

					$customer = $openpay->customers->get( $customer->id );
					$charge = $customer->charges->create($chargeRequest); 

					$forma_pago = "PAGO EN TIENDA"; 
					//print_r( $charge->payment_method ); 
					//print_r( $charge->payment_method->reference ); 
  			 		$referencia_op = $charge->payment_method->reference; 

  			 		 $data = array("name"=>"BEGIMA", "body" => ['nombre' => $nombre, 
                                                                   'apellidos' => $apellidos, 
                                                                   'correo' => $correo, 
                                                                   'telefono' => $telefono, 
                                                                   'path' => $path,   
                                                                   'code' => $charge->payment_method->reference, 
                                                                   'type' => 'tienda' ] );
  			 		 $folio_sitio =  $this->genRandId(7);
  			 		 $external_id =  $this->genRandId(21);

  			 		
  			 		 //$dreferencia = $data->input('dreferencia');  
 
  			 		 DB::table('nissan_pedidos')->insert([
									'nombre_cliente' => $nombre. " " .$apellidos, 
									'telefono_cliente' => $telefono, 
									'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente' => $correo, 
									'estado_cliente' => $estado, 
									'ciudad_cliente' => $ciudad, 
									'cp_cliente' => $cp,   
									'direccion_cliente' => $direccion, 
									'method_pay' => 'PAYNET', 
									'id_orden_pago' => $external_id,  
									'id_openpay' =>  $referencia_op, 
									'total' => $config_cargo, 
									'status' => 'pendiente', 
									'folio' => $folio_sitio,    
									'method_send' => $method_en, 
									'option_send' => $option_send, 
									'price_send'  => $price_send, 
									'referencia_direccion' => $dreferencia, 
									'fecha_recollection' => $collection_date
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

  			 		 
  			 		 $direction_maps = ""; 
  					 $direction = "";   
						if( \Session::get('send')['method'] == 'Recoger en sucursal') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE id = ".\Session::get('send')['option']); 
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return; 
						}
  			 		 //print_r( json_encode( $charge->serializableData ) ); 
  			 		 print_r( $referencia_op ); 
  			 		 $to_name = $nombre; 
  			 		 $to_email = $correo; 
  			 		 //$dataEmail  = array($to_email);   
  			 		 $dataEmail  = array($to_email, "peni.begima@gmail.com");    
	 				 $to_email   = $dataEmail; 
  			 		 $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'PAYNET',   
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => $method_en, 
													                  'option_send' => $option_send, 
													                  'price_send'  => $price_send,   
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp,
													                  'total' => $cart->_getTotalCart(), 
		                                                              'subtotal' => $cart->_getSubTotalCart(),  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps ] );
	 		
					$status = Mail::send("emails-layout-ae", $data, function($message) use ( $to_name, $to_email, $dataEmail ) { 
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");    
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
			  		 
				} else if( $method_pay == 'spei' ) {

				$dreferencia = $data->input('dreferencia');  
				$dentre      = $data->input('dentre');  

				$forma_pago = "TRANSEFERENCIA O DEPÓSITO BANCARIO"; 
				$chargeRequest = array( 
									    'method'	   => 'bank_account', 
									    'amount'	   => $config_cargo, 
									    'description'  => 'Compra en www.begima.com.mx',
									    'order_id' 	   => $this->genRandId(9),  
									    'redirect_url' => 'http://www.begima.com.mx/'); 
				 
				$customer = $openpay->customers->get( $customer->id );
				$charge = $customer->charges->create($chargeRequest);
				
				$folio_sitio =  $this->genRandId(7);

				$external_id =  $this->genRandId(21);
 
				 print_r( $charge->id ); 
				//print_r( $charge->payment_method->id );  
  			 	    
  			 	 $referencia_op = $charge->id;  

  			 	   DB::table('nissan_pedidos')->insert([
									'nombre_cliente' => $nombre. " " .$apellidos, 
									'telefono_cliente' => $telefono, 
									'fecha_encargo' => $dt->format("Y-m-d h:m:s"), 
									'correo_cliente' => $correo, 
									'estado_cliente' => $estado, 
									'ciudad_cliente' => $ciudad, 
									'cp_cliente' => $cp,   
									'direccion_cliente' => $direccion, 
									'method_pay' => 'SPEI', 
									'id_orden_pago' => $external_id,  
									'id_openpay' =>  $referencia_op, 
									'total' => $config_cargo, 
									'status' => 'pendiente', 
									'folio' => $folio_sitio,  
									'referencia_direccion' => $dreferencia, 
									'direccion_entre' => $dentre, 
									'method_send' => $method_en, 
									'option_send' => $option_send,  
									'price_send'  => $price_send, 
									'fecha_recollection' => $collection_date
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


 				  	$direction_maps = ""; 
  					$direction = ""; 
						if( \Session::get('send')['method'] == 'Recoger en sucursal') {
								$suc_send = DB::select("SELECT * FROM sucursales WHERE id = ".\Session::get('send')['option']);  
								$direction = $suc_send[0]->direction;  
								$direction_maps = $suc_send[0]->direction_maps; 
								//print_r( $direction ); return;  
						}	

  			 	  $data = array("name"=>"compras@begima.com.mx", "body" => ['nombre' => $nombre, 
		                                                              'apellidos' => $apellidos, 
		                                                              'correo' => $correo, 
		                                                              'telefono' => $telefono, 
		                                                              'path' => $path,    
		                                                              'code' => "..", 
		                                                              'folio' => $folio_sitio, 
		                                                              'type' => 'SPEI',  
		                                                              'folioop' => $referencia_op,  
		                                                              'productos' => \Session::get('productos'), 
		                                                              'subtotal' => $this->_getSubTotalCart(), 
																	  'method_send' => \Session::get('send')['method'], 
													                  'option_send' => \Session::get('send')['option'], 
													                  'price_send'  => \Session::get('send')['price'], 
													                  'direction'   => $direccion.", ".$ciudad. " ".$estado." ".$cp, 
													                  'total' => ( $cart->_getTotalCart() - \Session::get('descuento') ) ,  
													                  'direction_susucrsal'  => $direction, 
													                  'direction_maps'       =>  $direction_maps ] );
	 				$to_name    = $nombre; 
  			 		$to_email   = $correo; 
  			 		//$dataEmail  = array($to_email);   
  			 		$dataEmail  = array($to_email, "peni.begima@gmail.com");   
	 				$to_email   = $dataEmail; 
 
					$status = Mail::send("emails-layout-ae", $data, function($message) use ( $to_name, $to_email, $dataEmail ) {
			          $message->to($dataEmail, $to_name) 
			          ->subject("Datos de tu compra en Begima");     
			          $message->from("compras@begima.com.mx", "www.begima.com.mx");
			      	});   
				}
 
				  
		}

		  
	} 
  
} 
