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
							<li><a href="#">Área de Cliente</a>
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
		<div class="panel-default" style="padding:10px; margin-top:10px;">

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Carrinho de Compras</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Imagem</th>
											<th>Nome do Produto</th>
											<th>Quantidade</th>
											<th>Preço</th>
											<th>Observações</th>
											<th>Remover</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a href="detail.html">
													<img src="http://placehold.it/47x47" alt="Age Of Wisdom Tan Graphic Tee" title="" width="47" height="47" />
												</a>
											</td>
											<td><a href="detail.html">Age Of Wisdom Tan Graphic Tee</a>
											</td>
											<td>
												<input type="number" class="form-control text-center" value="1" min="1" max="10">
											</td>
											<td>marco.beludo@hotmai.com</td>
											<td>Ativo</td>
											<td>
												<div class="btn-group">
													<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<li><a href="#"><i class="fa fa-fw fa-edit"></i>Editar</a>
														</li>
														<li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a>
														</li>
														<li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a href="detail.html">
													<img src="http://placehold.it/47x47" alt="Age Of Wisdom Tan Graphic Tee" title="" width="47" height="47" />
												</a>
											</td>
											<td><a href="detail.html">Age Of Wisdom Tan Graphic Tee</a>
											</td>
											<td>
												<input type="number" class="form-control text-center" value="1" min="1" max="10">
											</td>
											<td>diogo.alenxandre99@hotmail.com</td>
											<td>Desativo</td>
											<td>
												<div class="btn-group">
													<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a>
														</li>
														<li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a>
														</li>
														<li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->


		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>