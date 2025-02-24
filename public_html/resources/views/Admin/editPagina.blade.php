@extends('Admin.layout')

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
	    	<style type="text/css">

        /* styles table */ 
        th { background-color: transparent!important; } 
        table { border: 0px!important; }
         
        table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
          background-color: transparent;
        }
        table.dataTable.display tbody tr.even>.sorting_1, table.dataTable.order-column.stripe tbody tr.even>.sorting_1 { background-color: transparent; }



        .grid-stack {
            background: lightgoldenrodyellow;
        }
        .grid-stack-item-content {
            color: #2c3e50;
            text-align: center;
            background-color: #eff3f6; 
            border: 2px solid #e5e5e5; 
            box-shadow: 1px 5px 9px 2px #e8edf1; 
        }
        .grid-stack-item-content {
			border-radius: 4px; 
			padding-top: 4px; 
			padding-left: 4px; 
		}
		.grid-stack {
			background-color: white;  
			
			padding-top: 20px!important; 
		}
		div {  
			transition-property: all!important; 
			transition-duration: .2s; 
		} 
    
    .container-header-section {
      padding-bottom: 40px;  
    }
    .container-header-section h1 { font-weight: 900; }

      
    .dataTables_length select { border-radius: 10px; width: 60px; padding: 4px 5px; }


    .span-status {
      background-color: #caf4df;
      padding: 2px 8px;
      border-radius: 5px;
      font-weight: bolder;
    }

    .span-status-inactive {
      background-color: #847979;
      color: white;
    }

	</style>       
 
 
<link rel="stylesheet" href="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.min.css">
<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>

<div class="col-lg-10 col-md-10 col -sm-10 col-xs-12">
	<div class="panel-right">  
			<div class="col-lg-12 table-container" style="padding-top: 20px;">
            <div class="container-header-section container-fluid np">
              <div class="col-lg-4 np">
                <h1 class="pull-left">PÁGINA</h1>                       
              </div>
              <div class="col-lg-8">
                <div class="col-lg-6">
                </div> 
                <div class="col-lg-6" style="padding-top: 20px;">
                </div>
              </div> 
            </div>  
            <div class="col-lg-12">
              <label>Nombre</label> 
              <input id="page-name" disabled class="form-control" type="" name="" value="{{$page->name}}"> 
            </div>
            <div class="col-lg-12">
              <label>Título</label> 
              <input id="page-title" disabled class="form-control" type="" name="" value="{{$page->title}}"> 
            </div>
            <div class="col-lg-12"> 
              <label>URL</label> 
              <input id="page-url"  disabled class="form-control" type="" name="" value="{{$page->url}}"> 
            </div>
            <div class="col-lg-12" style="display: inline-block;">
              <label>Contenido</label> 
              <div class="summernote_descripcion"></div>
            </div>
			</div>
      <div class="col-lg-12">
          <div class="col-lg-6">
          </div> 
          <div class="col-lg-6" style="padding-top: 10px;"> 
              <button id="btn-save" class="btn btn-primary pull-right">Guardar</button>
          </div>
      </div>
	</div>
</div>

 <style type="text/css">
     .modal-backdrop {
        z-index: 99!important;
     } 
     #img-product {
        width: 100px;  
        display: inline-block;
     } 

     .element-gallery {
        height: 200px;
        width: 200px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        border: 1px solid gray;
        display: inline-block;
     }

     .modal-dialog {
  width: 80%!important;
  height: 80%!important;
  margin: 0;
  padding: 0;
}
.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
.status-photo {
    position: relative;
    left: -44%;
    transform: scale(2);
}  
 .list-group .list-group-item {
  border-radius: 0;
  cursor: move;
}
.list-group .list-group-item:hover {
  background-color: #f7f7f7;
}
 </style>
  
</div>

 
<script type="text/javascript"> 
  
     function showProduct( id ) {
      window.location.href = 'editPage/'+id; 
    } 


    let content = null; 

    window.onload = function() {

         $('#btn-save').click( function() {
            let name  = $('#page-name').val(); 
            let title = $('#page-title').val(); 
            let url   = $('#page-url').val(); 
            let desc_short_product = $('.summernote_descripcion').summernote('code');  
            let id = {{$page->id}}; 
            console.log(name); 
            console.log(title); 
            console.log(url); 
            console.log(desc_short_product);  
            $('#overlay').fadeIn(300); 
            $.ajax({
              'url' : "{{asset('updatePage')}}", 
              'method' : 'post',  
              'data' : {
                'id'   : id, 
                'name' : name, 
                'title' : title, 
                'url'   : url, 
                'content' : desc_short_product
              }, 
              'success' : function(resp) {
                console.log( resp ); 
                $('#overlay').fadeOut(300);  
              }
            }); 
         });  

         var config_editor = {
                minHeight: 350, 
                placeholder: 'contenido de la página...',
                tabsize: 2,
                height: 120, 
                lang: 'es-MNX',
                toolbar: [
                          // [groupName, [list of button]]
                          ['style', ['bold', 'italic', 'underline', 'clear']],
                          ['font', ['poppins']],
                          ['fontsize', ['fontsize']],
                          ['color', ['color']],
                          ['para', ['ul', 'ol', 'paragraph']],
                          ['height', ['height']], 
                          ['insert', ['table']], 
                          ['view', ['fullscreen', 'codeview', 'help']]
                        ]
        };  

        let sm = $('.summernote_descripcion').summernote(config_editor);
        content = "@php echo  preg_replace('[\n|\r|\n\r]', '', str_replace('"', "'", $page->content)); @endphp";  
        sm.summernote('code', content);    
        console.log( content ); 

    }
</script>
 