@extends('Admin.layout')
 
  <style type="text/css">
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
    .body-tallas .sub-element:hover {
       cursor: pointer;
       font-weight: bolder; 
    }
    .text-to-left { text-align: left; }



    /* ////////////////////////////////// */ 

    .selected-attr { 
      background-color: #e3e3e3; 
      border-radius: 7px; 
    }
    .collection-body ul li {
      padding: 5px 10px; 
    }
    .collection-body ul li:hover {
      cursor: pointer;
      border-radius: 7px; 
      background-color: #d9d9d9;
    }
  </style>

<!-- RIGHT BAR -->  

<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
  <div class="panel-right">  
      <div class="col-lg-12 table-container" style="padding: 0px;">
        <h1>Fits</h1> 
      </div> 
      <div class="col-lg-12">
 
          <div class="col-lg-3">
            <div class="container-collection"> 
              <div class="header-collection"> 
                  <h4>Marca 
                    <span class="label label-success btn-new-element" title="marca" model="fit_brand">Nueva</span>
                  </h4>
              </div>
                <div class="collection-body borderless container-cats">
                  <ul class="body-car-brand">
                    @foreach( $fitMarca as $marca )
                     <li  class="getModel" 
                          id-model="{{$marca->id_fit_model}}" 
                          name-model="{{$marca->title_model}}"> 
                            {{$marca->title_model}} 
 
                            <img class="pull-right" onclick="editElement(event)" src="{{asset('media/edit.svg')}}" style="width: 15px; height: 15px;"> 

                      </li> 
                    @endforeach
                  </ul>  
                  <table class="table"> 
                  </table>
                </div>
            </div>
          </div> 

          <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection"> 
                  <h4>Modelo 
                    <span class="label label-success btn-new-element btn-new-model" title="modelo" model="fit_model">Nueva</span>
                  </h4>
              </div>
                <div class="collection-body borderless container-cats">
                  <ul class="body-car-model">
                    <li style="list-style: none;">Selecciona una marca</li>
                  </ul>   
                  <table class="table"> 
                  </table>
                </div>
            </div>
          </div>

            <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection"> 
                  <h4>Año 
                    <span class="label label-success btn-new-element btn-new-year" title="año" model="fit_year">Nueva</span>
                  </h4>
              </div>
                <div class="collection-body borderless container-cats">
                  <ul class="body-car-year">
                    <li style="list-style: none;">Selecciona un modelo</li>
                  </ul>
                  <table class="table"> 
                  </table>
                </div>
            </div>
          </div>

            <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection"> 
                  <h4>Motor 
                    <span class="label label-success btn-new-element btn-new-engine" title="motor" model="fit_engine">Nueva</span>
                  </h4> 
              </div>
                <div class="collection-body borderless container-cats">
                  <ul class="body-car-engine">
                    <li style="list-style: none;">Selecciona un modelo</li>
                  </ul>
                  <table class="table"> 
                  </table>
                </div>
            </div>
          </div>
  
      </div>
  </div>
</div>
 
  

  <!-- MODAL TO CREATE SUB-CATS --> 
<div id="newFit" class="modal fade" role="dialog"> 
  <div class="modal-dialog modal-xs">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: left;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <label>Título</label>
                <input id="new-val-model" class="form-control" type="" name="">
            </div>   
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning delete-cat" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnSaveModel" data-dismiss="modal">Guardar</button>
      </div>
    </div> 
  </div>



  <div id="" class="modal fade" role="dialog"> 
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-warning delete-cat" data-dismiss="modal">Borrar</button> --> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnSaveModel" data-dismiss="modal">Guardar</button>
      </div>
    </div> 
  </div>



  <!-- Modal -->
<div id="editElementModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content--> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar categoría</h4>
      </div>
      <div class="modal-body">
           <label>Título</label>
           <input id="edit-val-model" class="form-control" type="" name="">
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default btn-warning deleteBrand" data-dismiss="modal">Borrar</button> 
        <button type="button" class="btn btn-primary btnSaveModel" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>
</div>

 
  

  <script type="text/javascript">

    $(".deleteBrand").click( function( event ) {
      alert("mje");   
    }); 

    function editElement( event ) {  
      $("#editElementModal").modal("toggle");  
      $("#edit-val-model").val($(event.target).parent().attr("name-model")); 
    }  

    ////////////////////////////////////////// 

      id_brand_id = null; 

      function getMotors( event ) {
        id_parent = $(event.target).attr("id-model");  
        id_brand_id = id_parent; 
         $(".body-car-year li").removeClass("selected-attr"); 
         $(event.target).addClass("selected-attr"); 
         $(".body-car-engine").html("");
 
          $.ajax({ 
          "url" : "{{asset('getByEngine')}}", 
          "method" : "post", 
          "data" : {   
            "name-model" : id_parent  
          }, 
          "success" : function( resp ) {
            resp = JSON.parse(resp); 
            console.log( resp );   
            $(".body-car-engine").html("");  
            if( resp.length > 0 ) { 
              resp.forEach( function( element, index ) {
                $(".body-car-engine").append("<li id-model='"+element.id_fit_model+"' name-model='"+element.title_model+"'>"+element.title_model+"</li>"); 
              });  
            } else {
              $(".body-car-engine").append("<li>No hay motores en ese año</li>"); 
            }
            $(".btn-new-engine").fadeIn(); 
          }
         }); 
        //alert(id_brand_id); 
      }


      function getAnios( event ) {

        id_brand_id = $(event.target).attr("id-model");  
        //alert(id_brand_id); 

        idModel = $(event.target).attr("id-model"); 
        //alert(idModel);  
        //alert( id_brand_id ); 
         $(".body-car-model li").removeClass("selected-attr"); 
         $(event.target).addClass("selected-attr"); 
   
         $(".body-car-year").html("");
         $.ajax({ 
          "url" : "{{asset('getByYear')}}", 
          "method" : "post", 
          "data" : {   
            "name-model" : idModel 
          }, 
          "success" : function( resp ) {
            resp = JSON.parse(resp); 
            console.log( resp );   
            $(".body-car-year").html("");  
            if( resp.length > 0 ) { 
              resp.forEach( function( element, index ) {
                $(".body-car-year").append("<li onclick='getMotors(event)' id-model='"+element.id_fit_model+"' name-model='"+element.title_model+"'>"+element.title_model+"</li>"); 
              });  
            } else {
              $(".body-car-year").append("<li>No hay años en esta marca</li>"); 
            }
              $(".body-car-engine").html("<li>Selecciona un año</li>");  
              $(".btn-new-year").fadeIn();
              $(".btn-new-engine").fadeOut(); 
          }
         }); 

      }

      $(".getModel").click( function( resp ) {

         if( !$(resp.target).hasClass("getModel") ) { return; }

         $("li").removeClass("selected-attr"); 
         id_brand_id = $(resp.target).attr("id-model");  
         $(resp.target).addClass("selected-attr"); 

         $(".body-car-year").html("");  
         $(".body-car-model").html(""); 
         $(".body-car-engine").html("");  
         $.ajax({  
          "url" : "{{asset('getByModel')}}", 
          "method" : "post", 
          "data" : {  
            "name-model" : id_brand_id 
          }, 
          "success" : function( resp ) {
            resp = JSON.parse(resp); 
            console.log( resp );  
            $(".body-car-model").html(""); 
            if( resp.length > 0 ) {
              resp.forEach( function( element, index ) {
                $(".body-car-model").append("<li onclick='getAnios(event)' id-model='"+element.id_fit_model+"' name-model='"+element.title_model+"'>"+element.title_model+"</li>"); 
              });   
            } else {
              $(".body-car-model").append("<li>No hay modelos en esta marca</li>");
            }
            $(".body-car-year").append("<li>Selecciona un modelo</li>");  
            $(".body-car-engine").append("<li>Selecciona un año</li>");  

            $(".btn-new-year").fadeOut(); 
            $(".btn-new-engine").fadeOut(); 
          }
         }); 
      }); 

      $(".btnSaveModel").click( function() {
        title = $("#new-val-model").val(); 

        parent_id = null; 
        parent_id = id_brand_id; 
 
          
         $.ajax({
          "url" : "{{asset('newModelFit')}}", 
          "method" : "post",   
          "data" : {
            "model" : model_name, 
            "action" : "new", 
            "title_model" : title, 
            "parent" : parent_id 
          }, 
          "success" : function( resps ) {
            //alert( resps.trim() ); 
            window.location.reload(); 
          }
         }); 
      }); 

      model_name = ""; 
      $(".btn-new-element").click( function( event ) {
        model_name  = $(event.target).attr("model");  
        modal_title = $(event.target).attr("title");  

        $("#title-modal-cat").html(modal_title); 
        $("#newFit").modal("toggle"); 
      }); 

  </script>

 