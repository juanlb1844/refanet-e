<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; 

class Auth extends Controller
{ 

  public function tryFb( $token ) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://graph.facebook.com/me?access_token='.$token,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl); 
    //print_r( (array)json_decode($response) ); 

    if( count( (array)json_decode($response)) == 2 ) {
        return array("resp" => "valido", "name" => json_decode($response)->name, "id" => json_decode($response)->id ); 
      } else {
        return array("resp" => "falso");
      }
  }

  // login control 
	public function process( Request $request ) { 
        $type = $request->input('type'); 
        
        if($type == "email") {  
    		    $user = $_GET['email'];     
            $pass = $_GET['password'];   
      
            $data_login = DB::table('nissan_usuarios_clientes')
                                ->where([['correo',  '=',$user], 
                                         ['password','=',$pass]])->get(); 
     
              if( count($data_login) > 0 ) {
              	 $request->session()->put('logueado', $user);  
              	 $request->session()->put('picture',  '');  
                 $request->session()->put('info',     $data_login[0]->nombre );
                 $request->session()->put('user',     $data_login[0] );     
                 $request->session()->save();       
                 return redirect('/index');   
              } else {
              	 return redirect('/');    
              }
        } else {
          $resp = $this->tryFb($_GET['token']);

          $reg = DB::table("nissan_usuarios_clientes")->where('id_registro', $resp["id"])->get();
          $cant_reg = count( $reg ); 
          
          if( $cant_reg == 0 ) {
            DB::table("nissan_usuarios_clientes")->insert(["nombre" => $resp["name"], "id_registro" => $resp["id"]]); 
          }

          //print_r( $resp['id'] ); 
          if( $resp["resp"] == "valido" ) {
              $request->session()->put('logueado', $resp["name"]);  
             $request->session()->put('picture',  '');  
             $request->session()->put('info', $resp["name"] );
             $request->session()->put('user', $reg[0] );     
             $request->session()->save();       
             return redirect('/index');  
          } 
        } 
	}

  // login admin control 
  public function processAdmin( Request $request ) {  
        $user = $_GET['email'];      
        $pass = $_GET['password'];    
  
        $data_login = DB::table('nissan_usuarios_admin')
                            ->where([['correo',  '=', $user], 
                                     ['password','=', $pass]])->get(); 
      
          if( count($data_login) > 0 ) { 
             $request->session()->put('logueadoAdmin', $user);  
             $request->session()->put('picture',  '');  
             $request->session()->put('info',     $data_login[0]->nombre );
             $request->session()->put('user',     $data_login[0] );     
             $request->session()->save();       
             return redirect('/admin');   
          } else {
             return redirect('/');    
          }
  }
 
  // logout admin 
  public function outAdmin( Request $request ) {
     session()->put('logueadoAdmin', ''); 
     return redirect('/admin136'); 
  }
 
	public function out( Request $request ) { 
	    session()->put('logueado', ''); 
	    return redirect('/'); 
	}

  public function print() {
    print_r( session()->get('user') ); 
  }

}