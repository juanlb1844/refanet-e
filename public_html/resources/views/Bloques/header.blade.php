<link rel="stylesheet" charset="uft-8" type="text/css" href="{{asset('css/header.css')}}">
<link rel="icon" href="{{asset('media/icons/gap-icon.png')}}" type="image/x-icon">
     
@yield('content', View::make('Bloques.loading')) 
 


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '238882351525829');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=238882351525829&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code --> 
   
<div class="row-header">  
 
  <nav class="navbar navbar-default menu-top-mobil" role="navigation">
      <div class="container-fluid"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CATEGORÍAS</a>
           <a class="navbar-brand pull-right" style="padding-top: 4px;" data-toggle="modal" data-target="#session"> 
              <span class="shopy"></span>
            </a> 
        </div> 
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-left container-search-mobile" role="search">
            <div class="form-group">
              <input type="text" class="search-input-mobil form-control" placeholder="BUSCAR">
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> --> 
          </form>
          <ul class="nav navbar-nav" id="container-categories-menu">
             <!-- AGREGADAS POR JS --> 
          </ul>
          <ul class="nav navbar-nav">
             <li><hr/></li>   
            <li><a href="#">Ayuda</a></li>   
            <li><a href="#">Promociones</a></li>   
            <li><a href="#">Mis Pedidos</a></li>   
            <li><a href="#">Registrarme/Iniciar Sesión</a></li>  
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>

 
  <div class="col-lg-12 row-logo">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <div style="padding: 0px;" style="width: 150px;"> 
          <a href="{{asset('index')}}">
            <div class="content-logo-">
              <img src="{{asset('/media/FullColor_Logotipo_horizontal y vertical-02-padd.png')}}">
            </div> 
          </a>
        </div> 
    </div>
    <div class="col-lg-4">
    </div>
  </div>

  <style type="text/css">
      .content-pag p, .content-pag span{
        font-family: 'Popins'!important;
    }
  /* */ 
    .option-mobil {
      font-size: 20px; 
      background-color: #673ab7; 
      padding: 4px; 
      color: white; 
      font-weight: bolder; 
      padding-left: 5px; 
      text-align: center;
    }
    .submenu-mobil {
      margin-bottom: 10px; 
    }
  </style>
   
  <style type="text/css">
    .submenu li {
      display: inline-block!important;
      width: auto!important
    }
    .line-menu-main {
      background-color: #fdc400; color: white; font-size: 17px; padding: 5px 5px; padding-right: 20px; 
    }
    #icon-user {
      fill: white!important;
    }  
  </style> 

  <div class="col-lg-12 col-xs-12 submenu">
 
    <div class="line-menu-main">
      <li class="hover">
	      <a href="{{asset('donde-estamos')}}">
	        Sucursales
	      </a>  
      </li>
      <li class="hover">
          <a href="{{asset('boletin')}}">Boletín</a>
      </li> 
      <li style="width: 350px!important; padding-left: 20px; padding-right: 20px; margin-left: 20px; margin-right: 20px;">
          <div class="autocomplete" style="width: 100%; color:black; background-color: #f1f1f1; border-radius: 4px; padding: 2px 2px 2px 20px;">        
            <input class="search input-search" id="myInput" style="width: 80%; border: 0px;" placeholder="Busca por np o descripción.." type="text" name="field" autocomplete="off">
            <img id="img-search" src="{{asset('/media/search.svg')}}" style="width: 20px;">
          </div>
        </li>      
        <li style="padding: 0px;">   
          <p><img style="width: 30px;" src="{{asset('media/icons/entrega.svg')}}"></p>
        </li>
        <li style="padding: 0px;">
          <p style="font-size: 12px;">Envío Rápido</p>
        </li> 
        <li style="padding: 0px;">  
          <p><img style="width: 30px;" src="{{asset('media/icons/tarjeta-de-credito.svg')}}"></p>
        </li> 
        <li style="padding: 0px;">
          <p style="font-size: 12px;">Pago Seguro</p>
        </li> 
        <li style="padding:0px; padding-left: 10px;">
          <p style="font-size: 12px; font-weight: bolder;">CEL: 33 1170 6338</p>
        </li>
        <li style="padding:0px; padding-left: 10px;">
          <p style="font-size: 12px; font-weight: bolder;">soporte@begima.com.mx</stron></p>
        </li> 

      <span class="pull-right glyphicon glyphicon-shopping-cart cart-section">
        <span class="pull-right cant-cart" style="font-family: 'Poppins'!important; padding-left: 5px;">
          @if(  session()->get('productos') )
            @php print_r( count( session()->get('productos') ) ) @endphp 
          @else 
             {{"0"}}
          @endif 
        </span>
      </span>
       @php  if( session()->has('logueado') ) { @endphp 
          @if( strlen( session()->get('logueado') ) > 1 )
            <span class="pull-right">
               <a onclick="salirFb()" href="{{asset('out')}}">Salir</a>
            </span>
            <a class="pull-right" href="https://begima.com.mx/usuario "> 
              <span> {{ session()->get('info') }} </span>  
            </a>
          @else
            <span class="pull-right"  data-toggle="modal" data-target="#session"> 
                <img id="icon-user" src="https://begima.com.mx/public/icons/user-2.svg" style="width: 30px;">
              </span>
          @endif
        @php  } else { @endphp  
          <span class="pull-right" data-toggle="modal" data-target="#session">
            <img id="icon-user" src="https://begima.com.mx/public/icons/user-2.svg" style="width: 30px;">
          </span>
        @php } @endphp
    </div>
 
    <style type="text/css">
      .container-menu-splash {
        position: absolute;
        top: 75px;
        padding: 20px;
        z-index: 999999;
        height: auto;
        left: 0vw;
        display: none;
        width: 100%;   
        border-radius: 4px;
        text-align: center;
      }

      .content-splash {
        box-shadow: 8px 6px 6px 3px #00000042;
        padding-top: 10px;  
        border: 2px solid #a72d82; 
        background-color: white;
        display: inline-block;
        width: 60%;
        background-image: url(https://begima.com.mx/media/FJFJ.png), url(https://begima.com.mx/media/FFFF.png);
        background-size: contain, contain;
        background-repeat: no-repeat;  
        background-position:  left, right;  
      }

      .container-menu-splash a {
        color: black; 
      } 
      .container-menu-splash li {
        display: block!important; 
      }
      .container-menu-splash li:hover {
        cursor: pointer;
        font-weight: 900!important;  
      } 
    </style>


    <div class="menu-float-0 container-menu-splash">

      <div class="content-splash"> 
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900;">Dama</span>
          </div>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">Ropa Dama</li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/ropa-dama">Ropa Dama</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pijamas-dama">Pijamas</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/babydoll">BabyDoll</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/top-dama">Top Dama</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/camisa-dama">Camisa Dama</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/blusa-dama">Blusa Dama</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/vestido-dama">Vestido Dama</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900;  list-style: none; font-size: 18px;">Ropa Interior</li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/ropa-interior-dama">Ropa Interior</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/tanga-dama">Tanga Dama</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/bikini-dama">Bikini</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/boxer-dama">Boxer</a>  
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pantaleta-dama">Pantaleta</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/panties-dama">Panties dama</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/traje-de-bano-dama">Traje de baño</a>
            </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/cachetero-dama">Cachetero</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4"> 
          <ul>
            <li style="font-weight: 900; list-style: none; font-size: 18px;">
                <a href="https://begima.com.mx/catalogo/brasier-dama">Brasier</a>
              </li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/bralette-dama">Brallete</a></li>
            <li style="font-weight: 900;  font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/brasier-dama">Brasier</a>
            </li>
          </ul>
        </div>
      </div>
    </div> 
    </div>
    <div class="menu-float-1 container-menu-splash">
      <div class="content-splash"> 
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900;">Caballero</span>
          </div>
        </div>
         <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-interior-caballero">Ropa Interior</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;"> 
              <a href="https://begima.com.mx/catalogo/boxer-caballero">Boxer</a></li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/trusa-caballero">Trusa</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-caballero">Ropa Caballero</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pantalon-caballero">Pantalón</a></li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calcetines-caballero">Calcetines</a></li>
            <li style="font-weight: 900; font-weight: 400;"> 
              <a href="https://begima.com.mx/catalogo/tin-caballero">Tin</a></li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/protectopie-caballero">Protectopie</a></li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calceta-caballero">Calceta</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>

    <div class="menu-float-6 container-menu-splash">
      <div class="content-splash">
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900; padding-left: 50px;">Maternidad</span>
          </div>
        </div>
         <div class="col-lg-12">
          <ul>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/brasier-">Brasier</a>  
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calzon-faja">Calzon-faja</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/blusa-maternidad">Blusa maternidad</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>

    <div class="menu-float-- container-menu-splash">
      <div class="content-splash">
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900;">Juvenil</span>
          </div>
        </div>
         <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/calcetines-juvenil">Calcetines</a>  
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/cubre-pie-juvenil">Cubre pie</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/tin-juvenil">Tin</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calceta-juvenil">Calceta</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">Ropa Juvenil</li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/camisa-juvenil">Camisa</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pijama-juvenil">Pijamas</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-interior-juvenil">Ropa Interior</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
               <a href="https://begima.com.mx/catalogo/pantaleta-juvenil">Pantaleta</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/boxer-mujer-juvenil">Bóxer de dama</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>

  <div class="menu-float-2 container-menu-splash">
    <div class="content-splash"> 
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900;">Niña</span>
          </div>
        </div>
         <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/calcetin-nina">Calcetin</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calceta-nina">Calceta</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/mallitas-nina">Mallitas</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calentones-nina">Calentones</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calcetines-nina">Calcetines</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-nina">Ropa Niña</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/camisa-nina">Camisa</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/blusa-nina">Blusa</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/vestido-nina">Vestido</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pijamas-nina">Pijamas</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-interior-nina">Ropa Interior</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pantaleta-nina">Pantaleta</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calzon-nina">Calzón</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>  


      <div class="menu-float-3 container-menu-splash">
      <div class="content-splash">         
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900;">Niño</span>
          </div>
        </div>
         <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/ropa-interior-nino">Ropa Interior</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/boxer-nino">Bóxer</a></li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/trusa-nino">Trusa</a></li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pijama-nino">Pijama</a></li> 
            
          </ul>
        </div>
        <div class="col-lg-4">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/calcetines-nino">Calcetínes</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/tin-nino">Tín</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calceta-nino">Calceta</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calcetin-nino">Calcetín</a>
            </li>
          </ul>
        </div>
         <div class="col-lg-4"> 
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/sudadera-nino">Ropa</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/sudadera-nino">Sudaderas</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>    
 

    <div class="menu-float-4 container-menu-splash">
      <div class="content-splash"> 
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div>
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900; padding-left: 70px;">Curvy</span>
          </div>
        </div>
         <div class="col-lg-12">
          <ul>
            <li style="font-weight: 900; list-style: none;">
              <a href="https://begima.com.mx/catalogo/dama-tallas-extra">Dama</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;"> 
              <a href="https://begima.com.mx/catalogo/faja-tallas-extra">Faja</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pantaleta-tallas-extra">Pantaleta</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/brasier-tallas-extra">Brasier</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pijama-tallas-extra">Pijama</a>
            </li> 
          </ul>
        </div>
         
      </div>
    </div>
    </div> 

    <div class="menu-float-5 container-menu-splash">
      <div class="content-splash"> 
      <div class="col-lg-12">
        <div class="col-lg-12">
            <span style="color: black; display: inline-block; margin-bottom: 20px; font-size: 25px; font-weight: 900; padding-left: 50px;">BEBÉ</span>
        </div>
         <div class="col-lg-12">
          <ul>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/zapatito-para-beb">Zapatitos</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;"> 
              <a href="https://begima.com.mx/catalogo/sabana-y-cobija-bebe">Sábana y cobija</a>
            </li>
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/pañaleros">Pañaleros</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/gorros-bebe">Gorros para bebé</a>
            </li> 
            <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/conjuntos-para-bebe">Conjuntos</a>
            </li> 
             <li style="font-weight: 900; font-weight: 400;">
              <a href="https://begima.com.mx/catalogo/calcetin-bebe">Calcetines</a>
            </li> 
          </ul>
        </div>
         
      </div>
    </div>
    </div>    

      <ul class="main-menu" class="hidden-xs" style="text-align: center;">
        <li class="hover dropdown li-menu">
          <a href="{{asset('promociones')}}"> Promociones  </a> 
        </li>
        @foreach( $categories as $key => $cat )
               
                <li class="hover dropdown li-menu li-menu-{{$key}}">
                  <a href="{{asset('catalogo')}}/{{$cat->slug}}">{{$cat->title}}</a>
                </li>
            
      	@endforeach 
        <!-- 
        <li class="hover">
          <a style="color:black;" href="{{asset('promociones')}}"> Promociones </a>
        </li>  --> 
      </ul>
   
  </div> 

</div> 

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
            <a href="{{asset('checkout')}}">
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

 <script>
   
  function salirFb() {
    console.log("OUT FB"); 
    FB.logout(function(response) {
       console.log('..'); 
    }); 
  } 
  // 269110214642814 mia 
  // luis 569692277545254
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '269110214642814',
      cookie     : true,
      xfbml      : true,
      version    : 'v1.0'
    });
      
    FB.AppEvents.logPageView(); 

    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response); 
    });  

    FB.Event.subscribe('auth.logout', function(response) {
      //alert("JUERA"); 
    });
     
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/es_ES/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);  
   }(document, 'script', 'facebook-jssdk'));

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      console.log("sesión no iniciada con fb"); 
    }  
  }

  var finished_rendering = function() {
  console.log("finished rendering plugins");
}

  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
      alert('..'); 
    });
  }
  
 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
    });
  }

  function logueadoFb() {
    console.log("HOLA"); 
      FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      console.log( response.status );  
      if( response.status == "connected") {
        console.log(response.authResponse.accessToken); 
        window.location = "https://begima.com.mx/auth?type=fb&token="+response.authResponse.accessToken;  
      } else {
        console.log("no conectado"); 
      } 
    });  
  }
</script>

 <!-- Modal -->
<div id="session" class="modal fade" role="dialog" style="z-index: 999999999;">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">INICIAR SESIÓN..</h4>
      </div>
      <div class="modal-body"> 
        <div class="col-lg-12 col-md-12 body-login" style="padding: 0px;">
          <div>
            <div class="col-lg-12 col-md-6">
              <a href="#">
                <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default" data-onlogin="logueadoFb()" data-auto-logout-link="true" data-use-continue-as="true"></div> 
              </a>
            </div>
            <div class="col-lg-12 col-md-6" style="padding-top: 20px;">
              <!-- <a href="#"> 
                <button class="btn login-btn goo">Inicia sesión con google</button>
              </a>--> 
            </div>
          </div>
          <div class="col-lg-12" style="padding: 10px 0px; text-align: center;">
            <hr>
            <style type="text/css">
              .question { color: #337ab7; }
              .question:hover {
                cursor: pointer;
              }
            </style>
            <p> <span  class="question" style="font-size: 14px;" href="">¿No tienes una cuenta? <span></span></span></p>
            <div class="by-mail col-lg-12" style="padding-bottom: 20px;">
                <div class="col-lg-12 col-md-6" style="padding: 5px 0px;"> 
                  <input class="form-control" id="client-user" placeholder="tu correo" type="text" name="correo">
                </div> 
                <div class="col-lg-12 col-md-6" style="padding: 5px 0px;">  
                  <input class="form-control" id="client-pass" placeholder="contraseña" type="password" name="pass">
                </div> 
                 <div class="col-lg-12 col-md-6" style="padding: 0px;">
                  <label>
                    <input style="display: inline-block; width: 10px; height: 10px;" class="form-control" type="checkbox" checked>
                    <span style="font-size: 12px;"> Recordar mi cuenta</span>
                  </label> 
                </div> 
            </div>
            <div style="padding-top: 10px;">
              <span class="por-correo">Entrar</span>
            </div>
          </div>
        </div>
        <style type="text/css">
          .body-register { display: none; }
          .center { text-align: center; }
        </style>
        <div class="col-lg-12 col-sm-12 col-xs-12 body-register">
          <div class="col-lg-12 center">
            <h4>Registrate</h4>
          </div>
        <div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="email" class="form-control" id="register-name" aria-describedby="emailHelp" placeholder="Nombre">
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tus datos con alguien más.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Correo</label>
            <input type="email" class="form-control" id="register-mail" aria-describedby="emailHelp" placeholder="correo electrónico">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Teléfono</label>
            <input type="email" class="form-control" id="register-phone" aria-describedby="emailHelp" placeholder="Teléfono">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="register-pass" placeholder="Asigna una contraseña">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirmar contraseña</label>
            <input type="password" class="form-control" id="register-pass2" placeholder="Confirma tu contraseña">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="register-pass">
            <label class="form-check-label" for="exampleCheck1">Política de privacidad</label>
          </div>
          <button type="submit" class="btn btn-primary register-user">Registrarme!</button>
        </div>
        </div>
      </div>
      <div class="modal-footer" style="display: none">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>

  

<style type="text/css">
  .sublist- {
    display: list-item;
    height: auto;
  }
  .sublist- .dropdown-menu {
    position: static;
    display: inline-grid;
    height: auto;
  }
  #img-search:hover {
    cursor: pointer;
  }
</style>

<script type="text/javascript">
  window.onload = function() { 

    $('#img-search').click( function() {
        let term = $('.input-search').val(); 
        window.location.href  = "https://begima.com.mx/search/"+term; 
        return false; 
    }); 
    $('.search-input-mobil').on('keypress',function(e) {
      if(e.which == 13) {
        let term = $('.search-input-mobil').val(); 
        window.location.href  = "https://begima.com.mx/search/"+term; 
        return false;
      }
    });

    $( ".li-menu-0" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-0').css("display", "block");  
    }); 

    $( ".li-menu-1" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-1').css("display", "block");  
    }); 

    $( ".li-menu-2" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-2').css("display", "block");  
    }); 

    $( ".li-menu-3" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-3').css("display", "block");  
      console.log(".."); 
    }); 

    $( ".li-menu-4" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-4').css("display", "block");  
    }); 

    $( ".li-menu-5" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-5').css("display", "block");  
    }); 

    $( ".li-menu-6" ).hover(function() {
      $('.container-menu-splash').css("display", "none");  
      $('.menu-float-6').css("display", "block");  
    }); 
 
    $( ".owl-carousel" ).hover(function() {
      $('.container-menu-splash').fadeOut();   
    }); 

    $( ".dropdown-toggle" ).hover(function() {
      $('.container-menu-splash').fadeOut();  
    }); 

    $( ".row-logo" ).hover(function() {
      $('.container-menu-splash').fadeOut();  
    }); 

    $( ".products-section" ).hover(function() {
      $('.container-menu-splash').fadeOut();  
    }); 

    $( ".container-page" ).hover(function() {
      $('.container-menu-splash').fadeOut();  
    }); 

    $( ".footer-section" ).hover(function() {
      $('.container-menu-splash').fadeOut();  
    }); 

      /* 
     $( ".container-menu-splash" ).mouseout(function() {
      $('.container-menu-splash').css("display", "block");  
    }); */ 

  setCatsOnDesktop(); 

  function setCatsOnDesktop() {
    $.ajax({
      'url' : "{{asset('getTreeCats')}}", 
      'method' : 'get', 
      'success' : function( resp ) {
        resp = JSON.parse(resp); 
        toScrap = resp;  
        console.log( resp ); 
        resp.forEach( function(a, b) {
           let optionMenu = '<li><a href="https://begima.com.mx/catalogo/'+a.title+'">'+a.title.toUpperCase()+'</a></li>'; 
          if( a.id_parent == 0) {
            let catSuperior = ''+ 
              '<li class="dropdown">'+
                  '<a href="{{asset("catalogo/'+a.title+'")}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'+ a.title.toUpperCase() +
                  '<span class="caret"></span></a>'+  
                  '<ul class="dropdown-menu" id="superior-cat-'+a.id+'">'+ 
                  '</ul>'+ 
                '</li>'; 
            if( a.id == 781 ) 
              $('#container-categories-menu').append(optionMenu); 
            else 
              $('#container-categories-menu').append(catSuperior); 
          } else {
              console.log(".."); 
               
              let optionMenu = '<li><a href="https://begima.com.mx/catalogo/'+a.title+'">'+a.title.toUpperCase()+'</a></li>'; 
              let catSuperior = ''+  
              '<li class="dropdown sublist">'+ 
                  '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'+ a.title.toUpperCase() +
                  '<span class="caret"></span></a>'+   
                  '<ul class="dropdown-menu" id="superior-cat-'+a.id+'">'+ 
                    '<li><a ref="{{asset("catalogo/'+a.title+'")}}">Interior</a></li>'+ 
                  '</ul>'+  
                '</li>';  

              if( ( tienePadre(toScrap, a.id) ) == 'si' ) {
                    $('#superior-cat-'+a.id_parent).append(optionMenu); 
              } else {
                    $('#superior-cat-'+a.id_parent).append(optionMenu); 
              }
          } 
        }); 
      }
    }); 
  }

    function tienePadre( collection, id ) {
      resp = 'no'; 
      collection.forEach( function(a, b) {
        if( a.id_parent == id) resp = 'si'; 
      }); 
      return resp; 
    }


    $('.por-correo').click( function() {
       var client_user = $('#client-user').val(); 
       var client_pass = $('#client-pass').val();  
       window.location = "https://begima.com.mx/auth?type=email&email="+client_user+"&password="+client_pass; 
    }); 

    // switch to show form to : register client 

    $('.question').click( function(){
      $('.body-login').slideUp(10); 
      $('.body-register').slideDown(); 
    });   

    $('.register-user').click( function() {
      
      $("#overlay").fadeIn(300);　 

      var client_name  = $('#register-name').val().trim(); 
      var client_email = $('#register-mail').val().trim(); 
      var pass_1       = $('#register-pass').val().trim();
      var pass_2       = $('#register-pass2').val().trim();
      
      if( pass_1 != pass_2 ) {
        alert("Las contraseñas no coinciden"); 
      } else {
          $.ajax({
            'url' : "{{asset('registerUser')}}", 
            'method' : "POST", 
            'data' : {'client_name' : client_name, 
                      'client_email' : client_email, 
                      'client_pass' : pass_1}, 
            'success' : function( resp ) {
              //var resp = JSON.parse(A); 
              $('#register-name').val(""); 
              $('#register-mail').val(""); 
              $('#register-pass').val(""); 
              $('#register-pass2').val(""); 
              if( resp == 'registrado') {
                $('#session').modal('toggle');  
                $("#overlay").fadeOut(300);　 
                alert("Te has registrado!"); 
              }
            }
          });         
      }


    }); 


     $('.input-search').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    console.log("."); console.log(keycode); 
    if(keycode === '13'){ 
        alert('You pressed a "enter" key in textbox');  
    }
}); 


     
    window.onscroll = function (e) {
        if( window.scrollY > 50 ) { 
          $('.row-logo').slideUp(); 
        } else if( window.scrollY < 200 ) {
          $('.row-logo').slideDown(); 
        }
    };   
  }  

 
  function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        
        var myInput = document.getElementById("myInput").value; 
        if( e.keyCode == 13 ) { window.location.href = "https://begima.com.mx/search/"+myInput; }

        if (e.keyCode == 40) {
          currentFocus++;
          addActive(x);
        } else if (e.keyCode == 38) { //up
          currentFocus--;
          addActive(x);
        } else if (e.keyCode == 13) {
          e.preventDefault();
          if (currentFocus > -1) {
            if (x) x[currentFocus].click();
          }
        }
    }); 

   } 
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]); 
    }
  }
}

document.addEventListener("click", function (e) {
    closeAllLists(e.target);
}); 
 

// valores en caché por cargar 
var countries = ["Infantil(categoría)", "Pijama Mameluco Kigurumi Adulto Y Niño Varios Modelos", "Rebajas(categoría)", "Juvenil (categoría)", "Dama(categoría)", "Baballero (categoría)", "Accesorios (categoría)", "Tal las extra (categoría)", "Calcetón (categoría)", "Promos (categoría)"];

autocomplete(document.getElementById("myInput"), countries);

</script>


<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'nnjcHJHdHM2uXWwRK';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->


<script type="text/javascript">
  $('document').ready( function() {
    $('.cart-section').click( function() {
      window.location = "{{asset('carrito')}}"
    }); 
  }); 
</script>