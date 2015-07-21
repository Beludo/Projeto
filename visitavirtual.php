<?php
	include "sessaoAtiva.php"
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
			<img src="admin/img-visitavirtual/01.jpg" alt="imagem museu" usemap="#Mapa">
			<map name="Mapa" id="Mapa">
				<area alt="" title="" href="#" shape="poly" coords="82,257,82,338,163,336,163,257" alt="1" />
				<area alt="" title="" href="#" shape="poly" coords="408,231,409,292,435,296,434,226" alt="2" />
				<area alt="" title="" href="#" shape="poly" coords="505,178,505,342,608,333,609,185" alt="3" />
				<area alt="" title="" href="#" shape="poly" coords="640,193,646,330,719,323,717,197" alt="4" />
				<area alt="" title="" href="#" shape="poly" coords="302,231,329,223,331,333,300,323" alt="5" />
				<area alt="" title="" href="#" shape="poly" coords="170,479,456,511,405,375,328,341,222,361,169,366" alt="6" />
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