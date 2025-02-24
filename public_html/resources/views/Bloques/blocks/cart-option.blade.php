<style type="text/css">
  .modal-to-cart {
    margin-top: 40vh!important;
  }
</style>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm modal-to-cart">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AÑADIDO A TU BOLSA</h4>
      </div>
      <div class="modal-body row">  
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6 col-xs-6">
            <a href="{{asset('carrito')}}">
              <button class="btn btn-primary">Ir al carrito</button>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-6">
            <a href="{{asset('checkout-main')}}">
              <button class="btn btn-primary">Pagar</button>
            </a>
          </div>
        </div> 
      </div>
      <div class="modal-footer" style="display: none">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>