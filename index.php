<?php
	include_once "sessaoAtiva.php";
	include_once "admin/evento.php";
	include_once "admin/GereEventos.php";
	
$gere_eventos = new GereEventos();
$eventos = $gere_eventos->listarEventos3();
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
	<?php $pagina="index" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

	<div>	
	<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li class="active">Página Inicial
			</li>
		</ol>
		</div>
<div>
	<?php
			 if(count($avisos) != 0){			
		for ($i=0; $i<count($avisos); $i++){ 
		echo '<div> '; 

		echo '</div>';
			 }
			 ?>
	</div>

		<!-- Informações Laterais -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">

			<!-- Primeiro Painel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Noticias</h3>
				</div>
				<div class="panel-body">
					<br> Linha 1
			<br> Linha 2
			<br> Linha 3
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
	
	<?php 
	if(count($eventos) != 0){
		echo '<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;">';
			
		for ($i=0; $i<count($eventos); $i++){ 
		echo '<div> '; 
		echo '<img src="admin/img-eventos/'. $eventos[$i]->getFoto(). '" style="width:40%;" alt="imagem do evento">'; 
		echo '<div style="width:59%; float: right;">' . $eventos[$i]->getNome() . '</p>'; 
		echo '<p>Descrição:</p><p><p>' . nl2br($eventos[$i]->getDescricao()) . '</p></div></div>';
			 echo '<hr>';}
		echo '</div>';
			 } ?>

	</div>

	<!-- RODAPÉ!! -->
	<br>
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->
</body>
</html>