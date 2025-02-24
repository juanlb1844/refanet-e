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
           <h1>Método de pago</h1> 
      </div>   
      <h1></h1>
      <div class="form-row"> 
          
        <div class="col-lg-12 np">
          <h2>{{$method[0]->title}}</h2>
        </div> 
      
        <div class="form-group col-md-4 np">  
          <label for="inputEmail4">Activo &nbsp; &nbsp;</label>  
          @if( $method[0]->status == 1 )
            <input type="checkbox" style="transform: scale(1.8);" checked id="status" placeholder="Email">
          @else 
            <input type="checkbox" style="transform: scale(1.8);" id="status" placeholder="Email">
          @endif 
        </div>
         <div class="form-group col-md-4 np">  
          <label for="inputEmail4">Producción &nbsp; &nbsp;</label>  
          @if( $method[0]->modo == 1 )
            <input type="checkbox" style="transform: scale(1.8);" checked id="modo" placeholder="Email">
          @else 
            <input type="checkbox" style="transform: scale(1.8);" id="modo" placeholder="Email">
          @endif 
        </div>
      </div>
 
    
    <div class="col-lg-12 np">
      <button type="button" id="btnSave" class="btn btn-primary">Guardar</button> 
    </div>
   
</div>
</div>

 
<script type="text/javascript">
   $('#btnSave').click( function() {
      let modo = 0; 
      let status = 0; 
        if ($('#modo').prop('checked')) {
            modo = 1; 
        }
        if ($('#status').prop('checked')) {
            status = 1; 
        }
      $('#overlay').fadeIn(); 
      $.ajax({
        'url' : "{{asset('updateMethod')}}", 
        'method' : 'post', 
        'data' : {
          'modo' : modo, 
          'status' : status, 
          'id' : {{$method[0]->id}}
        }, 
        'success' : function( resp ) {
          window.location.reload(); 
        }
      }); 
   }); 
</script>
 