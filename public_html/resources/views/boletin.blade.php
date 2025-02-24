@extends('layout') 

@section('page')

<style type="text/css">
	.nav-menu-header { display: block!important; }
</style>

<div class="container-fluid section-element" style="padding: 20vh 0px;">
 	<div class="col-lg-12 content-boletin" style="padding: 70px 100px">
 		<p style="font-size: 20px;"> 
 			¡Suscríbete a nuestro boletín y recibe las promociones antes que nadie! 
 		</p>
 		<div> 
 			<div>  			
 				<div class="col-lg-7 np">
 					<input class="form-control mail-form" placeholder="Correo electrónico" type="" name="">
 				</div>
 				<div class="col-lg-5">
 					<button class="btn btn-primary" id="sendform">Envíar</button>
 				</div>
 			</div>
 		</div>
 	</div>

 <script type="text/javascript">
 	$('#sendform').click(function() {
 		let mail = $('.mail-form').val(); 

 		let correo = false; 
 		if( mail.search("@") != -1 ) {
 			correo = true; 
 		}

 		$('#overtlay').fadeIn(); 
 		if( mail.length > 2 ) {
 			if( correo ) {
	 			$('.mail-form').val(""); 
		 		$.ajax({
		 			'url' : '{{asset('setboletin')}}', 
		 			'method' : 'post', 
		 			'data' : {
		 				'mail' : mail 
		 			}, 
		 			'success' : function(resp) {
		 				//alert(resp); 
		 				$('#overtlay').fadeOut(); 
		 				$('.content-boletin').html("<div style='text-align: center;'> <h1 style='color: #4caf50; font-weight: 900;'>¡Gracias por suscribirte!</h1></div>"); 
	 					//window.location.reload(); 
		 			}
		 		}); 
 			} else {
 				alert("Revisa el formato de tu correo"); 
 			}
 		} else {
 			alert("Coloca tu correo"); 
 		}
 	}); 
 </script>
 	  
 @endsection