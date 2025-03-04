


<div class="item row" style="text-align: center;"> 
    <div style="text-align: center;"> 
        <div style="margin: 0px 10px; border-radius: 0px;">
            <a class="container-item" href="{{asset('producto')}}/{{$product->nparte}}/pack/{{$product->paquete}}">   

                @if( isset( $product->gallery[1]  ) )
                    <div class="content-img-product" style="background-image: url('.{{ $product->gallery[1]->link }}');">   
                         @if($product->tipo_producto == 'paquete')
                            <div class="pack-bullet">
                                <span>Kit</span>
                            </div>
                         @endif     
                     </div> 
                 @else
                    <!-- <div class="content-img-product" style="background-image: url('{{ $product->img }}');">   --> 
                     <div class="content-img-product" style="background-image: url('.{{ $product->gallery[0]->link }}');">  
                         @if($product->tipo_producto == 'paquete')
                            <div class="pack-bullet">
                                <span>Kit</span>
                            </div>
                         @endif 
                     </div>  
                @endif 

                @if( isset($product->medium_img) )
                    <div class="content-img-product img-sec" style="background-image: url('.{{$product->medium_img}}');">  
                     @if($product->tipo_producto == 'paquete')
                        <div class="pack-bullet">
                            <span>Kit</span>
                        </div>
                     @endif 
                    </div> 
                @else 
                     <div class="content-img-product img-sec" style="background-image: url('.{{$product->gallery[0]->link}}');">  
                         @if($product->tipo_producto == 'paquete')
                            <div class="pack-bullet">
                                <span>Kit</span>
                            </div>
                         @endif 
                     </div>  
                @endif 
            </a>
            
        @if( @session()->has('logueado') AND strlen(session()->get('logueado')) > 2) 
            @if ( session()->get('user')->grupo == 2 )
                <div class="controls-product row">
                    <div style="height: 60px;">  
                        <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}</span>
                    </div>
                    <div class="product-prices">  
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 12px; text-decoration: line-through;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 17px;">$ {{number_format($product->precio_especial_1, 2, '.', ',') }} MNX </span> 
                    </div>
                </div>  
            @elseif( session()->get('user')->grupo == 3 )
                <div class="controls-product row">
                    <div style="height: 60px;">  
                        <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}</span>
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 12px; text-decoration: line-through;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                    </div>
                    <div class="product-prices">  
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 17px;">$ {{number_format($product->precio_especial_2, 2, '.', ',') }} MNX </span> 
                    </div>
                </div> 
            @elseif( session()->get('user')->grupo == 4 )
                <div class="controls-product row">
                    <div style="height: 60px;">  
                        <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}</span>
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 12px; text-decoration: line-through;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 17px;">$ {{number_format($product->precio_especial_3, 2, '.', ',') }} MNX </span> 
                    </div>
                </div> 
            @elseif( session()->get('user')->grupo == 5 )
                <div class="controls-product row">
                    <div style="height: 60px;">  
                        <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}</span>
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 12px; text-decoration: line-through;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 17px;">$ {{number_format($product->precio_especial_4, 2, '.', ',') }} MNX </span> 
                    </div>
                </div>  
            @else  
                <div class="controls-product col-lg-12 col-xs-12 np">
                    <div style="height: 60px;">  
                        <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}</span>
                    </div>
                    <div class="product-prices"> 
                         <span style="color: black; font-weight: 600; padding: 10px 0px; display: inline-block; font-size: 12px; ">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                    </div>
                </div>
            @endif 
        @else  
            <div class="controls-product col-xs-12 col-lg-12 np">
                <div style="height: 55px; padding-left: 10px!important;  ">  
                    <span style="font-size: 15px; font-weight: 500; display: block; padding: 15px 0px;">{{$product->title}}  </span>
                </div>
                <div class="product-prices col-lg-12 col-xs-12 np"> 
                    @if( $product->check_promo == 1 )
                        <div class="col-lg-5 col-xs-4 np"> 
                            <span style="color: black; font-weight: 600; padding: 2px 0px; display: inline-block; font-size: 17px;">$ {{number_format($product->precio_promocional, 2, '.', ',') }} MNX </span> 
                        </div> 
                        <div class="col-lg-5 col-xs-4 np"> 
                            <span style="color: black; font-weight: 600; padding: 2px 0px; display: inline-block; font-size: 14px; text-decoration: line-through;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span> 
                        </div>
                        @if( session()->has('logueado') )  
                            @if( strlen( session()->get('logueado') ) > 1 )
                                <div class="col-lg-2"> 
                                    <img np="{{$product->nparte}}" class="pull-right add-to-fav" src="{{asset('heart.svg')}}" style="width: 25px;" />
                                    ..
                                </div> <!-- liked -->  
                            @else 
                                <div class="col-lg-2"> 
                                    <img class="pull-right" data-toggle="modal" data-target="#session" src="{{asset('heart.svg')}}" style="width: 25px;" />
                                </div> 
                            @endif 
                        @else 
                            <div class="col-lg-2"> 
                                <img np="{{$product->nparte}}" class="pull-right add-to-fav" data-toggle="modal" data-target="#session" src="{{asset('heart2.svg')}}" style="width: 25px;" /> 
                                <!-- liked --> 
                            </div>
                        @endif   
                    @else 
                        <div class="col-lg-6 col-xs-10 np" style="padding-left: 10px!important;"> 
                            <span class="pull-left font-price" style="color: #fdc400; font-weight: 600; padding: 10px 0px; font-size: 20px; text-align: left;">$ {{number_format($product->price, 2, '.', ',') }} MNX </span>  
                        </div> 
                         @if( session()->has('logueado') )   
                            @if( strlen( session()->get('logueado') ) > 1 ) 
                                <div class="col-lg-6 col-xs-2 add-to-fav-cont np" style="padding-top: 10px; padding-right: 10px;"> 
                                    @if( $product->favorite == 1 )
                                        <img np="{{$product->nparte}}" id="{{$product->id}}" class="add-to-fav pull-right heart liked" src="{{asset('heart2.svg')}}"/>   
                                    @else  
                                        <img np="{{$product->nparte}}" id="{{$product->id}}" class="add-to-fav pull-right heart " src="{{asset('heart.svg')}}"/> 
                                    @endif 
                                    <!-- liked --> 
                                </div>  
                             @else 
                                <div class="col-lg-6 col-xs-2 np" style="padding-top: 10px!important; padding-right: 10px!important;"> 
                                    <img class="pull-right heart" data-toggle="modal" data-target="#session" src="{{asset('heart.svg')}}"/>
                                </div> 
                             @endif 
                        @else 
                                <div class="col-lg-6 col-xs-2 np" style="padding-top: 10px!important; padding-right: 10px!important;"> 
                                    <img class="pull-right heart" data-toggle="modal" data-target="#session" src="{{asset('heart.svg')}}"/>
                                </div> 
                        @endif 
                    @endif 
                </div>
            </div>
        @endif 
        </div>
    </div> 
</div>  