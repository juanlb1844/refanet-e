<style type="text/css">
	.container-aside-left {
		text-align: center;
		padding-top: 30px; 
	}
	.aside-cliente {
		padding: 40px 40px; 
		font-size: 15px; 
		background-color: #fafafa; 
		padding-left: 30px;
		width: 	auto;
		display: inline-block;
		text-align: left;
	}
	.aside-cliente li {
		text-decoration: none; 
		list-style: none; 
		padding: 10px 10px; 
		border-top: 1px solid #d9d9d9;
	}
	.aside-cliente ul li {
		margin-top: 10px; 
	}
	.main-aside {
		padding-top: 50px; 
		min-height: 80vh; 
	}

	.option-account:hover {
			cursor: 	pointer;
			font-weight: bolder; 
	}
	.form-group { padding-left: 0px!important;  }
  .section-element {
      padding-top: 100px!important;  
    }
  .main-title {
  	 font-size: 25px; 
  	 font-weight: 900; 
  }
  .aside-cliente {
  	border-radius: 10px; width: 100%; border: 1px solid #dfdfdf;
  } 
 
  input, button { border-radius: 0px!important; }
  button { background-color: black!important; }
  @media( max-width: 600px ) {  
  	.aside-cliente { 
  		padding: 10px;  
  	}
  	.main-title {
  	 font-size: 20px; 
  	}
    .main-aside { padding-top: 10px; }
    .content-page {
      padding: 10px 15px!important; 
    }
    .section-element {
      padding-top: 60px!important; 
    }
  }
</style>

<ul class="aside-cliente">
 	 		<li style="border-top: none;">	
 	 			<span class="main-title">MI PERFIL</span>
 	 	    </li>
 	 		<li>  
        <a href="{{asset('usuario')}}">
 	 		   	<span class="option-account">Mi cuenta</span>
        </a>
 	 		</li> 
      			<!-- 
 	 		<li>
 	 			<span class="option-account">Mis pedidos</span> 
 	 		</li> --> 
 	 		<li>
        <a href="{{asset('favoritos')}}">
 	 			  <span class="option-account">Mi lista de deseos</span>
        </a>
 	 		</li>
      <li>
        <a href="{{asset('')}}">
          <span class="option-account">Libreta de direcciones</span>
        </a>
      </li>
      <!-- 
 	 		<li>
 	 			<span class="option-account">Información de envío</span>
 	 		</li> 
 	 		<li>
 	 			<span class="option-account">Información de facturación</span>
 	 		</li> --> 
 	 	</ul>