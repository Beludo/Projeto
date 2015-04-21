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

			<!-- Project One -->
			<div class="row">
				<div class="col-md-7">
					<a href="mostra-evento.php">
						<img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3>Evento Um</h3>
					<h4>Subtitulo</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
					<a class="btn btn-primary" href="mostra-evento.php">Ver Mais</i></a>
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Project Two -->
			<div class="row">
				<div class="col-md-7">
					<a href="mostra-evento.php">
						<img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3>Evento Dois</h3>
					<h4>Subtitulo</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
					<a class="btn btn-primary" href="mostra-evento.php">Ver Mais</i></a>
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Project Three -->
			<div class="row">
				<div class="col-md-7">
					<a href="mostra-evento.php">
						<img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3>Evento Três</h3>
					<h4>Subtitulo</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
					<a class="btn btn-primary" href="mostra-evento.php">Ver Mais</i></a>
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Pagination -->
			<div class="row text-center">
				<div class="col-lg-12">
					<ul class="pagination">
						<li>
							<a href="#">&laquo;</a>
						</li>
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">5</a>
						</li>
						<li>
							<a href="#">&raquo;</a>
						</li>
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