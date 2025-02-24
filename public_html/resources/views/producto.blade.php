@extends('layout') 

@section('page')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="https://gruposolana.com/.desarrollos/suzuki/public/owlslider/owl.theme.default.css"> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61856c9975623e09"></script>
<script src="{{asset('libs/zoom/js-image-zoom.js')}}" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/0.4.0/baguetteBox.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/0.4.0/baguetteBox.min.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<style type="text/css">
		.line-info {
			padding: 10px 10px;
		} 
		.section-right {
			margin-bottom: 40px; 
			padding-top: 0px; 
		} 
		.section-right .container-prods {
			border: 1px solid #efeeeb; border-radius: 3px; padding: 10px; 
			background-color: whitesmoke!important;  
		}
		
		.text-main{ font-size: 22px; }
		.text-info { font-size: 20px; font-weight: 700; }

		.fits-resume {
			padding: 50px 0px;
		}
		.status-product {
			font-size: 18px; color: #4caf50; font-weight: 400;
			display: inline-block; margin: 10px 15px;
		}
		.btn-add { display: inline-block; margin: 2px; font-weight: 900; font-size: 15px; width: 100%; text-align: center; }
		.btn-share { width: 100%;
					    background-image: url(../media/logo-share-512.png);
					    background-size: contain;
					    background-repeat: no-repeat;
					    background-position-x: 40; 
				}
		.info-price {
			font-weight: 900; 
			color: black;
			font-size: 30px;
			margin: 5px 0px;
			display: inline-block;
		}
		.text-delivering { font-size: 15px; }

		.content-info-colors {
			padding: 5px 0px;	
		}
		.color-shape {
			display: inline-block;
			width: 25px; 
			height: 25px;
			border-radius: 50%; 
			margin-right: 10px; 
			border: 1px solid gray;
		}


		.talla-unit {
			border-radius: 7px;
		    border: 1px solid gray; 
		    padding: 7px 7px;
		    display: inline-block;
		    font-size: 12px;
		}
		.header-content {
			display: inline-block;  
			padding-top: 5px; 
		}


		.content-info-description {
			padding: 0px 0px; 
		}
		.content-info-description .header-content { font-size: 24px;  }

		.control-cantidad:hover {
			cursor: pointer;
		}
		.control-cantidad {
			display: inline-block; 
			height: 30px; 
			width: 30px; 
			border-radius: 50%; 
			background-color: #011fc2; 
			color: white; 
			font-size: 28px; 
			text-align: center;
			line-height: 30px;
		}
		.input-cantidad {
			border: 1px solid gray; 
			border-radius: 12px; 
			width: 100%; 
			text-align: center;
			height: 35px; 
		}
		.container-input-cantidad { 
			text-align: center;
		}
		.btn-to-add-mobil {
			background-color: #f42e9a;
		    color: white;
		    border: 0px;
		    height: 40px;
		    border-radius: 20px;
		    padding: 0px 14px;
		    font-weight: 400;
		}
		.btn-to-add-mobil:active {
			transform: scale(1.1); 
		}

		.content-controls-mobil {
			padding-left: 0px; 
			padding-right: 0px; 
			padding-bottom: 0px; 
			padding-top: 0px;
		}
		.info-price {
			font-size: 22px; 
			font-weight: 600; 
			padding-top: 15px; 
		}
		.span-menos:active, .span-mas:active {
			transform: scale(1.1);
			transition-property: all; 
			transition-duration: .2s; 
		}
	</style>
<style type="text/css">
	.nav-menu-header { display: block!important; }
	#baguetteBox-overlay { z-index: 99999999999; }
    html, body{ 
        font-family: 'Poppins'!important;   
        font-weight: 300; 
    }  
	.product-main-section { 
		padding: 30px 0px;
	} 
	.container-header-cart h2 {
		font-weight: 900; margin: 30px 0px; padding-left: 10px; 
	}  
	.section-imgs {
		margin-bottom: 40px;
		padding-top: 0px; 
	}
	.content-imgs {
		border-radius: 3px;
	}
	.carousel-imgs {
		text-align: center; 
	}
	.carousel-imgs .item {
		text-align: center;
	}

 .owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next, .owl-carousel button.owl-dot {
    top: 45%!important;
}
.avatar-comment {
	 				width: 70px; 
	 				height: 70px; 
	 				border-radius: 50%; 
	 				border: 2px solid black;
	 				background-position: center;
	 				background-size: cover; 
	 				display: inline-block;
	 			}  
	 			.container-avatar {
	 				text-align: center;
	 			}
	 			.comment-name {
	 				padding-top: 15px; 
	 			}
	 			.comment-name .name-avatar {
	 				font-weight: 700;
	 				font-size: 17px; 
	 			}
	 			.comment-name .comment-date {
	 				font-weight: 400;
	 				font-size: 17px; 
	 			}
	 			.comment-text {
	 				font-size: 15px; 
	 			}
	 			.container-r-opinions {
	 				margin-top: 40px; 
	 				margin-bottom: 40px; 
	 			} 
	 			.comment-line {
	 				background-color: #eeeeee;
	 				background-color: #e1d8e7;
	 				background-color: {{$back_comments->content}}; 
	 				padding: 10px;  
	 				border-radius: 7px; 
	 				margin-bottom: 20px; 
	 			}  
	 			#send-evaluation {
	 				background-color: {{$btn_comments->content}}; 
	 				border: 1px solid {{$btn_comments->content}}; 
	 				height: 40px; 
	 				font-size: 17px; 
	 				border-radius: 0px;
	 			}


	 			.comment-calification img {
	 				width: 20px; 
	 			}
	 			.comment-calification li {
	 				display: inline-block;
	 				margin-right: 10px; 
	 			}
	 			.comment-cal-container {
	 				padding-top: 20px; 
	 				text-align: right;
	 			}  
	 			.resp-prev {
	 				padding-left: 20px; 
	 				font-size: 20px; 
	 			}
	 			.comment-text {
	 				font-size: 18px; 
	 				font-weight: 600;
	 			}

.gallery-element-aside {
	width: 100%; 
	height: auto; 
	margin-bottom: 20px; 
	border: 1px solid #efeeeb; 
	display: inline-block;
} 
.gallery-element-aside img:hover {
	cursor: pointer; 
	border: 2px solid gray;
}

/* STARS*/ 
.stars li:hover {
	 				cursor: pointer;
	 			}
	 			.stars li {
	 				display: inline-block;
	 				margin-right: 20px;
	 			}
	 			.star-element img{ 
	 				width: 30px;
	 			}
	 			.pre-star {
	 				opacity: .5;
	 			}
	 			.select-star {
	 				opacity: 1!important;
	 			}

.owl-rec { height: auto!important; }
.recomendations-content {
	background-size: cover!important; background-repeat: no-repeat; background-position: center; height: 330px; border-radius: 7px;
}
.recomendation-name {
	font-size: 17px; font-weight: 500; display: block; padding: 2px 0px;
}
.product-prices {
	font-weight: 600; padding: 5px 0px; display: inline-block; font-size: 17px;
	color: black!important;
}
@media (max-width: 600px) {
	.content-imgs {
		padding-bottom: 10px; 
	}
	.content-delivering { padding: 0px!important; }
	.text-delivering { font-size: 12px; }
	.info-price {
    	padding-top: 20px; 
	}
	.content-info {
		padding-top: 5px; 
	}
	.section-container { margin-bottom: 10px; }
	.img-gall {
		margin-right: -90px!important;
	}

	.recomendation-name {
		font-size: 11px; 
	}	
	.product-prices {
		font-size: 12px;
	}
	.row-logo { display: none!important; }
	 
	.container-images-slider .owl-dots span {
		background-color: #c2469e!important; 
	}
	.container-images-slider .active span {
		background-color: #5a308d!important; 
	}
	.product-main-section {
		padding: 0px!important; 
	}
	.section-right {
		padding-top: 0px; 
	}
	.section-right .container-prods {
		border: 0px solid black!important;
	    border-radius: 3px;
	    padding: 5px;
	}
	.container-header-cart {
		font-size: 17px!important;
	}
	body {
    	background-color: #f1f1f1;
	}
	.section-imgs {
		margin-bottom: -30px;
	}
	.content-price {
		text-align: center;
	}
	#pay-methods { width: 120px!important; }
	.info-price { font-size: 20px!important; }
	.right-control { text-align: right!important; padding-right: 0px!important; }
	.container-controls { padding-right: 0px!important; }
	.galeria img { margin-left: -30%!important;  }

	.owl-rec { height: 	auto!important; }
	.recomendations-content {
			height: 150px; border-radius: 7px;
		}
 
	.star-element {
    	margin-right: 10px!important;  
    	width: 20px; 
	}
	.stars li { margin-right: 10px!important; }
	.stars li label { font-size: 17px; margin-left: 5px;  }
	.container-r-opinions {
	 				margin-top: 0px; 
	 				margin-bottom: 0px; 
	 			} 
}

.aside-gallery {
	max-height: 60vh; 
	overflow-y: auto; 
}

.aside-gallery::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 4px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: whitesmoke;
}

.aside-gallery::-webkit-scrollbar
{
	width: 12px; 
	background-color: whitesmoke;
}

.aside-gallery::-webkit-scrollbar-thumb
{
	border-radius: 7px;
	-webkit-box-shadow: inset 0 0 20px rgb(206 206 206);
    background-color: whitesmoke;
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
	.btn-to-add-mobil { background-color: {{$color_main}}!important; }
@endif 

@if( $_product->tipo_producto == 'individual' )
	@php 
	 $color_fondo = null; 
	 if( strlen($selected_pack->alfa_fondo) == 7 ) $color_fondo = $selected_pack->alfa_fondo; 
	 else $color_fondo = $selected_pack->alfa_color; 
	@endphp
	.line-menu-main { 
			background-color: {{$color_fondo}}!important; 
		}
	.line-menu-main li p, .line-menu-main li a { 
			color: {{$selected_pack->alfa_texto}}!important; 
		}

	.content-splash {
		border: 2px solid {{$color_fondo}}!important;
	}
	.control-cantidad { background-color: {{$color_fondo}}!important; color: {{$selected_pack->alfa_texto}}!important;  }
	.btn-add { background-color: {{$color_fondo}}!important; color: {{$selected_pack->alfa_texto}}!important;  }
	.owl-prev {
		background-color: {{$color_fondo}}!important;
	}
	.owl-next {
		background-color: {{$color_fondo}}!important;
	}
	.btn-to-add-mobil { background-color: {{$color_fondo}}!important; }
@endif 

	.img-selected {
		border: 1px solid black;
	}

	.row-logo {
		display: none!important; 
	}
</style> 
  
<div class="products-section col-lg-12 col-md-12 col-sm-12 product-main-section section-element" style="padding-top: 170px;">
	 <!-- <div class="col-lg-12 col-xs-12"> 
	 	<div class="products-section col-lg-12 col-md-12 col-sm-12" style="padding: 5px 15px; "> 
					<div class="container-header-cart">
						 <h4 style="font-weight: 600!important;">{{$_product->title}} {{$_np}}  </h4>  
					</div> 
				</div>  
	 </div> --> 
		  
	   <div class="col-lg-1">
		 
	</div>
	<div class="col-lg-1 hidden-xs">
		<div class="aside-gallery">
			@foreach( $imgs as $index => $img)
				<div class="gallery-element-aside" number="{{$index}}">
					<img number="{{$index}}" width="100%" src="{{$img->link}}">
				</div>
		 	@endforeach 
		</div>
	</div>

	<style type="text/css">
		.owl-carousel a div {
				  background-position: 50% 50%;
				  position: relative;
				  width: auto; 
				  /*overflow: hidden;*/ 
				  cursor: zoom-in!important; 
				  z-index: 9999999999;
				}
				.owl-carousel a div img:hover { 
				  opacity: 0!important;
				  border-radius: 100px; 
				}  
				.owl-carousel a div img {
				  transition: opacity 0.5s; 
				  display: block; 
				  width: 500px;
				  background-image: url(''); 
				}
	</style> 

	<style>
* {box-sizing: border-box;}

.img-zoom-container {
  position: relative;
}

.img-zoom-lens {
  position: absolute!important;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 75px!important;
  height: 112.5px;
  background-color: gray;  
  opacity: .0;
}
.img-zoom-result {
  /*set the size of the result div:*/
  width: 200px;
  height: 300px;
  position: absolute;
  left: -215px;  
  top: -0px;
  z-index: 9999999; 
}

 
</style>
	

	<!-- img principal --> 
	<div class="products-section col-lg-5 col-md-12 col-sm-12 col-xs-12 section-imgs np"> 
		<div class="products-section col-lg-12 col-md-12 col-sm-12 content-imgs">
			<div class="section-container galeria"> 
			 	<div class="owl-carousel owl-theme list-owl-images carousel-imgs container-images-slider" id="imgs"> 
                    	@foreach( $imgs as $index => $img)
						 	 <a href="{{$img->link}}" data-caption="{{$_product->title}}">  
						 		   
			                         <img id="img-{{$index}}" index="{{$index}}" style="width: 100%; display: inline-block; border-radius: 10px; " class="img-car owl-lazy img-gall" data-src="{{$img->link}}" src="{{$img->link}}" alt="Begima">  
			                   
							  </a>  
					 	@endforeach 


            	</div>  
			</div>
			<div id="myresult" class="img-zoom-result"></div>

			@if( strlen( $_product->video_yt) > 10 )    
				<h1>&nbsp;</h1>  
				@php 
					$yt = explode("=", $_product->video_yt); 
				@endphp 
				@if( count($yt) > 1 )
					<iframe width="100%" height="345" autoplay="autoplay" src="https://www.youtube.com/embed/{{$yt[1]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				@endif 
	 		@endif 

	   
	 		<div class="container-r-opinions col-lg-12 col-sm-12 col-xs-12 np">

	 			@foreach($comments as $k => $comment)
	 			<div class="comment-line col-lg-12">
	 				<div class="col-lg-2 container-avatar" style="margin-right: 0px;">
	 					<div class="avatar-comment" style="background-image: url('https://a0.muscache.com/defaults/user_pic-225x225.png?im_w=240')">
	 						
	 					</div>
	 				</div>
	 				<div class="col-lg-10" style="padding-left: 0px;">
	 					<div class="comment-name col-lg-6">
	 						<span class="name-avatar">{{$comment->name}}</span>
	 						@php 
	 							$date = new DateTime($comment->fecha);
	 							$mes = ["Enero", "Febrero", "Marzo", "Abril"]; 
	 						@endphp 
	 						<p class="comment-date">{{$mes[intval($date->format('m')-1)]}} {{$date->format('Y')}}</p>
	 					</div>    
	 					<div class="col-lg-6 comment-cal-container">
	 						<ul class="comment-calification"> 
	 							@for( $i = 0; $i < $comment->calification; $i++ )
		 							<li>
		 								<img cant="1" src="{{asset('/media/raiting/star_before.png')}}">
		 							</li>
	 							@endfor
	 						</ul>
	 					</div>  
	 				</div>
	 				<div class="col-lg-12">
	 					<div class="comment-text">
	 						<p>{{$comment->comment}}</p>
	 					</div>
	 					 @if( strlen( $comment->respuesta ) > 1 )
		                    <p class="resp-prev">
		                       {{$comment->respuesta}}
		                    </p>
		                 @endif 
	 				</div>
	 			</div>
	 			@endforeach 
	 		</div>

	<?php
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		if( strpos($ua, 'android') !== false ) $ua = "android"; 
		if( strpos($ua, 'iphone') !== false ) $ua = "iphone"; 
	 ?>

	 	@if( $ua != 'android' AND $ua != 'iphone' )
	 		<div class="container-opinions">
	 			<div class="header-opinions">
	 				<h1></h1>
	 			</div>
	 			<div class="body-opinions">
	 				<div class="raiting">
	 					<ul class="stars" style="padding-left: 0px;">
	 						<li>
	 							<label>Califícanos</label>
	 						</li>
	 						<li class="star-element"> 
	 							<img cant="1" src="{{asset('/media/raiting/star_after.png')}}">
	 						</li>
	 						<li class="star-element"> 
	 							<img cant="2" src="{{asset('/media/raiting/star_after.png')}}">
	 						</li>
	 						<li class="star-element"> 
	 							<img cant="3" src="{{asset('/media/raiting/star_after.png')}}">
	 						</li>
	 						<li class="star-element"> 
	 							<img cant="4" src="{{asset('/media/raiting/star_after.png')}}">
	 						</li>
	 						<li class="star-element"> 
	 							<img cant="5" src="{{asset('/media/raiting/star_after.png')}}">
	 						</li>
	 					</ul>
	 				</div>
	 				<p></p>
	 				<input id="comment-name" class="form-control" placeholder="Nombre: " type="" name="">
	 				<!-- <label>Déjanos tu comentario o pregunta</label> --> 
	 				<h2></h2>
	 				<textarea id="comment-opinion" rows="4" cols="50" p class="form-control" placeholder="Déjanos tu comentario o pregunta"></textarea>  
	 				<p></p>
	 				<button class="btn btn-primary pull-right" id="send-evaluation">Envíar</button>
	 			</div> 

	 			<style type="text/css"> table td { padding: 5px 10px;  } </style> 

	 			<div class="col-lg-12 col-md-12 col-xs-12" style="padding: 0px!important; padding-top: 100px!important; "> 
					{!!$_product->descripcion!!}
				</div> 

	 		</div>
	 	@endif 

		</div> 
	</div> 

	<script type="text/javascript">
		let stars = 0; 
		$('#send-evaluation').click( function() {
			let nameComment = $("#comment-name").val(); 
			let nameOpinion = $("#comment-opinion").val(); 
			
			if( stars == 0 ) {
				alert("¿Podrías ponernos una calificación?"); 
				return; 
			}
			if( nameComment.length < 1 || nameOpinion.length < 1 ) {
				alert("Déjanos tu nombre y una opinión"); 
				return; 
			}
			$("#overlay").fadeIn();
			$.ajax({
				'url' : "{{asset("saveComment")}}", 
				'method' : 'POST', 
				'data' : {
					'name' : nameComment, 
					'comment' : nameOpinion,
					'sku' : "{{$_product->nparte}}", 
					'calification' : stars 
				},  
				'success' : function(resp) {
					$("#overlay").fadeOut();
					alert("Gracias por tu ayuda!!");  
				}
			}); 
		}); 
		$('.star-element').hover( function( event ) {
			let cant = $(event.target).attr('cant'); 
			console.log(cant); 
			let iluminar = 0; 
			$(".pre-star").removeClass("select-star");  
			$(".pre-star").removeClass("pre-star"); 
			$('.star-element img').attr("src", "{{asset('/media/raiting/star_after.png')}}");
			while( iluminar < cant ) {
				$( $( $('.star-element')[iluminar] ).find('img') ).attr("src", "{{asset('/media/raiting/star_before.png')}}"); 
				$( $( $('.star-element')[iluminar] ).find('img') ).addClass("pre-star"); 
				iluminar++; 
			}
		});  
		$('.star-element').click( function( event ) {
			let cant = $(event.target).attr('cant'); 
			console.log(cant); 
			let iluminar = 0; 
			stars = cant; 
			$(".pre-star").removeClass("pre-star"); 
			$('.star-element img').attr("src", "{{asset('/media/raiting/star_after.png')}}");
			while( iluminar < cant ) {
				$( $( $('.star-element')[iluminar] ).find('img') ).attr("src", "{{asset('/media/raiting/star_before.png')}}"); 
				$( $( $('.star-element')[iluminar] ).find('img') ).addClass("select-star"); 
				iluminar++; 
			}
		}); 
	</script>
	

 
	<div class="products-section section-right col-lg-4 col-md-12 col-sm-12"> 
		<div class="container-prods col-lg-12"> 
			<div class="info-product"> 

				<div class="products-section col-lg-12 col-md-12 col-sm-12 hidden-xs" style="padding: 5px 15px; "> 

					<style type="text/css">
						.widget-search {
							background-color: #ffc600;
						    color: white;
						    border-radius: 21px;
						    padding: 10px 20px; 
						    font-size: 18px; 
						    background-image: url('{{asset("media/arrow-right.svg")}}'); 
						    background-repeat: no-repeat;
						    background-position: right;
						    background-size: 40px;
						    padding-right: 70px !important;
						    margin-bottom: 40px; 
						}
						.title-fit { font-size: 24px; font-weight: 700; }
					</style>
					<div class="col-lg-12 col-xs-12 np"> 
						<div class="col-lg-12 np">
							<span class="title-fit">Compatible con</span>
						</div>
						<div class="col-lg-12 np">
							<div class="widget-search"></div>
						</div>
					</div>


					<div class="container-header-cart col-lg-10 np">
						<h3 style="font-weight: 700; margin: 0px; font-family: 'Roboto Condensed', sans-serif;">{{$_product->title}} <!-- {{$_np}} --> </h3>
					</div> 
					<div class="col-lg-2"> 
						 @if( session()->has('logueado') )     
                            @if( strlen( session()->get('logueado') ) > 1 ) 
                                    @if( isset($selected_pack->favorite) && $selected_pack->favorite == 1 )
                                        <img np="{{$_product->nparte}}" id="{{$selected_pack->id}}" class="add-to-fav pull-right heart liked" src="{{asset('heart2.svg')}}"/>   
                                    @else 
                                        <img np="{{$_product->nparte}}" id="{{$selected_pack->id}}" class="add-to-fav pull-right heart " src="{{asset('heart.svg')}}"/> 
                                    @endif  
                                    <!-- liked --> 
                             @else 
                                    <img class="pull-right heart" data-toggle="modal" data-target="#session" src="{{asset('heart.svg')}}"/>
                             @endif 
                        @else 
                        	        <img class="pull-right heart" data-toggle="modal" data-target="#session" src="{{asset('heart.svg')}}"/>
                        @endif 
					</div>
				</div>    
				<div class="line-info"> 
					<div class="col-lg-12 col-md-6 col-xs-12 content-price content-controls-mobil np">
						<div class="col-lg-6 col-xs-6 np">
							<p style="padding-top: 25px;">	
								<img id="pay-methods" style="width: 120px;" src="{{asset('media/pay.png')}}">
								<img src="https://begima.com.mx/Mercadopago-logo.png" style="width: 100px; padding-left: 10px;">
							</p>  
						</div>  
						
						@if( @session()->has('logueado') AND strlen(session()->get('logueado')) > 2 ) 
							@if ( session()->get('user')->grupo == '2' )
             						<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
										<span class="text-info info-price" style="text-decoration: line-through;">${{number_format($_product->price, 2, '.', ',') }}  MNX</span>
										<span class="text-info info-price">${{number_format($_product->precio_especial_1, 2, '.', ',') }}  MNX</span> 
									</div> 
							@elseif ( session()->get('user')->grupo == '3' )
             						<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
										<span class="text-info info-price" style="text-decoration: line-through;">${{number_format($_product->price, 2, '.', ',') }}  MNX</span>
										<span class="text-info info-price">${{number_format($_product->precio_especial_2, 2, '.', ',') }}  MNX</span> 
									</div> 
							@elseif ( session()->get('user')->grupo == '4' )
             						<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
										<span class="text-info info-price" style="text-decoration: line-through;">${{number_format($_product->price, 2, '.', ',') }}  MNX</span>
										<span class="text-info info-price">${{number_format($_product->precio_especial_3, 2, '.', ',') }}  MNX</span> 
									</div> 
							@elseif ( session()->get('user')->grupo == '5' )
             						<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
										<span class="text-info info-price" style="text-decoration: line-through;">${{number_format($_product->price, 2, '.', ',') }}  MNX</span>
										<span class="text-info info-price">${{number_format($_product->precio_especial_4, 2, '.', ',') }}  MNX</span> 
									</div> 
             					@else
             						<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
										<span class="text-info info-price">${{number_format($_product->price, 2, '.', ',') }} MNX</span>
									</div> 
          						@endif 
						@else 
							@if( $_product->check_promo == 1 )
								<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;">
									<span class="text-info info-price" style="font-size: 12px; text-decoration: line-through; padding-bottom: 0px;">${{number_format($_product->price, 2, '.', ',') }} MNX </span>
									<span class="text-info info-price" style="padding-top: 0px;">${{number_format($_product->precio_promocional, 2, '.', ',') }} MNX </span>
								</div>  
							@else 
								<div class="col-lg-6 col-xs-6 np" style="padding-top: 5px;"> 
									<span class="text-info info-price">${{number_format($_product->price, 2, '.', ',') }} MNX 
								</div>  
							@endif 
						@endif 

							@if($selected_pack->pzas_pack )
								<div class="col-lg-12 col-xs-12 np" style="padding-top: 5px;"> 
									<span class="text-info content-info info-price" style="font-weight: 700; font-family: 'Roboto Condensed', sans-serif;">Contiene {{$selected_pack->pzas_pack}} 
										@if($selected_pack->pzas_pack > 1) 
											Piezas
										@else 
											Pieza 
										@endif </span>  
								</div> 
							@endif 
							<div class="col-xs-12 hidden-lg hidden-md hidden-sm"> 
									<span style="font-weight: 700; font-size: 17px;"> {{$_product->title}} </span>
							</div>

					</div>  
					<div class="col-lg-12 col-md-8 col-xs-12 content-controls-mobil hidden-lg np"> 
						<div style="text-align: center; padding-top: 10px; font-size: 15px;">
							<button class="btn-to-add-mobil btn-add" id-np="{{$_np}}">AÑADIR AL CARRITO</button>
						</div>
					</div> 
					<div class="col-lg-12 col-md-12 hidden-xs" style="padding-top: 5px; padding-left: 0px; padding-bottom: 0px; ">
						<div class="col-lg-6 col-md-6">
							<!-- <img style="width: 140px; padding-top: 25px;" src="{{asset('media/pay.png')}}"> --> 
							<h4 class="in-stock" style="opacity: 0;">Existencia: <span id="cant-exist">1<!--{{$_product->existencia}}--></span></h4>
						</div>  
						<div class="col-lg-6 col-md-6">
						</div> 
					</div> 
					
					@if( $_product->existencia > 0 )  
						<div class="col-lg-12 col-xs-12 col-xs-12" style="padding-left: 0px; padding-top: 10px; padding-bottom: 10px;">

						<div class="col-lg-4 col-sm-4 col-xs-12 container-controls" style="padding-left: 0px;">
							<div class="col-lg-3 col-xs-4 container-input-cantidad" style="text-align: left; padding-left: 0px;">
								<span class="control-cantidad span-menos"> 
									- 
								</span>  
							</div>
							<div class="col-lg-6 col-xs-4" style="text-align: center; padding: 0px 5px;">
								<input class="input-cantidad" value="1" disabled="" name="">
							</div> 
							<div class="col-lg-3 col-xs-4 right-control" style="text-align: left; padding-left: 4px;">
								<span class="control-cantidad span-mas">
									+
								</span> 
							</div>
 						</div> 
 						<div class="col-lg-8 col-sm-8 " style="padding-bottom: 0px;">
 						</div> 

						</div>
					@else 
						<div class="col-lg-12 col-xs-12">
							<h2 style="color: red;">SIN EXISTENCIA</h2>
						</div>
					@endif  
					<div class="col-lg-12" style="padding: 5px 0px;">  
						</br> 

						<div class="col-xs-12 content-delivering"> 
							<p class="text-delivering">En la compra de $1,499.00 el envío es gratis 
								<img src="{{asset('/icons/delivery.svg')}}" style="width: 45px; padding-left: 5px;"></p>
						</div>
 						 
 						</div>
						<div class="col-lg-3 col-xs-4 np">  
							<input class="form-control cp" placeholder="CP" name="">
						</div>
						<div class="col-lg-3 col-xs-3 np">
							<button class="btn calcular">Calcular</button>
						</div> 
						<div class="col-lg-6 col-xs-5 np">
							<select class="form-control opciones-envio" style="font-size: 11px;">
							</select>
						</div>

						<script type="text/javascript">
							$('.calcular').click( function() {
								$('#overlay').fadeIn(); 
								let cp = $('.cp').val(); 
								$(".opciones-envio").html(''); 
								$.ajax({
									'url'     : "{{asset('skydropx')}}", 
									'method'  : 'POST',
									'data'    : {'cp' : cp}, 
									'success' : function( resp ) {
										$('#overlay').fadeOut(); 
										resp = JSON.parse(resp); 
										resp.forEach( function(a, b ) {
											$(".opciones-envio").append("<option value=' Paquetería "+a.total_pricing+"'>"+a.provider+" $"+a.total_pricing+" DÍAS: "+a.days+"</option>"); 
										}); 
									}
								}); 
							});  
						</script>

					</div> 
					<div class="col-lg-12"> 
						<hr style="margin: 5px;"/> 
					</div> 
				</div> 
				
				<div class="line-info" style="color: gray">
					 
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;">
					<div class="content-info-colors">
						<div class="header-content"><p>Colores</p></div>
						<div class="content-body">
							<div class="color-shape shape-red" style="background-color: red;"></div>
							<div class="color-shape shape-red" style="background-color: black;"></div>
							<div class="color-shape shape-red" style="background-color: white;"></div>
						</div>
					</div>
				</div>


				<style type="text/css">
					.tooltipCSS {
  position: relative;
  display: inline-block;
}

.tooltipCSS .tooltiptext {
  visibility: hidden;
  width: auto;  
  background-color: #ffffff;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 10px 20px;
  position: absolute;
  z-index: 1;
  border: 1px solid #e8e8e8;
  box-shadow: 2px 4px 8px 0px #d8d8d8;
}

.tooltipCSS .tooltiptext::after {
  content: "";
  position: absolute;
  border-width: 5px;
  border-style: solid; 
}

.tooltipCSS:hover .tooltiptext {
  visibility: visible;
}

/*TOOLTIP TOP*/
.tooltipTop{
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}
.tooltipTop::after {
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-color: black transparent transparent transparent;
}

/*TOOLTIP BOTTOM*/

.tooltipBottom{
  top: 150%;
  left: 50%;
  margin-left: -60px;

}
.tooltipBottom:after{
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-color: transparent transparent black transparent;
}

/*TOOLTIP RIGHT*/
.tooltipLeft{
  top: -5px;
  right: 140%;
}
.tooltipLeft::after {
  top: 50%;
  left: 100%;
  margin-top: -5px;
  border-color: transparent transparent transparent black;
}

/*TOOLTIP LEFT*/
.tooltipRight {
  top: -5px;
  left: 130%;
}
.tooltipRight::after {
  top: 50%;
  right: 100%;
  margin-top: -5px;
  border-color: transparent black transparent transparent;
}

 
				</style> 
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
					<div class="content-info-tallas">
						<div class="header-content"><p>TALLAS</p></div>
						<div class="content-body">
							@foreach($tallas as $talla)
							<div class="talla-unit tooltipCSS talla{{$talla->idtalla}}" idPaquete="{{$talla->idrelacion}}" onclick="seleccionarTalla('talla{{$talla->idtalla}}', {{$talla->idtalla}}, event)"> 
							 	{{$talla->name}} 
								<span class="tooltiptext tooltipTop">
									 {!!$talla->detalle!!} 
								</span>
							</div> 
						 	@endforeach 
						</div>
					</div>
				</div>

				<style type="text/css">
					.content-info-pack a:hover { text-decoration: none; }
					.pack-unit {
						display: inline-block; 
						width: 40px; 
						height: 40px; 
						border-radius: 4px; 
						border: 1px solid gray; 
						background-size: contain;
					    background-repeat: no-repeat;
					    background-position: center;
					}
					.color-pick {
						display: inline-block;
						height: 40px; 
						width: 40px; 
						padding: 0px; 
						border-radius: 50%;  
						background-size: cover; 
						background-position: center;
						border: 1px solid gray;
						margin-right: 5px; 
					}
					.color-pick:hover {
						cursor: pointer;
						border: 2px solid black;  
					}
					.color-selected {
						outline: 2px solid black;
					}
				</style>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
					<div class="content-info-pack">
						
						@if( $_product->tipo_producto == 'paquete')
							<div class="header-content"><p>PAQUETES</p></div>
							<div class="content-body">  
								@foreach( $packs as $pack )
									<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$pack->paquete}}">
										<div class="pack-unit" style="background-image: url('{{$pack->link}}')"></div>
									</a>
								@endforeach  
							</div>   
						@else
							<div class="header-content"><p>COLORES</p></div> 
							<div>
								@foreach( $colores as $key => $color )
									@if( $color->paquete == $pack )
										@if($color->tipo_color == 'color' )
											<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$color->paquete}}">
												<span class="color-pick color-selected" style="background-color: {{$color->alfa_color}}">
													
												</span> 
											</a> 
										@else
											<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$color->paquete}}">
												<span class="color-pick  color-selected" style="background-image: url('{{$color->url_textura}}')">
													
												</span>
											</a>
										@endif 
									@else 
										@if($color->tipo_color == 'color' )
											<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$color->paquete}}">
												<span class="color-pick" style="background-color: {{$color->alfa_color}}">
													
												</span>
											</a>
										@elseif($color->tipo_color == 'textura')
											<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$color->paquete}}">
												<span class="color-pick" style="background-image: url({{$color->url_textura}})">
													 
												</span>
											</a>
										@else 
											<a href="https://begima.com.mx/public/producto/{{$_np}}/pack/{{$key}}">
												<span class="color-pick" style="background-color: {{$color->alfa_color}}">
													
												</span>
											</a>
										@endif
									@endif 
								@endforeach 
							</div>
						@endif 
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-xs" style="padding: 30px 0px;">

					@if( $_product->existencia > 0 )
					 <div class="col-lg-6 col-md-7">
					 	<span class="btn-add" id-np="{{$_np}}">
			                   	<span>AÑADIR A LA BOLSA</span>
			            </span> 
					 </div>
					 <div class="col-lg-6 col-md-2">
					 	<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
					 	 <!-- <button class="btn btn-share">Compartir</button> --> 
					 </div> 
					 
					 @endif 

					 <!-- 
					 <div class="line-info fits-resume"> 
						<div class="col-lg-6 col-md-6"> 
							<span class="status-product">En existencia</span>
						</div>
						<div class="col-lg-6 col-md-6">  
							<span style="font-size: 18px; font-weight: 400; ">SKU: {{$_np}}</span>
						</div>
					</div> --> 

				</div>

				<style type="text/css">
					.description-show {
						cursor: pointer;
					}
					.control-descriptions { 
						cursor: pointer; 
						font-size: 30px; 
					}
				</style>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="content-info-description">
						<div class="header-content description-show" style="width: 100%">
							<p style="font-weight: 800;">DESCRIPCIÓN <span class="control-show control-descriptions pull-right">-</span></p> </div>
						<div class="content-body body-description"> 
							{!!$_product->descripcion_corta!!}
							 <!-- <p>Genero: {{$_product->genero}}</p>
							 <p>Composicion: {{$_product->composicion}}</p>
							 <p>Material: {{$_product->material}}</p>
							 <p>Tipo: {{$_product->tipo}}</p>
							 <p>Cantidad por paquete: {{$_product->cantidad}}</p> --> 
						</div>
					</div>
					<div class="content-info-description">
						<div class="header-content description-show-detail" style="width: 100%;">
							<p style="font-weight: 800;">DETALLES <span class="control-descriptions control-show-detail pull-right">+</span></p> </div>
							<div class="content-body body-description-detail" style="display: none;"> 
							{!!$_product->descripcion!!} 
							</div>
					</div>
				</div> 

				<style type="text/css">
					.talla-unit:hover{ cursor: pointer; }
					.selectedTalla {
						background-color: #a72d82; 
						color: white; 
						font-weight: bolder; 
					}
				</style>

				<div class="col-xs-12">
					@if( $ua == 'android' OR $ua == 'iphone' )
				 		<div class="container-opinions">
				 			<div class="header-opinions">
				 				<h1></h1>
				 			</div>
				 			<div class="body-opinions">
				 				<div class="raiting">
				 					<ul class="stars" style="padding-left: 0px;">
				 						<li>
				 							<label>Califícanos</label>
				 						</li>
				 						<li class="star-element"> 
				 							<img cant="1" src="{{asset('/media/raiting/star_after.png')}}">
				 						</li>
				 						<li class="star-element"> 
				 							<img cant="2" src="{{asset('/media/raiting/star_after.png')}}">
				 						</li>
				 						<li class="star-element"> 
				 							<img cant="3" src="{{asset('/media/raiting/star_after.png')}}">
				 						</li>
				 						<li class="star-element"> 
				 							<img cant="4" src="{{asset('/media/raiting/star_after.png')}}">
				 						</li>
				 						<li class="star-element"> 
				 							<img cant="5" src="{{asset('/media/raiting/star_after.png')}}">
				 						</li>
				 					</ul>
				 				</div>
				 				<p></p>
				 				<input id="comment-name" class="form-control" placeholder="Nombre: " type="" name="">
				 				<!-- <label>Déjanos tu comentario o pregunta</label> --> 
				 				<h2></h2>
				 				<textarea id="comment-opinion" rows="4" cols="50" p class="form-control" placeholder="Déjanos tu comentario o pregunta"></textarea>  
				 				<p></p>
				 				<button class="btn btn-primary pull-right" id="send-evaluation">Envíar</button>
				 			</div> 

				 		</div>
				 	@endif 
  
				</div> 
			</div>
		</div>
	</div>
 
	</div>



	<div class="products-section col-lg-12 col-md-12 col-xs-12"> 
		<div>
			<h3 style="font-weight: 900;">TAMBIÉN TE ENCANTARÁ</h3>
			{!! $_product->info !!}
		</div>
		<!-- 
		<div id="img-content-" style="display: inline-block; width: 200px; height:250px; border: 5px solid red;">
			<img style="height: auto; width: 120px;" src="https://http2.mlstatic.com/D_NQ_NP_944766-MLM41544293250_042020-O.webp">
		</div>  --> 
		<!-- 
		<div class="col-lg-12">
				<figure class="zoom" onmousemove="zoom(event)" style="background-image: url(//res.cloudinary.com/active-bridge/image/upload/slide1.jpg)">
					  <img src="//res.cloudinary.com/active-bridge/image/upload/slide1.jpg" />
					</figure>
		</div> --> 
		<style type="text/css">
			figure.zoom {
				  background-position: 50% 50%;
				  position: relative;
				  width: 500px;
				  overflow: hidden;
				  cursor: zoom-in; 
				}
				figure.zoom img:hover {
				  opacity: 0;
				}
				figure.zoom img {
				  transition: opacity 0.5s;
				  display: block;
				  width: 100%;
				}
		</style>

	</div>

	<div class="col-lg-12 col-xs-12 section-element">
		 	<div class="owl-carousel owl-theme list-recomendations" style="text-align: center;"> 
			@foreach( $slider2 as $product ) 
                <div class="item" style="text-align: center;"> 
                    <div style="text-align: center;"> 
                    	<div style="margin: 0px 5px; border-radius: 0px;">
                    		<div >
                    		</div>
                    		<a href="{{asset('producto')}}/{{$product->nparte}}/pack/0">   
                        		 <div class="recomendations-content" style="display: inline-block; width: 100%; background-image: url('{{$product->small_img}}');">  
                        		 	  
                        		 </div>   
                    		</a>
                        	<div class="controls-product">
                        		<div style="height: auto;">  
                        			<span class="recomendation-name">{{$product->title}}</span>
                        		</div>
                        		<div class="product-prices"> 
                        			 <span>$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                        		</div>
                        			 <!-- <span class="btn-add">
                        			 	<span>Agregar</span>
                        			 </span> -->  
                        	</div>
                    	</div>
                    </div> 
                </div>  
			@endforeach 
	 	      
    	</div> 
	</div>

  
</div>

<style> 
	@media ( min-width: 1500px ) {
		.list-recomendations {
			padding: 20px 5vw;
		}
	}
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>

<script>

	if( localStorage.getItem("fit") ) {
		$(".widget-search").html( localStorage.getItem("fit") ); 
	}

	function zoom(e){
  var zoomer = e.currentTarget;
  console.log( zoomer.getElementsByTagName('img')[0].src ); 
  zoomer.style.backgroundImage = 'url('+zoomer.getElementsByTagName('img')[0].src+')'; 
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX/zoomer.offsetWidth*100
  y = offsetY/zoomer.offsetHeight*100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}

function out(e){
  var zoomer = e.currentTarget;
  zoomer.style.backgroundImage = 'none'; 
} 

var options1 = {
    width: 100,
    zoomWidth: 20,
    offset: {vertical: 0, horizontal: 10}
};

// If the width and height of the image are not known or to adjust the image to the container of it
var options2 = {
    fillContainer: true,
    offset: {vertical: 0, horizontal: 10}
};
 
//new ImageZoom(document.getElementById("img-content-"), options2);
   
</script> 
 
<script type="text/javascript">
		let talla_seleccionada = 0; 

		function seleccionarTalla( talla, id ) {

			$('.selectedTalla').removeClass('selectedTalla'); 
			$("."+talla).addClass('selectedTalla'); 
			
			if( id == talla_seleccionada ) {
				talla_seleccionada = 0; 
			} else {
				talla_seleccionada = id; 
			}
			
			let idRelation = $(event.target).attr('idPaquete'); 
			$.ajax({ 
				'url'  : '{{asset("getCantByTalla")}}',  
				'data' : {'idRelation' : idRelation}, 
				'method' : 'POST', 
				'success' : function( response ) {  
					console.log( response );    
					$('#cant-exist').text(response);
					$('.in-stock').css('opacity', 1); 
				}  
			}); 
		} 
 
	  
		$('.description-show').click( function() {
			if( $('.control-show').html() == '+') {
				$('.body-description').slideDown(); 
				$('.control-show').html('-'); 
			} else {
				$('.body-description').slideUp(); 
				$('.control-show').html('+'); 
			}
		}); 

		$('.description-show-detail').click( function() {
			if( $('.control-show-detail').html() == '+') {
				$('.body-description-detail').slideDown(); 
				$('.control-show-detail').html('-'); 
			} else {
				$('.body-description-detail').slideUp(); 
				$('.control-show-detail').html('+'); 
			}
		}); 

	let galeria = null;

	function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  console.log(img);   
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;  
  cy = result.offsetHeight / lens.offsetHeight;
  console.log(cx); 
  console.log(cy); 
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
  	$('.img-zoom-result').css('opacity', '1');    
  	$('.img-zoom-result').css('z-index', '1');    
  	console.log('..'); 
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}

	$('document').ready( function() {


		$('.span-menos').click( function() {
			let cantidad = $('.input-cantidad').val(); 
			cantidad = parseInt( cantidad );
			if( cantidad > 1 ) {
				cantidad-=1; 
			}  
			$('.input-cantidad').val(cantidad); 
		}); 

		$('.span-mas').click( function() {
			let cantidad = $('.input-cantidad').val(); 
			cantidad = parseInt( cantidad ); 

			if( cantidad < parseInt( $('#cant-exist').text() ) ) {
				cantidad+=1;  
			} else {
				//alert("Selecciona una talla");  
				cantidad+=1;  
			}

			$('.input-cantidad').val(cantidad); 
		});  

		/* 
		 baguetteBox.run('.galeria', {
                // Custom options 
            });  */ 
 
		 // agregar al carrito 
		$('.btn-add-mobile').click( function() {
			var ncart = $('.input-cantidad').val();  
			$('.cant-cart').text( parseInt(ncart)+1 );
			$('#myModal').modal();
			$.ajax({
				'url' : '{{asset('addToCart')}}', 
				'method' : 'post',  
				'data' : { 'np' :  $(this).attr('id-np'), 
						   'cant': ncart, 
						   'talla' : talla_seleccionada } , 
				'success' : function( data ) {
					console.log( data ); 
				}  
			}); 
		}); 


		function effectToAdd() {
				  let cart = $('.container-images-slider');
				  // find the img of that card which button is clicked by user
				  let imgtodrag = $("#img-0").eq(0);
				  if (imgtodrag) {
				    // duplicate the img
				    var imgclone = imgtodrag.clone().offset({
				      top: imgtodrag.offset().top + $('html').scrollTop() + 200,
				      left: imgtodrag.offset().left + 200 
				    }).css({
				      'opacity': '0.8',
				      'position': 'absolute', 
				      'height': '150px',
				      'width': '150px',
				      'z-index' : '999999999', 
				    }).appendTo($('body')).animate({
				      'top': cart.offset().top - 80,
				      'left': cart.offset().left + window.innerWidth/1.28,
				      'width': 75,
				      'height': 75
				    }, 2500, 'easeInOutExpo');

				    
 
				    setTimeout(function(){
				      count++;
				      $(".cart-nav .item-count").text(count);
				    }, 1500);

				    imgclone.animate({
				      'width': 0,
				      'height': 0
				    }, function(){
				      $(this).detach()
				    });
				     
				  }
		}

		/* --- --- --- --- --- --- --- --- --- --- --- ---
		| AGREGAR AL CARRITO DE COMPRAS
		|- --- --- --- --- --- --- --- --- --- --- --- --- */
		$('.btn-add').click( function()
		{
			console.log('--- Agregar al carrito ---')

			/* 
			if( talla_seleccionada === 0 )
			{
				alert('Selecciona una talla')
				return
			} */ 

			let ncart = parseInt( $('.input-cantidad').val() )
			let ocant = parseInt($('#cant-exist').text())

			if( ocant === 0)
			{
				alert('Has seleccionado el número máximo de artículos disponibles')
				return
			}

			let existencia_final = ncart - ocant

			$('.cant-cart').text( parseInt( $('.cant-cart').text().trim() ) + ncart  )
			$('#cant-exist').text(existencia_final)

			$.ajax({
					'url'		: '{{ asset('addToCart') }}',
					'method'	: 'POST',
					'data'		:{
							'np'		: $(this).attr('id-np')
						,	'cant'		: ncart
						,	'talla'		: talla_seleccionada
						,	'pack'		: '{{$selected_pack->paquete}}'
						,	'exists'	: existencia_final
					}
				,	'success'	: function( data ){

					console.log('--- Agregar al carrito data ---', data)
					effectToAdd()
				}
			});
		});

		// Other stuffy stuffs
		$(".list-recomendations").owlCarousel({
                navigation : true, 
                autoHeightClass: 'owl-rec', 
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                 center: false,  
                 singleItem:false,  
                 items : 4,
                 autoplayTimeout:3000,
                 lazyLoad: true, 
                 autoHeight:true, 
                 responsive:{
                    0:{
                        items:3, 
                        nav:false
                    }, 
                    600:{
                        items:5,
                        nav:false, 
                        margin:25,
                    },
                    1000:{
                        items:5,
                        nav:true,
                        margin:25,
                    }
                   }}); 
                

		// slider imágenes del producto 
	 galeria = $(".list-owl-images").owlCarousel({
                navigation : true,
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: false,  
                 center: false,  
                 singleItem:false,  
                 items : 1,
                 autoplayTimeout:3000,
                 lazyLoad: true, 
                  autoHeight:true, 
                 responsive:{
                    0:{
                        items:1, 
                        nav:false
                    }, 
                    600:{
                        items:1, 
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:true,
                    }
                } 
            });

	 galeria.on('changed.owl.carousel', function(event) {
    		console.log( event.item.count ); 
    		console.log( event.type );  
    		console.log( event.page.index );
    		//imageZoom("img-"+event.page.index, "myresult"); 
    		//$('.img-zoom-result').css('opacity', '1'); 
    		$('.gallery-element-aside img').removeClass('img-selected'); 
    		$( $($('.gallery-element-aside')[event.page.index]).find('img') ).addClass('img-selected'); 

	})

	}); 

	$('.img-gall').hover( function( event ) {
		let id = $(event.target).attr('index');  
		console.log(id);  
		//$('.img-zoom-lens').remove(); 
		imageZoom("img-"+id, "myresult"); 
	}); 

	let index_gallery_main = 0; 

	$('.gallery-element-aside').click( function(event) {
		let number = $(event.target).attr('number');
		console.log( $(event.target).attr('number') ); 
		//number = number+1; 
		galeria.trigger('to.owl.carousel', number);  
	}); 
 

	 $('.container-prods').hover(function() {
	 	$('.img-zoom-result').css('opacity', '0'); 
	 	$('.img-zoom-result').css('z-index', '-1'); 
	 	//$('.img-zoom-lens').css('opacity', "0");
	 }); 

	 $('.products-section').hover(function() {
		$('.img-zoom-result').css('opacity', '0'); 
		$('.img-zoom-result').css('z-index', '-1'); 
		//$('.img-zoom-lens').css('opacity', "0");
	 }); 

</script>
 
 
 @endsection