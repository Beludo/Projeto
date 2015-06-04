<?php
include_once "sessaoAtiva.php";

?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Graficos de temperatura</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
		 folder instead of downloading all of them to reduce the load. -->
	<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
  </head>
  <body class="skin-blue">
	<div class="wrapper">
	  
	<?php
		include("cabecalho-admin.php");
		include("lateral-admin.php");
	?>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Registo climatico
			<small>Temperatura e humidade</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Graficos por hora</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
				  <!-- general form elements -->
				  <div class="box box-primary">
					<div class="box-header">
					  <h3 class="box-title">Gráficos por hora</h3>
					</div><!-- /.box-header -->
						<div class="box-body">
							<div class="">
								<button onclick="pedeDadosGraficos();" class="btn btn-primary">Atualizar gráficos</button>
							</div>
							<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['line', 'corechart']}]}"></script>
							<div id="despejar-graficos-aqui"></div>
						</div>
				  </div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  
	  <?php
		include("rodape-admin.php");
	  ?>
	</div><!-- ./wrapper -->

	<!-- jQuery 2.1.3 -->
	<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
	<!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	
	<!-- FastClick -->
	<script src='plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js" type="text/javascript"></script>
	<!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
	
	<!-- FLOT CHARTS -->
    <script src="../../plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../../plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../../plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="../../plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
	
	<!-- Script do seletor de data/hora -->	
    <script type="text/javascript">
	
	// Objeto
	var dados_sensor = {
		constructor: function c(temperatura, humidade, hora, endereco){
			this._temperatura = temperatura;
			this._humidade = humidade;
			this._hora = hora;
			this._endereco = endereco;
		},
		getTemperatura: function() {
			return this._temperatura;
		},
		
		getHumidade: function() {
			return this._humidade;
		},
		getHora: function(){
			return this._hora;
		},
		
		getEndereco: function() {
			return this._endereco;
		},
	};
	var tabela_dados_sensor = new Array();
	
	
	// Guarda os dados do grafico
	var dados_grafico;
	
	// Indica quantos dados existem por sensor
	var tabela_enderecos_sensor = new Array();
	var tabela_contagem_sensor = new Array();
	
	// Declarar o objeto getHTTPObject
	var http = getHTTPObject();

	// Tentar obter um objeto ActiveXObject
	function getHTTPObject() { 
		http_request = false;
		if (window.XMLHttpRequest) { // Mozilla, Safari,...
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType) {
				http_request.overrideMimeType('text/xml');
			}
		} else if (window.ActiveXObject) { // IE
			try {
				http_request = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!http_request) {
			alert('Erro ao criar uma instância XMLHTTP');
			return false;
		} else{
		return http_request;
	  }	
	}
	
	// Obtem os dados dos gráficos
	function pedeDadosGraficos() {
		if (http) {
			//var datasLidas = document.getElementById("reservationtime").value
			var datasLidas = "04-06-2015";
			var url = "ajax-graficos.php?dia="; 
			
			// O mesmo que ajax-graficos?datas=06/01/2015 12:00 AM*06/03/2015 12:00 AM
			http.open("GET", url + escape(datasLidas), true); 

			// Chamar a função que mostra a resposta na página
			http.onreadystatechange = atualizaGraficos;
			http.send(null);
		}
	}
	
	// Trata a resposta do pedido via GET com resposta em XML
	function atualizaGraficos() {
		if (http.readyState == 4){
			if (http.responseText.indexOf('invalid') == -1){
				var xmlDocument = http.responseXML;
				
				// Limpar os dados anteriores
				tabela_dados_sensor = [];
				
				// Obtem os dados retornados pelo XML
				sensor = xmlDocument.getElementsByTagName("sensor");
				temp = xmlDocument.getElementsByTagName("temperatura");
				humi = xmlDocument.getElementsByTagName("humidade");
				hora = xmlDocument.getElementsByTagName("hora");
				for (i=0; i<temp.length; i++) {
				
					// Obter o endereco do sensor referente aos dados lidos (<sensor id="002542E700E9E511">)
					atributos = sensor[i].attributes;
					
					// Guardar os valores
					var novos_dados_sensor = Object.create(dados_sensor);
					novos_dados_sensor.constructor(
						temp[i].childNodes[0].nodeValue,
						humi[i].childNodes[0].nodeValue,
						hora[i].childNodes[0].nodeValue,
						atributos.getNamedItem("endereco").nodeValue
					);
					tabela_dados_sensor.push(novos_dados_sensor);
				}
				
				// Guardar a contagem de sensores
				tabela_enderecos_sensor = new Array();
				tabela_contagem_sensor = new Array();
				cont = xmlDocument.getElementsByTagName("contagem");
				for (i=0; i<cont.length; i++) {
					atributos = cont[i].attributes;
					tabela_enderecos_sensor.push(atributos.getNamedItem("endereco").nodeValue);
					tabela_contagem_sensor.push(cont[i].childNodes[0].nodeValue);
				}
				
				// Atualizar e mostrar os gráficos
				console.log("A atualizar o grafico");
				drawChart();
				
			}
		}
	}
			
	//funcao do grafico
	google.load('visualization', '1.1', {packages: ['line', 'corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
	
		// Esta div vai receber os gráficos gerados
		var div_despejar = document.getElementById('despejar-graficos-aqui');
		
		// Apagar os gráficos existentes
		div_despejar.innerHTML = "";
	
		for (i=0; i<tabela_enderecos_sensor.length; i++) {
	   
	    var materialChart;
 
        var dados_grafico = new google.visualization.DataTable();
        dados_grafico.addColumn('date', 'Horas', 'day');
	    dados_grafico.addColumn('number', "Humidade");
		dados_grafico.addColumn('number', "Temperatura");

	  //[new Date(year, month, day, hours, minutes, seconds, milliseconds),  temperatura,  humidade]
	  /*
      data.addRows([
        [new Date(2015, 5, 2, 10, 30),  -.5,  5.7],
				[new Date(2015, 5, 2, 10, 45),  8, 6.7],
				[new Date(2015, 5, 2, 11, 00),  15,  7.7],
				[new Date(2015, 5, 2, 11, 30),  6,  15],
				 [new Date(2015, 5, 2, 12, 30),  20,  10]  
      ]);
	  */

	  // Variavel de separação da hora
	  var separa_hora = [];
	  
	  // Atualizar os dados do gráfico
	  todos_dados = new Array();
	  for (j=0; j<tabela_dados_sensor.length; j++) {
	  
		// Adicionar apenas os pontos pertencentes ao respetivo sensor
		if(tabela_dados_sensor[j].getEndereco() == tabela_enderecos_sensor[i]) {
			// Separar a hora em arrays para criar um objeto Date
			separa_hora = tabela_dados_sensor[j].getHora().split(":");
			
			// O mês começa em zero (0 = Janeiro)
			todos_dados.push([
				new Date(
					2015,
					06,
					01,
					separa_hora[0],
					separa_hora[1],
					separa_hora[2]
				),
				parseInt(tabela_dados_sensor[j].getHumidade()),
				parseInt(tabela_dados_sensor[j].getTemperatura())
			]);
		}
	  }
	  dados_grafico.addRows(todos_dados);
	  
	  
      var materialOptions = {
        chart: {
		  title: 'Sensor ' + (i+1) + '   (endereço ' + tabela_enderecos_sensor[i] +')',
        },
        width: 900,
        height: 500,
        series: {
          // Gives each series an axis name that matches the Y-axis below.
          0: {axis: 'Temps'},
          1: {axis: 'Daylight'}
        },
        axes: {
          // Adds labels to each axis; they don't have to match the axis names.
          y: {
            Temps: {label: 'Temperatura (ºC)'},
            Daylight: {label: 'Humidade (%)'}
          }
        }
      };
			
      // Criar e adicionar uma div para desenhar o gráfico
	  var nova_div = document.createElement('div');
	  nova_div.setAttribute('id', 'grafico_' + i);
	  nova_div.innerHTML = 'iupiii sou uma div nova!';
	  div_despejar.appendChild(nova_div);
	
	  // Desenhar o grafico na nova div
	  materialChart = new google.charts.Line(nova_div);
	  materialChart.draw(dados_grafico, materialOptions);

      }
	}
			
			//funcao para adicionar data/hora -->
			
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
		
		<!-- Script do seletor de data -->
		$("#example1").dataTable();
		$('#example2').dataTable({
		  "bPaginate": true,
		  "bLengthChange": false,
		  "bFilter": false,
		  "bSort": true,
		  "bInfo": true,
		  "bAutoWidth": false
		});
		
      });
	  
	  function labelFormatter(label, series) {
        return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
      }
	  
    </script>	
  </body>
</html>
