@extends('layout') 

@section('page')

<style type="text/css">
	.nav-menu-header { display: block!important; }
</style>
<div class="container-fluid" style="padding: 36vh 20px; text-align: center;">
	<div class="col-lg-12"> 
		<div class="col-lg-5" style="text-align: left; padding-top: 70px;"> 
		 	<h2>Este producto no esta disponible contactanos para habilitarlo</h2>
		</div> 
		<div class="col-lg-7"> 
		 	<img style="width:80%" src="{{asset('media/404-'.rand(1,2).'.jpg')}}"/>
		</div>
	</div>
</div>
 @endsection 