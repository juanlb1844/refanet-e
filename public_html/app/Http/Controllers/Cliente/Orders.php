<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Mail; 
//use App\Openpay; 
use Illuminate\Http\Request;
  
class Orders extends BaseController
{	 
	public function createOrder() {
		$products = \Session::get('productos');
		if( $products ) {
			foreach( $products as $product ) {
				print_r( $product ); 
			}
		}
		\Session::forget('productos'); 
	} 
}