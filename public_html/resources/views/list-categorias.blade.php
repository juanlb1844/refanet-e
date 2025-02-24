@extends('layout') 

<style type="text/css">
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
</style>
	

<style type="text/css">
	.cat-base {
		height: 200px; 
		background-color: gray; 
		border-radius: 20px;
		background-image: url("https://img.ltwebstatic.com/images3_ach/2021/07/09/1625823488962bb6f1e0879bb10ed6523c55c8fef9.jpg"); 
		background-size: cover; 
	}
	.cat-son {
		height: 200px; 
		background-color: gray; 
		border-radius: 10px;
		background-image: url("https://img.ltwebstatic.com/images3_pi/2020/04/24/15877083493eb8661a43ade719c7c71e9c6bf993a4_thumbnail_405x552.webp"); 
		background-size: cover;
	}
	.container-title-base {
		padding-top: 40px; 
		padding-left: 20px; 
	}
	.title-base {
		font-size: 30px; 
		font-weight: 900; 
		color: white; 
	}
	.cat-son-title {
		font-size: 25px; 
		color: white;
		font-weight: 900; 
	}
	.son-cat-title {
		padding-top: 20px; 
		padding-left: 20px;  
	}
</style>

@section('page')
<div class="container-fluid" style="padding: 0px;">
 	<div class="col-lg-12" style="padding: 30px 100px">
 		<div class="col-lg-12 sidebar-donde-estamos">
 			<div class="container-title">
 				<span>Encuentra lo que buscas</span> 
 			</div> 
 			 
 		</div>

 		<div class="col-lg-12 sidebar-donde-estamos">
 			<div class="col-lg-6">
 				<div class="cat-base">
 					<div class="container-title-base">
 						<span class="title-base">ROPA DAMA</span>
 					</div>
 				</div>
 			</div> 
 		</div> 
 		<div class="col-lg-12 sidebar-donde-estamos">
 			<div class="col-lg-3">
 				<div class="cat-son">
 					<a href="https://begima.com.mx/catalogo/pijamas">
	 					<div class="son-cat-title">
	 						<span class="cat-son-title">Pijamas</span>
	 					</div>
 					</a>
 				</div>
 			</div> 
 			<div class="col-lg-3">
 				<div class="cat-son">
 					
 				</div>
 			</div> 
 			<div class="col-lg-3">
 				<div class="cat-son">
 					
 				</div>
 			</div> 
 			<div class="col-lg-3">
 				<div class="cat-son">
 					
 				</div>
 			</div> 
 		</div>
 	 

 	</div>


 <script type="text/javascript">
	window.onload = function() { 
		
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
}  
</script>
 	  
 @endsection