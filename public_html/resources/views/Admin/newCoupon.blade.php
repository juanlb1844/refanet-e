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


  <style type="text/css">
    #img-encompra {
      width: 40px; 
    }
  </style>
 
 
<link rel="stylesheet" href="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.min.css">
<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>

<div class="col-lg-10 col-md-10 col -sm-10 col-xs-12">
  <div class="panel-right">  
      <div class="col-lg-12 table-container" style="padding-top: 20px;">

              <div class="container-header-section container-fluid np-l np-r" style="padding: 0px;">
                <div class="col-lg-4 np-l">
                  <h1 class="pull-left">Promoción</h1>                       
                </div>
                <div class="col-lg-8">
                  <div class="col-lg-9">
                    
                  </div>
                  <div class="col-lg-3">
                    <h4 style="font-weight: bolder;">Estatus</h4>
                    <select class="form-control">
                      <option>Activo</option>
                      <option>Inactivo</option>
                    </select>
                    <p>&nbsp;</p>  
                  </div>
              </div>
 
 
              <div class="col-lg-6">
                      <div class="panel panel-default">
                         <div class="panel-heading"><h4>Información de promoción</h4></div>
                      <div class="panel-body">
                       <div class="col-lg-6">
                        <h4>Válido desde</h4>
                        <input id="validate-from" class="form-control" type="datetime-local" value="2022-02-02T00:00" min="2022-02-02T00:00" name="">
                      </div>
                      <div class="col-lg-6">
                        <h4>Hasta</h4>
                        <input id="validate-to" class="form-control" type="datetime-local" value="2022-02-02T00:00" min="2022-02-02T00:00" name="">
                      </div>
                      <div class="col-lg-12">
                        <h4>Código</h4>
                        <input id="codigo-desc" class="form-control" value="" type="" name="">
                      </div> 
                      <div class="col-lg-12">
                        <h4>Descripción</h4>
                        <input id="desc-desc" class="form-control" value="" type="" name="">
                      </div> 
                      <div class="col-lg-12">
                        <h4>Mensaje de éxito</h4>
                        <input id="mge-success-desc" class="form-control" value="" type="" name="">
                      </div> 
                      <div class="col-lg-12">
                        <h4>Mensaje de no aplicado</h4>
                        <input id="mge-no-apply" class="form-control" value="" type="" name="">
                      </div> 
                      </div>
                    </div>
               </div>

              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading"><h4>Condiciones</h4></div>
                  <div class="panel-body">
                    <div class="col-lg-12">
                      <div class="col-lg-12"> 
                         <h4>Grupo de clientes admitidos</h4>
                          <select class="form-control" name="cars" id="relation-groups" multiple>
                            @foreach($clientGroups as $key => $group )
                              <option value="{{$group->id}}">{{$group->nombre}}</option>
                            @endforeach 
                          </select>
                      </div>
                      <div class="col-lg-12"> 
                         <h4>Métodos de pago admitidos</h4> 
                          <select class="form-control" name="cars" id="relation-methods" multiple>
                            @foreach($pay_methods as $key => $pay ) 
                              <option value="{{$pay->id}}">{{$pay->title}}</option>
                            @endforeach 
                          </select>
                      </div>
                      <div class="col-lg-12"> 
                        <div class="col-lg-6" class="np">
                          <h4>Debe de estar logueado</h4>
                        </div>
                        <div class="col-lg-6">
                          <p></p>
                            <input class="logueado" type="checkbox" name="" style="transform: scale(1.5);"> 
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Regla</th>
                              <th>Comparador</th>
                              <th>Valor</th>
                            </tr>
                          </thead> 
                          <tbody> 
                            <tr> 
                              <td>Productos en carrito</td>
                              <td>
                                <select>
                                  <option>></option>
                                  <option><</option>
                                  <option>=</option>
                                </select>
                              </td>
                              <td>
                                <input type="" name="">
                              </td>
                            </tr>
                            <tr>
                              <td>Total de carrito</td>
                              <td>
                                <select>
                                  <option>></option>
                                  <option><</option>
                                  <option>=</option>
                                </select>
                              </td>
                              <td><input value="" type="" name=""></td>
                            </tr>
                            <tr>
                              <td>Aplicaciones por usuario</td>
                              <td>
                                <select>
                                  <option>></option>
                                  <option><</option>
                                  <option>=</option>
                                </select> 
                              </td>
                              <td>
                                <input type="" name="">
                              </td>
                            </tr>
                             <tr>
                              <td>Aplicaciones totales</td>
                              <td>
                                <select>
                                  <option>></option>
                                  <option><</option>
                                  <option>=</option>
                                </select>
                              </td>
                              <td>
                                <input type="" name="">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>

          <div class="col-lg-12"> 

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4>Acciones</h4>
              </div>
              <div class="panel-body">
                  <div class="col-lg-12">
                    <div class="col-lg-4">
                      <h4>Tipo de descuento</h4>
                      <select id="type-desc" class="form-control">
                        <option value="1">Descuento por porcentaje</option>
                        <option value="2">Descuento fijo</option>
                        <option value="3">Cortesía</option> 
                      </select>  
                      <p>&nbsp;</p> 
                      <div class="col-lg-12 np" style="border: 1px solid #bababa; border-radius: 7px; padding-top: 10px!important;">
                        <div class="col-lg-6">
                          <input id="skuTiene" class="form-control" type="" name="">  
                          <p>Si tiene</p>
                        </div> 
                        <div class="col-lg-6">
                          <input id="skuAgrega" class="form-control" type="" name="">  
                          <p>Agrega</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h4>Cantidad</h4>
                      <input id="cant-desc" class="form-control" type="" name="">
                      <p>&nbsp;</p>
                    </div>
                  </div> 
                 

                    <div class="col-lg-4">
                    <h4 class="list-categories-add">Categorías donde se aplica</h4>

                        
                  <style type="text/css">
                    .list-categories {
                      border: 1px solid #e9e9e9;
                      padding: 4px 10px;   
                      border-radius: 4px; 
                    }
                    .span-element {
                      background-color: #e9e9e9;  
                      border-radius: 4px; 
                      padding: 2px 4px; 
                      margin-right: 4px;  
                      margin-top: 4px; 
                      display: inline-block;
                    }
                    .span-element:hover {
                      cursor: pointer;
                      background-color: gray;
                    } 
                    .fstMultipleMode {
                      width: 100%; 
                    }
                    .fstControls { width: 100%!important; }
                  </style>
                    <div class="list-categories">
                      
                    </div>
                    <br> <br> 
                
                    <!-- 
                    <button class="btn btn-primary list-categories-add">Seleccionar producto</button>
                    <table class="table table-striped table-condensed">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          <th>IMG</th>
                        </tr>
                      </thead>
                      <tbody id="encompra">
                        <tr>
                          <td></td>
                          <td><img src=""></td>
                        </tr>
                      </tbody>
                    </table> --> 
                  </div>
              
 
              </div>
            </div>


            
          </div>
      
        <div class="col-lg-12" style="padding: 20px 20px;">
          <button class="btn pull-right btn-primary" id="saveData">Guardar</button>
        </div>
                  
                   
      </div>
      <p>&nbsp;</p>
 
 
  </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
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
<script type="text/javascript">

  function newSubCat( id, title ) {
        $('.list-categories').append('<span class="span-element cat-'+id+'" onclick="deleteThis(\''+id+'\')" idcat="'+id+'">'+ title +'</span>'); 
        $('.cat-option-'+id).css("font-weight", "900");  
  }


  $('.list-categories-add').click( function() {
        $('#myModal').modal('show');  
        $('#overlay').fadeIn(); 
        $.ajax({
        'url' : "{{asset('getTreeCats')}}", 
        'method' : 'get', 
        'success' : function( resp ) {
          var resp = JSON.parse( resp ); 
          //console.log( resp ); 
          $('.body-cats').html(""); 
          resp.forEach( function(item , key) {
            //console.log( item ); 
            $('#overlay').fadeOut(); 
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
      }); 

  $('#saveData').click( function( resp ) {

    let categorias = []; 
    $('.list-categories .span-element').each( function( a, b ) { 
        categorias.push($(b).attr('idcat') ); 
      });   

    let codigo = $('#codigo-desc').val(); 
    let description = $('#desc-desc').val(); 
    let success = $('#mge-success-desc').val(); 
    let noApply = $('#mge-no-apply').val(); 
    let descType    = $('#type-desc').val(); 
    let cantDesc = $('#cant-desc').val(); 

    let skuTiene = $('#skuTiene').val(); 
    let skuAgrega = $('#skuAgrega').val(); 
    if( descType == 3 ) {
      if( ( skuTiene.trim().length == 0 || skuAgrega.trim().length == 0 ) ) {
          alert("captura el regalo"); 
          return;  
      }
    }

    desde = new Date( $('#validate-from').val() ); 
    anio = desde.getFullYear();
    mes = desde.getMonth() + 1; 
    dia = desde.getDate();  
    
    horas = desde.getHours(); 
    min   = desde.getMinutes(); 

    let dateFrom = anio+"-"+mes+"-"+dia+ " " +horas+":"+min+":00";  

    desde = new Date( $('#validate-to').val() ); 
    anio = desde.getFullYear();
    mes = desde.getMonth() + 1; 
    dia = desde.getDate(); 
    
    horas = desde.getHours(); 
    min   = desde.getMinutes(); 

    let dateTo = anio+"-"+mes+"-"+dia+ " " +horas+":"+min+":00";  

    let logueado = 0; 
    if( $('.logueado').is(':checked') )  {
      logueado = 1; 
    }

    let groups = $('#relation-groups').val(); 
    let methods = $('#relation-methods').val(); 

    $.ajax({
      'url' : '{{asset("createCoupon")}}', 
      'data' : {
        'codigo' : codigo, 
        'description' : description, 
        'success' : success, 
        'noApply' : noApply, 
        'descType' : descType, 
        'cantDesc' : cantDesc, 
        'desde'    : dateFrom, 
        'hasta'    : dateTo, 
        'logueado' : logueado, 
        'groups' : groups,  
        'methods' : methods, 
        'categorias' : categorias, 
        'skuTiene'   : skuTiene,
        'skuAgrega'  : skuAgrega,  
      },  
      'method' : 'post', 
      'success' : function(resp) {
        window.location.href = "{{asset('cupones')}}"; 
      }
    }); 
  }); 


  $('.modal-products').click(function() {
    $('#list-products').modal('toggle'); 

  }); 

  function quitarProducto( sku ) {
    $("."+sku).remove(); 
  }

  function addProduct( sku, img ) {
    $('#list-products').modal('toggle'); 
    let tr = "<tr class='"+sku+"'>"+
                "<td><span>"+ sku +"</span></td>"+ 
                "<td><img id=\"img-encompra\" src='"+ img +"'></td>" +  
                "<td><button onclick=\"quitarProducto('"+sku+"')\" class=\"btn\">quitar</button></td>" +  
            +"</tr>"; 
    console.log( tr ); 
    $('#encompra').append(tr); 
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


<!-- Modal -->
<div id="list-products" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lista de productos <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
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
                                <tr onclick="addProduct('{{$producto->nparte}}','{{$producto->img}}')">
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

  
</div>
 
 