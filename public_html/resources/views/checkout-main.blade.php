@extends('layout')


<script src="https://maps.googleapis.com/maps/api/ js?key=AIzaSyCnv72PEr9fr4qBRh3RMwjyX8Ow8R_m4yo&callback=initMap1&libraries=&v=weekly"
                async></script>
                
<!-- OPENPAY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
<script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
<!-- -->

<!-- MERCADOPAGO -->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<!-- -->

<style type="text/css">
    .nav-menu-header {
        display: block !important;
    }

    /* sidebar */
    .sidebar-donde-estamos {
        padding-top: 40px;
    }

    .sidebar-donde-estamos .container-title {
        font-size: 35px;
        font-weight: 900;
    }

    .selected-map h2 {
        font-weight: 900;
    }

    .container-title {
        margin-bottom: 40px;
    }

    /* ocultar sucursal */
    .ocultar-sucursal {
        display: none;
    }

    .list-sucursales li h2:hover {
        font-weight: bolder;
        cursor: pointer;
    }

    .content-page {
        padding: 30px 100px !important;
    }

    .section-element {
        padding-top: 100px !important;
    }

    @media ( max-width: 600px ) {
        .content-page {
            padding: 10px 15px !important;
        }

        .section-element {
            padding-top: 70px !important;
        }
    }
</style>

@section('page')
    <div class="container-fluid container-page section-element">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-page">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-checkout">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 checkout-left sider">
                    <div class="col-lg-12 container-fields-checkout">
                        <div class="header-fields">
                            <span>PAGAR</span>
                            <p class="legend-checkout">Estás pagando los productos seleccionados</p>
                        </div>
                    </div>

                    <style type="text/css">

                        .btn-to-loading {
                            padding-top: 10px !important;
                        }

                        .btn-to-loading::after {
                            content: '';
                            display: list-item;
                            width: 1.2em;
                            height: 1.2em;
                            position: relative;
                            left: calc(55% - 0.75em);
                            top: calc(-15% - 0.75em);
                            border: 0.15em solid #ffffff00;
                            border-right-color: white;
                            border-radius: 50%;
                            animation: button-anim 0.7s linear infinite;
                            opacity: 0 !important;
                        }

                        @keyframes button-anim {
                            from {
                                transform: rotate(0);
                            }
                            to {
                                transform: rotate(360deg);
                            }
                        }

                        .btn-to-loading.loading {
                            color: transparent !important;
                            padding-top: 5px !important;
                        }

                        .btn-to-loading.loading::after {
                            opacity: 1 !important;
                        }

                        .input-cell {
                            font-weight: 500 !important;
                            font-size: 22px !important;
                            letter-spacing: 2px;
                            height: 45px !important;
                            font-size: 18px;
                            font-weight: bolder;
                        }
                    </style>

                    <div class="col-lg-12 step-checkout" id="step-1-b" style="margin-top: 20px;">

                        @php  if( session()->has('logueado') AND strlen(session()->get('logueado')) > 2 ) { @endphp
                        @if( strlen( session()->get('logueado') ) > 1 )
                            <p style="font-size: 22px;">Información de contacto &nbsp; &nbsp; &nbsp; &nbsp;<span
                                        style="font-size: 15px;">Configura tu cuenta <span
                                            style="color: #1990c6; font-weight: bolder;">
	                 		<a target="_blank" href="{{asset('usuario')}}">aquí</a>
	                 	</span></span></p>
                        @else
                            <p style="font-size: 22px;">Información de contacto &nbsp; &nbsp; &nbsp; &nbsp;<span
                                        style="font-size: 15px;">¿Ya tienes una cuenta? <span
                                            style="color: #1990c6; font-weight: bolder;"
                                            class="log-in-checkout">entrar</span></span></p>
                        @endif
                        @php  } else { @endphp
                        <p style="font-size: 22px;">Información de contacto &nbsp; &nbsp; &nbsp; &nbsp;<span
                                    style="font-size: 15px;">¿Ya tienes una cuenta? <span
                                        style="color: #1990c6; font-weight: bolder;"
                                        class="log-in-checkout">entrar</span></span></p>
                        @php } @endphp


                        @php  if( session()->has('logueado') AND strlen(session()->get('logueado')) > 2 ) { @endphp
                        @if( strlen( session()->get('logueado') ) > 1 )
                            <div class="col-lg-12 col-xs-12 np">
                                <div class="col-lg-12">
                                    <span class="name-field">CELULAR</span>
                                    <input class="form-control input-cell" placeholder="Número de teléfono" type="tel"
                                           name="phone" id="cliente-telefono"
                                           value="{{ session()->get('user')->telefono}} ">
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <span class="name-field">NOMBRE</span>
                                    <input class="form-control input-cell" placeholder="Nombre" type="lastname"
                                           name="name" id="cliente-nombre" value="{{session()->get('user')->nombre}}">
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <span class="name-field">APELLIDOS</span>
                                    <input class="form-control input-cell" placeholder="Apellidos" type="lastname"
                                           name="lastname" id="cliente-apellidos"
                                           value="{{session()->get('user')->apellidos}}">
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <span class="name-field">CORREO</span>
                                    <input class="form-control input-cell" placeholder="Correo" type="email"
                                           name="email" id="cliente-correo" value="{{session()->get('user')->correo}}">
                                </div>
                            </div>
                        @else
                            <input class="form-control input-cell" placeholder="Número de teléfono" type="tel"
                                   name="phone" id="telefono">

                        @endif
                        @php  } else { @endphp
                        <div class="col-lg-12 col-xs-12 np">
                            <div class="col-lg-12">
                                <span class="name-field">CELULAR</span>
                                <input class="form-control input-cell" placeholder="Número de teléfono" type="tel"
                                       name="phone" id="cliente-telefono">
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <span class="name-field">NOMBRE</span>
                                <input class="form-control input-cell" placeholder="Nombre" type="lastname" name="name"
                                       id="cliente-nombre">
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <span class="name-field">APELLIDOS</span>
                                <input class="form-control input-cell" placeholder="Apellidos" type="lastname"
                                       name="lastname" id="cliente-apellidos">
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <span class="name-field">CORREO</span>
                                <input class="form-control input-cell" placeholder="Correo" type="email" name="email"
                                       id="cliente-correo">
                            </div>
                        </div>
                        @php } @endphp

                        <div style="padding-top: 40px;">
                            <p>&nbsp;</p>
                            <button class="btn btn-primary btn-to-loading" id="step-1"
                                    style="height: 45px; font-weight: 800; letter-spacing: 2px; font-size: 17px; ">
                                Continuar
                            </button>
                        </div>


                    </div>
                    <style type="text/css">
                        .pack:hover {
                            cursor: pointer;
                            background-color: #dddddd;
                        }

                        .options-pay:hover {
                            cursor: pointer;
                            background-color: #dddddd;
                        }

                        .options-pay, .pack {
                            border: 1px solid #dddddd;
                            padding: 20px;
                        }

                        .sucursal-selected {
                            border-bottom: 4px solid #ffb61a !important;
                        }

                        .sucursal-checkout {
                            border: 1px solid #dddddd;
                            padding: 12px;
                        }

                        .sucursal-checkout:hover {
                            cursor: pointer;
                            background-color: #ededed;
                        }

                        .back-checkout:hover {
                            cursor: pointer;
                            color: blue;
                        }

                        .c-input {
                            height: 45px !important;
                            border-radius: 0px !important;
                        }

                        .name-field {
                            font-size: 18px;
                        }

                        .min-field:hover {
                            cursor: pointer;
                            font-weight: 500;
                        }

                        .min-field {
                            font-size: 14px;
                            color: #1990c6;
                        }
                    </style>
                    <div class="col-lg-12 step-checkout" id="step-2-b" style="margin-top: 20px; display: none;">
                        <p style="font-size: 22px; font-weight: 800;"><span class="back-checkout back-0"
                                                                            style="color: #1990c6;">ATRÁS &nbsp;&nbsp;</span>
                            ¿Cómo obtendrás tu producto?</p>
                        <div style="padding-top: 40px; font-size: 25;">
                            <p class="pack" id="pack-1">Quiero que me lo manden por paquetería</p>
                            <p class="pack" id="pack-2">Recogeré en tienda</p>
                        </div>
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-3-b" style="margin-top: 20px; display: none;">
                        @include("checkout/envio-fields")
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-4-to-pay" style="margin-top: 20px; display: none;">
                        @include("checkout/pago")
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-4-b-1" style="margin-top: 20px; display: none;">
                        <p style="font-size: 22px; font-weight: 800;"><span class="back-checkout back-a"
                                                                            style="color: #1990c6;">ATRÁS &nbsp;&nbsp;</span>Selecciona
                            un método de envío </p>
                        <div class="col-lg-12 np" style="padding-top: 40px!important;">
                            <div class="shipping-options-list"
                                 style="font-size: 25; max-height: 500px; overflow-y: auto;">
                                <div class="sucursal-checkout shipping-options col-lg-12">
                                    Estafeta llega en 2 días
                                    <span style="font-size: 10px; display: block; font-size: 14px;">Costo $200</span>
                                </div>
                            </div>

                            <div class="col-lg-12 np" style="padding-top: 40px!important;">
                                <button class="btn btn-primary" id="step-1"
                                        style="height: 45px; font-weight: 800; letter-spacing: 2px; font-size: 17px; ">
                                    SIGUIENTE ++
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-3-b-2" style="margin-top: 20px; display: none;">
                        <p style="font-size: 22px; font-weight: 800;">
                            <span class="back-checkout back-a" style="color: #1990c6;">ATRÁS &nbsp;&nbsp;</span>
                            Escoge una tienda para recoger </p>
                        <div class="col-lg-12 np" style="padding-top: 40px!important;">
                            <div style="font-size: 25; max-height: 500px; overflow-y: auto;">
                                @foreach($sucursales as $sucursal)
                                    <p class="sucursal-checkout" option="{{$sucursal->id}}">
                                        {{$sucursal->name}}
                                        <span style="font-size: 10px; display: block; font-size: 14px;">{{$sucursal->direction}}</span>
                                    </p>
                                @endforeach
                            </div>

                            <div class="col-lg-12 np" style="padding-top: 40px!important;">
                                <button class="btn btn-primary btn-to-loading" id="step-btn-horario"
                                        style="height: 45px; font-weight: 800; letter-spacing: 2px; font-size: 17px; ">
                                    SIGUIENTE
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-select-date" style="margin-top: 20px; display: none;">
                        <p style="font-size: 22px; font-weight: 800;"><span class="back-checkout back-to-sucursales"
                                                                            style="color: #1990c6;">ATRÁS &nbsp;&nbsp;</span>
                            ¿Cuándo pasarás por el? </p>
                        <div class="col-lg-12 np" style="padding-top: 40px!important;">
                            @php
                                $hoy = date("Y-m-d");
                               $date = "";
                               if( date('l', strtotime($hoy)) == "Saturday" ) {
                                   $date = date("Y-m-d",strtotime($hoy."+ 2 days"));
                               } else {
                                   $date = date("Y-m-d",strtotime($hoy."+ 1 days"));
                               }
                            @endphp
                            <input type="date" id="date-to-collect" style="border: 2px solid black;" min="{{$date}}"
                                   value="{{$date}}" class="btn-clck"/>
                            <div class="col-lg-12 np" style="padding-top: 40px!important;">
                                <button class="btn btn-primary btn-to-loading" id="step-date-to-pay"
                                        style="height: 45px; font-weight: 800; letter-spacing: 2px; font-size: 17px;">
                                    SIGUIENTE
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 step-checkout" id="step-4-b" style="margin-top: 20px; display: none;">
                        @include("checkout/envio-options")
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 chechout-right sider"
                     style="padding-top: 140px!important;">
                    @if( \Session::get('productos') )
                        @foreach( \Session::get('productos') as $k => $pr )
                            <div class="col-lg-6 col-sm-8 col-xs-12">
                                <div class="col-lg-4 col-xs-4" style="padding: 0px;">
                                    <img style="width: 120px;" class="img-car owl-lazy" src="{{$pr['img']}}" src=""
                                         alt="Producto">
                                </div>
                                <div class="col-lg-8 col-xs-8"
                                     style="padding: 0px; font-size: 15px; text-align: right;">
                                    <p>{{$pr['name']}}</p>
                                    <p>Cantidad: {{$pr['cant']}}</p>
                                    <!--<p>Talla: {{$pr['talla']}}</p>--> 
                                    @if( @session()->has('logueado') AND strlen(@session()->get('logueado')) > 2 )

                                        @if ( session()->get('user')->grupo == 1 )
                                            @if( $pr['promo'] > 0 )
                                                <p style="font-weight: bold;">
                                                    $ @php echo number_format($pr['promo'], 2)    @endphp MNX
                                                </p>
                                                <p style="text-decoration: line-through;">
                                                    $ @php echo number_format($pr['price'], 2) @endphp MNX
                                                </p>
                                            @else
                                                <p style="font-weight: bold;">
                                                    $ @php echo number_format($pr['price'], 2) @endphp MNX
                                                </p>
                                            @endif
                                        @elseif ( session()->get('user')->grupo == 2 )
                                            <p style="font-weight: bold; text-decoration: line-through;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX</p>
                                            <p style="font-weight: bold;">
                                                $ @php echo  number_format($pr['precio_especial_1'], 2) @endphp MNX</p>
                                        @elseif ( session()->get('user')->grupo == 3 )
                                            <p style="font-weight: bold; text-decoration: line-through;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX</p>
                                            <p style="font-weight: bold;">
                                                $ @php echo  number_format($pr['precio_especial_2'], 2) @endphp MNX</p>
                                        @elseif ( session()->get('user')->grupo == 4 )
                                            <p style="font-weight: bold; text-decoration: line-through;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX</p>
                                            <p style="font-weight: bold;">
                                                $ @php echo  number_format($pr['precio_especial_3'], 2) @endphp MNX</p>
                                        @elseif ( session()->get('user')->grupo == 5 )
                                            <p style="font-weight: bold; text-decoration: line-through;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX</p>
                                            <p style="font-weight: bold;">
                                                $ @php echo  number_format($pr['precio_especial_4'], 2) @endphp MNX</p>
                                        @endif
                                    @else
                                        @if( $pr['promo'] > 0 )
                                            <p style="font-weight: bold;">
                                                $ @php echo number_format($pr['promo'], 2) @endphp MNX</p>
                                            <p style="text-decoration: line-through;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX -</p>
                                        @else
                                            <p style="font-weight: bold;">
                                                $ @php echo number_format($pr['price'], 2) @endphp MNX</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
                                <hr>
                            </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px; text-align: right;">
                            <div class="col-lg-6">
                                <div class="col-lg-10">
                                    <input class="form-control" id="coupon" style="height: 45px;"
                                           placeholder="Código de descuento" type="" name=""
                                           value="{{\Session::get('cgo')}}">
                                    @if( $descuento )
                                        <p class="msg-coupon"></p>{!! $msgeDescuento !!}
                                    @else
                                        <p class="msg-coupon">{{ \Session::get('descuento_mge_success') }}</p>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary" id="applyCoupon" style="height: 45px!important;">
                                        Aplicar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <hr style="border-top: 1px solid #d1dbdd;;;"/>
                            <div class="col-lg-4 col-xs-4" style="padding: 0px;">

                            </div>
                            <div class="col-lg-8 col-xs-8" style="padding: 0px; font-size: 15px; text-align: right;">
                                <p>Costo de envío</p>
                                <p id="method_send" style="display: none;"></p>
                                <p></p>
                                @if( $total > 1500 )
                                    <p id="price_send" style="font-weight: bold;"> ¡Tu envío es gratis! </p>
                                @else
                                    @if( $sendPrice )
                                        <p id="price_send" style="font-weight: bold;">
                                            ${{ number_format(($sendPrice), 2)  }} </p>
                                    @else
                                        <p id="price_send" style="font-weight: bold;"> Se calcula en el siguiente
                                            paso</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px; text-align: right;">
                            <div class="col-lg-6 tot-ant">
                                <hr style="border-top: 1px solid #d1dbdd;"/>
                                <p class="pull-left">TOTAL</p>
                                <p id="cart_total" style="font-weight: bold; font-size: 22px;">
                                    ${{ number_format(($total), 2)  }}</p>
                            </div>
                            <div class="col-lg-6">
                                @if( $descuento )
                                    <style type="text/css">
                                        .tot-ant {
                                            display: none !important;
                                        }
                                    </style>
                                    <hr style="border-top: 1px solid #d1dbdd;"/>
                                    <p class="pull-left">TOTAL</p>
                                    <p id="cart_total" style="font-weight: bold; font-size: 22px;">
                                        ${{ number_format(($totalDescuento), 2)  }}</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>


        <!DOCTYPE html>
        <html>
        <head>
            <style type="text/css">

                body {
                    width: 100% !important;
                    padding: 0px;
                    margin: 0px;
                }

                .container {
                    padding: 0px !important;
                }

                .jat-control {
                    position: fixed;
                    top: 20px;
                    left: 20px;
                    font-size: 20px;
                    font-weight: bolder;
                    display: inline-block;
                    padding: 2px 15px;
                    background-color: #ff9800;
                    color: white;
                    z-index: 999;
                    border-radius: 12px;
                }

                .-v {
                }

                .servicios-text {
                    font-size: 22px;
                }
            </style>

            <meta charset="utf-8">


            <link rel="stylesheet" href="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
            <link rel="stylesheet" href="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
            <script src="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.min.js"></script>

            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

            <style type="text/css">
                .loading {
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;
                }

                .firstHeading {
                    color: red;
                }

                .body-local {
                    min-height: 100vh;
                    padding: 0px !important;
                }

                .dialog-local {
                    margin: 0px !important;
                }

                .list-cats-search {
                    padding-left: 0px !important;
                }

                .list-cats-search, .list-cats-search li {
                    display: inline-block;
                }

                .list-cats-search li {
                    background-color: gray;
                    padding: 5px 10px;
                    border-radius: 10px;
                    margin-left: 4px;
                }
            </style>

        </head>
        <body>


        <style type="text/css">
            .list-cats-search li {
                background-position: center;
                background-size: contain;
                background-repeat: no-repeat;
                background-color: #ff9800;
                width: 50px;
                height: 50px;
            }

            .opt-selected {
                border-bottom: 7px solid #3c3c3c;
            }
        </style>


        <style type="text/css">
            .img-back-container {
                background-position: center;
                background-size: cover;
                height: 22vh;
            }

            .product {
                height: 120px;
                border-radius: 7px;
                background-color: #eeeeee;
                margin-top: 10px;
                background-position: center;
                background-size: 90%;
                background-repeat: no-repeat;
            }

            .list-products {
                padding-top: 10px;
            }

            .content-local-info h3 {
                margin: 0px;
            }

            .np {
                padding: 0px !important;
            }

            .btn-chat {
                background-color: #ffc107;
                color: white;
                font-weight: bolder;
            }

            .content-bubbles {
                list-style: none;
            }

            .bubble-chat {
                background-color: red;
                background-color: #ececec;
                padding: 5px;
                border-radius: 15px;
                padding-left: 20px;
                margin-top: 10px;
            }

            .container-bubbles {
                min-height: 120px;
            }


            .price-product {
                position: absolute;
                bottom: 0px;
                background-color: #ffc107fc;
                font-size: 20px;
                padding: 2px;
                border-radius: 5px;
                font-weight: bolder;
            }

            .add-product {
                position: absolute;
                bottom: 0px;
                right: 16px;
                background-color: #ffc107fc;
                font-size: 20px;
                padding: 4px 13px;
                border-radius: 5px;
                font-weight: bolder;
            }

            .view-cart {
                position: fixed;
                height: 70px;
                background-color: #ffc107;
                box-shadow: 0px -4px 11px #a5a5a585;
                border: 0px;
                width: 100%;
                z-index: 99;
                bottom: 0px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
                text-align: center;
            }
        </style>

        <style type="text/css">
            .get-loc:hover {
                cursor: pointer;
            }

            @media ( min-width: 1821px ) {
                .checkout-left {
                    padding-left: 12vw !important;
                    padding-top: 5vh;
                    min-height: 100vh !important;
                    border-right: 1px solid #d1dbdd;
                }

                .conetent-field-shipping {
                    padding-top: 40px;
                }

                .legend-checkout {
                    font-size: 18px;
                }

                #checkout-cp {
                    letter-spacing: 10px !important;
                    font-size: 17px !important;
                }

                #map {
                    height: 250px;
                    width: 100%;
                }
            }

            @media ( max-width: 1820px ) {
                .checkout-left {
                    padding-left: 10vw;
                }

                .sider {
                    padding-top: 30px;
                }

                .conetent-field-shipping {
                    padding-top: 40px;
                }

                .legend-checkout {
                    font-size: 18px;
                }

                #map {
                    height: 250px;
                    width: 100%;
                }
            }

            @media ( max-width: 700px ) {
                .step-checkout, .checkout-left {
                    padding: 0px !important;
                }

                .container-checkout, .container-fields-checkout {
                    padding: 0px !important;
                }

                .fields-ciudad {
                    padding-left: 0px !important;
                }

                .conetent-field-shipping {
                    padding-top: 20px;
                }

                .legend-checkout {
                    font-size: 14px;
                }

                .min-field {
                    font-size: 10px;
                }

                #map {
                    height: 200px;
                    width: 100%;
                }
            }

            .chechout-right {
                background-color: #e8f3f6;
                min-height: 100vh !important;
            }

            .content-page {
                padding: 0px !important;
            }

            .header-fields span {
                font-size: 35px;
                font-weight: 900;
                color: black;
            }

            .log-in-checkout:hover {
                cursor: pointer;
            }


            .name-shippong-opt {
                font-weight: 600;
            }


            /* VALIDATIONS */
            .to-validate {
                border-color: red !important;
                transition-property: all !important;
                transition-duration: 1s !important;
            }
        </style>


        <!-- Modal -->
        <div id="modal-info-local" class="modal fade" role="dialog">
            <div class="view-cart">
                <div class="col-xs-12">
                    <div class="col-xs-6" style="
              padding: 26px 0px;
              font-size: 23px;
              font-weight: bolder;
              text-align: right;
          ">
                        <span class="cart-price">$0 </span>
                    </div>
                    <div class="col-xs-6" style="
              padding: 20px 0px;
          ">
                        <button class="btn" style="
        padding: 8px 35px;
    ">Pedir
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-dialog dialog-local">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pizzería</h4>
                    </div>
                    <div class="modal-body body-local">
                        <div class="owl-carousel owl-photos">
                            <div class="element">
                                <div class="container">
                                    <div class="img-back-container"
                                         style="background-image: url('https://jatdemet.at-cabo.com/media/local/3.jpg')">
                                    </div>
                                </div>
                            </div>
                            <div class="element">
                                <div class="container">
                                    <div class="img-back-container"
                                         style="background-image: url('https://jatdemet.at-cabo.com/media/local/2.jpg')">
                                    </div>
                                </div>
                            </div>
                            <div class="element">
                                <div class="container">
                                    <div class="img-back-container"
                                         style="background-image: url('https://jatdemet.at-cabo.com/media/local/1.jpg')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-local-info" style="padding: 10px 5px;">
                            <div class="col-xs-12 np">
                                <div class="col-xs-9 np">
                                    <ul>
                                        <li>
                                            <h3>Métodos de pago</h3>
                                        </li>
                                        <li>
                                            Transferencia
                                        </li>
                                        <li>
                                            Efectivo
                                        </li>
                                        <li>
                                            Terminal
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-3 np">
                                    <button class="btn btn-chat">Chat</button>
                                </div>
                            </div>
                            <div class="list-products">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="product"
                                             style="background-image: url('https://jatdemet.at-cabo.com/media/local/plat.png')">
                                            <div class="price-product">$98</div>
                                            <div class="add-product">+</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-chat" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">CHATEA</h4>
                            </div>
                            <div class="modal-body" style="display: inline-block;">
                                <div class="col-xs-12 container-bubbles">
                                    <ul class="content-bubbles">
                                        <li class="bubble-chat">Hola!</li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 np">
                                    <div class="col-xs-10 np">
                                        <input id="message-txt" type="" name="" class="form-control">
                                    </div>
                                    <div class="col-xs-2 np">
                                        <button class="btn" id="send-msg">Envíar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <script type="text/javascript">
                    <?php

                    echo 'var new_style_map = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "labels.text",
    "stylers": [
      {
        "color": "#5d5404"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "weight": 5
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
];'; ?>

                </script>

            </div>
        </div>

        <script type="text/javascript">


            let day_to_collect = null;
            const picker = document.getElementById('date-to-collect');
            picker.addEventListener('input', function (e) {
                var day = new Date(this.value).getUTCDay();
                day_to_collect = day;
                console.log(day);
            });

            // aplicar cupón
            $('#applyCoupon').click(function () {
                let coupon = $('#coupon').val();
                if (coupon.length < 1) {
                    alert("Escribe el código de tu cupón");
                } else {
                    $('#overlay').fadeIn(300);
                    $.ajax({
                        'url': '{{asset("checkCoupon")}}/' + coupon,
                        'method': 'get',
                        'success': function (resp) {
                            resp = JSON.parse(resp);
                            console.log(resp);
                            $('#overlay').fadeOut(300);
                            $('.msg-coupon').html("<span>" + resp.mge + "</span>");
                            if (resp.type == 'success') {
                                window.location.reload();
                            }
                            if (resp.type == 'agregado' || resp.type == 'revisado') {
                                window.location.reload();
                            }
                        }
                    });
                }
            });

            $(".field-shipping").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    var i = $(e.target).attr('name');
                    i = parseInt(i);
                    i++;
                    $("input[name='" + i + "']").focus();
                }
            });

            var total = 0;
            $(document).ready(function () {
                $('.add-product').click(function () {
                    total += 98;
                    $('.cart-price').html('$' + total);
                });
                $('#send-msg').click(function () {
                    var msg = $('#message-txt').val();
                    var msg = '<li class="bubble-chat">' + msg + '</li>';
                    $('.content-bubbles').append(msg);
                    $('#message-txt').val('');
                });

                $('.btn-chat').click(function () {
                    $('#modal-chat').modal();
                });
                var carrusel = $('.owl-photos').owlCarousel({
                    loop: true,
                    margin: 10,
                    dots: false,
                    loop: true,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 3,
                            nav: false
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: false
                        }
                    }
                });

                var carrusel_cats = $('.owl-carousel-cats').owlCarousel({
                    loop: true,
                    margin: 10,
                    dots: false,
                    loop: true,
                    nav: false,
                    autoplayTimeout: 2000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 3,
                            nav: false
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: false
                        }
                    }
                });

                $('.opt-pet').click(function () {
                    carrusel_cats.trigger('to.owl.carousel', 1);
                    $('.opt-selected').removeClass('opt-selected');
                    $('.opt-pet').addClass('opt-selected');
                });
                $('.opt-home').click(function () {
                    carrusel_cats.trigger('to.owl.carousel', 0);
                    $('.opt-selected').removeClass('opt-selected');
                    $('.opt-home').addClass('opt-selected');
                });
                $('.hours-24').click(function () {
                    carrusel_cats.trigger('to.owl.carousel', 2);
                    $('.opt-selected').removeClass('opt-selected');
                    $('.hours-24').addClass('opt-selected');
                });
                $('.tasks').click(function () {
                    carrusel_cats.trigger('to.owl.carousel', 3);
                    $('.opt-selected').removeClass('opt-selected');
                    $('.tasks').addClass('opt-selected');
                });
                $('.care').click(function () {
                    carrusel_cats.trigger('to.owl.carousel', 4);
                    $('.opt-selected').removeClass('opt-selected');
                    $('.care').addClass('opt-selected');
                });


            });

            function opciones() {
                $('#modal-info-local').modal();
            }

            $('.jat-control').click(function () {
                $('#myModal').modal();
            });


            $('.-v').click(function () {
                $('.-v span').css('opacity', '0');
                $('.-v').addClass('loading');
                $('#map').slideDown();
                $("#overlay").fadeIn();
                navigator.geolocation.getCurrentPosition(success, error, options);
            });


            $('.search-pizzeria').click(function () {
                pizza = new google.maps.Marker({
                    position: {lat: 20.753101, lng: -103.383898},
                    map,
                    icon: "https://jatdemet.at-cabo.com/media/Pizza-icon.png",
                    shape: {
                        coords: [1, 2],
                        type: "poly",
                    },
                });

                const contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h3 id="firstHeading" class="firstHeading">PIZZA elcompadelchi</h3>' +
                    '<div id="bodyContent">' +
                    "<p><strong><b>Pizzas desde $89</b> </stong></p>" +
                    "<p><strong><b>a 12 minutos a pie de tu ubicación</b> </stong></p>" +
                    "<p>2 Pizzas grandes de 8 rebanadas + un refresco grande de 2lts $169</p>" +
                    "<p></p> <button onclick=opciones()>más</button>" +
                    "</div>" +
                    "</div>";

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                pizza.addListener("click", () => {
                    infowindow.open(map, pizza);
                });

            });

            function setMy(lat, lng) {
                const geocoder = new google.maps.Geocoder();
                const infowindow = new google.maps.InfoWindow();

                geocodeLatLng(geocoder, map, infowindow);

                function geocodeLatLng(geocoder, map, infowindow) {
                    const latlng = {
                        lat: lat,
                        lng: lng,
                    };
                    geocoder.geocode({location: latlng}, (results, status) => {
                        if (status === "OK") {
                            if (results[0]) {
                                map.setZoom(17);
                                const marker = new google.maps.Marker({
                                    position: latlng,
                                    map: map,
                                });
                                console.log(results);
                                console.log(results[0].address_components);
                                console.log(results[0].address_components[2].short_name);

                                console.log("||");
                                let directions = results[0].address_components.length;
                                var type_d = "";
                                for (var i = 0; i < directions; i++) {
                                    console.log(results[0].address_components[i]);
                                    type_d = results[0].address_components[i].types[0];
                                    switch (type_d) {
                                        case "postal_code" :
                                            $('#checkout-cp').val(results[0].address_components[i].long_name);
                                            break;
                                        case "administrative_area_level_1" :
                                            $('#checkout-estado').val(results[0].address_components[i].long_name);
                                            break;
                                        case "locality" :
                                            $('#checkout-ciudad').val(results[0].address_components[i].long_name);
                                            break;
                                        case "route" :
                                            $('#checkout-calle').val(results[0].address_components[i].long_name);
                                            break;
                                        case "street_number":
                                            $('#checkout-number').val(results[0].address_components[i].short_name);
                                            break;
                                        case "neighborhood":
                                            $('#checkout-colonia').val(results[0].address_components[i].short_name);
                                            break;
                                        case "political":
                                            $('#checkout-colonia').val(results[0].address_components[i].short_name);
                                            break;
                                    }
                                }

                                $("#overlay").fadeOut();
                                console.log("||");


                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                            } else {
                                window.alert("No pudimos ubicarte");
                                $("#overlay").fadeOut();
                            }
                        } else {
                            window.alert("No pudimos ubicarte: " + status);
                            $("#overlay").fadeOut();
                        }
                    });
                }
            }

            //lat: 20.750552, lng: -103.386282 },
            var latu = null;
            var long = null;

            var options = {
                enableHighAccuracy: true,
                timeout: 4000,
                maximumAge: 0
            };


            //setInterval(function(){ if( latu != null ) createMarker(); }, 3000);

            function success(pos) {
                var crd = pos.coords;

                console.log('Your current position is:');
                console.log('Latitude : ' + crd.latitude);
                latu = crd.latitude;
                long = crd.longitude;
                //createMarker();
                //alert('Longitude: ' + crd.longitude);
                $('.-v').removeClass('loading');
                $('.-v span').css('opacity', '1');
                setMy(crd.latitude, crd.longitude);
                console.log('Longitude: ' + crd.longitude);
                console.log('More or less ' + crd.accuracy + ' meters.');

            };

            function error(err) {
                console.warn('ERROR(' + err.code + '): ' + err.message);
            };

            function createMarker() {
                console.log("marcador creado: " + latu);
                new google.maps.Marker({
                    position: {lat: latu, lng: long},
                    map,
                    icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    shape: {
                        coords: [1, 2],
                        type: "poly",
                    },

                });
            }


            var def_lat = 20.750552;
            var del_long = -103.386282;
            var map = null;

            function initMap1() {

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 17,
                    center: {lat: def_lat, lng: del_long},
                    styles: new_style_map,
                    disableDefaultUI: true,
                });
                // setMarkers(map);
            }

            const beaches = [
                ["Bondi Beach", latu, long, 1],
                ["Bondi Beach", 20.750552, -103.385082, 2],
            ];

            function setMarkers(map) {
                console.log("MARCAR: " + latu + " - " + long)
                const image = {
                    url:
                        "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    size: new google.maps.Size(20, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32),
                };
                const shape = {
                    coords: [1, 2],
                    type: "poly",
                };

                for (let i = 0; i < beaches.length; i++) {
                    const beach = beaches[i];
                    new google.maps.Marker({
                        position: {lat: beach[1], lng: beach[2]},
                        map,
                        icon: image,
                        shape: shape,
                        title: beach[0],
                        zIndex: beach[3],
                    });
                }
            }


        </script> 

         

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
              integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
              crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
                integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
                crossorigin="anonymous"></script>


<script type="text/javascript">

    let way_send = '';

    //abrir modal para iniciar sesión
    $('.log-in-checkout').click(function () {
        $('#session').modal('toggle');
    });

    //cliente
    let cliente_telefono = '';
    let cliente_nombre = '';
    let cliente_apellidos = '';
    let cliente_correo = '';

    //paquetería
    let from_send = '';
    let c_paqueteria = null;
    let c_price = null;
    let c_dias = null;

    // función para validar 1 campo
    function validate(field, min) {
        let res = false;
        $(field).removeClass('to-validate');
        if ($(field).val().trim().length < min) {
            $(field).addClass('to-validate');
            res = true;
        }
        return res;
    }

    /*
    * Let's fix this cart
    * Step 1: Get client info
    * */
    $('#step-1').on('click', function () {
        let checkout_s1 = {
                telefono:   $('#cliente-telefono').val()
            ,   nombre:     $('#cliente-nombre').val()
            ,   apellidos:  $('#cliente-apellidos').val()
            ,   email:      $('#cliente-correo').val()
        }

        cliente_nombre = $('#cliente-nombre').val(); 
        cliente_apellidos = $('#cliente-apellidos').val(); 
        cliente_telefono = $('#cliente-telefono').val(); 
        cliente_correo = $('#cliente-correo').val();  

        if (
            validate("#cliente-telefono", 8) ||
            validate("#cliente-nombre", 2) ||
            validate("#cliente-apellidos", 2) ||
            validate("#cliente-correo", 2)
        ) {
            return
        }

        localStorage.setItem('checkout_s1', JSON.stringify(checkout_s1))
        $("#step-1").addClass('loading')

        // Activar paso 2
        setTimeout(f => {
            $('.step-checkout').fadeOut(10)
            $('#step-2-b').fadeIn(10)

            $('body').scrollTop(0)
            $("#step-1").removeClass('loading')
        }, 1000)
    })

    // Pack 1: Paquetería
    $("#pack-1").click(function () {
        localStorage.setItem('checkout_s1_to', 'send')
        $('.step-checkout').fadeOut(10);
        $('#step-3-b').fadeIn(10);
        $("body").scrollTop(0);
        way_send = 'enviar';
    });

    // Pack 2: Recoger en tienda
    $("#pack-2").click(function () {
        $('.step-checkout').fadeOut(10);
        $('#step-3-b-2').fadeIn(10);
        $("body").scrollTop(0);
        way_send = 'recoger';
        localStorage.setItem('checkout_s1_to', 'pickup')
        recoger('');
    });

    /* Paquetería roadmap */
    // Datos de opción de envío
    $('#step-4-shipping-options').click(function () {
        let cp = $('#checkout-cp').val();
        $('.conetent-field-shipping .to-validate').removeClass('to-validate');

        let v_all = false;
        if (validate("#checkout-cp", 4)) v_all = true;
        if (validate("#checkout-estado", 1)) v_all = true;
        if (validate("#checkout-ciudad", 1)) v_all = true;
        if (validate("#checkout-colonia", 1)) v_all = true;
        if (validate("#checkout-calle", 1)) v_all = true;
        if (validate("#checkout-number", 1)) v_all = true;
        if (validate("#checkout-entre", 1)) v_all = true;
        if (validate("#checkout-adicional", 1)) v_all = true;

        envio_cp = $("#checkout-cp").val().trim();
        envio_estado = $("#checkout-estado").val().trim();
        envio_ciudad = $("#checkout-ciudad").val().trim();
        envio_colonia = $("#checkout-colonia").val().trim();
        envio_calle = $("#checkout-calle").val().trim();
        envio_numero = $("#checkout-number").val().trim();
        envio_entre = $("#checkout-entre").val().trim();
        envio_adicional = $("#checkout-adicional").val().trim();

        if (v_all) return;

        localStorage.setItem('checkout_envio', JSON.stringify({
                cp:         envio_cp
            ,   estado:     envio_estado
            ,   ciudad:     envio_ciudad
            ,   colonia:    envio_colonia
            ,   calle:      envio_calle
            ,   numero:     envio_numero
            ,   entre:      envio_entre
            ,   adicional:  envio_adicional
        }))

        $("#step-4-shipping-options").addClass("loading");
        setTimeout(function () {
            $("#step-4-shipping-options").removeClass('loading');
            $('#checkout-cp').removeClass("to-validate");
            $('.step-checkout').fadeOut(10);
            $('#step-4-b').fadeIn(10);
            $("body").scrollTop(0);
            $('#overlay').fadeIn();
            $.ajax({
                'url': "{{asset('skydropx')}}",
                'method': 'POST',
                'data': {'cp': cp},
                'success': function (resp) {
                    $('#options-shipping-list').html("");
                    resp = JSON.parse(resp);
                    if (resp.length == 0) {
                        $('#options-shipping-list').append('<p class="pack" id="pack-1"><span class="name-shippong-opt"></span>No encontramos opciones de envío, contáctanos para ayudarte<span></span></p>');
                        Chatra('expandWidget');
                    }
                    resp.forEach(function (a, b) {
                        $('#options-shipping-list').append('<p onclick="selectShipping(' + b + ')" price="' + a.total_pricing + '" provider="' + a.provider + '" dias="' + a.days + '" class="pack ship-' + b + '" id="pack-1"><span class="name-shippong-opt">' + a.provider + '</span> ' + a.days + ' DÍAS<span style="font-weight: bolder"> $' + a.total_pricing + '</span></p>');
                    });
                    $("#overlay").fadeOut(300);

                    // Step 4
                    if( localStorage.getItem('checkout_paqueteria') )
                    {
                        let  paq = JSON.parse( localStorage.getItem('checkout_paqueteria') )
                        $(document).find('[onclick="selectShipping('+paq.id+')"]').click()

                        setTimeout(f => {
                            $('#step-4-pay-options').click()
                        }, 1000)
                    }
                }
            });
        }, 500);
    });

    // Opciones de envios
    $('#step-4-pay-options').click(function () {
        $('.btnPagarEnSucursal').css('display', 'none');
        if (c_paqueteria == null) {
            alert("Selecciona una opción de envío");
            return;
        }

        $("#step-4-pay-options").addClass('loading');
        setTimeout(function () {
            $('.step-checkout').fadeOut(10);
            $('#step-4-to-pay').fadeIn(10);
            $("#step-4-pay-options").removeClass('loading');
            $("body").scrollTop(0);
            $("body").scrollTop(0);
            from_send = 'enviar';
        }, 1000);
    });

    function selectShipping(id) {
        localStorage.setItem('checkout_paqueteria', JSON.stringify({
            id
        }))
        $('.sucursal-selected').removeClass("sucursal-selected");
        $('.ship-' + id).addClass("sucursal-selected");


        let price = $('.ship-' + id).attr('price');
        let provider = $('.ship-' + id).attr('provider');
        let dias = $('.ship-' + id).attr('dias');

        c_price = price;
        c_paqueteria = provider;
        c_dias = dias;

        updateSend(provider, price, dias);
    }

    function updateSend(_method, _price, _days) {
        const options2 = {style: 'currency', currency: 'MNX'};
        const numberFormat2 = new Intl.NumberFormat('es-MX', options2);
        $.ajax({
            'url': '{{asset("updateSend")}}',
            'method': 'post',
            'data': {
                "method": _method,
                "price": _price,
                "days": _days
            },
            'success': function (resp) {
                var resp = JSON.parse(resp);
                console.log(resp);
                $('#price_send').html(numberFormat2.format(resp.send.price));
                $('#cart_subtotal').html(numberFormat2.format(resp.subtotal));
                $('#cart_total').html(numberFormat2.format(resp.total));
            }
        });
    }

    /* Recoger en tienda roadmap */
    function recoger(option) {
        const options2 = {style: 'currency', currency: 'MNX'};
        const numberFormat2 = new Intl.NumberFormat('es-MX', options2);
        $('#overlay').fadeIn(300);

        $.ajax({
            'url': '{{asset("updateSend")}}',
            'method': 'post',
            'data': {
                "method": "Recoger en sucursal",
                "price": 0,
                "days": option
            },
            'success': function (resp) {
                var resp = JSON.parse(resp);
                console.log(resp);
                if ({{$total}} > 1500) {
                    $('#price_send').html("¡Tu envío es gratis!");
                } else {
                    if (option == 'inicial') {
                        $('#price_send').html("Se calcula en el siguiente paso");
                    } else {
                        $('#price_send').html("Has seleccionado recoger en tienda");
                    }
                }
                $('#cart_subtotal').html(numberFormat2.format(resp.subtotal));
                $('#cart_total').html(numberFormat2.format(resp.total));

                $('#overlay').fadeOut(300);
            }
        });
    }

    // Seleccion de sucursal y establecimiento del horario de recolección
    $('p.sucursal-checkout').click(function (event) {
        $('.sucursal-checkout').removeClass("sucursal-selected");

        if ($(event.target).is('p')) {
            $(event.target).addClass("sucursal-selected");

            localStorage.setItem('checkout_sucursal', JSON.stringify({id: $(this).attr('option')}))
            recoger($(event.target).attr('option'));
        } else {
            $(event.target).parent().addClass("sucursal-selected");
            localStorage.setItem('checkout_sucursal', JSON.stringify({id: $(this).parent().attr('option')}))
            recoger($(event.target).parent().attr('option'));
        }
    });

    // Siguiente
    $("#step-btn-horario").click(function () {
        $("#step-btn-horario").addClass('loading');
        setTimeout(function () {
            $('.step-checkout').fadeOut(10);
            $('#step-select-date').fadeIn(10);
            $("#step-btn-horario").removeClass('loading');
            $("body").scrollTop(0);
        }, 1000);

    });

    // Fecha de recolección
    $('#step-date-to-pay').click(function () {

        localStorage.setItem('checkout_recoleccion', JSON.stringify({value: $('#date-to-collect').val()}))

        if (day_to_collect == 0) {
            alert("No puedes recoger el día Domingo");
            return;
        }

        from_send = 'recoger';
        $('.btnPagarEnSucursal').css('display', 'block');
        $("#step-date-to-pay").addClass('loading');
        setTimeout(function () {
            $('.step-checkout').fadeOut(10);
            $('#step-4-to-pay').fadeIn(10);
            $("#step-date-to-pay").removeClass('loading');
            $("body").scrollTop(0);
        }, 1000);
    });


    /////////////////////////////////

    $('#to-options-pay').click(function () {
        localStorage.removeItem('checkout_recoleccion')
        $('.step-checkout').fadeOut(10);

        if (method_selected == 'tarjeta') {
            $('#options-pay-list').slideDown();
            $('#step-4-to-pay').slideDown();
            $('#options-tarjeta').slideUp();
            return;
        }

        if (from_send == 'recoger') {
            $('#step-select-date').fadeIn(10);
        } else {
            $('#step-4-b').fadeIn(10);
        }
        $("body").scrollTop(0);
    });

    // pasar de opción de envíos a pagos
    $('#step-4-pay-options').click(function () {
        $('.btnPagarEnSucursal').css('display', 'none');
        if (c_paqueteria == null) {
            alert("Selecciona una opción de envío");
            return;
        }

        $("#step-4-pay-options").addClass('loading');
        setTimeout(function () {
            $('.step-checkout').fadeOut(10);
            $('#step-4-to-pay').fadeIn(10);
            $("#step-4-pay-options").removeClass('loading');
            $("body").scrollTop(0);
            $("body").scrollTop(0);
            from_send = 'enviar';
        }, 1000);

    });

    // pasar de fecha de recolección a pagos


    $('.options-pay').click(function (event) {
        $('.options-pay').removeClass("sucursal-selected");
        console.log($(event.target).addClass("sucursal-selected"));
    });


    $('p.pack').click(function (event) {
        $('.sucursal-checkout').removeClass("sucursal-selected");
        if ($(event.target).is('p')) {
            $(event.target).addClass("sucursal-selected");
        } else {
            $(event.target).parent().addClass("sucursal-selected");
        }
    });

    // cambiar sucural a seleccionar fecha de recoger


    $(".back-to-sucursales").click(function () {
        localStorage.removeItem('checkout_sucursal')
        $('.step-checkout').fadeOut(10);
        $('#step-3-b-2').fadeIn(10);
        $("body").scrollTop(0);
    });


    $('.back-0').click(function () {
        localStorage.removeItem('checkout_s1_to')
        localStorage.removeItem('checkout_envio')
        localStorage.removeItem('checkout_paqueteria')

        $('.step-checkout').fadeOut(10);
        $('#step-1-b').fadeIn(10);
        $("body").scrollTop(0);
    });

    $('.back-a').click(function () {
        localStorage.removeItem('checkout_s1_to')
        localStorage.removeItem('checkout_sucursal')
        $('.step-checkout').fadeOut(10);
        $('#step-2-b').fadeIn(10);
        $("body").scrollTop(0);
    });



    $("#to-fields-shipping").click(function () {
        $('.step-checkout').fadeOut(10);
        $('#step-3-b').fadeIn(10);
        $("body").scrollTop(0);
    });


    $('#step-3-send-option').click(function () {
        $('.step-checkout').fadeOut(10);
        $('#step-4-b-1').fadeIn(10);
        $("body").scrollTop(0);
    });

    let envio_cp = '';
    let envio_estado = '';
    let envio_ciudad = '';
    let envio_colonia = '';
    let envio_calle = '';
    let envio_numero = '';
    let envio_entre = '';
    let envio_adicional = '';

    $(document).ready(function () {
        recoger('inicial');
        $("body").scrollTop(0);

        if( localStorage.getItem('checkout_s1') )
        {
            // Step 1
            let step1 = JSON.parse( localStorage.getItem('checkout_s1') )
            $('#cliente-telefono').val( step1.telefono )
            $('#cliente-nombre').val( step1.nombre )
            $('#cliente-apellidos').val( step1.apellidos )
            $('#cliente-correo').val( step1.email )

            // Step 2
            if( localStorage.getItem('checkout_s1_to') )
            {
                if( localStorage.getItem('checkout_s1_to') === 'send' )
                {
                    $('#pack-1').click()
                    // Step 3
                    if( localStorage.getItem('checkout_envio') )
                    {
                        let step3 = JSON.parse( localStorage.getItem('checkout_envio') )

                        $('#checkout-cp').val( step3.cp )
                        $('#checkout-estado').val( step3.estado )
                        $('#checkout-ciudad').val( step3.ciudad )
                        $('#checkout-colonia').val( step3.colonia )
                        $('#checkout-calle').val( step3.calle )
                        $('#checkout-number').val( step3.numero )
                        $('#checkout-entre').val( step3.entre )
                        $('#checkout-adicional').val( step3.adicional )

                        setTimeout(f => {
                            $('#step-4-shipping-options').click()
                        }, 1250)

                        // El último paso se manda al ajax de selección de paquetería porque tenemos que esperar la promesa.
                    }
                }
                else
                {
                    $('#pack-2').click()
                    // Step 3
                    if( localStorage.getItem('checkout_sucursal') )
                    {
                        let suc = JSON.parse( localStorage.getItem('checkout_sucursal') )
                        $(document).find('.sucursal-checkout[option="'+suc.id+'"]').click()

                        setTimeout(f => {
                            $('#step-btn-horario').click()
                        }, 1250)
                        // Step 4
                        if( localStorage.getItem('checkout_recoleccion') )
                        {
                            let dt = JSON.parse( localStorage.getItem('checkout_recoleccion') )
                            $('#date-to-collect').val( dt.value )

                            setTimeout(f => {
                                $('#step-date-to-pay').click()
                            }, 1250)
                        }
                    }
                }
            }
        }
    })

</script>
@endsection