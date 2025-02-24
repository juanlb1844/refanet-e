@extends('Admin.layout')
<style type="text/css">
   .t-l {
      text-align: left;
    } 
   .element-gallery {
      height: 200px;
      width: 200px;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      border: 1px solid #c7c7c7;
      display: inline-block;
   }
  .btn-colors {
    width: 70px; 
  }
  .text-to-left {
    text-align: left;
  }
</style>

<style type="text/css">
  .table-container {
    padding-top: 40px; 
  }
  .title-edit-product { 
    font-size: 25px; display: inline-block; font-weight: 900;
  }
  .to-product {
    font-weight: bolder; font-size: 17px;  
  }

  .main-form {
    display: inline-block!important; width: auto!important; margin-bottom: 20px!important;
  }

  .header-section-product {
    border: 1px solid #c9c9c9; border-radius: 4px; padding-top: 10px;
  }
  .get-controls button, .get-controls input {
    display: inline-block!important;
  }
  .get-controls fieldset { text-align: center; }
  .get-controls fieldset p { margin: 0px; }
  .get-controls fieldset label { margin-left: 10px; }
  .get-controls .pick-color-pack {
    display: inline-block; 
    width: 3em; height: 3em; 
    border-radius: 50%;
    background-color: #ff7676; 
    border: 2px solid black;
    background-position: center;
    background-size: cover;
  }
   .get-controls {
    border: 1px solid #dddddd;
    border-radius: 4px;
    padding: 10px 10px;
  }
  .aside-color-set {
    display: inline-block;
    text-align: center;
  }

  input[type='color'] {
  padding: 0;
  width: 150%;  
  height: 150%;
  margin: -25%;
}

.cp_wrapper {
  overflow: hidden;
  width: 3em;
  height: 3em;
  display: inline-block;
  border-radius: 50%;
  box-shadow: 1px 1px 3px 0px grey;
}
</style> 
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">
 
<link rel="stylesheet" type="text/css" href="{{asset('js/sortable/theme.css')}}">
<script type="text/javascript" src="{{asset('js/sortable/Sortable.min.js')}}"></script>
<!-- cropper --> 
<link rel="stylesheet" type="text/css" href="{{asset('/css/cropper.css')}}">
<!-- // cropper -->  

<style type="text/css">
  /*UPLOAD TO GENERIC */ 
  .btn-warning { 
      border-radius: 12px!important;
      font-weight: 900!important; 
  }
  /* STYLES FORMS */ 
  /* could be important .. */ 
  .text-cbi {
    font-weight: bolder; 
  }
  select option { font-weight: bolder; }
  .bolder { font-weight: bolder!important; }
  /* CUSTOM DROPZONE */ 
  .dz-message {
    margin: 1em 0px!important;
  }
  /* CUSTOM DROPZONE */ 
  .dropzone { border: 4px dotted #8d76a1; height: 80px; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px;}
  .dropzone:hover { border: 4px solid #60d192; }
  #drop-mge { font-weight: bolder; font-size: 12px; }
  .delete-img { 
    padding: 1px 10px!important;
    background-image: url('{{asset('media/delete.svg')}}')!important;
    background-position: center!important;
    background-size: 15px!important;
    background-repeat: no-repeat!important;
  }
  .move-img {
    padding: 1px 10px!important;
    background-image: url('{{asset('/media/move.svg')}}')!important;
    background-position: center!important;
    background-size: 15px!important;
    background-repeat: no-repeat!important;
  }
  .option-to-move:hover{
    cursor: pointer;
    background-color: #f5f5f5; 
  }
  .edit-alias:hover{
    cursor: pointer;
    font-weight: bolder; 
  }
  .edit-alias {
    font-size: 10px; 
  }
</style>


<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
  <div class="panel-right">  
      <!-- header section --> 
      <div class="col-lg-12 table-container">


    <label style="display: none;" class="label" data-toggle="tooltip" title="Sube la imagen principal">
      <img class="rounded" id="avatar" width="120px" src="https://www.prestophoto.com/storage/static/landing/pdf-book-printing/upload-icon.png" alt="avatar">
      <input type="file" class="sr-only" id="input" name="image" accept="image/*">
    </label> 
    <div style="display: none;" class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>

    <div class="alert" role="alert"></div>
        <div class="col-lg-3">
          <?php $nuevo = true;  if( strpos( url()->full(), "new" ) !== false ) $nuevo = false; ?>
            <span class="title-edit-product">@if( $nuevo ) {{$_product->title}} @endif  </span>
        </div> 
        <div class="col-lg-7">
          @if( $nuevo ) 
            <a class="to-product" target="_blank" href="{{asset('producto/'.$_product->nparte.'/pack/0')}}"> 
              {{asset('producto/'.$_product->nparte.'/pack/0')}}
            </a>
          @endif 
        </div>
        <div class="col-lg-2"> 
          <label class="text-cbi">ESTATUS</label>
          <select class="form-control bolder status-product"> 
            <option value="1">Activo</option>  
            <option value="0">Inactivo</option>
          </select>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="col-lg-3">
          <a href="#pricesField">#Precios</a>
        </div>
        <div class="col-lg-3">
          <a href="#descriptions">#Descripciones</a>
        </div>
        
      </div>
    
    <div class="col-lg-12">
      <div>
            <div class="col-lg-12">
             <div class="row header-section-product">
                <div class="col-lg-4 text-to-left"> 
                    <label>PAQUETES</label> 
                    <!-- 
                    <select class="form-control list-packs">
                        <option>..</option>
                    </select>
                    <br> <br> -->   
                    @if( $nuevo )
                      <button class="btn primary" id="agregarPaquete">Agregar otro paquete</button>
                      <p>&nbsp;</p>
                      <input class="form-control" id="paqueteId" placeholder="Etiqueta del paquete" type=" " name="">
                    @else 
                      <p>Primero guarda el producto y podrás agregarle paquetes</p>
                    @endif

                </div> 
                <div class="col-lg-4 text-to-left">
                    <label>Tipo de publicación</label>
                    <select id="typeProduct" class="form-control">
                        <option value="paquete">Por paquete</option>
                        <option value="colores">Por colores</option>
                    </select>
                <!-- 
              <div class="col-lg-12 row-colores" style="display: none">
              <div class="col-lg-2">
                <br>   
                  <label>Colores</label>
              </div>
              <div class="col-lg-4"> 
                 <br>
                  <select class="form-control list-colors" name="cars" id="cars" multiple>
                       <option value="#FFFFF" style="background-color: red;"></option> 
                  </select>
                 <br> 
              </div>
                  <div class="col-lg-2">
                    <br> 
                    <div class="cp_wrapper">
                      <input class="color-picker" style="display: block;" type="color"> 
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <br> 
                    <button id="add-color" class="btn btn-colors">Agregar</button>
                    <br>   
                    <button style="margin-top: 10px;" id="delete-color" class="btn btn-colors">Borrar</button>
                  </div>
              </div> --> 
              <div class="col-lg-12 row-paquete" style="display: none; padding-bottom: 10px;">
                  <!-- <span>Este producto contendrá colores variados: </span>
                  <img id="add-colors" src="{{asset('palette.png')}}" style="width: 40px;"> --> 
              </div> 
            </div>
            <div class="col-lg-1" style="text-align: left;"> 
                    <label>Marca</label> 
                </div>
            <div class="col-lg-3"> 
                <select class="form-control select-marca">
                  <option value="0">...</option>
                  @foreach( $marcas as $marca )
                    <option value="{{$marca->id}}" >{{$marca->nombre}}</option>
                  @endforeach                                             
                </select> 
                <br> 
            </div>
            <div class="col-lg-1" style="text-align: left;">
                    <label>Familia</label> 
                </div>
            <div class="col-lg-3"> 
                <select class="form-control select-familia">
                    <option value="0">...</option>
                  @foreach( $familias as $familia )
                    <option value="{{$familia->id}}" >{{$familia->nombre}}</option>
                  @endforeach                                             
                </select> 
                <br> 
            </div>
            </div>
            <div class="row" style="padding-top: 20px; ">
                <div class="col-lg-6 text-to-left">
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
                   <label class="list-categories-add">CATEGORÍAS</label> 
                    <div class="list-categories">
                      <span class="span-element">Categoría</span>
                    </div>
                    <br> <br> 
                </div> 
                <div class="col-lg-3">
                    <label>ID COMERCIAL</label>
                    <!-- <label>ID COMERCIAL <button class="btn-xs btn btn-primary" onclick="comercia()">Consultar en comercia</button></label> --> 
                    <br> 
                    <input id="comercial-field-edit" class="form-control" type="" name="">
                    <br> 
                </div>
                <div class="col-lg-3">
                    <label>SKU</label>
                    <br> 
                    <input id="sku-field-edit" class="form-control" type="" name="">
                    <br> 
                </div>

 
                <div class="col-lg-12">
                <div class="col-lg-1">
                    <label>Título</label>
                </div>
                <div class="col-lg-11">
                    <input id="title-field-edit" class="form-control" type="" name="">
                    <br>  
                </div>
            </div>

                <style type="text/css"> 
                  .pack-tallas {
                    border-radius: 10px;  
                    background-color: whitesmoke;  
                    margin-bottom: 7px;
                    padding: 10px;     
                    min-height: 175px!important; 
                    display: flow-root;
                  }
                  .borrar-paquete:hover { cursor: pointer; background-color: #a2a2a2; }
                  .borrar-paquete {
                    position: absolute; 
                    right: 10px; 
                    top: 0px; 
                    background-color: #c9c9c9; 
                    font-size: 30px!important;
                    padding-top: 0px; 
                    line-height: 30px; 
                    text-align: center; 
                    height: 25px; 
                    width: 25px;    
                    border-radius: 7px; 
                    display: inline-block;
                  }
                </style> 
 
                <div class="col-lg-12 col-sm-12 container-tallas-pack np">
                  <!-- ROWS DE TALLAS  --> 
                    <!-- // --> 
                  <!-- // --> 
                </div>

            </div> 
            <div class="row" style="border: 1px solid #d7d7d7; border-radius: 10px; padding: 20px 10px; margin-top: 20px; ">  
              <div class="col-lg-12 col-md-12 col-xs-12 container-galleries"> 
                <!-- ROWS DE GALERÍAS --> 
                    <!-- --> 
                <!-- // --> 
              </div> 
            </div> 
            

            </div>
            <div class="col-lg-12 np" style="padding-top: 10px;">
                <div class="col-lg-2 text-to-left" style="display: none;">
                    <label>Existencia general</label>    
                    <br> 
                    <input id="existencia-field-edit" value="1" class="form-control" type="" name="">
                    <br>  
                </div> 
                <div class="col-lg-2 text-to-left" style="display: none;">
                    <label>Piezas que contiene</label>    
                    <br> 
                    <input id="existencia-field-edit" value="1" class="form-control" type="" name="">
                    <br> 
                </div>
                <div class="col-lg-12 np">
                  <div style="border: 1px solid #e2e2e2; border-radius: 7px; display: inline-block; padding: 10px 10px; margin-top: 20px;">
                    <div class="col-lg-4 text-to-left">
                        <label>Precio público</label>
                          <div id="pricesField" class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit" class="form-control" type="" name=""> </div>
                        <br>  
                    </div>
                    <div class="col-lg-4 text-to-left">
                        <label>Precio promocional</label>
                          <div class="input-group"> 
                            <div class="input-group-addon">$</div> 
                              <input id="price-promo-field-edit" class="form-control" type="" name=""> 
                            </div>
                        <br>  
                    </div>
                    <div class="col-lg-4 text-to-left" style="text-align: center;">
                          <div style="font-size: 20px;">
                            <label>Activo/inactivo</label>
                          </div>
                          <input id="checkPromo" type="checkbox" name="" style="transform: scale(2)!important;">
                        <br>  
                    </div>
                  </div>
                </div>
            </div>
  
            <div class="col-lg-12" style="border: 1px solid #e2e2e2; margin: 20px 0px; padding: 10px 0px; border-radius: 7px;">
              <div class="col-lg-2 text-to-left">
                    <label>Precio especial 1</label>
                      <div class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit-1" class="form-control" type="" name=""> </div>
                    <br>  
              </div>
              <div class="col-lg-2 text-to-left">
                    <label>Precio especial 2</label>
                      <div class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit-2" class="form-control" type="" name=""> </div>
                    <br>  
              </div>   
              <div class="col-lg-2 text-to-left">
                    <label>Precio especial 3</label>
                      <div class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit-3" class="form-control" type="" name=""> </div>
                    <br>   
              </div> 
              <div class="col-lg-2 text-to-left">
                    <label>Precio especial 4</label>
                      <div class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit-4" class="form-control" type="" name=""> </div>
                    <br>  
              </div> 
              <div class="col-lg-2 text-to-left" style="display: none;">
                    <label>Precio especial 5</label>
                      <div class="input-group"> <div class="input-group-addon">$</div> <input id="price-field-edit-5" class="form-control" type="" name=""> </div>
                    <br>   
              </div>
              <div class="col-lg-4" style="text-align: center;">
                    <label style="font-size: 20px;">PRECIOS APROBADOS</label>
                      <div class="input-group" style="display: block;">   
                          <input type="checkbox" class="precios-aprobados" name="" style="transform: scale(2)!important;">
                       </div>
                    <br>     
              </div>
            </div>
            
            <div class="col-lg-12">
                <div class="col-lg-3" id="descriptions">
                    <label>Descripcion corta</label>
                </div>
                <div class="col-lg-9">
                    <div class="summernote_descripcion"></div>
                    <br>  
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <label>Descripcion larga</label>
                </div>
                <div class="col-lg-9">
                    <div class="summernote_descripcion_larga"></div>
                    <br>  
                </div>
            </div> 
            <!-- 
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <label>Vídeo <img src="https://assets.stickpng.com/images/580b57fcd9996e24bc43c545.png" style="width: 40px;"></label>
                </div>
                <div class="col-lg-9">
                    <input class="form-control video-url" type="" name="">
                    <br>  
                </div>
            </div> --> 
       
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="toBack()">Atrás</button>
        <button type="button" class="btn btn-warning deleteProduct">Borrar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="saveProduct(false)">Guardar</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal" onclick="saveProduct(true)">Guardar y salir</button>
      </div>
 
  
                </div> 
          </div>
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
      background-image: url({{asset('/icons/galeria.svg')}})!important;
      background-position: center!important;
      background-size: 15px!important;
      background-repeat: no-repeat!important;
    }
    .grid-square { padding: 2px!important; }
  </style>


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


  <!-- Modal -->
<div id="copyImg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Copiar a </h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
                <div class="">
                  <ul class="body-options-to-move">
                    <!-- -->
                  </ul>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal -->
<div id="editLabel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar etiqueta</h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
                <div class="">
                   <input id="label-to-edit" class="form-control" type="" name="">
                </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="saveLabel" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>




 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!-- cropper --> 
<script type="text/javascript" src="{{asset('js/cropper.js')}}"></script>
<!-- cropper -->  




  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Selecciona la sección para subir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container" style="text-align: center;">
              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="crop">Cortar</button>
          </div>
        </div>
      </div>
    </div>

     <div class="modal fade" id="modal-crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Selecciona la sección para cortar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container" style="text-align: center;">
              <img id="image-to-crop" src="https://avatars0.githubusercontent.com/u/3456749" style="width: 40%; display: inline-block;">
            </div>
            <div>
              <img id="result-crop" src="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="crop-img">Cortar</button>
          </div>
        </div>
      </div>
    </div>


     <div class="modal fade" id="modal-mini" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Imagen miniatura</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img style="width: 100px;" id="img"/> 
            <img style="width: 300px;" id="img2"/> 
            <img style="width: 400px;" id="img3"/> 
            <p></p>
            <span>Color de fondo</span>
            <input type="color" id="fillColor" value="#ffffff" name="" style="width: 30px; margin: 0px; height: 20px;">
            <h2></h2>
            <div class="img-container" style="text-align: center;">
              <img class="img-min" id="img-min" src="">
            </div>
            <div>
              <img id="result-crop" src="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="crop-img-min">Cortar</button>
          </div>
        </div>
      </div>
    </div>




     <div class="modal fade" id="modal-comercia-data" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Datos comercia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <!--<button type="button" class="btn btn-primary" id="crop-img-min">Cortar</button>--> 
          </div>
        </div>
      </div>
    </div>




<style type="text/css">
  html {
  scroll-behavior: smooth;
}

#modal-crop .cropper-crop-box, #modal-crop .cropper-view-box {
    border-radius: 50%;
}

.cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
}

.cropper-crop-box {
  background-color: white!important;
}
</style>




    <script>

    var to_crop_ = null; 
    var cropper = null;  
    function croppImg( id ) {
       to_crop_ = id;
       $('#image-to-crop').attr('src', ( $( $('.content-gallery'+id+' .element-gallery')[0] ).attr('link') )); 
       $('#modal-crop').modal('toggle'); 
        var image = document.querySelector('#image-to-crop');
        var result = document.querySelector('#result-crop');
        if( cropper !== null ) {
        	cropper.destroy();
        }
        cropper = new Cropper(image, {
        ready: function () {
          var image = new Image();

          image.src = cropper.getCroppedCanvas().toDataURL('image/jpeg');
          result.appendChild(image);
        },
        aspectRatio: 1,
          viewMode: 2,
          data:{ //define cropbox size
            width: 100,
            height: 100,
        },
      });

      $('#crop-img').click( function() {
      	$('.modal-backdrop').css("display", "none");    

        var initialAvatarURL;
        var canvas;
        $modal.modal('hide');
		//$('#overlay').fadeIn(300); 
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 100,
            height: 100, 
            aspectRatio: 1,
          viewMode: 2,
          });
          initialAvatarURL = avatar.src; 
          //avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) { 
            var formData = new FormData();

            formData.append('avatar', blob, nameImg+'.jpg');
            formData.append('id',  to_crop_); 

             $('#modal-crop').modal('toggle'); 

            $.ajax('{{asset("cargarImgagenAct")}}', {
              method: 'POST',
              data: formData,
              processData: false,
              contentType: false,

              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function ( resp ) {
                $alert.show().addClass('alert-success').text('Se ha subido la imagen');
                console.log(resp); 
                $('.pick-color-pack-'+to_crop_).css("background-image", 'url('+resp+')'); 
                $('#prev-img').attr('src', 'https://at-cabo.com/public/uploads/'+nameImg+'.jpg'); 
                $('#prev').attr('href', 'https://at-cabo.com/public/uploads/'+nameImg+'.jpg'); 
                $('#prev').text('https://at-cabo.com/public/uploads/'+nameImg+'.jpg');
                //window.location.reload(); 
                //$('#overlay').fadeOut(300); 
                $('.modal-backdrop').css("display", "none");    
              },

              error: function () {
                avatar.src = initialAvatarURL; 
                $alert.show().addClass('alert-warning').text('Error al subir');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      }); 

    }

    //////////////////////////////// 

      var avatar = document.getElementById('avatar'); 
      var image  = document.getElementById('image');
      var input  = document.getElementById('input');
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal');
      var cropper;
      var nameImg = Date.now(); 


    window.addEventListener('DOMContentLoaded', function () {
       
      $('[data-toggle="tooltip"]').tooltip();

      input.addEventListener('change', function (e) {
        
        var files = e.target.files;
        console.log( files.length ); 

        var done = function (url) {
          input.value = '';
          image.src = url;
          $alert.hide();
          $modal.modal('show');
        };  

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
          file = files[0];

          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
      });

      $modal.on('shown.bs.modal', function () {

        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 4,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null; 
      });

      document.getElementById('crop').addEventListener('click', function () {
         
        var initialAvatarURL;
        var canvas;
  
        $modal.modal('hide');

        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 100,
            height: 100, 
          });
          initialAvatarURL = avatar.src;
          //avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar', blob, nameImg+'.jpg');
            formData.append('id',  66122); 

            $.ajax('{{asset("cargarImgagenAct")}}', {
              method: 'POST',
              data: formData,
              processData: false,
              contentType: false,

              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function ( resp ) {
                $alert.show().addClass('alert-success').text('Se ha subido la imagen');
                console.log(resp); 
                $('#prev-img').attr('src', 'https://at-cabo.com/public/uploads/'+nameImg+'.jpg'); 
                $('#prev').attr('href', 'https://at-cabo.com/public/uploads/'+nameImg+'.jpg'); 
                $('#prev').text('https://at-cabo.com/public/uploads/'+nameImg+'.jpg');
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('Error al subir');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });
    });
  </script>



<!-- ---------------------------------- --> 

<script type="text/javascript"> 

function comercia() {
  let sku_comercia = $('#comercial-field-edit').val(); 
  $('#overlay').fadeIn(); 
  $('#modal-comercia-data .modal-body').html(""); 
  $.ajax({
    'url' : '{{asset("getFromComercia")}}/'+sku_comercia.trim(), 
    'method' : 'get', 
    'success' : function(resp) {
      console.log(resp); 
      resp = JSON.parse(resp); 
       $('#overlay').fadeOut(); 
       $('#modal-comercia-data').modal('toggle'); 
       appendComercia( "sku", resp["sku"] ); 
       appendComercia( "modelo", resp["modelo"] ); 
       appendComercia( "description", resp["description"] ); 
       appendComercia( "unidad", resp["unidad"] ); 

       appendComercia( "existencia", resp["existencia"] ); 
       appendComercia( "disponible", resp["disponible"] ); 
       appendComercia( "precioConIVA1", resp["precioConIVA1"] ); 
       appendComercia( "precioSinIVA1", resp["precioSinIVA1"] ); 
       appendComercia( "tasaDescuento1", resp["tasaDescuento1"] ); 
       appendComercia( "descuento1", resp["descuento1"] ); 
       appendComercia( "precioNetoSinIVA1", resp["precioNetoSinIVA1"] ); 
       appendComercia( "IVA1", resp["IVA1"] ); 
       appendComercia( "precioNetoConIVA1", resp["precioNetoConIVA1"] ); 
       appendComercia( "precioConIVA2", resp["precioConIVA2"] ); 

       appendComercia( "precioSinIVA2", resp["precioSinIVA2"] ); 
       appendComercia( "tasaDescuento2", resp["tasaDescuento2"] ); 
       appendComercia( "descuento2", resp["descuento2"] ); 
       appendComercia( "precioNetoSinIVA2", resp["precioNetoSinIVA2"] ); 
       appendComercia( "IVA2", resp["IVA2"] ); 
       appendComercia( "precioNetoConIVA2", resp["precioNetoConIVA2"] ); 
       appendComercia( "precioConIVA3", resp["precioConIVA3"] ); 
       appendComercia( "precioSinIVA3", resp["precioSinIVA3"] ); 
       appendComercia( "tasaDescuento3", resp["tasaDescuento3"] ); 
       appendComercia( "descuento3", resp["descuento3"] ); 

       appendComercia( "precioNetoSinIVA3", resp["precioNetoSinIVA3"] ); 
       appendComercia( "IVA3", resp["IVA3"] ); 
       appendComercia( "precioNetoConIVA3", resp["precioNetoConIVA3"] ); 
       appendComercia( "precioConIVA4", resp["precioConIVA4"] ); 
       appendComercia( "precioSinIVA4", resp["precioSinIVA4"] ); 
       appendComercia( "tasaDescuento4", resp["tasaDescuento4"] ); 
       appendComercia( "descuento4", resp["descuento4"] ); 
       appendComercia( "precioNetoSinIVA4", resp["precioNetoSinIVA4"] ); 
       appendComercia( "IVA4", resp["IVA4"] ); 
       appendComercia( "precioNetoConIVA4", resp["precioNetoConIVA4"] ); 

       appendComercia( "precioConIVA5", resp["precioConIVA5"] ); 
       appendComercia( "precioSinIVA5", resp["precioSinIVA5"] ); 
       appendComercia( "tasaDescuento5", resp["tasaDescuento5"] ); 
       appendComercia( "descuento5", resp["descuento5"] ); 
       appendComercia( "precioNetoSinIVA5", resp["precioNetoSinIVA5"] ); 
       appendComercia( "IVA5", resp["IVA5"] ); 
       appendComercia( "precioNetoConIVA5", resp["precioNetoConIVA5"] ); 
       appendComercia( "tasaIVA", resp["tasaIVA"] ); 
       appendComercia( "costo", resp["costo"] ); 
       appendComercia( "pesoPromedio", resp["pesoPromedio"] ); 
       appendComercia( "metal", resp["metal"] ); 
       appendComercia( "quilataje", resp["quilataje"] ); 
       appendComercia( "linea", resp["linea"] ); 
       appendComercia( "familia", resp["familia"] ); 

       
       
    }
  }); 
}

function appendComercia( name, data ) {
  $('#modal-comercia-data .modal-body').append("<p>"+name+" : <span style='font-weight: bolder;'>"+ data +"<span></p>"); 
}

$('#checkPromo').change( function( e ) {
  let check = $('#checkPromo').is(':checked'); 
  let promo = $('#price-promo-field-edit').val().trim(); 
  if( check && promo.length > 0 ) {

  } else if( check ) {
    alert("Tienes que asignar un precio promocional para activarlo"); 
    $("#checkPromo").prop( "checked", false );
  }
}); 

  // Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

    $('.deleteProduct').click( function() {
        if( confirm("Desea borrar el producto?")) {
          $.ajax({
                'url' : "{{asset('deleteProduct')}}", 
                'data' : { 
                  'nparte' : sku_loaded
                }, 
                'method' : 'post', 
                'success' : function( resp ) {
                  console.log( resp ); 
                  window.location.href = "{{asset('productos2')}}"+"?filter=all&imgs=1&last=1"; 
                }
          }); 
        }
    }); 

    $('#crop-img-min').click( function() { 
  
      $('#img').attr('src', cropper_min.getCroppedCanvas({ width: 100, height: 100, fillColor: $('#fillColor').val()
 }).toDataURL('image/jpeg') ); 
      $('#img2').attr('src', cropper_min.getCroppedCanvas({ width: 450, height: 450, fillColor: $('#fillColor').val() 
}).toDataURL('image/jpeg') ); 
      $('#img3').attr('src', cropper_min.getCroppedCanvas({ width: 550, height: 550, fillColor: $('#fillColor').val() 
 }).toDataURL('image/jpeg') );  
  
      function dataURLtoBlob(dataurl) {
          var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
              bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
          while(n--){
              u8arr[n] = bstr.charCodeAt(n);
          }
          return new Blob([u8arr], {type:mime});
      } 

      var formData = new FormData();

      formData.append('avatar',  dataURLtoBlob( cropper_min.getCroppedCanvas({ width: 200, height: 200, fillColor: $('#fillColor').val()
 }).toDataURL('image/jpeg')), Date.now()+'-small.jpg');
      formData.append('avatar2',  dataURLtoBlob( cropper_min.getCroppedCanvas({ width: 550, height: 550, fillColor: $('#fillColor').val() 
}).toDataURL('image/jpeg')), Date.now()+'-medium.jpg'); 

      formData.append('avatar3',  dataURLtoBlob( cropper_min.getCroppedCanvas({ width: 1500, height: 1500, fillColor: $('#fillColor').val() 
 }).toDataURL('image/jpeg')), Date.now()+'-medium.jpg');  
      formData.append('id',  $('.imagen-'+min_id).attr('paquete')); 
      formData.append('idimg',  min_id);    
 
      $.ajax('{{asset("cargarImagenMins")}}', {
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
 
        success: function ( resp ) {
            $('.imagen-'+min_id).css('background-image', 'url("'+resp+'")'); 
            console.log(resp);  
            $('#modal-mini').modal('toggle');   
        }
       
      });

    }); 

    var cropper_min = null; 
    var min_id      = null; 
    function attrsImg( id ) {
      min_id = id; 
      $('.img-min').attr('src',  $('.imagen-'+id).attr('link') ); 
      $('#img').attr('src',  $('.imagen-'+id).attr('link') ); 
      $('#modal-mini').modal('toggle'); 

        var image = document.querySelector('#img-min');
        var result = document.querySelector('#result-crop');
        if( cropper_min !== null ) {
          cropper_min.destroy(); 
        }
        cropper_min = new Cropper(image, {
        ready: function () {
          var image = new Image();

          image.src = cropper_min.getCroppedCanvas().toDataURL('image/jpeg');
          result.appendChild(image);
        },
        aspectRatio: $('#img').height()/$('#img').width(),
          viewMode: 2,
          data:{ //define cropbox size
            width: 1000,
            height: 1200,
        },
      });

    }

     function borrarFoto( idFoto ) {
      if( confirm('¿Estás seguro de borrar esta imágen?')) {
        $("#overlay").fadeIn(300);　 
        $.ajax({
          'url' : '{{asset('borrarFoto')}}', 
          'data': { 'idImg' : idFoto }, 
          'method' : 'POST', 
          'success' : function( resp ) {
            $("#overlay").fadeOut(300);　
            $('.imagen-'+idFoto).slideUp();
          }
        }); 
      }   
     }

     // categorías 
     function deleteThis(event) {
        console.log( event ); 
        $('.cat-'+event).remove(); 
      }
     // categorías => desplegar modal 
     $('.list-categories-add').click( function() {
        $('#myModal').modal('show');  
      }); 
     // atrás 
      function toBack() { 
          window.location.href = "{{asset('productos2')}}"+"?filter=all&imgs=1&last=1"; 
      }

      function saveProduct( reditection ) {
            var photos = new Array(); 
            $('.element-gallery input').each( function(a, b) { 
                photos.push( { "id" : $(b).attr('idphoto'), "val" :  $(b).is(':checked') });  
             });  
            
            var sku    = $('#sku-field-edit').val();
            var comercial_id = $('#comercial-field-edit').val().trim(); 
            var title  = $('#title-field-edit').val(); 
            let existencia = $('#existencia-field-edit').val();  

            var idCats = new Array(); 
            $('.span-element').each( function( a , b ) { idCats.push( $(b).attr('idcat') ); } );
            
            var tallas = $('.multipleSelect').val(); 

            // multitallas 
            var tallas_etiquetadas = Array();  
            var cantidad_paquete   = Array(); 
            let inter_row = Array(); 
            id_paquetes.forEach(function( a, b) {  
                cantidad_paquete.push( { 'index' : a, 'existencia': $('.existencia-'+a).val() });
                resp = $('.multipleSelect'+a).val();  
                inter_row = Array(); 
                resp.forEach( function (c , d ) { 
                    console.log( $('.existencias-'+a+' .ex-'+c).val() );
                    console.log( c );
                    inter_row.push( {'talla' : c, 'cantidad' : $('.existencias-'+a+' .ex-'+c).val() } );  
                });  
                  tallas_etiquetadas.push( {'index' : a, 'resp' : inter_row }); 
            });   
            console.log( tallas_etiquetadas ); 
            console.log( cantidad_paquete ); 
 
            var arreglo_colores = new Array(); 
            $('.list-colors option').each( function( a, b ) {  
              arreglo_colores.push( b.value); 
            }); 
            
            //console.log( tallas );   
            var paquete        = $('.list-packs').val(); 
            var tallas_detalle = ""; 
            var tipo_producto  = $('#typeProduct').val();   
            if( tipo_producto == "colores") {
              tipo_producto = "individual"; 
            } else {
              tipo_producto = "paquete"; 
            }
    
            let desc_short_product = $('.summernote_descripcion').summernote('code');  
            let desc_long_product  = $('.summernote_descripcion_larga').summernote('code');  
            
            var product_price = $('#price-field-edit').val();
            var product_price_1 = $('#price-field-edit-1').val();
            var product_price_2 = $('#price-field-edit-2').val();
            var product_price_3 = $('#price-field-edit-3').val();
            var product_price_4 = $('#price-field-edit-4').val();
            var product_price_5 = $('#price-field-edit-5').val();

            var video = $('.video-url').val(); 

            var familia_id     = $('.select-familia').val(); 
            var marca_id       = $('.select-marca').val(); 
            let status_product = $('.status-product').val();  

            let check_precios = 0; 
            if( $('.precios-aprobados').prop('checked') ) {
                check_precios = 1; 
            } else {
                check_precios = 0; 
            }

            let checkPromo = 0; 
            if( $('#checkPromo').prop('checked') ) {
                checkPromo = 1; 
            } else {
                checkPromo = 0; 
            }
 
            let promo_price = $('#price-promo-field-edit').val(); 

            if( sku.length < 2 || title.length < 2  ) {
                  alert("Asegúrate de llenar todos los campos"); 
            } else {
              $("#overlay").fadeIn(300); 
              $.ajax({    
                  'url' : "{{asset('saveProduct')}}",   
                  'method' : 'POST',   
                  'data' : {'sku'             : sku, 
                            'comercial_id'    : comercial_id, 
                            'title'           : title, 
                            'tipo_producto'   : tipo_producto, 
                            'photos'          : photos,  
                            'cat'             : idCats,       
                            'tallas'          : tallas,  
                            'paquete'         : paquete,  
                            't_detalle'       : tallas_detalle, 
                            'arreglo_colores' : arreglo_colores,
                            'desc_short'          : desc_short_product,
                            'desc_long'           : desc_long_product, 
                            'existencia'          : existencia, 
                            'tallas_etiquetadas'  : (tallas_etiquetadas), 
                            'existencia_paquetes' : cantidad_paquete,
                            'product_price'  : product_price,  
                            'product_price_1' : product_price_1, 
                            'product_price_2' : product_price_2, 
                            'product_price_3' : product_price_3, 
                            'product_price_4' : product_price_4, 
                            'product_price_5' : product_price_5, 
                            'paquetes' : id_paquetes, 
                            'marca_id' : marca_id,  
                            'familia_id' : familia_id, 
                            'IS_NEW' : IS_NEW,  
                            'status_product' : status_product, 
                            'check_precios'  : check_precios, 
                            'promo_price' : promo_price, 
                            'video'       : video, 
                            'checkPromo' : checkPromo },  

                  'success' : function(response) {
                      if( IS_NEW == 1 ) {
                        window.location.href = "{{asset('')}}/editProduct/"+response; 
                      } else {
                        window.location.reload(); 
                      }
                      console.log( response ); 
                      $("#overlay").fadeOut(300);
                      addNotification("Se han guardado los cambios", "Hecho!");
                      if( reditection ) window.location.href = "{{asset('productos2')}}"+"?filter=all&imgs=1&last=1"; 

                  }
              }); 
            }

    }  
 
    var paquetes = new Array(); 

    function showProduct( id ) {
      $('.list-packs').html('');  
      updateProduct(id); 
    }

    function formatCantidades(event) {
      let idProduct = ( $(event.target).attr('idProduct') ); 
      let idTo = "existencias-"+idProduct; 
 
      console.log(idProduct);
      console.log(idTo);
    
      $('.'+idTo).html(''); 
      $(event.target).val().forEach( function(a, b) { 
      let cantidad = 0; 
      cantidad = $(".multipleSelect"+idProduct+" option[value='"+a+"']").attr('cantidad') != undefined ? $(".multipleSelect"+idProduct+" option[value='"+a+"']").attr('cantidad') : 0; 

      let layout = '<div class="col-lg-6">  <div class="input-group"> <div class="input-group-addon">'+$(".multipleSelect"+idProduct+" option[value='"+a+"']").text()+'</div> <input class="form-control ex-'+a+' existencia-'+idProduct+'" placeholder="existencia" value="'+cantidad+'"></input> </div> </br></div>'; 
        $('.'+idTo).append( layout ); 
      }); 
    }  

    function saveColorPack( id ) {
      let color = $('.color-pack-'+id).val(); 
      let color_text = $('.color-text-'+id).val();  
      let color_type = $(".container-gallerie-"+id+" input:checked").val();
      let color_fondo = $('.color-pack-fondo-'+id).val(); 
      let status_pack = $('.pack-status-'+id).val(); 
      let pzas = $('.pack-pzas-'+id).val();  
      
      $('#overlay').fadeIn(300);
       $.ajax({ 
        'url' : '{{asset("savePackColor")}}', 
        'method' : 'post',    
        'data'   : {'id' : id, 'color' : color, 'color_text': color_text, 'color_fondo' : color_fondo, 'color_type' : color_type, 'status_pack' : status_pack, 'pzas' : pzas }, 
        'success' : function( resp ) {
          $('#overlay').fadeOut(300)
        }
      }); 
    }
  
    var tallas_select = null;  
    var sku_loaded    = null; 
    var id_paquetes = Array();  
    
    function updateProduct(id) {
        $("#overlay").fadeIn(300);　

        var sku   = ''; 
        var price = ''; 
        var title = '';
        var img   = '';

        //alert(id+"--"); 
          
        $('.list-packs').html('');  
        $('.content-gallery').html('');    

        $.ajax({    
            'url' : "{{asset('/getProductById/')}}/"+id, 
            'method' : 'GET', 
            'success' : function( response ) { 

                 item  = JSON.parse( response );  
                 console.log( item );


                 sku   = item['product'][0].nparte; 
                 id_comercial = item['product'][0].id_interno; 
                 sku_loaded = sku; 
                 price = item['product'][0].price;    
                 title = item['product'][0].title;  
                 img   = item['product'][0].img; 
                 price   = item['product'][0].price; 
                 tipo_producto = item['product'][0].tipo_producto; 

                 let _id_product = item['product'][0].id; 
                 let get_controls = ''; 
                 if( tipo_producto  == 'individual') {
                       $('#typeProduct').val("colores"); 
                       $('.row-colores').css("display", "block");  
                       get_controls = '<div class="get-controls col-lg-12"></div>'; 
                   } else {  
                      $('#typeProduct').val("paquete"); 
                      $('.row-paquete').css("display", "block"); 
                      get_controls = '<div class="get-controls col-lg-12"></div>'; 
                   }
 
 
                 var familia_id = item['product'][0].id_familia;  
                 var marca_id   = item['product'][0].id_marca;

                 var check_precios = item['product'][0].check_precios; 
                 
                 var price_promo = item['product'][0].precio_promocional; 
                 if( price_promo > 0 ) {
                 	$('#price-promo-field-edit').val(price_promo); 
                 }

                 var check_promo = item['product'][0].check_promo; 
                 if( check_promo == 1 ) {
                    $("#checkPromo").prop( "checked", true );
                 }

                 if( check_precios == 1 ) {
                    $(".precios-aprobados").prop( "checked", true );
                 }

                 if( familia_id ) {
                    $(".select-familia option[value='"+familia_id+"']").prop('selected', true);
                 } 
                 if( marca_id ) {
                    $(".select-marca option[value='"+marca_id+"']").prop('selected', true); 
                 }

                 $('.summernote_descripcion').summernote('code', item['product'][0].descripcion_corta);  
                 $('.summernote_descripcion_larga').summernote('code', item['product'][0].descripcion);  

                 $('#img-product').attr('src', img); 
                 $("#sku-field-edit").val(sku); 
                 $("#comercial-field-edit").val(id_comercial); 
                 $('#existencia-field-edit').val( item['product'][0].existencia ); 
                 $('#title-field-edit').val(title); 
                 $('#price-field-edit').val(price);

                 if( item['product'][0].precio_especial_1 > 0 ) {
                 	$('#price-field-edit-1').val(item['product'][0].precio_especial_1);
                 }
                 if( item['product'][0].precio_especial_2 > 0 ) {
                 	$('#price-field-edit-2').val(item['product'][0].precio_especial_2);
                 }
                 if( item['product'][0].precio_especial_3 > 0 ) {
                 	$('#price-field-edit-3').val(item['product'][0].precio_especial_3);
                 }
                 if( item['product'][0].precio_especial_4 > 0 ) {
                	 $('#price-field-edit-4').val(item['product'][0].precio_especial_4);
                 }
                 if( item['product'][0].precio_especial_5 > 0 ) {
                 	$('#price-field-edit-5').val(item['product'][0].precio_especial_5);
                 }

                 $('.video-url').val(item['product'][0].video_yt); 

                 if( item['colores'].length > 0 ) {
                   $('.list-colors').html('');
                   item['colores'].forEach( function(a, b) {
                     $('.list-colors').append('<option value="'+a.code+'" style="background-color:'+a.code+'"></option>'); 
                   });    
                 } else { 
                   $('.list-colors').html(''); 
                 }
 
                  console.log( item['gallery'] );  

                  let different = 0; 
                  let differentCount = 0; 
 
                  $(".status-product option[value='"+item["product"][0].status_post+"']").prop('selected', true);  

                  console.log( item['gallery'] ); 
                  item['gallery'].forEach(function( a, b ) {  
                        
                        a.link = a.link.replace('https://begima.com.mx/', 'http://localhost/begima_2/public_html_tmp/public_html/'); 
                        
                        var photo = '<img id="img-product" src="'+a.link+'">'; 
                        if( a.idProd == 0 || a.idProd != different ) {
                            different = a.idProd; 
                            //alert(a.idProd); 
                            differentCount++;    

                            let splited = "";  
                            if( a. id_paquete ) {
                              splited = a.id_paquete.split(' ').join('-')
                            }

                            $('.body-options-to-move').append('<li onclick="moverFotoTo(\''+a.idProd+'\')" data-dismiss="modal" class="option-to-move"><h4>'+a.id_paquete+'</h4></li>'); 

                            $('.container-galleries').append('<div id="id-'+a.idProd+'" class="row-cont-gallerie container-gallerie-'+a.idProd+'"> ' + 
                                            '<div class="col-lg-12 text-to-left">' + 
                                                ' <h2>Galería paquete ['+a.id_paquete+'] <span class="edit-alias" onclick="editLabel(\''+a.idProd+'\', \''+a.id_paquete+'\')">editar</span> <a href="#id-header-'+splited+'">Cabecera</a> </h2>'+get_controls+  
                                            '</div>' +
                                            '<div class="col-lg-10 content-gallery'+a.idProd+' text-to-left" style="height: 200px; overflow-y: auto;">'+ 
                                            '</div>'+ 
                                          '</div>'); 
                        }
                         
                        if( a.status == '1') { 
                            var photo = '<div class="element-gallery grid-square imagen-'+a.id+'" paquete="'+a.idProd+'" link="'+a.link+'" style="background-image: url('+a.link+');"><input type="checkbox" class="status-photo" checked="" idphoto="'+a.id+'" /> <button onclick="moverFoto(\''+a.id+'\', \''+a.link+'\')" class="btn btn-default pull-right move-img">&nbsp;</button><button onclick="attrsImg(\''+a.id+'\')" class="btn btn-default pull-right attrsImg">&nbsp;</button><button onclick="borrarFoto(\''+a.id+'\')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>';
                        } else {
                            var photo = '<div class="element-gallery grid-square" style="background-image: url('+a.link+');"><input type="checkbox" class="status-photo" idphoto="'+a.id+'"/> </div>'; 
                        }

                        $('.content-gallery'+a.idProd).append( photo ); 
    
                    var gridDemo = $('.content-gallery'+a.idProd)[0];  
                    // Grid demo
                    new Sortable(gridDemo, {
                        animation: 150,
                        ghostClass: 'blue-background-class', 
                        // Element dragging started
                            onEnd: function (/**Event*/evt) { 
                              console.log( evt.oldIndex );    
                              let paquete = $(evt.item).attr('paquete');  
                              let link    = $(evt.item).attr('link'); 
                              console.log( $(evt.item).attr('link') ); 
                              
                              let imgs = Array(); 
                              console.log(".."); 
                              $($(evt.item).parent()).find('.element-gallery').each( function(a, b) {
                                console.log($(b).attr('link'));  
                                imgs.push($(b).attr('link')); 
                              }); 
                              console.log(imgs); 
                              console.log(".."); 
                              $.ajax({  
                                'url' : "{{asset('updateMainImg')}}",
                                'data' : { 
                                  'paquete' : paquete,  
                                  'link'    : link, 
                                  'imgs'    : imgs 
                                },   
                                'method' : 'post',  
                                'success' : function( resp ) {
                                  console.log( resp ); 
                                } 
                              }); 
                              console.log( evt.to );   // element index within parent
                            },
                    });

                  } );


                  console.log(item['multiple_tallas']);  
                  console.log( item['cantidades'] );  
 
                  // por paquete 
                  item['paquetes'].forEach(function( a, b ) { 
                          
                          let color_set = ''; 
                          if( a.tipo_color == 'color') {
                             color_set = '<div class="col-lg-2"> <fieldset><p>Mostrar</p><label><input checked type="radio" name="color-'+a.id+'" value="color">Color</label><label><input type="radio" name="color-'+a.id+'" value="textura">Textura</label></fieldset></div>'; 
                          } else if( a.tipo_color == 'textura' ) {
                             color_set = '<div class="col-lg-2"> <fieldset><p>Mostrar</p><label><input type="radio" name="color-'+a.id+'" value="color">Color</label><label><input checked type="radio" name="color-'+a.id+'" value="textura">Textura</label></fieldset></div>';
                          } else {
                              color_set = '<div class="col-lg-2"> <fieldset><p>Mostrar</p><label><input type="radio" name="color-'+a.id+'" value="color">Color</label><label><input type="radio" name="color-'+a.id+'" value="textura">Textura</label></fieldset></div>';
                          }

                          let pzas_pack = 0; 
                          if( a.pzas_pack != null ) { pzas_pack = a.pzas_pack; }
                          let active_1 = ''; 
                          let active_2 = ''; 
                          if( a.status_pack == 1 ) {
                            active_1 = 'selected'; 
                          } else {
                            active_2 = 'selected'; 
                          }
                          let campos_extra = '<div class="col-lg-2"> <label>Estatus</label><select class="form-control pack-status-'+a.id+'"><option value="1" '+active_1+'>Activo</option><option value="0" '+active_2+'>Inactivo</option></select></div><div class="col-lg-2"> <label>Contenido (pzas)</label> <input class="form-control pack-pzas-'+a.id+'" value="'+pzas_pack+'"></input></div>'; 

                          if( tipo_producto == 'individual' ) {
                                $('#id-'+a.id+' .get-controls').append('<div class="col-lg-1"><span>Prenda</span><div class="cp_wrapper"><input class="color-pack-'+a.id+'" type="color" name="cp_1" value="'+a.alfa_color+'" /></div> </div><div class="col-lg-1"><span>Texto</span><div class="cp_wrapper"><input class="color-text-'+a.id+'" type="color" name="cp_2" value="'+a.alfa_texto+'" /></div> </div> <div class="col-lg-1"><span>Fondo</span><div class="cp_wrapper"><input class="color-pack-fondo-'+a.id+'" type="color" name="cp_1" value="'+a.alfa_fondo+'" /></div> </div> <div class="aside-color-set col-lg-1"><span>Textura</span><span class="pick-color-pack pick-color-pack-'+a.id+'" onclick="croppImg('+a.id+')" style="background-image: url('+a.url_textura+')"></span> </div>'+campos_extra+color_set+'<div class="col-lg-2"><button class="btn btn-primary btn-sm" onclick="saveColorPack(\''+a.id+'\')">guardar</button></div>');     
                          } else {  
                                 $('#id-'+a.id+' .get-controls').append('<div class="col-lg-1"><span>Texto</span><div class="cp_wrapper"><input class="color-text-'+a.id+'" type="color" name="cp_2" value="'+a.alfa_texto+'" /></div> </div> <div class="col-lg-1"><span>Fondo</span><div class="cp_wrapper"><input class="color-pack-fondo-'+a.id+'" type="color" name="cp_1" value="'+a.alfa_fondo+'" /></div> </div> <div class="aside-color-set col-lg-1"><span>Textura</span><span class="pick-color-pack pick-color-pack-'+a.id+'" onclick="croppImg('+a.id+')" style="background-image: url('+a.url_textura+')"></span> </div> '+campos_extra+color_set+'<div class="col-lg-2"><button class="btn btn-primary btn-sm" onclick="saveColorPack(\''+a.id+'\')">guardar</button></div>');  
                          }
 
                          layout_carga_ = '<div class="dropzone col-lg-2" id="dropzone-'+a.id+'"></div>';
                          $('.container-gallerie-'+a.id).append(layout_carga_); 
                           
                          var myDropzone = new Dropzone("#dropzone-"+a.id, {
                              url: "{{asset('uploadPhoto')}}",
                              paramName: "file",
                              dictDefaultMessage:'<span id="drop-mge">Arrastra o haz click para abrir las imágenes</span>',
                              maxFilesize: 2,
                              maxFiles: 10,
                              acceptedFiles: "image/*,application/pdf",
                              autoProcessQueue: true, 
                              init: function() {
                                this.on("addedfile", function(file) { 
                                  //alert("Se ha añadido una imágen"); 
                              });
                              },  
                              sending:  function(file, xhr, formData){
                                formData.append('idProuct', a.id);
                              },   
                              success: function( resp ) { 
                                console.log(resp); 
                                  var photo = '<div class="element-gallery imagen-'+a.id+'" style="background-image: url('+resp.xhr.responseText+');"><input type="checkbox" class="status-photo" checked="" idphoto="'+a.id+'" /> <button onclick="attrsImg(\''+a.id+'\')" class="btn btn-default pull-right ">...</button> <button onclick="borrarFoto(\''+a.id+'\')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>';
                                  $('.content-gallery'+a.id).prepend(photo);  
                                } 
                          });

                          id_paquetes.push(a.id);

                          let nameHeader = ""; 
                          if( a.id_paquete ) {
                              nameHeader = a.id_paquete.split(' ').join('-'); 
                          }

                          layout_paq_tallas = '<div class="col-lg-6 text-to-left np-l"> <div class="pack-tallas" id="id-header-'+nameHeader+'">'+
                                                '<div> <span class="borrar-paquete" onclick=borrarPaquete("'+a.id+'")> &times; </span>'+ 
                                                  '<h2>Paquete ['+a.id_paquete+']</h2>'+   
                                                  '<a href="#id-'+a.id+'">Ir a la galería</a>'+
                                                '</div>'+  
                                                    '<select onchange=\"formatCantidades(event)\" class="multipleSelect'+a.id+'" multiple value="Meses" idProduct='+a.id+' name="language">'+ 
                                                   '</select>'+ 
                                                  '<br> <br> <div class="existencias-'+a.id+'"></div>'+ 
                                              '</div> </div>'; 

                          $('.container-tallas-pack').append(layout_paq_tallas); 

                          console.log("multiple"); 
                          console.log(item['multiple_tallas']);

                           item['tallas'].forEach( function( c, d ){   
                              existe = false; 
                              if(  item['multiple_tallas'][a.id] ) {  
                                existe = ( (item['multiple_tallas'][a.id]).includes(c.id+"_"+a.id) ); 
                                 if( existe ) {
                                    console.log("HERE"); 
                                    console.log(item['cantidades']); 
                                    $('.multipleSelect'+a.id).append("<option selected class='fstChoiceItem' cantidad='"+item['cantidades'][c.id+"_"+a.id]+"' value="+c.id+">"+c.name+"</option>")

                                    $('.existencias-'+a.id).append('<div class="col-lg-6">  <div class="input-group"> <div class="input-group-addon">'+c.name+'</div> <input class="form-control ex-'+c.id+' existencia-'+a.id+'" placeholder="existencia" value="'+item['cantidades'][c.id+"_"+a.id]+'"></input> </div> </br></div>');  

                                } else {
                                  $('.multipleSelect'+a.id).append("<option value="+c.id+">"+c.name+"</option>")
                                } 
                              } else {
                                $('.multipleSelect'+a.id).append("<option value="+c.id+">"+c.name+"</option>")
                              }
                            });

                          $('.multipleSelect'+a.id).fastselect();
                  } ); 
 
                  //$('.multipleSelect').html(''); 
                  var t_comp = item['_tallas_s'];
                  $('.list-categories').html('');  
                  item['categores_s'].forEach( function( a, b ) {
                    $('.list-categories').append('<span class="span-element cat-'+a.id+'" onclick="deleteThis(\''+a.id+'\')" idcat="'+a.id+'">'+ a.title +'</span>');
                    $('.check-'+a.id).prop("checked", true);  
                  });  

                   
                  // iterando entre todas las tallas y las relacionadas 
                  item['tallas'].forEach( function( a, b ){                     
                    //console.log(t_comp);  
                    existe = false; 
                    if( t_comp ) {
                      existe = t_comp.includes(a.id+"_66114"); 
                    }  
                    //console.log(existe + a.name);  
                    //console.log( a.id === c.id_talla );  
                       if( existe ) {
                          $('.multipleSelect').append("<option selected class='fstChoiceItem' value="+a.id+">"+a.name+"</option>")
                      } else {
                          $('.multipleSelect').append("<option value="+a.id+">"+a.name+"</option>")
                      }  
                    
                  });

                  tallas_select = $('.multipleSelect').fastselect();

                   
                   //tallas_select = $('.multipleSelect').fastselect(); 
 
                   $('.summernote').summernote('code',   sku   = item['product'][0].detalle_tallas);  

                   //console.log( item['colores'] ); 

                   $(document).off('change','.list-packs'); 
                   $(document).on('change','.list-packs',function(){ 
                        id = $('.list-packs').val(); 
                        updateProduct(id); 
                    });

                 $("#overlay").fadeOut(300);　
            }
        });  
    }

  

  //////////////////////////////////////////////////
  let label_new_id = null; 
  
  function editLabel( id, label ) {
    label_new_id = id; 
    $('#label-to-edit').val(label); 
    $('#editLabel').modal('toggle'); 
  }

  $('#saveLabel').click( function() {
    let label = $('#label-to-edit').val(); 
    $("#overlay").fadeIn(300);　 
    $.ajax({
      'url' : '{{asset("editLabelPack")}}', 
      'data' : {'id' : label_new_id, 'label' : label }, 
      'method' : 'post', 
      'success' : function( resp ) {
        console.log( resp ); 
        window.location.reload(); 
      }
    }); 
  }); 

  let link_to = null; 
  function moverFotoTo( id ) {
    $("#overlay").fadeIn(300);　
    $.ajax({
      'url' : '{{asset("compyImgTo")}}', 
      'method' : 'post', 
      'data' : {'toId' : id, 'link' : link_to }, 
      'success' : function ( resp ) {
        console.log( resp ); 
        window.location.reload(); 
      }
    });   
  }

  function moverFoto( id, link ) {
    link_to = link; 
    $('#copyImg').modal('toggle');  
  }

  function newSubCat( id, title ) {
     $('.list-categories').append('<span class="span-element cat-'+id+'" onclick="deleteThis(\''+id+'\')" idcat="'+id+'">'+ title +'</span>'); 
     $('.cat-option-'+id).css("font-weight", "900");  
  }

  function borrarPaquete( idPaquete ) {
    if( confirm("¿Está seguro de borrar este paquete?") ) {
      alert("borrado"); 
       $.ajax({
          'url' : "{{asset('borrarPaquete')}}",   
          'data' : {'idRelation' : idPaquete}, 
          'method' : 'POST', 
          'success' : function resp( data ) {
            console.log( data ); 
            window.location.reload(); 
          }
        }); 
    } 
  }

  var IS_NEW = 0; 

  window.onload = function() {
    
    $('#agregarPaquete').click( function() {
        let sku = $('#sku-field-edit').val(); 
        let paqueteId = $('#paqueteId').val(); 

        if( paqueteId.length < 1 ) {
          alert("Agrega una etiqueta");   
        } else {
          $("#overlay").fadeIn(300);　 
          $.ajax({
            'url' : "{{asset('agregarPaquete')}}",  
            'data' : {'sku' : sku, 'paqueteId' : paqueteId}, 
            'method' : 'POST', 
            'success' : function resp( data ) {
              console.log( data );
              window.location.reload(); 
            }
          }); 
        }
    }); 

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

    
    $('.list-categories').selectpicker(); 
  
  var urlString = window.location.href; 
  urlParams = urlString.search("new"); 

  if( urlParams > 1 ) {
    //alert("Registrar nuevo producto"); 
    IS_NEW = 1; 
  } else {
    //alert("EDIT"); 
    showProduct({{$idProduct}}); 
  }

 

      $('#typeProduct').change( function( event ) {
         var type = $(event.target).val(); 
         switch( type ) {
          case  "colores":
            $('.row-colores').css("display", "block"); 
            $('.row-paquete').css("display", "none"); 
          break; 
          case  "paquete": 
            $('.row-colores').css("display", "none"); 
            $('.row-paquete').css("display", "block"); 
          break; 
         }
      }); 

      $('#delete-color').click( function() {
     var b = $('.list-colors').val(); 
     b.forEach( function(s){ 
      $('.list-colors option').each( function(a, b) { 
            console.log( $(b).val() ); 
            if( $(b).val() == s ) { 
                    $(this).remove();
                }  
          } ); 
     });
  }); 
 
        $('#add-colors').click( function() {
          alert('..'); 
        } ); 

        $('#add-color').click( function() {
          var color = $('.color-picker').val(); 
          $('.list-colors').append('<option value="'+color+'" style="background-color:'+color+'"></option>'); 
        }); 
     
        
      //tallas_select = $('.multipleSelect').fastselect();
      
      var config_editor = {
                toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']], 
                  ['insert', ['table']], 
                  ['view', ['fullscreen', 'codeview', 'help']]
                ]
              }; 

        $('.summernote_descripcion').summernote(config_editor);
        $('.summernote_descripcion_larga').summernote(config_editor);
    
    //Disabling autoDiscover
    
    /* 
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 2,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    alert("file uploaded");
                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };    */ 
  }


  /* 
  window.onload = () => { 
 
          class App {
            constructor(a, b) {
              this.a = 10; 
              this.b = 20; 
            }
            get area() {
              return this.sum(); 
            }
            sum() {
              return this.a; 
            }
          }   
          
          c = new App;
          //alert(c.area);

    } */ 


</script>