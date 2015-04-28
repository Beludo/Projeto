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
	<?php $pagina="visitavirtual" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Visita Virtual</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel panel-default" style="padding:10px; margin-top:10px;">
			<h3>Aplicação Multimédia</h3>
			<hr>
			<div style="text-align:center;">
			<img src="./admin/img-museu/01.jpg" alt="imagem museu" usemap="#Mapa">
			<map name="Mapa" id="Mapa">
			</map>
			</div>
			
			
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>