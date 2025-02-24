@extends('layout2') 

@section('page')


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
 
<div class="container-fluid" style="padding: 0px;">
	<style type="text/css">
        html, body{ 
            font-family: 'Poppins'!important;   
            font-weight: 300; 
        } 
		.text-1 {
			/*background-color: #c4262e;*/ 
			display: inline; 
			display: flow-root;
			padding: 0px 20px; 
			opacity: .7;
			font-size: 30px; font-weight: 700;
		}
		.text-2 {
			/*background-color: white; */ 
			padding: 0px 20px; 
			/*opacity: .7;*/ 
			display: block; font-size: 35px; color: #c4262e; font-weight: 900; background-size: cover;
			display: inline-block;
		}
		.promo-btn {
			box-shadow: -2px 6px 10px 0px #0000005c;
			background-color: #3F51B5; 
			opacity: 1; 
			padding: 4px 20px; 
			color: white;
			margin-top: 40px;
			border-radius: 10px;  
			font-size: 20px; 
			font-weight: 700;
			display: inline-block;
			transition-property: all; 
			transition-duration: .1s;
			text-transform: uppercase;
		}
		.promo-btn:hover {
			cursor: pointer;
			transform: scale(1.05);
			transition-property: all; 
			transition-duration: .1s;
		}

		.aqui {
		  position: relative;
		  display: inline-block;
		  color: white;
		  background: red;
		  width: 100px;
		  height: 30px;
		  z-index: 2;
		  margin-left: 10px;
		  text-decoration: none;
		  opacity: 1!important;
		  text-align: center;
		  display: inline-block; color: white!important; font-size: 20px; padding: 0px 10px; background-color: #4179ff;
		  padding-top: 4px!important; 
		}

		.aqui:before {
			  content: '';
			  position: absolute;
			  top: 0;
			  left: -10px;
			  width: 20px;
			  height: 30px;
			  background: #4179ff;
			  transform: skewX(-30deg);
			  z-index: 1;
		}

		.aqui:after {
		  content: '';
		  position: absolute;
		  top: 0;
		  right: -10px;
		  width: 20px;
		  height: 30px;
		  background: #4179ff;
		  transform: skewX(-30deg);
		  z-index: 1;
		} 
		.aqui:hover {
			cursor: pointer;
			transform: scale(1.1); 
		}



		body {
			background-color: #f6f6f6!important;
		}

		.banner-img {
			width: 80%; 
		}
		.np { padding: 0px!important; }


		@if( isset($color_main))
			.line-menu-main { 
				background-color: {{$color_main}}!important; 
			}
			.content-splash {
    			border: 2px solid {{$color_main}}!important;
    		}
    		.owl-prev {
    			background-color: {{$color_main}}!important;
    		}
    		.owl-next {
    			background-color: {{$color_main}}!important;
    		}
		@endif 
    </style>

<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="col-lg-1"></div>
	<div class="banner-section col-lg-10" style="padding: 0px 10px; margin: 10px 0px; ">
		<div class="hover14 owl-carousel owl-theme list-banners"> 
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
				  	<a href="https://listado.mercadolibre.com.mx/_CustId_347691321" target="_blank">
					   <img loading="lazy" class="banner-img" src="media/sliders/PicsArt_11-11-02.21.11.webp"/> 
				  	</a>
				  </div>  
			</div>
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/PicsArt_11-11-12.12.41.webp"/> 
				  </div>
			</div>
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/banner_4_4.webp"/> 
				  </div>
			</div>
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/banner_2_2.webp" /> 
				  </div>
			</div>
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/banner_3_3.webp" /> 
				  </div>
			</div>
			<div class="item np desktop-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/banner_1_1.webp" /> 
				  </div>
			</div> 
		</div> 
		<div class="hover14 owl-carousel owl-theme list-banners-m" style="display: none"> 
			<div class="item np mobile-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/sliders/buen-fin-desktop-2-1.jpg" /> 
				  </div>
			</div>
			<div class="item np mobile-item">
				  <div class="col-lg-12 np" style="text-align: center;">
					   <img loading="lazy" class="banner-img" src="media/banners/banner-mobil-01.webp" /> 
				  </div>
			</div>
		</div> 
	</div>
	<div class="col-lg-1"></div>
</div>
	<?php

			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			if( strpos($ua, 'Android') !== false ) $ua = "Android"; 
			if( strpos($ua, 'iphone') !== false ) $ua = "Iphone";  
			if( strpos($ua, 'chrome') !== false ) $ua = "chrome";  

	 ?>
	<div class="products-section" style="padding: 0px 20px;">
	<div>
		<h3 style="font-weight: 900;">PRODUCTOS NUEVOS</h3>
		<h4>DAMA <a href="">ver todo..</a></h4> 
	</div>
		<div class="owl-carousel owl-theme list-products" style="text-align: center;"> 
			 @each('catalogo/product/view/item', $slider_p, 'product') 
    	</div> 
</div> 

<?php 
	$ip = $_SERVER['REMOTE_ADDR']; 
?> 

@if( $busqueda === true ) 
	<div class="col-lg-12 custom-block" style="padding: 100px 100px;">
		{!!$clip!!}
	</div>
@endif 
   
   {{-- 
 @include('Bloques.quick-search')  
  --}} 


<style type="text/css">
	.content-banner img {
		width: 100%; 
	}
.content-banner img:hover {
	cursor: pointer;
}

figure {
  width: 100%;
  margin: 0;
  padding: 0;
  background: #fff;
  overflow: hidden;
}
figure:hover+span {
  bottom: -36px;
  opacity: 1;
}

 
/* Shine */
.hover14 figure {
  position: relative;
}
figure:hover {
	cursor: pointer;
}
.hover14 figure::before {
  position: absolute;
  top: 0;
  left: -75%;
  z-index: 2;
  display: block;
  content: '';
  width: 50%;
  height: 100%;
  background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
  background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
  -webkit-transform: skewX(-25deg);
  transform: skewX(-25deg);
  cursor: pointer;
}
.hover14 figure:hover::before {
  -webkit-animation: shine .75s;
  animation: shine .75s;
  cursor: pointer;
}
@-webkit-keyframes shine {
  100% {
    left: 125%;
  }
}
@keyframes shine {
  100% {
    left: 125%;
  }
}

</style>
 
<div class="products-section" style="padding: 20px 20px;">
	<div>
		<h3 style="font-weight: 900;">PROMOCIÓN</h3>
		<h4>DAMA <a href="">ver todo</a></h4>
	</div>
		<div class="owl-carousel owl-theme list-products" style="text-align: center;"> 
                @each('catalogo/product/view/item', $slider2, 'product') 
    	</div> 
</div> 

@include('categories-row')
  

@php 
	$marcas = array('begima', 'coco', 'bella', 'flex', 'gaiyi', 'ilys', 'rc-men', 'rosa', 'saven', 'spree', 'yalete', 'youmita'); 
	$marcas = array( array('marca' => 'begima', 'id' => 4), 
					 array('marca' => 'coco', 'id' => 7), 
					 array('marca' => 'bella', 'id' => 26),  
					 array('marca' => 'gaiyi', 'id' => 42), 
					 array('marca' => 'rc-men', 'id' => 5), 
					 array('marca' => 'rosa', 'id' => 58)
					 ); 
@endphp 
<style type="text/css">
	.element-slider-content-brand {
		display: inline-block; width: 100%;
		 background-size: cover!important; background-repeat: no-repeat; background-position: center; 
		 height: 170px;
	}
</style>
<div class="brands-section" style="padding: 0px 20px; padding-top: 40px;">
		<div style="text-align: center;">
			<h3 style="font-weight: 900;">MARCAS</h3>
		</div>
		<div class="owl-carousel owl-theme list-brands" style="text-align: center;">  
			@foreach($marcas as $marca)
                <div class="item" style="text-align: center;"> 
                    <div style="text-align: center;"> 
                    	<div style="margin: 0px 10px; border-radius: 0px;">
                    		<a href="{{asset('/byBrand/'.$marca['id'])}}">   
                        		<img class="owl-lazy" loading="lazy" src="{{asset('/media/marcas/marcas-'.$marca['marca'].'.png')}}">
                    		</a>
                    	</div>
                    </div> 
                </div>  
	 	    @endforeach
    	</div> 
</div> 
 
@endsection