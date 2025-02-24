@extends('layout') 

@section('page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.theme.default.css">
 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> 
 
<div class="products-section col-lg-12 col-md-12 col-sm-12 container-checkout-t1 section-element">
<div class="products-section col-lg-12 col-md-12 col-sm-12">  
	<div class="container-header-cart"> 
		<h2 style="font-weight: 900; padding-left: 10px;">¡Sólo unos pasos! </h2>
	</div>
</div>
<style type="text/css">
	.nav-menu-header { display: block!important; }  
	input { box-shadow: none!important; }
	.checkout-step {
		display: none; 
	}
	.step-datos-cliente {
		display: inline-block;
	} 
	.container-buttons { padding: 20px 0px; }
	.nomar { margin: 0px; }
	.nppad { padding: 0px; } 
	.btn-checkout {
		background-color: #c1c3cd!important; 
		border: 1px solid #c1c3cd; 
		font-weight: 600;
	}
	.check-valid { 
		background-color: #1dc59d!important;
		transition-property: all; 
		transition-duration: .2s;  
	}
	/* mjes de validación */ 
	.mje-validation {
		background-color: #f0ad4e; 
		display: inline-block; margin-right: 20px; padding: 2px 7px; border-radius: 2px; color: white;
	}
	.mje-validation::after {
	    content: " ";
	    position: absolute;
	    top: 27%;
	    left: 74%;
	    margin-left: -5px;
	    border-width: 7px;
	    transform: rotate(-90deg);
	    border-style: solid;  
	    border-color: #f0ad4e transparent transparent transparent;
	} 
	.to-right { 
		text-align: right;
	}
	input:active, input:focus  {
 		border: 2px solid #a72d82!important;
 		box-shadow: none!important;  
 	}
 	.steps-to-order {
 		background-color: #f5f5f5; 
 		font-size: 17px;
 		padding: 20px 0px;
 		border-top-left-radius: 4px; 
 		border-top-right-radius: 4px; 
 		border: 1px solid #f0efec;
 		border-bottom: 0px;
 	}
 	.number-step { 
 		display: inline-block;
 		width: 30px; 
 		height: 30px; 
 		border-radius: 50%; 
 		text-align: center;
 		padding-top: 2px; 
 		border: 1px solid #bdc3c5; 
 	}
 	.content-step {
 		text-align: center;
 		color: #bdc3c5!important;
 	}
 	.name-step { 
 		font-weight: 600;
 		color: #bdc3c5;
 	}
 	.current-step .number-step {
 		background-color: #0075ff;
 		border: 1px solid #0075ff;
 		color: white;
 	}
 	.current-step .name-step { color: #828282; }  
 	.passed-step .number-step{
 		background-image: url('{{asset('media/success/check.svg')}}'); 
 		background-size: 60%;
 		background-repeat: no-repeat;
 		background-position: center; 
 	} 	

 	.row-header {
    	position: fixed;
    	top: 0px;
	}

	@media (max-width: 600px) {  
		.content-logo- {
			padding-top: 0px!important; 
		}
		.navbar { margin-bottom: 0px!important; }
	}
</style>

	@if( \Session::get('productos') )
	  
	@else 
	  <script>window.location = "/index";</script>
	@endif

	<div class="products-section col-lg-9 col-md-12 col-sm-12"> 
		<div class="header-chekout"> 
			<div class="steps-to-order col-lg-12 col-sm-12 col-xs-12"> 
				<div class="content-step to-order-cliente col-lg-4 col-xs-4 current-step">
					<span class="number-step">1</span> 
					<span class="name-step"> Cliente</span>
				</div> 
				<div class="content-step to-order-envio col-lg-4 col-xs-4">
					<span class="number-step">2</span> 
					<span class="name-step"> Envío</span>
				</div>
				<div class="content-step to-order-pago col-lg-4 col-xs-4">
					<span class="number-step">3</span> 
					<span class="name-step"> Pago</span>
				</div>
			</div> 
		</div>

		@php 
			date_default_timezone_set('America/Mexico_City'); 
			if( date('H') >= 10 ) {
				//echo "X"; 
			}
			$fecha_actual = date("d-m-Y");    
			$min_recoger = date("Y-m-d", strtotime( $fecha_actual."+ 1 days")); 

		@endphp 

		<div  class="products-section col-lg-12 col-md-12 col-sm-12" style="border: 1px solid #efeeeb; border-radius: 3px; padding: 10px; ">
			 
			<div class="section-container checkout-step step-datos-cliente col-lg-12"style="padding: 20px 20px;"> 
			   {{-- @include('page.checkout.blocks.question', ['next' => 'onclick=next(\'question\')', 'back' => 'onclick=next(\'nada\')']) --}}
			 	@include('page.checkout.blocks.inicio', ['next' => 'onclick=next(\'question\')',
													   'back' => 'onclick=next(\'nada\')'])    
 
			</div>	
    
			<div class="section-container checkout-step step-datos-question" style="padding: 20px 20px;">
				@include('page.checkout.blocks.question', ['next' => 'onclick=next(\'envio\')',  
														   'back' => 'onclick=next(\'cliente\')'])      
			</div>	 

			<div class="section-container checkout-step step-datos-envio" style="padding: 20px 20px;">
				@include('page.checkout.blocks.envio', ['next' => 'onclick=next(\'pago\')',
														'back' => 'onclick=next(\'question\')'])   
			</div>	 

			<div class="section-container checkout-step step-datos-pago" style="padding: 20px 20px;">
				@include('page.checkout.blocks.pago', ['next' => 'onclick=makeOrder(\'pago\')',
													   'back' => 'onclick=next(\'envio\')'])   
			</div>	

		</div> 
	</div>

	<script type="text/javascript">
		var valid_cliente = null; 
 		var valid_envio   = null; 
 		var valid_pago    = null; 

 		// validación datos cliente 
		$('.step-datos-cliente input').keyup( function() {
			
			let formToVal = $('.step-datos-cliente form')

			valid_cliente = true; 

			if ( !formToVal[0].checkValidity() ) {
				valid_cliente = false; 	
			} 
			/* 
			$('.step-datos-cliente input').each( function(i, e) {
				console.log($(e).val().length); 
				if( $(e).val().length == 0 ) {
					valid_cliente = false; 
				} 
			}); */   

			if( valid_cliente ) {  
				$('.btn-check-inicio').addClass('check-valid'); 
				$('.btn-check-question').addClass('check-valid'); 
			} else {
				$('.btn-check-inicio').removeClass('check-valid'); 
			}
		}); 
  
		$('#form-cp-send').keyup( function() { 
						   console.log($('#form-cp-send').val().length); 
                           if( $('#form-cp-send').val().length == 5 ) { 
                           		$("#overlay").fadeIn(300); 
                                $.ajax({
									'url'     : "{{asset('skydropx')}}", 
									'method'  : 'POST',
									'data'    : {'cp' : $('#form-cp-send').val() }, 
									'success' : function( resp ) {
										$('#send-options [type="skydropx"]').remove(); 
										$('#overlay').fadeOut(); 
										resp = JSON.parse(resp); 
										resp.forEach( function(a, b ) { 
											$("#send-options").append("<option type='skydropx' price="+a.total_pricing+" provider="+a.provider+" dias="+a.days+" value='Paquetería "+a.total_pricing+"'>"+a.provider+" $"+a.total_pricing+" DÍAS: "+a.days+"</option>"); 
										}); 
										$("#overlay").fadeOut(300); 
									}
								}); 
                           }
                        } 
                    ); 


		// validación datos cuestion 
		$('.step-datos-envio input').keyup( function() {

			valid_envio = true; 
			$('.step-datos-envio input[type="text"]').each( function(i, e) {
				if( $(e).attr('required') && $(e).val().length == 0 ) {
					valid_envio = false; 
				} 
			});    
 
			if( valid_envio ) {   
				$('.btn-check-envio').addClass('check-valid'); 
			} else {
				$('.btn-check-envio').removeClass('check-valid'); 
			}
		});  

		// validación datos pago  
		$('.step-datos-pago input').keyup( function() {
			valid_pago = true; 
			$('.step-datos-pago input[type="text"]').each( function(i, e) {
				if( $(e).val().length == 0 ) {
					valid_pago = false; 
				} 
			});     
			if( valid_pago ) {     
				$('.btn-check-pago').addClass('check-valid'); 
			} else { 
				$('.btn-check-pago').removeClass('check-valid'); 
			}  
		});  

		// mostrar o no los datos para la factura 
		$('input[name="misma-factura"]').click( function( val ) {
			console.log( $(this).is(":checked") ); 
			if( $(this).is(":checked") ) {
				$('.section-factura').slideUp();  
			} else { 
				$('.section-factura').slideDown();   
			}
		}); 

		// functions.. 

		function makeOrder() {
			if( $(event.target).hasClass('check-valid') ) {
				window.location.href = "{{asset('success')}}"; 
			} else {
				$('.mje-validation').css('display', 'inline-block'); 
			}
		}
 		
 		let formToVal = null; 

		function next( param ) { 
			let formulario = $(event.target).attr("form") 

 			if(  $(event.target).attr("form")  == "question") { 
 				if( $('input[type="radio"]:checked').val() == "si") {
 					$('.section-factura').slideDown(); 
 				} else {
 					$('.section-factura').slideUp(); 
 				}
 			}
 
			if( $(event.target).attr("form") === 'checkout-client-data' 
				|| $(event.target).attr("form") === "checkout-form-send") {
				let formName = $(event.target).attr("form"); 
				formToVal = $('#'+formName); 
				$(formToVal).find('input').each( function( i, item ) { 
					item.oninvalid = function(e) {
			            e.target.setCustomValidity("");
			            if (!e.target.validity.valid) {
			                e.target.setCustomValidity( $(item).attr("title") );
			            }
			        };   
				});       
	 			   
				if( !formToVal[0].checkValidity() ) {
					formToVal[0].reportValidity();  
					$('.btn-check-inicio').removeClass('check-valid');  
				} else {
						$('.btn-check-inicio').addClass('check-valid'); 
						$('.btn-check-question').addClass('check-valid'); 
				}
			}


			if( formulario == 'checkout-form-send') {
					if( $('#send-options').val() == '') {
							alert('Selecciona una forma de envío o recolección'); 
							return; 
					}
			}

			switch(param) {
				default :  
					if( $(event.target).hasClass('check-valid') ) {
						switsh(param);  
						$('.mje-validation').css('display', 'none'); 
						if(param == 'envio') {
							$('.content-step').removeClass('current-step'); 
							$('.to-order-envio').addClass('current-step'); 
						} else if( param == 'pago' ) {
							$('.content-step').removeClass('current-step'); 
							$('.to-order-pago').addClass('current-step'); 
							//$('#opt-panel-mercadopago').click(); 
						} else if( param == 'cliente' ) {
							$('.content-step').removeClass('current-step'); 
							$('.to-order-cliente').addClass('current-step'); 
						}
					} else {
						$('.mje-validation').css('display', 'inline-block'); 
					} 
			}
		} 

		function switsh(block) {
			$('.checkout-step').css('display', 'none'); 
			$('.step-datos-'+block).css('display', 'block'); 
		}
	  
</script>

	<!-- SIDE RIGHT --> 
	<div class="products-section col-lg-3 col-md-12 col-sm-12" style="margin-bottom: 40px;"> 
		<div class="container-prods col-lg-12" style="border: 1px solid #efeeeb; border-radius: 3px; padding: 10px; ">
			<h3 style="margin: 5px 0px; font-weight: 700; ">Estás pagando</h3>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
				<hr> 
			</div>

			@if( \Session::get('productos') )
				@foreach( \Session::get('productos') as $k => $pr ) 
					<div class="col-lg-12">
						<div class="col-lg-4 col-xs-4" style="padding: 0px;">
				                <img style="width: 100%;" class="img-car owl-lazy" src="{{$pr['img']}}" src="" alt="Producto">
						</div>
						<div class="col-lg-8 col-xs-8" style="padding: 0px; font-size: 15px; text-align: right;">
							<p>{{$pr['name']}}</p>
					        <p>Cantidad: {{$pr['cant']}}</p>
					        <p>Talla: {{$pr['talla']}}</p>
					        @if( $pr['promo'] > 0 )
					        	<p style="font-weight: bold; text-decoration: line-through;">$ @php echo number_format($pr['price'], 2) @endphp MNX</p>
					        	<p style="font-weight: bold;">$ @php echo number_format($pr['promo'], 2) @endphp MNX</p>
					        @else 
					        	<p style="font-weight: bold;">$ @php echo number_format($pr['price'], 2) @endphp MNX</p>
					        @endif
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
						<hr> 
					</div>
				@endforeach
					<div class="col-lg-12">
						<div class="col-lg-4 col-xs-4" style="padding: 0px;">
							   
						</div>
						<div class="col-lg-8 col-xs-8" style="padding: 0px; font-size: 15px; text-align: right;">
							<p>Costo de envío</p>
					        <p id="method_send" style="display: none;"></p> 
					        <p></p>
					        <p id="price_send" style="font-weight: bold;"> $@php echo number_format($sendPrice, 2) @endphp MNX</p>
						</div>  
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
						<hr> 
					</div>
			@endif  
  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;"> 
  				<div class="col-lg-12 col-xs-12">
  					<div class="msg-coupon">
  						@if( $descuento ) 
  							{!! $msgeDescuento !!}
  						@endif 
  					</div>
  				</div>
				<div class="col-lg-9 col-xs-9">
					<input class="form-control" value="{{$cgo}}" id="coupon" placeholder="código de descuento" type="" name="">
				</div>
				<div class="col-lg-3 col-xs-3" style="padding: 0px 10px;">
					<button class="btn btn-primary" id="applyCoupon">Usar</button>
				</div>
			</div>
  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
				<hr>  
			</div>
  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
				<span style="font-size: 15px; font-weight: 500; color: #333333;">  
					Subtotal: <span id="cart_subtotal" style=" color: #c4262e;" >${{number_format($subtotal, 2)}} MNX</span> 
				</span> 
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
				<hr> 
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tot-ant"> 
				<span style="font-size: 17px; font-weight: 900; color: #333333;">  
					TOTAL: <span id="cart_total" style=" color: #c4262e;" >${{ number_format(($total), 2)  }} MNX </span>
				</span> 
			</div>

			@if( $descuento )
			<style type="text/css">
				.tot-ant { display: none!important; }
			</style>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<span style="font-size: 17px; font-weight: 900; color: #333333;">  
						TOTAL: <span style=" color: #c4262e;" >${{ number_format(($totalDescuento), 2)  }} MNX </span>
					</span> 
				</div>
			@endif 
 
		</div>
	</div>
  
</div>


<script type="text/javascript">
 

		  $('.menu-options').hover( function() {
	        $('.section-element').css('filter', 'blur(5px)'); 
	        $('.courtain-back').css('display', 'block'); 
	      });   

	     $('.line-menu-main').hover( function() {
	        $('.section-element').css('filter', 'blur(0px)'); 
	        $('.courtain-back').css('display', 'none'); 
	        $('.dropdown').removeClass('open');  
	   });  

	     $('.courtain-back').hover( function() {
	        $('.courtain-back').css('display', 'none'); 
	        $('.section-element').css('filter', 'blur(0px)'); 
	        $('.dropdown').removeClass('open'); 
	   });  

		$('#applyCoupon').click( function() { 
			let coupon = $('#coupon').val(); 
			if( coupon.length < 1 ) {
				alert("Escribe el código de tu cupón");   
			} else {
				$('#overlay').fadeIn(300);  
				$.ajax({
					'url' : '{{asset("checkCoupon")}}/'+coupon, 
					'method' : 'get', 
					'success' : function( resp ) {
						resp = JSON.parse( resp ); 
						console.log( resp );
						$('#overlay').fadeOut(300); 
						$('.msg-coupon').html("<span>"+resp.mge+"</span>"); 
						if( resp.type == 'success') {
							window.location.reload(); 
						}
					}
				});  
			}
		}); 
	 
</script>
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
 
 
 @endsection