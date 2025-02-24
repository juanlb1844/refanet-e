@extends('Admin.layout')
 
	    	<style type="text/css">
        .grid-stack {
            background: lightgoldenrodyellow;
        }
        .grid-stack-item-content {
            color: #2c3e50;
            text-align: center;
            background-color: #eff3f6; 
            border: 2px solid #e5e5e5;
            box-shadow: 1px 5px 9px 2px #e8edf1;
        }
        .grid-stack-item-content {
			border-radius: 4px; 
			padding-top: 4px; 
			padding-left: 4px; 
		}
		.grid-stack {
			background-color: white;  
			
			padding-top: 20px!important; 
		}
		div {
			transition-property: all!important; 
			transition-duration: .2s; 
		}  
        .grid-stack>.grid-stack-item>.grid-stack-item-content {
            margin: 0;
            position: absolute;
            top: 0;
            left: 10px;
            right: 10px;
            bottom: 0;
            width: auto;
            z-index: 0!important;
            overflow-x: hidden!important;
            overflow-y: hidden!important;
        }
	</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://gridstackjs.com/node_modules/gridstack/dist/gridstack-h5.js"></script>

<link rel="stylesheet" type="text/css" href="{{asset('js/sortable/theme.css')}}">
<script type="text/javascript" src="{{asset('js/sortable/Sortable.min.js')}}"></script>
@section('content-submenu')     
    <li>
        <div class="option-submenu">
            <a href="#">Reportes</a>
        </div>
    </li>
    <li>
        <div class="option-submenu">
             <a href="#">Agregar reporte</a>
        </div>
    </li>
 @endsection

<style type="text/css"></style>
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
	<div class="panel-right">  
			<div class="col-lg-12 table-container" style="padding: 0px;">
		        <div class="row" style="margin-bottom: 00px;">
			        <div class="col-md-6">
			          <h1 class="title-template" style="font-weight: 500">Dashboard</h1>
			        </div>
			        <div class="col-md-6" style="padding-top: 25px;">
			          <button class="btn btn-default btn-sty1 pull-right" id="addWidget" data-bind="click: addNewWidget" style="box-shadow: 1px 2px 6px 1px #e5e5e5; color: #5563f2; border: 1px solid #5563f2; background-color: #e7eaff;">Añadir Indicador</button> 
			        </div>
		        </div>
		        <div data-bind="component: {name: 'dashboard-grid', params: $data}"></div>
			</div>  

 
 

	</div>

      
 
             
</div>

  
<script type="text/javascript">
	window.onload = function() { 
 
 
     var idChart = 0; 
     Chart.defaults.global.defaultFontSize = 10;

        ko.components.register('dashboard-grid', {
            viewModel: {
                createViewModel: function (controller, componentInfo) {
                    var ViewModel = function (controller, componentInfo) {
                        var grid = null;

                        this.widgets = controller.widgets;

                        this.afterAddWidget = function (items) {
                            if (grid == null) {
                                grid = $(componentInfo.element).find('.grid-stack').gridstack({
                                    auto: false
                                }).data('gridstack');
                            }

                            var item = _.find(items, function (i) { return i.nodeType == 1 });
                            grid.addWidget(item);
                            ko.utils.domNodeDisposal.addDisposeCallback(item, function () {
                                grid.removeWidget(item);
                            });
                        };
                    };

                    return new ViewModel(controller, componentInfo);
                }
            }, 
            template:
                [
                    '<div class="grid-stack" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">',
                    '   <div class="grid-stack-item" data-bind="attr: {\'data-gs-x\': $data.x, \'data-gs-y\': $data.y, \'data-gs-width\': $data.width, \'data-gs-height\': $data.height, \'data-gs-auto-position\': $data.auto_position}">',
                    '       <div class="grid-stack-item-content"><button data-bind="click: $root.deleteWidget" class="pull-left btn btn-default" style="font-weight: bold; color: #656565; border: 1px solid #e5e5e5;">&times;</button><canvas id="myChart'+(idChart)+'"></canvas></div>',
                    '   </div>',
                    '</div> '
                ].join('')
        });

        var typeGr = ['', 'line', 'bar', 'horizontalBar']; 

        $(function () {
            var Controller = function (widgets) {
                var self = this;

                this.widgets = ko.observableArray(widgets);

                this.addNewWidget = function () {
                    this.widgets.push({
                        x: 0,
                        y: 0,
                        height: 3,
                        width: 5, 
                        auto_position: true
                    });
                    ///////////////////////////////////////////////////////////////
                        $.ajax({
                                url: '{{asset('dashboardData')}}', 
                                method: 'get', 
                                data: { type : 'cant_status' }, 
                                success: function(response) {
                                  var dataDash = JSON.parse(response); 
                                  console.log(dataDash); 
                                  var dataArray = []; 
                                  var dataArray2 = []; 
                                  for( var i = 0 in dataDash ) {
                                    dataArray.push(dataDash[i].flag_status); 
                                  }
                                  for( var i = 0 in dataDash ) {
                                    dataArray2.push(parseInt(dataDash[i].CANT)); 
                                  }
                                  //console.log(dataArray); 
                                        setTimeout(function() {
                                            xx = jQuery('canvas')[jQuery('canvas').length-1];  
                                            var ctx = xx.getContext('2d');
                                            var charts = new Chart(ctx, {
                                                type: typeGr[ Math.floor((Math.random() * 3) + 1)], 
                                                data: {
                                                    labels: dataArray,
                                                    datasets: [{
                                                        label: "Estados del catálogo",
                                                        /*backgroundColor: 'rgb(255, 99, 132)',*/
                                                        backgroundColor: '#337ab7',
                                                        borderColor: '#e5e5e5',
                                                        data: dataArray2, 
                                                    }],  
                                                }, 
                                                // Configuration options go here
                                                options: {}
                                            });
                                            

                                        }, 100); 
                                  
                                }
                               });


                    ///////////////////////////////////////////////////////////////

                    return false;
                };

                this.deleteWidget = function (item) {
                    self.widgets.remove(item);
                    return false;
                };
            };

            var widgets = [
                {x: 0, y: 0, width: 3, height: 4}/*,
                {x: 4, y: 4, width: 4, height: 4},
                {x: 0, y: 0, width: 4, height: 4},
                {x: 4, y: 4, width: 4, height: 4}*/ 
            ];

            var controller = new Controller(widgets);
            ko.applyBindings(controller);
        });


        $.ajax({
        url: '{{asset('dashboardData')}}', 
        method: 'get', 
        data: { type : 'cant_products'}, 
        success: function(response) {
          var dataDash = JSON.parse(response); 
          console.log(dataDash); 
          var dataArray = []; 
          var dataArray2 = []; 
          var colors = []; 
          for( var i = 0 in dataDash ) {
            dataArray.push(dataDash[i].distributor_name);  
            colors.push( 'rgb('+Math.floor((Math.random() * 70) + 1)+','+Math.floor((Math.random() * 100) + 1)+','+Math.floor((Math.random() * 256) + 1) +')');
          }
          for( var i = 0 in dataDash ) {
            dataArray2.push(parseInt(dataDash[i].CANT)); 
          }
          //console.log(dataArray);
          initGraphs(dataArray, dataArray2, colors); 
        }
       });

            function initGraphs(data, data2, colors) {

                setTimeout(function(){
                var ctx = document.getElementById('myChart0').getContext('2d');
                 chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: data,
                        datasets: [{
                            label: "Proveedores",
                            backgroundColor: colors,
                            borderColor: 'white',
                            data: data2,
                        }]
                    }, 
                    options: {}
                });
            }, 2000);   

                
              setTimeout(function(){
               $('#addWidget').click();
              }, 50); 
    }

 }
var chart = null; 
</script>

<script type="text/javascript">
 
	function showMail( id ) {  
		$('#myModal').modal();  
		$.ajax({ 
			'url' : '', 
			'method' : 'post',    
			'data' : { 'id' : id }, 
			'success' : function( data ) { 
				var data = JSON.parse( data ); 
				$('#agencia_lead').html(data.dealer); 
				$('#nombre_lead').html( data.nombre ); 
				$('#apellidos_lead').html( data.apellido1 ); 
				$('#telefono_lead').html( data.cel ); 
				$('#correo_lead').html( data.correo ); 
				$('#comentarios_lead').html( data.comentarios ); 
				$('#fecha_lead').html( data.fecha ); 
				$('#auto_lead').html( data.auto );
				$('#auto_lead').attr('href', data.auto );  
				console.log( data );  
			} 
		}); 
	} 
  
 
</script>