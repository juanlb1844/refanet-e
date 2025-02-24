<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

	<title></title>
</head>
<body>

	<button class="btn" id="btn">Odoo</button>


	<script type="text/javascript"> 
		 
		 $("#btn").click( function() { 
			 url = "{{asset('getProductsOdoo')}}/1";  

			 $.ajax({ 
	                "url" : url, 
	                "method" : "get",  
	                "data" : {
	                    "toSearch" : "FILTROS"
	                },   
	                "success" : function resp( resp ) {
	                	resp = JSON.parse(resp); 
	                	console.log( resp ); 
	                }
	            }); 
		 }); 
	</script>
 	
</body>
</html>