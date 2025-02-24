@extends('layout') 

<style type="text/css">

	.nav-menu-header { display: block!important; }
	
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

	.hidden-map {
		display: none; 
	}
	.select-sucursal:hover {
		cursor: pointer;
		background-color: #EDEDED; 
		transition-property: all; 
		transition-duration: .2s; 
	}

	.desktop-mapa {
		padding-top: 70px; 
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
 					<!-- selected-map -->
 					@foreach( $sucursales as $sucursal )
	 					<li onclick="smyFunction('{{$sucursal->id}}')" class="select-sucursal">
	 						<h3>{{$sucursal->name}}</h3> 
	 						<p>{{$sucursal->direction}}</p> 
	 						<p>{{$sucursal->horarios}}</p>
	 						<button class="hidden-md hidden-lg btn btn-primary" onclick="changeMapsMobile('maps-mobile-{{$sucursal->id}}')">ver mapa</button>
	 						<div class="hidden-xs hidden-lg hidden-md maps-mobile-{{$sucursal->id}}">
			 		 			{!! $sucursal->googlemaps_mobile !!}
			 		 		</div> 
	 					</li>   
 					@endforeach  
 				</ul>
 			</div>
 		</div>

 		<?php
			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			$display = 'desktop'; 
	 	    
			if( strpos($ua, 'chrome')  !== false  ) $display  = "desktop";
			if( strpos($ua, 'android') !== false  ) $display = "movil"; 
			if( strpos($ua, 'mobile')  !== false  ) $display  = "movil";     
			if( strpos($ua, 'Android') !== false  ) $display = "movil"; 
			if( strpos($ua, 'iphone')  !== false  ) $display  = "movil";  
	 	?>

 		<div class="col-lg-6 col-xs-12 np">  
 			@foreach( $sucursales as $key => $sucursal )

 				@if( $key == 0 )
			 		<div class="hidden-xs col-lg-12 desktop-mapa sucursal-map mapa-{{$sucursal->id}}">
			 		 	<p>{{$sucursal->direction}} {{$sucursal->name}}</p>
			 		 		{!! $sucursal->googlemaps !!}
			 		</div>
 				@else  
 					<div class="hidden-xs col-lg-12 sucursal-map mapa-{{$sucursal->id}} hidden-map">
			 		 	<p>{{$sucursal->direction}} {{$sucursal->name}}</p>
			 		 	<div>
			 		 		{!!$sucursal->googlemaps!!}
			 		 	</div>
			 		</div>
 				@endif   

	 		@endforeach
 		</div>

 	</div>

<!-- Modal -->
<div id="maps-sucursal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding-top: 80px!important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mapa</h4>
      </div>
      <div class="modal-body"> 
        <div class="maps-content-modal">
        	
        </div>
      </div>
      <div class="modal-footer" style="display: none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


 <script type="text/javascript">
  	function changeMapsMobile( cs ) {
  		$('.maps-content-modal').html($('.'+cs).html()); 
  		$("#maps-sucursal").modal("toggle"); 
  	}

  	function smyFunction( mge ) { 
  		console.log( mge ); 
  		$('.sucursal-map').addClass('hidden-map'); 
  		$('.mapa-'+mge).removeClass('hidden-map'); 
  	}

  	 window.onscroll = function (e) {  
  	 	console.log( window.scrollY ); 
        if( window.scrollY > 50 ) { 
        }
    }
  
</script>
 	  
 @endsection