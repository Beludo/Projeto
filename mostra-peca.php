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
	<?php $pagina="exposicoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="exposicoes.php">Exposições</a>
			</li>
			<li class="active">Peça xpto</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

			<div class="container">
				<!-- details-photo -->
				<div class="details-photo col-sm-5">
					<a href="#"><img class="img-responsive" src="http://placehold.it/350x400">
					</a>
					<br>
				</div>
				<!-- .details-photo -->


				<!-- Sidebar Grid -->
				<div class="col-sm-6 details-right">

					<div class="col-md-6 pull-left">
						<h3 class="h3"><a href="#"><strong>Primeira Peça</strong></a></h3>
						<p class="product-code">Nº de Inventário: <strong>ECOM1204</strong>
						</p>
					</div>

					<div class="clearfix"></div>
					<hr />
					<div class="col-md-12">
						<h4>Nome</h4>
						<p>
						Qualqer coisa
						</p>
						<h4>Dimensões</h4>
						<p>
						144x54cm
						</p>
						<h4></h4>
						<p>
						Qualqer coisa
						</p>
						<h4>Origem</h4>
						<p>
						Algarve
						</p>
						<h4>Outras Informações</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</p>
					</div>

				</div>
				<!--col-sm-6 -->
				<!-- /Sidebar Grid -->

				<div class="clearfix"></div>

			</div>
			<!-- /container -->
			<!-- /content -->
			
			<a class="btn btn-primary btn-flat pull-right" href="exposicoes.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>

		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>