<?php
	include "sessaoAtiva.php";
	include "admin/acessobd.php";
	
	$bd = new BaseDados();
	$info_geral = $bd->query("SELECT CONF_NOME, CONF_MORADA, CONF_GMAPS, CONF_EMAIL, CONF_TELEFONE FROM conf_gerais LIMIT 1");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="informacoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->
	
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li><a href="contatos.php">Informações</a>
			</li>
			<li class="active">Contatos</li>
		</ol>

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="contatos.php" class="active list-group-item">Contatos</a>
				<a href="horario.php" class="list-group-item">Horário de Funcionamento</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="parcerias.php" class="list-group-item">Parcerias</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%; min-height: 205px;">

			<!-- Content Row -->
			<div class="row">
				<!-- Map Column -->
				<div class="col-md-8">
					<!-- Codigo do Google Maps -->
					<?php echo $info_geral[0]["CONF_GMAPS"]; ?>
				</div>
				<!-- Contact Details Column -->
				<div class="col-md-4">
					<h3>Contatos</h3>
					<hr>
					<p>
						<i class="fa fa-envelope-o"></i> <?php echo $info_geral[0]["CONF_EMAIL"]; ?>
						<br>
					</p>
					<p><i class="fa fa-phone"></i> Telefone: <?php echo $info_geral[0]["CONF_TELEFONE"]; ?></p>
					<p><i class="fa fa-envelope-o"></i> Email: <a href="mailto:geral@esgouveia.pt"><?php echo $info_geral[0]["CONF_EMAIL"]; ?></a>
					</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->


</body>

</html>