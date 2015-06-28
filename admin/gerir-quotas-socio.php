<?php

include_once "sessaoAtiva.php";
include_once "../GereVisitante.php";
include_once "../Visitantes.php";
include_once "Quota.php";
include_once "GereQuotas.php";

$gere_visitante = new GereVisitante();

if(isset($_GET["id"]) && !empty($_GET["id"])){
	$visitante = $gere_visitante->verDadosVisitante($_GET["id"]);
}else{
	header("Location: gerir-quotas.php");
}
?>



<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Gerir quotas do sócio</title>
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

	
	<!-- Estilos para formatar a tabela de visitantes -->
	<style>
		.accoes-tabela{
			width: 100px;
		}
	</style>

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
    include_once "../Visitantes.php";
	  ?>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Gerir quotas de <?php echo $visitante->getNomeCompleto(); ?>
			<small>(<?php echo $visitante->getUsername(); ?>)</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-quotas.php"><i class="fa fa-dashboard"></i> Gestão de quotas</a></li>
			<li class="active"><a href="#">Sócio <?php echo $visitante->getNomeCompleto(); ?></a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pagamento de quotas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 30px">Ano</th>
                      <th>Jan</th>
                      <th>Fev</th>
					  <th>Mar</th>
					  <th>Abr</th>
					  <th>Mai</th>
					  <th>Jun</th>
					  <th>Jul</th>
					  <th>Ago</th>
					  <th>Set</th>
					  <th>Out</th>
					  <th>Nov</th>
					  <th>Dez</th>
                      <!--<th style="width: 40px">Label</th>-->
                    </tr>
                    <tr>
						<td>2015</td>
						<td>
							<?php //if() ?>
						</td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
						<td>5</td>
						<td>6</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
						<td>10</td>
						<td>11</td>
                    </tr>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div>
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
	<!-- page script -->
	<script type="text/javascript">
	  $(function () {
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
	</script>

  </body>
</html>