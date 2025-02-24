@extends('layout') 

<style type="text/css">
	 html, body{ 
            font-family: 'Poppins'!important;   
            font-weight: 300; 
        }  

	/* sidebar */ 
	.sidebar-donde-estamos {
		padding-top: 40px; 
	}
	.sidebar-donde-estamos .container-title {
		font-size: 35px; 
		font-weight: 900; 
	}
	.selected-map h2 {
		font-weight: 900; 
	}
	.container-title {
		margin-bottom: 40px; 
	}

	/* ocultar sucursal */
	.ocultar-sucursal {
		display: none; 
	}

	.list-sucursales li h2:hover {
		font-weight: bolder; 
		cursor: pointer;
	}

	.section-element {
		padding-top: 220px;
	}
	.section-element{
			padding: 30px 100px
		}

	.section-element {  
			padding: 120px 0px!important;    
		}  

		@media( max-width: 600px ) {
			.section-element {   
			padding: 10px 0px!important;    
		}     
		hr { display: none; }
     	.sidebar-donde-estamos {  
			padding: 70px 0px!important;    
			padding-bottom: 10px!important; 
		}  
		.container-title span {
			font-size: 20px;  
		}
		.list-sucursales h2 {
			font-size: 17px;
		}
		.section-element{
			padding: 30px 10px
		}
	}
</style>  
	

@section('page')
<div class="container-fluid section-element">
 	<div class="col-lg-12 col-xs-12"> 
 		<div class="col-lg-6 col-xs-12 sidebar-donde-estamos">
 			<div class="container-title">
 				<span>Visítanos en las siguientes sucursales</span> 
 			</div>
 			<div class="list-sucursales">
 				<ul>
 					<li class="show-corona selected-map">
 						<h2>Begima Villa Corona</h2> <span>Horarios: Lunes a viernes de 9:00am a 6:00pm<br> Sábados de 9:00am a 3:00pm</span>
 					</li>
 					<li class="show-villa-acatlan"> 
 						<h2>Begima Acatlán</h2>
 					</li>
 					<li class="show-cocula-plaza">
 						<h2>Begima Cocula Plaza</h2>
 					</li>
 					<li class="show-cocula-uno">
 						<h2>Begima Cocula Uno</h2>
 					</li>
 					<li class="show-distribuidora-begima">
 						<h2>Distribuidora Begima</h2>
 					</li>
 					<li class="show-distribuidora-santa-ana">
 						<h2>Begima Outlet Santa Ana</h2>
 					</li>
 				</ul>
 			</div>
 		</div>

 		<?php
			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			$display = 'desktop'; 
	 	    
			if( strpos($ua, 'chrome') !== false ) $display = "desktop";
			if( strpos($ua, 'android') !== false ) $display = "movil"; 
			if( strpos($ua, 'mobile') !== false ) $display = "movil";     
			if( strpos($ua, 'Android') !== false ) $display = "movil"; 
			if( strpos($ua, 'iphone') !== false ) $display = "movil";  
	 	?>

 		<div class="col-lg-6 col-xs-12 np">  
	 		<hr>   
	 		<div class="sucursal-maps begima-villa-corona">
	 			@if( $display == 'movil' )   
	 				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7478.40171541715!2d-103.664847!3d20.415814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe0477b0e9e1fdab3!2sBoneteria%20%22El%20Lic%22!5e0!3m2!1ses-419!2smx!4v1641508681692!5m2!1ses-419!2smx" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
	 			@else   
	 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.2008653278435!2d-103.66703548507762!3d20.415813686333557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425fb3948e4343d%3A0xe0477b0e9e1fdab3!2sBoneteria%20%22El%20Lic%22!5e0!3m2!1ses-419!2smx!4v1626133422407!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 			@endif 
	 		</div>
 			
	 		<div class="sucursal-maps begima-villa-cocula-plaza ocultar-sucursal">

	 			@if( $display == 'movil' )   
	 				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3738.9723505681177!2d-103.60051551185492!3d20.425219000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425f91adedcbdbd%3A0x4016ed46428627e3!2sEl%20Descont%C3%B3n%20De%20Acatl%C3%A1n!5e0!3m2!1ses-419!2smx!4v1641509899996!5m2!1ses-419!2smx" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 			@else
	 				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467.3723050673821!2d-103.5989935!3d20.4249684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425f91adedcbdbd%3A0x4016ed46428627e3!2sEl%20Descont%C3%B3n%20De%20Acatl%C3%A1n!5e0!3m2!1ses-419!2smx!4v1627331111018!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 			@endif

	 		</div>
  
	 		<div class="sucursal-maps begima-villa-acatlan ocultar-sucursal">
	 			@if( $display == 'movil' )   
	 				 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7480.846529695899!2d-103.821685!3d20.365431!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb3e0f67af07b931b!2sBEGIMA%20COCULA%20PLAZA!5e0!3m2!1ses-419!2smx!4v1641510052905!5m2!1ses-419!2smx" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 			@else 
	 				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3740.4232745413874!2d-103.8238741!3d20.3654306!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425e76373ab72fb%3A0xb3e0f67af07b931b!2sBEGIMA%20COCULA%20PLAZA!5e0!3m2!1ses-419!2smx!4v1626133598360!5m2!1ses-419!2smx" width="100%" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 			@endif
	 		</div>

	 		<div class="sucursal-maps begima-cocula-uno ocultar-sucursal">
	 			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d935.1017988253847!2d-103.8227123!3d20.3660941!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425e73b274cff91%3A0xe48c9b28193a2eb9!2sBegima%20Cocula!5e0!3m2!1ses-419!2smx!4v1626133671210!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 		</div>

	 		<div class="sucursal-maps begima-distribuidora ocultar-sucursal">
	 		 	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.5167055174425!2d-103.43772128507437!3d20.607785286227976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adf98ca9156d%3A0x540877935253d7fa!2sDistribuidora%20Begima%20S.A.%20de%20C.V.!5e0!3m2!1ses-419!2smx!4v1626134280831!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 		 </div>

	 		 <div class="sucursal-maps begima-ana ocultar-sucursal">
	 		 	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d933.5493461319263!2d-103.452764!3d20.6208098!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2zMjDCsDM3JzE1LjIiTiAxMDPCsDI3JzA5LjYiVw!5e0!3m2!1ses-419!2smx!4v1638227660443!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
	 		 </div>

 		</div>

 	</div>


 <script type="text/javascript">
 
		
		$('.show-corona').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-villa-corona').removeClass('ocultar-sucursal');  
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-corona').addClass('selected-map'); 
		});  
		
		$('.show-villa-acatlan').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-villa-cocula-plaza').removeClass('ocultar-sucursal'); 
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-villa-acatlan').addClass('selected-map');
		});  

		$('.show-cocula-plaza').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-villa-acatlan').removeClass('ocultar-sucursal'); 
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-cocula-plaza').addClass('selected-map');
		});   

		$('.show-cocula-uno').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-cocula-uno').removeClass('ocultar-sucursal'); 
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-cocula-uno').addClass('selected-map');
		});    

		$('.show-distribuidora-begima').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-distribuidora').removeClass('ocultar-sucursal'); 
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-distribuidora-begima').addClass('selected-map');
		}); 

 
		$('.show-distribuidora-santa-ana').click( function() {
			$('.sucursal-maps').addClass('ocultar-sucursal'); 
			$('.begima-ana').removeClass('ocultar-sucursal'); 
			$('.list-sucursales ul li').removeClass('selected-map'); 
			$('.show-distribuidora-santa-ana').addClass('selected-map');
		});  
  
</script>
 	  
 @endsection