  @extends('Admin.layout') 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.theme.default.css')}}"> 

<script type="text/javascript" src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style type="text/css">
          .panel-right { padding-top: 90px!important }
           h3 { font-weight: 900!important; margin: 0px;}
           #a-skydropx:hover { text-decoration: none; }


           .panel-heading h3 {
              margin: 0px;
           }
           .panel-body {  
              display: none; 
              overflow: auto;
           }
           .open-panel {
              height: auto;
              overflow: auto;
           }
    </style> 
 
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <div class="panel-right">  

    	 <div class="panel panel-default"> 
        <div class="panel-heading">
          <h3>Sucursales</h3>
          <span>Gestiona las unidades de negocio o sucursales de tu empresa.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
               	<table class="table">
                 	<thead> 
                 		<tr>
                 			<th style="width: 200px;">
                 				<span>Nombre</span>
                 			</th>
                 			<th style="width: 350px;"> 
                 				<span>Dirección</span>
                 			</th>
                 			<th style="width: 500px;"> 
                 				<span>Google Maps</span>
                 			</th>
                        <th style="width: 500px;"> 
                        <span>Google Maps Móvil</span>
                      </th>
                 			<th>
                 				<span>Envíos</span> 
                 			</th>
                 			<th>
                 				<span>Sucursales</span> 
                 			</th>
                 			<th>
                 				<span></span> 
                 			</th>
                      <th>
                        <span>Horarios</span>
                      </th>
                      <th>
                        Orden
                      </th>
                 		</tr>
                 	</thead>  
                 	<tbody> 
                 		@foreach( $sucursales as $sucursal )
	                 		<tr> 
	                 			<td> 
	                 				<span class="name-{{$sucursal->id}}">{{$sucursal->name}}</span>
	                 			</td> 
	                 			<td> 
	                 				<span class="direction-{{$sucursal->id}}">{{$sucursal->direction}}</span>
	                 			</td>
	                 			<td> 
	                 				<textarea rows="4" style="width: 310px!important; display: inline-block;" class="maps-{{$sucursal->id}} form-control">{{$sucursal->googlemaps}}</textarea>
	                 			</td>
                        <td> 
                          <textarea rows="4" style="width: 310px!important; display: inline-block;" class="maps-mobile-{{$sucursal->id}} form-control">{{$sucursal->googlemaps_mobile}}</textarea>
                        </td>
	                 			<td> 
	                 				@if( $sucursal->status_envio == 1 )
                 						<input class="status-envio-{{$sucursal->id}}" type="checkbox" checked>
                 					@else 
                 						<input class="status-envio-{{$sucursal->id}}" type="checkbox">
                 					@endif 
                 				</td>
                 				<td>
                 					@if( $sucursal->status_sucursales == 1 )
                 						<input class="status-sucursal-{{$sucursal->id}}" type="checkbox" checked>
                 					@else  
                 						<input class="status-sucursal-{{$sucursal->id}}" type="checkbox">
                 					@endif 
                 				</td>
                 				<td> 
                 					<button class="btn btn-xs" onclick="editarSucursal('{{$sucursal->id}}')">editar</button> 
                 				</td>
                        <td style="width: 200px!important;">
                            <textarea rows="4" style="width: 200px!important; display: inline-block;" class="form-control horarios-{{$sucursal->id}}">{{$sucursal->horarios}}</textarea>
                        </td>
                        <td style="width: 40px;">
                          <input class="form-control orden-{{$sucursal->id}}" value="{{$sucursal->orden}}" type="" name="">
                        </td>
	                 		</tr>
                 		@endforeach 
                 	</tbody>
                 </table>
              </div>
              <div class="col-lg-12" style="padding-top: 20px;">
                <button class="btn btn-primary" id="addSucursal">Nueva Sucursal</button>
              </div>
        </div>
      </div>


      <div class="panel panel-default"> 
        <div class="panel-heading">
          <h3>Orígenes de datos</h3>
          <span>Gestiona las fuentes de tus catálogos.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
                 <table class="table">
                 	<thead> 
                 		<tr>
                 			<th>
                 				<span>link público</span>
                 			</th>
                 			<th> 
                 				<span>Descargar</span>
                 			</th>
                 		</tr>
                 	</thead> 
                 	<tbody> 
                 		<tr> 
                 			<td> 
                 				<a href="">https://begima.com.mx/public/feed-facebook.csv</a>
                 			</td>
                 			<td> 
                 				<a href="https://begima.com.mx/createFeed"> <button class="btn">Descargar</button> </a>
                 			</td>
                 		</tr>
                 	</tbody>
                 </table>
              </div>
        </div>
      </div>

      <div class="panel panel-default"> 
        <div class="panel-heading">
          <h3>Tema del sitio</h3>
          <span>Controla las imagen de tu negocio.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
                <div class="col-lg-4"> 
                  <label>Color del menú</label>
                    <input class="color-picker" style="display: block;" type="color" value="{{$colorHeader}}">
                </div>
                <div class="col-lg-4"> 
                  <label>Color del texto en el menú</label>
                    <input class="color-picker-text" style="display: block;" type="color" value="{{$colorText}}">
                </div>
                <div class="col-lg-4">
                   <p>&nbsp;</p> 
                  <span class="glyphicon glyphicon-italic" aria-hidden="true"></span>
                  <span>El color puede cambiar en la vista de un producto</span>
                </div>
              </div>
              <div class="col-lg-12" style="padding-top: 20px;">
                <button class="btn btn-primary" id="saveColorHeader">Guardar</button>
              </div>
        </div>
      </div>

       <div class="panel panel-default"> 
        <div class="panel-heading">
          <h3>Header</h3>
          <span>Controla las opciones en la parte superior de tu sitio público.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
                <div class="col-lg-4"> 
                  <label>Correo de contacto</label>
                  <input class="form-control contact-mail" style="display: block;" type="correo" value="{{$mail_contact}}">
                </div>
                <div class="col-lg-4"> 
                  <label>Teléfono de contacto</label>
                  <input class="form-control contact-phone" style="display: block;" type="correo" value="{{$phone_contact}}">
                </div>
              </div>
              <div class="col-lg-12" style="padding-top: 20px;">
                <button class="btn btn-primary" id="saveContact">Guardar</button>
              </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Envíos</h3>
          <span>La calidad y control del envío de los artículos es uno de los pilares de un buen ecommerce.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
                <div class="col-lg-4">
                  <label>Módo de envío</label>
                  <select class="form-control" id="optionShipment">
                    <option @if($shipment_option=='fijo') selected @endif value="fijo">Fijo</option>
                    <option @if($shipment_option=='skydropx') selected @endif value="skydropx">Skydropx</option>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label>Precio</label>
                    <div class="input-group"> 
                      <span class="input-group-addon">$</span>
                      <input id="priceShipment" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$shipment_flat_price}}">
                      <span class="input-group-addon">.00</span>
                    </div>
                </div>
                <div class="col-lg-4">
                   <p>&nbsp;</p>
                  <span class="glyphicon glyphicon-italic" aria-hidden="true"></span>
                  <span>Este precio se aplicará al calculo de todos los envíos</span>
                </div>
              </div>
              <div class="col-lg-12" id="skydropx-row">
                <div class="col-lg-4">
                  <h4>Skydropx <a id="a-skydropx" href=""><span class="label label-default">configurar</span></a></h4>
                </div>
              </div>
              <div class="col-lg-12" style="padding-top: 20px;">
                <button class="btn btn-primary" id="guardarEnvios">Guardar</button>
              </div>
        </div>
      </div>

      <style type="text/css">
         .btn-xs {
            padding: 1px 5px!important;
            font-size: 12px!important;
            line-height: 1.5!important;
            border-radius: 3px!important;
        }
        #group-option {
          font-weight: bolder; 
        }
        .badge:hover {
          cursor: pointer;
        }
        .name-group, .options-menu {
          font-size: 15px; 
        }

        .dropzone { border: 4px dotted #8d76a1; height: 80px; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px;}
  		.dropzone:hover { border: 4px solid #60d192; }
      </style>



      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Slider principal (escritorio)</h3>
          <span>Administra el slider principal de tu sitio.</span>
        </div>
        <div class="panel-body">
          <div class="banner-section col-lg-12" style="padding: 0px 10px; margin: 10px 0px;">

                     <div class="hover14 owl-carousel owl-theme list-banners" style="display: none;"> 
            @foreach( $slider as $item )
            	<div class="item np desktop-item">
                  <div class="col-lg-12 np" style="text-align: center;">
                     <img class="banner-img" src="{{$item->url}}" /> 
                  </div>
              </div> 
            @endforeach 
            </div> 
          <form class="form-horizontal" style="padding: 20px 0px; border-top: 1px solid #efefef; margin-top: 20px;">
            <div class="form-group">
              <div class="col-lg-2"> 
                  <label for="inputEmail3" class="control-label">Tiempo (milisegundos)</label>
                  <input id="slider-time" type="text" class="form-control" id="inputPassword3" 
                	placeholder="Las promociones del mes" 
                	value="{{$slider[0]->time}}"> 
              </div> 
              <div class="col-lg-2">                    
                  <label for="inputEmail3" class="control-label">Transición</label>
                  <select id="slider-1-effect" class="form-control">  
                    <option value="1" @if($slider[0]->type_t == 1) selected @endif>Slide 1</option>
                    <option value="2" @if($slider[0]->type_t == 2) selected @endif>Slide 2</option>
                    <option value="3" @if($slider[0]->type_t == 3) selected @endif>Slide in</option>
                    <option value="4" @if($slider[0]->type_t == 4) selected @endif>Flip Vertical</option>
                    <option value="5" @if($slider[0]->type_t == 5) selected @endif>Flip Horizontal</option>
                    <option value="6" @if($slider[0]->type_t == 6) selected @endif>Card</option>
                    <option value="7" @if($slider[0]->type_t == 7) selected @endif>Fade</option>
                    <option value="8" @if($slider[0]->type_t == 8) selected @endif>Cube</option>  
                    <option value="9" @if($slider[0]->type_t == 9) selected @endif>Flip in Horizontal</option>
                  </select>
              </div>

              <div class="col-lg-2" style="text-align: center;"> 
                  <label for="inputEmail3" class="control-label">Timer</label>
                  <div style="padding-top: 10px;">
                    @if($slider[0]->timer == 1 ) 
                      <input id="slider-timer" style="transform: scale(2);" checked="checked" type="checkbox">
                    @else 
                      <input id="slider-timer" style="transform: scale(2);" type="checkbox">
                    @endif 
                  </div>
              </div> 
              <div class="col-lg-2" style="text-align: center;"> 
	              <label for="inputEmail3" class="control-label">Autoplay </label>
	              <div style="padding-top: 10px;">
	              	@if( $slider[0]->autoplay == 1 )
	                	<input id="slider-autoplay" style="transform: scale(2);" type="checkbox" checked="checked">
	              	@else 
	              		<input id="slider-autoplay" style="transform: scale(2);" type="checkbox">
	              	@endif 
	              </div>
              </div>
              <div class="col-lg-3">
	                <div class="col-sm-10" style="padding-top: 30px;">
	                	<button id="showCategories" type="button" class="btn" style="border-radius: 12px; font-weight: bolder;">Lista de banners</button>
	               </div>
              </div>
            </div>
          </form>
          <div class="dropzone" id="dropzone">
            
          </div>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              	<p></p> 
                <button type="submit" id="updateSliderOptions" class="btn btn-primary pull-right">Guardar</button>
              </div>
            </div>

          </div>
        </div>
      </div>



      <style type="text/css">
        .cat-element-content { 
            background-color: black!important; 
        }
        .editlabel:hover {
          cursor: pointer;
          font-weight: bolder; 
        }
        .load-switch:hover {
          cursor: pointer;
        }
      </style>
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Bloque de categorías</h3>
          <span>Gestiona el acomodo de tus categorías en el menú principal.</span>
        </div>
        <div class="panel-body">  
          <ul>
            @foreach( $block as $k => $b )
               @if($k == 0 )  
                  <li> 
                    <span class="label label-default label-success load-switch switch-{{$b->id}}" id="{{$b->id}}">cargar</span>
                   {{$b->label}} <span class="editlabel" onclick="editlabel('{{$b->id}}', '{{$b->label}}', '{{$b->destination}}')">(editar)</span>
                 </li>
               @else 
                <li> 
                  <span class="label label-default load-switch switch-{{$b->id}}" id="{{$b->id}}">cargar</span>
                 {{$b->label}} <span class="editlabel" onclick="editlabel('{{$b->id}}', '{{$b->label}}', '{{$b->destination}}')">(editar)</span>
               </li> 
               @endif 
            @endforeach 
          </ul>

          <div class="dropzone" id="dropzone3"></div>

          <div class="col-lg-12 np" style="padding-top: 20px;">
            <div class="col-lg-12">
              <h2></h2>
            </div>
            <style type="text/css">
              .custom-css {
                display: none; 
              }
            </style>
           @foreach( $block as $k => $b )
            <div class="col-lg-4 data-category data-category-{{$b->id}}" id-field="{{$b->id}}" name-field="{{$b->label}}" style="border: 1px solid gray; padding: 10px; border-radius: 7px;"> 
              <span class="custom-css" style="{{$b->custom_css}}"></span>
              <div class="col-lg-12"><h4 style="font-weight: bolder;">{{$b->label}}</h4></div>
              <div class="col-lg-4"> 
                <p>RADIO %</p>
                <input name-field-css="border-radius" id-entity="{{$b->id}}" class="form-control css-border position-img" value="1" type="number" min="0" max="100" name="">
              </div>
              <div class="col-lg-4">
                  <p>POSICIÓN DE IMAGEN</p> 
                  <select class="form-control position-img css-position background-position" id-entity="{{$b->id}}" name-field-css="background-position">
                    <option value="center">Centro</option>
                    <option value="top">Top</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                  </select>
              </div>
              <div class="col-lg-4">
                  <p>TAMAÑO DE IMAGEN</p> 
                  <select class="form-control position-img css-position background-size" id-entity="{{$b->id}}" name-field-css="background-size">  
                    <option value="auto">Auto</option>
                    <option value="contain">Contain</option>
                    <option value="cover">Cover</option>
                    <option value="inherit">Inherit</option>
                    <option value="initial">Initial</option>
                    <option value="revert">Revert</option>
                    <option value="unset">Unset</option>
                  </select>
              </div>
              <div class="col-lg-4">
                  <p>COLOR DEL TEXTO</p>  
                  <input class="position-img color-text" id-entity="{{$b->id}}" name-field-css="color" type="color" name=""> 
              </div> 
              <div class="col-lg-4">  
                  <p>TAMAÑO DEL TEXTO</p>   
                  <input class="position-img form-control font-size" id-entity="{{$b->id}}" name-field-css="font-size" type="number" name="" value="30">
              </div>
              <div class="col-lg-4">  
                  <p>BORDE</p>   
                  <input class="position-img form-control border" id-entity="{{$b->id}}" name-field-css="border" type="number" name="" value="5">
              </div> 
            </div>
             @endforeach
             <div class="col-lg-12 np">
               <p></p> 
               <button class="btn btn-primary save-category-data">guardar</button>
             </div> 
          </div>

          @include('categories-row', $block) 
        </div>
      </div>

      <!-- Modal -->
<div id="editlabel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Etiqueta</h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Etiqueta</label>
                  <input class="form-control" id="block-title" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input class="form-control" id="block-destination" type="" name="">
               </div> 
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-block" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div> 

      <script type="text/javascript">
        let id_block = 11;     
        $('.load-switch').click( function( event ) {
          let id = $(event.target).attr('id'); 
          $('.load-switch').removeClass('label-success'); 
          $('.switch-'+id).addClass('label-success'); 
          id_block = id;    
        }) 
        function editlabel(id, label, destination) {  
          $('#editlabel').modal('toggle'); 
          $('#block-title').val(label); 
          $('#block-destination').val(destination); 
        }
        $('.btn-save-block').click( function() {
          let label = $('#block-title').val(); 
          let direction = $('#block-destination').val(); 
          $.ajax({
            'url' : '{{asset("updateBlock")}}', 
            'method' : 'POST', 
            'data' : {
              'id'    : id_block,  
              'label' : label, 
              'destination' : direction 
            }, 
            'success' : function(resp) {
              window.location.reload(); 
            }
          }); 
        }); 
      </script>

      <style type="text/css">
        .img-marcas-zone {
          width: 100%!important; 
        }
        .img-marcas-zone .dz-preview {
          margin-top: 0px!important;
        }
      </style>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Bloque de marcas</h3>
          <span>Lista y resalta las principales marcas de las cuales se compone tu catálogo.</span>
        </div>
        <div class="panel-body" style="max-height: 400px; overflow-x: auto; ">  
           <table class="table table-stripped table-bordered">
             <tbody>
              <thead>
                <th>
                  Nombre 
                </th>
                <th> 
                  Direccion
                </th>
                <th>
                  Mostrar en home
                </th>
                <th>
                  Imagen
                </th>
                <th>
                  Subir
                </th>
              </thead> 
               @foreach( $marcas as $k => $marca ) 
                <tr>
                  <td>
                    {{$marca->nombre}}
                  </td> 
                  <td>
                    {{$marca->direction}} 
                  </td> 
                   <td style="text-align: center; padding-top: 20px;">
                    @if( $marca->show_in_home == 1 )
                      <input style="transform: scale(1.5);" type="checkbox" checked class="brand-status" id="{{$marca->id}}" name="">
                    @else 
                      <input style="transform: scale(1.5);" type="checkbox" class="brand-status" id="{{$marca->id}}" name="">
                    @endif 
                  </td> 
                  <td>
                    <img id="img-brand-{{$marca->id}}" style="width: 100px;" src="{{$marca->img}}">
                  </td>
                  <td> 
                    <div class="img-marcas-zone dropzone col-lg-2 dropzone-{{$k}}" id="dropzone_{{$marca->id}}" zone="{{$marca->id}}"></div> 
                  </td>    
                </tr>
               @endforeach 
             </tbody>
           </table>
        </div>
      </div>


        <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Slider principal (móvil)</h3>
          <span>Los sliders no se ven igual en un dispositivo móvil que en dispositivos más grandes.</span>
        </div>
        <div class="panel-body">
          <div class="banner-section-2 col-lg-12" style="padding: 0px 10px; margin: 10px 0px;">
            <div class="hover14 owl-carousel owl-theme list-banners" style="display: none;"> 
            @foreach( $slider as $item )
            	<div class="item np desktop-item">
                  <div class="col-lg-12 np" style="text-align: center;">
                     <img class="banner-img" src="{{$item->url}}" /> 
                  </div>
              </div> 
            @endforeach 
            </div> 
          <form class="form-horizontal" style="padding: 20px 0px; border-top: 1px solid #efefef; margin-top: 20px;">
            <div class="form-group">
              <div class="col-lg-3"> 
                  <label for="inputEmail3" class="control-label">Tiempo (milisegundos)</label>
                  @if( isset($slider_2[0]->time) )
                  <input id="slider-time-2" type="text" class="form-control" 
                	placeholder="Las promociones del mes" 
                	value="{{$slider_2[0]->time}}"> 
                  @else 
                  	<input id="slider-time-2" type="text" class="form-control" 
                	placeholder="Las promociones del mes" 
                	value=""> 
                  @endif 
              </div> 
              <div class="col-lg-3" style="text-align: center;"> 
	              <label for="inputEmail3" class="control-label">Autoplay </label>
	              <div style="padding-top: 10px;">
	              	@if( isset($slider_2[0]->autoplay) )
		              	@if( $slider_2[0]->autoplay == 1 )
		                	<input id="slider-autoplay-2" style="transform: scale(2);" type="checkbox" checked="checked">
		              	@else 
		              		<input id="slider-autoplay-2" style="transform: scale(2);" type="checkbox">
		              	@endif 
	              	@endif 
	              </div>
              </div>
              <div class="col-lg-6">
	                <div class="col-sm-10" style="padding-top: 30px;">
	                	<button id="showCategories-2" type="button" class="btn" style="border-radius: 12px; font-weight: bolder;">Lista de banners</button>
	               </div>
              </div>
            </div>
          </form>
          <div class="dropzone" id="dropzone2">
            
          </div>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              	<p></p> 
                <button type="submit" id="updateSliderOptions-2" class="btn btn-primary pull-right">Guardar</button>
              </div>
            </div>

          </div>
        </div>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Menú</h3>
          <span>Administra los grupos de tu menú.</span>
        </div>
        <div class="panel-body">
              <div class="col-lg-12">
                <table class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <td>GRUPO <button class="btm btn-primary btn-xs" id="addGroups">agregar</button></td>
                      <td>OPCIONES / DESTINOS </td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menu as $k => $grupo)
                    @php
                       $id = $grupo['id']; 
                       $titulo = $grupo['titulo']; 
                    @endphp
                    <tr> 
                      <td class="name-group"> 
                        <span> 
                          {{$grupo['titulo']}} => <a target="_blank" href="{{$grupo['destino']}}">{{$grupo['destino']}}</a> 
                          <span class="badge edit-group" onclick="editGroup('{{$id}}', '{{$titulo}}')">editar</span>
                        </span>
                      </td>
                      <td>
                        <ul>
                          @foreach($grupo['opciones'] as $kk => $opcion) 
                            <li class="options-menu">
                              <span>{{$opcion->titulo}} => </span>
                              <span><a target="_blank" href="{{$opcion->destino}}" >{{$opcion->destino}}</a></span>
                              <span class="badge" onclick="editOptionsModal('{{$opcion->id}}', '{{$opcion->titulo}}')">editar</span>

                              <ul>
                                @foreach( $opcion->opciones as $kkk => $l2 )
                                  <li> <span>{{$l2->titulo}} => </span>  <a href="">{{$l2->destino}}</a> <span class="badge" onclick="editOptionL2('{{$l2->id}}', '{{$l2->titulo}}')">editar</span> </li>
                                @endforeach  
                                <li><span class="label label-success" onclick="addOptionsModall2('{{$opcion->id}}', '{{$opcion->titulo}}')" style="font-size: 15px;">+</span></li>
                              </ul>

                            </li>
                          @endforeach 
                          <li> 
                            <span clasS="label label-success" style="font-size: 15px;" id="addOptions" onclick="openModalOption('{{$id}}', '{{$titulo}}')">+</span>
                          </li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
        </div>
      </div>


<!-- Modal -->
<div id="addOptionsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar opción a <span id="group-option">Dama</span></h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input class="form-control" id="option-title" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input class="form-control" id="option-destination" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-option" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


<!-- Modal -->
<div id="addOptionsModall2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar segunda opción a <span id="group-option-l1">Dama</span></h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input class="form-control" id="option-title-l2" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input class="form-control" id="option-destination-l2" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-option-l2" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


<!-- Modal -->
<div id="editOptionsModall2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar opción <span id="group-option-update-l1">Dama</span></h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input class="form-control" id="option-edit-title-l2" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input class="form-control" id="option-edit-destination-l2" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-default btn-warning  btn-delete-option-l2" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-update-option-l2" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


<!-- Modal -->
<div id="editOptionsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar opción <span id="option-edit">Dama</span></h4>
      </div> 
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input class="form-control" id="option-edit-title" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input class="form-control" id="option-edit-destination" type="" name="">
               </div>
            </div> 
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-warning btn-delete-option" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-update-option" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>

        <!-- Modal -->
<div id="addGroupsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Grupo </h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input id="name-group" class="form-control" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input id="destination-group" class="form-control" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-group" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


<!-- Modal -->
<div id="editGroupsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Grupo <span id="group-name-edit">..</span> </h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input id="name-edit-group" class="form-control" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Destino</label>
                  <input id="destination-edit-group" class="form-control" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-default btn-warning btn-delete-group" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-update-group" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


  	<div class="panel panel-default">
        <div class="panel-heading">
          <h3>Personalización del correo</h3>
          <span>Personaliza los correos que recibe tu cliente.</span>
        </div>
        <div class="panel-body">
          <label>Color del header</label>
          <input class="color-picker" style="display: block;" type="color" value="{{$colorHeader}}">
          <div style="padding: 20px 0px;">
            <button id="saveClip" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Sliders</h3>
          <span>sliders.</span>
        </div>
        <div class="panel-body">
          <div>
            <table class="table table-bordered table-hover table-stripped">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Etiqueta</th>
                  <th>Tipo</th>
                  <th>Lugar</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $sliders as $k => $sl )
                  <tr onclick="editSliderType({{$sl->id}}, '{{$sl->title}}', '{{$sl->subtitle}}')">
                    <td>{{$sl->title}}</td> 
                    <td>{{$sl->subtitle}}</td> 
                    <td></td>
                    <td>Productos</td>
                    <td>
                      HOME 
                    </td>
                  </tr>
                @endforeach 
              </tbody>
            </table>
          </div>
          <div style="padding: 20px 0px;">
            <button id="saveClip" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>


            <!-- Modal -->
<div id="editSliderType" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SLIDER</h4>
      </div>
      <div class="modal-body modal-sm" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
             <div class="col-lg-12" style="display: inline-block; max-height: 60vh; overflow-y: auto;">
               <div class="col-lg-12 np">
                  <label>Título</label>
                  <input class="form-control" id="slider-title" type="" name="">
               </div>
               <div class="col-lg-12 np">
                  <label>Etiqueta</label>
                  <input class="form-control" id="slider-subtitle" type="" name="">
               </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-save-slider" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div> 

      <script type="text/javascript">
        let edit_slider = 0; 
        function editSliderType( id, title, subtitle ) {
          edit_slider = id; 
          $('#slider-title').val(title); 
          $('#slider-subtitle').val(subtitle); 
          $('#editSliderType').modal('toggle');  
        }
        $(".overlay").fadeIn(); 
        $('.btn-save-slider').click( function() {
          let title = $('#slider-title').val(); 
          let subtitle = $('#slider-subtitle').val(); 
          $.ajax({
            'url' : '{{asset("editSliderType")}}', 
            'method' : 'post', 
            'data' : { 'id' : edit_slider, 'title' : title, 'subtitle' : subtitle }, 
            'success' : function( resp ) {
              $(".overlay").fadeOut(); 
              window.location.reload(); 
            }
          }); 
        }); 
      </script>


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Vídeos del home</h3>
          <span>Vídeos del home.</span>
        </div>
        <div class="panel-body">
          <label>Ip's para pruebas (separadas por , (comas) si no hay ip's serán visibles para todos) </label> 
          <input id="ips" value="{{$ips}}" class="form-control" placeholder="ip's" type="" name="">
          <br> 
          <div class="summernote_descripcion"></div>

          <div style="padding: 20px 0px;">
            <button id="saveClip" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
  
      <div class="col-lg-12">
          <div class="container">
			   <div class="row">
			     <div class="col-sm-9 col-xl-10 order-2 order-sm-1 mt-3">
			       <h2 class="h6"><strong>HOME</strong></h2>
			       <div id="sortablelist" class="list-group mb-4 mt-3" data-id="1">
			         <div class="list-group-item d-flex align-items-center justify-content-between" data-id="2">
			           <div>
			             <p class="mb-0 d-inline-flex align-items-center">  
			              <h1>SLIDER PRINCIPAL</h1>
			             </p>
			           </div>
			         </div>
			         <div class="list-group-item d-flex align-items-center justify-content-between" data-id="3">
			           <div>
			             <p class="mb-0 d-inline-flex align-items-center">
			               <h2>SLIDER DE PRODUCTOS</h2>
			             </p>
			           </div>
			         </div>
			         <div class="list-group-item d-flex align-items-center justify-content-between" data-id="4" style="">
			           <div>
			             <p class="mb-0 d-inline-flex align-items-center">
			               <h2>LISTA DE MARCAS</h2></p>
			           </div>
			         </div>
			       </div>
			     </div>
			   </div>
			</div>
      </div>
    
    </div>


<!-- Modal -->
<div id="add-m-sucursal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Sucursal</h4>
      </div>
      <div class="modal-body" style="display: inline-block; width: 100%;">
       <div class="col-lg-12 np">
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Nombre</label>
	              	<input id="new-sucursal-name" class="form-control"/>
	              </div>
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Dirección</label>
	              	<input id="new-sucursal-direction" class="form-control"/>
	              </div>
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Google Maps</label>
	              	<textarea id="new-sucursal-maps" class="form-control" name="textarea" rows="10" cols="50"></textarea>
	              </div>
	              <div class="col-lg-6 col-xs-6"> 
	              	<p>&nbsp;</p>
	              	<label>Activo en envíos </label>
	              	<input id="new-sucursal-status-envio" type="checkbox">
	              </div>
	              <div class="col-lg-6 col-xs-6"> 
	              	<p>&nbsp;</p>
	              	<label>Activo en Sección de sucursales </label>
	              	<input id="new-sucursal-status-sucursal" type="checkbox">
	              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-new-sucursal" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


  <!-- Modal -->
<div id="edit-m-sucursal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar datos de sucursal</h4>
      </div>
      <div class="modal-body" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Nombre</label>
	              	<input id="edit-name" class="form-control"/>
	              </div>
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Dirección</label>
	              	<input id="edit-direction" class="form-control"/>
	              </div> 
	              <div class="col-lg-12 col-xs-12"> 
	              	<label>Google Maps</label>
	              	<textarea id="edit-maps" class="form-control" name="textarea" rows="10" cols="50"></textarea>
	              </div>
                <div class="col-lg-12 col-xs-12"> 
                  <label>Google Maps Móvil</label>
                  <textarea id="edit-maps-mobile" class="form-control" name="textarea" rows="10" cols="50"></textarea>
                </div>
                <div class="col-lg-12 col-xs-12"> 
                  <label>Horarios</label> 
                  <input id="edit-horarios" class="form-control"/>
                </div>
                <div class="col-lg-12 col-xs-12"> 
                  <label>Orden</label>
                  <input id="edit-orden" class="form-control"/>
                </div>
	              <div class="col-lg-6 col-xs-6"> 
	              	<p>&nbsp;</p>
	              	<label>Activo en envíos </label>
	              	<input id="edit-status-envio" type="checkbox">
	              </div>
	              <div class="col-lg-6 col-xs-6"> 
	              	<p>&nbsp;</p>
	              	<label>Activo en Sección de sucursales </label>
	              	<input id="edit-status-sucursal" type="checkbox">
	              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default btn-warning btn-delete-sucursal" data-dismiss="modal">Borrar</button> 
        <button type="button" class="btn btn-primary btn-update-sucursal" data-dismiss="modal">Guardar</button> 
      </div>
    </div>
  </div>


<style type="text/css">
  .panel-heading:hover {
    cursor: pointer;
    background-color: #eeeeee!important;
  }
</style>

<script type="text/javascript"> 

  $(".panel-heading").click( function( event ) { 

      thiss = $(event.target);

      if( !$(thiss).hasClass("panel-heading") ) {
            thiss = $(thiss).parent(); 
      }

      if( $(thiss).parent().find(".panel-body").css("display") == "block" ) { 
            $(thiss).parent().find(".panel-body").slideUp(); 
      } else { 
            $(thiss).parent().find(".panel-body").slideDown(); 
      }


  }); 


  function fillCssBlock() {
     
    $('.data-category').each( function( a, b ) {
      let id_block = $(b).attr("id-field"); 
      let border  = $('.data-category-'+id_block+' .custom-css').css('border-radius').replace("%", ""); 
      $('.data-category-'+id_block+' .css-border').val(border); 
      let bp  = $('.data-category-'+id_block+' .custom-css').css('background-position');
      let bp_n = ''; 
      console.log( bp ); 
      if(bp == '50% 50%') 
        bp_n = 'center'; 
      if(bp == '50% 0%') 
        bp_n = 'top'; 
      if(bp == '0% 50%') 
        bp_n = 'left';  
      if(bp == '100% 50%') 
        bp_n = 'right';   
       $(".data-category-"+id_block+" .background-position option[value='"+bp_n+"']").prop('selected', true);
      
      let bs = $('.data-category-'+id_block+' .custom-css').css('background-size'); 
      $(".data-category-"+id_block+" .background-size option[value='"+bs+"']").prop('selected', true);

      let color = $('.data-category-'+id_block+' .custom-css').css('color'); 
       
      colorA = color.replace("rgb(", "").replace(")","").replace(" ", "").replace(" ", "").split(","); 

      $('.data-category-'+id_block+' .color-text').val(fullColorHex( parseInt(colorA[0]), parseInt(colorA[1]), parseInt(colorA[2]) )); 
      let fsize = $('.data-category-'+id_block+' .custom-css').css('font-size'); 
      console.log(fsize); 
      $('.data-category-'+id_block+' .font-size').val(fsize.replace("px", "")); 

      let border_w = $('.data-category-'+id_block+' .custom-css').css('border'); 
      console.log(border_w.split("px")[0]); 
      $('.data-category-'+id_block+' .border').val(border_w.split("px")[0]); 
 
    });  
  }

var rgbToHex = function(rgb) {
    var hex = Number(rgb).toString(16);
    if (hex.length < 2) {
        hex = "0" + hex;
    }
    return hex;
};

var fullColorHex = function(r, g, b) {
    var red = rgbToHex(r);
    var green = rgbToHex(g);
    var blue = rgbToHex(b);
    return "#"+red + green + blue;
};

  $('.position-img').change( function( event ) {
    console.log("..");   
    let block = $(event.target).attr('id-entity');
    console.log( $(event.target).val() );
    let attr = $(event.target).attr('name-field-css'); 
    let val_css = $(event.target).val(); 
    if(attr == 'font-size') val_css+="px"; 
    if(attr == 'border-radius') val_css+="%";
    if(attr == 'border') val_css = val_css+"px solid"; 
    console.log(attr);
    console.log(val_css);
    console.log(block); 
    $('.cat-element-content-'+block).css(attr, val_css); 
  } ); 


  $('.save-category-data').click( function() {
      let str_css = '';  
      let id_field = null; 
      let ajax_r = 0; 
      $('.data-category').each( function(a, b ) {
        id_field = $(b).attr('id-field'); 
        str_css = "";  
        $(b).find('[name-field-css]').each( function(a, b) {
          name_css = $(b).attr('name-field-css'); 
          value_css = $(b).val(); 
          if( name_css == 'border-radius') value_css+="%"; 
          if( name_css == 'font-size') value_css+="px"; 
          if (name_css == 'border') value_css = value_css+"px solid"; 
          str_css+=name_css+":"+value_css+";"; 
        });  
        $.ajax({
          'url' : 'updateLayout', 
          'method' : 'post', 
          'data' : { 
            'css' : str_css, 
            'id'  : id_field 
          },  
          'success' : function( resp ) {
            console.log( resp ); 
            ajax_r++; 
            if( ajax_r >= 5)
              window.location.reload();
          }
        });   
      });  
      return; 

      $('.data-category').each( function(a, b ) {
        console.log("____________"); 
        id_field = $(b).attr('id-field');  
        let name_field = $(b).attr('name-field');  
        let css_n1 = $(b).find('.css-boder').attr('name-field-css'); 
        let css_v1 = $(b).find('.css-border').val();   
        let css_v2 = $(b).find('.css-position').val();  
        let css_n2 = $(b).find('.css-position').attr('name-field-css'); 
        console.log(name_field); 
        str_css = css_n1+":"+css_v1+"%!important;"; 
        str_css+=css_n2+":"+css_v2+"!important"; 
        console.log(str_css);  
        console.log("____________"); 
      }); 
  }); 

  $('.brand-status').change( function( event ) {
    let id = $(event.target).attr('id');
    let status = 1; 
    if( $(event.target).is(':checked') ) {
      status = 1; 
    } else {
      status = 0; 
    } 
    $("#overlay").fadeIn();
    $.ajax({
      'url' : '{{asset("statusBrandSlider")}}', 
      'method' : 'post', 
      'data' : {
        'id' : id, 
        'status' : status 
      }, 
      'success' : function(resp) {
        $("#overlay").fadeOut();
      }
    }); 
  }); 


   var myDropzone = new Dropzone("#dropzone", {
                              url: '{{asset("uploadPhotoSlider")}}',
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
                                formData.append('idProuct', 1); 
                              },   
                              success: function( resp ) { 
                                   console.log( resp ); 
                                   window.location.reload(); 
                                } 
                          });
 
   var myDropzone_2 = new Dropzone("#dropzone2", {
                              url: '{{asset("uploadPhotoSlider")}}',
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
                                formData.append('idProuct', 2); 
                              },   
                              success: function( resp ) { 
                                   console.log( resp ); 
                                   window.location.reload(); 
                                } 
                          });
 
      var myDropzone_3 = new Dropzone("#dropzone3", {
                              url: '{{asset("uploadBlock")}}',
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
                                formData.append('idProuct', id_block); 
                              },   
                              success: function( resp ) { 
                                   console.log( resp ); 
                                   alert(id_block); 
                                   window.location.reload(); 
                                } 
                          });

   $('.btn-new-sucursal').click( function() {

   	let nSucursalName 	 = $('#new-sucursal-name').val(); 
	let nSucursalDirection = $('#new-sucursal-direction').val(); 
	let nSucursalMaps      = $('#new-sucursal-maps ').val(); 
	let nSucursalEnvio     = 0; 
	if( $('#new-sucursal-status-envio').is(':checked') ) {
		nSucursalEnvio = 1; 
	}
	let nSucursalSucursal  = 0; 
	if( $('#new-sucursal-status-sucursal').is(':checked') ) {
		nSucursalSucursal = 1; 
	}

	if( nSucursalName.length < 1 || nSucursalDirection.length < 1 || nSucursalMaps.length < 1 ) {
		alert("Favor de llenar todos los campos"); 
	}
  
	console.log(nSucursalName); 
	console.log(nSucursalDirection); 
	console.log(nSucursalMaps); 
	console.log(nSucursalEnvio); 
	console.log(nSucursalSucursal); 

	$('#overlay').fadeIn(300); 
	$.ajax({ 
   			'url'   : '{{asset('newSucursal')}}',
   			'method': 'post', 
   			'data'  : { 
   				'name' : nSucursalName, 
   				'direction' : nSucursalDirection, 
   				'maps' : nSucursalMaps, 
   				'envio' : nSucursalEnvio, 
   				'sucursal' : nSucursalSucursal, 
   			}, 
   			'success': function(data) {
   				window.location.reload(); 
   			}
   		}); 

   }); 

   let id_sucursal_update = null; 
   function editarSucursal( id ) {
   	  id_sucursal_update = id; 
   	  $("#edit-m-sucursal").modal('toggle');  
   	  $('#edit-maps').val( $('.maps-'+id).val() ); 
      $('#edit-maps-mobile').val( $('.maps-mobile-'+id).val() ); 
   	  $('#edit-name').val( $('.name-'+id).html() );
   	  $('#edit-direction').val( $('.direction-'+id).html() );
      $('#edit-horarios').val( $('.horarios-'+id).html() );
      $('#edit-orden').val( $('.orden-'+id).val() );
      

   	  if ( $('.status-envio-'+id).is(':checked') ) {
   	  	$('#edit-status-envio').attr('checked', 'checked'); 
   	  } else {
   	  	$('#edit-status-envio').removeAttr('checked'); 
   	  }

   	  if ( $('.status-sucursal-'+id).is(':checked') ) {
   	  	$('#edit-status-sucursal').attr('checked', 'checked'); 
   	  } else { 
   	  	$('#edit-status-sucursal').removeAttr('checked'); 
   	  }
   }  

   $('.btn-delete-sucursal').click( function() {
   	 if(confirm("¿Estás seguro?")) {
   	 	$('#overlay').fadeIn(300); 
   	 	$.ajax({
   			'url'   : '{{asset('deleteSucursal')}}',
   			'method': 'post', 
   			'data'  : { 
   				'id' : id_sucursal_update 
   			},  
   			'success': function(data) {
   				window.location.reload(); 
   			} 
   		}); 
   	 }
   }); 
   
   $('.btn-update-sucursal').click( function() {
   		let sucursal_name	     =   $('#edit-name').val();  
   		let sucursal_direction =   $('#edit-direction').val();   
   		let sucursal_maps      =   $('#edit-maps').val();  
      let sucursal_maps_mobile      =   $('#edit-maps-mobile').val();  
      let sucursal_horarios  =   $('#edit-horarios').val();  
      let sucursal_orden     =   $('#edit-orden').val();  
 
   		let sucursal_envio = 0; 
   		if( $('#edit-status-envio').is(':checked') ) {
   			sucursal_envio = 1;  
   		}

   		let sucursal_sucursal = 0; 
   		if( $('#edit-status-sucursal').is(':checked') ) {
   			sucursal_sucursal = 1;    
   		}
 
   		$('#overlay').fadeIn(300); 
   		$.ajax({
   			'url'   : '{{asset('updateSucursal')}}',
   			'method': 'post', 
   			'data'  : { 
   				'name' : sucursal_name, 
   				'direction' : sucursal_direction, 
   				'maps' : sucursal_maps, 
          'maps_mobile' : sucursal_maps_mobile, 
   				'envio' : sucursal_envio, 
   				'sucursal' : sucursal_sucursal, 
   				'id' : id_sucursal_update, 
          'horarios' : sucursal_horarios, 
          'orden' : sucursal_orden
   			}, 
   			'success': function(data) {
   				window.location.reload(); 
   			}
   		}); 
   		   
   }); 

   $('#addSucursal').click( function() {
   		$("#add-m-sucursal").modal('toggle'); 
   });  
 
  let _l2_to_edit = null; 
  function editOptionL2( id, title ) { 
    //alert(id); 
    _l2_to_edit = id; 
    $('#editOptionsModall2').modal('toggle'); 
    $('#group-option-update-l1').html(title); 
    $('#overlay').fadeIn(300); 
    $.ajax({  
            'url' : '{{asset("getOptionMenuL2")}}', 
            'data' : { 
              'id' : id,  
            }, 
            'method': 'post', 
            'success' : function( resp ) {
               resp = JSON.parse( resp );  
               console.log( resp ); 
               $('#option-edit-title-l2').val(resp.titulo); 
               $('#option-edit-destination-l2').val(resp.destino); 
               $('#overlay').fadeOut(300); 
            }  
          });  

  }

  let _l1_option_id = null; 

  function addOptionsModall2(id, title) {
    _l1_option_id = id; 
    $('#group-option-l1').html(title); 
    $('#addOptionsModall2').modal('toggle');
  }

  let id_to_edit_option = null; 
  function editOptionsModal( id, titulo ) {
    id_to_edit_option = id; 
    $('#editOptionsModal').modal('toggle'); 

    $('#option-edit').html(titulo); 
    $.ajax({  
            'url' : '{{asset("getOptionMenu")}}', 
            'data' : { 
              'id' : id_to_edit_option, 
            }, 
            'method': 'post', 
            'success' : function( resp ) {
               resp = JSON.parse( resp );  
               console.log( resp ); 
               $('#option-edit-destination').val( resp.destino ); 
               $('#option-edit-title').val( resp.titulo ); 
            }  
          });  

  }

  let id_to_group = null; 
  function openModalOption( id, titulo ) {
          id_to_group = id; 
          $('#group-option').html(titulo); 
          $('#addOptionsModal').modal('toggle'); 
        }

  let id_to_edit_group = null; 
  function editGroup( id, titulo) {
    id_to_edit_group = id; 
    $('#group-name-edit').html(titulo); 
    $('#editGroupsModal').modal('toggle'); 
    $('#overlay').fadeIn(300); 
          $.ajax({  
            'url' : '{{asset("getGroupMenu")}}', 
            'data' : { 
              'id' : id_to_edit_group, 
            }, 
            'method': 'post', 
            'success' : function( resp ) {
               resp = JSON.parse( resp ); 
               console.log( resp ); 
               $('#name-edit-group').val(resp.titulo); 
               $('#destination-edit-group').val(resp.destino); 
               $('#overlay').fadeOut(300); 
            }  
          });
  }

  function deleteSliderItem( id ) {

  	if( confirm("¿Deseas borrar el slider?") ) {
	  	$.ajax({
	  		'url' : '{{asset("deleteSliderItem")}}', 
	  		'method' : 'post', 
	  		'data' : {
	  			'id' : id 
	  		}, 
	  		'success' : function( resp ) {
	  			$('.slider-'+id).slideUp(); 
	  		}
	  	}); 
  	}
  }

  function restartSliderDate( id ) {
  	$('.desde-'+id).val(''); 
  	$('.hasta-'+id).val(''); 
  }

  window.onload = function() {

      fillCssBlock();

      $('.img-marcas-zone').each( function( a, b ) { 
        let id = $(b).attr('id').split('_');  
        id = id[1]; 
        var myDropzone = new Dropzone("#dropzone_"+id, {
                              url: "{{asset('uploadBrand')}}",   
                              paramName: "file",
                              dictDefaultMessage:'<span id="drop-mge">Arrastra aquí</span>',
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
                                formData.append('idProuct', id); 
                              }, 
                              success: function( resp ) { 
                                $('#img-brand-'+id).attr('src', resp.xhr.responseText); 
                                console.log(resp); 
                                  /*var photo = '<div class="element-gallery imagen-'+a.id+'" style="background-image: url('+resp.xhr.responseText+');"><input type="checkbox" class="status-photo" checked="" idphoto="'+a.id+'" /> <button onclick="attrsImg(\''+a.id+'\')" class="btn btn-default pull-right ">...</button> <button onclick="borrarFoto(\''+a.id+'\')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>';
                                  $('.content-gallery'+a.id).prepend(photo);  */ 
                                } 
                          });
      } ); 

  		 
  		$('#updateSlider').click( function() {
  			$('#closeSubContent').click(); 
  			$('#overlay').fadeIn(300); 

  			$('.slider-main tr').each( function( a, b ) { 
				    id = $(b).attr('id'); 
				    collection = Array();     
				    $(b).find('td').each( function ( c, d ) { 
				        field =  $(d).attr('field'); 
				        if( $(d).find('input').attr('type') == 'checkbox' ) {
				        	if( $(d).find('input').is(':checked') ) {
				        		content = 1; 
				        	} else {
				        		content = 0;
				        	}
				        } else {
				        	content = $(d).find('input').val(); 
				        }
				        if( ( field == 'from' || field == 'to' ) && content.length > 4 ) { 
				            c = new Date(content); 
				            content = c.getFullYear()+"-"+(c.getMonth()+1)+"-"+c.getDate()+" "+c.getHours()+":"+c.getMinutes()+":"+c.getSeconds(); 
				        }
				        if( field != 'img' && field != 'olways' && field != 'not' ) {
				        	collection.push( { "field" : field, "content" : content });  
				        }
				    }); 
				    if( true ) {  
				        console.log( collection );  
				        $.ajax({
				        	'url' : '{{asset("updateSlider")}}', 
				        	'data' : {'tr' : collection, 'id' : id }, 
				        	'method' : 'post',  
				        	'success' : function( resp ) {
				        		console.log( resp ); 
				        		window.location.reload(); 
				        	}
				        }); 
				    }
				});
  		}); 

  		$('#updateSlider2').click( function() {
  			$('#closeSubContent').click(); 
  			$('#overlay').fadeIn(300); 

  			$('.slider-main-2 tr').each( function( a, b ) { 
				    id = $(b).attr('id'); 
				    collection = Array();     
				    $(b).find('td').each( function ( c, d ) { 
				        field =  $(d).attr('field'); 
				        if( $(d).find('input').attr('type') == 'checkbox' ) {
				        	if( $(d).find('input').is(':checked') ) {
				        		content = 1; 
				        	} else {
				        		content = 0;
				        	}
				        } else {
				        	content = $(d).find('input').val(); 
				        }
				        if( ( field == 'from' || field == 'to' ) && content.length > 4 ) { 
				            c = new Date(content); 
				            content = c.getFullYear()+"-"+(c.getMonth()+1)+"-"+c.getDate()+" "+c.getHours()+":"+c.getMinutes()+":"+c.getSeconds(); 
				        }
				        if( field != 'img' && field != 'olways' && field != 'not' ) {
				        	collection.push( { "field" : field, "content" : content });  
				        }
				    }); 
				    if( true ) {  
				        console.log( collection );  
				        $.ajax({
				        	'url' : '{{asset("updateSlider")}}', 
				        	'data' : {'tr' : collection, 'id' : id }, 
				        	'method' : 'post',  
				        	'success' : function( resp ) {
				        		console.log( resp ); 
				        		window.location.reload(); 
				        	}
				        }); 
				    }
				});
  		});  

  		$('#showCategories').click( function( event ) {
 			$('.sub-info').removeClass('hidden-sub'); 
  		});  
 
  		$('#showCategories-2').click( function( event ) {
 			$('.sub-info-2').removeClass('hidden-sub'); 
  		});  

  		$('#closeSubContent').click( function( event ) {
 				$('.sub-info').addClass('hidden-sub'); 
  			}); 

  		$('#closeSubContent-2').click( function( event ) {
 				$('.sub-info-2').addClass('hidden-sub'); 
  			}); 



        $('.btn-update-option-l2').click( function() {
            $('#overlay').fadeIn(300); 
            let nombre = $('#option-edit-title-l2').val(); 
            let destinationtino = $('#option-edit-destination-l2').val(); 
            $.ajax({   
                'url' : '{{asset("updateOptionMenuL2")}}', 
                'data' : { 
                  'id' : _l2_to_edit, 
                  'nombre' : nombre, 
                  'destino' : destinationtino
                }, 
                'method': 'post', 
                'success' : function( resp ) {
                   $('#overlay').fadeOut(300); 
                   window.location.reload();  
            }  
          });
        }); 

        $('.btn-delete-option-l2').click( function() {
          if( confirm("¿Estás seguro?")) {
              $.ajax({  
                'url' : '{{asset("deleteOptionMenuL2")}}', 
                'data' : { 
                  'id' : _l2_to_edit
                },   
                'method': 'post', 
                'success' : function( resp ) {
                  console.log( resp ); 
                  window.location.reload(); 
                }  
              });
          } 
        }); 

        $('.btn-save-option-l2').click( function() {
          $('#overlay').fadeIn(300); 
          let title = $('#option-title-l2').val(); 
          let destination = $('#option-destination-l2').val(); 
          $('overlay').fadeIn(300); 
          $.ajax({ 
            'url' : '{{asset("newOptionMenuL2")}}', 
            'data' : { 
              'id_parent' : _l1_option_id, 
              'name' : title, 
              'destination' : destination
            }, 
            'method': 'post', 
            'success' : function( resp ) {
              window.location.reload();  
            } 
          }); 

        }); 
       
        $('.btn-delete-option').click( function( ) {
          if( confirm("¿Estás seguro?")) {
          $.ajax({  
            'url' : '{{asset("deleteOptionMenu")}}', 
            'data' : { 
              'id' : id_to_edit_option
            },  
            'method': 'post', 
            'success' : function( resp ) {
              console.log( resp ); 
              window.location.reload(); 
            }  
          });
        } 
      });

        $('.btn-update-option').click( function() {
            $('#overlay').fadeIn(300); 
            let destino = $('#option-edit-destination').val(); 
            let nombre = $('#option-edit-title').val(); 
             $.ajax({  
                'url' : '{{asset("updateOptionMenu")}}', 
                'data' : { 
                  'id' : id_to_edit_option, 
                  'nombre' : nombre, 
                  'destino' : destino
                }, 
                'method': 'post', 
                'success' : function( resp ) {
                   $('#overlay').fadeOut(300); 
                   window.location.reload();  
            }  
          });
        }); 


        $('.btn-delete-group').click( function( ) {
          if( confirm("¿Estás seguro?")) {
          $.ajax({  
            'url' : '{{asset("deleteGroupMenu")}}', 
            'data' : { 
              'id' : id_to_edit_group
            }, 
            'method': 'post', 
            'success' : function( resp ) {
              console.log( resp ); 
               if( resp == 0 ) { 
                  alert("Es imposible borrar un grupo mientras tenga opciones relacionadas"); 
               } else {
                  window.location.reload(); 
               }
            }  
          });
 

          } 
        }); 

        $('.btn-update-group').click( function() { 
          let nombre = $('#name-edit-group').val(); 
          let destino = $('#destination-edit-group').val(); 
          $('#overlay').fadeIn(300);
           $.ajax({  
            'url' : '{{asset("updateGroupMenu")}}', 
            'data' : { 
              'id' : id_to_edit_group, 
              'nombre': nombre, 
              'destino' : destino 
            }, 
            'method': 'post', 
            'success' : function( resp ) {
               console.log(resp);  
               $('#overlay').fadeOut(300);
               window.location.reload(); 
            }  
          });
        }); 
         

        $('.btn-save-option').click( function() {
          let title = $('#option-title').val(); 
          let destination = $('#option-destination').val(); 
          $('overlay').fadeIn(300); 
          $.ajax({ 
            'url' : '{{asset("newOptionMenu")}}', 
            'data' : { 
              'group' : id_to_group, 
              'name' : title, 
              'destination' : destination
            }, 
            'method': 'post', 
            'success' : function( resp ) {
              window.location.reload();  
            } 
          }); 

        }); 

        $('#addGroups').click( function() { 
          $('#addGroupsModal').modal('toggle'); 
        }); 

        $('.btn-save-group').click( function() {
          let name = $('#name-group').val(); 
          let destination = $('#destination-group ').val(); 
          $('overlay').fadeIn(300); 
          $.ajax({ 
            'url' : '{{asset("newGroupMenu")}}', 
            'data' : { 
              'name' : name, 
              'destination' : destination
            }, 
            'method': 'post', 
            'success' : function( resp ) {
              window.location.reload(); 
            } 
          }); 
        });  
        
        function getEffect( $name ) {
          let effect = null; 
          switch($name) {
            case "creative1" :  
              effect = ', creativeEffectt:{prev:{shadow: true, translate: [0, 0, -400], }, next: { translate: ["100%", 0, 0], },'; 
              break; 
          }
          return effect; 

        }
 
        $('#updateSliderOptions').click( function() {  
          let effect = $("#slider-1-effect").val(); 
          //effect = getEffect(effect); 
          let timer = 0;
          if( $('#slider-timer').is(':checked') ) {
              timer = 1; 
            } 

        	$('#overlay').fadeIn(300); 
        	let time = $('#slider-time').val(); 
      			let autoplay = 0; 
      			if( $('#slider-autoplay').is(':checked') ) {
      				autoplay = 1; 
      			} else {
      				autoplay = 0; 
      			}
      			$.ajax({
				'url' : '{{asset("updateSliderConfig")}}', 
				'data' : {
					'time' : time, 
					'autoplay' : autoplay, 
					'id' : 1, 
          'effect' : effect, 
          'timer' : timer 
				}, 
				'method' : 'post', 
				'success' : function( resp ) {
					console.log( resp ); 
					$('#overlay').fadeOut(300); 
				}
			}); 
        }); 

        $('#updateSliderOptions-2').click( function() {  
        	$('#overlay').fadeIn(300); 
        	let time = $('#slider-time-2').val();  
			let autoplay = 0; 
			if( $('#slider-autoplay-2').is(':checked') ) {
				autoplay = 1; 
			} else {
				autoplay = 0; 
			}
			$.ajax({
				'url' : '{{asset("updateSliderConfig")}}', 
				'data' : {
					'time' : time, 
					'autoplay' : autoplay, 
					'id' : 2 
				}, 
				'method' : 'post', 
				'success' : function( resp ) {
					console.log( resp ); 
					$('#overlay').fadeOut(300); 
				}
			}); 
        }); 

        $('#guardarEnvios').click( function() {
            let option_shipment = $('#optionShipment').val(); 
            let shipment_price  = $('#priceShipment').val(); 
            if( shipment_price.length < 1 ) {
              alert("siempre debe haber una cantidad fija por seguridad"); 
            }

            $('#overlay').fadeIn(300); 
            $.ajax({ 
              'url' : '{{asset("saveConfigAdmin")}}', 
              'data' : {
                'config' : [
                              {"shipment_option": option_shipment }, 
                              {"shipment_flat_price": shipment_price}
                            ]
              }, 
              'method' : 'post', 
              'success' : function( resp ) {
                console.log(resp); 
                $('#overlay').fadeOut(300); 
                window.location.reload(); 
              }
            }); 
        }); 

        $('#saveContact').click(function() {
          let contact_mail = $('.contact-mail').val(); 
          let contact_phone = $('.contact-phone').val(); 
           $("#overlay").fadeIn(300);　
              $.ajax({
                'url' : '{{asset("saveConfigMail")}}', 
                'method' : 'post', 
                'data' : {   
                            'mail'  : contact_mail, 
                            'phone' : contact_phone 
                          },  
                'success' : function( resp ) {
                  console.log(resp);  
                  $("#overlay").fadeOut(300);　
                  window.location.reload(); 
                }  
              });
        }); 

        $('#saveColorHeader').click( function() {
              let color = $('.color-picker').val();
              let colorText = $('.color-picker-text').val(); 
              $("#overlay").fadeIn(300);　
              $.ajax({
                'url' : '{{asset("saveConfigColor")}}', 
                'method' : 'post',  
                'data' : {  'color' : color, 'colorText' : colorText },  
                'success' : function( resp ) {
                  console.log(resp);  
                  $("#overlay").fadeOut(300);　
                  window.location.reload(); 
                }
              });
        }); 

         $('#saveClip').click( function(){
              $("#overlay").fadeIn(300);　
              let clip = $('.summernote_descripcion').summernote('code');  
              let ips  = $('#ips').val().trim(); 
              $.ajax({
                'url' : '{{asset("saveConfig")}}', 
                'method' : 'post', 
                'data' : { 'edit' : {'layout' : clip, 'ips' : ips} },  
                'success' : function( resp ) {
                  console.log(resp);  
                  $("#overlay").fadeOut(300);　
                  window.location.reload(); 
                }
              }); 
         }); 

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

         $('.summernote_descripcion').summernote('code', '{{$clip}}');  

         new Sortable(sortablelist, {
         animation: 150,
         ghostClass: 'sortable-ghost'
       });

       $(".list-banners").owlCarousel({
                navigation : false,
                slideSpeed : 2000, 
                paginationSpeed : 2000,
                loop: true,  
                center: false,  
                singleItem:false,  
                items : 1,
                autoplay: true, 
                autoplayTimeout:3000,
                lazyLoad: true, 
                 responsive:{
                    0:{
                        items:1, 
                        nav:false
                    }, 
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:false,
                    }
                } 
            }); }

</script>

</div>

 