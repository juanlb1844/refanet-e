<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mail;

//use App\Openpay; 
use Illuminate\Http\Request;

//include 'Carrito.php';

class Home extends BaseController
{

    public function video()
    {
        return view('video', ['categories' => $this->_categories(),
            'title' => 'Política de devoluciones',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'color_main' => $this->getColorMain(),
            'phone_config' => $this->getPhone(),
        ]);
    }

    public function _categories()
    {
        return DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0 AND show_in_menu = 1");
    }

    public function _getSubTotalCart()
    {
        $cart = new Carrito;
        return $cart->getTotalCart();
    }

    public function checkoutMain()
    {
        //\Session::remove('descuento');

        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        $page       = DB::select("SELECT * FROM paginas WHERE id = 3")[0];
        $sucursales = DB::select("SELECT * FROM sucursales WHERE status_envio = 1");
        $methods    = DB::select("SELECT * FROM pay_methods WHERE status = 1");

        $msgeDescuento = "<p>Se ha aplicado el cupón</p><p style=\"color:green;\">Uno de tus productos será gratis!</p>";
        $descuento = false;
        $totalDescuento = 0;
        $cgo = '';
        if (null !== \Session::get('descuento')) {
            $descuento = true;
            $totalDescuento = $this->_getTotalCart() - \Session::get('descuento');
            $cgo = \Session::get('cgo');
            $msgeDescuento = "<p>Se ha aplicado el cupón</p><p style=\"color:green;\">" . \Session::get('descuento_mge_success') . "</p>";
        }

        return view('checkout-main', ['categories' => $this->_categories(),
            'title' => 'Términos y condiciones',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain(),
            'totalDescuento' => $totalDescuento,
            'descuento' => $descuento,
            'page' => $page,
            'total' => $this->_getTotalCart(),
            'sendPrice' => $this->_getSendPrice(),
            'methods' => $methods,
            'cgo' => $cgo,
            'msgeDescuento' => $msgeDescuento,
            'sucursales' => $sucursales]);
        /* return view('page/checkout/checkout',
                [
                 'categories' => $this->_categories(),
                 'subtotal'   => $this->_getSubTotalCart(),
                 'color_text'   =>  $this->getColorHeaderText(),
                 'total'      => $this->_getTotalCart(),
                 'sendPrice'  => $this->_getSendPrice(),
                 'descuento'  => $descuento,
                 'totalDescuento' => $totalDescuento,
                 'msgeDescuento' => $msgeDescuento,
                 'cgo' => $cgo,
                 'newcats'    => $this->getMenuArray(),
                 'color_main' => $this->getColorMain(),
                 'sucursales' => $sucursales,
                 'mail_config' => $this->getMail(),
                 'phone_config' =>  $this->getPhone()
                ]
            );  */
    }

    public function _getSendPrice()
    {
        /*
        $costo_envio = DB::select("SELECT content FROM nissan_config WHERE label = 'shipment_flat_price'")[0]->content;
        return (float)$costo_envio; */
        if (isset(\Session::get('send')['price'])) {
            return (float)\Session::get('send')['price'];
        } else {
            return 0;
        }
    }

    public function _getTotalCart()
    {
        return $this->_getSendPrice() + $this->_getSubTotalCart();
    }


    ///////////

    public function trySession()
    {
        print_r(session()->get('user'));
    }

    public function setFavorite(Request $data)
    {
        $np = $data->input('np');
        $id = session()->get('user')->id;
        $id_p = $data->input('id');
        $action = $data->input('action');
        if ($action == 'add') {
            $exists = DB::select("SELECT * FROM products_favorites WHERE sku = '$np' AND id_usuario = $id AND id_product = $id_p");
            if (count($exists) < 1) {
                DB::select("INSERT INTO products_favorites SET sku = '$np', id_usuario = $id, id_product = $id_p");
            }
            print_r($exists);
        } else {
            DB::select("DELETE FROM products_favorites WHERE sku = '$np' AND id_usuario = $id AND id_product = $id_p");
        }
    }

    // Página | Términos y condiciones
    public function ayuda()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        $page = DB::select("SELECT * FROM paginas WHERE id = 4")[0];
        return view('ayuda', ['categories' => $this->_categories(),
            'title' => 'Términos y condiciones',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'color_main' => $this->getColorMain(),
            'phone_config' => $this->getPhone(),
            'page' => $page]);
    }

    // Página | Términos y condiciones
    public function terminos()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        $page = DB::select("SELECT * FROM paginas WHERE id = 3")[0];
        return view('terminos', ['categories' => $this->_categories(),
            'title' => 'Términos y condiciones',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain(),
            'page' => $page]);
    }

    public function politica()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        $page = DB::select("SELECT * FROM paginas WHERE id = 1")[0];
        return view('politica-de-privacidad', ['categories' => $categories,
            'title' => 'Política de privacidad',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'color_main' => $this->getColorMain(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'page' => $page]);
    }

    public function devoluciones()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        $page = DB::select("SELECT * FROM paginas WHERE id = 2")[0];
        $categories = DB::select("SELECT * FROM nissan_categorias WHERE id_parent = 0");
        return view('politica-de-devoluciones', ['categories' => $categories,
            'title' => 'Política de devoluciones',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'color_main' => $this->getColorMain(),
            'phone_config' => $this->getPhone(),
            'page' => $page]);
    }

    // Actualizar datos del perfil del cliente
    public function updateClient(Request $data)
    {
        $mail = $data->input('userMail');
        $userName = $data->input('userName');
        $userTel = $data->input('userTel');
        $userLastName = $data->input('userLastName');
        $userShiping = $data->input('userShiping');
        $userBilling = $data->input('userBilling');
        $userCity = $data->input('userCity');
        $userState = $data->input('userState');
        $userZip = $data->input('userZip');
        $idUser = session()->get('user')->id;
        DB::table('nissan_usuarios_clientes')
            ->where('id', $idUser)
            ->update(['nombre' => $userName,
                'apellidos' => $userLastName,
                'correo' => $mail,
                'direccion' => $userShiping,
                'cp' => $userZip,
                'ciudad' => $userCity,
                'estado' => $userState,
                'telefono' => $userTel,
                'direccion_facturacion' => $userBilling]);
        $data_login = DB::table('nissan_usuarios_clientes')->where([['id', '=', session()->get('user')->id]])->get();
        session()->put('user', $data_login[0]);
        session()->save();
    }

    // Registrar usuario
    public function registerUser(Request $a)
    {
        $client_name = $a->input('client_name');
        $client_email = $a->input('client_email');
        $client_pass = $a->input('client_pass');
        $registerPhone = $a->input('registerPhone');

        $exist_client = DB::select("SELECT * FROM nissan_usuarios_clientes WHERE correo = '$client_email'");

        if (count($exist_client) > 0) {
            echo 1;
        } else {
            DB::table('nissan_usuarios_clientes')->insert(['nombre' => $client_name,
                'correo' => $client_email,
                'password' => $client_pass,
                'telefono' => $registerPhone]);
            echo 0;
        }

    }

    // Página | Promociones
    public function promociones()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias 
 			 											WHERE id_parent = 0  
 			 												AND title != 'Uncategorized' 
 			 												AND title != 'SON'");
        return view('promociones', ['categories' => $categories,
            'title' => 'Promociones',
            'color_text' => $this->getColorHeaderText(),
            'mail_config' => $this->getMail()]);
    }

    // Página | Boletín
    public function boletin()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias 
 			 											WHERE id_parent = 0  
 			 												AND title != 'Uncategorized' 
 			 												AND title != 'SON'");
        return view('boletin', ['categories' => $categories,
            'title' => 'Boletín',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain()]);
    }

    // Página | prdoucto-similar
    public function similar()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias 
 			 											WHERE id_parent = 0  
 			 												AND title != 'Uncategorized' 
 			 												AND title != 'SON'");
        return view('producto-no-encontrado', ['categories' => $categories,
            'title' => 'Producto no disponible',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain(),]);
    }

    // Página | prdoucto-similar
    public function similar404()
    {
        $categories = DB::select("SELECT * FROM nissan_categorias 
 			 											WHERE id_parent = 0  
 			 												AND title != 'Uncategorized' 
 			 												AND title != 'SON'");
        return view('producto-no-encontrado404', ['categories' => $categories,
            'title' => 'Producto no disponible',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain(),]);
    }

    public function tryP()
    {
        print_r(json_encode($this->getProductsByCat(824, 10)));
    }

    public function getProductsByCat($id_cat, $limit_)
    {
        $slider_p = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img as img, P.small_img, P.check_promo, precio_promocional, P.paquete, precio_especial_1, precio_especial_2, precio_especial_3, precio_especial_4, precio_especial_5 FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = $id_cat AND P.status_post = 1 GROUP BY nparte LIMIT $limit_");
        $slider_p = (array)$slider_p;

        $type = 0;
        if (session()->get('user') === null) {
            $type = 0;
        } else {
            $type = session()->get('user')->id;
        }

        $slider_p = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img as img,  P.small_img, P.check_promo, precio_promocional, P.paquete, precio_especial_1, precio_especial_2, precio_especial_3, precio_especial_4, precio_especial_5 FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto 
				 WHERE C.id_categoria = $id_cat AND P.status_post = 1
						LIMIT $limit_");

        if ($type > 0) {
            foreach ($slider_p as $key => $product) {
                $favorite = DB::select("SELECT * FROM products_favorites WHERE id_product = " . $product->id);
                if (count($favorite) > 0) {
                    $slider_p[$key]->favorite = 1;
                } else {
                    $slider_p[$key]->favorite = 0;
                }
            }
        }

        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id . " ORDER BY order_img ASC ");
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }


    public function getProductsByBrand($id_cat, $limit_)
    {

        $type = 0;
        if (session()->get('user') === null) {
            $type = 0;
        } else {
            $type = session()->get('user')->id;
        }

        $slider_p = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img AS img, P.check_promo, precio_promocional, P.precio_especial_1, P.precio_especial_2, 
	P.precio_especial_3, P.precio_especial_4, P.paquete
		FROM nissan_nparte2 P LEFT JOIN nissan_marcas M ON P.id_marca = M.id 
			WHERE M.id = $id_cat");

        if ($type > 0) {
            foreach ($slider_p as $key => $product) {
                $favorite = DB::select("SELECT * FROM products_favorites WHERE id_product = " . $product->id);
                if (count($favorite) > 0) {
                    $slider_p[$key]->favorite = 1;
                } else {
                    $slider_p[$key]->favorite = 0;
                }
            }
        }

        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id . " ORDER BY order_img ASC");
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }


    public function getProductsByCat__($id_cat, $limit_, $order)
    {

        $type = 0;
        if (session()->get('user') === null) {
            $type = 0;
        } else {
            $type = session()->get('user')->id;
        }

        
        $slider_p = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img as img, P.check_promo, precio_promocional, P.precio_especial_1, P.precio_especial_2, P.precio_especial_3, P.precio_especial_4, P.paquete FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto 
                 WHERE C.id_categoria = $id_cat AND status_post = 1 $order LIMIT $limit_");


        if ($type > 0) {
            foreach ($slider_p as $key => $product) {
                $favorite = DB::select("SELECT * FROM products_favorites WHERE id_product = " . $product->id);
                if (count($favorite) > 0) {
                    $slider_p[$key]->favorite = 1;
                } else {
                    $slider_p[$key]->favorite = 0;
                }
            }
        }

        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id . " ORDER BY order_img ASC");
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }

    public function getProductsByCat_($id_cat, $limit_)
    {

        $type = 0;
        if (session()->get('user') === null) {
            $type = 0;
        } else {
            $type = session()->get('user')->id;
        }

        $slider_p = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img as img, P.check_promo, precio_promocional, P.precio_especial_1, P.precio_especial_2, P.precio_especial_3, P.precio_especial_4, P.paquete FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto 
				 WHERE C.id_categoria = $id_cat AND status_post = 1
                    ORDER BY P.id DESC
						LIMIT $limit_");

        if ($type > 0) {
            foreach ($slider_p as $key => $product) {
                $favorite = DB::select("SELECT * FROM products_favorites WHERE id_product = " . $product->id);
                if (count($favorite) > 0) {
                    $slider_p[$key]->favorite = 1;
                } else {
                    $slider_p[$key]->favorite = 0;
                }
            }
        }

        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id . " ORDER BY order_img ASC");
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }


    public function isLoged()
    {
        $logueado = false;
        if (session()->has('logueado')) {
            if (strlen(session()->get('logueado')) > 2) {
                $logueado = true;
            }
        }
        return $logueado;
    }

    public function updateSession()
    {
        session()->put('user', DB::table('nissan_usuarios_clientes')
            ->where([['id', '=', session()->get('user')->id]])->get()[0]);
    }


    public function createCacheModels() {


        $fits_brand = DB::select("SELECT * FROM fit_brand"); 
        foreach ( $fits_brand as $key => $_brand) {
            //print_r( $_brand->id_fit_model ); 
            $brand_parent = $_brand->id_fit_model;
            $fits_models = DB::select("SELECT * FROM fit_model WHERE id_parent = $brand_parent");  
            foreach ($fits_models as $key_model => $_model ) {
                $model_parent  = $_model->id_fit_model; 
                $fits_year     = DB::select("SELECT * FROM fit_year WHERE id_parent = $model_parent");
                foreach ($fits_year as $key_engine => $year_row) {
                    $_year_parent = $year_row->id_fit_model; 
                    $fits_engines = DB::select("SELECT * FROM fit_engine WHERE id_parent = $_year_parent");  
                    $year_row->engines = $fits_engines; 
                }
                $_model->years = $fits_year;   
            } 
            $_brand->models_arr = $fits_models; 
            //$_brand->models_arr = DB::select("SELECT * FROM fit_model WHERE id_parent = $brand_parent"); 
        }

        file_put_contents('fits.json', json_encode($fits_brand));
    
        print_r( json_encode($fits_brand) ); 
    }

    // Página | Home
    public function home()
    {
        if ($this->isLoged()) {
            $this->updateSession();
        }

        if (session()->get('user')) {
            //$grupo = session()->get('user')->grupo;
            $slider_p = DB::select('SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 824 GROUP BY nparte');
            //$slider2    = DB::table('nissan_nparte2')->orderBy('price', 'DESC')->where('status_post', '1')->limit(5)->get();
            
            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 824 GROUP BY nparte");

            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto GROUP BY nparte");

            $slider_p = DB::select('SELECT * FROM nissan_nparte2 P 
                                            INNER JOIN nissaan_galeria G 
                                                ON P.id = G.id_product GROUP BY P.nparte limit 4');
            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P 
                                                    INNER JOIN nissaan_galeria G 
                                                        ON P.id = G.id_product GROUP BY P.nparte limit 4"); 
            
        } else {
            $slider_p = DB::select('SELECT * FROM nissan_nparte2 P 
											INNER JOIN nissaan_galeria G 
												ON P.id = G.id_product GROUP BY P.nparte limit 4');
            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P 
													INNER JOIN nissaan_galeria G 
														ON P.id = G.id_product GROUP BY P.nparte limit 4");
              
        } 
  

        $data = DB::select("SELECT * FROM nissan_config");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;

        $busqueda = false;
        if (strlen($ips) > 6) {
            $arr_ips = explode(',', $ips);
            $ip_this = $_SERVER['REMOTE_ADDR'];
            $busqueda = array_search($ip_this, $arr_ips);
            $busqueda = is_int($busqueda);
        } else {
            $busqueda = true;
        }

        $block = DB::select("SELECT * FROM nissan_config WHERE id > 10 AND id < 17");
        $marcas = DB::select("SELECT * FROM nissan_marcas WHERE show_in_home = 1");
        $sliders_type = DB::select("SELECT * FROM config_sliders WHERE fill_with = 'products'");

        $fits_brand = null;  
        
        /* 
        $fits_brand = DB::select("SELECT * FROM fit_brand"); 
        foreach ( $fits_brand as $key => $_brand) {
            //print_r( $_brand->id_fit_model ); 
            $brand_parent = $_brand->id_fit_model;
            $fits_models = DB::select("SELECT * FROM fit_model WHERE id_parent = $brand_parent");  
            foreach ($fits_models as $key_model => $_model ) {
                $model_parent  = $_model->id_fit_model; 
                $fits_year     = DB::select("SELECT * FROM fit_year WHERE id_parent = $model_parent");
                foreach ($fits_year as $key_engine => $year_row) {
                    $_year_parent = $year_row->id_fit_model; 
                    $fits_engines = DB::select("SELECT * FROM fit_engine WHERE id_parent = $_year_parent");  
                    $year_row->engines = $fits_engines; 
                }
                $_model->years = $fits_year;   
            } 
            $_brand->models_arr = $fits_models; 
            //$_brand->models_arr = DB::select("SELECT * FROM fit_model WHERE id_parent = $brand_parent"); 
        }
          */ 
        
        $fits_brand = file_get_contents("./fits.json"); 
        $fits_brand = json_decode($fits_brand); 
        //print_r($fits_json); return; 
        //return $fits_brand;  

        return view('home', ['slider_p' => $this->getProductsByCat(24, 15),
            'slider2' => $this->getProductsByCat(25, 15),
            'categories' => $this->_categories(),
            'clip' => $data[0]->content,
            'busqueda' => $busqueda,
            'title' => 'Home',
            'color_main' => $this->getColorMain(),
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'sliderMain' => $this->getSlider(1),
            'sliderMain2' => $this->getSlider(2),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'block' => $block,
            'brands' => $marcas,
            'sliders_type' => $sliders_type, 
            'fits' => $fits_brand, 
            'fits_json' => $fits_brand]); 
    }

    public function getSlider($id)
    {
        $slider_main = DB::select('SELECT *, DATE_FORMAT(S.desde, "%Y-%m-%dT%H:%m:%s") AS desdee, DATE_FORMAT(S.hasta, "%Y-%m-%dT%H:%m:%s") AS hastaa FROM config_sliders C INNER JOIN config_slider_element S ON C.id = S.id_slider WHERE S.id_slider = ' . $id . ' AND S.status = 1 ORDER BY S.orders ASC');
        return $slider_main;
    }

    public function getColorMain()
    {
        $data = DB::select("SELECT * FROM nissan_config");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;
        return $color_main;
    }

    public function getColorHeaderText()
    {
        $data = DB::select("SELECT * FROM nissan_config");

        $color_main = $data[3]->content;
        return $color_main;
    }

    public function getMail()
    {
        $data = DB::select("SELECT * FROM nissan_config");
        $mail = $data[8]->content;
        return $mail;
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

    // Página | Home
    public function home4()
    {

        if (session()->get('user')) {
            //$grupo = session()->get('user')->grupo;
            $slider_p = DB::select('SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 824 GROUP BY nparte');
            //$slider2    = DB::table('nissan_nparte2')->orderBy('price', 'DESC')->where('status_post', '1')->limit(5)->get();
            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 824 GROUP BY nparte");


        } else {
            $slider_p = DB::select('SELECT * FROM nissan_nparte2 P 
	INNER JOIN nissaan_galeria G 
		ON P.id = G.id_product GROUP BY P.nparte limit 4');
            $slider2 = DB::select("SELECT * FROM nissan_nparte2 P 
	INNER JOIN nissaan_galeria G 
		ON P.id = G.id_product GROUP BY P.nparte limit 4");
        }

        $slider_p = DB::select('SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 826 GROUP BY nparte LIMIT 40');
        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id);
            $slider_p[$key]->gallery = $g;
        }

        $slider2 = DB::select('SELECT * FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = 824 GROUP BY nparte LIMIT 40');
        $slider2 = (array)$slider2;
        foreach ($slider2 as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id);
            $slider2[$key]->gallery = $g;
        }


        $data = DB::select("SELECT * FROM nissan_config");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;

        $busqueda = false;
        if (strlen($ips) > 6) {
            $arr_ips = explode(',', $ips);
            $ip_this = $_SERVER['REMOTE_ADDR'];
            $busqueda = array_search($ip_this, $arr_ips);
            $busqueda = is_int($busqueda);
        } else {
            $busqueda = true;
        }

        /*
        print_r( $_SERVER['REMOTE_ADDR'] );
        var_dump( $busqueda );  */

        $menu = DB::select("SELECT * FROM menu_grupos");
        $menu_row = array();
        foreach ($menu as $key => $grupo) {
            $menu_row['titulo'] = $grupo->titulo;
            $menu_row['id'] = $grupo->id;
            $menu_row['destino'] = $grupo->destino;
            $menu_row['opciones'] = DB::select("SELECT * FROM menu_opciones WHERE id_grupo = " . $grupo->id);

            $menu_arr[] = $menu_row;
        }

        return view('home4', ['slider_p' => $slider_p,
            'slider2' => $slider2,
            'categories' => $this->_categories(),
            'clip' => $data[0]->content,
            'busqueda' => $busqueda,
            'title' => 'Home',
            'color_main' => $color_main,
            'mail_config' => $this->getMail(),
            'newcats' => $menu_arr]);
    }

    /**
     * Carrito de compras
     * @return Factory|Application|View
     */
    public function carrito()
    {
        return view('carrito', [
                'title'         => 'Carrito de compras'
            ,   'color_text'    => $this -> getColorHeaderText()
            ,   'categories'    => $this -> _categories()
            ,   'totalCart'     => $this -> _getSubTotalCart()
            ,   'sendPrice'     => $this -> _getSendPrice()
            ,   'newcats'       => $this -> getMenuArray()
            ,   'color_main'    => $this -> getColorMain()
            ,   'phone_config'  => $this -> getPhone()
            ,   'mail_config'   => $this -> getMail()
        ]);
    }

    /**
     * Regresa la vista del producto.
     * Barely clean this mes
     * @param $np
     * @param $pack
     * @return Factory|Application|RedirectResponse|Redirector|View
     */
    // Página | Vista del producto  
 		public function producto( $np, $pack ) { 
 			if( $this->isLoged() ) {
				$this->updateSession(); 
			}
 
 			$slider2    = DB::table('nissan_nparte2')->orderBy('price', 'DESC')->limit(8)->get();

 			$id_cat_sug = DB::select(" SELECT * FROM nissan_categorias_productos NC INNER JOIN nissan_nparte2 NP ON NC.id_producto = NP.id WHERE nparte = '$np' ORDER BY NC.id DESC")[0]->id_categoria;

 			if( $id_cat_sug == 796 ) {
 				$id_cat_sug = 781; 
 			}

 			if( $id_cat_sug == 804 || $id_cat_sug == 831 ) {
 				$id_cat_sug = 801; 
 			}

 			$slider2 = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img as img, P.check_promo, precio_promocional, P.paquete, precio_especial_1, precio_especial_2, precio_especial_3, precio_especial_4, precio_especial_5, P.status_post FROM nissan_nparte2 P LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto WHERE C.id_categoria = $id_cat_sug AND P.status_post = 1 LIMIT 15");

            $slider2 = $this->getProductsByCat(15, 15); 

            //print_r( json_encode($slider2) ); return; 


 			$_product 	= DB::table('nissan_nparte2')->where(['nparte' => $np])->orderBy('id', 'ASC')->get(); 
 			//return $_product;
 			$data = DB::select("SELECT * FROM nissan_config"); 

 			$ips        = $data[1]->content;
 			$color_main = $data[2]->content; 
 			
 			// el producto ha sido marcado como inactivo 
 			if( $_product[0]->status_post == 0 ) {
 				return  redirect('/no-encontrado'); 
 			} 
 			
 			$galeria  = DB::select("SELECT link, id_product FROM nissan_nparte2 INNER JOIN 
                                        nissaan_galeria ON nissan_nparte2.id = nissaan_galeria.id_product 
                                         	WHERE nparte = '$np' AND paquete = $pack AND status = 1 ORDER BY nissaan_galeria.order_img");   
 			$packs   = array(); 
 			$tallas  = array(); 
 			$colores = array(); 
 			$pack_selected = array(); 

 			if( count($galeria) > 0 ) { 
	 			$id_product = $galeria[0]->id_product; 
	 			$colores    = DB::select("SELECT alfa_color, paquete, tipo_color, url_textura FROM nissan_nparte2 WHERE nparte = '$np' ORDER BY id ASC ");  
	 
	 			$packs = DB::select("SELECT img, paquete FROM nissan_nparte2 WHERE nparte = '$np' AND status_pack = 1");
	 			$packs = DB::select("SELECT P.img, P.paquete, G.link FROM nissan_nparte2 P 
										INNER JOIN nissaan_galeria G ON P.id = G.id_product WHERE P.nparte = '$np'
											GROUP BY P.id ORDER BY G.order_img ASC"); 

	 			$sku   		= $_product[0]->nparte; 

	 			$pack_selected = DB::select("SELECT * FROM nissan_nparte2 WHERE nparte = '$np' AND paquete = $pack")[0];

	 			$favorite_s = DB::select("SELECT * FROM products_favorites WHERE id_product = $id_product AND id_usuario = 4"); 

             
	 			if( count($favorite_s) > 0 ) {
	 				$pack_selected->favorite = 1; 
	 			} else {
	 				$pack_selected->favorite = 0; 
	 			}
	 			//print_r(  $id_product ); echo "-".$pack_selected->favorite; return;  
                

                /* 
	 			while($pack_selected->status_pack == 0) {
	 				$pack+=1; 
	 				return redirect('/producto/'.$np.'/pack/'.$pack);
	 			} */ 
	 			
	 			$tallas = DB::select("SELECT np.id idrelacion, nt.id idtalla, nt.detalle detalle, nt.name  FROM nissan_tallas_productos np 
											LEFT JOIN nissan_tallas nt  
												ON np.id_talla = nt.id WHERE np.id_producto = $id_product"); 
 			} else {
 				return  redirect('/no-encontrado404'); 
 			}
 
 			$comments = DB::select("SELECT * FROM comments WHERE sku = '$np' AND status = 1");

 			$back_comments = DB::select("SELECT * FROM nissan_config")[16];  
 			$btn_comments = DB::select("SELECT * FROM nissan_config")[17];  
 			return view('producto', ['_np' 		  => $np, 
 									 '_product'   => $_product[0], 
 									 'imgs' 	  => $galeria, 
 									 'comments' => $comments, 
 									 'packs'	  => $packs, 
 									 'color_text'   =>  $this->getColorHeaderText(), 
 									 'categories' => $this->_categories(), 
 									 'tallas' 	  => $tallas, 
 									 'title'	  => $_product[0]->title, 
 									 'slider2'    => $slider2, 
 									 'back_comments' => $back_comments, 
 									 'btn_comments' => $btn_comments, 
 									 'colores'    => $colores, 
 									 'pack' 	  => $pack,  
 									 'color_main' => $color_main, 
 									 'selected_pack' => $pack_selected, 
 									 'mail_config'   => $this->getMail(),
 									 'phone_config'  =>  $this->getPhone(),
 									 'newcats'       => $this->getMenuArray()]);  
 		} 

    // obtener existencia por talla
    public function getCantByTalla(Request $data)
    {
        $idRelation = $data->input('idRelation');
        $existencia = DB::select("SELECT * FROM nissan_tallas_productos WHERE id = $idRelation")[0]->cantidad;

        print_r($existencia);
    }

    // Página | Sistema de pago
    public function checkout()
    {
        //return var_dump($this->_getTotalCart());
        $msgeDescuento = "<p>Se ha aplicado el cupón</p><p style=\"color:green;\">Uno de tus productos será gratis!</p>";
        $descuento = false;
        $totalDescuento = 0;
        $cgo = '';
        if (null !== \Session::get('descuento')) {
            $descuento = true;
            $totalDescuento = $this->_getTotalCart() - \Session::get('descuento');
            $cgo = \Session::get('cgo');
            $msgeDescuento = "<p>Se ha aplicado el cupón</p><p style=\"color:green;\">" . \Session::get('descuento_mge_success') . "</p>";
        }

        $sucursales = DB::select("SELECT * FROM sucursales WHERE status_envio = 1");

        return view('page/checkout/checkout',
            [
                'categories' => $this->_categories(),
                'subtotal' => $this->_getSubTotalCart(),
                'color_text' => $this->getColorHeaderText(),
                'total' => $this->_getTotalCart(),
                'sendPrice' => $this->_getSendPrice(),
                'descuento' => $descuento,
                'totalDescuento' => $totalDescuento,
                'msgeDescuento' => $msgeDescuento,
                'cgo' => $cgo,
                'newcats' => $this->getMenuArray(),
                'color_main' => $this->getColorMain(),
                'sucursales' => $sucursales,
                'mail_config' => $this->getMail(),
                'phone_config' => $this->getPhone()
            ]
        );
    }

    // Página | Dónde esamos
    public function dondeEstamos()
    {
        $data = DB::select("SELECT * FROM nissan_config");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;
        return view('donde-estamos', ['categories' => $this->_categories(),
            'title' => 'Dónde estamos',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $color_main]);
    }

    // Página | Dónde esamos 2
    public function dondeEstamos2()
    {
        $data = DB::select("SELECT * FROM nissan_config");
        $sucursales = DB::select("SELECT * FROM sucursales WHERE status_sucursales = 1 ORDER BY orden ASC");

        $ips = $data[1]->content;
        $color_main = $data[2]->content;
        return view('donde-estamos2', ['categories' => $this->_categories(),
            'title' => 'Dónde estamos',
            'color_text' => $this->getColorHeaderText(),
            'newcats' => $this->getMenuArray(),
            'color_main' => $color_main,
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'sucursales' => $sucursales]);
    }

    // Página | Lista compreta de categorias
    public function categoriasBegima()
    {
        return view('list-categorias', ['categories' => $this->_categories(),
            'title' => 'Lista de categorías',
            'color_text' => $this->getColorHeaderText(),
            'mail_config' => $this->getMail(),
            'newcats' => $this->getMenuArray()]);
    }

    public function favoritos()
    {
        //($this->getProductsFavorites(100)); return;
        return view('favoritos', ['categories' => $this->_categories(),
            'newcats' => $this->getMenuArray(),
            'color_text' => $this->getColorHeaderText(),
            'color_main' => $this->getColorMain(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'favorites' => ($this->getProductsFavorites(100))]);
    }

    public function getProductsFavorites($limit_)
    {

        $type = 0;
        if (session()->get('user') === null) {
            $type = 0;
        } else {
            $type = session()->get('user')->id;
        }

        /*
       $slider_p   = DB::select("SELECT P.id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img AS img, P.check_promo, precio_promocional, P.paquete, F.id FROM nissan_nparte2 P
LEFT JOIN nissan_categorias_productos C ON P.id = C.id_producto
   LEFT JOIN products_favorites F ON P.id = F.id_product WHERE F.id_usuario = $type
                   LIMIT $limit_"); */

        $slider_p = DB::select("SELECT F.id_product id, P.nparte, P.title, P.tipo_producto, P.price, P.medium_img AS img, P.check_promo, precio_promocional, P.paquete FROM products_favorites F LEFT JOIN nissan_nparte2 P ON F.id_product = P.id WHERE F.id_usuario = $type");
        //print_r(json_encode($slider_p));
        if ($type > 0) {
            foreach ($slider_p as $key => $product) {
                $favorite = DB::select("SELECT * FROM products_favorites WHERE id_product = " . $product->id);
                if (count($favorite) > 0) {
                    $slider_p[$key]->favorite = 1;
                } else {
                    $slider_p[$key]->favorite = 1;
                }
            }
        }


        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id);

            $slider_p[$key]->gallery = (array)$g;
        }
        return $slider_p;
    }


    public function usuario()
    {
        return view('usuario', ['categories' => $this->_categories(),
            'newcats' => $this->getMenuArray(),
            'color_text' => $this->getColorHeaderText(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'color_main' => $this->getColorMain(),
        ]);
    }

    public function catalogoOrder($cat, $order) {
        if ($this->isLoged()) {
            $this->updateSession();
        }

        $cat_ = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$cat'")[0];

        $sql_order = ""; 
        if( $order == 'menor-precio') {
            $sql_order = 'order by P.price ASC'; 
        } else if( $order == 'mayor-precio') {
            $sql_order = 'order by P.price DESC'; 
        } else if( $order == 'nombre') {
            $sql_order = 'order by P.title ASC'; 
        }

        $blocks = $this->getProductsByCat__($cat_->id, 1000, $sql_order);
        //print_r( DB::select("SELECT * FROM nissan_nparte2") ); return; 
        /*
        print_r( json_encode($blocks) ); 
        return;  */

        //$productos  = DB::table('nissan_nparte2')->where(['categoriabase' => $cat])->orderBy('price', 'DESC')->limit(50)->get();
        $marcas = DB::select("SELECT * FROM nissan_marcas");
        $productos = ""; 
        /*$productos = DB::select("SELECT item.id, item.title, item.price, item.nparte, item.img, item.precio_especial_1 precio_especial_1, item.precio_especial_2, item.precio_especial_3, item.precio_especial_4 FROM nissan_nparte2 item LEFT JOIN nissan_categorias_productos
                                        ON item.id = nissan_categorias_productos.id_producto 
                                            LEFT JOIN nissan_categorias cats ON nissan_categorias_productos.id_categoria = cats.id 
                                                WHERE cats.slug = '$cat' AND status_post = 1 $sql_order"); */

       // print_r( json_encode( $productos ) ); 
        return view('catalogo', ['catalogo' => $productos,
            'filter' => $cat,
            'color_text' => $this->getColorHeaderText(),
            'categories' => $this->_categories(),
            'marcas' => $marcas,
            'newcats' => $this->getMenuArray(),
            'color_main' => $this->getColorMain(),
            'blocks' => $blocks,
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(), 
            'order' => $order
        ]);
    }

    // Página | Catálogo
    public function catalogo($cat)
    {
        if ($this->isLoged()) {
            $this->updateSession();
        }

        $cat_ = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$cat'")[0];
        //print_r( $cat_ ); die(); 
        $blocks = $this->getProductsByCat_($cat_->id, 1000);

        /*
        print_r( json_encode($blocks) );
        return;  */

        //$productos  = DB::table('nissan_nparte2')->where(['categoriabase' => $cat])->orderBy('price', 'DESC')->limit(50)->get();
        $marcas = DB::select("SELECT * FROM nissan_marcas");
        $productos = DB::select("SELECT item.id, item.title, item.price, item.nparte, item.img, item.precio_especial_1 precio_especial_1, item.precio_especial_2, item.precio_especial_3, item.precio_especial_4 FROM nissan_nparte2 item LEFT JOIN nissan_categorias_productos
 										ON item.id = nissan_categorias_productos.id_producto 
											LEFT JOIN nissan_categorias cats ON nissan_categorias_productos.id_categoria = cats.id 
												WHERE cats.slug = '$cat' AND status_post = 1 order by item.id ASC");

        $productos = DB::select("SELECT item.id, item.title, item.price, item.nparte, item.img, item.precio_especial_1 precio_especial_1, item.precio_especial_2, item.precio_especial_3, item.precio_especial_4 FROM nissan_nparte2 item LEFT JOIN nissan_categorias_productos
                                        ON item.id = nissan_categorias_productos.id_producto 
                                            LEFT JOIN nissan_categorias cats ON nissan_categorias_productos.id_categoria = cats.id"); 
        //print_r( $blocks ); die(); 
        return view('catalogo', ['catalogo' => $productos,
            'filter' => $cat,
            'color_text' => $this->getColorHeaderText(),
            'categories' => $this->_categories(),
            'marcas' => $marcas,
            'newcats' => $this->getMenuArray(),
            'color_main' => $this->getColorMain(),
            'blocks' => $blocks,
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(), 
            'order' => false 
        ]);
    }


    // Página | Search
    public function byBrand($search)
    {
        if ($this->isLoged()) {
            $this->updateSession();
        }

        $cat_ = DB::select("SELECT * FROM nissan_categorias WHERE slug = 'tanga-dama'")[0];

        $cat = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$search'");
        $marcas = DB::select("SELECT * FROM nissan_marcas");
        //$cat 	    = $cat->id;

        $blocks = $this->getProductsByBrand($search, 1000);

        $productos = DB::selecT("SELECT * FROM nissan_nparte2 WHERE id_marca LIKE $search AND status_post = 1");
        return view('catalogo', ['catalogo' => $productos,
            'filter' => $search,
            'color_text' => $this->getColorHeaderText(),
            'color_main' => $this->getColorMain(),
            'categories' => $this->_categories(),
            'marcas' => $marcas,
            'blocks' => $blocks,
            'mail_config' => $this->getMail(),
            'mail_config' => $this->getMail(),
            'phone_config' => $this->getPhone(),
            'newcats' => $this->getMenuArray()]);
    }


    // Página | Search
    public function search($search)
    {
        $cat = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$search'");
        $marcas = DB::select("SELECT * FROM nissan_marcas");
        //$cat 	    = $cat->id;
        $productos = DB::selecT("SELECT * FROM nissan_nparte2 WHERE title LIKE '%$search%'");

        $blocks = $this->getProductsBySearch($search, 100);

        /* 
        print_r( json_encode($productos) ); 
        return;  */ 

        return view('catalogo', ['catalogo' => $productos,
            'filter' => $search,
            'color_text' => $this->getColorHeaderText(),
            'categories' => $this->_categories(),
            'marcas' => $marcas,
            'mail_config' => $this->getMail(),
            'newcats' => $this->getMenuArray(),
            'color_main' => $this->getColorMain(),
            'phone_config' => $this->getPhone(),
            'blocks' => $blocks]);
    }

    public function searchFit($search, $fit){ 
 

        $cat       = DB::select("SELECT * FROM nissan_categorias WHERE slug = '$search'");
        $marcas    = DB::select("SELECT * FROM nissan_marcas"); 
        $productos = DB::selecT("SELECT * FROM nissan_nparte2 NP INNER JOIN fit_relation_nparte NPR ON NP.id = NPR.id_nparte 
                    INNER JOIN fit_engine FE ON NPR.id_fit = FE.id_fit_model 
                WHERE id_fit = $fit");  

        $blocks = $this->getProductsBySearchFit($search, 100, $fit);

        /*  
        print_r( json_encode($productos) ); 
        return;  */ 

        return view('catalogo', ['catalogo' => $productos,
            'filter' => $search,
            'color_text' => $this->getColorHeaderText(),
            'categories' => $this->_categories(),
            'marcas' => $marcas,
            'mail_config' => $this->getMail(),
            'newcats' => $this->getMenuArray(),
            'color_main' => $this->getColorMain(),
            'phone_config' => $this->getPhone(),
            'blocks' => $blocks]);
    }

    public function getProductsBySearchFit($search, $limit_, $fit){
        $slider_p = DB::select("SELECT * FROM nissan_nparte2 NP INNER JOIN fit_relation_nparte NPR ON NP.id = NPR.id_nparte 
                    INNER JOIN fit_engine FE ON NPR.id_fit = FE.id_fit_model 
                WHERE id_fit = $fit");
        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id);
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }

    public function getProductsBySearch($search, $limit_)
    {
        $slider_p = DB::select("SELECT * FROM nissan_nparte2 WHERE title LIKE '%$search%'");
        $slider_p = (array)$slider_p;
        foreach ($slider_p as $key => $p) {
            $g = DB::select("SELECT * FROM nissaan_galeria WHERE id_product = " . $p->id);
            $slider_p[$key]->gallery = $g;
        }
        return $slider_p;
    }

    // Página | Gracias por su compra ^etc
    public function success($folio)
    {
        $compra = DB::select("SELECT * FROM nissan_pedidos WHERE id_openpay = '$folio'")[0];

        $correo = $compra->correo_cliente;
        $method = $compra->method_pay;
        $id_openpay = $compra->id_openpay;

        $folio = $compra->folio;

        $url = "https://dashboard.openpay.mx/";

        $_method = strpos($method, "TARJETA");
        if ($_method == 0) {
            $_method = true;
        } else {
            $_method = false;
        }

        $comprobante = false;
        if ($method == "SPEI") {
            $comprobante = true;
            $url .= "spei-pdf/mbs3pxfh8gqtec2i5qjy/" . $id_openpay;
        } else if ($method == "PAYNET") {
            $comprobante = true;
            $url .= "paynet-pdf/mbs3pxfh8gqtec2i5qjy/" . $id_openpay;
        }


        $status_pay = "";
        if ($method == "MP") {
            $this->enviarCorreo($folio);
            if (isset($_GET['status'])) {
                $status_pay = $_GET['status'];
                DB::select("UPDATE nissan_pedidos SET status = '$status_pay' WHERE folio = '$folio'");
            } else {
                $compra = DB::select("SELECT * FROM nissan_pedidos WHERE folio = '$folio'");
                $status_pay = $compra[0]->status;
            }
        }

        return view('order-success', ['categories' => $this->_categories(),
            'folio' => $folio,
            'color_text' => $this->getColorHeaderText(),
            'correo' => $correo, 'url' => $url,
            'file' => $comprobante,
            'mail_config' => $this->getMail(),
            'newcats' => $this->getMenuArray(),
            'methodo' => $_method,
            'color_main' => $this->getColorMain(),
            'method' => $method,
            'pay_status' => $status_pay,
            'phone_config' => $this->getPhone()]);
    }

    public function enviarCorreo($folio)
    {
        $compra = DB::select("SELECT * FROM nissan_pedidos WHERE folio = '$folio'");

        $nombre = $compra[0]->nombre_cliente;
        $apellidos = "";
        $correo = $compra[0]->correo_cliente;
        $telefono = $compra[0]->telefono_cliente;
        $folio_sitio = $compra[0]->folio;
        $direccion = $compra[0]->direccion_cliente;
        $ciudad = $compra[0]->ciudad_cliente;
        $estado = $compra[0]->estado_cliente;
        $cp = $compra[0]->cp_cliente;
        $method_send = $compra[0]->method_send;
        $option_send = $compra[0]->option_send;
        $price_send = $compra[0]->price_send;

        $direction_maps = "";
        $direction = "";
        if (\Session::get('send')['method'] == 'recoger en tienda') {
            $suc_send = DB::select("SELECT * FROM sucursales WHERE name = '" . \Session::get('send')['option'] . "'");
            $direction = $suc_send[0]->direction;
            $direction_maps = $suc_send[0]->direction_maps;
            //print_r( $direction ); return;
        }

        //$dataEmail  = array($to_email, "peni.begima@gmail.com");
        //$dataEmail  = array($correo);
        $dataEmail = array($to_email, "peni.begima@gmail.com");

        $to_email = $dataEmail;

        $data = array("name" => "compras@begima.com.mx", "body" => ['nombre' => $nombre,
            'apellidos' => $apellidos,
            'correo' => $correo,
            'telefono' => $telefono,
            'path' => '..',
            'code' => "..",
            'type' => 'MP',
            'productos' => \Session::get('productos'),
            'total' => $this->_getTotalCart(),
            'subtotal' => $this->_getSubTotalCart(),
            'folio' => $folio_sitio,
            'method_send' => $method_send,
            'option_send' => $option_send,
            'price_send' => $price_send,
            'direction' => $direccion . ", " . $ciudad . " " . $estado . " " . $cp,
            'direction_susucrsal' => $direction,
            'direction_maps' => $direction_maps
        ]);

        $status = Mail::send("emails-apartado-spei", $data, function ($message) use ($nombre, $to_email, $dataEmail) {
            $message->to($dataEmail, $nombre)
                ->subject("Datos de tu compra en Begima");
            $message->from("compras@begima.com.mx", "www.begima.com.mx");
        });
    }
}  
