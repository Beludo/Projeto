<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="informacoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<div class="jumbotron" style="margin:1px; padding-bottom:1px;">
			<img src="./imagens/logotipo-banner.png" alt="logotipo">
		</div>
		<!-- /banner -->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li><a href="contatos.php">Informações</a>
			</li>
			<li class="active">Normas de Conduta</li>
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
				<a href="horario.php" class="list-group-item">Horário de Funcionamento</a>
				<a href="mapasite.php" class="list-group-item">Mapa do Site</a>
				<a href="normas.php" class="active list-group-item">Normas de Conduta</a>
				<a href="ligacoes.php" class="list-group-item">Ligações</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%; min-height: 205px;">
			<h3>Normas de conduta</h3>
			<hr>
			
			<ul>
				<li style="list-style:none;"><b>No interior do Museu de Lanifícios é proibido:</b>
				</li>
				<br>
				<li>Comer ou beber nas áreas de exposição;</li>
				<li>Falar em voz alta;</li>
				<li>Fazer-se acompanhar de objectos volumosos;</li>
				<li>Fotografar ou filmar com flash ou tripé;</li>
				<li>Fumar;</li>
				<li>Introduzir animais de qualquer espécie;</li>
				<li>Tocar nas peças expostas;</li>
				<li>Usar telemóvel.</li>
			</ul>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>