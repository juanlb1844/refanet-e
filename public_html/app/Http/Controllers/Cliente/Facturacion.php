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
 
class Facturacion extends BaseController
{	 

	 public function getColorMain()
    {
        $data = DB::select("SELECT * FROM nissan_config");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;
        return $color_main;
    }


    public function getPhone()
    {
        $data = DB::select("SELECT * FROM nissan_config");
        $phone = $data[9]->content;
        return $phone;
    }


    public function getMenuArray()
    {
        $menu = DB::select("SELECT * FROM menu_grupos");
        foreach ($menu as $key => $grupo) {
            $menu_row = array();
            $menu_l1 = array();
            $menu_row['titulo'] = $grupo->titulo;
            $menu_row['id'] = $grupo->id;
            $menu_row['destino'] = $grupo->destino;
            $opciones_q = DB::select("SELECT * FROM menu_opciones WHERE id_grupo = " . $grupo->id);

            foreach ($opciones_q as $key => $l1) {
                $menu_l1 = DB::select("SELECT * FROM menu_opciones_l2 WHERE id_parent = " . $l1->id);
                $l1->opciones = $menu_l1;
            }

            $menu_row['opciones'] = $opciones_q;

            $menu_arr[] = $menu_row;
        }
        return $menu_arr;
    }


 	public function facturacion () {
 		 $categories = DB::select("SELECT * FROM nissan_categorias 
 			 											WHERE id_parent = 0  
 			 												AND title != 'Uncategorized' 
 			 												AND title != 'SON'");
        return view('facturacion', ['categories' => $categories, 
    								'color_main' => $this->getColorMain(), 
    							 'mail_config' => "..",
    							 'newcats' => $this->getMenuArray(), 
            					'phone_config' => $this->getPhone()] ); 
 	}

}