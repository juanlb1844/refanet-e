@extends('layout') 

 
@section('page')
<div class="section-element"> 
 	 <div class="col-lg-3 container-aside-left">
 	 	@include('blocks-account/menu') 
 	 </div> 	   
 
   <!-- panel de contenido -->  
 	 <div class="col-lg-9 main-aside">
      @include('blocks-account/cuenta', ['title' => 'Hello'])
  </div> 


<script>  
	
      $('.save-user').click( function() {
      $("#overlay").fadeIn(300);　  
			var userMail     =  $('#user-mail').val(); 
			var userTel      =  $('#user-tel').val(); 
			var userName     =  $('#user-name').val(); 
			var userLastName =  $('#user-lastname').val(); 
			var userShiping  =  $('#user-shiping').val(); 
			var userBilling  =  $('#user-billing').val(); 
			var userCity     =  $('#user-city').val(); 
			var userState    =  $('#user-state').val(); 
			var userZip      =  $('#user-zip').val(); 

			$.ajax({
					'url'    : "{{asset('updateClient')}}", 
					'method' : 'post', 
					'data'   : {
						'userMail'     : userMail, 
						'userName'     : userName, 
						'userLastName' : userLastName, 
						'userShiping'  : userShiping, 
						'userBilling'  : userBilling, 
						'userCity'     : userCity, 
						'userState'    : userState, 
						'userZip'      : userZip, 
						'userTel'      : userTel 
					}, 
					'success' : function( resp ) {
						console.log( resp ); 
						window.location.reload(); 
					}
			}); 
		}); 
	
</script>



 @endsection