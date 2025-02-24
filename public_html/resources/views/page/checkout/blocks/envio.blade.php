<style type="text/css">
	#send-options option {
		padding: 10px 0px;
	}
</style>

<div class="section-content">
	<div class="section-header">
		<div class="col-lg-12 nppad">
			<div class="col-lg-4 nppad"> 
				<h2 class="nomar">Datos de envío</h2>		
			</div>
			<div class="col-lg-8 nppad">
				<label class="section-factura">
					<input type="checkbox" name="misma-factura" checked style="height: 25px; width: 25px;">
					<span style="font-size: 22px;">*Facturar a la misma dirección</span>
				</label>
			</div> 
		</div>
	</div> 
<form id="checkout-form-send">
	<div class="section-container">
		<div class="row"> 
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Estado</span>  
				<select class="form-control" id="form-state-send">
					<option value="jalisco">Jalisco</option>
					<option value="estado de mexico">Estado de Mexico</option>
					<option value="nuevo leon">Nuevo León</option>
					<option value="guerrero">Guerrero</option>
					<option value="michoacán">Michoacan</option>
					<option value="yucatán">Yucatán</option>
					<option value="baja california">Baja California</option>
					<option value="tabasco">Tabasco</option>
					<option value="chiapas">Chiapas</option>
					<option value="sonora">Sonora</option>
					<option value="zacatecas">Zacatecas</option>
					<option value="tamaulipas">Tamaulipas</option>
					<option value="nayarit">Nayarit</option>
					<option value="estado de hidalgo">Estado de Hidalgo</option>
					<option value="ciudad de méxico">Ciudad de México</option>
					<option value="quintana roo">Quintana Roo</option>
					<option value="tlaxcala">Tlaxcala</option>
					<option value="coahuila">Coahuila</option> 
					<option value="morelos">Morelos</option>
					<option value="guanajuato">Guanajuato</option>
					<option value="sinaloa">Sinaloa</option>
					<option value="baja california sur">Baja California Sur</option>
					<option value="veracruz">Veracruz</option>
					<option value="san luis potosí">San Luis Potosí</option>
					<option value="puebla">Puebla</option>
					<option value="querétaro">Querétaro</option>
					<option value="oaxaca">Oaxaca</option> 
					<option value="chihuahua">Chihuahua</option>
					<option value="aguascalientes">Aguascalientes</option>
					<option value="durango">Durango</option>
					<option value="colima">Colima</option>
					<option value="campeche">Campeche</option>
				</select>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
				<span>Ciudad / Municipio</span> 
				<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]{2,70}" title="Introduce una ciudad válida" type="text" name="ciudad-envio" class="form-control" required id="form-city-send">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
				<span>CP</span> 
				<input class="form-control" title="Tiene que contener 5 números" pattern="[0-9]{5}" placeholder="123456" type="text" name="" required id="form-cp-send">    
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 col-md-8 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Dirección</span>
				<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]{2,50}" title="Introduce una dirección válida" class="form-control" placeholder="Av. San Pedro 2018 esq. con San R." type="text" name="" required id="form-direction-send"> 
			</div> 
			<div class="col-lg-4 col-md-8 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Referencia adicional (opcional)</span>
				<input title="campo opcional" class="form-control" placeholder="Casa blanca con portón negro" type="text" name="referencia" id="refrencia-adicional"> 
			</div>   
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Número</span>  
				<input pattern="[A-Za-z0-9\s]{2,40}" title="Introduce un número interior válido" class="form-control" placeholder="#201 A" type="text" name="" required id="form-number-send">
			</div>
		</div>
	</div> 

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> 
				<h4>Seleccione el método de envío</h4>
				<select class="form-control" id="send-options">
					<option type="" value="">Selecciona el método de envío</option>
					<option type="recoger-en-tienda" provider="recoger en tienda" price="0" dias="0" value="recoger en tienda">Recoger en tienda</option> 
				</select>
			</div>  
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 opt-collect" style="padding: 10px; display: none;">
				<p>Selecciona la tienda <a style="padding-top: 7px; font-size: 10px; display: inline-block;" href="#" data-toggle="modal" data-target="#direction-modal">Ver en el mapa</a>  </p>  
				 <select class="form-control select-maps">
					@foreach( $sucursales as $sucursal )
						<option direction="{{$sucursal->direction}}" googlemaps="{{$sucursal->googlemaps}}" value="{{$sucursal->name}}">{{$sucursal->name}}</option>
					@endforeach  
				</select>
			</div> 
			@php 
				date_default_timezone_set('America/Mexico_City');
				$fecha_actual = date("d-m-Y");      
				
				if( date('H') >= 12 ) {
					$min_recoger  = date("Y-m-d", strtotime( $fecha_actual."+ 1 days"));  
					$minutes_rec = "T10:30"; 
				} else { 
					$min_recoger  = date("Y-m-d", strtotime( $fecha_actual."+ 0 days")); 
					$minutes_rec = "T13:30";  
				}	
				
				//echo $min_recoger; 
				//echo "<br>"; 
				//print_r( date_format( date_create() , 'Y-m-d G:i') ); 
				//echo "<br>"; 
				//print_r( date_format( date_create() , 'G:i') ); 
			@endphp 

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 opt-collect" style="padding: 10px; display: none;">
				<p>¿Cuándo piensas recoger?</p>
				<input class="form-control" id="time-to-collect" type="datetime-local" value="{{$min_recoger}}{{$minutes_rec}}" min="{{$min_recoger}}{{$minutes_rec}}" max="2022-02-01T23:00" name="">  
				<p>Lunes a viernes de 10:30am a 6:00pm y Sábados de 10:30am a 3:00pm</p>
			</div> 
		</div>

</form>
</div>
<div class="section-content section-factura" style="display: none">
	<div class="section-header">
		<h2>Datos de factura</h2>  
	</div>
	<div class="section-container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Estado</span> 
				<select class="form-control">
					<option>Jalisco</option>
				</select>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Ciudad / Municipio</span> 
				<select class="form-control">
					<option>Guadalajara</option>
					<option>Zapopan</option>
				</select>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>CP</span> 
				<input class="form-control" placeholder="45138" type="number" name="">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Dirección</span>
				<input class="form-control" placeholder="Av. San Pedro 2018 esq. con San R." type="" name="">
			</div> 
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				<span>Número</span>
				<input class="form-control" placeholder="#201 A" type="" name="">
			</div>
		</div>
	</div>
</div> 
 
<div class="section-container"> 
	<div class="section-header" style="padding-right: 0px;">
		<div class="col-lg-12 container-buttons">
			<div class="col-lg-6 col-xs-6 nppad" style="text-align: left;"> 
				<button form="envio" class="btn btn-primary btn-checkout check-valid" {{$back}}>Atrás</button>
			</div>
			<div class="col-lg-6 col-xs-6 nppad to-right">
				<span class="mje-validation" style="display: none;">Ups, algo está mal </span>
				<button type="button" form="checkout-form-send" class="btn btn-primary btn-checkout btn-check-envio" {{$next}}>Continuar</button>
			</div>
		</div>
	</div>  
</div>

 

<script type="text/javascript">
	$('#time-to-collect').on('change', function( e ){ 
        var hour = new Date( $('#time-to-collect').val() ).getHours();
        var minutes = new Date( $('#time-to-collect').val() ).getMinutes();
        var day = new Date( $('#time-to-collect').val() ).getDay(); 
        if( day == 0 ) {
        	alert("Selecciona un día de Lunes a Sábado"); 
        	$('#time-to-collect').val("{{$min_recoger}}{{$minutes_rec}}");   
        	return; 
        } 
        if( hour <= 10 ) {
        	if( hour == 10 && minutes < 30 ) {
        		alert("Tienes que escoger un horario entre 10:30am y 06:00"); 
        		$('#time-to-collect').val("{{$min_recoger}}{{$minutes_rec}}");  
        	} else if( hour < 10 ) { 
        		alert("Tienes que escoger un horario entre 10:30am y 03:00pm"); 
        		$('#time-to-collect').val("{{$min_recoger}}{{$minutes_rec}}");  
        	} 
        	return; 
        } else if( hour > 18 ) {
        	alert("No es posible asignar esa fecha");  
        	$('#time-to-collect').val("{{$min_recoger}}{{$minutes_rec}}");   
        	return; 
        } 
        if( (day == 6 && hour > 15) ||  (day == 6 && hour < 10 ) ) {
        	alert("Los horarios de los días sábados son de 10:30am a 3:00pm"); 
        	$('#time-to-collect').val("{{$min_recoger}}{{$minutes_rec}}");   
        	return; 
        }
        console.log( hour ); 
	}); 
	
	$('#checkout-form-send').ready( function() {
		$('#googlemaps-view').html($('.select-maps option:selected').attr('googlemaps')); 
		$('#direction-str').html($('.select-maps option:selected').attr('direction')); 
	} ); 

	$('.select-maps').change( function() {
		$('#googlemaps-view').html($('.select-maps option:selected').attr('googlemaps')); 
		$('#direction-str').html($('.select-maps option:selected').attr('direction')); 
 
			$.ajax({
				'url' : '{{asset("updateSend")}}',  
				'method': 'post', 
				'data' : { "method" : $('#send-options option:selected').val(), 
						   "price"  : '', 
						   "days"   : $('.select-maps option:selected').val() }, 
				'success' : function( resp ) {
					var resp = JSON.parse(resp); 
					console.log( resp );  
					$('#price_send').html(numberFormat2.format(resp.send.price)); 
					$('#method_send').css('display', 'block'); 
					
					$('#cart_subtotal').html(numberFormat2.format(resp.subtotal)); 
					$('#cart_total').html(numberFormat2.format(resp.total)); 

					if( resp.send.method != 'recoger en tienda' && resp.send.method != null ) {
						$('#method_send').html(resp.send.method + " " + resp.send.option + " días"); 
					} else if( resp.send.method == null ) {
						$('#method_send').html("Selecciona alguno.."); 
						$('#price_send').html('MNX');
					} else {
						$('#method_send').html(resp.send.method); 
					}

					$('#overlay').fadeOut(300); 
				}
			}); 

	});   

	$('#send-options').change( function( ) { 

		const options2 = { style: 'currency', currency: 'MNX' };
		const numberFormat2 = new Intl.NumberFormat('es-MX', options2);

        let op = $('#send-options option:selected').val(); 

        if( op == 'recoger en tienda') {
        	$('.opt-collect').css('display', 'block');

        	$.ajax({
				'url' : '{{asset("updateSend")}}',  
				'method': 'post', 
				'data' : { "method" : $('#send-options option:selected').val(), 
						   "price"  : '', 
						   "days"   : $('.select-maps option:selected').val() }, 
				'success' : function( resp ) {
					var resp = JSON.parse(resp); 
					console.log( resp );  
					$('#price_send').html(numberFormat2.format(resp.send.price)); 
					$('#method_send').css('display', 'block'); 
					
					$('#cart_subtotal').html(numberFormat2.format(resp.subtotal)); 
					$('#cart_total').html(numberFormat2.format(resp.total)); 

					if( resp.send.method != 'recoger en tienda' && resp.send.method != null ) {
						$('#method_send').html(resp.send.method + " " + resp.send.option + " días"); 
					} else if( resp.send.method == null ) {
						$('#method_send').html("Selecciona alguno.."); 
						$('#price_send').html('MNX');
					} else {
						$('#method_send').html(resp.send.method); 
					}

					$('#overlay').fadeOut(300); 
				}
			});

        } else {
        	$('.opt-collect').css('display', 'none'); 
        }

        let selected = $('#send-options option:selected'); 
        type = $(selected).attr('type'); 
        
		method = $(selected).attr('provider'); 
		price  = $(selected).attr('price');  
		dias   = $(selected).attr('dias');  
		$('#overlay').fadeIn(300);  
		$.ajax({
			'url' : '{{asset("updateSend")}}',  
			'method': 'post', 
			'data' : { "method" : method, 
					   "price"  : price, 
					   "days"   : dias }, 
			'success' : function( resp ) {
				var resp = JSON.parse(resp); 
				console.log( resp );  
				$('#price_send').html(numberFormat2.format(resp.send.price)); 
				$('#method_send').css('display', 'block'); 
				
				$('#cart_subtotal').html(numberFormat2.format(resp.subtotal)); 
				$('#cart_total').html(numberFormat2.format(resp.total)); 

				if( resp.send.method != 'recoger en tienda' && resp.send.method != null ) {
					$('#method_send').html(resp.send.method + " " + resp.send.option + " días"); 
				} else if( resp.send.method == null ) {
					$('#method_send').html("Selecciona alguno.."); 
					$('#price_send').html('MNX');
				} else {
					$('#method_send').html(resp.send.method); 
				}

				$('#overlay').fadeOut(300); 
			}
		});  
       
    });
</script>