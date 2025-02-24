@extends('Admin.layout')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
	    	<style type="text/css">

        /* styles table */ 
        th { background-color: transparent!important; } 
        table { border: 0px!important; }
         
        table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
          background-color: transparent;
        }
        table.dataTable.display tbody tr.even>.sorting_1, table.dataTable.order-column.stripe tbody tr.even>.sorting_1 { background-color: transparent; }


        .grid-stack {
            background: lightgoldenrodyellow;
        }
        .grid-stack-item-content {
            color: #2c3e50;
            text-align: center;
            background-color: #eff3f6; 
            border: 2px solid #e5e5e5; 
            box-shadow: 1px 5px 9px 2px #e8edf1; 
        }
        .grid-stack-item-content {
			border-radius: 4px; 
			padding-top: 4px; 
			padding-left: 4px; 
		}
		.grid-stack {
			background-color: white;  
			
			padding-top: 20px!important; 
		}
		div {  
			transition-property: all!important; 
			transition-duration: .2s; 
		} 
    
    .container-header-section {
      padding-bottom: 40px;  
    }
    .container-header-section h1 { font-weight: 900; }

      
    .dataTables_length select { border-radius: 10px; width: 60px; padding: 4px 5px; }


    .span-status {
      background-color: #caf4df;
      padding: 2px 8px;
      border-radius: 5px;
      font-weight: bolder;
    }

    .span-status-inactive {
      background-color: #847979;
      color: white;
    }

    .span-status:hover {
      border: 1px solid black; 
    }

	</style>       
 
 
<link rel="stylesheet" href="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.min.css">
<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>

<div class="col-lg-10 col-md-10 col -sm-10 col-xs-12">
	<div class="panel-right">  
			<div class="col-lg-12 table-container" style="padding-top: 20px;">

                  <div class="container-header-section container-fluid np-l np-r">
                    <div class="col-lg-4 np-l">
                      <h1 class="pull-left">PRODUCTOS</h1>                       
                    </div>
                    <div class="col-lg-8">
                      <div class="col-lg-6">
                        <!-- 
                        <span class="title-field">Filtrar por categoría</span>
                        <select class="form-control">
                          @foreach ( $categories as $categoria )
                            <option value="{{$categoria->id}}">{{$categoria->title}}</option>
                          @endforeach   
                        </select> --> 
                      </div> 
                      <div class="col-lg-6" style="padding-top: 20px;">
                        <a href="{{asset('editProduct/65659?new=true')}}">
                          <button class="btn btn-primary pull-right">Nuevo producto</button>
                        </a>
                      </div>
                    </div> 
                  </div> 

                  <style> 
                  	.filters { 
                  		border: 1px solid #dfdfdf;
                  		border-radius: 7px;
                  		margin-bottom: 40px;
                  		padding: 20px 0px; 
                  		box-shadow: 0 0.5rem 0.75rem -0.25rem rgb(39 48 54 / 5%);
                  		background-color: #f3f4f5; 
                  	} 
                  	.tc { text-align: center; }
                  	.tl { text-align: left; }
                  	.check { transform: scale(1.5); }
                  	.btn-filter {
                  		background-color: #0099ff;
                  		color: white;
                  		border-radius: 7px!important;
                  	} 
                  </style>

                  <div class="col-lg-12 filters"> 
                  	<div class="col-lg-3 np"> 
                  		<label>Filtrar por categoría</label>
                  		<select class="form-control categorie-filter"> 
                  			@foreach( $categories as $cat )
                  				@if( $filters['by-selected'] == $cat->id )
                  					<option selected value="{{$cat->id}}">{{$cat->title}} ({{$cat->id}})</option>
                  				@else
                  					<option value="{{$cat->id}}">{{$cat->title}} ({{$cat->id}})</option>
                  				@endif   
                  			@endforeach 
                  		</select> 
                  	</div>
                  	<div class="col-lg-2 tc"> 
                  		<p style="padding: 0px; margin: 0px;"><label>&nbsp;</label></p>
                  		<button class="btn btn-filter btn-show-all" style="font-weight: bolder">Ver todo</button>
                  	</div> 
                  	<div class="col-lg-1 tc"> 
                  		<p style="padding: 0px; margin: 0px;"><label>Imágenes</label></p>
                  		@if( $filters['imgs'] ) 
                  			<input store="imgs" class="check" checked type="checkbox" />
                  		@else 
                  			<input store="imgs" class="check" type="checkbox" />
                  		@endif 
                  	</div> 
                  	<div class="col-lg-1 tc"> 
                  		<p style="padding: 0px; margin: 0px;"><label>Categorías</label></p>
                  		@if( $filters['cats'] ) 
                  			<input store="cats" class="check" checked type="checkbox" />
                  		@else 
                  			<input store="cats" class="check" type="checkbox" />
                  		@endif                   		
                  	</div>
                  	<div class="col-lg-2 tc"> 
                  		<p style="padding: 0px; margin: 0px;"><label>Los últimos 40 subidos</label></p>
                  		@if( $filters['last'] ) 
                  			<input store="last" class="check" checked type="checkbox" />
                  		@else 
                  			<input store="last" class="check" type="checkbox" />
                  		@endif 
                  	</div>
                  	<div class="col-lg-3 tl"> 
                  		<p style="padding: 0px; margin: 0px;"><label>Buscar por SKU</label></p>
                  		<div class="input-group">
					      <input type="text" class="form-control search-np" value="{{$filters['np']}}" placeholder="">
					      <span class="input-group-btn">
					        <button class="btn btn-default search-by-nparte" style="background-color: #0099ff; color: white;" type="button">BUSCAR</button>
					      </span>
					    </div>
                  	</div>
                  </div> 


                    <table id="example" class="display" style="width:100%">
                        <thead> 
                            <tr>
                                <th></th>
                                @if( $filters['imgs'] ) 
                                	<th>IMG</th>
                                @endif 
                                <th style="width: 170px;">CÓDIGO</th>
                                <th>TÍTULO</th>
                                <th>PRECIO</th> 
                                @if( $filters['cats'] ) 
                                	<th>CATEGORIA</th>
                                @endif 
                                <th>ESTATUS</th>
                                <th>VER</th> 
                                <th>PROMO</th>
                                <th>EXISTENCIA</th>
                            </tr>
                        </thead>  
                        <tbody> 
                            @foreach($productos as $producto)
                                <tr>
                                    <td>
                                     <input sku="{{$producto->nparte}}" type="checkbox" name=""> 
                                    </td> 
                                    @if( $filters['imgs'] ) 
	                                    <td>
	                                        <span><img style="width: 80px;" src="{{$producto->small_img}}"></span>
	                                    </td> 
	                                @endif 
                                    <td>
                                        <span style="font-weight: bolder;">{{$producto->nparte}}</span>
                                    </td>
                                    <td>
                                        <span>{{$producto->title}}</span>
                                    </td>
                                    <td>
                                        <span class="label label-success" style="background-color: #caf4df; color: #4abf83; font-size: 11px; border-radius: 7px;">${{$producto->price}}</span>
                                    </td>
                                    @if( $filters['cats'] ) 
	                                    <td>
	                                        <span>{{$producto->categoriabase}}</span>
	                                    </td>
                                    @endif 
                                    <td> 
                                        @if( $producto->status_post == 1 ) 
                                          <span onclick="inactivateProduct('{{$producto->nparte}}')" class="span-status sku-{{$producto->nparte}}">Activo</span> 
                                        @else 
                                          <span onclick="activateProduct('{{$producto->nparte}}')" class="span-status span-status-inactive sku-{{$producto->nparte}}">Inactivo</span>
                                        @endif  
                                    </td>
                                    <td>
                                        <button onclick="showProduct('{{$producto->id}}')" class="btn btn-primary">VER</button>
                                    </td>  
                                    <td>
                                      <!-- <button class="list-categories-add btn btn-primary">ASIGNAR</button> --> 
                                      @php 
                                        $e = false; 
                                      @endphp 
                                      @foreach( $producto->categorias as $cat )
                                        @if( $cat->id_categoria == 824 )
                                          @php $e = true @endphp
                                        @endif 
                                      @endforeach 
                                      @if($e)
                                       <span onclick="activatePromo(0, '{{$producto->id}}', 824, 'promo')" class="span-status promo-{{$producto->id}}">Promo</span>
                                      @else 
                                       <span onclick="activatePromo(1, '{{$producto->id}}', 824, 'promo')" class="span-status span-status-inactive promo-{{$producto->id}}">Promo</span>
                                      @endif 

                                        @php 
                                        $e = false; 
                                      @endphp  
                                      @foreach( $producto->categorias as $cat )
                                        @if( $cat->id_categoria == 826 )
                                          @php $e = true @endphp
                                        @endif  
                                      @endforeach 
                                      @if($e)
                                       <span onclick="activatePromo(0, '{{$producto->id}}', 826, 'new')" class="span-status new-{{$producto->id}}">Nuevos</span>
                                      @else 
                                       <span onclick="activatePromo(1, '{{$producto->id}}', 826, 'new')" class="span-status span-status-inactive new-{{$producto->id}}">Nuevos</span>
                                      @endif 
                                    </td>
                                    <td>
                                      <span class="span-status span-status-active">370</span>
                                    </td>
                                </tr> 
                            @endforeach  
                        </tbody>
                    </table> 
			</div>
      <p>&nbsp;</p>
 
 
	</div>
</div>

 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="width: 35%!important;">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Categorías <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
                <div class="collection-body borderless container-cats">
                  <ul class="body-cats">
                  </ul>
                </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary btn-save-cat" data-dismiss="modal">Guardar</button> --> 
      </div>
    </div>
  </div>

 <style type="text/css">
     .modal-backdrop {
        z-index: 99!important;
     } 
     #img-product {
        width: 100px;  
        display: inline-block;
     } 

     .element-gallery {
        height: 200px;
        width: 200px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        border: 1px solid gray;
        display: inline-block;
     }

     .modal-dialog {
  width: 80%!important;
  height: 80%!important;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
.status-photo {
    position: relative;
    left: -44%;
    transform: scale(2);
}  
 

 .list-group .list-group-item {
  border-radius: 0;
  cursor: move;
}

.list-group .list-group-item:hover {
  background-color: #f7f7f7;
}
 </style>
  

    <style type="text/css"> 

    .dz-default { margin-bottom: 0px!important; }
    .container-collection {
        background-color: #f7f8fa;
        border-radius: 7px; 
        border: 1px solid #eaeaea;
        padding: 20px 10px;
        overflow-x: auto; 
    }       
    .header-collection h4 {
      margin-top: 0px; margin-bottom: 5px; 
    } 

    /* */ 
    .borderless td, .borderless th, table {
        border: none!important;
     }
    
    .list-talla:hover {
      cursor: pointer;
      background-color: #d8d8d8; 
      padding: 4px 10px; 
      border-radius: 7px; 
    }

    .container-cats ul { padding-left: 10px;  }
    .cat-option:hover {
      cursor: pointer;
      font-weight: bolder; 
    }
    .addCat { background-color: #e2e2e2;
    padding: 0px 4px;
    border-radius: 4px; }
    .addCat:hover { cursor: pointer; background-color: #d4d4d4; }

    .label-success:hover {
      cursor: pointer;
      transform: scale(2);   
      background-color: red;    
    }

    .body-cats { padding-left: 10px; }
    .body-cats ul, .body-cats li {
      margin: 0px; 
    }
    .row-cont-gallerie { padding-top: 40px; }

    .attrsImg {
      padding: 1px 10px!important;
      background-image: url(https://begima.com.mx/public/icons/galeria.svg)!important;
      background-position: center!important;
      background-size: 15px!important;
      background-repeat: no-repeat!important;
    }
    .grid-square { padding: 2px!important; }
  </style>
</div>

 
<script type="text/javascript"> 
  function activatePromo(status, sku, cat, cls){
    status = 0; 
    if( $('.'+cls+'-'+sku).hasClass('span-status-inactive') ) {
      status = 1;
    }
    
    $('#overlay').fadeIn();
    $.ajax({
      'url' : '{{asset("addToPromos")}}', 
      'method' : 'post', 
      'data' : {
        'status' : status, 
        'sku' : sku, 
        'cat' : cat
      }, 
      'success' : function(resp) {
        $('#overlay').fadeOut();
        if( status == 0 ) {
          $('.'+cls+'-'+sku).addClass('span-status-inactive'); 
        } else {
          $('.'+cls+'-'+sku).removeClass('span-status-inactive');  
        }
      }
    });
  }
  function inactivateProduct(sku) {
    $('#overlay').fadeIn(); 
     $('.sku-'+sku).addClass('span-status-inactive'); 
    $('.sku-'+sku).html('Inactivo');  
    $.ajax({
      'url' : "{{asset('updateStautsProduct')}}", 
      'method' : 'post', 
      'data': {
        'sku' : sku, 
        'status' : 0
      }, 
      'success' : function(resp) {
        $('#overlay').fadeOut(); 
      }
    }); 
  }

  function activateProduct(sku) {
    $('.sku-'+sku).removeClass('span-status-inactive'); 
    $('.sku-'+sku).html('Activo');  
     $('#overlay').fadeIn(); 
     $.ajax({
      'url' : "{{asset('updateStautsProduct')}}", 
      'method' : 'post', 
      'data': {
        'sku' : sku, 
        'status' : 1
      }, 
      'success' : function(resp) {
         $('#overlay').fadeOut(); 
      }
    }); 
  }


  $('.list-categories-add').click( function() {
        $('#myModal').modal('show');  
      }); 
  
     function showProduct( id ) {
      window.location.href = 'editProduct/'+id; 
    } 


    function newSubCat( id, title ) {
     $('.list-categories').append('<span class="span-element cat-'+id+'" onclick="deleteThis(\''+id+'\')" idcat="'+id+'">'+ title +'</span>'); 
     $('.cat-option-'+id).css("font-weight", "900");  
  }

    window.onload = function() {

       $.ajax({
        'url' : "{{asset('getTreeCats')}}", 
        'method' : 'get', 
        'success' : function( resp ) {
          var resp = JSON.parse( resp ); 
          //console.log( resp ); 
          resp.forEach( function(item , key) {
            //console.log( item ); 
            var id = item.id; 
            var title = item.title; 
            var parent = item.id_parent; 
            if( item.id_parent == 0 ) {
              $('.body-cats').append('<li class="parent-cat-'+id+'"> <span class="addCat">+</span>'+ 
                                          '<span onclick="newSubCat(\''+id+'\',\''+title+'\')" class="cat-option cat-opt-tree cat-option-'+id+'">'+title 
                                        +'</span></li>'); 
            } else { 
              $('.parent-cat-'+item.id_parent).append('<ul class="parent-cat-'+id+' cant-opt-tree">'+
                                                            '<li><span class="addCat">+</span>'+
                                                            '<span onclick="newSubCat(\''+id+'\',\''+title+'\')" class="cat-option cat-opt-tree cat-option-'+id+'">'+'-'+title 
                                                                  +'</span></li></ul>'); 
            }
          }); 
        }
      });


    	$('.search-by-nparte').click(
    		 function() {
    		 	let np = $('.search-np').val(); 

    		 	if( np.trim().length < 1 ) return; 
    		 	let cat = $('.categorie-filter').val(); 
    		  	window.location.href = "https://begima.com.mx/productos2?filter="+cat+"&np="+np.trim()+getStatusFilters(); 
    		 }
    	); 

    	function getStatusFilters() {
    		let str_filters = ''; 
    		$('.filters input[type="checkbox"').each( 
    			function(a, b) { 
    				if( $(b).is(':checked') ) 
    					str_filters+= "&"+$(b).attr('store')+"=1"; 
    		} );  
    		return str_filters; 
    	}

    	$('.filters input[type="checkbox"').change( function() {
    		window.location.href = "https://begima.com.mx/productos2?filter="+$('.categorie-filter').val()+getStatusFilters(); 
    	}); 
		
		$('.categorie-filter').change( function( event ) {
			id = $(event.target).val(); 
			window.location.href =  "https://begima.com.mx/productos2?filter="+id+getStatusFilters(); 
		}); 

		$('.btn-show-all').click( function() {
			window.location.href = 'https://begima.com.mx/productos2?filter=all'+getStatusFilters(); 
		}); 	

        table = $('#example').DataTable({  
                                          columns : [ 
                                                      { title : ''}, 
                                                      @if( $filters['imgs'] ) 
                                                      { title : 'IMG'}, 
                                                      @endif 
                                                      { title : 'CÓDIGO'}, 
                                                      { title : 'TÍTULO'}, 
                                                      { title : 'PRECIO'}, 
                                                      @if( $filters['cats'] ) 
                                                      	{title : 'CATEGORÍA'}, 
                                                      @endif 
                                                      {title : 'ESTATUS'}, 
                                                      {title : 'VER'}, 
                                                      {title : 'ASIGNAR'}, 
                                                      {title : 'EXISTENCIA'} ], 
                                        "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                                        destroy: true, 
                                         //"order"    : [[ 0, "desc" ]], 
                                        "initComplete": function() { 
                                    } 
                            }); 

        

    }
</script>
 