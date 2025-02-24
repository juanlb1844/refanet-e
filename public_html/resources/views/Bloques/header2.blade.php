<link rel="stylesheet" charset="uft-8" type="text/css" href="{{asset('css/header.css')}}">
<link rel="icon" href="{{asset('media/icons/gap-icon.png')}}" type="image/x-icon">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<style type="text/css">
  .floating-wpp{position:fixed;bottom:15px;left:15px;font-size:14px;transition:bottom .2s}.floating-wpp .floating-wpp-button{position:relative;border-radius:50%;box-shadow:1px 1px 4px rgba(60,60,60,.4);transition:box-shadow .2s;cursor:pointer;overflow:hidden}.floating-wpp .floating-wpp-button img,.floating-wpp .floating-wpp-button svg{position:absolute;width:100%;height:auto;object-fit:cover;top:50%;left:50%;transform:translate3d(-50%,-50%,0)}.floating-wpp:hover{bottom:17px}.floating-wpp:hover .floating-wpp-button{box-shadow:1px 2px 8px rgba(60,60,60,.4)}.floating-wpp .floating-wpp-popup{border-radius:6px;background-color:#E5DDD5;position:absolute;overflow:hidden;padding:0;box-shadow:1px 2px 8px rgba(60,60,60,.25);width:0;height:0;bottom:0;opacity:0;transition:bottom .1s ease-out,opacity .2s ease-out;transform-origin:bottom}.floating-wpp .floating-wpp-popup.active{padding:0 12px 12px;width:260px;height:auto;bottom:82px;opacity:1}.floating-wpp .floating-wpp-popup .floating-wpp-message{background-color:#fff;padding:8px;border-radius:0 5px 5px;box-shadow:1px 1px 1px rgba(0,0,0,.15);opacity:0;transition:opacity .2s}.floating-wpp .floating-wpp-popup.active .floating-wpp-message{opacity:1;transition-delay:.2s}.floating-wpp .floating-wpp-popup .floating-wpp-head{text-align:right;color:#fff;margin:0 -15px 10px;padding:6px 12px;display:flex;justify-content:space-between;cursor:pointer}.floating-wpp .floating-wpp-input-message{background-color:#fff;margin:10px -15px -15px;padding:0 15px;display:flex;align-items:center}.floating-wpp .floating-wpp-input-message textarea{border:1px solid #ccc;border-radius:4px;box-shadow:none;padding:8px;margin:10px 0;width:100%;max-width:100%;font-family:inherit;font-size:inherit;resize:none}.floating-wpp .floating-wpp-btn-send{margin-left:12px;font-size:0;cursor:pointer}
    #WAButton { z-index: 99999; }
</style>

<div id="WAButton"></div>

<!-- VIEW PRODUCT ITEM --> 
<style> 

    .content-pag p, .content-pag span{
        font-family: 'Popins'!important;
    }
    /* */ 
	.content-img-product {
		display: inline-block; width: 100%;
		background-size: contain!important; background-repeat: no-repeat; background-position: center; 
		height: 400px;
	}
	.container-item {
        display: flex;
        height: 400px;
        width: 100%;
    }
     .content-img-product {
      position: absolute;
    }

    .container-item:hover > div:last-of-type {
  		opacity: 0;
	}
 	.heart { 
 		width: 25px!important;
 	}
 	.heart:hover {
 		cursor: pointer!important;
 		transform: scale(1.2)!important;
 	}
  .header-carrito { padding-top: 70px; } 
	@media( max-width: 600px ) { 
    /* SLIDER DE MARCAS */ 
    .list-brands .owl-stage .owl-item { width: 70px!important; margin-right: 30px!important; }

    .redes img { width: 27px!important; }
    .direction-foo, .footer-section p, .use-msge { font-size: 12px!important; }
    .container-msg-foo { text-align: center; }
    .footer-section { text-align: left; }
    .footer-section .redes { text-align: left; } 
    .footer-section h2, .footer-section h4 { font-size: 12px!important; }
    .redes { font-size: 12px;  }
    .footer-section { padding: 0px 10px!important; }
    .header-carrito { padding-top: 20px; }
    .floating-wpp-button { width: 45px!important; height: 45px!important; }
		.container-item {
			height: 200px;
		}
		.content-img-product { 
			height: 200px;
		}
    
    .brands-section .owl-prev {
       left: -7%!important;
       opacity: .7;
       top: 45%!important;
    }
  .brands-section .owl-next {
       right: -7%!important;
       opacity: .7;
    } 

	}

  @media( min-width: 600px ) {
    .controls-product { padding: 0px 20px; }
  }

 
 .liked {
  animation: liked 0.4s ease;
}

@keyframes liked {
  0% {
    transform: scale(0.8);
  }
  40% { 
    transform: scale(1.4);
  }
  100% {
    transform: scale(1);
  }
}


</style>

<style> 
	.controls-product {
		text-align: left;
	}
	.controls-product > div {
		height: 35px!important;
		color: gray;
	}
	.controls-product > div > span {
		white-space: nowrap; 
  		width: 100%; 
  		overflow: hidden;
  		text-overflow: ellipsis
	}
</style>

@yield('content', View::make('Bloques.loading')) 
 
@include('Bloques/blocks/social')

<style type="text/css">
  .content-banner img {
    width: 100%; 
  }
.content-banner img:hover {
  cursor: pointer;
}

figure {
  width: 100%;
  margin: 0;
  padding: 0;
  background: #fff;
  overflow: hidden;
}
figure:hover+span {
  bottom: -36px;
  opacity: 1;
}

 
/* Shine */
.hover14 figure {
  position: relative;
}
figure:hover {
  cursor: pointer;
}
.hover14 figure::before {
  position: absolute;
  top: 0;
  left: -75%;
  z-index: 2;
  display: block;
  content: '';
  width: 50%;
  height: 100%;
  background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
  background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
  -webkit-transform: skewX(-25deg);
  transform: skewX(-25deg);
  cursor: pointer;
}
.hover14 figure:hover::before {
  -webkit-animation: shine .75s;
  animation: shine .75s;
  cursor: pointer;
}
@-webkit-keyframes shine {
  100% {
    left: 125%;
  }
}
@keyframes shine {
  100% {
    left: 125%;
  }
}

</style>

<style type="text/css">
       html, body{ 
            font-family: 'Poppins'!important;   
            font-weight: 300; 
        } 
    .text-1 {
      /*background-color: #c4262e;*/ 
      display: inline;
      display: flow-root;
      padding: 0px 20px; 
      opacity: .7;
      font-size: 30px; font-weight: 700;
    }
    .text-2 {
      /*background-color: white; */ 
      padding: 0px 20px; 
      /*opacity: .7;*/ 
      display: block; font-size: 35px; color: #c4262e; font-weight: 900; background-size: cover;
      display: inline-block;
    }
    .promo-btn {
      box-shadow: -2px 6px 10px 0px #0000005c;
      background-color: #3F51B5; 
      opacity: 1; 
      padding: 4px 20px; 
      color: white;
      margin-top: 40px;
      border-radius: 10px;  
      font-size: 20px; 
      font-weight: 700;
      display: inline-block;
      transition-property: all; 
      transition-duration: .1s;
      text-transform: uppercase;
    }
    .promo-btn:hover {
      cursor: pointer;
      transform: scale(1.05);
      transition-property: all; 
      transition-duration: .1s;
    }

    .aqui {
      position: relative;
      display: inline-block;
      color: white;
      background: red;
      width: 100px;
      height: 30px;
      z-index: 2;
      margin-left: 10px;
      text-decoration: none;
      opacity: 1!important;
      text-align: center;
      display: inline-block; color: white!important; font-size: 20px; padding: 0px 10px; background-color: #4179ff;
      padding-top: 4px!important; 
    }

    .aqui:before {
        content: '';
        position: absolute;
        top: 0;
        left: -10px;
        width: 20px;
        height: 30px;
        background: #4179ff;
        transform: skewX(-30deg);
        z-index: 1;
    }

    .aqui:after {
      content: '';
      position: absolute;
      top: 0;
      right: -10px;
      width: 20px;
      height: 30px;
      background: #4179ff;
      transform: skewX(-30deg);
      z-index: 1;
    } 
    .aqui:hover {
      cursor: pointer;
      transform: scale(1.1); 
    } 
 
    body {
      background-color: #fcfcfc!important;
    }

    .banner-img {
      width: 80%; 
    }
    .np { padding: 0px!important; }
    </style>

<!-- Modal maps checkout -->
<div id="direction-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-to-cart">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dirección de la sucursal</h4>
      </div>
      <div class="modal-body row"> 
        <div class="col-lg-12 col-md-12">
             
                <p id="direction-str"> </p>
                <div id="googlemaps-view" style="width: 800px;"> </div> 
               
        </div>
      </div>
      <div class="modal-footer" style="display: none">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div> 
    </div>
  </div>
</div>

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
          <a class="navbar-brand" href="{{asset('/')}}" style="padding-top: 7px;"> 
          	<img style="width: 80px" src="{{asset('/media/begima logotipo-01 web-simple-medium.png')}}">
          </a>
           <a class="navbar-brand pull-right" href="{{asset('/carrito')}}" style="padding-top: 4px;"> 
              <span class="shopy"></span> 
            </a> 
            <a class="nav-link" data-toggle="modal" data-target="#session" style="padding-top: 10px;">
                <img id="icon-user" src="https://begima.com.mx/public/icons/user-2.svg" style="width: 40px; vertical-align: unset; display: inline-block; padding-top: 7px;">
            </a>
             @if( session()->has('logueado') )  
                @if( strlen( session()->get('logueado') ) > 1 )
                  <a class="nav-link" data-toggle="modal" data-target="#session" style="position: fixed; top: 10px; margin-left: 10px;">
                      <span>{{session()->get('user')->nombre}}</span> 
                  </a>
                @endif 
             @endif 
        </div> 
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-left container-search-mobile" role="search">
            <div class="form-group">
              <input type="text" class="search-input-mobil form-control" placeholder="BUSCAR">
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> --> 
          </form>

           @foreach($categories as $categorie)  
		        @if( count($categorie['opciones']) > 0 )   
		        <li class="nav-item dropdown contents-menu"> 
              <!-- {{$categorie['destino']}} -->  
		          <a class="sup-menu dropdown-submenu-toggle nav-link @if( count($categorie['opciones']) > 0 ) dropdown-toggle @endif option-menu-bottom" href="#" data-bs-toggle="dropdown">{{$categorie['titulo']}}</a>
		           <ul class="submenu dropdown-menu">
		            @foreach( $categorie['opciones'] as $option )
		              <li class="dropdown-submenu" style="width: 100%!important;">
		                <a class="dropdown-item dropdown-submenu-toggle" tabindex="-1" href="{{$option->destino}}"> {{$option->titulo}} </a>

		                  @if( count($option->opciones) > 0 )
		                    <ul class="dropdown-menu level-menu">
		                      @foreach( $option->opciones as $l2 )
		                        <li class="level-menu"><a class="dropdown-item level-menu" href="{{$l2->destino}}">{{$l2->titulo}}</a></li>
		                      @endforeach 
		                    </ul>
		                  @endif 

		              </li>  
		            @endforeach  
		            </ul>
		         </li> 
		        @else 
		          <li class="nav-item active option-menu-bottom"> <a class="nav-link" href="#">{{$categorie['titulo']}}</a> </li> 
		        @endif 
		      @endforeach 


          <ul class="nav navbar-nav" id="container-categories-menu">
             <!-- AGREGADAS POR JS --> 
          </ul>
          <ul class="nav navbar-nav">
             <li><hr/></li>   
            <li><a href="{{asset('ayuda')}}">Ayuda</a></li>    
            <li><a href="{{asset('catalogo/promociones')}}">Promociones</a></li>    
             @if( session()->has('logueado') )  
                @if( strlen( session()->get('logueado') ) > 1 )
                <li><a href="{{asset('usuario')}}">Mi cuenta</a></li>  
                <li><a href="{{asset('usuario')}}">Mis Pedidos</a></li>    
                <li><a href="{{asset('out')}}">Salir</a></li>    
                @else 
                <li><a data-toggle="modal" data-target="#session">Registrarme/Iniciar Sesión</a></li>  
                @endif 
             @else   
              <li><a data-toggle="modal" data-target="#session">Registrarme/Iniciar Sesión</a></li>  
             @endif  
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>
  <div class="col-lg-12 row-logo" @if( true ) style="display: none; "  @endif> 
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
      background-color: #3d3d3d; color: white; font-size: 17px; padding: 5px 5px; padding-right: 20px; 
    }
    #icon-user {
      fill: white!important;
    }  
  </style> 

        <!-- 
          <div class="autocomplete" style="width: 100%; color:black; background-color: #f1f1f1; border-radius: 22px; padding: 2px 2px 2px 20px;">
            <input class="search input-search input-text input-searchbox" id="myInput" style="width: 80%; border: 0px;" placeholder="Buscar..." type="text" name="field" aria-haspopup="false" aria-expanded="true" aria-autocomplete="both" autocomplete="on">
            <img id="img-search" src="{{asset('/media/search.svg')}}" style="width: 20px;">
          </div>
        --> 

<!-- 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="col-lg-3">
      
    </div>
    <div class="col-lg-3"> 
       <a href="{{asset('boletin')}}">Boletín</a>
    </div>
      <div class="col-lg-3"> 
        <a href="{{asset('donde-estamos2')}}">
          Sucursales
        </a>  
    </div>
    <div class="col-lg-3">
       <img style="width: 30px;" src="{{asset('media/icons/tarjeta-de-credito.svg')}}">
       <span style="font-size: 12px; font-weight: bolder;">{{$phone_config ?? 'soporte@begima.com.mx'}}</span>
    </div>
 </div>
--> 


  <div class="col-lg-12 col-xs-12 submenu">


    <!-- <div class="line-menu-main"> --> 
    <!-- 
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
                <img id="icon-user" src="https://begima.com.mx/public/icons/user.svg" style="width: 30px;">
              </span>
          @endif
        @php  } else { @endphp  
          <span class="pull-right" data-toggle="modal" data-target="#session">
            <img id="icon-user" src="https://begima.com.mx/public/icons/user.svg" style="width: 30px;">
          </span>
        @php } @endphp 
      --> 
    <!-- </div> -->
 
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
      .option-menu-bottom {
            padding-left: 15px!important; padding-right: 17px!important;
      }

  .dropdown-menu {
    background-color: #f5f5f5!important;
    box-shadow: none!important; 
    border: 0px!important; 
    border-radius: 0px!important;
    width: auto; 
  }
    .navbar { 
      margin-bottom: 0px!important; 
      padding-top: 0px!important; 
      padding-bottom: 0px!important; 
    }
    .navbar-nav>li>a {
      padding-top: 0px!important;
      padding-bottom: 0px!important; 
    }
    .courtain-back { 
      background-color: #0000004f;
      position: fixed;
      width: 100vw;
      height: 100vh;
      display: none; 
    }


      .glyphicon-shopping-cart {
        color: black!important;
      }
    </style>

 
<style type="text/css">

/* ============ desktop view ============ */
@media all and (min-width: 992px) {
   
  .navbar .nav-item:hover .nav-link{   } 
  .navbar .nav-item:hover > .dropdown-menu{ display: block; }
  /*.dropdown-menu:hover ul.level-menu { display: block!important; } */   
  .navbar .nav-item .dropdown-menu{ margin-top:0; } 
}   
/* ============ desktop view .end// ============ */
.menu-options { 
  border-bottom: 1px solid #e01f1f!important;
  background-color: #f5f5f5!important;
 }
.menu-options li a { 
  color: #62554a!important; 
  font-weight: 400;    
  font-size: 17px;
} 


.dropdown-toggle::after {
    display: inline-block;
    margin-left: 0.255em;
    vertical-align: 0.255em;
    content: "";
    border-top: none!important; 
    border-right: none!important; 
    border-bottom: none!important; 
    border-left: none!important;
    background-image: url(https://begima.com.mx/public/icons/arrow2.svg);
    width: 10px; 
    height: 10px;
    background-size: contain;
    background-repeat: no-repeat;
}
 .dropdown-item {
    font-size: 15px!important;
    font-weight: 400!important;
 }

  .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }

  .user-controls-menu {
    float: right!important;
  }
  .user-center-menu { display: inline-block; }
  .container-main-menu {
    text-align: center;
  }
</style>   
 
 
<style type="text/css">
  /* NEW 2nd-Level Dropdown CSS START */
.dropdown-submenu{position: relative;}
.dropdown-submenu .caret{-webkit-transform: rotate(-90deg); transform: rotate(-90deg);}
.dropdown-submenu > .dropdown-menu {top:0; left:100%; margin-top:-6px; margin-left:-1px;}
.dropdown-submenu.open > a:after{border-left-color:#fff;}
.dropdown-submenu.open > .dropdown-menu, .dropdown-submenu.open > .dropdown-menu {display: block;}
.dropdown-submenu .dropdown-menu{margin-bottom: 8px;}
.navbar-default .navbar-nav .open .dropdown-menu .dropdown-submenu ul{background-color: #f6f6f6;}
.navbar-inverse .navbar-nav .open .dropdown-menu .dropdown-submenu ul{background-color:#333;}
.navbar .navbar-nav .open .dropdown-submenu .dropdown-menu > li > a{padding-left: 30px;}
@media screen and (min-width:992px){
    .dropdown-submenu .dropdown-menu{margin-bottom: 2px;}
    .navbar .navbar-nav .open .dropdown-submenu .dropdown-menu > li > a{padding-left: 25px;}
    .navbar-default .navbar-nav .open .dropdown-menu .dropdown-submenu ul{background-color:#fff;}
    .navbar-inverse .navbar-nav .open .dropdown-menu .dropdown-submenu ul{background-color:#fff;}
}

.leve-menu { display: none; }
/* NEW 2nd-Level Dropdown CSS END */
 
 
.btn-set-session {
  background-color: #ffc500; 
  padding: 5px 20px; 
  border-radius: 21px; 
  text-align: center;
  font-weight: 600;
  color: white !important;
  letter-spacing: 1px;
}
</style>
 

<div class="courtain-back">
  
</div>

<!-- ============= COMPONENT ============== -->
<nav class="navbar menu-options navbar-expand-lg">
 <div class="container-fluid">
  <!-- 
   <a class="navbar-brand" href="{{asset('/')}}" style="padding: 0px;">
      <img src="https://begima.com.mx/media/begima-logotipo-01.webp" style="width: 40px;">
  </a> --> 
  <!-- 
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->  
  <div class="collapse navbar-collapse container-main-menu" id="main_nav" style="padding-top: 15px;">
  <ul class="navbar-nav user-center-menu">
    <li style="display: none;" class="nav-item active"> 
      <a class="nav-link nav-menu-header" href="{{asset('/')}}">
         <img src="{{asset('/media/FullColor_Logotipo_horizontal y vertical-02-padd.png')}}" style="width: 175px; top: -8px; position: relative;">
      </a>
    </li> 
    <li style="display: none;" class="nav-item active"> <a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;</a> </li> 
     @foreach($categories as $categorie)  
        @if( count($categorie['opciones']) > 0 ) 
        <li class="nav-item dropdown">
          <a class="nav-link  @if( count($categorie['opciones']) > 0 ) dropdown-toggle @endif option-menu-bottom" href="{{$categorie['destino']}}" data-bs-toggle="dropdown">{{$categorie['titulo']}}</a>
           <ul class="submenu dropdown-menu">
            @foreach( $categorie['opciones'] as $option )
              <li class="dropdown-submenu" style="width: 100%!important;">
                <a class="dropdown-item dropdown-submenu-toggle" tabindex="-1" href="{{$option->destino}}"> {{$option->titulo}} </a>

                  @if( count($option->opciones) > 0 )
                    <ul class="dropdown-menu level-menu">
                      @foreach( $option->opciones as $l2 )
                        <li style="width: 100%!important;" class="level-menu"><a class="dropdown-item level-menu" href="{{$l2->destino}}">{{$l2->titulo}}</a></li>
                      @endforeach 
                    </ul>
                  @endif 

              </li>  
            @endforeach  
            </ul>
         </li> 
        @else 
          <li class="nav-item active option-menu-bottom"> <a class="nav-link" href="#">{{$categorie['titulo']}}</a> </li> 
        @endif 
      @endforeach 
   </ul>
  <ul class="navbar-nav ms-auto user-controls-menu" style="padding: 0px!important;">
    <li class="nav-item active"> 
        <a class="nav-link" href="#">
           @php  if( session()->has('logueado') AND strlen(session()->get('logueado')) > 2 ) { @endphp 
                @if( strlen( session()->get('logueado') ) > 1 )
                  <span class="pull-right"></span>
                  <a class="pull-right" href="https://begima.com.mx/usuario"> 
                     <span style="color: black; font-size: 14px;"> {{ session()->get('info') }} </span>  
                  </a>
                @else
                  <span class="pull-right"  data-toggle="modal" data-target="#session"> 
                     <img id="icon-user" src="https://begima.com.mx/public/icons/user-2.svg" style="width: 40px;">
                  </span>
                @endif
              @php  } @endphp  
        </a>  
    </li> 
    <li class="nav-item dropdown">  
      <span class="btn-set-session">
        <a class="nav-link" data-toggle="modal" data-target="#session" style="padding: 0px;">
            <!-- <img id="icon-user" src="https://begima.com.mx/public/icons/user-2.svg" style="width: 40px; vertical-align: unset;"> --> 
            Entrar 
        </a> 
      </span>
        <ul class="dropdown-menu dropdown-menu-end">
              @php  if( session()->has('logueado') ) { @endphp 
                      @if( strlen( session()->get('logueado') ) > 1 )
                        <li><a onclick="salirFb()" class="dropdown-item" href="{{asset('out')}}"> SALIR </a></li>
                        <li><a class="dropdown-item" href="https://begima.com.mx/usuario"> PERFIL </a></li>
                      @endif 
              @php } @endphp  
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{asset('carrito')}}" style="padding: 0px;"> 
          <span class="pull-right glyphicon glyphicon-shopping-cart cart-section">
              <span class="pull-right cant-cart" style="font-family: 'Poppins'!important; padding-left: 5px; color:black;">
                @if(  session()->get('productos') )
                  @php print_r( count( session()->get('productos') ) ) @endphp 
                @else 
                   {{"0"}}
                @endif 
              </span>
          </span>
        </a>
    </li>
  </ul>  
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>
    
</div> 

</div> 

@include('Bloques/blocks/login')
@include('Bloques/blocks/cart-option')
  

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
  .banner-section {
    transition-property: all; 
    transition-duration: .5s; 
  }
</style>

<script type="text/javascript">

  // Make Dropdown Submenus possible
$( document ).ready(function() {  

 
   var open = 0; 
   $('.sup-menu').click( function( event ) {
      $(this).next('ul').toggle();
      console.log($('.contents-menu').hasClass('open')+"-"+open);  
      
   });      

   $('.dropdown-submenu').hover( function( event ){
    console.log(event); 
   }); 

   // Make Secondary Dropdown on Click
   $('.dropdown-submenu a.dropdown-submenu-toggle').on("click", function(e){
      $('.dropdown-submenu ul').removeAttr('style');
      $(this).next('ul').toggle();
      //e.stopPropagation();
      //e.preventDefault(); 
   });
   // Make Secondary Dropdown on Hover
   $('.dropdown-submenu a.dropdown-submenu-toggle').hover(function(){
      $('.dropdown-submenu ul').removeAttr('style');
      $(this).next('ul').toggle();
   });
   // Make Regular Dropdowns work on Hover too
   $('.dropdown a.dropdown-toggle').hover(function(){
      $('.navbar-nav .dropdown').removeClass('open');
      $(this).parent().addClass('open');
   });

   // Clear secondary dropdowns on.Hidden
   $('#bs-navbar-collapse-1').on('hidden.bs.dropdown', function () {
      $('.navbar-nav .dropdown-submenu ul.dropdown-menu').removeAttr('style');
   });  
});
 
  window.onload = function() {    

    /* 
    if(  window.location.href == 'https://begima.com.mx/index' || window.location.href == 'https://begima.com.mx/' || window.location.href == 'https://begima.com.mx/public/' ){
        $('.row-logo').slideDown();     
        $('.nav-menu-header').fadeOut(300); 
      } 
    */ 

     $('.add-to-fav').click( function( event ) {
        console.log( $($(event.target)).hasClass("liked")  ); 
        let np = $($(event.target)).attr("np"); 
        let id = $($(event.target)).attr("id"); 
        if( $($(event.target)).hasClass("liked")  ) {   
              $($(event.target)).attr("src", "https://begima.com.mx/heart.svg");  
              $($(event.target)).removeClass("liked"); 
              $.ajax({ 
                'url' : '{{asset('setFavorite')}}', 
                'method': 'post', 
                'data': { 
                  'np' : np, 
                  'id' : id, 
                  'action' : 'remove'  
                },   
                'success': function(resp) {
                  console.log(resp); 
                }  
              });  
        } else {    
              $($(event.target)).addClass("liked");  
              $($(event.target)).attr("src", "https://begima.com.mx/heart2.svg"); 
              $.ajax({ 
                'url' : '{{asset('setFavorite')}}', 
                'method': 'post', 
                'data': { 
                  'np' : np, 
                  'id' : id,   
                  'action' : 'add'
                }, 
                'success': function(resp) {
                  console.log(resp); 
                }
              });  
        } 
        
        //alert( $($(event.target)).attr('np') ); 
     }); 
 
     $("#session").on('hidden.bs.modal', function () { 
        $('.body-login').slideDown(10); 
        $('.body-register').slideUp();
      });

     $('.menu-options').hover( function() {
        $('.section-element').css('filter', 'blur(5px)'); 
        $('.courtain-back').css('display', 'block'); 
      });   

     $('.line-menu-main').hover( function() {
        $('.section-element').css('filter', 'blur(0px)'); 
        $('.courtain-back').css('display', 'none'); 
        $('.dropdown').removeClass('open');  
   });  

     $('.courtain-back').hover( function() {
        $('.courtain-back').css('display', 'none'); 
        $('.section-element').css('filter', 'blur(0px)'); 
        $('.dropdown').removeClass('open'); 
   });  

      
    $('#img-search').click( function() {
        let term = $('.input-search').val(); 
        window.location.href  = "{{asset('')}}search/"+term; 
        return false; 
    }); 

    $('.search-input-mobil').on('keypress',function(e) {
      if(e.which == 13) {
        let term = $('.search-input-mobil').val(); 
        window.location.href  = "{{asset('')}}search/"+term; 
        return false;
      }
    });
   
    function tienePadre( collection, id ) {
      resp = 'no'; 
      collection.forEach( function(a, b) {
        if( a.id_parent == id) resp = 'si'; 
      }); 
      return resp; 
    }
 

     $('.input-search').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        console.log(keycode); console.log(keycode); 
        id_to_search = $('.fselect-engine').find(":selected").attr("id-fit"); 

        therm = $('.input-search').val(); 
        if( therm.length < 1 ) {
          therm = "all"; 
        }

        if(keycode == '13'){   
          if( !id_to_search ) {
            $("#widgetFit").modal("toggle"); 
            return; 
          } else {
            localStorage.setItem("fit", $('.data-widget').html());  
            localStorage.setItem("idFit", id_to_search);  
            window.location.href = "{{asset('/search/')}}/"+therm+"/fit/"+id_to_search; 
          } 
        }
    });  
 
    window.onscroll = function (e) {

      /* 
        console.log( window.location.href ); 
        if( window.scrollY > 50 ) { 
          $('.row-logo').slideUp();  
          $('.nav-menu-header').fadeIn(300);     
        } else if( window.scrollY < 200 ) { 
          if( window.location.href == '{{asset('/')}}' || window.location.href == '{{asset('/')}}' ){
            $('.row-logo').slideDown();     
            $('.nav-menu-header').fadeOut(300); 
          }
        }

      if( window.innerWidth > 600 ) {    
            if( window.scrollY < 900 ) {    
                $('.sucursal-map').css('padding-top', (window.scrollY+70)+"px"); 
            }
        }
      */ 
    };   
  

  }  
 

  inp = document.getElementById("myInput"); 

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
            //alert("!!"); 
            console.log("!!!!!!!!!!!");  
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            
            var myInput = document.getElementById("myInput").value; 
            if( e.keyCode == 13 ) { window.location.href = "{{asset('/search/')}}/"+myInput; }

            /* 
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
            } */ 
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
      if (elmnt != x[i] /*&& elmnt != inp*/) {
      x[i].parentNode.removeChild(x[i]); 
    } 
  }
}

document.addEventListener("click", function (e) {
    closeAllLists(e.target);
}); 
 

// valores en caché por cargar 
var countries = ["Infantil(categoría)", "Pijama Mameluco Kigurumi Adulto Y Niño Varios Modelos", "Rebajas(categoría)", "Juvenil (categoría)", "Dama(categoría)", "Dart", "Das", "Tal las extra (categoría)", "Calcetón (categoría)", "Promos (categoría)"];

//autocomplete(document.getElementById("myInput"), countries);



</script>


<script type="text/javascript">
   

          !function (v) { v.fn.floatingWhatsApp = function (e) { var t, a, i = v.extend({ phone: "", message: "", size: "72px", backgroundColor: "#25D366", position: "left", popupMessage: "", showPopup: !1, showOnIE: !0, autoOpenTimeout: 0, headerColor: "#128C7E", headerTitle: "WhatsApp Chat", zIndex: 0,  }, e), o = (t = !1, a = navigator.userAgent || navigator.vendor || window.opera, (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) && (t = !0), t); this.addClass("floating-wpp"); var n, s = v(document.createElement("div")), p = v(document.createElement("div")), l = v(document.createElement("div")), c = v(document.createElement("div")), d = v(document.createElement("div")), m = v(document.createElement("div")), r = v(document.createElement("div")); if (p.addClass("floating-wpp-button-image"), s.addClass("floating-wpp-button").append(v(i.buttonImage)).css({ width: i.size, height: i.size, "background-color": i.backgroundColor }), (!(0 <= (n = window.navigator.userAgent).indexOf("MSIE") || n.match(/Trident.*rv\:11\./)) || i.showOnIE) && s.append(p).appendTo(this), s.on("click", function () { o && i.showPopup ? u() : C() }), i.showPopup) { var g = v(document.createElement("textarea")), h = v(document.createElement("strong")), w = v(''); function u() { l.hasClass("active") || (l.addClass("active"), g.focus()) } l.addClass("floating-wpp-popup"), c.addClass("floating-wpp-head"), d.addClass("floating-wpp-message"), r.addClass("floating-wpp-input-message"), m.addClass("floating-wpp-btn-send"), d.text(i.popupMessage), g.val(i.message), i.popupMessage || d.hide(), c.append("<span>" + i.headerTitle + "</span>", h).css("background-color", i.headerColor), m.append(w), r.append(g, m), h.addClass("close").html("&times;"), l.append(c, d, r).appendTo(this), d.click(function () { }), h.click(function () { }), c.click(function () { l.removeClass("active") }), g.keypress(function (e) { i.message = v(this).val(), 13 != e.keyCode || e.shiftKey || o || (e.preventDefault(), m.click()) }), m.click(function () { i.message = g.val(), C() }), this.mouseenter(function () { u() }), 0 < i.autoOpenTimeout && setTimeout(function () { u() }, i.autoOpenTimeout) } function C() { var e = "http://"; e += o ? "api" : "web", e += ".whatsapp.com/send?phone=" + i.phone + "&text=" + encodeURI(i.message), window.open(e) } i.zIndex && v(this).css("z-index", i.zIndex), "right" === i.position && (this.css({ left: "auto", right: "15px" }), l.css("right", "0")) } }(jQuery);


        jQuery('#WAButton').floatingWhatsApp({
          phone: '523311706338', //WhatsApp Business phone number International format-
          //Get it with Toky at https://toky.co/en/features/whatsapp.
          headerTitle: 'Contáctanos por WhatsApp!', //Popup Title
          popupMessage: 'Hola, en qué podemos ayudarte?', //Popup Message
          showPopup: true, //Enables popup display
          buttonImage: '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png" />', //Button Image
          //headerColor: 'crimson', //Custom header color
          //backgroundColor: 'crimson', //Custom background button color
          position: "left"    
        });  
 
     
  </script>
