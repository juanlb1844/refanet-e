<?php
 
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// link para facturacion 

Route::get('facturacion', 'Cliente\Facturacion@facturacion'); 
 
// prueba vídeo
Route::get('video', 'Cliente\Home@video');    

// notifications 

Route::get('notifications', 'Admin\Admin@notifications'); 

//gant   
Route::get('gant', 'Admin\Admin@gant'); 


Route::post('opinion', 'Admin\Admin@opinion'); 
Route::post('saveComment', 'Admin\Admin@saveComment'); 
  
Route::get('/checkout-main',  'Cliente\Home@checkoutMain');     
 
Route::post('/updateStautsProduct', 'Admin\Admin@updateStautsProduct'); 
Route::post('/addToPromos', 'Admin\Admin@addToPromos'); 

//DEBUG 
Route::get('trySession', 'Cliente\Home@trySession'); 
 
Route::get('getFromComercia/{id}', 'Files@getFromComercia'); 

// FAVORITES  
Route::post('setFavorite', 'Cliente\Home@setFavorite'); 

// ADMIN ROUTES  
Route::get('importarWP', 'Files@WP'); 
Route::get('wp_getCategories', 'Files@wp_getCategories'); 
Route::get('wp_setTallas', 'Files@wp_setTallas');    
Route::get('try', 'Openpay@try'); 

Route::post('mercadoPago', 'MercadoPago@pago');  
Route::post('referenciaMP', 'MercadoPago@referenciaMP');

Route::post('updateLayout', 'Admin\Admin@updateLayout'); 

Route::post('cargo', 'Openpay@Cargo'); 
Route::post('cargo2', 'Openpay@Cargo2');
Route::get('cargoTienda', 'Openpay@tienda');
Route::get('tryMail', 'Openpay@tryMail'); 
 
Route::post('registroCompra', 'Openpay@registroCompra');  
Route::post('registroCompra2', 'Openpay@registroCompra2'); 


Route::get('boletin-admin', 'Admin\Admin@boletinAdmin'); 
Route::get('pay-methods', 'Admin\Admin@payMethods'); 
Route::get('payMethod/{id}', 'Admin\Admin@payMethod');
Route::post('updateMethod', 'Admin\Admin@updateMethod'); 


Route::get('comments-admin', 'Admin\Admin@commentsList'); 
Route::get('comment/{id}', 'Admin\Admin@viewComment');  
Route::post('updateComment', 'Admin\Admin@updateComment'); 
Route::post('deleteComment', 'Admin\Admin@deleteComment');  
Route::post('configComments', 'Admin\Admin@configComments');  


Route::post('setboletin', 'Admin\Admin@setboletin');  

// modelo de datos  
Route::get('getTreeTallas', 'Admin\Admin@getTreeTallas');  
Route::get('getTreeCats', 'Admin\Admin@getTreeCats');  
Route::post('setNewCat', 'Admin\Admin@setNewCat');    
Route::post('setNewCatTalla', 'Admin\Admin@setNewCatTalla');   

Route::post('editSliderType', 'Admin\Admin@editSliderType'); 

Route::post('saveClientData', 'Admin\Admin@saveClientData');    

Route::get('tryMl', 'MercadoPago@tryMl'); 

Route::post('deleteTalla', 'Admin\Admin@deleteTalla'); 
Route::post('setNewTalla', 'Admin\Admin@setNewTalla');     

Route::post('updateBlock', 'Admin\Admin@updateBlock'); 

Route::post('updateSlider', 'Admin\Admin@updateSlider');      
Route::post('updateSliderConfig', 'Admin\Admin@updateSliderConfig');     
Route::post('deleteSliderItem', 'Admin\Admin@deleteSliderItem');     


Route::post('setNewBrand', 'Admin\Admin@setNewBrand'); 
Route::post('editBrand', 'Admin\Admin@editBrand'); 
Route::post('editFamily', 'Admin\Admin@editFamily');  
Route::post('edeleteBrand', 'Admin\Admin@edeleteBrand'); 
Route::post('deleteFamily', 'Admin\Admin@deleteFamily'); 

//sucursal  
Route::post('updateSucursal', 'Admin\Admin@updateSucursal'); 
Route::post('newSucursal', 'Admin\Admin@newSucursal'); 
Route::post('deleteSucursal', 'Admin\Admin@deleteSucursal'); 


Route::post('newGroupMenu', 'Admin\Admin@newGroupMenu');  
Route::post('newOptionMenu', 'Admin\Admin@newOptionMenu');  
Route::post('getGroupMenu', 'Admin\Admin@getGroupMenu');   
Route::post('getOptionMenu', 'Admin\Admin@getOptionMenu');  //  
Route::post('updateGroupMenu', 'Admin\Admin@updateGroupMenu');
Route::post('updateOptionMenu', 'Admin\Admin@updateOptionMenu'); //    
Route::post('deleteGroupMenu', 'Admin\Admin@deleteGroupMenu');     
Route::post('deleteOptionMenu', 'Admin\Admin@deleteOptionMenu');  //  
Route::post('newOptionMenuL2', 'Admin\Admin@newOptionMenuL2');  
Route::post('getOptionMenuL2', 'Admin\Admin@getOptionMenuL2');  //    
Route::post('deleteOptionMenuL2', 'Admin\Admin@deleteOptionMenuL2');  //  
Route::post('updateOptionMenuL2', 'Admin\Admin@updateOptionMenuL2'); //    
 
// ORDENAr IMÁGENES 
Route::post('updateMainImg', 'Admin\Admin@updateMainImg');     
// ORDENAr IMÁGENES 

Route::post('/addToProduct',        'Cliente\Carrito@addToProduct'); 
Route::get('/restartCart',        'Cliente\Carrito@restartCart'); 

Route::get('/politica-de-privacidad',        'Cliente\Home@politica'); 
Route::get('/tryP',        'Cliente\Home@tryP');  
Route::get('/politica-de-devoluciones',        'Cliente\Home@devoluciones'); 

Route::post('/saveCatTalla', 'Admin\Admin@saveCatTalla'); 

Route::get('restaurar',     'Admin\Admin@restaurar'); 

// login to admin  
Route::get('admin136', 		    'Admin\Admin@login');
Route::get('auth', 			    'Auth@process');       // log to admin/client-user 
Route::get('tryFb', 'Auth@tryFb'); 

Route::get('authAdmin', 	    'Auth@processAdmin');  // log to admin/client-user 
Route::get('outAdmin',          'Auth@outAdmin');   
Route::get('/cliente/{id}',     'Admin\Admin@cliente')->middleware('logueadoAdmin');  // ver datos clientes 
Route::post('/deleteClient',     'Admin\Admin@deleteClient')->middleware('logueadoAdmin');  // ver datos clientes 
Route::get('grupos', 		    'Admin\Admin@grupos')->middleware('logueadoAdmin');   // ver grupos para precios     
Route::get('configHome', 		'Admin\Admin@configHome')->middleware('logueadoAdmin');
Route::get('envios', 		'Admin\Admin@envios')->middleware('logueadoAdmin');
  
Route::post('savePaqueterias', 		'Admin\Admin@savePaqueterias')->middleware('logueadoAdmin');
//Route::get('mercadopago', 		'Admin\Admin@mercadopago')->middleware('logueadoAdmin');
  
// ENVÍOS 
Route::post('skydropx', 		    'Admin\Admin@skydropx'); 
Route::get('sky2', 		    'Admin\Admin@sky2'); 
Route::get('99minutos', 		    'Admin\Admin@minutos');   

Route::get('/productos', 		'Admin\Admin@productos')->middleware('logueadoAdmin'); // ver productos admin    	
Route::get('/productos2', 		'Admin\Admin@productos2')->middleware('logueadoAdmin'); // ver productos admin 
   	
Route::get('/cupones', 		'Admin\Admin@cupones')->middleware('logueadoAdmin'); // ver productos admin    	
Route::get('/editCoupon/{id}', 		'Admin\Admin@editCoupon')->middleware('logueadoAdmin'); // ver productos admin    	
Route::get('/newCoupon', 		'Admin\Admin@newCoupon')->middleware('logueadoAdmin'); // ver productos 
 

  

Route::post('/saveTalla',       'Admin\Admin@saveTalla');
Route::post('/updateTalla',     'Admin\Admin@updateTalla');
Route::get('/clientes',         'Admin\Admin@clientes');   

Route::post('compyImgTo', 'Files@compyImgTo'); 
Route::get('createFeed', 'Files@createFeed'); 

Route::post('/updatePassClient', 'Admin\Admin@updatePassClient'); 

Route::post('deleteProduct',    'Admin\Admin@deleteProduct');    
Route::get('/editProduct/{id}', 'Admin\Admin@editProduct')->middleware('logueadoAdmin');
Route::post('/saveProduct',     'Admin\Admin@saveProduct'); 
Route::get('/dashboardData',    'Admin\Admin@dashboardData'); 

Route::get('/editPage/{id}',    'Admin\Admin@editPage');  
Route::get('/paginas',    'Admin\Admin@paginas'); 
Route::post('/updatePage', 'Admin\Admin@updatePage'); 
  

// pedidos  
Route::get('/pedidos',   'Admin\Admin@pedidos');  
Route::get('/pedidoDetalles/{folio}',   'Admin\Admin@pedidoDetalles');
Route::get('/crearPedido', 'Admin\Admin@newPedidoView'); 
Route::post('/getProductsToAdd', 'Admin\Admin@getProductsToAdd');  

Route::post('/borrarGrupoTallas',   'Admin\Admin@borrarGrupoTallas'); 
Route::post('/borrarTalla',   'Admin\Admin@borrarTalla'); 
   
Route::post('/saveConfig', 'Admin\Admin@saveConfig');   
Route::post('/saveConfigColor', 'Admin\Admin@saveConfigColor');   
Route::post('/saveConfigMail', 'Admin\Admin@saveConfigMail');    
Route::post('/saveConfigAdmin', 'Admin\Admin@saveConfigAdmin');   

Route::post('/savePackColor', 'Admin\Admin@savePackColor');   


Route::get('/tryRoute', 'Files@try'); 

Route::post('/cargarImgagenAct', 'Files@cargarImagen'); 
Route::post('/cargarImagenMins', 'Files@cargarImagenMins');  
 
/////////// A P I S    R P A 's  
Route::post('/uploadPhoto', 'Files@uploadPhoto'); 
Route::post('/uploadPhotoSlider', 'Files@uploadPhotoSlider');
Route::post('/uploadBlock', 'Files@uploadBlock');
Route::post('/uploadBrand', 'Files@uploadBrand');
Route::post('/statusBrandSlider', 'Admin\Admin@statusBrandSlider'); 

Route::get('/getParts', 'Files@getParts');  
Route::post('/setFits', 'Admin\Admin@setFits');     


/////////// -- C L I E N T E S -- /////////////////
      
Route::get('out', 			'Auth@out');       // salir admin/client-user  
Route::post('/updateClient','Cliente\Home@updateClient');
Route::post('registerUser', 'Cliente\Home@registerUser');   

Route::get('print', 'Auth@print'); 

//catálogos 
Route::get('usuario', 'Cliente\Home@usuario'); 
Route::get('favoritos', 'Cliente\Home@favoritos'); 

Route::post('/getMarca', 'Admin\Admin@getMarca'); 
Route::get('/getTalla/{id}', 'Admin\Admin@getTalla');  
 
Route::post('/getCatTallas', 'Admin\Admin@getCatTallas');  
 
Route::post('/getFamilia', 'Admin\Admin@getFamilia'); 

Route::post('/setNewFamily', 'Admin\Admin@setNewFamily'); 

// get product by id   
Route::get('/getProductById/{id}', 'Admin\Admin@getProductById'); 
Route::post('/agregarPaquete', 'Admin\Admin@agregarPaquete'); 
Route::post('/borrarPaquete', 'Admin\Admin@borrarPaquete');  
Route::get('/getCategories', 'Admin\Admin@getCategories'); 
Route::get('/getCategorie/{id}', 'Admin\Admin@getCategorie'); 

// FILTERS 
Route::post('/searchByNp', 'Admin\Admin@searchByNp'); 

Route::post('/editLabelPack', 'Admin\Admin@editLabelPack');  

Route::get('/deleteCategorie/{id}', 'Admin\Admin@deleteCategorie'); 

// vista del home dashboard 
Route::get('/admin', 'Admin\Admin@admin');    
//** retorna los datos para el dashboard [gráficas, paneles, etc]
// vista de lista de productos con img 
// Adjunta los productos con imágenes ya cargadas 
Route::post('/moveCategorie', 'Admin\Admin@moveCategorie'); 
Route::get('/categorias', 'Admin\Admin@catalogosCategorias');  
Route::get('/fits', 'Admin\Admin@fits');  
Route::get('/revisionImgs',   'Admin\Admin@revisionImgs'); 
Route::get('/revisionImgs2',  'Admin\Admin@revisionImgs2');
Route::get('/getNotImages',   'Admin\Admin@getNotImages'); 

Route::post('/newModelFit', 'Admin\Admin@newModelFit');   
 
Route::post('/getByModel', 'Admin\Admin@getByModel');    
Route::post('/getByYear', 'Admin\Admin@getByYear');
Route::post('/getByEngine', 'Admin\Admin@getByEngine');
 

Route::post('/updateCat', 'Admin\Admin@updateCat');  

/////////// A R C H I V O S      
// subida simple de números de parte  
Route::get('/files',  'Files@test');  
Route::post('/borrarFoto',  'Files@borrarFoto');
  
/////////// V I S T A    D E L    C L I E N T E 
Route::get('/',        'Cliente\Home@home');
Route::get('/home',    'Cliente\Home@home');
Route::get('/home4',   'Cliente\Home@home4'); 

Route::get('/home2',   function() { return view('home2'); }); 

Route::get('/index',          'Cliente\Home@home');
Route::get('/promociones', 'Cliente\Home@promociones');
 Route::get('/boletin', 'Cliente\Home@boletin');
Route::get('/terminos',       'Cliente\Home@terminos');  
Route::get('/ayuda',       'Cliente\Home@ayuda');  
Route::get('/carrito',        'Cliente\Home@carrito'); 

Route::get('/checkCoupon/{coupon}',        'Cliente\Carrito@checkCoupon'); 
 
Route::post('/createCoupon', 'Cliente\Carrito@newCoupon'); 
Route::post('/deleteCoupon', 'Cliente\Carrito@deleteCoupon'); 
Route::post('/updateCoupon', 'Cliente\Carrito@updateCoupon'); 
 
Route::get('/no-encontrado', 'Cliente\Home@similar'); 
Route::get('/no-encontrado404', 'Cliente\Home@similar404'); 

Route::get('/producto/{np}/pack/{pack}',  'Cliente\Home@producto');
Route::post('/getCantByTalla',  'Cliente\Home@getCantByTalla');  

Route::get('/checkout', 	  'Cliente\Home@checkout'); 

Route::get('/catalogo/{cat}', 'Cliente\Home@catalogo');      
Route::get('/catalogo/{cat}/order/{order}', 'Cliente\Home@catalogoOrder');     

Route::get('/search/{term}', 'Cliente\Home@search');     
Route::get('/search/{term}/fit/{idfit}', 'Cliente\Home@searchFit');      
Route::get('/byBrand/{id}', 'Cliente\Home@byBrand');     

Route::get('/donde-estamos',  'Cliente\Home@dondeEstamos'); 
Route::get('/donde-estamos2',  'Cliente\Home@dondeEstamos2');  

Route::get('/categorias-begima',  'Cliente\Home@categoriasBegima'); 

Route::get('/success/{folio}', 'Cliente\Home@success'); 

//cart   
Route::get('/cart', 'Cliente\Carrito@cart'); 
Route::post('/addToCart', 'Cliente\Carrito@addToCart'); 
Route::post('/deleteFromCart', 'Cliente\Carrito@deleteFromCart'); 
Route::post('/updateCantProduct', 'Cliente\Carrito@updateCantProduct'); 
 
Route::post('/updateSend', 'Cliente\Carrito@updateSend'); 

     
//orders    
Route::get('/createOrder', 'Cliente\Orders@createOrder'); 
Route::post('/api', 'Api@setProducts');  


Route::get('/descargar-app', 'Files@app');  

 
Route::get('/import', 'ImportController@import'); 
    
Route::get('/importOdoo', 'ImportController@importOdoo'); 
 
 
Route::get('/testImportOdooTest', 'ImportController@testImportOdooTest'); 
Route::get('/downLoadImg', 'ImportController@downLoadImg');  
Route::get('/downLoadImgOne/{sku}', 'ImportController@downLoadImgOne');    
Route::get('/showOdooProducts', 'ImportController@showOdooProducts');    
 
Route::get('/getProductsOdoo/{id}', 'ImportController@getProductsOdoo'); 
Route::get('/getProductsOdooBy/{sku}', 'ImportController@getProductsOdooBy'); 
 
Route::get('/searchImgInSite/{word}', 'ImportController@searchImgInSite');  