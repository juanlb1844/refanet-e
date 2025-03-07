<!DOCTYPE html>
<html> 
	<head>
	<title>Home - {{ $title ?? 'home' }} </title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.carousel.css')}}">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <meta name="google-site-verification" content="cPd6NSFA2Qap_ofGaxLLbwm3y84FN044laJcGndbBzE" />

  
	  <link rel="stylesheet" type="text/css" href="{{asset('libs/owl.theme.default.css')}}"> 
	  <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#5a308d">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#5a308d">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app_v2-status-bar-style" content="#5a308d">
    <meta name="google-site-verification" content="7e2o_bFfFTElz6JqYBJpMfe9Uaq7XcYHAKlxZnUSX2Q" />

    <!-- SWIPER --> 
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/> --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>


	</head> 
<body> 
  

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-3.3.7/dist/css/bootstrap.min.css')}}" crossorigin="anonymous">

    @yield('content', View::make('Bloques.header2', ['categories' => $newcats, 'mail_config' => $mail_config, 'phone_config' => $phone_config]))  
 
    @yield('page')
  
<?php //include('includes/footer.php') ?> 
@yield('content', View::make('Bloques.footer')) 
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --> 

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<style type="text/css">   
  @if( isset($color_text))
    .line-menu-main  {
      color: {{$color_text}}!important;
      font-weight: 400!important; 
    }
    .line-menu-main p {
      color: {{$color_text}}!important;
      font-weight: 400!important; 
    }
    .line-menu-main li a {
      color: {{$color_text}}!important;
      font-weight: 400!important; 
    }
  @endif 
	@if( isset($color_main))
    .swiper-pagination-progressbar-fill {
      background-color: {{$color_main}}!important; 
    }
    .swiper-button-prev {
      color: {{$color_main}}!important; 
    }
    .swiper-button-next {
      color: {{$color_main}}!important; 
    }
		.element-category img {
			border: 2px solid {{$color_main}}!important; 
		}
		.line-menu-main { 
			background-color: {{$color_main}}; 
		}
		.content-splash {
			border: 2px solid {{$color_main}}!important;
		}
		.owl-prev {
			background-color: {{$color_main}};
		}
		.owl-next {
			background-color: {{$color_main}};
		} 
		.menu-options { border-bottom: 1px solid {{$color_main}}!important;
    border-bottom: 1px solid #d7d7d7 !important; }
		/* CATEGORÍAS */ 
		.cat-element-content {
			background-color: {{$color_main}}!important;
		}
		.control-cantidad, .pagar {
			background-color: {{$color_main}};
		}

	@endif  
</style>

<script> 
	    window.ChatraSetup = {
		    colors: {
		        buttonText: '#ffffff', /* chat button text color */
		        buttonBg: '{{$color_main}}'    /* chat button background color */
		    }
		};
	</script>

<style type="text/css">

	.block-buscar {
		background: #2cb201;
		border-radius: 0px; 
		font-weight: bolder; 
		font-size: 20px; 
	}

.form-inline .form-control { 
    display: inline-block;
    width: auto;
    vertical-align: middle;
    height: 40px;
    border-radius: 1px; 
}
.container-seleccionar-vehiculo {
 	transition-property: all; 
 	transition-duration: .2s; 
 }
 .selected-car {
 	transition-property: all; 
 	transition-duration: .2s; 
 	transform: scale(1.7); 
 }
 .unidad>div {
 	height: 200px; 
 }
 .selector-anio {
 	opacity: 0; 
 	transition-property: all; 
 	transition-duration: .2s; 
 }
  .container-seleccionar-vehiculo .owl-dots {
  	display: none; 
  }
  .back-to-marca:hover {
  	cursor: pointer;
  }
  .powerbanners-container:parent {
  	display: none!important; 
  }
  .col-main {
  	margin: 10px!important;
  }
  .caret {
  	padding-left: 0px!important;
    color: #131313!important;
  }
</style> 

 <style type="text/css">
    
    /* 
 * Show the last image by default
*/
  .content-img-product:last-of-type {
  opacity: 1;
  transition: opacity 0.5s ease-in-out;
  -moz-transition: opacity 0.5s ease-in-out;
  -webkit-transition: opacity 0.5s ease-in-out;
}
/* 
 * Hide the last image on hover
*/

.pack-bullet {
  background-color: black; 
  color: white; 
  position: absolute;
  z-index: 9999;
  border-radius: 4px; 
  padding: 0px 7px; 
  font-weight: bolder; 
  bottom: 10px; 
  left: 5px;
  font-size: 14px; 
}


.owl-nav .owl-next, .owl-nav .owl-prev {
        position: absolute;
        top: 45%!important;
        transform: translateY(-50%)!important;
        -webkit-transform: translateY(-50%)!important;
    }
    .owl-nav .owl-next {
        right: 0;
        display: flex;
        margin-right: 2%;
        font-size: 30px!important;
    }
    .owl-nav .owl-prev{
        left: 0;
        display: flex;
        margin-left: 2%;
        font-size: 30px!important;
    }
.list-products .owl-nav .owl-next, .owl-nav .owl-prev { top: 35%!important; }


.swiper-wrapper {
  min-height: 60vh!important; 
}
 </style>

 
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div> 
 
 

 
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript">
 
   $(".list-products").owlCarousel({
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                center: false,  
                margin: 25, 
                singleItem: false,  
                items : 1,  
                pagination : true,
                slideBy: 4, 
                dotsEach : 4, 
                autoplay: false,
                autoplayTimeout:3000,
                lazyLoad: true, 
                navigation : true, 
                 responsive:{
                    0:{
                        items:2, 
                        nav:true, 
                        dots: false
                    }, 
                    600:{
                        items:1,
                        nav:true, 
                        dots: false 
                    },
                    1000:{
                        items:5, 
                        nav:true, 
                        navigation : true, 
                        dots: true 
                    }
                } 
            });


  var owl = jQuery(".owl-banners").owlCarousel({
 			      dots : true, 
            navigation : true,
            slideSpeed : 2000,
            paginationSpeed : 2000,
            loop: true, 
            center: true, 
            singleItem:true, 
            items : 1,   
            autoplay: true,
            autoplayTimeout:4000,
            lazyLoad: true,  
            items:1,
            margin:30,
            stagePadding:30,
            smartSpeed:450, 
             responsive:{
                0:{
                    items:1, 
                    nav:false,
                    dots : true,  
                    autoplay: false,
                },
                600:{
                    items:1, 
                    nav:false, 
                    dots : true, 
                },
                1000:{
                    items:1, 
                    dots : true,  
                    nav:false,
                }
            }  
        });  

 
 


$(".list-brands").owlCarousel({
                navigation : true,
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                center: false,  
                singleItem:false,  
                items : 1,
                margin:100,
                stagePadding: 50,
                autoplay: true, 
                autoplayTimeout:3000,
                lazyLoad: true, 
                 responsive:{
                    0:{ 
                        items:3, 
                        nav:true, 
                        dots: false, 
                         navigation : true
                    }, 
                    600:{
                        items:3,
                        nav:true, 
                        dots: false, 
                         navigation : true
                    },
                    1000:{
                        items:6,
                        nav:true,
                        navigation : true
                    }
                } 
            });

    
 
  /* 
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });

  */ 
  /* 
  var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        effect: "cube",
        grabCursor: true,
        cubeEffect: {
          shadow: true,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
  */ 

  /* 
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "coverflow",
        loop: true, 
         slidesPerView: "auto",
        grabCursor: true,
           coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      }); */ 


      /* 
         var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "flip",
        loop: true,  
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      }); */ 
     @if( isset( $sliderMain[0] ) )
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
         keyboard: {
          enabled: true,
        },
      
        @if( $sliderMain[0]->timer == 1 )
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
          },
        @endif 
        @if( $sliderMain[0]->autoplay == 1 )
          autoplay: { 
            delay: {{$sliderMain[0]->time}},
          }, 
        @endif 
        lazy: true,
        autoHeight: true,
        loop: true, 
        @if($sliderMain[0]->type_t == 1 ) 
          effect: "creative"
          ,creativeEffect: {
          prev: {
            shadow: true,
            translate: [0, 0, -400],
          }, 
          next: {
            translate: ["100%", 0, 0],
          },
        }, 
        @elseif($sliderMain[0]->type_t == 2 ) 
        effect: "creative",
          creativeEffect: {
          prev: {
            shadow: true,
            translate: ["-120%", 0, -500],
          },
          next: {
            shadow: true,
            translate: ["120%", 0, -500],
          },
        },
        @elseif($sliderMain[0]->type_t == 3 ) 
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            translate: ["-20%", 0, -1],
          },
          next: {
            translate: ["100%", 0, 0],
          },
        },
        @elseif($sliderMain[0]->type_t == 4 ) 
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            translate: [0, 0, -800],
            rotate: [180, 0, 0],
          },
          next: {
            shadow: true,
            translate: [0, 0, -800],
            rotate: [-180, 0, 0],
          },
        },
        @elseif($sliderMain[0]->type_t == 5 ) 
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            translate: ["-125%", 0, -800],
            rotate: [0, 0, -90],
          },
          next: {
            shadow: true,
            translate: ["125%", 0, -800],
            rotate: [0, 0, 90],
          },
        },
        @elseif($sliderMain[0]->type_t == 6 ) 
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            origin: "left center",
            translate: ["-5%", 0, -200],
            rotate: [0, 100, 0],
          },
          next: {
            origin: "right center",
            translate: ["5%", 0, -200],
            rotate: [0, -100, 0],
          },
        },
        @elseif($sliderMain[0]->type_t == 7 ) 
          effect: "flip",
        @elseif($sliderMain[0]->type_t == 8 ) 
         effect: "cube",
        grabCursor: true,
        cubeEffect: {
          shadow: true,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
        @elseif($sliderMain[0]->type_t == 9 ) 
          effect: "flip",
          grabCursor: true,
        @endif
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    @endif 

 
    @if( isset( $sliderMain[0] ) && false ) 
		   $(".list-banners").owlCarousel({
                navigation : true,
                slideSpeed : 2000, 
                dotsEach: true,
                paginationSpeed : 2000,
                loop: true,  
                 center: false,  
                singleItem:false,  
                items : 1,
                @if( $sliderMain[0]->autoplay == '1' )
                	autoplay: true, 
                @else 
                	autoplay: false,
                @endif 
                autoplayTimeout: {{$sliderMain[0]->time}},
                lazyLoad: false, 
                animateOut: "slideOutDown",
               animateIn: "slideInDown", 
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
 	@endif 
    

   $(".list-banners-m").owlCarousel({
                navigation : true,
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                center: false,  
                singleItem:false,  
                items : 1,
                autoplay: true,
                autoplayTimeout:3000,
                lazyLoad: true, 
                 responsive:{
                    0:{
                        items:1, 
                        nav:false,  
                        dots: true,
                    }, 
                    600:{
                        items:1,
                        nav:true,
                        dots: true
                    },
                    1000:{
                        items:1,
                        nav:true,
                        dots: true
                    }
                } 
            }); 

 
</script>



</body>

</html>