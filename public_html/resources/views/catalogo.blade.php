@extends('layout') 

@section('page')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.theme.default.css">
 
  
 <style type="text/css">
 	.nav-menu-header { display: block!important; }
 	.owl-sli .owl-height {
 		height: 320px!important; 
 	}
 	.favorite-act:hover {
 		transform: scale(1.1);
 		cursor: pointer;
 	}

 	@media ( min-width: 1300px ) {
 		.content-list-products {
    		text-align: center;
    		padding: 10px 100px;
		}
 	}

 	@media (max-width: 600px) {  
 		.row-logo { display: none; }
		.content-logo- {
		    padding-top: 0px!important;
		}
		.section-element {
			padding-top: 40px!important;
			padding-right: 0px;
			padding-left: 0px;
		}
		.content-list-products {
			padding-top: 20px; 
			padding-left: 0px;
			padding-right: 20px;
		}
		.container-item { height: 30vh!important; }
		.content-img-product {
			height: 30vh!important; 
		}
 	}
 </style> 

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-seleccionar-modelo container-seleccionar-vehiculo" style="padding: 0px"> 
	<div class="container-buscador">
			<div style="text-align: center; margin-bottom: 20px; display: none;"> 
				<h1 class="main-text">Resultados para: {{$filter}} </h1> 
				<a href="{{asset('index')}}">
					<span class="main-text-s">Filtrar de nuevo</span>
				</a>
			</div> 
	</div>   
 


<style type="text/css">
	.container-img:nth-child(1) {
		min-height: 320px;  
		background-position: center;
		background-size: 85%;
		background-repeat: no-repeat;
		transition-property: all; 
		transition-duration: .2s; 
	} 
	.container-img:hover {
		transition-property: all; 
		transition-duration: .2s; 
		background-size: 95%!important; 
	} 
	.name {
		font-size: 15px; font-weight: 600; display: block; padding: 10px 0px;
		min-height: 53px;
	}
	.btn-add {
		background-color: black; color: white; padding: 5px 15px; margin-top: 10px;
	}
	.btn-add:hover {
		cursor: pointer;
		background-color: white; 
		color: black;
		border: 2px solid black;
		transition-property: all;
		transition-duration: .2s;
	}
	.attr-text {
		font-size: 17px; 
	}
	

	.filter-element {
		border-radius: 0px; 
		font-size: 16px; 
		width: 170px;
		color: black;
	}
	.title-order {
		font-size: 16px; 
		display: inline-block;
		padding-top: 7px;
		color: black;
	}
</style>

<div class="products-section col-lg-12 col-md-12 col-sm-12 section-element" style="padding-top: 120px;">
	<div class="products-section col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 40px; "> 
		<div  class="products-section filter-section col-lg-12 col-md-12 col-sm-12 row">
			<div class="col-lg-10 col-xs-8 to-filter-field hidden-xs" style="padding-top: 15px;">
				
			</div>
			<style type="text/css">
				.widget-search {
					background-color: #ffc600;
				    color: white;
				    border-radius: 21px;
				    padding: 5px 10px; 

				    background-image: url('{{asset("media/arrow-right.svg")}}'); 
				    background-repeat: no-repeat;
				    background-position: right;
				    background-size: 40px;
				    padding-right: 70px !important;
				}
			</style>
			<div class="col-lg-12 col-xs-12"> 
				<div class="col-lg-3">
					<div class="widget-search"></div>
				</div>
				<div class="col-lg-9">
					<div style="padding-top: 10px; width: 40vw; ">
						<input class="form-control" type="" name="" style="border-radius: 12px; height: 35px;">
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-8 to-filter-field hidden-xs" style="padding-top: 15px;">
				<span class="title-order">Ordenar por</span>
				<select class="form-control pull-right filter-element" style="display: none;">
					@foreach( $marcas as $marca )
							<option>{{$marca->title}}</option>
					@endforeach 
				</select> 	
				<select class="form-control pull-right filter-element" id="order-control">
					<option value="menor-precio">Seleccionar</option>
					<option value="menor-precio">Menor precio</option>
					<option value="mayor-precio">Mayor precio</option>
					<option value="nombre">Nombre</option>
				</select> 	
			</div>
		</div>
	</div>
<div class="col-lg-12 content-list-products clearfix row">  
	@php 
		//var_dump( $catalogo ); 
	@endphp 
	@foreach($blocks as $block)
		<div class="col-lg-3 col-sm-3 col-xs-6"> 
			<div class="col-lg-12">  
		 		@each('catalogo/product/view/item', array($block), 'product')  
		 	</div>
		</div> 
	@endforeach 
</div>

<!-- 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
	<nav aria-label="Page navigation" style="text-align: center;">
		<ul class="pagination">
			  <li>
				  <a href="#" aria-label="Previous">
				    <span aria-hidden="true">&laquo;</span>
				  </a>
				</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
				<li>
			  <a href="#" aria-label="Next">
			    <span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		</ul>
	</nav>
</div>  --> 
			 	 
</div>

<script type="text/javascript">

	if( localStorage.getItem("fit") ) {
		$(".widget-search").html( localStorage.getItem("fit") ); 
	}


	$('#order-control').change( function() { 
		var order = $('#order-control').val(); 
		url = "{{asset("/catalogo/")}}/{{$filter}}/order/"+order; 
		window.location.href = url; 
	}); 
	window.onload = function() { 
		$('html').find('option[value="$order"]').prop('selected', 'selected');
	} 
</script>
  
 
 @endsection