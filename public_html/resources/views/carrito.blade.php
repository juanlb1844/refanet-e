@extends('layout')

@section('page')
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/carrito/carrito.css')}}">

<div class="container-fluid section-element" style="padding: 0px;">
 <div class="products-section col-lg-12 col-md-12 col-sm-12" style="padding: 0px 0px; padding-top: 60px;">

<div class="col-xs-12 col-xs-12 header-carrito">
	<div class="products-section col-lg-12 col-md-12 col-sm-12 col-xs-3 hidden-lg">
		<span class="shadow-white" onclick="goBack()" style="background-color: white; padding: 3px 3px; padding: 12px; border-radius: 4px; display: inline-block;">
			<img style="width: 25px;" src="{{asset('media/icons/arrow-back.svg')}}">
		</span>
	</div>
	<div class="container-header-cart col-xs-9" style="padding-top: 10px;">
		<span style="font-weight: 900; font-size: 35px;">BOLSA</span>
	</div>
</div>

<div class="col-lg-12 hidden-lg">
	@if( \Session::get('productos') )
      @foreach( \Session::get('productos') as $k => $pr )
      	<div class="col-xs-12 row-product-xs">
			<div class="col-xs-4" style="padding-top: 20px;">
				<img src="{{$pr['img']}}" style="width: 100%;">
			</div>
			<div class="col-xs-6 np-sides" style="padding-top: 10px;">
				<span class="mobil-name-prod">{{$pr['name']}}</spam>
				<span class="mobil-price-prod">${{number_format($pr['price'], 2)}} MNX  </span>
				<div class="col-xs-12 tallas-row np row">
					<div class="col-xs-6 np" style="padding-top: 10px!important;">
						<span class="mobil-talla-prod"><span class="bolder">Talla:</span> {{$pr['talla']}} </span>
					</div>
					<div class="col-xs-6 np">
						 	@if( strlen($pr['textura']) > 2 )
						 		<span class="mobil-talla-prod"><span class="bolder">Color:</span>
						 		<span class="color-picker" style="background-image: url('{{$pr['textura']}}')"></span>
							@elseif( strlen($pr['color']) > 2 )
						 		<span class="mobil-talla-prod"><span class="bolder">Color:</span>
						 		<span class="color-picker" style="background-color: {{$pr['color']}}"></span>
						 	@endif
					</div>
				</div>
				<div class="content-row-controls">
					<span class="control-cantidad span-menos" np="{{$pr['np']}}" id="{{$pr['id']}}">-</span>
					<span pattern="{2,40}"
						  np="{{$pr['np']}}"
						  class="input-cantidad-{{$pr['id']}}"
						  data-max="{{ $pr['max_items'] }}"
						  style="display: inline-block;padding-top: 5px; font-weight: bolder;"
						  type="number"
						  name=""
						  required
					>
						{{$pr['cant']}}xx
					</span>
					<span class="control-cantidad span-mas" np="{{$pr['np']}}" id="{{$pr['id']}}">+</span>
				</div>
			</div>
			<div class="col-xs-2" style="padding-top: 40px;">
				<span onclick="deleteProduct('{{$pr['np']}}')"><img src="{{asset('/media/icons/trash.svg')}}" style="width: 20px;"></span>
			</div>
      	</div>
      @endforeach
      @endif

<div class="col-xs-12" style="text-align: right; border-bottom: 1px solid #c2c2c2;">
      <div class="col-lg-10 col-xs-6">
	      	<div style="text-align: right; padding-top: 10px; font-size: 17px; font-weight: 500;">
	      		<span>SUBTOTAL</span>
	      	</div>
      </div>
      <div class="col-lg-2 col-xs-6">
			<span class="subtotal-cart" style="font-weight: 500; font-size: 17px; text-align: center; padding: 4px 10px; border-radius: 4px; display: inline-block;">
				$@php echo number_format($totalCart, 2) @endphp MX
			</span>
      </div>
	</div>

	<div class="col-xs-12">
		@if( \Session::get('productos') )
	      <div class="col-xs-12">
			<a href="{{asset('checkout-main')}}">
				<h2 class="pagar pull-right">PAGAR</h2>
			</a>
	      </div>
	  @endif
	</div>

</div>


	<div class="products-section col-lg-12 col-md-12 col-sm-12 hidden-xs" style="margin-bottom: 40px;">

		<div  class="products-section col-lg-12 col-md-12 col-sm-12" style="border: 1px solid #efeeeb; border-radius: 3px; padding: 10px; ">

    @if( \Session::get('productos') )
		<table class="table table-striped table-condensed">
		  <thead>
		    <tr>
		      <th scope="col">PRODUCTO</th>
		      <th scope="col">DESCRIPCIÓN</th>
		      <th scope="col">PRECIO</th>
		      <th scope="col">CANTIDAD</th>
		      <th scope="col">TALLA</th>
		      <!-- <th scope="col">ACCIONES</th> -->
		    </tr>
		  </thead>
		  <tbody>
		      @foreach( \Session::get('productos') as $k => $pr )
		        <tr>
		          <td>
		             <img style="width: 100px;" class="img-car owl-lazy" src="{{$pr['img']}}" src="" alt="Producto">
		          </td>
		          <td>{!!$pr['name']!!}</td>

		          <td>
		          	@if( @session()->has('logueado') AND strlen(@session()->get('logueado')) > 2 )
		          		@if ( session()->get('user')->grupo == 1 )
		          			<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		          			<span style="font-weight: 600;"> $ {{number_format($pr['price'], 2, '.', ',') }} MNX </span>
		          		@elseif ( session()->get('user')->grupo == 2 )
		          			<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		          			<span style="font-weight: 600;"> $ {{number_format($pr['precio_especial_1'], 2, '.', ',') }} MNX </span>
		          		@elseif ( session()->get('user')->grupo == 3 )
		          			<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		          			<span style="font-weight: 600;"> $ {{number_format($pr['precio_especial_2'], 2, '.', ',') }} MNX </span>
		          		@elseif ( session()->get('user')->grupo == 4 )
		          			<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		          			<span style="font-weight: 600;"> $ {{number_format($pr['precio_especial_3'], 2, '.', ',') }} MNX </span>
		          		@elseif ( session()->get('user')->grupo == 5 )
		          			<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		          			<span style="font-weight: 600;"> $ {{number_format($pr['precio_especial_4'], 2, '.', ',') }} MNX </span>
		          		@endif
		          	@else
		          		@if( $pr['promo'] > 0 )
		             		<span style="font-weight: 600;"> ${{number_format($pr['price'], 2)}} MNX </span>
		             		<span style="text-decoration: line-through;"> ${{number_format($pr['price'], 2)}} MNX </span>
		             	@else
		             		<span>${{number_format($pr['price'], 2)}} </span>
		             	@endif
		             @endif
		         	</td>

		          <td>
		          	 <div class="col-lg-12 col-xs-12 col-xs-12" style="padding-left: 0px; padding-top: 10px; padding-bottom: 10px; width: 140px;">
							<div class="col-lg-3 col-xs-4 container-input-cantidad" style="text-align: left; padding-left: 0px;">
								<span  np="{{$pr['np']}}" id="{{$pr['id']}}" class="control-cantidad span-menos"> - </span>
							</div>
							<div class="col-lg-6 col-xs-4" style="text-align: center; padding: 0px 5px;">
								<span pattern="{2,40}"
									  np="{{$pr['np']}}"
									  data-max="{{ $pr['max_items'] }}"
									  class="input-cantidad-{{$pr['id']}}"
									  style="display: inline-block;padding-top: 5px; font-weight: bolder;"
									  type="number"
									  name=""
									  required
								>
									{{$pr['cant']}}
								</span>
							</div>
							<div class="col-lg-3 col-xs-4 right-control" style="text-align: left; padding-left: 4px;">
								<span np="{{$pr['np']}}" id="{{$pr['id']}}" class="control-cantidad span-mas"> + </span>
							</div>
						</div>
		          </td>
		          <td>{{$pr['talla']}}</td>
		          <!-- <td>
		            <button class="btn" onclick="deleteProduct('{{$pr['np']}}')">Borrar</button>
		          </td> -->
		          <td>
		          </td>
		        </tr>
		      @endforeach
		  </tbody>
		</table>
    @else
    <h2>No tienes artículos en tu carrito</h2>
    @endif

		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right; border-bottom: 1px solid #c2c2c2;">
      <div class="col-lg-10 col-xs-10">
	      	<div style="text-align: right; padding-top: 10px; font-size: 25px; font-weight: 500;">
	      		<span>SUBTOTAL</span>
	      	</div>
      </div>
      <div class="col-lg-2 col-xs-2">
			<span class="subtotal-cart" style="font-weight: 500; font-size: 25px; text-align: center; padding: 4px 10px; border-radius: 4px; display: inline-block;">
				$@php echo number_format($totalCart, 2) @endphp MX
			</span>
      </div>
	</div>

	<div class="col-lg-12">
		@if( \Session::get('productos') )
	      <div class="col-xs-12">
			<a href="{{asset('checkout-main')}}">
				<h2 class="pagar pull-right">PAGAR</h2>
			</a>
	      </div>
	  @endif
	</div>

	</div>

  <script type="text/javascript">
  	window.onload = function() {

  		$('.span-menos').click( function()
		{
			console.log('--- Restar ---')
			let np = $(this).attr('np')
			let id = $(this).attr('id')
			let el = $('.input-cantidad-'+id+':first-child')
			let cantidad	= parseInt( el.text() )
			let max_items	= parseInt( el.attr('data-max') )

			if( cantidad === 1 )
			{
				deleteProduct( np )
			}
			else
			{
				if( cantidad > 1 )
				{
					cantidad	-= 1
					max_items	+= 1
				}
				console.log('--- Restar ---', max_items, cantidad)

				$('.input-cantidad-'+id).attr('data-max', max_items)
				$('.input-cantidad-'+id).text(cantidad);
				updateCant(np, cantidad, id, max_items);
			}
		});

		$('.span-mas').click( function(event)
		{
			console.log('--- Agregar más ---')
			let np = $(this).attr('np')
			let id = $(this).attr('id')
			let el = $('.input-cantidad-'+id+':first-child')
			let cantidad	= parseInt( el.text() )
			let max_items	= parseInt( el.attr('data-max') )

			if( max_items === 0 )
			{
				alert('Has elegido el número máximo de productos en existencia.')
				return
			}
			cantidad	+= 1
			max_items	-= 1
			console.log('--- Agregar más ---', max_items, cantidad)

			$('.input-cantidad-'+id).attr('data-max', max_items)
			$('.input-cantidad-'+id).text(cantidad);
			updateCant(np, cantidad, id, max_items);
		});

		function updateCant( np, cant, id, max_items )
		{
			$('#overlay').fadeIn(300)

			 $.ajax({
				 	'url'		: '{{ asset('updateCantProduct') }}'
				 ,	'method'	: 'POST'
				 ,	'data'		:
					{
							'np'	: np
						,	'cant'	: cant
						,	'id'	: id
						,	'max'	: max_items
					}
				 ,	'success'	: function( data )
				 {
					 $('.subtotal-cart').html( "$"+JSON.parse(data).subtotal+".00 MX" )
					 $('#overlay').fadeOut(300)
				 }
			 })
		}


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

  	}

  	function goBack() {
	  window.history.back();
	}

    function deleteProduct( np ) {
      $("#overlay").fadeIn(300);
      $.ajax({
        'url' : '{{asset('deleteFromCart')}}',
        'method' : 'post',
        'data' : { 'np' : np } ,
        'success' : function( data ) {
          console.log( data );
          $("#overlay").fadeOut(300);
          window.location.reload();
        }
      });

    }
  </script>


	<h1 style="font-weight: 900; padding-left: 10px;"></h1>


</div>

 </div>
 @endsection