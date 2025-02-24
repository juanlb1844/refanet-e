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
 
                    <table id="example" class="display" style="width:100%">
                        <thead> 
                            <tr>
                                <th></th>
                                <th>IMG</th>
                                <th style="width: 170px;">CÓDIGO</th>
                                <th>TÍTULO</th>
                                <th>PRECIO</th> 
                                <th>CATEGORIA</th>
                                <th>ESTATUS</th>
                            </tr>
                        </thead>  
                        <tbody> 
                            @foreach($productos as $producto)
                                <tr onclick="showProduct('{{$producto->id}}')">
                                    <td>
                                     <input type="checkbox" name=""> 
                                    </td>
                                    <td>
                                        <span><img style="width: 40px;" src="{{$producto->img}}"></span>
                                    </td> 
                                    <td>
                                        <span style="font-weight: bolder;">{{$producto->nparte}}</span>
                                    </td>
                                    <td>
                                        <span>{{$producto->title}}</span>
                                    </td>
                                    <td>
                                        <span class="label label-success" style="background-color: #caf4df; color: #4abf83; font-size: 11px; border-radius: 7px;">${{$producto->price}}</span>
                                    </td>
                                    <td>
                                        <span>{{$producto->categoriabase}}</span>
                                    </td>
                                    <td>
                                        @if( $producto->status_post == 1 ) 
                                          <span class="span-status">Activo</span> 
                                        @else 
                                          <span class="span-status span-status-inactive">Inactivo</span>
                                        @endif 
                                    </td>
                                </tr> 
                            @endforeach  
                        </tbody>
                    </table> 
			</div>
      <p>&nbsp;</p>
 
 
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
  
</div>

 
<script type="text/javascript"> 
  
     function showProduct( id ) {
      window.location.href = 'editProduct/'+id; 
    } 

    window.onload = function() {
  

        table = $('#example').DataTable({  
                                          columns : [ 
                                                      { title : ''}, 
                                                      { title : 'IMG'}, 
                                                      { title : 'CÓDIGO'}, 
                                                      { title : 'TÍTULO'}, 
                                                      { title : 'PRECIO'}, 
                                                      {title : 'CATEGORÍA'}, 
                                                      {title : 'ESTATUS'} ], 
                                        "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                                        destroy: true, 
                                         //"order"    : [[ 0, "desc" ]], 
                                        "initComplete": function() { 
                                    } 
                            }); 

        

    }
</script>
 