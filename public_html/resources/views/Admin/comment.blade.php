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
 
  
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
  <style type="text/css">
    .container-coment {
      background-color: #dddddd; 
      padding: 20px 40px; 
      border-radius: 7px; 
      margin: 40px 0px; 
    }
    .btn-reply {
      font-size: 20px!important;   
    }
    .repply-input {
      font-size: 22px!important;  
    }
    .bold { font-weight: bolder; }
    .resp-prev { font-size: 17px;  }
  </style>
      <div class="panel-right">  
      <div class="row" style="padding-top: 30px;">
           <h1>Comentario</h1> 
      </div>   
      <h1></h1>
      <div class="form-row"> 
        <div class="form-group col-md-4 np">
          <label for="inputEmail4">Nombre</label> 
          <input type="email" class="form-control" disabled value="{{$comment[0]->name}}" id="clientName" placeholder="Email">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Producto</label> 
          <input type="email" class="form-control" disabled value="{{$comment[0]->sku}}" id="clientName" placeholder="Email">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Fecha</label> 
          <input type="email" class="form-control" disabled value="{{$comment[0]->fecha}}" id="clientName" placeholder="Email">
        </div>
        <div class="col-lg-12">
          <h2>Calificación: {{$comment[0]->calification}}/5</h2>
        </div>
        <div class="col-lg-12">
          <div class="col-lg-6 np">
            <div class="col-lg-12 np">
              <div class="container-coment">
                <label style="font-size: 20px;">Comentario / Pregunta</label>
                <p style="font-size: 17px;">{{$comment[0]->comment}}</p>
                <div class="repply-section">
                  @if( strlen( $comment[0]->respuesta ) > 1 )
                    <p class="resp-prev">
                      <span class='bold'>RESPUESTA:</span> {{$comment[0]->respuesta}}
                    </p>
                  @else 
                    <p class="resp-prev"></p>
                  @endif 
                  <textarea class="form-control repply-input" placeholder="escribe aquí..."></textarea>
                  <p></p>
                  <p></p>
                  <button class="btn btn-reply">Contestar</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6"> 
            
          </div>
        </div>
        <div class="form-group col-md-4 np">  
          <label for="inputEmail4">Aprobar &nbsp; &nbsp;</label>  
          @if( $comment[0]->status == 1 )
            <input type="checkbox" style="transform: scale(1.8);" checked id="approved" placeholder="Email">
          @else 
            <input type="checkbox" style="transform: scale(1.8);" id="approved" placeholder="Email">
          @endif 
        </div>
      </div>
 
    
    <div class="col-lg-12 np">
      <button type="button" id="btnSave" class="btn btn-primary">Guardar</button> 
      <button class="btn btn-primary" id="deleteComment" type="button" style="background-color: orange;">Borrar</button>
    </div>
   
</div>
</div>

 
<script type="text/javascript">
  $("#deleteComment").click( function() {
    if( confirm("¿Estás seguro?") ) {
      $("#overlay").fadeIn(); 
      $.ajax({
        'url' : '{{asset('deleteComment')}}', 
        'method' : 'post', 
        'data' : { 
          'id' : {{$comment[0]->id}}
        },
        'success' : function(resp) {
          window.location.href = "{{asset('comments-admin')}}"; 
        }
      })
    }
  }); 

   let aprovado = 0; 
   let resp = '{{$comment[0]->respuesta}}';   
   $('.btn-reply').click( function() {
    if ($('#approved').prop('checked')) {
      aprovado = 1; 
    }
    resp = $('.repply-input').val(); 
    if( resp.trim().length > 0 ) { 
      $('.resp-prev').html( "<span class='bold'>RESPUESTA:</span> "+ resp); 
    }
    $('.repply-input').val(""); 
   }); 
  
   $('#btnSave').click( function(){

    if ($('#approved').prop('checked')) {
      aprovado = 1; 
    }

    $.ajax({
      'url' : '{{asset("updateComment")}}', 
      'method' : 'post', 
      'data' : {
        'id' : '{{$comment[0]->id}}'.trim(), 
        'resp' : resp, 
        'aprovado' : aprovado, 
      }
      , 'success' : function( res ) {
          console.log(res); 
          window.location.reload(); 
        }
    }); 
  });
</script>
 