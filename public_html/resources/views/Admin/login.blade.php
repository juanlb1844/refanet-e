<style type="text/css">* {
  box-sizing: border-box;
  margin: 0;
}

body {
  font-family: sans-serif;
}

.container {
  display: flex;
  height: 100vh;
}

.left {
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  -webkit-animation-name: left;
          animation-name: left;
  -webkit-animation-duration: .8s;
          animation-duration: .8s;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
  -webkit-animation-delay: .5s;
          animation-delay: .5s;
  margin-top: -50px;
}

#right {
  flex: 1;
  background-color: black;
  transition: 1s;
  /* background-image: url(https://wallpaperplay.com/walls/full/2/d/8/13598.jpg); 
  background-size: cover; */
  background-repeat: no-repeat;
  background-position: center;
}
#right:before{
  content: '';
  position: fixed;
  width: 100vw;
  height: 100vh;
  top: 0;
  background: #001432a1; 
}

.header > h2 {
  margin: 0;
  color: #122f5b;
  text-align: center;
}

.header > p {
  margin-top: 10px;
  font-weight: normal;
  font-size: 12px;
  color: rgba(0, 0, 0, 0.4);
  line-height: 1.5;
  text-align: justify;
}

.form {
  width: 80%;
  display: flex;
  flex-direction: column;
  text-align: center;
  margin: 0 auto;
}

.form > p {
  text-align: right;
}

.form > p > a {
  color: #000;
  font-size: 14px;
}

.form-field {
  height: 46px;
  padding: 0 16px;
  border: none;
  border-bottom: 2px solid #d2e2ff;
  background: linear-gradient(180deg, white, #f8faff);
  border-radius: 4px;
  font-family: sans-serif;
  outline: 0;
  transition: .2s;
  margin-top: 20px;
}

.form-field:focus {
  border-color: #0f7ef1;
}

.form > .button {
  transition-property: all; 
  transition-duration: .2s; 
  padding: 12px 10px;
  border: 0;
  background: #223d65;
  border-radius: 3px;
  margin-top: 10px;
  color: #fff;
  letter-spacing: 1px;
  font-family: sans-serif;
  text-decoration: none;
}

.animation {
-webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.a1 {
  -webkit-animation-delay: .9s;
          animation-delay: .9s;
}

.a2 {
  -webkit-animation-delay: 1s;
          animation-delay: 1s;
          color: #e0040b; 
}

.a3 {
  -webkit-animation-delay: 1.2s;
          animation-delay: 1.2s;
}

.a4 {
  -webkit-animation-delay: 1.4s;
          animation-delay: 1.4s;
}

.a5 {
  -webkit-animation-delay: 1.6s;
          animation-delay: 1.6s;
}

.a6 {
  -webkit-animation-delay: 1.8s;
          animation-delay: 1.8s;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 30%, 0);
    transform: translate3d(0, 30%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 30%, 0);
    transform: translate3d(0, 30%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}
@-webkit-keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }
  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 500px;
  }
}
@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }
  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 500px;
  }
}

.login-btn:hover {
  cursor: pointer;
  background-color: #ffc600; 
  transition-property: all; 
  transition-duration: .2s; 
}
.login-btn {
  background-color: #ffc600!important; 
}

#right {
  background-image: url("{{asset('media/wallpaper_1.jpg')}}");
  background-size: cover;  
}
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<body onload="randombg()">
  <div class="container">
    <div class="left">
      <img src="{{asset('media/FullColor_Logotipo_horizontal%20y%20vertical-02-padd.png')}}" class="animation a6" style="margin: 0 auto 10px;width: 150px">
      <div class="header">
        <!-- <h2 class="animation a1">RefaGo</h2> --> 
        <div style="text-align: center;">
          <!-- <p class="animation a2">sistema administrativo</p> --> 
        </div>
      </div>
      <form class="form" method="">
        <input type="email" class="form-field animation a3 user-email" name="" placeholder="usuario">
        <input type="password" class="form-field animation a4 user-pass" name="" placeholder="contraseña">
        <div class="animation a5" style="margin: 20px">
          <input type="checkbox" id="check" class="animation a5" name=""><label for="check" style="padding-left: 10px;color: #afafaf">Recordar mi contraseña</label> 
        </div>
        <a class="button animation a6 login-btn">Entrar</a>
      </form>
    </div>
    <div id="right"></div>
  </div>
</body>

 
<script type="text/javascript">
  window.onload = function() {
    $('.login-btn').click( function() { 
        var user = $('.user-email').val();   
        var pass = $('.user-pass').val();  
        window.location = "{{asset('')}}/authAdmin?email="+user+"&password="+pass; 
    });  
  }

  function randombg() {
    /* 
  var random = Math.floor(Math.random() * 4) + 0;
  var bigSize = [
    "url('https://begima.com.mx/media/banners/banner-begima-full-width.jpeg')", 
    "url('https://begima.com.mx/media/banners/banner-begima-full-width.jpeg')"
  ];
  document.getElementById("right").style.backgroundImage = bigSize[random]; */ 
}

</script>