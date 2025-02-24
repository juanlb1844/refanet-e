@extends('layout') 

@section('page')

	<style type="text/css">
		.nav-menu-header { display: block!important; }
		.success-text {
			font-size: 17px;
			display: block;
		}
		.success-text-order {
			font-size: 25px; 
			display: block; 
			font-weight: 900; 
			color: black; 
		}
		.tracking-here {
			padding: 25px; 
		}
		.tracking-btn {
			background-color: #337ab7; 
			color: white; 
			font-size: 20px;
			padding: 4px 10px; 
			border-radius: 10px; 
			display: inline-block; 
			font-weight: 600; 
		}
		.success-icon {
			width: 70px; 
		}
		hr { border: .5px solid gray; }
		.container-success {
    		padding: 120px 0px!important;
    	}
	</style>
	 	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-success">
			 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mje-succes-container">
				<div class="mje-content-success" style="background-color: #f5f5f5; display: inline-block; padding: 20px;">
					<div class="content-texts">
						<img class="success-icon" src="{{asset('media/success/garrapata.svg')}}">
						<h1 class="header-success">¡Tu pedido ha sido procesado!</h1>
						@if( !$file ) 
							@if( $method == 'SUCURSAL')
								<h2 style="font-weight: 900; color: #4ad295;">HAS SELECCIONADO PAGAR EN SUCURSAL</h2>
								<h2>Ház click <a href="https://begima.com.mx/donde-estamos" target="_blank">aquí</a> para ver dónde lo puedes recoger con el siguiente número de orden</h2> 
							@elseif( $method == 'MP')
								<h2 style="font-weight: 900; color: #4ad295;">Tu pago por MercadoPago se ha registrado como {{$pay_status}}</h2>
							@elseif( $method == 'PAYNET')
								<h4>Has seleccionado pago por tienda, descarga <a href="https://dashboard.openpay.mx/paynet-pdf/mbs3pxfh8gqtec2i5qjy/{{$body['folioop']}}">aquí </a> tus instrucciones para el pago </h4>
							@else  
								<h2 style="font-weight: 900; color: #4ad295;">Tu pago se ha acreditado</h2>
							@endif
						@else 
							<h2 class="success-waint">Esperamos tu pago</h2>
						@endif 
						<span class="success-text">Te hemos enviado un correo de confirmación a {{$correo}}</span> 
						<span class="success-text-order">ORDEN: <span id="id-folio">{{$folio}}</span></span>  
						<button class="btn btn-primary question-success">REGÍSTRATE!</button>
						<p></p>
						   
						@include('surveys.questions'); 
  
					</div>
					<!-- <div class="tracking-here"> 
						<span>Sigue el estado de tu pedido <a href="" class="tracking-btn">AQUÍ</a></span>
					</div> -->
					@if( $file )
						<div>
							<h3 class="success-download">Descarga el siguiente documento para realizar el pago</h3>
							<h3 class="success-download2">También lo puedes encontrar en tu correo {{$correo}}</h3>
							<iframe style="width: 100%; height: 800px;" src="{{$url}}"></iframe>						
						</div>
					@endif 

					<div style="padding: 40px; border: 1px solid gray; display: inline-block; border-radius: 7px; margin-top: 40px; display: none;">
						@php $total = 0; @endphp    
			@if( \Session::get('productos') )
				@foreach( \Session::get('productos') as $k => $pr ) 
					@php $total+= $pr['price']*$pr['cant']; @endphp 
					<div class="col-lg-12">
						<div class="col-lg-4" style="padding: 0px;">
				                <img style="width: 100%;" class="img-car owl-lazy" src="{{$pr['img']}}" src="" alt="Producto">
						</div>
						<div class="col-lg-8" style="padding: 0px; font-size: 15px; text-align: right;">
							<p>{{$pr['name']}}</p>
					        <p>Cantidad: {{$pr['cant']}}</p>
					        <p style="font-weight: bold;">$ @php echo number_format($pr['price'], 2) @endphp MNX</p>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
						<hr> 
					</div>
				@endforeach
					<div class="col-lg-12" style="display: none;">
						<div class="col-lg-4" style="padding: 0px;">
							   
						</div>
						<div class="col-lg-8" style="padding: 0px; font-size: 15px; text-align: right;">
							<p>Costo de envío</p>
					        <p></p>
					        @if( isset($subtotal ) )
					        <p style="font-weight: bold;">>${{number_format($subtotal, 2)}} MNX</p>
					        @endif 
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
						<hr> 
					</div>
			@endif 
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;"> 
				<span style="font-size: 20px; font-weight: 700; color: #333333;">  
					TOTAL: <span style=" color: #c4262e;" >${{number_format($total+150, 2)}}</span>
				</span> 
			</div>
				</div>
			</div>

		</div>

 <script type="text/javascript">
 	 
 	   $('.question-success').click( function(){
 	   		$('#session').modal('toggle'); 
      		$('.body-login').slideUp(10); 
      		$('.body-register').slideDown(); 
    	});
 	   $('.sabe-opinion').click( function() {
 	   		let folio = $('#id-folio').html(); 
 	   		let opinion = $('#opinion-text').val();  
 	   		$.ajax({
 	   			'url' : '{{asset("opinion")}}', 
 	   			'method' : 'post', 
 	   			'data' : {
 	   				'folio' : folio,  
 	   				'opinion' : opinion
 	   			}, 
 	   			'success' : function( resp ) {
 	   				console.log( resp ); 
 	   			}
 	   		}); 
 	   }); 
 	 
 </script>
 
 @endsection  