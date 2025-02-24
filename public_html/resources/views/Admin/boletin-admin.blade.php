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
         <h1>&nbsp;Boletín</h1>
    </div> 
  <table id="example" class="display" style="width:100%">
                        <thead> 
                            <tr>
                                <th>Correo</th>
                                <th>Fecha Registro</th>
                            </tr>
                        </thead>   
                        <tbody> 
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>
                                        <span>{{$cliente->mail}}</span>
                                    </td>
                                    <td>
                                        <span>{{$cliente->registro}}</span>
                                    </td>
                                </tr> 
                            @endforeach 
                        </tbody>
                    </table> 
 
        </div>


</div> 


 
<script type="text/javascript">

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