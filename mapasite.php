<?php
	include "sessaoAtiva.php"
?>

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
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li><a href="contatos.php">Informações</a>
			</li>
			<li class="active">Mapa do Site </li>
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
				<a href="mapasite.php" class="active list-group-item">Mapa do Site</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="ligacoes.php" class="list-group-item">Ligações</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%; min-height: 205px;">
			
			<h3>Mapa do Site</h3>
			<hr>
			
			Conteudo principal
			<br> Linha 1
			<br> Linha 2
			<br> Linha 3
			<br>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>