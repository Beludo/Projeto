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
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<div class="jumbotron" style="margin:1px; padding-bottom:1px;">
			<img src="./imagens/logotipo-banner.png" alt="logotipo">
		</div>
		<!-- /banner -->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="loja.php">Loja</a>
			</li>
			<li class="active">Produto xpto</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

			<div class="container">
				<!-- details-photo -->
				<div class="details-photo col-sm-5">
					<a href="#"><img class="img-responsive" src="http://placehold.it/350x400">
					</a>
					<br>
					<div>
						<a href=""><img src="http://placehold.it/85x84" alt="">
						</a>
						<a href=""><img src="http://placehold.it/85x84" alt="">
						</a>
						<a href=""><img src="http://placehold.it/85x84" alt="">
						</a>
						<a href=""><img src="http://placehold.it/85x84" alt="">
						</a>
					</div>
				</div>
				<!-- .details-photo -->


				<!-- Sidebar Grid -->
				<div class="col-sm-6 details-right">

					<div class="col-md-6 pull-left">
						<h3 class="h3"><a href="#"><strong>Primeiro Produto</strong></a></h3>
						<p class="product-code">Código do Produto: <strong>ECOM1204</strong>
						</p>
					</div>

					<div class="col-md-6 pull-right text-right">
						<h1 class="big-price"><strong>€34</strong></h1>
					</div>

					<div class="clearfix"></div>
					<hr />

					<div class="col-md-12">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="quantity" class="col-sm-2 control-label">Quantidade</label>
								<div class="col-xs-9">
									<input style="max-width: 50px;" id="quantity" type="number" min="1" max="5" value="1" name="quantity" />
								</div>
							</div>

						</form>
					</div>
					<hr>

					<div class="col-md-12 text-center">
						<button id="loadToSuccess" class="btn btn-primary-custom btn-lg pull-left"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button>
					</div>

					<div class="col-md-12">
						<br>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#detalhes">Detalhes</a>
							</li>
							<li><a data-toggle="tab" href="#informacao">Informação Adicional</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="detalhes">
								<h4>Informação do Produto</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</p>
							</div>

							<div class="tab-pane" id="informacao">
								<h4>Dimensões</h4>
								<p>144x52</p>
								<hr>
								<h4>Portes</h4>
								<p>Correio Normal: 5-7 dias utéis - €7</p>
								<p>Correio Azul: 2 dias utéis - €15</p>
								<p>Avião: Algumas horas - €30</p>

							</div>
						</div>
						<!-- tab-content-->

					</div>
					<!-- col-md-12 -->
				</div>
				<!--col-sm-6 -->
				<!-- /Sidebar Grid -->

				<div class="clearfix"></div>

			</div>
			<!-- /container -->
			<!-- /content -->
			
			<a class="btn btn-primary btn-flat pull-right" href="loja.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>

		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>