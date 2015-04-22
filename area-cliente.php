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
			<li class="active">Área de Cliente</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="margin-top:10px;">



			<section class="panel">


				<ul class="nav nav-tabs">
					<li class="active">
						<a data-toggle="tab" href="#profile">
							<i class="icon-user"></i> Perfil
						</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#edit-profile">
							<i class="icon-envelope"></i> Editar Perfil
						</a>
					</li>
				</ul>
				<div class="tab-content">

					<!-- profile -->
					<div id="profile" class="tab-pane active">
						<section class="panel">

							<div class="panel-body bio-graph-info">
								<div class="col-lg-2 col-sm-2" style="width:24%;">
									<h4>Zé Tobias</h4>
									<h6>Administrador</h6>
									<div class="follow-ava">
										<img src="http://placehold.it/128x128" alt="">
									</div>
								</div>
								<div class="row">
									<div class="bio-row">
										<p><span>Nome </span>: José Tobias </p>
									</div>
									<div class="bio-row">
										<p><span>País </span>: Portugal</p>
									</div>
									<div class="bio-row">
										<p><span>Data de Nascimento</span>: 27 August 1987</p>
									</div>
									<div class="bio-row">
										<p><span>Morada </span>: United</p>
									</div>
									<div class="bio-row">
										<p><span>Email </span>: jenifer@mailname.com</p>
									</div>
									<div class="bio-row">
										<p><span>Telefone </span>: (+021) 956 789123</p>
									</div>
								</div>
							</div>
						</section>
						<section>
							<div class="row">
							</div>
						</section>
					</div>
					<!-- edit-profile -->
					<div id="edit-profile" class="tab-pane">
						<section class="panel">
							<div class="panel-body bio-graph-info">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-2 control-label">Nome</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="name" placeholder=" ">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">País</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="c-name" placeholder=" ">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Data de Nascimento</label>
										<div class="col-lg-6">
											<input type="date" class="form-control" id="b-day" placeholder=" ">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Morada</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="address" placeholder=" ">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Email</label>
										<div class="col-lg-6">
											<input type="email" class="form-control" id="email" placeholder=" ">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Telefone</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="mobile" placeholder=" ">
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-danger">Cancel</button>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
				</div>
		</div>
		</section>




	</div>
	</div>

	<!-- Acaba o conteudo -->

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>