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
 </style>
  
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
	<div class="panel-right">  
			<div class="col-lg-12 table-container" style="padding: 0px;">
                    <div class="col-lg-12 col-sm-12 cont-title-section">
                        <h2> <span class="title-section">PEDIDOS</span> </h2>
                        <a href="{{asset('crearPedido')}}">
                          <button class="btn btn-primary pull-right">Nuevo pedido</button>
                        </a>
                    </div>
                    <table id="example" class="display" style="width:100%">
                        <thead>  
                            <tr>
                                <th>ID</th>
                                <th style="width: 170px;">PEDIDO #</th>
                                <th>FECHA</th>
                                <th>CLIENTE</th> 
                                <th>TOTAL</th>
                                <th>MÉTODO DE PAGO</th> 
                                <th>ESTADO</th>
                            </tr>
                        </thead>  
                        <tbody> 
                            @foreach($pedidos as $pedido) 
                                <tr onclick="showProduct('{{$pedido->folio}}')">
                                    <td>
                                        <span>{{$pedido->id}}</span>
                                    </td>
                                    <td>
                                        <span>{{$pedido->folio}}</span>
                                        @if( $pedido->viewed_panel == 0 )
                                            <span class="notify" style="opacity: 1;">NUEVO</span>
                                        @endif 
                                    </td>
                                    <td>
                                        <span>{{$pedido->fecha_encargo}}</span>
                                    </td>
                                    <td> 
                                        <span>{{$pedido->nombre_cliente}}</span>
                                    </td>
                                    <td>  
                                        <span>{{$pedido->method_pay}}</span>
                                    </td>
                                    <td>
                                        <span style="font-weight: 900;">${{number_format($pedido->total,2)}} MNX</span>
                                    </td>
                                    <td>
                                        <span class="label label-info" style="font-size: 14px;">{{$pedido->status}}</span>
                                    </td>
                                </tr> 
                            @endforeach 
                        </tbody>
                    </table> 
			</div>
	</div>
</div>
 
<script type="text/javascript">
        function showProduct( folio ) { 
            window.location.href = "{{asset('pedidoDetalles')}}/"+folio; 
        }

    window.onload = function() {
        

        table = $('#example').DataTable( 
                    {  
                      columns : [ 
                                  { title : 'ID'}, 
                                  { title : 'PEDIDO #'}, 
                                  { title : 'COMPRADO EN'}, 
                                  { title : 'CLIENTE'}, 
                                  { title : 'MÉTODO DE PAGO'},  
                                  { title : 'TOTAL'}, 
                                  { title : 'ESTADO'} ], 
                    "language" : { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },  
                    destroy: true, 
                    "order"    : [[ 0, "desc" ]], 
                    "initComplete": function() {
                                 
                    } 
            }); 
    }
</script>
 