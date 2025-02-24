@extends('layout') 


@section('page') 
<div class="section-element"> 
 	 <div class="col-lg-3 container-aside-left">
 	 	 @include('blocks-account/menu') 
 	 </div> 	   

   <!-- panel de contenido -->  
 	 <div class="col-lg-9 main-aside">
      @include('blocks-account/favoritos', ['favorites' => $favorites])
  </div>

 @endsection