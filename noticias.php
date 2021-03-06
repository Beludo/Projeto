<?php
	include_once "sessaoAtiva.php";
	include_once "admin/gere_noticias.php";
	include_once "admin/noticia.php";

$gere_noticias = new GereNoticias();
$noticias = $gere_noticias ->listarNoticias();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="noticias" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Notícias</li>
		</ol>

		<!-- Conteudo -->

		<div class="panel panel-default" style="padding:10px; padding-top: 0px; margin-top:10px;">

			<h3>Notícias</h3>

			<hr>
			<?php 
			 $noticias = $gere_noticias->listarNoticiasAtivas();
						if($noticias != null) {
								for($i = 0; $i<count($noticias); $i++) {
                      ?>
			
			<div class="row">
				<div class="col-md-7">
					<a href="mostra-noticias.php?id=<?php echo $noticias[$i]->getId() ?>">
						<img style="width: 400px; height:200px; " class="img-responsive img-hover" src="./admin/img-noticias/<?php echo $noticias[$i]->getFoto()?>" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3><a class="thumbnail" href="mostra-noticias.php?id=<?php echo $noticias[$i]->getId(); ?>"><?php echo $noticias[$i]->getNome(); ?></a></h3>
					<p><?php echo $noticias[$i]->getDescricao(); ?></p>
					<a class="btn btn-primary" href="mostra-noticias.php?id=<?php echo $noticias[$i]->getId() ?>">Ver Mais</i></a>
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
							<li class="prev disabled"><a href="#">← Anterior</a></li>
							<li class="active"><a href="#">1</a></li>
							<li class="next disabled"><a href="#">Seguinte → </a></li>
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