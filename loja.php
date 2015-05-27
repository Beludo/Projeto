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
	<?php $pagina="loja" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->


		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Loja</li>
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
		<div class="panel-default" style="float:right; padding:10px; width:74%;">

			<div class="row carousel-holder">

				<div class="col-md-12" style="padding-bottom: 15px;">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€24.99</h4>
							<h4><a href="mostra-produto.php">Primeiro produto</a>
                                </h4>
							<p>Temos que definir o tamanho fixo destas caixas de modo a ficar todos do mesmo tamanho.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€64.99</h4>
							<h4><a href="mostra-produto.php">Segundo Produto</a>
                                </h4>
							<p>Lê o primeiro produto! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€74.99</h4>
							<h4><a href="mostra-produto.php">Terceiro Produto</a>
                                </h4>
							<p>Lê o primeiro produto! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€84.99</h4>
							<h4><a href="mostra-produto.php">Quarto Produto</a>
                                </h4>
							<p>Lê o primeiro produto! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€94.99</h4>
							<h4><a href="mostra-produto.php">Quinto Produto</a>
                                </h4>
							<p>Lê o primeiro produto! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php"><img src="http://placehold.it/320x150" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right">€14.99</h4>
							<h4><a href="mostra-produto.php">Sexto Produto</a>
                                </h4>
							<p>Lê o primeiro produto! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>

			</div>

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

			<!--/. Pagination -->

		</div>

		<!-- /.container -->


	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>