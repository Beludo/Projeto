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
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- O logotipo e o menu para telemovel estão agrupados -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Menu pequeno</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" style="padding: 5px 5px" href="index.php"><img src="./imagens/logotipo-pequeno-menu.png" alt="logotipo" style="margin-top:0px;">
				</a>
			</div>

			<!-- Guardar as opções de menu para o menu movel (lá pra cima) -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Página Inicial</a>
					</li>
					<li><a href="visitavirtual.php">Visita virtual</a>
					</li>
					<li><a href="loja.php">Loja</a>
					</li>
					<li><a href="exposicoes.php">Exposições</a>
					</li>
					<li><a href="eventos.php">Eventos</a>
					</li>
					<li><a href="contatos.php">Informações</a>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" role="menu" aria-labelledby="menu1" style="z-index: 1">
						<a id="menu1" data-toggle="dropdown">Zé Tobias<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
							<li><a href="area-cliente.php">Área de Cliente</a>
							</li>
							<li><a href="carrinho.php">Carrinho de Compras</a>
							</li>
							<li><a href="#">Terminar Sessão</a>
							</li>
						</ul>
					</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form navbar-left" role="search" method="POST">
							<input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Search">
						</form>
					</li>

				</ul>


			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<!-- /banner -->
		<div class="jumbotron" style="margin:0px; margin-bottom:1px; padding-bottom:1px;">
			<img src="./imagens/logotipo-banner.png" alt="logotipo">
		</div>
		<!-- /Acaba o banner -->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="loja.php">Loja</a>
			</li>
			<li class="active">Carrinho</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="margin-top:10px;">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho de Compras</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm pull-right">
									<span class="glyphicon glyphicon-share-alt"></span> Continuar a Comprar
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>Nome do Produto</strong></h4>
							<h4><small>Descrição do Produto</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="1">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>Nome do Produto</strong></h4>
							<h4><small>Descrição do Produto</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="1">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Adicionou items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Atualizar Carrinho
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>€50.00</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Continuar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Acaba o conteudo -->

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>