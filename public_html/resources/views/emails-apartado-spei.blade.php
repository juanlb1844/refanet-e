<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

	<style type="text/css">
		/* ------------------------------------- 
		GLOBAL 
------------------------------------- */
* { 
	margin:0;
	padding:0;
}
* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}


/* ------------------------------------- 
		ELEMENTS 
------------------------------------- */
a { color: #2BA6CB;}

.btn {
	text-decoration:none;
	color: #FFF;
	background-color: #666;
	padding:10px 16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	cursor:pointer;
	display: inline-block;
}

p.callout {
	padding:15px;
	background-color:#ECF8FF;
	margin-bottom: 15px;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {
/* 	padding:15px; */
	background-color: #ebebeb;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}

/* ------------------------------------- 
		HEADER 
------------------------------------- */
table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}


/* ------------------------------------- 
		BODY 
------------------------------------- */
table.body-wrap { width: 100%;}


/* ------------------------------------- 
		FOOTER 
------------------------------------- */
table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}


/* ------------------------------------- 
		TYPOGRAPHY 
------------------------------------- */
h1,h2,h3,h4,h5,h6 {
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left:5px;
	list-style-position: inside;
}

/* ------------------------------------- 
		SIDEBAR 
------------------------------------- */
ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;
/* 	font-weight:bold; */
	margin-right:10px;
/* 	text-align:center; */
	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



/* --------------------------------------------------- 
		RESPONSIVENESS
		Nuke it from orbit. It's the only way to be sure. 
------------------------------------------------------ */

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}

/* Let's make sure tables in the content area are 100% wide */
.content table { width: 100%; }


/* Odds and ends */
.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:600px!important;
}
.column table { width:100%;}
.social .column {
	width: 280px;
	min-width: 279px;
	float:left;
}
/* Be sure to place a .clear element after each set of columns, just to be safe */
.clear { display: block; clear: both; }
/* ------------------------------------------- 
		PHONE
		For clients that support media queries.
		Nothing fancy.  
-------------------------------------------- */
@media only screen and (max-width: 600px) {
	a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
	div[class="column"] { width: auto!important; float:none!important;}
	table.social div[class="column"] {
		width:auto!important;
	}
}
	</style>
<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Begima | Compra</title>
<link rel="stylesheet" type="text/css" href="stylesheets/email.css" >
</head>
 
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<!-- HEADER -->
<table class="head-wrap" bgcolor="#fadaff">
	<tr>
		<td></td>
		<td class="header container" align="">
			<!-- /content -->
			<div class="content">
				<table bgcolor="#fadaff" >
					<tr>
						<td><img style="width: 160px;" src="https://begima.com.mx/media/begima-logotipo-01-web.png"/></td>
						<td align="right"><h6 class="collapse">Folio de tu pedido: {{$body['folio']}}</h6></td>
					</tr>
				</table>
			</div><!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">
			
			<!-- content -->
			<div class="content"> 
				<table>
					<tr>
						<td>
							<div style="text-align: center;"><h4>¡Gracias por tu compra!</h4></div>
							<p class="lead"></p>
							<!-- A Real Hero (and a real human being) -->
							<h4>Este es el listado de los productos que pronto recibirás </h4>
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			@foreach( $body['productos'] as $producto)
			<!-- content -->
			<div class="content">
				<table bgcolor="">
					<tr>
						<td class="small" width="20%" style="vertical-align: top; padding-right:10px;">
							<img src="{{$producto['img']}}" />
						</td>
						<td>
							<h4> {{$producto['name']}} </h4>
							<p><small> Cantidad : {{$producto['cant']}}</small></p>
							<p class="">Talla: {{$producto['talla']}} </p>
							<p class="">Precio: {{$producto['price']}} </p>
							<div style="text-align: right;"> <h5> ${{  number_format( ($producto['price']*$producto['cant']), 2)}} MNX </h5> </div>
							<!-- <a class="btn"> ${{  number_format( $producto['price'], 2)}} MNX</a> -->
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			@endforeach 
			<div style="text-align: right;"> 
				<h5>SUBTOTAL: ${{number_format($body['subtotal'], 2)}} MNX</h5> 
				<h5>TOTAL: ${{number_format($body['total'], 2)}} MNX</h5>
			</div>
			<!-- content --> 
			<div class="content"><table bgcolor="">
				<tr>
					<td>
						<!-- 
							<p <!-- class="callout" >Ante cualquier duda, aclaración o comentario contáctanos: <a href="#">&raquo;</a></p> --> 
						<!-- <h4>Avenida Camino a Bosques de San Isidro, Zapopan Jalisco </h4> --> 
						
						@if( $body['method_send'] == 'Recoger en sucursal' ) 
							<h4 style="font-weight: bolder;">MÉTODO DE ENVÍO: RECOGER EN SUCURSAL ({{ $body['option_send']}}) </h4>  
							<p><a href="{{$body['direction_maps']}}">{{$body['direction_susucrsal']}}</a></p> 
						@else 
							<h4 style="font-weight: bolder;">MÉTODO DE ENVÍO: {{$body['method_send']}} Con un tiempo estimado de entrega de {{$body['option_send']}} días ${{ number_format( $body['price_send'], 2)}} MNX</h4>   
						@endif  

						@if( $body['type'] == 'PAYNET')
							<h4>Has seleccionado pago por tienda, descarga <a href="https://dashboard.openpay.mx/paynet-pdf/mbs3pxfh8gqtec2i5qjy/{{$body['folioop']}}">aquí </a> tus instrucciones para el pago </h4>
						@elseif( $body['type'] == 'SPEI')
							<h4>Has seleccionado pago por deposito o transferencia (SPEI), descarga <a href="https://dashboard.openpay.mx/spei-pdf/mbs3pxfh8gqtec2i5qjy/{{$body['folioop']}}">aquí </a> tus instrucciones para el pago </h4>
						@endif  
						
 
						@if( $body['method_send'] == 'Recoger en sucursal' ) 
							<h5> </h5>
						@else  
							<h5>Dirección de entrega: {{$body['direction']}}</h5>
						@endif 

						<p><img src="https://begima.com.mx/public/media/success-mail.jpg" /></p><!-- /hero -->
						<h4>Ante cualquier duda, aclaración o comentario contáctanos</h4>
					</td>
				</tr>
			</table></div><!-- /content -->
			<!-- content -->
			<div class="content">
				<table bgcolor="">
					<tr>
						<td>
							
							<!-- social & contact -->
							<table bgcolor="" class="social" width="100%">
								<tr>
									<td>
										
										<!--- column 1 -->
										<div class="column">
											<table bgcolor="" cellpadding="" align="left">
										<tr>
											<td>				
												
												<h5 class="">Contáctanos:</h5>
												<p class="">
													<a href="https://www.facebook.com/DistribuidoraBegima" class="soc-btn fb" style="background-image: url('https://begima.com.mx/public/mail/fb.png'); background-repeat: no-repeat;background-position-x: 90%; background-size: contain;">Facebook</a>
													<a href="https://api.whatsapp.com/send?phone=523311706338" class="soc-btn" style="background-color: #48c857; background-image: url('https://begima.com.mx/mail/whatsapp.png'); background-repeat: no-repeat;background-position-x: 90%;background-size: contain;">Whatsapp</p>
													<a href="https://www.instagram.com/distribuidora.begima/" class="soc-btn" style="background-color: #d8003f; background-image: url('https://begima.com.mx/mail/instagram.png');background-repeat: no-repeat;background-position-x: 90%;background-size: contain;">Instagram</p>
													<a href="https://www.youtube.com/channel/UCYBSWsWsTkotGuZgbWBJm1w" class="soc-btn" style="background-color: #ff0000; background-image: url('https://begima.com.mx/mail/yt.png');background-repeat: no-repeat;background-position-x: 90%;background-size: contain;">Youtube</p>
											</td> 
										</tr>
									</table><!-- /column 1 -->
										</div>
										<!--- column 2 -->
										<div class="column">
											<table bgcolor="" cellpadding="" align="left">
										<tr>
											<td>				
												<h5 class="">Información de contacto:</h5>												
												<p>Teléfono: <strong>33.11.706338</strong><br/>Correo: <strong>
													<a href="emailto:contacto@begima.com.mx">contacto@begima.com.mx</a></strong>
												</p> 
											</td>
										</tr>
									</table><!-- /column 2 -->	
										</div>
										<div class="clear"></div>
									</td>
								</tr>
							</table><!-- /social & contact -->
						</td>
					</tr>
				</table>
			</div><!-- /content -->
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
				<!-- content -->
				<div class="content">
					<table>
						<tr>
							<td align="center">
								<p>
									<a href="https://begima.com.mx/terminos">Terminos y Condiciones</a> |
									<a href="https://begima.com.mx/politica-de-privacidad">Política de privacidad</a>
								</p>
							</td>
						</tr>
					</table>
				</div><!-- /content -->
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>