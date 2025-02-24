 <p style="font-size: 22px; font-weight: 800;">
 		<span class="back-checkout" id="to-options-pay" style="color: #1990c6;">ATRÁS &nbsp;&nbsp;
 		</span> Seleccione un método de pago </p>
	<div style="padding-top: 40px; font-size: 25;" id="options-pay-list">
		@foreach($methods as $method)
			<p class="options-pay {{$method->onclick}}">{{$method->desc}}</p> 
		@endforeach 
	</div>   

  <div style="padding-top: 40px; font-size: 25; display: none; " id="options-tarjeta">
    <div class="col-lg-12 col-xs-12">
        <div class="col-lg-12 col-xs-12 np">
            <p style="font-size: 22px;">Admitimos tarjetas <span style="font-weight: 700;">Visa</span> y <span style="font-weight: 700;">MasterCard</span></p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 np">
          <span class="name-field">Nombre de titular</span> 
          <input class="form-control c-input field-tarjeta-number" id="tarjeta_titular" type="card" name="1" title="El nombre que aparece en la tarjeta" placeholder="El nombre que aparece en la tarjeta">
        </div> 
        <div class="col-lg-9 col-md-12 col-sm-6 col-xs-12 np">
            <span class="name-field">Número de tarjeta (16 dígitos)</span>
            <input class="form-control c-input field-tarjeta-number" placeholder="xxxx xxxx xxxx xxxx" id="tarjeta_numero" title="Es necesario que sean sólo 16 digitos numéricos" placeholder="" type="card" name="1">  
          </div>
        <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12 np">
            <span class="name-field">MES (2 dígitos)</span>
            <input class="form-control c-input field-tarjeta-number" id="tarjeta_mes" placeholder="NN" type="card" name="1">
          </div>
         <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
            <span class="name-field">AÑO (2 dígitos)</span>
            <input class="form-control c-input field-tarjeta-number" id="tarjeta_anio" placeholder="NN" type="card" name="1">
          </div>
          <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
            <span class="name-field">CV (3 dígitos)</span>
            <input class="form-control c-input field-tarjeta-number" id="tarjeta_cv" placeholder="NN" type="card" name="1">
          </div> 
    </div>
  </div>   

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 np" style="padding-top: 40px!important;">  
      <button class="btn btn-primary btn-to-loading" id="step-finalizar-compra" style="height: 45px; font-weight: 800; letter-spacing: 2px; font-size: 17px;">Siguiente</button>
	</div>  



	<script type="text/javascript">

      let method_selected = ''; 
      let url_mp = ''; 

      let tarjeta_titular = null; 
      let tarjeta_numero  = null; 
      let tarjeta_mes     = null; 
      let tarjeta_anio    = null; 
      let tarjeta_cv      = null; 

      //PASO FINAL (comprar)
      $('#step-finalizar-compra').click( function() {

        if( method_selected == 'tarjeta' && $('#options-tarjeta').css('display') == 'block' ) {
          tarjeta_titular = $('#tarjeta_titular').val(); 
          tarjeta_numero = $('#tarjeta_numero').val(); 
          tarjeta_mes = $('#tarjeta_mes').val(); 
          tarjeta_anio = $('#tarjeta_anio').val(); 
          tarjeta_cv = $('#tarjeta_cv').val(); 

          let valid = false;  
          if( validate("#tarjeta_titular", 2) ) valid = true;  
          if( validate("#tarjeta_numero", 16) ) valid = true;  
          if( validate("#tarjeta_mes", 2) ) valid = true;  
          if( validate("#tarjeta_anio", 2) ) valid = true;  
          if( validate("#tarjeta_cv", 3) ) valid = true;

          if( valid ) return;  
          pagarConTarjeta(); 
        }

        console.log("TR--"); 

        if( $('#options-pay-list .sucursal-selected').length == 0 ) {
          alert("Selecciona una opción de pago"); 
        } else { 
          if(method_selected == 'MP') {
            pagarPorMercadopago(); 
            //window.location = url_mp; 
          } else if(method_selected == 'tarjeta') {
            $('#options-pay-list').slideUp(); 
            $('#options-tarjeta').slideDown(); 
          } else if(method_selected == 'sucursal') {
            pagoEnSucursal(); 
          } else if( method_selected == 'spei' ) {
            pagoPorSpei('spei');  
          } else if( method_selected == 'tiendas' ) {
            pagoPorSpei('tiendas');  
          }
        } 
      }); 


      function pagoPorSpei( pay_method ) {
        $('#overlay').fadeIn(); 

        //prueba mkcuj3uqoeeccp4qhaoi
        //produccion mbs3pxfh8gqtec2i5qjy  
        OpenPay.setId('mbs3pxfh8gqtec2i5qjy');   
        //prueba pk_65236ee443284b9c9fa1f98c438a6fc1
        //produccion pk_b6f27ae9eff849539dcb69dd10387a9a
        OpenPay.setApiKey('pk_b6f27ae9eff849539dcb69dd10387a9a'); 
        //OpenPay.setSandboxMode(true);           
              
        deviceSessionId = OpenPay.deviceData.setup(); 
        
        //alert(way_send); 
        /* 
        if( way_send == 'recoger' ) {
          envio_estado = 'Jalisco'; 
          envio_ciudad = 'Zapopan'; 
          envio_cp = '45130'; 
          envio_calle = ''; 
          envio_adicional = '';   
          envio_entre = ''; 
        }   */ 

        console.log("TRYYYYY");   
         if( cliente_correo === '' ) {
            cliente_nombre = $('#cliente-nombre').val(); 
            cliente_apellidos = $('#cliente-apellidos').val(); 
            cliente_telefono = $('#cliente-telefono').val(); 
            cliente_correo = $('#cliente-correo').val(); 
         }

         if( way_send == 'recoger') {
            let c_dia = new Date( $('#date-to-collect').val() ).getDate()+1; 
            let c_mes = new Date( $('#date-to-collect').val() ).getMonth()+1; 
            let c_anio = new Date( $('#date-to-collect').val() ).getFullYear();

            collection_date = c_anio  + "-" + c_mes + "-" + c_dia ; 
         }

         //alert(envio_adicional); 
  
        $.ajax({  
            'url' : '{{asset('cargo2')}}', 
            'method' : 'post', 
            'data' : {
                      'nombre'      : cliente_nombre, 
                      'apellidos'   : cliente_apellidos, 
                      'telefono'    : cliente_telefono, 
                      'correo'      : cliente_correo, 
                      'estado'      : envio_estado, 
                      'ciudad'      : envio_ciudad,  
                      'cp'          : envio_cp, 
                      'cireccion'   : envio_calle, 
                      'device'      : deviceSessionId,  
                      'mathod'      : pay_method,  
                      'dreferencia' : envio_adicional,  
                      'dentre'      : envio_entre,  
                      'id_unidad'   : '010101',  
                      'path'        : '010101010', 
                      'collection_date' : collection_date
                  },  
            'success' : function( resp ) {  
                 console.log( resp );  
                 $('#setCargo').html('Pagar'); 
                 window.location.href = '{{asset('success')}}/'+resp.trim(); 
            }     
         });  
      }


      $('.btnPagarEnSucursal').click( function() {
        method_selected = 'sucursal';   
      }); 

      // seleccionar tarjeta
      $('.btnPagarPorTarjeta').click( function() {
        method_selected = 'tarjeta';  
      }); 

      // selecciona spei 
      $('.btnPagarPorSpei').click( function() {
        method_selected = 'spei'; 
        //pagoPorSpei(method_selected); 
      }); 

      // seleccionar Mercado Pago 

			$('.btnPagarPorMP').click( function() {
        method_selected = 'MP'; 
				//pagarPorMercadopago(); 

			});    

      $('.btnPagarPorTienda').click( function() {
        method_selected = 'tiendas';  
      }); 

      // pagar con tarjeta 
      function pagarConTarjeta() {

         if( cliente_correo === '' ) {
            cliente_nombre = $('#cliente-nombre').val(); 
            cliente_apellidos = $('#cliente-apellidos').val(); 
            cliente_telefono = $('#cliente-telefono').val(); 
            cliente_correo = $('#cliente-correo').val(); 
         } 

        $('#overlay').fadeIn(); 
        pay_method = 'tarjeta'; 
 
        //prueba mkcuj3uqoeeccp4qhaoi
        //produccion mbs3pxfh8gqtec2i5qjy  
        OpenPay.setId('mbs3pxfh8gqtec2i5qjy');   
        //prueba pk_65236ee443284b9c9fa1f98c438a6fc1
        //produccion pk_b6f27ae9eff849539dcb69dd10387a9a
        OpenPay.setApiKey('pk_b6f27ae9eff849539dcb69dd10387a9a'); 
        //OpenPay.setSandboxMode(true);           
            
        deviceSessionId = OpenPay.deviceData.setup(); 
         
        var resp = OpenPay.token.create({
                      "card_number": tarjeta_numero,
                      "holder_name": tarjeta_titular, 
                      "expiration_year": tarjeta_anio, 
                      "expiration_month": tarjeta_mes,  
                      "cvv2": tarjeta_cv,
                      "address":{
                         "city": envio_ciudad,
                         "line3": envio_ciudad,  
                         "postal_code": envio_cp,   
                         "line1": envio_calle, 
                         "line2": envio_calle,
                         "state": envio_estado,
                         "country_code":"MX"
                        }
                    }, SuccessCallback, ErrorCallback );

        function SuccessCallback(response) { 
                console.log(response); 
                var content = '', results = document.getElementById('resultDetail');
                content += 'Id tarjeta: ' + response.data.id + '<br />';
                content += 'A nombre de: ' + response.data.card.holder_name + '<br />';
                content += 'Marca de tarjeta usada: ' + response.data.card.brand + '<br />';
                document.getElementById('cart_total').innerHTML = content;
               //console.log( OpenPay.card.cardType(tarjetaNumero) ); 
                //alert( response.data.id); 
                //alert("se ejecutará el cargo"); 

                $.ajax({
                    'url' : '{{asset('cargo2')}}',  
                    'method' : 'post',     
                    'data' : {'id'         : response.data.id, 
                              'titular'    : tarjeta_titular, 
                              'expiraAnio' : tarjeta_anio, 
                              'expiraMes'  : tarjeta_mes, 
                              'cv'         : tarjeta_cv, 
                              'ciudad'     : envio_ciudad,  
                              'estado'     : envio_estado, 
                              'direccion'  : envio_calle, 
                              'cp'         : envio_cp, 
                              'apellido'   : cliente_apellidos, 
                              'telefono'   : cliente_telefono, 
                              'correo'     : cliente_correo, 
                              'device'     : deviceSessionId,  
                              'mathod'     : pay_method, 
                              'nombre'     : cliente_nombre, 
                              'apellidos'  : cliente_apellidos,  
                              'dreferencia' : envio_adicional,
                              'terminacion' : tarjeta_numero.substr( tarjeta_numero.length - 4, tarjeta_numero.length ),  
                              'id_unidad'  : '0101010', 
                              'path'       : 'path'   
                             },  
                    'success' : function( resp ) { 
                        resp = JSON.parse( resp ); 
                        console.log( resp ); 
                        folio_tienda = resp.folio;  
                        window.location.href = "https://www.begima.com.mx/success/"+resp.id_openpay;  
                        $('#overlay').fadeOut(); 
                        //window.location.href = '{{asset('success')}}/'+resp.external_id;   
                    }, 
                    'error' : function( resp ) {
                        console.log( resp );
                        $('#overlay').fadeOut(); 
                        console.log( resp.responseJSON ); 
                        console.log( resp.responseJSON.message ); 

                        let mge = resp.responseJSON.message; 
  
                        switch( mge.trim() ) {
                            case "The card was reported as stolen": 
                                mge = "tarjeta reportada como perdida o robada"; 
                                break; 
                            case "The number of retries of charge is greater than allowed": 
                                mge = "fondos insuficientes"; 
                                break;  
                            case "Fraud risk detected by anti-fraud system": 
                                mge = "La tarjeta ha sido rechazada por el sistema antifraudes."; 
                                break; 
                            case "The card was declined by the bank": 
                                mge = "tarjeta declinada"; 
                                break; 
                            case "The card has expired": 
                                mge = "La tarjeta ha expirado."; 
                                break; 
                        }
 
                        mge = "El pago ha sido declinado"; 
 
                        $('#card-mge').html("<span>"+mge+"</span>"); 
                        $('#card-mge').fadeIn();  
                        $('.btn-check-pago').removeAttr("disabled");   
                    }  
                });   
            }

            function ErrorCallback(response) {
              var content = '', results = document.getElementById('resultDetail');
              content += 'Estatus del error: ' + response.data.status + '<br />';
              content += 'Error: ' + response.message + '<br />';
              content += 'Descripción: ' + response.data.description + '<br />';
              content += 'ID de la petición: ' + response.data.request_id + '<br />';
              document.getElementById('cart_total').innerHTML = content;
            }
      }
 

      // pagar en sucursal 
      function pagoEnSucursal() {
        let c_dia = new Date( $('#date-to-collect').val() ).getDate()+1; 
        let c_mes = new Date( $('#date-to-collect').val() ).getMonth()+1; 
        let c_anio = new Date( $('#date-to-collect').val() ).getFullYear();

        collection_date = c_anio  + "-" + c_mes + "-" + c_dia ; 

         if( cliente_correo === '' ) {
            cliente_nombre = $('#cliente-nombre').val(); 
            cliente_apellidos = $('#cliente-apellidos').val(); 
            cliente_telefono = $('#cliente-telefono').val(); 
            cliente_correo = $('#cliente-correo').val(); 
         } 
          
         $('#overlay').fadeIn(); 
         $.ajax({  
                        'url' : "{{asset('/registroCompra2')}}", 
                        'method': 'post',  
                        'data' : { 
                                      'nombre'      : cliente_nombre, 
                                      'apellidos'   : cliente_apellidos, 
                                      'telefono'    : cliente_telefono, 
                                      'correo'      : cliente_correo,  
                                      'method_send' : 'Sucurdal Begima Acatlán', 
                                      'option_send' : 'Recoger en sucursal', 
                                      'collection_date' : collection_date,   
                                      'pay-store-option' : ''
                        }, 
                        'success' : function( resp ) { 
                            window.location.href = "https://begima.com.mx/success/"+resp; 
                        } 
                    });  
      }






      // modo modal ´only 
			function agregarSdk( preference ) {
				 var script = document.createElement("script"); 
				 script.src = "https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"; 
				 script.type = "text/javascript"; 
				 script.dataset.preferenceId = preference.trim(); 
				 document.getElementsByClassName('mercadopago')[0].innerHTML = ""; 
				 document.getElementsByTagName('body')[0].appendChild(script); 
			}

		   let mercadoPago = true; 
		   function pagarPorMercadopago() {

            $('#overlay').fadeIn(); 
            //TEST 
            //TEST-c061e716-f2bd-418a-8056-bd680574d022 
            //PRODUCCIÓN 
            //APP_USR-58da31ec-bfb9-44e2-906b-4fce2347c3a6
            var modoMP = 'redirect'; 
            //var modoMP = 'modal';  

            if( mercadoPago == true ) {

                nombre     = ""; 
                apellidos  = ""; 
                telefono   = ""; 
                correo     = ""; 
                estado     = ""; 
                ciudad     = ""; 
                cp         = ""; 
                direccion  = ""; 
                   
  
                $.ajax({
                    'url'     : "{{asset('referenciaMP')}}", 
                    'method'  : 'POST',  
                    'data'    : { 'nombre'    : nombre, 
                                  'apellidos' : apellidos, 
                                  'telefono'  : telefono, 
                                  'direccion' : direccion, 
                                  'correo'    : correo,  
                                  'estado'    : estado,
                                  'ciudad'    : ciudad, 
                                  'cp'        : cp  }, 
                                  
                    'success' : function(resp) { 
                        //agregarSdk( resp ); 
                        referencia_mp = resp;      
                        const mp      = new MercadoPago('APP_USR-58da31ec-bfb9-44e2-906b-4fce2347c3a6', { locale: 'es-MX' }); 
                      if( modoMP == 'modal'){
                          mp.checkout({
                              preference: {
                                    id: referencia_mp
                                  },
                                     render: {
                                        container: '.mercadopago', 
                                        label: 'Pagar con Mercadopago'
                                  }
                            });                        
                        } else {
                            //$('.mercadopago').html('<a href="'+referencia_mp+'">Pagar con MercadoPago</a>')
                           // window.location.href = referencia_mp; 
                           alert(referencia_mp+"--");   
                            method_selected = 'MP'; 
                            url_mp = referencia_mp; 
                            $('#overlay').fadeOut(); 
                        }
                        console.log( referencia_mp   ); 
                    } 
                });   
            }
        }
	</script>