<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Mail; 
use Illuminate\Http\Request;

class Api extends BaseController
{	
        
         public function setProducts( Request $data ) {
              $data = $data->all(); 

              $titulo = $data['titulo']; 
              $precio = $data['precio']; 
              $sku    = $data['sku'];   
              $info   = $data['info'];   
              $media  = $data['media'];     

              $product = null; 
              foreach ($info as $key => $attr) {
                  $name_attr = $attr['name']; 
                  $val_attr  = $attr['val']; 
                  $name_attr = $this->quitar_acentos( str_replace(" ", "_", strtolower( $name_attr )) );  
                  $product[$name_attr] = $val_attr;  
               }  
                 
                        
                $_composicion = array_key_exists('composicion', $product) == true ? $product['composicion'] : '-' ;
                $_genero      = array_key_exists('genero', $product) == true ? $product['genero'] : '-' ; 
                $_material    = array_key_exists('material_principal', $product) == true ? $product['material_principal'] : '-' ; 
                $_tipo        = array_key_exists('tipo_de_pantaleta', $product) == true ? $product['tipo_de_pantaleta'] : '-' ; 
                $_cantidad    = array_key_exists('cantidad_de_panties_por_pack', $product) == true ? $product['cantidad_de_panties_por_pack'] : '-' ; 

                $existe = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$sku'"); 
                $paquete = count($existe); // cantidad ya registrada 
 
                //insertar principal 
                if( count($existe) ) {
                  DB::table('nissan_nparte2')->insert(['nparte' => $sku, 
                                                     'title' => $titulo, 
                                                     'price' => $precio, 
                                                     'genero' => $_genero, 
                                                     'composicion' =>  $_composicion, 
                                                     'material' => $_material,  
                                                     'tipo' => $_tipo, 
                                                     'cantidad' => $_cantidad,  
                                                     'img' => $media[0], 
                                                     'paquete' => $paquete, 
                                                     'portada' => 1]);
                } else {
                  // insertar paquete siguiente 
                  DB::table('nissan_nparte2')->insert(['nparte' => $sku, 
                                                     'title' => $titulo, 
                                                     'price' => $precio,   
                                                     'genero' => $_genero, 
                                                     'composicion' =>  $_composicion, 
                                                     'material' => $_material,  
                                                     'tipo' => $_tipo, 
                                                     'cantidad' => $_cantidad,  
                                                     'img' => $media[0], 
                                                     'paquete' => $paquete]);
                }
                
                $id_product = DB::getPdo()->lastInsertId();   
 
                foreach ($media as $key => $value) {
                  DB::table('nissaan_galeria')->insert(['link' => $value, 'id_product' => $id_product]); 
                }
                 

         }  


        function quitar_acentos($cadena){
          $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
          $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
          $cadena = utf8_decode($cadena);
          $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
          return utf8_encode($cadena);
      }
  
} 
