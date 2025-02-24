<div class="section-content">
 <!--  
	<div class="section-header">
		<div class="col-lg-12" style="padding: 0px;">
			<div class="col-lg-6" style="padding: 0px;">
				<h3 style="margin-top: 0px;">Información de contacto</h3> 
			</div>
			<div class="col-lg-6">
				<h4 style="margin-top: 0px;">¿Ya tienes una cuenta? <a href="">Iniciar sesión</a></h4>
			</div> 
		</div>  
	</div> 
	<div class="section-container">
		<div class="row">
			<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
				 <span>Correo electrónico</span> 
				<input class="form-control" placeholder="@" type="" name="">
			</div>
			<div class="col-lg-12 col-md-4">
				 <label><input type="checkbox" checked name=""><span> Recibir promociones y ofertas exclusivas</span></label>
			</div>
		</div>
	</div>
--> 
</div>
<div class="section-content">
	<div class="section-header">
		<h3>DATOS DE CLIENTE</h3> 
	</div> 
	<form id="checkout-client-data"> 
		<div class="section-container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 10px; ">
					<span>Nombre del cliente *</span>  
					<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]{2,40}" class="form-control" title="Necesitamos un nombre válido" placeholder="nombre" type="text" id="form-name-client" required name="nombre-cliente" value=""> 
				</div>   
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
					<span>Primer apellido *</span>  
					<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]{2,40}" class="form-control" title="Necesitamos al menos un apellido válido" placeholder="tu primer apellido" type="" name="" id="form-lastaname1-client" required value="">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
					<span>Segundo apellido</span> 
					<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]{2,40}" class="form-control" title="!" placeholder="tu segundo apellido" type="" name="" id="form-lastaname2-client"> 
				</div> 
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
					<span>Correo *</span>
					<input class="form-control" title="Necesitamos un correo de contacto válido" placeholder="correo@ejemplo.com" type="email" name="" value="" required id="form-mail-client">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 10px; ">
					<span>Teléfono *</span>  
					<input class="form-control" title="Este campo sólo puede contener números" id="telefono-u" placeholder="(33) 01010101" type="tel" pattern="[0-9()+]{8,17}"  required value="" id="form-phone-client">   
				</div>  
				<style type="text/css"> 
					input:invalid { 
					  border: orange solid 1px;
					}
				</style>
				
			</div>
		</div>
	</form>
</div>
<div class="section-container"> 
	<div class="section-header" style="padding-right: 0px;"> 
		<div class="col-lg-12 container-buttons">
			<div class="col-lg-6 nppad" style="text-align: left;"></div>  
			<div class="col-lg-6 nppad" style="text-align: right;">   
				<span class="mje-validation" style="display: none;">Ups, algo está mal </span>
				<button type="button" form="checkout-client-data" class="btn btn-primary btn-checkout btn-check-inicio" {{$next}}>Continuar</button>
			</div> 
		</div>
	</div>  
</div>