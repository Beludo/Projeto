<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Gerir visita virtual</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- DATA TABLES -->
	<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
		 folder instead of downloading all of them to reduce the load. -->
	<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
			Gerir visita virtual
			<small>descrição</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active"><a href="#">Gerir visita virtual</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">Coiso</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div id="imagem-museu" onclick="obter_posicao(event)" style = "background-image:url('img-museu/01.jpg'); width:800px; height:534px;">
					</div>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
			  
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">Coordenadas do ponto</h3>
				</div><!-- /.box-header -->
				<div class="box-body" id="mostra-coordenadas">
					
				</div><!-- /.box-body -->
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
	<!-- DATA TABES SCRIPT -->
	<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- FastClick -->
	<script src='plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js" type="text/javascript"></script>
	
	<!-- Detectar a posição do click na imagem do museu -->
	
	<script language="JavaScript">
	var coordenadas_x = new Array();
	var coordenadas_y = new Array();
	
	function obter_posicao(event) {
		var html = '<svg width="800" height="534"><polygon points="';
		
		// Obter as coorenadas do click do rato
		pos_x = event.offsetX?(event.offsetX):event.pageX-document.getElementById("imagem-museu").offsetLeft;
		pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("imagem-museu").offsetTop;
		
		document.getElementById("mostra-coordenadas").innerHTML = "X=" + pos_x + " Y=" + pos_y;
		
		// Guardar as coordenadas do novo ponto
		coordenadas_x.push(pos_x-245);
		coordenadas_y.push(pos_y-106);
		
		// Adicionar os pontos ao SVG
		for(var i=0; i<coordenadas_x.length; i++) {
			html += coordenadas_x[i] + ',' + coordenadas_y[i] + ' ';
		}
		
		// Terminar a tag SVG
		html +='" style="fill:lime;stroke:#B2CCFF;stroke-width:1;fill-opacity:0.4" /></svg>';
		
		// Adicionar divs para cada ponto
		for(var i=0; i<coordenadas_x.length; i++) {
			html += '<div style="position:absolute; left:' + coordenadas_x[i] + 'px; top:' + coordenadas_y[i] + '; 	border-style: solid; border-color: #B2CCFF; width:10px; height:10px"></div>';
		}
		
		//  Enviar para a div "imagem-museu"
		document.getElementById("imagem-museu").innerHTML = html;				
	}
	</script>

  </body>
</html>