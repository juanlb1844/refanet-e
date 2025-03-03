@extends('layout') 

@section('page') 

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 

<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.css">
 
</head> 
<body>



<style type="text/css">
    /* THEME FAST SELECT */ 
  .fstMultipleMode {
    width: 100%; 
    height: 50px; 
    border-radius: 7px; 
    padding: 4px; 
    display: inline-table!important;
  }
  .fstChoiceItem {
    font-size: 15px!important; 
    background-color:  #46b04a!important; 
    border: 1px solid #46b04a!important;
    padding-left: 30px!important;
  }
  .fstChoiceRemove { font-size: 30px!important; }
  /*.fstControls {display: inline!important;}*/
  .fstMultipleMode .fstControls { display: inline-block!important; width: 100%!important; padding: 0px!important; }
  .fstMultipleMode .fstQueryInputExpanded { font-size: 17px!important;  }
  .fstQueryInput { height: 30px; }
  .fstResultItem { font-size: 17px!important; }
  .fstToggleBtn {
  	font-size: 12px; 
  }
  .fstControls { font-size: 12px;  }
</style>

 
<div class="container-fluid" style="padding: 0px;">
 
<div class="col-lg-12 col-md-12 col-xs-12 section-element" style="/*height: 900px;*/">
	<!-- 
	<div class="banner-section col-lg-12" style="margin: 10px 0px; ">
		<div class="swiper mySwiper list-banners">
		      <div class="swiper-wrapper">
		        @foreach ( $sliderMain as $item ) 
					<div class="swiper-slide">
		          		<img style="width: 100%;" src="{{$item->url}}" />
		        	</div>
				@endforeach  
		      </div>
		      <div class="swiper-button-next"></div>
		      <div class="swiper-button-prev"></div>
		      <div class="swiper-pagination"></div>
		</div>


		<div class="hover14 owl-carousel owl-theme list-banners-m" style="display: none"> 
			@foreach ( $sliderMain2 as $item )
				<div class="item np mobile-item">
					  <div class="col-lg-12 np" style="text-align: center;">
					  	   <a href="{{$item->href}}"> 
						   		<img loading="lazy" class="banner-img" src="{{$item->url}}"/> 
						   </a>
					  </div> 
				</div>
			@endforeach
		</div> 
	</div> --> 


	<style type="text/css">
		.courtain {
			background-color: black; 
			display: inline-block;
			height: 100px; 
			width: 100%; 
			position: relative;
    		top: -108px; 
    		z-index: 999;
			background: rgb(246,246,246);
			background: linear-gradient(0deg, rgba(246,246,246,1) 0%, rgba(246,246,246,0.48783263305322133) 50%, rgba(246,246,246,0) 100%);
	</style>|

	<div class="courtain">
		<div class="body-courtain">
			
		</div>
	</div>

	<style type="text/css">
		.container-prop {
			text-align: center;
		}
		.container-filter {
			background-color: #ececec;
			height: 100px; 
			padding-top: 30px; 
			border-radius: 12px; 
			display: inline-block;
		}
		.container-widget {
			padding: 40px 0px; 
			width: 100%; 
			text-align: center;
			/*position: relative;*/ 
			top: -380px; 
			z-index: 9999; 
		}


		.data-widget {
			background-image: url('{{asset("media/arrow-right.svg")}}'); 
		    background-repeat: no-repeat;
		    background-position: right;
		    background-size: 40px;
		    padding-right: 70px !important;
		}
	</style>

	<!-- 
		@include('Bloques.quick-search')  
	--> 


	<div class="col-lg-12" style="text-align: center; margin-bottom: 40px; "> 
 
		<div style="text-align: center; padding-top: 140px; padding-bottom: 70px;">
			<span style="font-size: 42px; font-weight: 900; color: gray; font-style: italic;">Bienvenido a RefaGo</span>
		</div> 
  
		<button class="btn btn-primary data-widget" style="border-color: #ffc500; background-color: #ffc500; border-radius: 18px; font-weight: bolder; font-size: 18px; margin-top: 5px; padding: 10px 25px; border-radius: 22px;" data-toggle="modal" data-target="#widgetFit">
			Añadir auto 
		</button> 
		<div class="autocomplete" style="width: 100%; color:black; background-color: #f1f1f1; border-radius: 22px; padding: 2px 2px 2px 20px; text-align: center; width: 400px; height: 50px;">
	            <input class="search input-search input-text input-searchbox input-search" id="myInput" style="width: 300px; border: 0px; height: 40px; font-size: 18px; font-weight: 500;" placeholder="¿Qué pieza buscamos?" type="text" name="field" aria-haspopup="false" aria-expanded="true" aria-autocomplete="both" autocomplete="off">
	            <img id="img-search" src="{{asset('/media/search.svg')}}" style="width: 20px;">
	    </div>
	</div> 
 
</div>


	<?php
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		if( strpos($ua, 'Android') !== false ) $ua = "Android"; 
		if( strpos($ua, 'iphone') !== false ) $ua = "Iphone";  
		if( strpos($ua, 'chrome') !== false ) $ua = "chrome";  
	 ?>

	<div class="products-section col-lg-12 col-xs-12 section-element" style="padding: 60px 120px;">
			<div>
				<h3 style="font-weight: 900;">{{$sliders_type[0]->title}}</h3> 
				<h4>{{$sliders_type[0]->subtitle}} <a href="https://begima.com.mx/catalogo/productos-nuevos">ver todo</a></h4> 
			</div> 
			<div class="owl-carousel owl-theme list-products" style="text-align: center;"> 
				 @each('catalogo/product/view/item', $slider_p, 'product') 
	    	</div> 
	</div> 

<?php 
	$ip = $_SERVER['REMOTE_ADDR']; 
?> 

@if( $busqueda === true ) 
	<div class="col-lg-12 section-element" style="padding: 100px 100px;">
		{!!$clip!!}
	</div>
@endif 
   
   {{-- 
 @include('Bloques.quick-search')  
  --}} 

 
	<div class="products-section col-lg-12 col-xs-12 section-element" style="padding: 60px 120px;">
		<div>
			<h3 style="font-weight: 900;">{{$sliders_type[1]->title}}</h3>
			<h4>{{$sliders_type[1]->subtitle}} <a href="https://begima.com.mx/catalogo/promociones">ver todo</a></h4>
		</div>
		<div class="owl-carousel owl-theme list-products" style="text-align: center;"> 
	        @each('catalogo/product/view/item', $slider2, 'product') 
	    </div> 
	</div> 

<!-- 
@include('categories-row', $block)
--> 
  
@php 
	$marcas = array('begima', 'coco', 'bella', 'flex', 'gaiyi-np', 'ilys', 'rc-men', 'rosa', 'saven', 'spree', 'yalete', 'youmita'); 
	$marcas = array( array('marca' => 'begima-np', 'id' => 4), 
					 array('marca' => 'coco-np', 'id' => 7), 
					 array('marca' => 'bella-np', 'id' => 26),  
					 array('marca' => 'gaiyi-np', 'id' => 42), 
					 array('marca' => 'rc-men-np', 'id' => 5), 
					 array('marca' => 'rosa-np', 'id' => 58), 
					 array('marca' => 'coco-np', 'id' => 7), 
					 ); 
@endphp 
<style type="text/css">
	.element-slider-content-brand {
		display: inline-block; width: 100%;
		 background-size: cover!important; background-repeat: no-repeat; background-position: center; 
		 height: 170px;
	}
	
	 .content-img-product {
    	border: 1px solid #e1e1e1;
     } 

</style>
	<div class="brands-section col-lg-12 col-xs-12 section-element" style="padding: 0px 20px; padding-top: 40px;">
		<div style="text-align: center;">
			<h3 style="font-weight: 900;">MARCAS</h3>
		</div>
		<div class="owl-carousel owl-theme list-brands" style="text-align: center; margin-bottom: 40px;">  
			@foreach($brands as $brand)
                <div class="item" style="text-align: center;"> 
                    <div style="text-align: center;"> 
                    	<div style="margin: 0px 0px; border-radius: 0px;">
                    		<a href="{{asset('/byBrand/'.$brand->id)}}">    
                        		<img style="opacity: 1!important;" class="owl-lazy" loading="lazy" src="{{$brand->img}}"> 
                    		</a> 
                    	</div>
                    </div> 
                </div>  
	 	    @endforeach
    	</div> 
	</div> 
</div>




<!-- Modal -->
<div id="widgetFit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="padding-top: 30vh;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agrega tu auto</h4>
      </div>
      <div class="modal-body">
        	<div class="container-widget">
			<div class="container-filter">
				<div class="col-lg-12">
					<div class="col-lg-3 container-prop">
						 <select onchange="formatCantidades(event)" class="fselect-brand multipleSelect" value="Marca" idProduct='1' name="language"> 
						 	@if( $fits ) 
			                    @foreach( $fits as $k_fit => $fit )   
									<option value="{{$fit->title_model}}">{{$fit->title_model}}</option>
								@endforeach
							@endif 
		                 </select>   
					</div>
					<div class="col-lg-3 container-prop">
						<select onchange="changeModel(event)" class="multipleSelect fselect-model" name="language">
							<option>Modelo</option>  
						</select>
					</div>
					<div class="col-lg-3 container-prop">
						<select onchange="changeAnio(event)" class="multipleSelect fselect-anio" name="language">
							<option>Año</option>  
						</select>
					</div>
					<div class="col-lg-3 container-prop">
						<select onchange="changeEngine(event)" class="multipleSelect fselect-engine" name="language">
							<option>Motor</option>  
						</select>
					</div>
			</div>
			<!-- <div class="col-lg-12">
				<button class="btn btn-primary" id="btnGetEngine">Ok</button>
			</div> --> 
		</div>
	</div>
      </div> 
    </div>

  </div>
</div>


<script type="text/javascript">

	if( localStorage.getItem("fit") ) {
		//alert( localStorage.getItem("idFit") ); 
		$(".data-widget").html( localStorage.getItem("fit") ); 
	}


	let id_to_search = null;  
 
	$("#btnGetEngine").click( function() {
		 id_to_search = $('.fselect-engine').find(":selected").attr("id-fit"); 
	}); 

	json_fits = "{{json_encode($fits_json)}}"; 
	json_fits = json_fits.replaceAll("&quot;", '"'); 
	json_fits = JSON.parse(json_fits); 
	console.log(json_fits);       

	brand_selected = null; 
	model_selected = null; 
	anio_selected = null; 

	engine_selected_str = null; 
	anio_selected_str = null; 
	model_selected_str = null; 

	function formatCantidades( event ) {
		$('.fselect-model').html(""); 
 		modelo_fast.data('fastselect').destroy();
 		brand_selected = $(event.target).val(); 
 		json_fits.forEach( function( item_brand, index ) {
 			if( item_brand.title_model == $(event.target).val() ) {
 				model_selected = item_brand.models_arr; 
 				item_brand.models_arr.forEach( function( item_model, index_model ) {
 					modelo_fast.append('<option value="'+item_model.title_model+'">'+item_model.title_model+'</option>');
 				});  
 			} 
 		}); 
 		modelo_fast =  $('.fselect-model').fastselect({ placeholder: "Modelo"}).destroy();; 
 		modelo_fast.fastselect();    
	}

	function changeModel( event ) {
		model_selected_str = $(event.target).val(); 

		$('.fselect-anio').html(""); 
 		anio_fast.data('fastselect').destroy(); 

		model_selected.forEach( function( item_model, index ){
			if( item_model.title_model == model_selected_str ) {
				anio_selected = item_model.years;   
				item_model.years.forEach( function( item_anios, index_anios){
					console.log( item_anios ); 
					anio_fast.append('<option value="'+item_anios.title_model+'">'+item_anios.title_model+'</option>'); 
				}); 
			}  
		}); 
 
		anio_fast =  $('.fselect-anio').fastselect({ placeholder: "Años"}).destroy();; 
 		anio_fast.fastselect();  
		//console.log(model_selected); 
	}

	function changeAnio( event ) {
		anio_selected_str = $(event.target).val(); 

		$('.fselect-engine').html(""); 
 		engine_fast.data('fastselect').destroy(); 

		anio_selected.forEach( function( item_anio, index_anio ) {
			if( item_anio.title_model == anio_selected_str ) {
				console.log( item_anio.engines ); 
				item_anio.engines.forEach( function( item_engine, index_engine ) {
					engine_fast.append('<option id-fit="'+item_engine.id_fit_model+'" value="'+item_engine.title_model+'">'+item_engine.title_model+'</option>'); 
				}); 
			}
		}); 

		engine_fast =  $('.fselect-engine').fastselect({ placeholder: "Motores"}).destroy();; 
 		engine_fast.fastselect(); 
	}

	function changeEngine( event ) { 
		$("#widgetFit").modal("toggle"); 
		engine_selected_str = $(event.target).val(); 

		/* 
		alert(brand_selected + " - " + 
			engine_selected_str + " - " + 
			anio_selected_str + " - " + 
			model_selected_str);   
		*/ 

		$(".data-widget").html("<span style='font-weight: bolder;'>"+brand_selected + "</span> " + 
			 model_selected_str + " " + 
			anio_selected_str + "<br> <span style='font-size: 12px; font-style: italic;'>" + 
			 engine_selected_str+"</span>"); 
	}

    $('.fselect-brand').fastselect({ placeholder: "Marca"}); 
    modelo_fast = $('.fselect-model').fastselect({ placeholder: "Modelo"}); 
    anio_fast   = $('.fselect-anio').fastselect({ placeholder: "Años"}); 
    engine_fast = $('.fselect-engine').fastselect({ placeholder: "Motor"}); 

     
</script>

@endsection



 