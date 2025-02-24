<!DOCTYPE html>
<html>
<head>
	<title>List Odoo</title>
	<!-- Latest compiled and minified CSS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
	.content-search {
		min-height: 30vh; 
		text-align: center;
		padding-top: 10vh; 
	}
	.searchBtn {
		height: 40px; 
		padding: 5px 20px;
		border-radius: 21px; 
		border: 1px solid gray;
	}
	.searchInput {
		height: 35px; 
		border-radius: 12px; 
		border: 1px solid gray;
		width: 400px; 
		padding-left: 20px; 
	}

	.row-results {
		background-color: gray; 
		margin: 10px;
		padding: 10px 20px; 
		border-radius: 21px; 
	}
</style>

</head>
<body>
	
	<div class="container-fluid">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="content-search">
				<input class="searchInput" type="" name="">
				<button class="searchBtn">Buscar</button>
			</div>
			<div class="content-results">
				
			</div>
		</div>
	</div>
	<div class="container-fluid">
		
		<h1>Lista de productos Odoo</h1>
 
		<table>
			<thead>
				<th>sku</th>
				<th>categoría</th>
				<th>descripcion</th>
				<th>precio</th> 
				<th>
					 acciones
				</th> 
				<th>
					IMG 
				</th>
			</thead> 
			<tbody id="tbodyParts"> 
			</tbody>
		</table>

	</div>

<style type="text/css">
	img { width: 200px; }
</style>

<script type="text/javascript">

	/* 
	aplicacion
	aplicacion_text
	categoria
	cod_barras_proveedor
	descripcion
	estatus
	existencia
	familia
	marca_producto
	multiplo
	precio
	precio_frontera
	sku
	sku_equivalencia
	subcategoria
	*/ 
 

	$.ajax({
		"url" : "{{asset('getProductsOdoo/1')}}", 
		"method" : "get", 
		"data" : {}, 
		"success" : function( resp ) {
			resp = JSON.parse(resp); 
			resp.products.forEach( function( item, index ) { 
				console.log( item ); 
				let controls = "<td><button onclick='checkImg(\""+item.sku+"\")'>ver img</button></td><td class='img-"+item.sku+"' > <img class='img-"+item.sku+"'></td>";  
				let downloadAgain = "<td><button onclick='downLoadImg(\""+item.sku+"\")'>descargar</button></td>"; 
				$("#tbodyParts").append("<tr><td>"+item.sku+"</td><td>"+item.categoria+"</td><td>"+item.descripcion+"</td><td>"+item.precio+"</td>"+controls+downloadAgain+"</tr>");   
			});  
		}
	}); 

	function checkImg( sku ) {  
		url = "{{asset('dealers/morsa/')}}"; 
		$.ajax({
			"url" : "{{asset('searchImgInSite/')}}/"+sku, 
			"method" : "get", 
			"success" : function( resp ) {
				resp = JSON.parse(resp); 
				console.log( resp ); 
				if( resp.length > 0 ) {
					$(".img-"+sku).attr("src", url+"/"+resp[0]); 
				} else {
					alert("No existe"); 
				}
			}
		}); 
	}

	function downLoadImg( sku ) { 
		url = "{{asset('dealers/morsa/')}}"; 
		$.ajax({
			"url" : "{{asset('downLoadImgOne/')}}/"+sku, 
			"method" : "get", 
			"success" : function( resp ) { 
				alert( resp ); 
			}
		}); 
	}

	$(".searchBtn").click( function() {
		let sku = $(".searchInput").val(); 
		url = "{{asset('dealers/morsa/')}}"; 
			$.ajax({
				"url" : "{{asset('searchImgInSite/')}}/"+sku, 
				"method" : "get", 
				"success" : function( resp ) {
					resp = JSON.parse(resp); 
					console.log( resp ); 
					resp.forEach( function( itemImg, index) {
						if( resp.length > 0 ) { 
							img = "<img src='"+url+"/"+itemImg+"'>"
							row = "<div class='row-results'>"+img+"</div>"; 
							$(".content-results").append(row);  
						} else {
							alert("No existe"); 
						}
					}); 

				}
			}); 
		});  
</script>


</body>
</html>