<!DOCTYPE html>
<html> 
	<head>
		<title>Uniformes de Luna - {{ $title ?? 'Uniformes de Luna' }} </title>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.carousel.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.theme.default.css')}}"> 
		<meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#5a308d">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#5a308d">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#5a308d">
    <meta name="google-site-verification" content="7e2o_bFfFTElz6JqYBJpMfe9Uaq7XcYHAKlxZnUSX2Q" />
	</head> 
<body> 
 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    @yield('content', View::make('Bloques.header2', ['categories' => $newcats])) 
 
    @yield('page')
  
<?php //include('includes/footer.php') ?> 
@yield('content', View::make('Bloques.footer')) 
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>

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
    .container-item {
        display: flex;
        height: 350px;
        width: 100%;
    }
     .content-img-product {
      position: absolute;
    }
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
.container-item:hover > div:last-of-type {
  opacity: 0;
}
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
 </style>

 
 <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div> 
 

    <style type="text/css">
  #overlay{ 
  position: fixed;
  top: 0;
  z-index: 99999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>


<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript">
 
  var owl = jQuery(".owl-banners").owlCarousel({
 			      dots : true, 
            navigation : true,
            slideSpeed : 2000,
            paginationSpeed : 2000,
            loop: true, 
            center: true, 
            singleItem:true, 
            autoHeight:true, 
            items : 1,
            autoplay: false,
            autoplayTimeout:4000,
            lazyLoad: true,  
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
                autoplay: true,
                autoplayTimeout:3000,
                lazyLoad: true, 
                 responsive:{
                    0:{
                        items:3, 
                        nav:true, 
                        dots: false
                    }, 
                    600:{
                        items:1,
                        nav:true, 
                        dots: false 
                    },
                    1000:{
                        items:6,
                        nav:true,
                    }
                } 
            });

   $(".list-products").owlCarousel({
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                center: false,  
                margin: 25, 
                singleItem: false,  
                items : 1, 
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
                        items:6,
                        nav:true,
                    }
                } 
            });

   $(".list-banners").owlCarousel({
                navigation : true,
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                 center: false,  
                singleItem:false,  
                items : 1,
                autoplay: false,
                autoplayTimeout:3000,
                lazyLoad: false, 
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
                        dots: true
                    }, 
                    600:{
                        items:1,
                        nav:false,
                        dots: true
                    },
                    1000:{
                        items:1,
                        nav:true,
                        dots: true
                    }
                } 
            }); 



 var owl = jQuery(".owl-sli").owlCarousel({
 			dots : true, 
            //navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
           // loop: true, 
            center: true, 
            singleItem:false, 
             autoHeight:true, 
            //items : 1,
            //autoplay: false,
            //autoplayTimeout:2000,
            lazyLoad: true, 
             responsive:{
                0:{
                    items:3, 
                    //nav:true, 
                    autoplay: false,
                },
                600:{
                    items:4,
                    nav:true
                },
                1000:{
                    items:6,
                    nav:true,
                }
            }
        });   

	var vehiculo_href = "vehiculo="; 

	jQuery(' .block-marca ').change( function( element ) {



		if( jQuery(element.target).val() == 'chevrolet') {

			jQuery(".block-modelo").removeAttr('disabled');  

			jQuery('.block-modelo').html(''); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "Camaro", "index" : "34"}, 

						{"modelo" : "Chevy", "index" : "231"},

						{"modelo" : "AGILE", "index" : "146"}, 

						{"modelo" : "ASTRA", "index" : "150"},  

						{"modelo" : "ASTRA 95/96", "index" : "357"},    

						{"modelo" : "ASTRA 99/", "index" : "356"},    

						{"modelo" : "ASTRO 2WD", "index" : "354"},   

						{"modelo" : "ASTRO AWD", "index" : "353"},

						{"modelo" : "ASTRO/SAFARI", "index" : "352"},   

						{"modelo" : "ASTRO/SAFARI (2WD)", "index" : "351"},    

						{"modelo" : "ASTRO/SAFARI (AWD)", "index" : "350"},

						{"modelo" : "AVALANCHE - 36 BODYSTYLE (2WD)", "index" : "345"},   

						{"modelo" : "AVALANCHE - 36 BODYSTYLE (4WD)", "index" : "344"}, 

						{"modelo" : "AVALANCHE 1500 - 36 BODYSTYLE (2WD)", "index" : "343"},   

						{"modelo" : "AVALANCHE 1500 - 36 BODYSTYLE (4WD)", "index" : "342"},     

						{"modelo" : "AVALANCHE 1500 2WD", "index" : "341"},      

						{"modelo" : "AVALANCHE 1500 4WD", "index" : "340"},

						{"modelo" : "AVALANCHE 2500 - 36 BODYSTYLE (4WD)", "index" : "339"},    

						{"modelo" : "AVALANCHE 2500 2WD", "index" : "338"},     

						{"modelo" : "AVALANCHE 2500 4WD", "index" : "337"},   

						{"modelo" : "AVALANCHE 2500 LS 4WD", "index" : "336"},    

						{"modelo" : "AVALANCHE 2500 LT 4WD", "index" : "335"},     

						{"modelo" : "AVALANCHE/ESCALADE EXT - 36 BODYSTYLE (4WD/AWD)", "index" : "334"},      

						{"modelo" : "AVEO", "index" : "32"},       

						{"modelo" : "AVEO HATCHBACK (CANADA AND US)", "index" : "333"},    

						{"modelo" : "AVEO HATCHBACK (NON CANADA AND US)", "index" : "332"},   

						{"modelo" : "AVEO SEDAN (CANADA AND US)", "index" : "331"},   

						{"modelo" : "AVEO SEDAN (NON CANADA AND US)", "index" : "330"}, 

						{"modelo" : "AVEO/SONIC - EUROPE", "index" : "329"},  

						{"modelo" : "AVEO/SONIC - LAAM", "index" : "328"},   

						{"modelo" : "BERETTA", "index" : "326"},  



						{"modelo" : "BLAZER", "index" : "130"},     

						{"modelo" : "BLAZER 2WD", "index" : "325"},

						{"modelo" : "BLAZER 4WD", "index" : "324"},

						{"modelo" : "BLAZER TRAILBLAZER 2WD    ", "index" : "123"},

						{"modelo" : "BLAZER TRAILBLAZER 4WD", "index" : "122"},

						{"modelo" : "BLAZER/JIMMY (2WD)", "index" : "121"},

						{"modelo" : "BLAZER/JIMMY (4WD) ", "index" : "120"},

						{"modelo" : "BLAZER/JIMMY (4WD/AWD) ", "index" : "119"},
 
						{"modelo" : "BLAZER/JIMMY - 16 BODYSTYLE (2WD)", "index" : "118"},

						{"modelo" : "BLAZER/JIMMY - 16 BODYSTYLE (4WD)", "index" : "117"},

						{"modelo" : "BLAZER/JIMMY/BRAVADA (4WD/AWD)", "index" : "116"},

						{"modelo" : "BLAZER/YUKON - 16 BODYSTYLE (4WD)", "index" : "115"},   

						

						

					  ];  



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



		} else if( jQuery(element.target).val() == 'buick' ) { 

			jQuery('.block-modelo').html('');  

			jQuery(".block-modelo").removeAttr('disabled'); 

			

			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "Enclave", "index" : "27"} 

					  ]; 



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



		} else if( jQuery(element.target).val() == 'cadillac' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 

			

			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "ATS", "index" : "105"}, 

						{"modelo" : "ALLANTE", "index" : "358"},  

						{"modelo" : "ATS", "index" : "105"},   

						{"modelo" : "ATS COUPE", "index" : "349"},    

						{"modelo" : "ATS SEDAN", "index" : "348"}, 

						{"modelo" : "ATS V-SERIES COUPE AND SEDAN", "index" : "347"},  

					  ]; 



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  





		} else if( jQuery(element.target).val() == 'gmc' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "Acadia", "index" : "85"}, 

						{"modelo" : "ACADIA (2WD)", "index" : "250"}, 

						{"modelo" : "ACADIA (2WD)(CARRYOVER MODEL)", "index" : "366"}, 

						{"modelo" : "ACADIA (AWD)", "index" : "365"}, 

						{"modelo" : "ACADIA (AWD)(CARRYOVER MODEL)", "index" : "364"}, 

						{"modelo" : "ACADIA (NEW MODEL)", "index" : "363"}, 

						{"modelo" : "ACADIA (NEW MODEL)", "index" : "363"}, 

						{"modelo" : "ACADIA/ENCLAVE (2WD)", "index" : "362"},  

						{"modelo" : "ACADIA/ENCLAVE (AWD)", "index" : "361"},   

						

					  ]; 



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'hummer' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "HUMMER H2", "index" : "679"} 

					  ]; 



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'oldsmobile' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "Aurora", "index" : "346"}, 

						{"modelo" : "88", "index" : "249"},   

						{"modelo" : "98", "index" : "248"},    

						{"modelo" : "98 REGENCY", "index" : "247"},

						{"modelo" : "ACHIEVA", "index" : "360"},

						{"modelo" : "ALERO", "index" : "359"}, 

						{"modelo" : "AURORA", "index" : "346"},  

					  ];  



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'pontiac' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "GRAND AM", "index" : "692"}, 

						{"modelo" : "6000", "index" : "246"}, 

						{"modelo" : "ASTRE", "index" : "355"},

						{"modelo" : "AZTEK", "index" : "327"},  

						{"modelo" : "BONNEVILLE", "index" : "314"},   // ultimo 

   

					  ];  



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'saab' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "9-7X", "index" : "218"} 

					  ];  



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'saturn' ) { 

			jQuery('.block-modelo').html(''); 

			jQuery(".block-modelo").removeAttr('disabled'); 



			modelos = [

						{"modelo" : "Seleccionar modelo", "index" : "0"}, 

						{"modelo" : "AURA", "index" : "73"}   

					  ];  



			modelos.forEach( function( element, i ) { 

					jQuery('.block-modelo').append( jQuery('<option/>').val( element.index ).text( element.modelo ) );

				});  



			//jQuery('.block-modelo').append( jQuery('<option/>').val('modelo').text('Modelo') );  

		} else if( jQuery(element.target).val() == 'marca' ) {  

			jQuery(".block-modelo").attr('disabled', "disabled"); 

		}

	});



	

	jQuery(' .block-modelo ').change( function( element ) { 

		jQuery(".block-anio").removeAttr('disabled'); 

		vehiculo_href += this.value; 

	} ); 



	jQuery(' .block-anio ').change( function( element ) { 

		jQuery(".block-categoria").removeAttr('disabled'); 

	} ); 

 
</script>



</body>

</html>