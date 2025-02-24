 <style type="text/css">
 	.modal-content {
 		border-radius: 0px!important; 
    display: inline-block!important; 
 	}
 </style>


 <!-- Modal -->
<div id="session" class="modal fade" role="dialog" style="z-index: 999999999;">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">INICIAR SESIÓN</h4>
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
              .question, .question-login { color: #337ab7; }
              .question:hover, .question-login:hover {
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
            <h4>Registrate <h5 class="question-login">entrar</h5></h4>
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
            <label for="exampleInputEmail1">Teléfono (opcional)</label>
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
            <input type="checkbox" class="form-check-input" id="register-legal">
            <label class="form-check-label" for="exampleCheck1">
              <a href="{{asset('politica-de-privacidad')}}">Política de privacidad</a>
            </label>
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

<script type="text/javascript">

	$('.por-correo').click( function() {
       var client_user = $('#client-user').val(); 
       var client_pass = $('#client-pass').val();  
       window.location = "https://begima.com.mx/auth?type=email&email="+client_user+"&password="+client_pass; 
    }); 

  	// switch to show form to : register client 

    $('.question-login').click( function(){
      $('.body-login').slideDown(10); 
      $('.body-register').slideUp(); 
    });   

    $('.question').click( function(){
      $('.body-login').slideUp(10); 
      $('.body-register').slideDown(); 
    });   


	$('.register-user').click( function() {
      
      $("#overlay").fadeIn(300);　 

      var client_name   = $('#register-name').val().trim(); 
      var client_email  = $('#register-mail').val().trim(); 
      var pass_1        = $('#register-pass').val().trim();
      var pass_2        = $('#register-pass2').val().trim();
      var registerPhone = $('#register-phone').val().trim();  

      if( client_email.length < 2 || client_email.length < 2 || pass_1.length < 2 ) {
        alert("llena todos los campos"); 
        return; 
      }

      if( !$('#register-legal').is(':checked') ) {
        alert("Tienes que aceptar las políticas de privacidad"); 
        return; 
      }
      
      if( pass_1 != pass_2 ) {
        alert("Las contraseñas no coinciden"); 
      } else {
        $("#overlay").fadeIn(300);　 
          $.ajax({
            'url' : "{{asset('registerUser')}}", 
            'method' : "POST", 
            'data' : {'client_name' : client_name, 
                      'client_email' : client_email, 
                      'client_pass' : pass_1, 
                      'registerPhone' : registerPhone}, 
            'success' : function( resp ) {
              console.log(resp); 
              if( resp == 1 ) {
                alert("El correo "+ client_email +" ya se encuentra registrado"); 
              } else {
                $('#session').modal('toggle');  
                $("#overlay").fadeOut(300);　 
                alert("Te has registrado!"); 
              }
              //var resp = JSON.parse(A); 
              /* 
              $('#register-name').val(""); 
              $('#register-mail').val(""); 
              $('#register-pass').val(""); 
              $('#register-pass2').val(""); 
              if( resp == 'registrado') {
                $('#session').modal('toggle');  
                $("#overlay").fadeOut(300);　 
                alert("Te has registrado!"); 
              } */ 
            }
          });         
      }


    }); 
</script>