@extends('layout') 

@section('page')

<style type="text/css">
	.nav-menu-header { display: block!important; }
	.container-form {
		padding: 40px 20vw; 
	} 
	.form-title {
		font-size: 20px; 
	}
</style>
 
<div class="container-fluid section-element" style="padding: 20vh 0px;">
 	<div class="col-lg-12 content-boletin">
 		<p style="font-size: 30px; text-align: center; font-weight: 900"> 
 			SOLICITA TU FACTURA AQUÍ
 		</p>
 		<div class="col-lg-12 container-form"> 
 			 <div class="col-lg-12">
 			 	<p class="form-title">Nombre fiscal</p>
 			 	<input class="form-control" type="" name="">
 			 </div>
 			 <div class="col-lg-12">
 			 	<p class="form-title">Dirección fiscal</p>
 			 	<input class="form-control" type="" name="">
 			 </div>
 			 <div class="col-lg-6">
 			 	<p class="form-title">Correo electrónico</p>
 			 	<input class="form-control" type="" name="">
 			 </div>
 			 <div class="col-lg-6">
 			 	<p class="form-title">RFC</p>
 			 	<input class="form-control" type="" name="">
 			 </div>
 			 <div class="col-lg-12">
 			 	<p class="form-title">ORDEN DE COMPRA (MercadoLibre)</p>
 			 	<input class="form-control" type="" name="">
 			 </div>
 			 <div class="col-lg-12"> 
 			 	<h2></h2>
 			 	<button class="btn btn-primary pull-right">enviar</button>
 			 </div>
 		</div>
 	</div> 
 
 @endsection