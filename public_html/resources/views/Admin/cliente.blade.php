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

           .np { padding: 0px!important; }
    </style>


<!-- Modal -->
<div id="exampleModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asignar una nueva contraseña <span id="modal-nparte"></span></h4>
      </div>
       <div class="modal-body modal-sm">
        <div class="row">
          <div class="col-lg-12">
            <label>Contraseña</label>
            <input id="pass1" class="form-control" type="password" name="">
          </div>
          <div class="col-lg-12">
            <label>Repita la contraseña</label>
            <input id="pass2" class="form-control" type="password" name="">
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button id="savePass" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal">
          guardar
        </button>
      </div>
    </div>
  </div>
 

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">


      <div class="panel-right">  
      <div class="row" style="padding-top: 30px;">
           <h1>Cliente => {{$cliente->nombre}} {{$cliente->apellidos}}</h1> 
      </div>   
            <form>
     <div class="form-row"> 
      <div class="form-group col-md-4 np">
        <label for="inputEmail4">Nombre</label> 
        <input type="email" class="form-control" value="{{$cliente->nombre}}" id="clientName" placeholder="Email">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Apellidos </label>
        <input type="text" class="form-control" id="clientLastName" value="{{$cliente->apellidos}}" placeholder="Password">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Teléfono</label>
        <input type="text" class="form-control" id="clientPhone" value="{{$cliente->telefono}}" placeholder="teléfono">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 np">
        <label for="inputEmail4">Correo</label>
        <input type="email" class="form-control" value="{{$cliente->correo}}" id="clientEmail" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contraseña <!-- Trigger the modal with a button -->
<!-- Button trigger modal -->
         <a href="#" class="edit">Editar</a>
 </label>
        <input type="password" class="form-control" id="inputPassword4" value="......" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Dirección</label>
      <input type="text" class="form-control" id="inputAddress" id="clientDirection" placeholder="Dirección de envío" value="{{$cliente->direccion}}">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Dirección de facturación</label>
      <input type="text" class="form-control" id="inputAddress2" id="clientBill" placeholder="Dirección de facturación" value="{{$cliente->direccion_facturacion}}">
    </div> 
    <div class="form-row">
      <div class="form-group col-md-3 np">
        <label for="inputCity">Ciudad</label>
        <input type="text" value="{{$cliente->ciudad}}" class="form-control" id="clientCity">
      </div>
      <div class="form-group col-md-3">
        <label for="inputCity">Grupo</label>
        <select class="form-control" id="clientGroup">      
          @foreach ($grupos as $key => $grupo )  
            @if($grupo->id == $cliente->grupo ) 
              <option selected="selected" value="{{$grupo->id}}">{{$grupo->nombre}}</option>
            @else 
              <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
            @endif  
          @endforeach 
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Estado</label>
        <select id="clientState" class="form-control">
          @foreach( $states as $state )
            @if( $cliente->estado == $state->id )
              <option value="{{$state->id}}" selected>{{$state->name}}</option>
            @else 
              <option value="{{$state->id}}">{{$state->name}}</option>
            @endif 
          @endforeach  
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">CP</label>
        <input type="text" class="form-control" id="inputZip" value="{{$cliente->cp}}">
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Registrado
        </label>
      </div>
    </div>
    <button type="button" id="btnSave" class="btn btn-primary">Guardar</button> 
    <button class="btn btn-primary" id="deleteClient" type="button" style="background-color: orange;">Borrar</button>
  </form>
</div>
</div>

 
<script type="text/javascript">
  
  $('#deleteClient').click( function() {
    if( confirm("¿estás seguro?") ) {
        $('#overlay').fadeIn(); 
        $.ajax({
          'url' : '{{asset("deleteClient")}}',  
          'data' : {
            'id' : {{$cliente->id}}
          }, 
          'method': 'post', 
          'success' : function( resp ) {
            $('#overlay').fadeOut(); 
            window.location.href = 'https://begima.com.mx/clientes'; 
          }
        }); 
    } 
  }); 

  $('#savePass').click( function() {
      let pass1 = $('#pass1').val(); 
      let pass2 = $('#pass2').val(); 
      console.log(pass1.length); 
      console.log(pass2.length); 
      if( pass1.length > 7 && pass2.length > 7 ) {
        if( pass1 == pass2 ) {          
          $("#overlay").fadeIn(300);　
          $.ajax({
            'url' : '{{asset("updatePassClient")}}', 
            'method' : 'post', 
            'data' : { 'id' : {{$cliente->id}}, 'pass' : pass1 }, 
            'success' : function( resp ) {
              console.log(resp); 
              $("#overlay").fadeOut(300);　

            } 
          });

        } else {
          alert("Las contraseñas no coinciden"); 
        }
      } else {
        alert("La contraseña tiene que se mayor a 7 caracteres"); 
      }
  }); 

  $('.edit').click( function() {
    $('#exampleModal').modal('toggle'); 
  }); 

  $("#btnSave").click( function() {

      $("#overlay").fadeIn(300);　 
      let clientName = $('#clientName').val(); 
      let clientLastName = $('#clientLastName').val(); 
      let clientEmail = $('#clientEmail').val(); 
      let inputAddress = $('#inputAddress').val(); 
      let inputAddress2 = $('#inputAddress2').val(); 
      let clientCity = $('#clientCity').val(); 
      let clientGroup = $('#clientGroup').val(); 
      let inputZip    = $('#inputZip').val();

      let id_state  = $("#clientState").val(); 
      let clientPhone  = $('#clientPhone').val(); 
 
      $.ajax({ 
        'url' : '{{asset("saveClientData")}}', 
        'data' : {
          'name' : clientName, 
          'lastname' : clientLastName, 
          'email' : clientEmail, 
          'envio' : inputAddress, 
          'factura' : inputAddress2,
          'city' : clientCity,  
          'group' : clientGroup, 
          'zip' : inputZip, 
          'clientPhone' : clientPhone, 
          'id' : {{$cliente->id}}, 
          'state' : id_state 
        }, 
        'method' : 'post', 
        'success' : function( resp ) {
          console.log( resp ); 
          $("#overlay").fadeOut(300);　 
        }
      }); 
  
  }); 
</script>
 