<div class="section-content">

	<style type="text/css">
		.content-data {
			box-shadow: none;
		}
		.presentation {
			box-shadow: none;
		}

        @media( max-width: 600px ) {
            .container-header-cart { text-align: center; }
            .row-logo { display: none!important; }
            .container-checkout-t1 {
                margin-top: 40px!important;
            }
            .container-checkout-t1 {
                padding-left: 0px; 
                padding-right: 0px; 
            }
            .checkout-step { padding-left: 5px!important; padding-right: 5px!important; padding-top: 0px!important; }
            .checkout-step h3, .checkout-step h2 { display: none!important; }
            .important { display: block!important; }
            .products-section { padding: 5px!important; }
            .method-pay-text { display: none!important; }
            .nav>li>a {
                padding: 10px 8px;
            }
            .header-chekout { display: inline-block; }
        }
	</style>

    <div class="main-step-1" style="text-align: center;">
        <!-- <h3>SELECCIONA UN MÉTODO DE PAGO PARA TU APARTADO</h3> --> 
    </div>

    <!-- OPENPAY --> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
    <!-- --> 

    <!-- MERCADOPAGO --> 
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <!-- -->    
    
    <div class="modal-register main-step-1"> 
            <div class="modal-content content-data"> 
               <ul class="nav nav-tabs"> 
                    <li role="presentation" class="opt-panel" id="opt-panel-spei">
                        <a href="#">
                            <img src="{{asset('media/checkout-media/billetera.svg')}}" style="width: 20px;">
                            <span class="method-pay-text"> Transferencia bancaria </span>
                        </a>
                    </li> 
                    <li role="presentation" class="opt-panel" id="opt-panel-tarjeta">
                        <a href="#"> 
                             <!-- <img src="{{asset('stores/card.svg')}}" style="width: 20px;">  --> 
                             <img src="{{asset('kit_openpay/masterCard.png')}}" style="width: 30px;"> 
                             <span class="method-pay-text"> Tarjeta de Débito/Crédito</span>
                        </a> 
                    </li>
                    <li role="presentation" class="opt-panel" id="opt-panel-tiendas">
                        <a href="#">
                            <!-- <img src="{{asset('media/checkout-media/store.svg')}}" style="width: 20px;"> -->
                            <img style="width: 40px;" src="{{asset('stores/Logo_7Eleven.jpg')}}">
                            <span class="method-pay-text"> Pago en Tiendas </span>
                        </a> 
                    </li>  
                    <li role="presentation" class="opt-panel active" id="opt-panel-mercadopago">
                        <a href="#">
                            <img src="{{asset('Mercadopago-logo.png')}}" style="width: 100px;"> 
                        </a>
                    </li>  
                    <li role="presentation" class="opt-panel" id="opt-panel-sucursal">   
                        <a href="#">
                            <img src="https://begima.com.mx/media/begima%20logotipo-01%20web-simple-medium.png" style="width: 60px;"> 
                        </a> 
                    </li>  
                </ul>

                <div class="col-lg-12 pay-sucursal" style="display: none; padding: 20px 0px;"> 
                    <h3>Puedes pagar en cualquiera de las siguientes sucursales</h3> 
                    <div class="col-lg-12 nppad">
                        <label>Selecciona una sucursal para pagar</label> 
                        <select style="width: 250px;" class="form-control pay-store-option">
                            <option value="">Selecciona una sucursal</option> 
                            @foreach( $sucursales as $sucursal ) 
                                <option direction="{{$sucursal->direction}}" googlemaps="{{$sucursal->googlemaps}}" value="{{$sucursal->name}}">{{$sucursal->name}}</option>
                            @endforeach 
                        </select>
                        <a style="padding-top: 7px; font-size: 10px; display: inline-block;" href="#" data-toggle="modal" data-target="#direction-modal">Ver en el mapa</a>
                    </div>
                </div>
 
                <div class="col-lg-12 pay-tienda" style="display: none; padding: 20px 0px;"> 
                    <h4> Haz click en pagar y se te proporcionarán las instrucciones para el pago en cualquiera de las siguientes tiendas </h4> 
                     <div class="col-lg-3 col-xs-6"> 
                         <img style="width: 140px;" src="{{asset('stores/Logo_7Eleven.jpg')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_-Aurrera.png')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_-f_benavides.jpg')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_f_DelAhorro.jpg')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_-f_guadalajara.jpg')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_Kiosko.jpg')}}">
                     </div>
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_-walmart.png')}}">
                     </div> 
                     <div class="col-lg-3 col-xs-6">
                         <img style="width: 140px;" src="{{asset('stores/Logo_-waldos.jpg')}}">
                     </div>
                     <!-- 
                    <div style="width: 100%;"> 
                        <iframe width="100%" height="250px" src="https://www.paynet.com.mx/mapa-tiendas/index.html?locationNotAllowed=true"></iframe>
                    </div> --> 
                </div>

                <div class="col-lg-12 pay-spei" style="display: none; padding: 20px 0px;"> 
                    <h3> Al final de tu registro se te proporcionarán las instrucciones para realizar tu transferencia o depósito bancario </h3>
                    <div class="col-lg-12 next">
                        <div class="col-lg-6">  
                        <!--  
                            <button class="btn btn-primary getPersonal" >Siguiente</button> --> 
                        </div> 
                        <div class="col-lg-6">   
                            <img src="{{asset('media/checkout-media/spei.png')}}" style="width: 250px; size: ">
                        </div>
                    </div>
                </div>
                
                <style type="text/css">
                    .mercadopago a {
                        background-color: #008dd8;  
                        font-weight: bolder;
                        color: white!important;
                        padding: 7px 15px;
                        border-radius: 7px;
                        display: inline-block;
                        margin-top: 20px;
                    }
                </style>

                <div class="col-lg-12 pay-mercadopago" style="padding: 20px 0px;"> 
                    <h3> HAZ CLICK PARA IR A PAGAR </h3>
                    <div class="col-lg-12 next">
                        <div class="col-lg-6 mercadopago">   
                            <button style="background-color: #008dd8; font-weight: 200; padding: 10px 25px;" class="btn btn-primary btnPagarPorMP">Pagar por mercadopago</button>
                        </div>
                        <div class="col-lg-6">   
                                <img src="{{asset('Mercadopago-logo.png')}}" style="width: 250px; size: ">
                        </div>
                    </div>
                </div> 
 
                <!-- MÉTODO CON TARJETA --> 
                <div class="col-lg-12 pay-info row" style="padding-top: 30px; display: none;">
                    <div style="padding-bottom: 10px; padding-left: 10px; padding-right: 10px; "> 
                        <h4>Admitimos tarjetas <strong>Visa</strong> y <strong>MasterCard</strong></strong></h4>
                    </div>
                    <form id="form-openpay">  
                        <div class="col-lg-6 row-info">
                            <div class="title-input">
                                <p>NOMBRE DEL TITULAR</p> 
                            </div>
                        <input id="data-tarjeta-nombre" class="form-control" type="text" name="" pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜÖöäÄëË\s]{2,40}" title="El nombre que aparece en la tarjeta" required> 
                    </div>
                    <div class="col-lg-6 row-info">
                        <div class="title-input">
                            <p>NÚMERO DE TARJETA</p>
                        </div> 
                        <input id="data-tarjeta-numero" class="form-control" type="text" name="" pattern="[0-9]{15,}" required title="Es necesario que sean sólo 16 digitos numéricos">  
                    </div>
                    
                            <div class="col-lg-6">
                                <div class="col-lg-6">
                                    <div class="title-input">
                                        <p>FECHA DE VENCIMIENTO</p>
                                    </div>  
                                    <input id="data-tarjeta-mes" placeholder="MM" class="form-control" type="number" name="month" max="12" min="01" required title="El mes que aparece enfrente de tu tarjeta en formato NN">
                                    <div class="post-title">
                                        <span>MES</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p>&nbsp;</p>
                                    <input id="data-tarjeta-anio" placeholder="YY" class="form-control" type="number" name="year" max="55" min="21" required title="El año que aparece enfrente de tu tarjeta en formato NN"> 
                                    <div class="post-title">
                                        <span>AÑO</span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-3">
                                    <div class="title-input">
                                        <p>CVV</p> 
                                    </div>  
                                    <input id="data-tarjeta-cvv" class="form-control" pattern="[0-9]{3}" min="000" max="999" type="text" name="cvv" required title="Los 3 dígitos de tu código de seguridad (al reverso de tu tarjeta)">
                                </div>
                                <div class="col-lg-2">
                                    <p>&nbsp;</p>    
                                    <span style="display: inline-block; width: 40px; height: 40px; background-image: url({{asset('media/checkout-media/cvv.svg')}}); background-size: 100%; background-position: top; background-repeat: no-repeat;"> 
                                    </span>
                                </div>
                                <div class="col-lg-7" style="padding-top: 20px">
                                    <img style="width: 140px" src="{{asset('kit_openpay/openpay_color.png')}}">
                                </div>
                            </div>
                        
                       
                        <div class="col-lg-12">
                            <label><input type="checkbox" required></input>Acepto los términos y condiciones <a href="{{asset('terminos')}}" target="_blank">ver</a></label>
                        </div>
                        <div class="col-lg-12" style="padding-top: 20px;"> 
                            <div class="alert alert-danger" id="card-mge" style="display: none;">
                              <!-- -->  
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
    </div>

     <div class="modal-register main-step-2" style="display: none;">
     <div class="modal-content content-data"> 
        <div class="col-lg-12 personal-info">
                    <div class="col-lg-12">
                        <p id="atras" style="font-size: 15px; font-weight: 800; color:#4e9dcf; ">ATRÁS</p> 
                    </div>
                     <div class="col-lg-6 row-info">
                        <div class="title-input">
                            <p>Nombre</p >
                        </div>
                        <input id="data-cliente-nombre" class="form-control" type="text" name="first-name">
                    </div>
                    <div class="col-lg-6 row-info">
                         <div class="title-input">
                            <p>Apellidos</p> 
                        </div>
                        <input id="data-cliente-apellidos" class="form-control" type="text" name="">
                    </div>
                    <div class="col-lg-6 col-xs-6 row-info">
                        <div class="title-input"> 
                            <p>TELÉFONO</p >
                        </div>
                        <input id="data-cliente-telefono" class="form-control" type="text" name="">
                    </div>
                    <div class="col-lg-6 col-xs-6 row-info">
                        <div class="title-input">
                            <p>CORREO</p>
                        </div>
                        <input id="data-cliente-correo" class="form-control" type="text" name="">
                    </div>
                    <div class="col-lg-12">
                        <p>&nbsp;</p>
                    </div>
                    <div class="col-lg-5 row-info">
                        <div class="title-input">
                            <p>ESTADO</p>
                        </div>
                        <select id="data-cliente-estado" class="form-control"> 
                            <option>Estado</option>
                            <option>Aguascalientes</option>
                            <option>Baja California</option>
                            <option>Baja California Sur</option>
                            <option>Campeche</option> 
                            <option>Coahuila de Zaragoza</option>
                            <option>Colima</option>
                            <option>Chiapas</option>
                            <option>Chihuahua</option>
                            <option>Distrito Federal</option>
                            <option>Durango</option> 
                            <option>Guanajuato</option>
                            <option>Guerrero</option>
                            <option>Hidalgo</option>
                            <option>Jalisco</option>
                            <option>México</option>
                            <option>Michoacán</option>
                            <option>Morelos</option>
                            <option>Nayarit</option>
                            <option>Nuevo León</option>
                            <option>Oaxaca</option>
                            <option>Puebla</option>
                            <option>Querétaro</option>
                            <option>Quintana Roo</option>
                            <option>San Luis Potosí</option>
                            <option>Sinaloa</option>
                            <option>Sonora</option>
                            <option>Tabasco</option>
                            <option>Tamaulipas</option>
                            <option>Tlaxcala</option>
                            <option>Veracruz</option>
                            <option>Yucatán</option>
                            <option>Zacatecas</option>
                        </select>
                    </div>
                    <div class="col-lg-5 row-info">
                        <div class="title-input">
                            <p>CIUDAD</p>
                        </div>
                        <input id="data-cliente-ciudad" class="form-control" type="text" name="">
                    </div>
                    <div class="col-lg-2 row-info">
                        <div class="title-input">
                            <p>CP</p>
                        </div> 
                        <input id="data-cliente-cp" class="form-control" type="text" name="">
                    </div>
                    <div class="col-lg-12 row-info">
                        <div class="title-input">
                            <p>DIRECCIÓN</p>
                        </div>
                        <input id="data-cliente-direccion" class="form-control" type="text" name="">
                    </div>

                     <div id="resp" class="col-lg-12">
                           
                     </div>
  
                     <div class="col-lg-12 alert-fields" style="padding-top: 20px; display: none;">
                        <div class="alert alert-danger" role="alert">
                            <span>Tienes que llenar todos los campos y aceptar nuestra política de privacidad*</span>
                        </div>
                     </div>

                     <!-- 
                     <div class="col-lg-12" style="padding-top: 20px; text-align: center;">
                            <div>
                                <label> <input type="checkbox" name="" id="politica"> ACEPTO POLÍTICA DE PRIVACIDAD </label>
                            </div> 
                        </div> --> 
                        <!-- 
                        <div class="col-lg-12" style="text-align: center;">
                            <div>
                                <button class="btn btn-primary">PAGAR</button>
                            </div>
                        </div> -->  
                    
                </div>
     </div> 
    </div>

	<div class="section-header" style="display: none;">
		<div class="col-lg-4" style="padding-left: 0px;">
			<h2>Pago</h2>	 
		</div>   
		<div class="col-lg-8" style="text-align: left; padding-top: 20px;">
			<img style="width: 35%;" src="media/pay.png">
		</div>
	</div>
</div>
<div class="section-container"> 
	<div class="section-header" style="padding-right: 0px;">
		<div class="col-lg-12 container-buttons">
			<div class="col-lg-6 col-xs-6 nppad" style="text-align: left;"> 
				<button class="btn btn-primary btn-checkout check-valid" {{$back}}>Atrás</button>
			</div>
			<div class="col-lg-6 col-xs-6 nppad to-right"> 
				<span class="mje-validation" style="display: none;">Ups, algo está mal </span>
				<button class="btn btn-primary btn-checkout btn-check-pago" id="setCargo">Pagar</button>
			</div>
		</div>
	</div>  
</div>
 

<script type="text/javascript">
	    var pay_method  = 'tarjeta';  
        var mercadoPago = true; 
        referencia_mp   = null; 

        $('#opt-panel-sucursal').click( function(event)  {
            $('.opt-panel').removeClass('active'); 
            $('#opt-panel-sucursal').addClass('active');  
            $('.pay-spei').slideUp(); 
            $('.pay-info').slideUp();  
            $('.pay-mercadopago').slideUp(); 
            $('.pay-sucursal').slideDown(); 
            pay_method = 'sucursal'; 
        }); 

        // tab mercadopago 
        $('#opt-panel-mercadopago').click( function( event ) {
            $('.opt-panel').removeClass('active'); 
            $('#opt-panel-mercadopago').addClass('active');  
            $('.pay-spei').slideUp(); 
            $('.pay-info').slideUp(); 
            $('.pay-sucursal').slideUp();  
            $('.pay-tienda').slideUp(); 
            $('.pay-mercadopago').slideDown(); 
            
        }); 

        $('.btnPagarPorMP').click( function( ) {
            pagarPorMercadopago(); 
        }); 
 
        function pagarPorMercadopago() {
            //TEST 
            //TEST-c061e716-f2bd-418a-8056-bd680574d022 
            //PRODUCCIÓN 
            //APP_USR-58da31ec-bfb9-44e2-906b-4fce2347c3a6
            var modoMP = 'redirect'; 
            //var modoMP = 'modal';  

            if( mercadoPago == true ) {
                mercadoPago = false; 

                nombre     = $('#form-name-client').val(); 
                apellidos  = $('#form-lastaname1-client').val() +" "+ $('#form-lastaname2-client').val(); 
                telefono   = $('#telefono-u').val(); 
                correo     = $('#form-mail-client').val();  
                estado     = $('#form-state-send').val();  
                ciudad     = $('#form-city-send').val(); 
                cp         = $('#form-cp-send').val();  
                direccion  = $('#form-direction-send').val()+ " " +$('#form-number-send').val(); 
                 

                $.ajax({
                    'url'     : "{{asset('mercadoPago')}}", 
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
                            $('.mercadopago').html('<a href="'+referencia_mp+'">Pagar con MercadoPago</a>')
                            window.location.href = referencia_mp; 
                        }
                        console.log( referencia_mp   ); 
                    } 
                });   
            }
        }

        // openpay | tiendas 
        $('#opt-panel-tiendas').click( function() {
            $('.opt-panel').removeClass('active');  
            $('#opt-panel-tiendas').addClass('active');  
            $('.pay-spei').slideUp(); 
            $('.pay-info').slideUp(); 
            $('.pay-mercadopago').slideUp();
            $('.pay-tienda').slideDown(); 
            $('.pay-sucursal').slideUp();  
            pay_method = 'tiendas'; 
        }); 

        // openpay | tarjeta 
        $('#opt-panel-tarjeta').click( function() { 
            $('.opt-panel').removeClass('active'); 
            $('#opt-panel-tarjeta').addClass('active');  
            $('.pay-spei').slideUp(); 
            $('.pay-tienda').slideUp();
            $('.pay-mercadopago').slideUp();
            $('.pay-tienda').slideUp(); 
            $('.pay-info').slideDown(); 
            $('.pay-sucursal').slideUp();  
            pay_method = 'tarjeta'; 
        }); 

        // openpay | spei 
        $('#opt-panel-spei').click( function() {
            $('.opt-panel').removeClass('active');  
            $('#opt-panel-spei').addClass('active');  
            $('.pay-spei').slideDown();
            $('.pay-tienda').slideUp(); 
            $('.pay-info').slideUp(); 
            $('.pay-mercadopago').slideUp();
            $('.pay-sucursal').slideUp();  
            pay_method = 'spei'; 
        }); 
        
        // back 
        $('#atras').click( function() {
            $('.main-step-1').slideDown(); 
            $('.main-step-2').slideUp(); 
        }); 

        // pago 2 pasos Openpay | tarjeta   
        $('.getPersonal').click( function() {
            $('.main-step-1').slideUp(); 
            $('.main-step-2').slideDown(); 
        });    

        $('.pay-info input').keypress(  
                function(event) {  
                    inp = $(event.target).attr("id");  
                    if( inp.trim().toString() == "data-tarjeta-numero" ) {
                        val = $(event.which)[0]; 
                        len = $(event.target).val();    
                        if( val < 48 || val > 57 || len.length > 15 ) 
                            event.preventDefault(); 
                    } 

                    if( inp.trim().toString() == "data-tarjeta-cvv" ) {
                        val = $(event.which)[0]; 
                        len = $(event.target).val();    
                        if( val < 48 || val > 57 || len.length > 3 ) 
                            event.preventDefault(); 
                    } 

                    if( inp.trim().toString() == "data-tarjeta-mes" ) {
                        val = $(event.which)[0]; 
                        len = $(event.target).val();    
                        if( val < 48 || val > 57 || len.length > 1 ) 
                            event.preventDefault();  
                    } 

                    if( inp.trim().toString() == "data-tarjeta-anio" ) {
                        val = $(event.which)[0]; 
                        len = $(event.target).val();    
                        if( val < 48 || val > 57 || len.length > 1 ) 
                            event.preventDefault(); 
                    } 
        });   
 
        // validar por tecla   
        $('#form-openpay input').keyup( function( event )  { 
            let formToVal = $('#form-openpay'); 
            console.log( formToVal[0].checkValidity() );  
                if ( !formToVal[0].checkValidity() ) {
                        /* valid_cliente = false;  
                        formToVal[0].reportValidity();  
                        $('.btn-check-pago').removeClass('check-valid');  */ 
                }   
                     else {
                        $('.btn-check-pago').addClass('check-valid');  
                }
        }); 

        var deviceSessionId = null;          
        var dreferencia = null; 
        // por defecto  
        window.onload = function() { 

            $('#opt-panel-tarjeta').click();  

            $('#setCargo').click( function() {

                var tarjetaTitular  = $('#data-tarjeta-nombre').val(); 
                var tarjetaNumero   = $('#data-tarjeta-numero').val().trim(); 
                var tarjetaMes      = $('#data-tarjeta-mes').val(); 
                var tarjetaAnio     = $('#data-tarjeta-anio').val(); 
                var tarjetaCvv      = $('#data-tarjeta-cvv').val(); 
                    
                //one step /**/
                var nombre    = $('#data-cliente-nombre').val(); 
                var apellidos = $('#data-cliente-apellidos').val(); 
                var telefono  = $('#data-cliente-telefono').val();  
                var correo    = $('#data-cliente-correo').val(); 
                var estado    = $('#data-cliente-estado').val();  
                var ciudad    = $('#data-cliente-ciudad').val(); 
                var cp        = $('#data-cliente-cp').val();  
                var direccion = $('#data-cliente-direccion').val();

                nombre    = $('#form-name-client').val(); 
                apellidos = $('#form-lastaname1-client').val() +" "+ $('#form-lastaname2-client').val(); 
                telefono  = $('#telefono-u').val();  
                correo    = $('#form-mail-client').val(); 
                estado    = $('#form-state-send').val();  
                ciudad    = $('#form-city-send').val(); 
                cp        = $('#form-cp-send').val();  
                direccion = $('#form-direction-send').val()+ " " +$('#form-number-send').val(); 
                
                dreferencia = $('#refrencia-adicional').val();  

                let formToVal = $('#form-openpay');   

                 
                if( pay_method == 'tarjeta') {
                    if ( !formToVal[0].checkValidity() ) {
                        valid_cliente = false;  
                        formToVal[0].reportValidity();  
                        $('.btn-check-pago').removeClass('check-valid'); 
                        return;  
                    } else {  
                        $('.btn-check-pago').addClass('check-valid');  
                        $('#overlay').fadeIn(); 
                    } 
                }
 
                $('.btn-check-pago').removeAttr("disabled");

                if( pay_method == 'spei' || pay_method == 'tiendas') {
                        $('#overlay').fadeIn(); 
                        $('#setCargo').prepend('<i class="fa fa-spinner fa-spin"></i> '); 
                        $.ajax({ 
                            'url' : '{{asset('cargo')}}', 
                            'method' : 'post', 
                            'data' : {
                                      'nombre'      : nombre, 
                                      'apellidos'   : apellidos, 
                                      'telefono'    : telefono, 
                                      'correo'      : correo, 
                                      'estado'      : estado, 
                                      'ciudad'      : ciudad,  
                                      'cp'          : cp, 
                                      'cireccion'   : direccion, 
                                      'device'      : deviceSessionId,  
                                      'mathod'      : pay_method, 
                                      'dreferencia' : dreferencia,  
                                      'id_unidad'   : '010101', 
                                      'path'        : '010101010'  
                                  },  
                            'success' : function( resp ) {  
                                console.log( resp );  
                                 $('#setCargo').html('Pagar'); 
                                //resp = JSON.parse( resp );   
                                //console.log( resp );  
                                //referencia = resp.payment_method.reference; 
                                //alert( resp.payment_method.reference );  
                                 //url = "https://sandbox-dashboard.openpay.mx/paynet-pdf/mkcuj3uqoeeccp4qhaoi/"+referencia; 
                                 window.location.href = '{{asset('success')}}/'+resp.trim(); 
                                //window.open(url); 
                            }     
                         });   
                } else if( pay_method == 'tarjeta') {   
                    //prueba mkcuj3uqoeeccp4qhaoi
                    //produccion mbs3pxfh8gqtec2i5qjy  
                    OpenPay.setId('mbs3pxfh8gqtec2i5qjy');   
                    //prueba pk_65236ee443284b9c9fa1f98c438a6fc1
                    //produccion pk_b6f27ae9eff849539dcb69dd10387a9a
                    OpenPay.setApiKey('pk_b6f27ae9eff849539dcb69dd10387a9a'); 
                    //OpenPay.setSandboxMode(true);           
                       
                    deviceSessionId = OpenPay.deviceData.setup(); 
                    
                    var resp = OpenPay.token.create({
                                  "card_number": tarjetaNumero,
                                  "holder_name": tarjetaTitular, 
                                  "expiration_year": tarjetaAnio, 
                                  "expiration_month": tarjetaMes,  
                                  "cvv2": tarjetaCvv,
                                  "address":{
                                     "city": ciudad,
                                     "line3": ciudad,  
                                     "postal_code": cp,  
                                     "line1": direccion, 
                                     "line2": direccion,
                                     "state": estado,
                                     "country_code":"MX"
                                    }
                                }, SuccessCallback, ErrorCallback ); 
                } 

             function SuccessCallback(response) {
                console.log(response); 
                var content = '', results = document.getElementById('resultDetail');
                content += 'Id tarjeta: ' + response.data.id + '<br />';
                content += 'A nombre de: ' + response.data.card.holder_name + '<br />';
                content += 'Marca de tarjeta usada: ' + response.data.card.brand + '<br />';
                document.getElementById('resp').innerHTML = content;
                console.log( OpenPay.card.cardType(tarjetaNumero) ); 
                
                $('#setCargo').prepend('<i class="fa fa-spinner fa-spin"></i> '); 
                $('.btn-check-pago').attr("disabled", "");  

                $.ajax({
                    'url' : '{{asset('cargo')}}',  
                    'method' : 'post',     
                    'data' : {'id'         : response.data.id, 
                              'titular'    : tarjetaTitular, 
                              'expiraAnio' : tarjetaAnio, 
                              'expiraMes'  : tarjetaMes, 
                              'cv'         : tarjetaCvv, 
                              'ciudad'     : ciudad,  
                              'estado'     : estado, 
                              'direccion'  : direccion, 
                              'cp'         : cp, 
                              'apellido'   : tarjetaTitular, 
                              'telefono'   : telefono, 
                              'correo'     : correo, 
                              'device'     : deviceSessionId,  
                              'mathod'     : pay_method, 
                              'nombre'     : nombre, 
                              'apellidos'  : apellidos, 
                              'dreferencia' : dreferencia,
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
                document.getElementById('resp').innerHTML = content;
                }

                // sin pago 
                if( pay_method == 'sucursal' ){ 

                    let option = $('.pay-store-option option:selected').val(); 

                    if( option.length < 2 ) {
                        alert("Selecciona una sucursal a pagar"); 
                        return; 
                    }


                    let method_send = $('#send-options option:selected').val(); 
                    let option_send = $('.select-maps option:selected').val(); 

                    var d_collect = new Date( $('#time-to-collect').val() ); 

                    var format_date = d_collect.getFullYear()+"-"+(d_collect.getMonth() + 1)+"-"+d_collect.getDate()+" "+d_collect.getHours()+":"+d_collect.getMinutes()+":00"; 
                    console.log(format_date); 
                     
                    $.ajax({
                        'url' : "{{asset('/registroCompra')}}", 
                        'method': 'post',  
                        'data' : {
                                      'nombre'      : nombre, 
                                      'apellidos'   : apellidos, 
                                      'telefono'    : $('#telefono-u').val().trim(), 
                                      'correo'      : correo, 
                                      'estado'      : estado, 
                                      'ciudad'      : ciudad,  
                                      'cp'          : cp,    
                                      'cireccion'   : direccion,
                                      'method_send' : method_send, 
                                      'option_send' : option_send, 
                                      'collection_date' : format_date,  
                                      'pay-store-option' : $('.pay-store-option option:selected').val()
                        }, 
                        'success' : function( resp ) {
                            window.location.href = "https://begima.com.mx/success/"+resp; 
                        } 
                    }); 
                }

            }); 

        }
        

        $('.pay-store-option').change( function() {
            let option = $('.pay-store-option option:selected').val(); 
            $('#googlemaps-view').html($('.pay-store-option option:selected').attr('googlemaps')); 
            $('#direction-str').html($('.pay-store-option option:selected').attr('direction')); 
            if(option.length > 0 ) {
                $('#setCargo').addClass('check-valid'); 
            } else {
                $('#setCargo').removeClass('check-valid'); 
            }
         });

        $('.cargo').click( function( ) {
            titular            = $('.nombreTitular').val();  
            apellidoTitular    = $('.apellidoTitular').val();  
            tarjeta            = $('.numeroTarjeta').val(); 
            expiraMes          = $('.expiraMes').val(); 
            expiraAnio         = $('.expiraAnio').val(); 
            cv                 = $('.cv').val(); 
            telefono           = $('.telefono').val(); 
            correo             = $('.correo').val(); 

            estado      = $('.estado').val(); 
            ciudad      = $('.ciudad').val(); 
            cp          = $('.cp').val(); 
            direccion   = $('.direccion').val(); 
            console.log( resp );  
        }); 


</script>

 