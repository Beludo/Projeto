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
	<?php $pagina="index" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

	<div>	
	<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li class="active">Página Inicial
			</li>
		</ol>
		</div>


		<!-- Informações Laterais -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">

			<!-- Primeiro Painel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Noticias</h3>
				</div>
				<div class="panel-body">
					Noticia 1
					<br> Noticia 2
					<br> Noticia 3
					<br> Noticia 4
					<br>
				</div>
			</div>

			<!-- Segundo Painel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Outras Cenas</h3>
				</div>
				<div class="panel-body">
					Outras cenas 1
					<br> Outras cenas 2
					<br> Outras cenas 3
					<br> Outras cenas 4
					<br>
				</div>
			</div>
		</div>

		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;">
			Conteudo principal
			<br> Linha 1
			<br> Linha 2
			<br> Linha 3
			<br>
		</div>

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</html>