
	<form>
        <div class="form-row">
          <div class="form-group col-md-4 col-xs-8">
            <label for="inputEmail4">Correo</label>
            <input type="email" class="form-control" id="user-mail" placeholder="correo" value="{{session()->get('user')->correo}}">
          </div> 
          <div class="form-group col-md-4 col-xs-8">
            <label for="inputEmail4">Teléfono</label>
            <input type="email" class="form-control" id="user-tel" placeholder="teléfono" value="{{session()->get('user')->telefono}}">
          </div>
          <div class="form-group col-md-4 col-xs-4">
          	<div class="form-group col-md-10" style="margin: 0px!important;">
          		<label for="inputPassword4">Contraseña</label>
          		<p><a href="">Reiniciar</a></p> 
          	</div>
          	<div class="form-group col-md-2 col-xs-4" style="opacity: 0; margin: 0px!important; display: none;">
      	      <label for="inputPassword4">Password</label>
      	      <input class="form-control" type="	" name="">
          	</div>
          </div>
        </div>
        <div class="form-row col-lg-12 col-xs-12 np">
          <div class="form-group col-md-6 col-xs-6">
            <label for="inputCity">Nombre</label>
            <input type="text" class="form-control" id="user-name" value="{{session()->get('user')->nombre}}">
          </div>
          <div class="form-group col-md-6 col-xs-6">  
            <label for="inputState">Apellidos</label>
            <input type="text" class="form-control" id="user-lastname" value="{{session()->get('user')->apellidos}}">
          </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 np">
          <h2>Direcciones <a href="" style="font-size: 14px!important;">Ver libreta de direcciones</a></h2>
        </div>
        <!-- 
        <div class="form-group">
          <label for="inputAddress">Dirección de envío por defecto 
          		@php 
          			//	print_r( session()->get('user') )
          			$estados = array( 'Jalisco', 'Sinaloa', 'Durango', 'Sonora', 'Chihuahua', 'Baja California Sur', 'Baja California', 'Guerrero', 'Nuevo León', 'Nayarit', 'Zacatecas', 'Hidalgo', 'Coahuila', 'Colima', 'Campeche', 'Tlaxcala', 'CDMX', 'Yucatán', 'Quintana Roo', 'Guanajuato', 'Chiapas', 'Puebla', 'Aguascalientes', 'Tamaulipas', 'Veracruz', 'Estado de México' ); 
          			$estado_c = session()->get('user')->estado; 
          		@endphp 
           </label>
          <input type="text" class="form-control" id="user-shiping" value="{{session()->get('user')->direccion}}">
        </div> --> 
        <div class="col-lg-4 col-sm-6 col-xs-6 np">
          <label>Colonia/Fraccionamiento</label>
          <input type="text" class="form-control" id="user-city" value="">
        </div> 
        <div class="col-lg-4 col-sm-6 col-xs-6">
          <label>Calle/Avenida</label>
          <input type="text" class="form-control" id="user-city" value="">
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-6 np">
          <label>Número de vivienda</label>
          <input type="text" class="form-control" id="user-city" value="">
        </div>
          <div class="col-lg-6 col-sm-6 col-xs-12 np">
          <label>Entre calles</label>
          <input type="text" class="form-control" id="user-city" value="">
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <label>Información adicional / Referencia </label>
          <input type="text" class="form-control" id="user-city" value="">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Ciudad</label>
            <input type="text" class="form-control" id="user-city" value="{{session()->get('user')->ciudad}}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Estado</label>
            <select id="user-state" class="form-control">
              @foreach($estados as $estadoc) 
              		@if( $estadoc === $estado_c )  
              				<option selected>{{$estadoc}}</option>
              		@else
              				<option>{{$estadoc}}</option>
              		@endif
              @endforeach 
            </select>
          </div>
          <div class="form-group col-md-2"> 
            <label for="inputZip">CP</label>
            <input type="text" class="form-control" id="user-zip" value="{{session()->get('user')->cp}}">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Política de privacidad
            </label>
          </div>
        </div>
        <button type="button" class="btn btn-primary save-user">GUARDAR</button>
      </form>
 