@extends('layout') 

<style type="text/css">

	.nav-menu-header { display: block!important; }
	
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

	.content-page {
		padding: 30px 100px!important;
	}
	.section-element {
		padding-top: 100px!important; 
	}

	@media( max-width: 600px ) { 
		.content-page {
			padding: 10px 15px!important; 
		}
		.section-element {
			padding-top: 70px!important; 
		}
	}

</style>

@section('page')
 
  @section('page')
<div class="container-fluid container-page section-element">
 	<div class="col-lg-12 col-xs-12 content-page"> 
 		 
 	</div> 
 	<div class="col-lg-12 col-xs-12" style="text-align: center;">
	 	<video autoplay id="vid" width="420" height="540" autoplay loop>
		   <source src="https://drive.google.com/uc?id=1cJUg2aweihkXx9382PXeYjNybv-iuM1U" type="video/mp4">
		</video>
 		
 	</div>


 	<script>
	window.onload = function() {
    	var video = document.querySelector('video');
		video.muted = true;
		video.play()
	}
</script>

 @endsection
 	  
 @endsection