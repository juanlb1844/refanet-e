  @extends('Admin.layout')


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 

    <style type="text/css">
          .panel-right { 
            padding-top: 220px; 
           }
    </style>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">


    <div class="panel-right">  
    <div class="row" style="padding-top: 30px;">
         <h1>&nbsp;Comentarios</h1> 
    </div> 
                    <table id="example" class="display" style="width:100%"> 
                        <thead> 
                            <tr>
                                <th>Comentario</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>   
                        <tbody>  
                            @foreach($clientes as $cliente)
                                <tr onclick="viewComment({{$cliente->id}})"> 
                                    <td> 
                                        <span style="font-size: 18px;">{{$cliente->comment}}</span>
                                    </td> 
                                    <td>
                                        <img src="{{$cliente->img}}" style="width: 120px">
                                    </td> 
                                    <td>
                                        <span>{{$cliente->fecha}}</span>
                                    </td>
                                </tr> 
                            @endforeach 
                        </tbody>
                    </table> 
                    <style type="text/css">
                        .label-admin {
                            font-size: 20px; 
                        }
                        .section-config {
                            padding-top: 40px; 
                            font-weight: 500;
                        }
                        hr { border-top: 2px solid #d4d4d4; }
                    </style>
                    <div class="section-config">
                        <div class="col-lg-12">
                            <h1>&nbsp;Tema</h1> 
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-4"> 
                              <p class="label-admin">Fondo del comentario</p>
                                <input class="color-picker" id="back_comments"  style="display: block;" type="color" value="{{$extra['config_site'][16]->content}}">
                            </div>
                            <div class="col-lg-4">  
                              <p class="label-admin">Botón</p>
                                <input class="color-picker" id="btn_comments" style="display: block;" type="color" value="{{$extra['config_site'][17]->content}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" id="save-data">GUARDAR</button>
                        </div>
                    </div>
        </div>


</div> 
 
<script type="text/javascript">
    $('#save-data').click( function() {
        let back_comments = $('#back_comments').val(); 
        let btn_comments = $('#btn_comments').val(); 
        $('#overlay').fadeIn(); 
        $.ajax({
            'url' : "{{asset('configComments')}}", 
            'method' : 'post', 
            'data' : {
                'back_comments' : back_comments, 
                'btn_comments' : btn_comments
            }, 
            'success' : function( resp ) {
                window.location.reload(); 
            }
        }); 
    }); 
    function viewComment( id ) {
        window.location.href = "{{asset('comment')}}/"+id; 
    }

    function showProduct( id ) {
      window.location.href = "https://begima.com.mx/cliente/"+id; 
    } 
        
    window.onload = function() { 
        
        table = $('#example').DataTable({  
                                          columns : [ { title : 'CORREO'}, 
                                                      {title : 'FECHA REGISTRO'} ], 
                                        "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                                        destroy: true, 
                                         "order"    : [[ 1, "desc" ]], 
                                        "initComplete": function() { 
                                    } 
                            }); 
    }
</script>