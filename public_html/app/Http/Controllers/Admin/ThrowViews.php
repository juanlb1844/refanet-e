<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Mail; 
//use App\Openpay; 
use Illuminate\Http\Request;

class ThrowViews extends BaseController
{	
  
	public function throwView($view, $data) {
		$config = DB::select("SELECT * FROM nissan_config");
	 
		$data['extra'] = ['selected-option' => strtolower(str_replace(array("/", " "), array("-", ""), $view)), 'config_site' => $config ]; 
		return view($view, $data); 
	}


} 