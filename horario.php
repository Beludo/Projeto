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
				<a href="mapasite.php" class="list-group-item">Mapa do Site</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="ligacoes.php" class="list-group-item">Ligações</a>
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
				<li>2.ª Feira a 6.ª Feira - 8h30</li>
				<li> 2.ª Feira a 6.ª Feira - 17h00</li>
				<li>Dias úteis das 10h00 às 12h00 e das 14h00 às 17h00</li>
			</ul>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>