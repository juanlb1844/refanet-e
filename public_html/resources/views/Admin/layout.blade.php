<!DOCTYPE html>
<html>
<head>

<title>Admin | UdL </title>
 
 <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS  --> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<!-- <script type="" src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>	 --> 

<!-- dashboard --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> 
<!-- <script src="../dist/gridstack.js"></script>--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.3.0/gridstack.min.css" />
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.3.0/gridstack.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.3.0/gridstack.jQueryUI.min.js'></script> 
<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>

 <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>


<body>

 <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
 
 
 <style type="text/css">

  td span { font-size: 15px; font-weight: 600; }
     td:hover{ cursor: pointer; }

     table.dataTable.no-footer {
         border-bottom: 1px solid #dddddd; 
    }
  
 	@if ( isset($extra['selected-option']) ) 
 		.selected-{{$extra['selected-option']}} { background-color: #2f2f2f; }
 	@endif  

    .np-l { padding-left: 0px!important; }
    .np   { padding: 0px!important; }
    .np-r { padding-right: 0px!important; }
    .np-t { padding-top: 0px!important; }
    .np-b { padding-bottom: 0px!important; }

    .title-field { font-weight: 600; font-size: 15px; }
 </style>

 <style type="text/css">
  :root {
  --color-blue-100: #f5faff;
    --color-blue-200: #b8dcff;
    --color-blue-300: #7ab8ff;
    --color-blue-400: #3d90ff;
    --color-blue-500: #0064fe;
    --color-blue-600: #0046d1;
    --color-blue-700: #002ba3;
    --color-blue-800: #001575;
    --color-blue-900: #000647;
    --color-green-100: #f0fcf5;
    --color-green-200: #b4eece;
    --color-green-300: #78e0a7;
    --color-green-400: #3cd180;
    --color-green-500: #00c159;
    --color-green-600: #009645;
    --color-green-700: #006a31;
    --color-green-800: #003f1d;
    --color-green-900: #001309;
    --color-gray-100: #f3f5f6;
    --color-gray-200: #d0d8dd;
    --color-gray-300: #aebac2;
    --color-gray-400: #8d9ca7;
    --color-gray-500: #6c7d8b;
    --color-gray-600: #576674;
    --color-gray-700: #424e5c;
    --color-gray-800: #2e3843;
    --color-gray-900: #1c212a;
    --color-white: white;
    --color-black: black;
    --color-border: var(--color-gray-200);
    --space-0: 0;
    --space-1: 0.25rem;
    --space-2: 0.5rem;
    --space-3: 0.75rem;
    --space-4: .8rem;
    --space-5: 1.25rem;
    --space-6: 1.5rem;
    --space-8: 2rem;
    --space-10: 2.5rem;
    --space-12: 3rem;
    --space-16: 4rem;
    --space-20: 5rem;
    --space-24: 6rem;
    --text-sm: 0.875rem;
    --text-md: 2rem;
    --text-lg: 1.25rem;
    --text-xl: 1.5rem;
    --radius: 6px;
    --round: 1000px;
    --border: 1px solid var(--color-border);
    --shadow: 0px 2px 8px rgba(0, 0, 0, 0.06), 0px 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-large: 0px 5px 18px rgba(0, 0, 0, 0.1), 0px 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-focus: 0 0 0 var(--space-1) var(--color-blue-200);
    --transition-curve: cubic-bezier(0.2, 0.7, 0.3, 1);
    --transition-curve-bounce: cubic-bezier(0.175, 0.885, 0.32, 1.275);
    --transition-speed: 0.25s;
    --transition-speed-slow: 1s;
    --transition: all var(--transition-speed) var(--transition-curve);
    --transition-bounce: all var(--transition-speed) var(--transition-curve-bounce);
    --opacity-25: 0.25;
    --opacity-50: 0.5;
    --opacity-75: 0.75;
    --opacity-100: 1;
}

.notification {
  z-index: 999999;
  position: fixed;
  display: flex;
  width: var(--notification-size);
  right: var(--space-4);
  border: var(--border);
  background-color: var(--color-white);
  border-radius: var(--radius);
  box-shadow: var(--shadow-large);
  transition: var(--transition);
  animation: slide-in var(--transition-speed) var(--transition-curve);
}
.content {
  padding: var(--space-4);
}
.content .title {
  font-size: var(--text-md);
  margin-bottom: var(--space-1);
  font-weight: bold;
  color: var(--color-gray-800);
}
.description {
  color: var(--color-gray-600);
}
.close-not {
  font-size: 15px;
  margin-left: auto;
  padding: 12px; 
  border: 0;
  border-left: var(--border);
  background-color: transparent;
  border-radius: 0 var(--radius) var(--radius) 0;
  color: var(--color-gray-400);
  cursor: pointer;
}
.close-not:hover {
  background-color: var(--color-gray-100);
}
.close-not:active {
  color: var(--color-gray-700);
}
.close-not:focus,
.close-not:active {
  outline: none;
  box-shadow: var(--shadow-focus);
}
.add {
  padding: var(--space-3) var(--space-5);
  border: 0;
  font-weight: bold;
  background-color: var(--color-blue-500);
  color: var(--color-white);
  border-radius: var(--round);
  cursor: pointer;
  outline: none;
}
.add:hover {
  background-color: var(--color-blue-400);
}
.add:focus {
  box-shadow: var(--shadow-focus);
}
.add:active {
  background-color: var(--color-blue-500);
}
.animate-out {
  animation: fade-out var(--transition-speed) var(--transition-curve);
}
@keyframes fade-out {
  to {
    opacity: 0;
    transform: translateX(var(--notification-size));
  }
}
@keyframes slide-in {
  from {
    transform: translateX(var(--notification-size));
  }
  to {
    transform: translateX(0);
  }
}

</style>

	<style type="text/css">
  #overlay{ 
  position: fixed;
  top: 0;
  z-index: 99999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
	 
	<style type="text/css">
		 
        html, body{ 
            font-family: 'Rajdhani'!important;   
        } 
        .menu-options li {
        	display: block;
        	margin: 0px 0px; 
        	color: #434b69; 
        } 
        .menu-options li a {
        	color: #434b69;  
        }
        .menu-options li a:hover {
        	text-decoration: none; 
        }
		.menu-options {
			font-size: 12px;  
			padding-top: 20px;
			font-weight: 500!important;
			list-style: none; 
			padding-left: 10px;  
		}
		.container-side {
			height: 100vh;
    		background: #404040;
    		position: fixed; 
    		z-index: 99;
        color: white!important;
		}
		.panel-right {
			padding: 45px 0px; width: 120%; padding-left: 25vh
		}
	</style>

	<style type="text/css">
		.option-side-conteainer {
			display: inline-block; 
			width: 35px;  
			height: 35px; 
			/*border: 1px solid gray;*/ 
			border-radius: 12px;
			background-color: #ffffff;  
			box-shadow: 0px 7px 6px 0px #8080803b; 
			background-size: 65%;
		    background-position: center;
		    background-repeat: no-repeat;
		}
		.opt-unidades {
			background-image: url({{asset('media/icons/etiqueta.svg')}}); 
		}
		.opt-contactos {
			background-image: url({{asset('media/icons/item.svg')}}); 
		}
		.opt-directorio {
			background-image: url({{asset('media/icons/cupon.svg')}}); 
		} 
		.opt-usuarios {
			background-image: url({{asset('media/icons/portapapeles.svg')}}); 
		}
    .opt-shipping {
      background-image: url({{asset('media/icons/shipping.svg')}}); 
    }
    .opt-groups {
      background-image: url({{asset('media/icons/groups.svg')}}); 
    }
    .opt-pays {
      background-image: url({{asset('media/icons/pays.svg')}}); 
    }
    .opt-news {
      background-image: url({{asset('media/icons/news.svg')}}); 
    }
    .opt-clients {
      background-image: url({{asset('media/icons/clients.svg')}}); 
    }
		.opt-dashboard {
			background-image: url({{asset('media/icons/cuentakilometros.svg')}}); 
		}
    .opt-order {
      background-image: url({{asset('media/icons/order.svg')}}); 
    }

		.opt-apartados {
			background-image: url({{asset('media-root/apartados.svg')}}); 
		}
		.txt-option {
			padding: 10px; 
			font-weight: 600;
      color: white;
		}
		.menu-options li {
			border-radius: 10px; 
			padding: 5px; 
			transition-property: all; transition-duration: .2s; 
      margin-top: 5px;
		} 
		.menu-options li:hover {
			background-color: #b1b1b157; 
			cursor: pointer;
			transition-property: all; transition-duration: .2s;  
		}
	</style>

	<style type="text/css">
	table {
		border: 1px solid #dddddd;
    	border-radius: 7px;
	}
	th {
		border-bottom: 1px solid #f0f0f0!important;
		background-color: #efefef;
		color: #696969; 
		font-weight: 900!important; 
	}
	td {
		color: #7b848d;  
		font-weight: 500; 
		font-size: 12px; 
	}
	.container-header { 
		padding: 5px 0px 35px 0px;
	}
	#example_filter input {
		border: 1px solid #efefef;
    	border-radius: 10px;
    	height: 25px; 
	}

	.btn-default {
		border-radius: 12px;
		font-weight: 900;
	}
	.btn-primary {
            background-color: #1f8857; border: 0px; border-radius: 12px;
            transition-property: all; 
            transition-duration: .2s; 
            box-shadow: 0px 2px 5px 0px #b5b5b5;
            padding: 5px 35px;
            font-weight: 900;
            font-size: 17px;
          }
          .btn-primary:hover, .btn-primary:active, .btn-primary:focus{  
            box-shadow: 0px 2px 4px 1px #c5c5c5;
            background-color: #43ca8b!important;
            transition-property: all; 
            transition-duration: .2s; 
          }
          .label-sucess {
            background-color: #39b67c; 
          }
</style>


 <script type="text/javascript">

  $(document).ready( function() {
      setInterval(notifications, 2000);

      let cant_n = 0; 
      let cant_sales = 0; 
      function notifications() {
        $.ajax({
          'url' : "{{asset('notifications')}}", 
          'method' : 'get', 
          'success' : function( resp ) {
            resp = JSON.parse(resp); 
            $('#cantNewNotify').html(resp.clients.cant_panel); 
            if( resp.clients.cant_panel > 0 ) {
                  $('#cantNewNotify').css('opacity', '1'); 
            }
            $('#cantSalesNotify').html(resp.sales.cant_panel); 
            if( resp.sales.cant_panel > 0 ) {
                  $('#cantSalesNotify').css('opacity', '1');   
            }

            console.log( resp.clients ); 
            if( resp.clients.cant > 0 && cant_n == 0 ) {
              notification( resp.clients.name, "Se ha registado un nuevo cliente", resp.clients.location ); 
              cant_n++;  
            }
            console.log( resp.sales );  
            console.log( resp.sales.cant );
            if( resp.sales.cant > 0 && cant_sales == 0 ) {
              notification( resp.sales.name, "Se ha registado una nueva venta", resp.sales.location); 
              cant_sales++;  
            }
          }
        }); 
      }
 
  }); 

  function notification(n_body, n_header, n_location) {
          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          // Let's check if the user is okay to get some notification
          else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(n_header, {
                icon: 'https://begima.com.mx/public/media/Blanco_Logotipo_horizontal y vertical-02.png',
                body: n_body,
          }); 
            notification.onclick = function() {
             window.open(n_location);
            };
          }

          // Otherwise, we need to ask the user for permission
          // Note, Chrome does not implement the permission static property
          // So we have to check for NOT 'denied' instead of 'default'
          else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {

              // Whatever the user answers, we make sure we store the information
              if(!('permission' in Notification)) {
                Notification.permission = permission;
              }
 
              // If the user is okay, let's create a notification
              if (permission === "granted") {
                const notification = new Notification("Hi there!");
              }
            });
          } else {
            alert(`Permission is ${Notification.permission}`);
          }
        }


  const notificationTexts = [
  "Hey Jussi! If you're recording your screen, I just wanted to tell that...",
  "Congratulations, you've found the meaning of life, which by the way is being present.",
  "You looked super today! Where's that smile from?",
  "COME HOME ALREADY! -MOM",
  "How are you doing? Dismiss this message to tell me that you've seen it.",
  "Dude, I've never slided so smoothly into anything before! Well, that sounded a bit weird to be honest.",
  "Did you know that LASER is an abbreviation for Light Amplification by the Stimulated Emission of Radiation?"
];

const addButton = document.querySelector(".add");
const notificationPosition = document.body.querySelector("div");
const margin = 16;

const addNotification = ( mge, title ) => {
  // Create notification
  
  const notification = document.createElement("div");
  // Add class "notification"
  notification.classList.add("notification");
  // Pick random content for notification
  const randomMessage = mge; 
  // Insert random content and close button
  notification.innerHTML = `
                    <div class="content">
            <h4 class="title">${title}</h4>
            <p class="description">${randomMessage}</p>
          </div>
          <button class="close-not" aria-label="Dismiss notification">ok</button>
        `;
  // Get close button within notification
  const closeButton = notification.querySelector(".close-not");
  // Listen for the button and attach "removeNotification" function to it
  closeButton.addEventListener("click", removeNotification);
  // Position notification
  notification.style.bottom = `${margin}px`;
  // Add notification on the page
  notificationPosition.prepend(notification);
  // Move other notifications down
  // 1. Get height of the newly added notification
  const currentHeight = notification.offsetHeight;
  // 2. Get the rest of the notifications and turn them into an array
  const restNotifications = Array.from(
    document.querySelectorAll(".notification")
  ).slice(1);
  // 3. Add the currently added notification's height to the rest of the notifications
  restNotifications.forEach((item) => {
    item.style.bottom = `${parseInt(item.style.bottom) + currentHeight + margin}px`;
  });  
};

const removeNotification = (event) => {
  // Get clicked close button
  const closeButton = event.currentTarget;
  // Get the notification
  const notification = closeButton.parentNode;
  // Get the height of the clicked notification
  const currentHeight = notification.offsetHeight;
  // Define rest of the notifications
  let restNotifications = [];
  let next = notification.nextElementSibling;
  // Loop always the next notification until none is found
  while (next) {
    // If the next element doesn't have 'notification' class, break the while loop
    if (!next.matches(".notification")) {
      break;
    }
    // Add the notification to the array
    restNotifications.push(next);
    // Set the next to be the next element
    next = next.nextElementSibling;
  }
  // Se the new height for each of the notifications below the removed one
  restNotifications.forEach((item) => {
    item.style.bottom = `${parseInt(item.style.bottom) - currentHeight - margin}px`;
  });
  // Animate removed notification
  notification.classList.add("animate-out");
  // Remove notification once animation has ended
  notification.addEventListener("animationend", () => {
    notification.parentNode.removeChild(notification);
  });
};

</script>


	<div class="container-fluid" style="padding-left: 0px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 container-side" style="padding: 0px!important; width: 190px; overflow-y: auto;">
			<div>  
				<div style="text-align: center; padding-top: 0px!important;">
          <img style="width: 100%;" src="{{asset('media/FullColor_Logotipo_horizontal y vertical-02-padd.png')}}">
				</div>
				<ul class="menu-options">
					<li class="col-lg-12 selected-admin-pedidos">
						<a href="{{asset('pedidos')}}"> 
							<div class="col-lg-6 option-side-conteainer opt-order">
								
							</div>  
							<div class="col-lg-6 txt-option">
								<span>Pedidos</span>
							</div>
						</a> 
					</li> 
					<li class="col-lg-12 selected-admin-home">
						<a href="admin"> 
							<div class="col-lg-6 option-side-conteainer opt-dashboard">
							</div>
							<div class="col-lg-6 txt-option">
								<span>Dashboard</span>
							</div>
						</a>
					</li> 
					<li class="col-lg-12 selected-admin-productos  selected-admin-editproduct"> 
						<a href="{{asset('productos2')}}?filter=all&imgs=1&last=1">
							<div class="col-lg-6 option-side-conteainer opt-contactos">
								
							</div>
							<div class="col-lg-6 txt-option">
								<span>Productos</span>
							</div>
						</a> 
					</li>
					<!-- 
					<li class="col-lg-12">
						<a href="admin"> 
							<div class="col-lg-6 option-side-conteainer opt-unidades">
								
							</div>
							<div class="col-lg-6 txt-option">
								<span>Promociones</span>
							</div> 
						</a>
					</li> --> 
          <!-- 
						<li class="col-lg-12 selected-admin-cupones  selected-admin-editcoupon">
							<a href="{{asset('cupones')}}">
								<div class="col-lg-6 option-side-conteainer opt-directorio">
									
								</div>
								<div class="col-lg-6 txt-option">
									<span>Cupones</span> 
								</div> 
							</a> 
						</li>  
          --> 
						<li class="col-lg-12 selected-admin-categorias">
							<a href="{{asset('categorias')}}">
								<div class="col-lg-6 option-side-conteainer opt-usuarios">
									
								</div>
								<div class="col-lg-6 txt-option">
									<span>Catlálogos</span> 
								</div>
							</a>
						</li> 

            <style type="text/css">
              .notify { background-color: black; color: white; display: inline-block; opacity: 0;  
                        height: 20px; width: auto; padding: 3px 8px; border-radius: 12px; }
            </style> 

						<li class="col-lg-12 selected-admin-clientes selected-admin-cliente">
							<a href="{{asset('clientes')}}">
								<div class="col-lg-6 option-side-conteainer opt-clients">
									
								</div>
								<div class="col-lg-6 txt-option"> 
									<span>Clientes</span>
								</div>
							</a>
						</li> 

            <li class="col-lg-12">
              <a href="{{asset('comments-admin')}}">
                <div class="col-lg-6 option-side-conteainer opt-usuarios">
                  
                </div>
                <div class="col-lg-6 txt-option"> 
                  <span>Encuestas</span>
                </div>
              </a>
            </li> 

            <li class="col-lg-12">
              <a href="{{asset('boletin-admin')}}">
                <div class="col-lg-6 option-side-conteainer opt-news">
                  
                </div>
                <div class="col-lg-6 txt-option"> 
                  <span>Boletín</span>
                </div>
              </a>
            </li> 

            <li class="col-lg-12">
              <a href="{{asset('pay-methods')}}">
                <div class="col-lg-6 option-side-conteainer opt-pays">
                  
                </div>
                <div class="col-lg-6 txt-option"> 
                  <span>Pagos</span>
                </div>
              </a>
            </li> 

						<li class="col-lg-12 selected-admin-grupos">
							<a href="{{asset('grupos')}}">
								<div class="col-lg-6 option-side-conteainer opt-groups">
									
								</div>
								<div class="col-lg-6 txt-option">
									<span>Grupos</span>
								</div>
							</a> 
						</li>

            <!-- 
						<li class="col-lg-12 selected-admin-pageconfig">
							<a href="{{asset('configHome')}}">
								<div class="col-lg-6 option-side-conteainer opt-usuarios">
									 
								</div> 
								<div class="col-lg-6 txt-option">
									<span>Home</span>
								</div>
							</a>
						</li> --> 
          <!-- 
            <li class="col-lg-12">
              <a href="{{asset('paginas')}}">
                <div class="col-lg-6 option-side-conteainer opt-usuarios">
                  
                </div>
                <div class="col-lg-6 txt-option">
                  <span>Páginas</span>
                </div>
              </a>
            </li>
          --> 

            <li class="col-lg-12">
              <a href="{{asset('home')}}">
                <div class="col-lg-6 option-side-conteainer opt-shipping">
                  
                </div>
                <div class="col-lg-6 txt-option">
                  <span>Envíos</span>
                </div>
              </a>
            </li>
            <!-- 
            <li class="col-lg-12">
              <a href="{{asset('envios')}}">
                <div class="col-lg-6 option-side-conteainer opt-usuarios">
                  
                </div>
                <div class="col-lg-6 txt-option">
                  <span>Envíos</span>
                </div>
              </a>
            </li> --> 

		<!-- 
            <li class="col-lg-12" style="background-color: #60d192;">
              <a href="{{asset('configHome')}}">
                
                <div class="col-lg-12 txt-option" style="background-image: url('https://www.skydropx.com/assets/landing5/skydropx_logo-4fb27c0601c3bccddd15cad09e612eb0d777dcdbcebae56c0382a8fe2978dfa9.svg'); background-repeat: no-repeat; background-position: center; height: 45px;">
                  <span> </span>
                </div>
              </a> 
            </li>

            <li class="col-lg-12" style="background-color: #4b4a4c;">
              <a href="{{asset('configHome')}}">
                  
                <div class="col-lg-12 txt-option" style="background-image: url('https://www.openpay.mx/wp-content/uploads/2020/10/logo-OP-BNa-2048x933.png'); background-repeat: no-repeat; background-position: center; height: 45px; background-size: contain;">
                  <span></span>
                </div>
              </a>
            </li>

            <li class="col-lg-12" style="background-color: #4b4a4c;">
              <a href="{{asset('mercadopago')}}">
                <div class="col-lg-12 txt-option" style="background-image: url('{{asset("/media/mercadopago.svg")}}'); background-repeat: no-repeat; background-position: center; height: 45px; background-size: contain;">
                  <span></span>
                </div>
              </a>
            </li> --> 
					<li class="col-lg-12" style="text-align: center; text-align: center; bottom: 10px; left: 0px; color: white!important; margin-top: 25px; height: 40px; padding-top: 10px;">
						<a href="{{asset('outAdmin')}}" style="color: white; font-size: 15px;"> <img style="width: 20px;" src="{{asset('media/icons/poder.svg')}}"> Salir</a>  
					</li> 
				</ul>
				
			</div> 
		</div>

		<style type="text/css">
			.container-avatar {
				display: inline-block; 
				margin-top: 3px; 
			}
			.avatar-content {
				border: 1px solid #eaeaea;;
				height: 45px;  
				width: 45px; 
				background-color: gray; 
				border-radius: 50%; 
				background-image: url({{asset('media/avatars/avatar-1.jpg')}}); 
				background-size: cover;
			}
			.content-submenu ul li {
				display: inline-block; 
				margin-top: 3px; 
			}
			.content-submenu .option-submenu {
				margin-top: 3px; 
				width: 150px; 
			    display: table;
				height: 45px;  
				text-align: left;
				padding-top: 10px; 
			}
		</style>  
  		 
  		<div style="position: fixed; width:  100%; z-index: 9; height: 50px; border-bottom: 1px solid #eaeaea; text-align: right; padding-right: 20px; ">  
  			<div class="top-submenu">
  				<div class="content-submenu">
  					<ul> 
  						@yield('content-submenu')
  						 <li>
					        <div class="option-submenu" style="text-align: right;">
					            <p style="font-weight: bolder; font-size: 16px;">Hola, Julia</p> 
					        </div>
					    </li>
  						<li> 
	  							<div class="container-avatar">
					  				<div class="avatar-content">
					  					
					  				</div>
					  			</div>
  						</li>
  					</ul>
  				</div>
  			</div>
  			
  		</div> 

  		<div>
			@yield('content-right')   
  		</div>
 
 
  		<div class="sub-info hidden-sub">
  			<div class="header-info col-lg-12">
  				<div class="col-lg-2"> 
  					<span id="closeSubContent" class="hover" style="font-size: 50px;">×</span>
  				</div> 
  				<div class="col-lg-10"> 
  					<h2>Banners (slider principal)</h2>
  				</div>
  			</div> 
  			<div class="col-lg-12">  
  				@if( isset($slider) )
  				<table class="table table-bordered table-condensed">
  					<thead>
  						<tr>
  							<th style="width: 25px;">BANNER</th>
  							<th style="width: 10px;">ESTATUS</th>
  							<th style="width: 20px;">ORDEN</th>
							<th>LINK</th> 
							<th style="width: 40px;">DESDE</th>
							<th style="width: 40px;">HASTA</th>
							<th style="width: 25px;">SIEMPRE</th>
							<th style="width: 25px;">BORRAR</th>
  						</tr> 
  					</thead> 
	  				<tbody class="slider-main">
	  					 @foreach( $slider as $item )
			            	<tr class="slider-{{$item->id}}" id="{{$item->id}}">
			            		<td field="img" content="{{$item->url}}">
			            			<img class="prev-img" src="{{$item->url}}"/>
			            		</td> 
			            		<td field="status" content="{{$item->status}}"> 
			            			@if( $item->status == 1 )
			            				<input type="checkbox"  checked="checked">
			            			@else 
			            				<input type="checkbox">
			            			@endif
			            			</input>
			            		</td> 
			            		<td field="orders" content="{{$item->orders}}">
			            			<input class="form-control input-sm" value="{{$item->orders}}"></input>
			            		</td> 
			            		<td field="href" content="{{$item->href}}">
			            			<input class="form-control input-sm" value="{{$item->href}}"></input>
			            		</td>  
			            		<td field="desde" content="{{$item->desdee}}">
			            			<input value="{{$item->desdee}}" class="form-control input-sm desde-{{$item->id}}" type="datetime-local" name="">
			            		</td>  
			            		<td field="hasta" content="{{$item->hastaa}}">
			            			<input value="{{$item->hastaa}}" class="form-control input-sm desde-{{$item->id}}" type="datetime-local" name="">
			            		</td>  
			            		<td field="olways" content="1">
			            			<button class="btn" onclick="restartSliderDate('{{$item->id}}')">OK</button>
			            		</td> 
			            		<td field="not" content="not">
			            			<button class="btn" onclick="deleteSliderItem('{{$item->id}}')">Borrar</button>
			            		</td> 
			            	</tr>
			            @endforeach 
	  				</tbody>
  				</table> 
  				@endif  
  				<button class="btn btn-primary" id="updateSlider">Guardar</button>
  			</div> 
  		</div>


  		<div class="sub-info-2 hidden-sub">
  			<div class="header-info col-lg-12">
  				<div class="col-lg-2"> 
  					<span id="closeSubContent-2" class="hover" style="font-size: 50px;">×</span>
  				</div> 
  				<div class="col-lg-10"> 
  					<h2>Banners (slider principal) <img style="width: 40px;" src="{{asset('media/cell-phone.svg')}}"> </h2>
  				</div>
  			</div> 
  			<div class="col-lg-12">  
  				@if( isset($slider) )
  				<table class="table table-bordered table-condensed">
  					<thead>
  						<tr>
  							<th style="width: 25px;">BANNER</th>
  							<th style="width: 10px;">ESTATUS</th>
  							<th style="width: 20px;">ORDEN</th>
							<th>LINK</th> 
							<th style="width: 40px;">DESDE</th>
							<th style="width: 40px;">HASTA</th>
							<th style="width: 25px;">SIEMPRE</th>
							<th style="width: 25px;">BORRAR</th>
  						</tr> 
  					</thead> 
	  				<tbody class="slider-main-2">
	  					 @foreach( $slider_2 as $item )
			            	<tr class="slider-{{$item->id}}" id="{{$item->id}}">
			            		<td field="img" content="{{$item->url}}">
			            			<img class="prev-img" src="{{$item->url}}"/>
			            		</td> 
			            		<td field="status" content="{{$item->status}}"> 
			            			@if( $item->status == 1 )
			            				<input type="checkbox"  checked="checked">
			            			@else 
			            				<input type="checkbox">
			            			@endif
			            			</input>
			            		</td> 
			            		<td field="orders" content="{{$item->orders}}">
			            			<input class="form-control input-sm" value="{{$item->orders}}"></input>
			            		</td> 
			            		<td field="href" content="{{$item->href}}">
			            			<input class="form-control input-sm" value="{{$item->href}}"></input>
			            		</td>  
			            		<td field="desde" content="{{$item->desdee}}">
			            			<input value="{{$item->desdee}}" class="form-control input-sm desde-{{$item->id}}" type="datetime-local" name="">
			            		</td>  
			            		<td field="hasta" content="{{$item->hastaa}}">
			            			<input value="{{$item->hastaa}}" class="form-control input-sm desde-{{$item->id}}" type="datetime-local" name="">
			            		</td>  
			            		<td field="olways" content="1">
			            			<button class="btn" onclick="restartSliderDate('{{$item->id}}')">OK</button>
			            		</td> 
			            		<td field="not" content="not">
			            			<button class="btn" onclick="deleteSliderItem('{{$item->id}}')">Borrar</button>
			            		</td> 
			            	</tr>
			            @endforeach 
	  				</tbody>
  				</table> 
  				@endif  
  				<button class="btn btn-primary" id="updateSlider2">Guardar</button>
  			</div> 
  		</div>
 

	</div>

 

<style type="text/css">
	.prev-img { width: 120px; }
	.hover:hover { cursor: pointer; color: green; }
	.sub-info { 
		display: inline-block;
		right: 0vw; 
		transition-property: all;
		transition-duration: .5s;
		height: 100vh;
		width: 80vw; 
		position: fixed;
		background-color: white;
		border-left: 2px solid gray;
		z-index: 99999;
	}
	.sub-info-2 { 
		display: inline-block;
		right: 0vw; 
		transition-property: all;
		transition-duration: .5s;
		height: 100vh;
		width: 80vw; 
		position: fixed;
		background-color: white;
		border-left: 2px solid gray;
		z-index: 99999;
	} 
	.hidden-sub { 
		position: fixed;
		transition-property: all;
		transition-duration: .5s; 
		right: -100vw; 
	}
</style>
<style type="text/css">
	.name-attr-car {
		font-size: 18px;
		font-weight: 900;  
	}
	.val-attr-car {
		font-size: 14px;
		font-weight: 300;
	}
</style>



<style type="text/css">
	@-webkit-keyframes fstAnimationEnter{from{opacity:0;-webkit-transform:translate3d(0, -1em, 0)}to{opacity:1;-webkit-transform:translate3d(0, 0, 0)}}@-moz-keyframes fstAnimationEnter{from{opacity:0;-moz-transform:translate3d(0, -1em, 0)}to{opacity:1;-moz-transform:translate3d(0, 0, 0)}}@keyframes fstAnimationEnter{from{opacity:0;-webkit-transform:translate3d(0, -1em, 0);-moz-transform:translate3d(0, -1em, 0);-ms-transform:translate3d(0, -1em, 0);-o-transform:translate3d(0, -1em, 0);transform:translate3d(0, -1em, 0)}to{opacity:1;-webkit-transform:translate3d(0, 0, 0);-moz-transform:translate3d(0, 0, 0);-ms-transform:translate3d(0, 0, 0);-o-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}.fstElement{display:inline-block;position:relative;border:1px solid #D7D7D7;box-sizing:border-box;color:#232323;font-size:10px;background-color:#fff}.fstElement>select,.fstElement>input{position:absolute;left:-999em}.fstToggleBtn{font-size:10px;display:block;position:relative;box-sizing:border-box;padding:.71429em 1.42857em .71429em .71429em;min-width:14.28571em;cursor:pointer}.fstToggleBtn:after{position:absolute;content:"";right:.71429em;top:50%;margin-top:-.17857em;border:.35714em solid transparent;border-top-color:#cacaca}.fstQueryInput{-webkit-appearance:none;-moz-appearance:none;-ms-appearance:none;-o-appearance:none;appearance:none;outline:none;box-sizing:border-box;background:transparent;border:0}.fstResults{position:absolute;left:-1px;top:100%;right:-1px;max-height:30em;overflow-x:hidden;overflow-y:auto;-webkit-overflow-scrolling:touch;border:1px solid #D7D7D7;border-top:0;background-color:#FFF;display:none}.fstResultItem{font-size:10px;display:block;padding:.5em .71429em;margin:0;cursor:pointer;border-top:1px solid #fff}.fstResultItem.fstUserOption{color:#707070}.fstResultItem.fstFocused{color:#fff;background-color:#43A2F3;border-color:#73baf6}.fstResultItem.fstSelected{color:#fff;background-color:#2694f1;border-color:#73baf6}.fstGroupTitle{font-size:10px;display:block;padding:.5em .71429em;margin:0;font-weight:bold}.fstGroup{padding-top:1em}.fstGroup:first-child{padding-top:0}.fstNoResults{font-size:10px;display:block;padding:.71429em .71429em;margin:0;color:#999}.fstSingleMode .fstControls{position:absolute;left:-1px;right:-1px;top:100%;padding:0.5em;border:1px solid #D7D7D7;background-color:#fff;display:none}.fstSingleMode .fstQueryInput{font-size:10px;display:block;width:100%;padding:.5em .35714em;color:#999;border:1px solid #D7D7D7}.fstSingleMode.fstActive{z-index:100}.fstSingleMode.fstActive.fstElement,.fstSingleMode.fstActive .fstControls,.fstSingleMode.fstActive .fstResults{box-shadow:0 0.2em 0.2em rgba(0,0,0,0.1)}.fstSingleMode.fstActive .fstControls{display:block}.fstSingleMode.fstActive .fstResults{display:block;z-index:10;margin-top:-1px}.fstChoiceItem{display:inline-block;font-size:10px;position:relative;margin:0 .41667em .41667em 0;padding:.33333em .33333em .33333em 1.5em;float:left;border-radius:.25em;border:1px solid #43A2F3;cursor:auto;color:#fff;background-color:#43A2F3;-webkit-animation:fstAnimationEnter 0.2s;-moz-animation:fstAnimationEnter 0.2s;animation:fstAnimationEnter 0.2s}.fstChoiceItem.mod1{background-color:#F9F9F9;border:1px solid #D7D7D7;color:#232323}.fstChoiceItem.mod1>.fstChoiceRemove{color:#a4a4a4}.fstChoiceRemove{margin:0;padding:0;border:0;cursor:pointer;background:none;font-size:1.16667em;position:absolute;left:0;top:50%;width:1.28571em;line-height:1.28571em;margin-top:-.64286em;text-align:center;color:#fff}.fstChoiceRemove::-moz-focus-inner{padding:0;border:0}.fstMultipleMode .fstControls{box-sizing:border-box;padding:0.5em 0.5em 0em 0.5em;overflow:hidden;width:20em;cursor:text}.fstMultipleMode .fstQueryInput{font-size:10px;float:left;padding:.28571em 0;margin:0 0 .35714em 0;width:2em;color:#999}.fstMultipleMode .fstQueryInputExpanded{float:none;width:100%;padding:.28571em .35714em}.fstMultipleMode .fstFakeInput{font-size:10px;}.fstMultipleMode.fstActive,.fstMultipleMode.fstActive .fstResults{box-shadow:0 0.2em 0.2em rgba(0,0,0,0.1)}.fstMultipleMode.fstActive .fstResults{display:block;z-index:10;border-top:1px solid #D7D7D7}
</style>

</body>
</html>