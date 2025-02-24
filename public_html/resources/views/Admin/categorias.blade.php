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
  </style>

<!-- RIGHT BAR -->  

<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
  <div class="panel-right">  
      <div class="col-lg-12 table-container" style="padding: 0px;">
        <h1>Atributos</h1> 
      </div>
      <div class="col-lg-12">
 
 
          <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection">
                  <h4>Categorías de productos  <span class="label label-success btn-new-cat">Nueva</span></h4>

              </div>
                <div class="collection-body borderless container-cats">
                  <ul class="body-cats">
                    <!-- <li>..</li> --> 
                  </ul>  
                  <table class="table"> 
                  </table>
                </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection">
                  <h4>Tallas <!-- <span id="nuevaTalla" class="label label-success">Nueva</span> --> 
                    <span id="nuevaTallaCategoria" class="label label-success">Nuevo grupo</span></h4>
              </div>
                <div class="collection-body borderless">
                   <ul class="body-tallas">
                    <!-- <li>..</li> -->  
                  </ul>
                </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection">
                  <h4>Marcas  <span id="nuevaMarca" class="label label-success">Nueva</span></h4>
              </div>
                <div class="collection-body borderless">
                  <ul>
                     @foreach ( $marcas as $marca )
                        <li class="list-talla" onclick="editarMarca('{{$marca->id}}')">{{$marca->nombre}}</li>
                     @endforeach 
                  </ul>
                </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container-collection">
              <div class="header-collection">
                  <h4>Familias <span id="nuevaFamilia" class="label label-success">Nueva</span></h4> 
              </div> 
                <div class="collection-body borderless">
                  <ul>
                     @foreach ( $familias as $familia )
                        <li class="list-talla" onclick="editarFamilia('{{$familia->id}}')">{{$familia->nombre}}</li>
                     @endforeach 
                  </ul>
                </div>
            </div>
          </div>

      </div>
  </div>
</div>

<!-- // RIGHT BAR --> 




<!-- create-cat-tallas -->
<div id="create-cat-tallas" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo grupo de tallas <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: left;" class="col-lg-12">
            <div class="col-lg-3">
             <label>Título</label>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="new-talla-cat" type="" name="">
            </div>
          </div>
          <div style="text-align: left;" class="col-lg-12">
            <br/> 
            <div class="col-lg-3">
             <label>Descripción</label>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="new-talla-desc" type="" name="">
            </div>
          </div>
          <div class="col-lg-12">
            <br/> 
            <div class="col-lg-3">
             <label>Familia de productos</label>
            </div> 
            <div class="col-lg-9">
                <select class="form-control select-new-familia-cat">
                        <option value=".." selected>..</option> 
                        @foreach ( $familias as $familia )  
                            <option value="{{$familia->id}}"> 
                              {{$familia->nombre}}
                            </option> 
                        @endforeach
                  </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar-catTallas" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>

 

<!-- create-cat-tallas -->
<div id="create-family" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Familia <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: left;" class="col-lg-12">
            <div class="col-lg-3">
             <label>Título</label>
            </div>   
            <div class="col-lg-9"> 
              <input class="form-control" id="new-familia-titulo" type="" name="">
            </div>
          </div>
          <div style="text-align: left;" class="col-lg-12">
            <br/> 
            <div class="col-lg-3">
             <label>Descripción</label>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="new-familia-desc" type="" name="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar-familia" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>NUEVA</strong> TALLA <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-md" style="display: inline-block; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 text-to-left"> 
              <label>Título de talla</label>
              <input class="form-control" id="title-talla" type="" name="">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="col-lg-12 text-to-left"> 
              <br/> 
              <label>Descripción</label>
              <input class="form-control" id="description-talla" type="" name="">
            </div>
          </div> 
           <div class="col-lg-12"> 
            <div class="col-lg-12 text-to-left"> 
              <br/> 
               <label>Detalles</label>
               <div class="summernote"></div>
            </div>
          </div> 
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveProductTallas" data-dismiss="modal">Guardar-</button>
      </div>
    </div>

  </div>



<!-- Modal -->
<div id="editTalla-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> <strong>EDITAR</strong> TALLA <span id="modal-nparte"></span></h4>
      </div> 
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <strong><p>Título de talla</p></strong>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="edit-title-talla" type="" name="">
            </div>
          </div>
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <br> 
              <strong><p>Descripción</p></strong>
            </div>  
            <div class="col-lg-9"> 
              <br> 
              <input class="form-control" id="edit-description-talla" type="" name="">
            </div>
          </div> 
           <div style="text-align: center;" class="col-lg-12">  
              <br> 
            <div class="col-lg-3">
              <strong><p>Detalles</p></strong>
            </div>  
            <div class="col-lg-9"> 
               <div class="edit-summernote"></div>
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning" data-dismiss="modal" onclick="borrarTallaById()">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="saveTalla()">Guardar</button>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div id="editFamilia-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Familia <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <p>Título de familia</p>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="edit-title-familia" type="" name="">
            </div>
          </div>
          <div style="text-align: center;" class="col-lg-12"> 
            <div class="col-lg-3">
              <br> 
              <p>Descripción de la familia</p>
            </div>  
            <div class="col-lg-9">  
              <br> 
              <input class="form-control" id="edit-description-familia" type="" name="">
            </div>
          </div> 
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning" data-dismiss="modal" onclick="deleteFamilia()">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="eidtFamilia()">Guardar</button>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div id="editMarca-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar marca <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <p>Título de marca</p>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="edit-title-marca" type="" name="">
            </div>
          </div>
          <div style="text-align: center;" class="col-lg-12"> 
            <div class="col-lg-3">
              <br> 
              <p>Descripción marca</p>
            </div>  
            <div class="col-lg-9"> 
              <br> 
              <input class="form-control" id="edit-description-marca" type="" name="">
            </div>
          </div> 
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning" data-dismiss="modal" onclick="deleteMarca()">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="eidtMarca()">Guardar</button>
      </div>
    </div>
  </div>

    <!-- Modal -->
<div id="editMarca-nueva" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva marca <span id="modal-nparte"></span></h4>
      </div>
      <div class="modal-body modal-lg" style="display: inline-block; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <p>Título de marca</p>
            </div>  
            <div class="col-lg-9"> 
              <input class="form-control" id="new-title-marca" type="" name="">
            </div>
          </div>
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-3">
              <br> 
              <p>Descripción</p>
            </div>  
            <div class="col-lg-9"> 
              <br> 
              <input class="form-control" id="new-description-marca" type="" name="">
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="saveMarca()">Guardar</button>
      </div>
    </div>
  </div>


 <div id="editCategoriaTalla" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">  
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>EDITAR</strong> CATEGORÍAS DE TALLAS <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Título de la categoría de tallas</label>
                <input id="edit-categoria-talla-titulo" class="form-control" type="" name="">
            </div>   
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Nombre Interno de la talla (no será visible en la página)</label>
                <input id="edit-categoria-talla-description" class="form-control" cols="4"></input>
            </div>
            <div class="col-lg-12 col-xs-12">
              <label class="pull-left">Familia</label> 
                <select class="form-control select-familia-cat">
                      <option value="..">..</option>
                  @foreach ( $familias as $familia )
                      <option value="{{$familia->id}}">
                        {{$familia->nombre}}
                      </option> 
                     @endforeach
                </select>
            </div>
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning btn-delete-catTallas">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-cat-talla" data-dismiss="modal">Guardar categoría de tallas</button>
      </div>
    </div>

  </div>

  <!-- MODAL TO CREATE SUB-CATS --> 
<div id="editTallaModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>EDITAR</strong> TALLA <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Título de la talla</label>
                <input id="edit-talla-titulo" class="form-control" type="" name="">
            </div>   
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Nombre Interno de la talla</label>
                <input id="edit-talla-description" class="form-control" cols="4"></input>
            </div>
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning delete-talla">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-talla-cat" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>



  <!-- MODAL TO CREATE SUB-CATS --> 
<div id="newTallaModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva talla <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <label>Título de la talla</label>
                <input id="new-talla-titulo" class="form-control" type="" name="">
            </div>   
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <label>Admin de la talla</label>
                <textarea id="cat-edit-description" class="form-control" cols="4"></textarea>
            </div>
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning delete-cat" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnSaveTalla" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>

  <!--            --> 
  <!-- CATEGORIAS --> 
  <!--            --> 

  <!-- MODAL TO CREATE SUB-CATS --> 
<div id="newSub" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>NUEVA</strong> CATEGORÍA DE PRODUCTOS <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Título de la categoría</label>
                <input placeholder="Pantalones cortos" id="cat-new-title" class="form-control" type="" name="">
            </div>   
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Descripción de la categoría</label>
                <textarea id="cat-new-description" class="form-control" cols="4"></textarea>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 text-to-left">
                <label>Slug (ruta en el navegador)</label>
                <input placeholder="pantalones-cortos" id="cat-new-slug" class="form-control" type="" name="">
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 text-to-left" style="padding-top: 20px;">
                <div class="col-lg-8">
                  <label>Mostrar en menú</label>
                </div>
                <div class="col-lg-4">
                  <input style="transform: scale(2);" id="cat-type-new" type="checkbox" name="">
                </div>
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-add-cat" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>

<!-- MODAL TO CREATE EDIT-CATS --> 
<div id="newSubCat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>EDITAR</strong> CATEGORÍA DE PRODUCTOS <span id="title-modal-cat"></span></h4>
      </div>
      <div class="modal-body modal-xs" style="display: flex; ">
          <div style="text-align: center;" class="col-lg-12">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Título de la categoría</label>
                <input id="cat-edit-title" class="form-control" type="" name="">
            </div>   
            <div class="col-lg-12 col-sm-12 col-xs-12 text-to-left">
                <label>Descripción de la categoría</label>
                <textarea id="cat-edit-description-modal" class="form-control" cols="4"></textarea>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 text-to-left">
                <label>Slug</label>
                <input id="cat-edit-slug" class="form-control" type="" name="">
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 text-to-left" style="padding-top: 20px;">
                <div class="col-lg-8">
                  <label>Mostrar en menú</label>
                </div>
                <div class="col-lg-4">
                  <input style="transform: scale(2);" id="cat-type-edit" type="checkbox" name="">
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12"><p></p><br></div>
              <div class="col-lg-12"> 
                  <div class="col-lg-2"> <label>Mover a:</label> </div>
                  <div class="col-lg-7"> 
                    <select class="form-control cat-parent-to-move">
                      @foreach( $categorias as $categoria)
                          <option value="{{$categoria->id}}" >{{$categoria->title}} || {{$categoria->slug}}</option>
                      @endforeach 
                    </select>
                  </div> 
                  <div class="col-lg-3"> 
                    <button class="btn btn-default mover-cat">OK</button>
                  </div>
              </div>
              </div>
          </div> 
          <br> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning delete-cat" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-edit-cat" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>
  

  <script type="text/javascript">

    function borrarTallaById( ) {
      if( confirm("Está seguro?") ) {
        $.ajax({
          'url' : '{{asset("borrarTalla")}}', 
          'method' : 'post',   
          'data' : {
            'id_talla' : talla_edit_id
          }, 
          'success' : function( resp ) {
            window.location.reload(); 
          }
        }); 
      }
    }

    // 
    // Crear nueva categoría de productos  
    // 

     $( "#cat-new-title" ).keydown(function( event ) {
      if ( event.which == 13 ) {
         nuevaCategoriaProductos(); 
      }
      $("#cat-new-slug").val( $("#cat-new-title").val().replace(" ", "-") ); 
    });

    $('.btn-add-cat').click( function() {
      nuevaCategoriaProductos(); 
    });

    function limpiarModal( toClean ) {
      $(toClean+" input").each( function( a, b ) { $(b).val(''); } );    
      $(toClean+" textarea").each( function( a, b ) { $(b).val(''); } );  
    }

    function deleteMarca() {
      if( confirm("¿Estás seguro?")) {
          $("#overlay").fadeIn(300);　 
          $.ajax({
             'url' : "{{asset('edeleteBrand')}}",
             'method' : 'post', 
             'data' : {
                'id'    : id_to_edit_marca
             }, 
             'success' : function(resp) { 
              $("#overlay").fadeOut(300);　
              resp = JSON.parse(resp); 
              addNotification(resp.mge, resp.type);      
              window.location.reload();  
             }
          });  
      }
    }
    
    function eidtMarca() {
      let title = $('#edit-title-marca').val(); 
      let desc  = $('#edit-description-marca').val(); 
      if( title.length < 1 || desc.length < 1 ) {
        addNotification("ERROR", "LLena todos los campos");
        return;  
      } 
      $("#overlay").fadeIn(300);　 
       $.ajax({
         'url' : "{{asset('editBrand')}}",
         'method' : 'post', 
         'data' : {
            'title' : title, 
            'desc'  : desc, 
            'id'    : id_to_edit_marca
         }, 
         'success' : function(resp) { 
          $("#overlay").fadeOut(300);　
          resp = JSON.parse(resp); 
          addNotification(resp.mge, resp.type);      
          window.location.reload(); 
         }
      });   
    } 


    $('.btn-guardar-familia').click( function() {
        let titulo = $('#new-familia-titulo').val(); 
        let desc = $('#new-familia-desc').val(); 
        if( titulo.length < 1 || desc.length < 1 ) {
          addNotification("ERROR", "LLena todos los campos");
          return;  
        } 
        $("#overlay").fadeIn(300);
        $.ajax({
         'url' : "{{asset('setNewFamily')}}",
         'method' : 'post', 
         'data' : {
            'title' : titulo, 
            'desc'  : desc
         }, 
         'success' : function(resp) { 
          $("#overlay").fadeOut(300);　
          resp = JSON.parse(resp); 
          addNotification(resp.mge, resp.type);      
          window.location.reload(); 
         }
      }); 
      }); 


    function saveMarca() {
      let new_title_marca       = $('#new-title-marca').val(); 
      let new_description_marca = $('#new-description-marca').val(); 
      if( new_title_marca.length < 1 || new_description_marca.length < 1 ) {
        addNotification("ERROR", "LLena todos los campos");
        return;  
      }
      $("#overlay").fadeIn(300);　        
      $.ajax({
         'url' : "{{asset('setNewBrand')}}",
         'method' : 'post', 
         'data' : {
            'title' : new_title_marca, 
            'desc'  : new_description_marca
         }, 
         'success' : function(resp) { 
          $("#overlay").fadeOut(300);　
          resp = JSON.parse(resp); 
          addNotification(resp.mge, resp.type);      
          window.location.reload(); 
         }
      }); 

    }

    function nuevaCategoriaProductos() {
      var title       = $('#cat-new-title').val(); 
      var description = $('#cat-new-description').val(); 
      var slug        = $('#cat-new-slug').val(); 
      limpiarModal("#newSub"); 
      if( title.length < 2 || slug.length < 2) { addNotification("Llena el formulario", "ERROR"); return; }

      $("#overlay").fadeIn(300);　  
      $.ajax({
        'url' : "{{asset('setNewCat')}}", 
        'method' : 'post', 
        'data' : {
          'parent'      : to_add_in, 
          'title'       : title, 
          'description' : description, 
          'slug'        : slug
        },
        'success' : function( resp ) {
          console.log( resp );
          resp = JSON.parse(resp);  
          addNotification(resp.mge, resp.type); 
          $("#overlay").fadeOut(300);
          //window.location.reload();  
        }
      });  
    } 
 
    // editar categoría de productos 
    var to_edit = null;   // id para editar 

     function newSubCat( param, title) {
      to_edit = param;
      $("#overlay").fadeIn(300);　 
      $.ajax({
          'url' : "{{asset('getCategorie')}}/"+param, 
          'method' : 'get', 
          'success' : function( resp ) {
            $('#newSubCat').modal('toggle'); 
            resp = JSON.parse(resp); 
            $('#cat-edit-title').val(resp.title); 
            $('#cat-edit-slug').val(resp.slug); 
            $('#cat-edit-description-modal').val(resp.descripcion); 
            $("#overlay").fadeOut(300);　
          }
      });  
    }


    $('.btn-talla-cat').click( function() {
      let title = $('#edit-talla-titulo').val(); 
      let description = $('#edit-talla-description').val(); 
      alert(title);
      alert(talla_edit_id);  
    }); 

    $('.btn-edit-cat').click( function() {  
        var title       =  $('#cat-edit-title').val();        
        var description =  $('#cat-edit-description-modal').val();  
        var slug        =  $('#cat-edit-slug').val(); 

        $("#overlay").fadeIn(300);
        $.ajax({
          'url' : "{{asset('updateCat')}}",  
          'method' : 'post', 
          'data' : {
            'title'       : title, 
            'description' : description, 
            'slug'        : slug, 
            'id'          : to_edit
          },  
          'success' : function( resp ) {
            resp = JSON.parse(resp); 
            //window.location.reload(); 
            addNotification(resp.mge, resp.type);
            $("#overlay").fadeOut(300);
          }
        }); 
    }); 

    // borrar una categoría 
    $('.delete-cat').click( function() {
        $("#overlay").fadeIn(300);　
        $.ajax({
          'url' : "{{asset('deleteCategorie')}}/"+to_edit, 
          'method' : 'get', 
          'success' : function( data ) {
            resp = JSON.parse( data ); 
            addNotification(resp.mge, resp.type);　
            $("#overlay").fadeOut(300);　
          }
        })
    }); 

    /////////////////////////////////////////////////////////////////////// 
    // TALLAS 

    let parent_talla  = null; 
    let talla_edit_id = null; 

    function anadirSubtalla(param) {
       $('#myModal').modal('toggle'); 
        //$('#newTallaModal').modal('toggle'); 
        parent_talla = param; 
    }

    $('.delete-talla').click( function() {
      $("#overlay").fadeIn(300); 
      $.ajax({ 
        'url' : "{{asset('deleteTalla')}}", 
        'method' : 'POST', 
        'data' : { id : talla_edit_id }, 
        'success' : function ( response ) {
            $("#overlay").fadeOut(300);
            window.location.reload(); 
        }
      }); 
    }); 

    $('.btnSaveTalla').click( function() {
      let nombreTalla = $('#new-talla-titulo').val(); 
      $("#overlay").fadeIn(300); 
      $.ajax({
        'url' : "{{asset('setNewTalla')}}", 
        'method' : 'POST', 
        'data' : {'titulo' : nombreTalla, 'parent' : parent_talla}, 
        'success'  : function( response ) {
          $("#overlay").fadeOut(300);
          window.location.reload(); 
        }
      });    
    }); 

    $('.btn-guardar-catTallas').click( function() {
      let nameCat =  $('#new-talla-cat').val(); 
      let nameDesc = $('#new-talla-desc').val();  
      let familia  = $('.select-new-familia-cat').val(); 
      if( familia == '..' || nameCat.length < 2 || nameDesc.length < 2 ) {
        alert("Llena todos los campos"); 
        return; 
      }
      $.ajax({
        'url' : "{{asset('setNewCatTalla')}}", 
        'method' : 'POST', 
        'data' : {
          'name' : nameCat, 
          'desc' : nameDesc, 
          'familia' : familia
        }, 
        'success' : function( resp ) {
          window.location.reload(); 
        }
      }); 
    }); 


    // nueva talla categorías 
    $('#nuevaTallaCategoria').click(function() {
      $('#new-talla-cat').val(""); 
      $('#new-talla-desc').val("");  
      $('#create-cat-tallas').modal('toggle');    
    }); 

 
    $('.mover-cat').click( function() {
        var idToCat = $('.cat-parent-to-move').val(); 
        $("#overlay").fadeIn(300);　  
        $.ajax({
          'url' : "{{asset('moveCategorie')}}", 
          'method' : 'POST', 
          'data' : { 
              'idToMove' : idToCat,
              'idToCat' : to_edit   
          }, 
          'success' : function ( resp ) {
              console.log( resp );  
              $("#overlay").fadeOut(300);　
              window.location.reload();    
          }
        })
    }); 
 

    var to_add_in = null; 

    function newCat( id ) {
      $('#newSub').modal('toggle'); 
      to_add_in = id; 
    }
 
     $('.btn-new-cat').click( function() { 
      to_add_in = 0;
      $('#newSub').modal('toggle');  
    });
 
    function editCatTalla( cat, id ) {
      talla_edit_id = id; 
      editarTalla(talla_edit_id); 
      //$('#editTallaModal').modal('toggle'); 
      $('#edit-talla-titulo').val( cat ); 
    }

    window.onload = function() {
      $('.body-tallas').html(''); 

      $.ajax({
        'url' : "{{asset('getTreeTallas')}}", 
        'method' : 'get', 
        'success' : function( resp ) {
          var resp = JSON.parse( resp ); 
          cats   = resp[1].cats;   
          tallas = resp[0].tallas;     
          console.log( cats ); 
          console.log( tallas ); 
          cats.forEach( function(item , key) {

          if( item.categoria ) 
            $('.body-tallas').append('<ul class="cat-talla-'+item.categoria.replace(/ /g,'')+'"'+ 
                                      '<li class="sub-elemen"><span onclick="anadirSubtalla(\''+item.categoria+'\')" class="addCat">+</span>'
                                          +' <span style="font-weight: bolder;" onclick="editCatT(\''+item.categoria+'\', '+item.id+')">'+item.categoria+'</span>'+
                                    '</li> </ul>');   
          });     

           tallas.forEach( function(item , key) { 
            
            if( item.categoria != null && item.name != null ) {     
              $('.cat-talla-'+item.categoria.replace(/ /g,'')).append('<ul><li onclick="editCatTalla(\''+item.name+'\', \''+item.id+'\')" class="sub-element"><span>'+item.name+'</span></li></li>'); 
            }
          });   

        }
      });
 
      $.ajax({
        'url' : "{{asset('getTreeCats')}}", 
        'method' : 'get', 
        'success' : function( resp ) {
          var resp = JSON.parse( resp ); 
          console.log( resp ); 
          resp.forEach( function(item , key) {
            console.log( item ); 
            var id = item.id; 
            var title = item.title; 
            var parent = item.id_parent; 
            if( item.id_parent == 0 ) {
              $('.body-cats').append('<li class="parent-cat-'+id+'"> <span class="addCat" onclick="newCat(\''+id+'\')">+</span>'+ 
                                          '<span onclick="newSubCat(\''+id+'\',\''+title+'\')" class="cat-option">'+title 
                                        +'</span></li>'); 
            } else { 
              $('.parent-cat-'+item.id_parent).append('<ul class="parent-cat-'+id+'">'+
                                                            '<li><span class="addCat" onclick="newCat(\''+id+'\')">+</span>'+
                                                            '<span onclick="newSubCat(\''+id+'\',\''+title+'\')" class="cat-option">'+'-'+title 
                                                                  +'</span></li></ul>'); 
            }
          }); 
        }
      }); 
      
      $('#nuevaFamilia').click( function() {
        $('#create-family').modal('toggle'); 
      }); 
      
      $('#nuevaMarca').click( function() {
        $('#editMarca-nueva').modal('toggle'); 
      }); 

      $('.summernote').summernote();

      $("#nuevaTalla").click( function() {
        $('#myModal').modal('toggle');  
        $('.list-packs').html('');  
        updateProduct(id); 
      }); 
    }
  
  var id_to_edit_marca = null;  

  function editarMarca( id ) {
    $("#overlay").fadeIn(300);　
    $("#editMarca-modal").modal('toggle'); 
    $.ajax({ 
      'url' : 'https://begima.com.mx/public/getMarca', 
      'method' : 'POST', 
      'data' : { 'id' : id }, 
      'success' : function (A) {
        $("#overlay").fadeOut(300);　
        var A = JSON.parse( A ); 
        var nombre = A[0].nombre;  
        var title  = A[0].title;
        id_to_edit_marca = A[0].id; 
        $('#edit-title-marca').val( nombre ); 
        $('#edit-description-marca').val( title ); 
      } 
    }); 
  }

  var id_to_edit_family = null; 

  function eidtFamilia () {
      let title = $('#edit-title-familia').val(); 
      let desc  = $('#edit-description-familia').val(); 
      if( title.length < 1 || desc.length < 1 ) {
        addNotification("ERROR", "LLena todos los campos");
        return;   
      } 
      $("#overlay").fadeIn(300);　 
       $.ajax({
         'url' : "{{asset('editFamily')}}",
         'method' : 'post', 
         'data' : {
            'title' : title, 
            'desc'  : desc, 
            'id'    : id_to_edit_family
         }, 
         'success' : function(resp) { 
          $("#overlay").fadeOut(300);　
          resp = JSON.parse(resp); 
          addNotification(resp.mge, resp.type);      
          window.location.reload(); 
         }
      }); 
  }

  function deleteFamilia() {
     if( confirm("¿Estás seguro?")) {
          $("#overlay").fadeIn(300);　 
          $.ajax({
             'url' : "{{asset('deleteFamily')}}",
             'method' : 'post', 
             'data' : {
                'id'    : id_to_edit_family
             },  
             'success' : function(resp) { 
              $("#overlay").fadeOut(300);　
              resp = JSON.parse(resp); 
              addNotification(resp.mge, resp.type);      
              window.location.reload();  
             }
          });  
      }
  }

  function editarFamilia( id ) {
    id_to_edit_family = id; 
    $("#overlay").fadeIn(300);　
    $("#editFamilia-modal").modal('toggle'); 
    $.ajax({ 
      'url' : 'https://begima.com.mx/public/getFamilia', 
      'method' : 'POST', 
      'data' : { 'id' : id }, 
      'success' : function (A) {
        $("#overlay").fadeOut(300);　
        var A = JSON.parse( A ); 
        console.log(A); 
        var nombre = A.nombre;  
        var title  = A.title;
        $('#edit-title-familia').val( nombre ); 
        $('#edit-description-familia').val( title ); 
        
      } 
    }); 
  }


   // *TALLA  
    var id_talla_update = ''; 

    function saveTalla() {
     var nombre      = $('#edit-title-talla').val();  
     var description = $('#edit-description-talla').val(); 
     var detalle     = $('.edit-summernote').summernote('code'); 
     $("#editTalla-modal").modal('toggle'); 

     $("#overlay").fadeIn(300);　
     $.ajax({ 
      'url'           : 'https://begima.com.mx/public/updateTalla', 
      'method'        : 'POST',  
      'data'          : {
        'nombre'      : nombre,  
        'description' : description, 
        'detalle'     : detalle, 
        'id'          : id_talla_update
      }, 
      'success' : function(res){ 
        window.location.reload(); 
      } 
     }); 
    }
    
    let original_cat = null; 

    function editCatT( cat, id ) {
      original_cat = cat; 
      $.ajax({
        'url' : "{{asset('getCatTallas')}}", 
        'data' : {
          'name' : cat
        }, 
        'method' : 'post', 
        'success' : function( resp ) {
          console.log( resp );  
          resp = JSON.parse(resp); 
          $('#edit-categoria-talla-titulo').val( resp.categoria ); 
          $('#edit-categoria-talla-description').val( resp.descripcion_cat );
          if( resp.familia_talla == null ) {
            $(".select-familia-cat option[value='..']").prop('selected', true); 
          } else {
            $(".select-familia-cat option[value='"+resp.familia_talla+"']").prop('selected', true);
          }
        } 
      })

      $('#editCategoriaTalla').modal('toggle'); 
    } 
  
    $('.btn-save-cat-talla').click( function() {
        let categoria   = $('#edit-categoria-talla-titulo').val().trim();  
        let descripcion = $('#edit-categoria-talla-description').val().trim(); 
        let familia_cat = $('.select-familia-cat').val();  
        $.ajax({
          'url' : '{{asset("saveCatTalla")}}', 
          'data' : {
            'categoria' : categoria, 
            'descripcion' : descripcion, 
            'original_cat' : original_cat, 
            'familia_cat'  : familia_cat    
          },
          'method' : 'post', 
          'success'  : function( resp ) { 
            console.log( resp ); 
            window.location.reload(); 
          }
        })
    }); 

    $('.btn-delete-catTallas').click( function() {
      if( confirm("Si borras la categoría de tallas se borrarán todas las internas pero NO los productos relacionados") ) {
        let to_delete = $('#edit-categoria-talla-titulo').val().trim(); 
        $.ajax({
          'url' : '{{asset("borrarGrupoTallas")}}', 
          'method': 'post', 
          'data' : {'to_delete' : to_delete}, 
          'success' : function(resp) {
            console.log(resp); 
            window.location.reload(); 
           }
        }); 
      }
    }); 

 
    function editarTalla(id) {
      id_talla_update = id; 
      $("#overlay").fadeIn(300);　
      $('.edit-summernote').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear', 'table']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
     });
 
      $('#edit-title-talla').val("");  
      $('#edit-description-talla').val(""); 
      $('.edit-summernote').summernote('code', ""); 

      $.ajax({
        'url' : 'https://begima.com.mx/public/getTalla/'+id,
        'method' : 'GET', 
        'success' : function( resp ){  
          resp = JSON.parse(resp); 
          console.log( resp ); 
          nombre = resp.name; 
          detalle = resp.detalle; 
          description = resp.description; 
          $('#edit-title-talla').val(nombre);  
          $('#edit-description-talla').val(description); 
          $('.edit-summernote').summernote('code', detalle);  
          $("#overlay").fadeOut(100);　 
          $("#editTalla-modal").modal('toggle'); 
        }
      }); 

    }  
  
    $('.saveProductTallas').click( function() {
      var title_talla = $('#title-talla').val(); 
      var description_talla = $('#description-talla').val();  
      var detalle_talla =  $('.summernote').summernote('code');  
      $.ajax({
        'url' : "{{asset('saveTalla')}}", 
        'method' : "POST",  
        'data' : { 
          'title_talla' : title_talla,  
          'description_talla' : description_talla,  
          'detalle_talla' : detalle_talla, 
          'cat_talla' : parent_talla
        },  
        'success' : function( resp ) {
          window.location.reload(); 
        } 
      });
    }); 
 


  </script>

 