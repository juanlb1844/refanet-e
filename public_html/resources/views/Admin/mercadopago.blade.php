  @extends('Admin.layout')


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('libs/owl.theme.default.css')}}"> 

<script type="text/javascript" src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style type="text/css">
          .panel-right { 
            padding-top: 220px; 
           }
    </style>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">


    <div class="panel-right">  
      <div class="row" style="padding-top: 30px;">
           <h1>MERCADOPAGO</h1>
      </div> 
      <div class="row">
        <div class="col-lg-12">
          <h4>PRUEBA</h4>
          <label>Public Key</label>
          <input class="form-control" type="" name="">
          <label>Token</label>
          <input class="form-control" type="" name="">
        </div>
        <div class="col-lg-12">
          <h4>PRODUCCIÓN</h4>
          <label>Public Key</label>
          <input class="form-control" type="" name="">
          <label>Token</label>
          <input class="form-control" type="" name="">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h4>Modo</h4>
          <select class="form-control">
            <option>Producción</option>
            <option>Prueba</option>
          </select>
        </div>
      </div>


    
    </div>


<script type="text/javascript">
  window.onload = function() {
         new Sortable(sortablelist, {
         animation: 150,
         ghostClass: 'sortable-ghost'
       });

       $(".list-banners").owlCarousel({
                navigation : true,
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
                        nav:true,
                    }
                } 
            }); }

</script>

</div>

 