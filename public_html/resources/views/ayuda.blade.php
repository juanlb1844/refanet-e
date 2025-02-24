@extends('layout') 

<link rel="stylesheet" type="text/css" href="{{asset('/css/pages/ayuda.css')}}">
 
 
@section('page')
<div class="container-fluid container-page section-element">
 	<div class="col-lg-12 col-xs-12 content-page"> 
 		{!! $page->content !!} 
 	</div>
 @endsection