<?php

include_once "sessaoAtiva.php";
include_once "../GereVisitante.php";
include_once "../Visitantes.php";
include_once "Quota.php";
include_once "GereQuotas.php";

$gere_visitante = new GereVisitante();
$gere_quotas = new GereQuotas();

if(isset($_GET["id"]) && !empty($_GET["id"])){
	
	// Adicionar um ano
	if(isset($_POST["ano"]) && !empty($_POST["ano"])){
		$gere_quotas->adicionarAno($_GET["id"], $_POST["ano"]);
	}
	
	// Apagar um ano
	if(
		isset($_GET["ano"]) && !empty($_GET["ano"]) &&
		isset($_GET["apagar"]) && !empty($_GET["apagar"])
	){
		$gere_quotas->removerAno($_GET["id"], $_GET["ano"]);
	}
	
	// Pagar (ou não) as quotas referentes a um mês/ano
	if(
		isset($_GET["mes"]) && !empty($_GET["mes"]) &&
		isset($_GET["ano"]) && !empty($_GET["ano"]) &&
		isset($_GET["pago"]) && is_numeric($_GET["pago"])
	){
		// Pagar o respetivo mês
		if($_GET["mes"] == 1){
			$gere_quotas->pagarJaneiro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 2){
			$gere_quotas->pagarFevereiro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 3){
			$gere_quotas->pagarMarco($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 4){
			$gere_quotas->pagarAbril($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 5){
			$gere_quotas->pagarMaio($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 6){
			$gere_quotas->pagarJunho($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 7){
			$gere_quotas->pagarJulho($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 8){
			$gere_quotas->pagarAgosto($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 9){
			$gere_quotas->pagarSetembro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 10){
			$gere_quotas->pagarOutubro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 11){
			$gere_quotas->pagarNovembro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
		if($_GET["mes"] == 12){
			$gere_quotas->pagarDezembro($_GET["id"], $_GET["ano"], $_GET["pago"]);
		}
	}
	
	$visitante = $gere_visitante->verDadosVisitante($_GET["id"]);
	$quotas = $gere_quotas->listarQuotasSocio($_GET["id"]);
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
					  <th>Acções</th>
                      <!--<th style="width: 40px">Label</th>-->
                    </tr>
					<?php
						for($i=0; $i<count($quotas); $i++){
					?>
                    <tr>
						<td><?php echo $quotas[$i]->getAno(); ?></td>
						<td>
							<?php
							if($quotas[$i]->getJaneiro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=1' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJaneiro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=1' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJaneiro() .
								'"><span class="label label-danger">Não</span></a>';
							}
							?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getFevereiro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=2' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getFevereiro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=2' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getFevereiro() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getMarco() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=3' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getMarco() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=3' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getMarco() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getAbril() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=4' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getAbril() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=4' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getAbril() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getMaio() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=5' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getMaio() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=5' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getMaio() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getJunho() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=6' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJunho() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=6' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJunho() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getJulho() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=7' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJulho() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=7' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getJulho() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getAgosto() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=8' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getAgosto() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=8' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getAgosto() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getSetembro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=9' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getSetembro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=9' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getSetembro() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getOutubro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=10' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getOutubro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=10' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getOutubro() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getNovembro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=11' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getNovembro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=11' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getNovembro() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td>
						<?php
							if($quotas[$i]->getDezembro() == 1){
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=12' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getDezembro() .
								'"><span class="label label-success">Pago</span></a>';
							}else{
								echo '<a href="gerir-quotas-socio.php?' .
								'id=' . $visitante->getId() .
								'&mes=12' .
								'&ano=' . $quotas[$i]->getAno() .
								'&pago=' . $quotas[$i]->getDezembro() .
								'"><span class="label label-danger">Não</span></a>';
							}
						?>
						</td>
						<td><a class="btn btn-danger btn-xs" href="gerir-quotas-socio.php?id=<?php echo $visitante->getId(); ?>&ano=<?php echo $quotas[$i]->getAno(); ?>&apagar=1"><i class="fa fa-trash-o"> Apagar ano</a></td>
                    </tr>
					<?php
						}
					?>
                  </tbody></table>
                </div><!-- /.box-body -->
				<div class="box-footer clearfix">
					<form role="form" method="post" action="gerir-quotas-socio.php?id=<?php echo $_GET["id"]; ?>">
						<div class="box-body">	
							<div class="form-group">
							  <label>Adicionar ano de pagamento</label>
							  <input type="text" class="form-control" name ="ano" placeholder="Insira o ano"/>
							</div>
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Adicionar</button>
						</div>
					</form>
                </div>
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