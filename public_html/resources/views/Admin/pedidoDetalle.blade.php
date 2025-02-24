@extends('Admin.layout')
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 

 <style type="text/css">
     .cont-title-section {
        padding: 10px 0px; 
        padding-left: 0px!important;  
     }
     .title-section {
        font-size: 25px;  
        font-weight: 900; 
     }

     .np { padding: 0px; }

     input { font-size: 15px!important; font-weight: bolder!important; }

     .color-picker {
        width: 40px; 
        height: 40px; 
        display: inline-block;
        border-radius: 50%; 
     }
 </style>
  
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
	<div id="panel-right" class="panel-right">  
			<div class="col-lg-12 table-container" style="padding: 0px;">
                  <div class="content-products-list">
                        <div class="col-lg-12 col-sm-12 cont-title-section">
                            <h4>PRODUCTOS DE LA COMPRA</h4>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead>  
                                <tr>
                                    <th>SKU</th>
                                    <th>TÍTULO</th> 
                                    <th style="width: 85px!important;">PRECIO</th>
                                    <th>TALLA</th>
                                    <th>CAN</th>
                                    <th>COLOR</th>
                                    <th>IMAGEN</th>
                                </tr>
                            </thead>  
                            <tbody> 
                                    @foreach( $productos as $producto )  
                                      <tr>
                                         <td style="font-size: 17px;">{{$producto->nparte}}</td> 
                                         <td style="font-size: 17px;">{{$producto->descripcion}}</td> 
                                         <td style="font-size: 17px;">${{$producto->precio}} MNX</td> 
                                         <td style="font-size: 17px;">{{$producto->talla}}</td>
                                         <td style="font-size: 17px;">{{$producto->cant}}</td>
                                         
                                         <td style="font-size: 17px;">
                                            <span class="color-picker" style="background-color: {{$producto->color}}">
                                            </span>
                                          </td>
                                      
                                         <td style="font-size: 17px;">
                                           <img style="width: 80px;" src="{{$producto->img}}">
                                         </td> 
                                      </tr>
                                    @endforeach 
                            </tbody>
                            <tfoot>  
                                <tr>
                                    <th></th>
                                    <th></th>  
                                    <th> 
                                      <span style="font-size: 20px;">SUBTOTAL: <span>${{number_format($pedido->total, 2)}}</span></span>
                                    </th>
                                    <th></th> 
                                    <th></th>
                                    <th style="font-size: 20px;">ENVÍO: ${{number_format($pedido->price_send, 2)}}</th>
                                    <th style="font-size: 20px;">TOTAL: ${{number_format($pedido->total, 2)}}</th>
                                </tr>
                            </tfoot>
                        </table> 
                    </div>
                    <div class="col-lg-12 col-sm-12 cont-title-section">
                        <div class="col-lg-6 np">
                          <h2> <span class="title-section">DETALLE DE ORDEN [{{$pedido->folio}}]</span> </h2>
                        </div>
                        <div class="Col-lg-6 np">
                          <button id="print" class="btn btn-primary">Imprimir</button>
                        </div>
                    </div>
                    <div class="content-detalles"> 
                        <form>
                        <div>
                            <h4>CLIENTE</h4>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 np">
                            <div class="col-lg-4 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Cliente</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->nombre_cliente}}">
                                  </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Correo</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$pedido->correo_cliente}}">
                                  </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Teléfono <span class="call btn btn-default btn-xs"><a href="tel:{{$pedido->telefono_cliente}}">marcar</a></span></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->telefono_cliente}}">
                                  </div>
                            </div>
                        </div>
                        </form>

                        <form>
                        <div>
                            <h4>ENVÍO</h4>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 np">
                          <div class="col-lg-4 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Método de énvio / Recolección </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->method_send}}">
                                  </div>
                            </div>
                            @if( $pedido->method_send == 'Recoger en sucursal')  
                              <div class="col-lg-3 col-sm-3 col-xs-4"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputEmail1">Sucural</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->option_send}}">
                                    </div>
                              </div>
                              <div class="col-lg-3 col-sm-3 col-xs-4"> 
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Fecha a recoger</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->fecha_recollection}}">
                                    </div>
                              </div>
                            @else 
                              <div class="col-lg-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Días</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->option_send}}">
                                    </div>
                              </div>
                              <div class="col-lg-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Precio</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->price_send}}">
                                    </div>
                              </div>
                            @endif 

                            <div class="col-lg-6 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->estado_cliente}}">
                                  </div>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Ciudad</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$pedido->ciudad_cliente}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 np">
                            <div class="col-lg-3 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">CP</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->cp_cliente}}">
                                  </div>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">DIRECCIÓN</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->direccion_cliente}}">
                                  </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Referencia adicional</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->referencia_direccion}}">
                                  </div> 
                            </div> 
                        </div>
                        </form>

                        <form>
                        <div>
                            <h4>COMPRA</h4>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 np">
                            @if( $pedido->method_pay == 'SUCURSAL')
                              <div class="col-lg-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">MÉTODO DE PAGO</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->method_pay}}">
                                    </div>
                              </div>
                               <div class="col-lg-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">SUCURSAL</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->store_to_pay}}">
                                    </div>
                              </div>
                              <div class="col-lg-4 col-sm-4 col-xs-4"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputPassword1">TOTAL</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" value="$ {{number_format($pedido->total, 2)}} MNX">
                                    </div>
                              </div>
                            @elseif( $pedido->method_pay == "PAYNET")
                             <div class="col-lg-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">MÉTODO DE PAGO</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->method_pay}}">
                                    </div>
                              </div>
                               <div class="col-lg-4 col-sm-4 col-xs-4"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputPassword1">ARCHIVO</label>
                                      <iframe style="width: 100%; height: 800px;" src="https://dashboard.openpay.mx/paynet-pdf/mbs3pxfh8gqtec2i5qjy/{{$pedido->id_openpay}}"></iframe>
                                    </div>
                              </div>
                               <div class="col-lg-4 col-sm-4 col-xs-4"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputPassword1">TOTAL</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" value="$ {{number_format($pedido->total, 2)}} MNX">
                                    </div>
                              </div>
                            @elseif( $pedido->method_pay == "SPEI")
                               <div class="col-lg-4 col-sm-4 col-xs-4">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">MÉTODO DE PAGO</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->method_pay}}">
                                      </div>
                                </div>
                                 <div class="col-lg-4 col-sm-4 col-xs-4"> 
                                      <div class="form-group"> 
                                        <label for="exampleInputPassword1">ARCHIVO</label>
                                        <iframe style="width: 100%; height: 800px;" src="https://dashboard.openpay.mx/spei-pdf/mbs3pxfh8gqtec2i5qjy/{{$pedido->id_openpay}}"></iframe>
                                      </div>
                                </div>
                                 <div class="col-lg-4 col-sm-4 col-xs-4"> 
                                      <div class="form-group"> 
                                        <label for="exampleInputPassword1">TOTAL</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="$ {{number_format($pedido->total, 2)}} MNX">
                                      </div>
                                </div>
                            @else 
                              <div class="col-lg-3 col-sm-4 col-xs-3">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">MÉTODO DE PAGO</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->method_pay}}">
                                    </div> 
                              </div>
                              <div class="col-lg-3 col-sm-4 col-xs-3">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">TERMINACIÓN</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->terminacion}}">
                                    </div> 
                              </div> 
                                 <div class="col-lg-3 col-sm-4 col-xs-3"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputPassword1">TOTAL</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" value="$ {{number_format($pedido->total, 2)}} MNX">
                                    </div>
                              </div>
                              <div class="col-lg-3 col-sm-4 col-xs-3"> 
                                    <div class="form-group"> 
                                      <label for="exampleInputPassword1">ESTATUS</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" value="{{$pedido->status}}">
                                    </div>
                              </div>
                            @endif  
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 np">
                            <div class="col-lg-6 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">FOLIO</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->folio}}">
                                  </div>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-xs-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ID DE CARGO</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pedido->id_openpay}}">
                                  </div>
                            </div>
                        </div>
                        </form>

                    </div>
                  
			</div>
	</div>
</div>
 
<script type="text/javascript">
        function showProduct( folio ) { 
            /* var route = np.substring(0, 5) +'-'+ np.substring(5, 10);
            $('#modal-nparte').html(route);    */ 
            alert(folio); 
        }

    window.onload = function() {
        $('#print').click( function() {

             let wo = document.body.innerHTML; 
             $('.container-side').remove();
             $('#panel-right').css("padding-left", "0px");
             $('.dataTables_info').remove();
             $('.paging_simple_numbers').remove();
             $('iframe').remove(); 
             $('.option-submenu').remove(); 
             $('#print').remove(); 
             $('tfoot tr').append("<th style='width: 200px;'></th>"); 
             $('tfoot tr').append("<th style='width: 200px;'></th>"); 

             field_1 = '<div class="col-lg-4 col-sm-4 col-xs-4">'+
                                  '<div class="form-group">'+
                                    '<label for="exampleInputEmail1">Reviso <span class="call btn btn-default btn-xs"><a'+
                                    'href="tel:{{$pedido->telefono_cliente}}">marcar</a></span></label>'+
                                    '<input type="email" class="form-control" id="exampleInputEmail1" value="">'+
                                  '</div>'+
                            '</div>'; 

                field_2 = '<div class="col-lg-4 col-sm-4 col-xs-4">'+
                                  '<div class="form-group">'+
                                    '<label for="exampleInputEmail1">Empaqueto <span class="call btn btn-default btn-xs"><a'+
                                    'href="tel:{{$pedido->telefono_cliente}}">marcar</a></span></label>'+
                                    '<input type="email" class="form-control" id="exampleInputEmail1" value="">'+
                                  '</div>'+
                            '</div>'; 


             //document.body.innerHTML += field_1 + field_2; 

             window.print();   
             document.body.innerHTML = wo; 

             //printDiv("panel-right"); 
      
             function printDiv(divName) {
               var printContents = document.getElementById(divName).innerHTML;
               console.log(printContents); 
               var originalContents = document.body.innerHTML;

               printContents += "<style>#print,.dataTables_filter,.dataTables_length,.dataTables_info,.paging_simple_numbers,.call{display:none;} -webkit-print-color-adjust: exact!important; importCSS: true; importStyle: true; </style>"; 
               //printContents = "";   
 
               field_1 = '<div class="col-lg-4 col-sm-4 col-xs-4">'+
                                  '<div class="form-group">'+
                                    '<label for="exampleInputEmail1">Reviso <span class="call btn btn-default btn-xs"><a'+
                                    'href="tel:{{$pedido->telefono_cliente}}">marcar</a></span></label>'+
                                    '<input type="email" class="form-control" id="exampleInputEmail1" value="">'+
                                  '</div>'+
                            '</div>'; 

                field_2 = '<div class="col-lg-4 col-sm-4 col-xs-4">'+
                                  '<div class="form-group">'+
                                    '<label for="exampleInputEmail1">Empaqueto <span class="call btn btn-default btn-xs"><a'+
                                    'href="tel:{{$pedido->telefono_cliente}}">marcar</a></span></label>'+
                                    '<input type="email" class="form-control" id="exampleInputEmail1" value="">'+
                                  '</div>'+
                            '</div>'; 


               document.body.innerHTML = printContents + field_1 + field_2; 

               window.print();
               
               document.body.innerHTML = originalContents;
          }
        }); 



        table = $('#example').DataTable( 
                    {  
                      columns : [ { title : '#SKU'}, 
                                  { title : 'TÍTULO'}, 
                                  { title : 'PRECIO'}, 
                                  { title : 'TALLA'},  
                                  { title : 'CANT'},  
                                  { title : 'COLOR'},  
                                  { title : 'PRODUCTO'} ],  
                    "language" : { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },  
                    destroy: true, 
                        //"order"    : [[ 0, "desc" ]], 
                    "initComplete": function() {
                                 
                    } 
            }); 
    }
</script>
 