<style type="text/css">
 
	.list-category-blocks {
		margin-top: 20px; 
		display: inline-block; 
		padding: 20px 140px;
	}
	.list-category-blocks a {
		color: black!important; 
	}
	.element-category { margin-bottom: 25px; }
	.element-category img {
		width: 100%; border-radius: 7px;
	}
	.element-category img:hover {
		
	}
	.cat-elemnt-text { padding-top: 50px!important; text-align: center!important; }
	.cat-element-content {
    width: 25vw!important;
    height: 15vw!important;
    /*border-radius: 50%!important;*/
    border-color: #d6d6d6!important; 
  }
	@media (max-width: 900px) { 
		.list-category-blocks {
			padding: 10px 10px!important;
		} 
	}
 
	.cat-block {
		padding: 20px 120px;
	}
	.cat-block img {
		width: 100%; 
	}
	.cat-element {
		height: 140px;
	}
	.cat-element-content {
    	background-size: contain;
    	background-repeat: no-repeat;
    	border-radius: 7px;
    	font-weight: 900;
    	margin: 0px 20px;
    	margin-bottom: 20px;
    	text-align: center;
    	background-size: cover;
  

	}
	.cat-element-content span {
		/*font-size: 25px;*/ 
		/*color: white;*/ 
		font-family: 'Roboto Condensed', sans-serif;
	}
	.content-categorie { padding: 20px; }

	@media (max-width: 1260px) {  
		.cat-block { padding: 20px 0px; }
	}
	@media (max-width: 900px) { 
		.content-categorie { padding: 0px; }
		.cat-block {
			padding: 20px 0px;
		}
		.cat-element-content span {
			font-size: 12px; 
			font-family: 'Roboto Condensed', sans-serif;
		}
		.cat-element-content { 
			height: 60px;
		}
		.cat-elemnt-text { padding-top: 15px!important; text-align: right; }
		.cat-element {
			height: auto; 
		} 
		.cat-element-content { margin: 7px 7px; }
		.cat-elemnt-text { padding-top: 40px!important; text-align: left!important; }
		.cat-element-content {
		    width: 40vw!important;
		    height: 40vw!important;
		    /*border-radius: 50%!important;*/
		    border: 2px solid gray;
		  }
		.cat-elemnt-text span {
			font-size: 17px; 
		}
		.block-name span {
			font-size: 20px!important; 
		}
	}


	.cat-circle-img {
		fill: red!important; 
	} 

	@media (min-width: 1460px) { 
		 .cat-element-content { height: 120px; background-size: contain; }
	}
 
  
</style>

<div class="col-lg-12 col-xs-12 cat-block section-element">
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[0]->destination}}">
			<div class="col-lg-12 cat-element-content cat-element-content-11" style="background-image: url({{$block[0]->content}}); {{$block[0]->custom_css}} margin-bottom: 0px;">
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-10 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-2 col-md-6 cat-elemnt-text">
					</div> 
				</div>
			</div>
			<div class="block-name" style="{{$block[0]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[0]->label}}</span>
			</div>
		</a>
	</div>  
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[1]->destination}}">
			<div class="col-lg-12 cat-element-content cat-element-content-12" style="background-image: url({{$block[1]->content}}); {{$block[1]->custom_css}} margin-bottom: 0px;">
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-2 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-10 col-md-6 cat-elemnt-text">
					</div>
				</div>
			</div>
			<div class="block-name" style="{{$block[1]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[1]->label}}</span>
			</div>
		</a>
	</div> 
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[2]->destination}}"> 
			<div class="col-lg-12 cat-element-content cat-element-content-13" style="background-image: url({{$block[2]->content}}); {{$block[2]->custom_css}} margin-bottom: 0px;">
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-2 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-10 col-md-6 cat-elemnt-text">
					</div>
				</div>
			</div>
			<div class="block-name" style="{{$block[2]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[2]->label}}</span>
			</div>
		</a>
	</div> 
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[3]->destination}}"> 
			<div class="col-lg-12 cat-element-content cat-element-content-14" style="background-image: url({{$block[3]->content}}); {{$block[3]->custom_css}} margin-bottom: 0px;"> 
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-2 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-10 col-md-6  cat-elemnt-text">
					</div>
				</div>
			</div>
			<div class="block-name" style="{{$block[3]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[3]->label}}</span>
			</div>
		</a>
	</div> 
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[4]->destination}}"> 
			<div class="col-lg-12 cat-element-content cat-element-content-15" style="background-image: url({{$block[4]->content}}); {{$block[4]->custom_css}} margin-bottom: 0px;"> 
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-2 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-10 col-md-6 cat-elemnt-text">
					</div>
				</div>
			</div>
			<div class="block-name" style="{{$block[4]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[4]->label}}</span>
			</div>
		</a>
	</div>
	<div class="col-lg-4 col-xs-6 content-categorie"> 
		<a href="{{$block[5]->destination}}"> 
			<div class="col-lg-12 cat-element-content cat-element-content-16" style="background-image: url({{$block[5]->content}}); {{$block[5]->custom_css}} margin-bottom: 0px;"> 
				<div class="col-lg-12 col-xs-12 np"> 
					<div class="col-lg-6 col-xs-2 col-md-6 cat-element np">
					</div>
					<div class="col-lg-6 col-xs-10 col-md-6 cat-elemnt-text np">
					</div>
				</div>  
			</div>
			<div class="block-name" style="{{$block[5]->custom_css}} border: 0px!important; font-weight: 600; text-align: center;">
				<span>{{$block[5]->label}}</span>
			</div>
		</a>
	</div> 
</div>

<!-- 
<div class="col-lg-12 list-category-blocks">
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637604621937.webp')}}">  
	    	</a>
    </div>
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637604753831.webp')}}">  
	    	</a>
    </div>
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637606177266.webp')}}">  
	    	</a>
    </div>
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637606450800.webp')}}">  
	    	</a>
    </div>
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637606579422.webp')}}">  
	    	</a>
    </div>
    <div class="col-lg-4 col-xs-6 element-category">
    		<a href="https://begima.com.mx/catalogo/dama">
		    	<img src="{{asset('media/categorias/1637606670555.webp')}}">  
	    	</a>
    </div>
</div>
--> 