<?php
	include "sessaoAtiva.php";
	include "admin/acessobd.php";
	
	$bd = new BaseDados();
	$info_geral = $bd->query("SELECT CONF_NOME, CONF_ABERTURA, CONF_ENCERR, CONF_ATEND_TELEF FROM conf_gerais LIMIT 1");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
	
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
			<li class="active">Horário de Funcionamento</li>
		</ol>

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="contatos.php" class="list-group-item">Contatos</a>
				<a href="horario.php" class="active list-group-item">Horário de Funcionamento</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="parcerias.php" class="list-group-item">Parcerias</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%; min-height: 205px;">

			<h3>Horário de Funcionamento</h3>
			<hr>
			<i class="fa fa-clock-o"></i>
			<ul style="display: inline-block;list-style: none;">
				<li><b>Abertura do Edifício:</b>
				</li>
				<li><b> Encerramento do Edifício:</b>
				</li>
				<li><b>Atendimento telefónico:</b>
				</li>
			</ul>

			<ul style="display: inline-block; list-style: none;">
				<li><?php echo $info_geral[0]["CONF_ABERTURA"]; ?></li>
				<li><?php echo $info_geral[0]["CONF_ENCERR"]; ?></li>
				<li><?php echo $info_geral[0]["CONF_ATEND_TELEF"]; ?></li>
			</ul>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>