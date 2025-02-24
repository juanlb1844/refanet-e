@extends('layout') 

@section('page')

<style type="text/css">
	.nav-menu-header { display: block!important; }
</style> 
<div class="container-fluid" style="padding: 40vh 0px;">
 	<div class="col-lg-12" style="padding: 30px 100px; text-align: center;">
 		<h2>El producto que estás buscando ya no está disponible</h2>
 		<div> 
 			<a href="{{asset('index')}}">
 				<h3>Buscar un producto similar similar</h3>
 			</a>
 		</div>
 	</div>
 	  
 @endsection