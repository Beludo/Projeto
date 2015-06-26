<?php
	include_once "sessaoAtiva.php";
	include_once "/admin/GereEventos.php";
	include_once "admin/eventos.php";

$gere_eventos = new GereEventos();
$eventos = $gere_eventos ->listarEventos();
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
	<?php $pagina="eventos" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Eventos</li>
		</ol>

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="#" class="list-group-item">Categoria 1</a>
				<a href="#" class="list-group-item">Categoria 2</a>
				<a href="#" class="list-group-item">Categoria 3</a>
				<a href="#" class="list-group-item">Categoria 4</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->

		<div class="panel panel-default" style="float:right; padding:10px; padding-top: 0px;; margin-top:10px; width:74%;">

			<h3>Eventos</h3>

			<hr>
			<?php 
			 $eventos = $gere_eventos->listarEventos();
						if($eventos != null) {
								for($i = 0; $i<count($eventos); $i++) {
                      ?>
			
			<!-- Project One  -->
			<div class="row">
				<div class="col-md-7">
					<a href="mostra-evento.php?id="<?php echo $eventos[$i]->getId() ?>">
						<img style="width: 400px; height:200px; " class="img-responsive img-hover" src="./admin/img-eventos/<?php echo $eventos[$i]->getFoto()?>" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3><a class="thumbnail" href="mostra-evento.php?id=<?php echo $eventos[$i]->getId(); ?>"><?php echo $eventos[$i]->getNome(); ?></a></h3>
					<p><?php echo $eventos[$i]->getDescricao(); ?></p>
					<a class="btn btn-primary" href="mostra-evento.php?id=<?php echo $eventos[$i]->getId() ?>">Ver Mais</i></a>
				</div>
			</div>
	
		<hr>
			<!-- /.row -->
			
			<?php 
							}
					}
			?>

			
	
	

			<!-- Pagination -->
			<div class="row text-center">
				<div class="dataTables_paginate paging_bootstrap">
					<ul class="pagination">
							<li class="prev disabled"><a href="#">← Previous</a></li>
							<li class="active"><a href="#">1</a></li>
							<li class="next disabled"><a href="#">Next → </a></li>
					</ul>
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