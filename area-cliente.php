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
	<?php $pagina="index" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
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
					<li class="">
						<a data-toggle="tab" href="#edit-password">
							<i class="icon-envelope"></i> Alterar Palavra-Passe
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
										<p><span>Data de Registo </span>: 21-04-2015</p>
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
										<label class="col-lg-3 control-label">Nome</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="name" placeholder="Insira o Nome...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Username</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="username" placeholder="Insira o Username...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Telefone</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="mobile" placeholder="Insira o Contato Telefónico...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Morada</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="address" placeholder="Insira a Morada...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Email</label>
										<div class="col-lg-4">
											<input type="email" class="form-control" id="email" placeholder="Insira o Email...">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-10">
											<button type="submit" class="btn btn-primary">Guardar</button>
											<button type="button" class="btn btn-danger">Cancelar</button>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
					<!-- edit-passorw -->
					<div id="edit-password" class="tab-pane">
						<section class="panel">
							<div class="panel-body bio-graph-info">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-3 control-label">Palavra-Passe</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="password" placeholder="Insira a Palavra-Passe...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Confirmar Palavra-Passe</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="password" placeholder="Confirme a Palavra-Passe...">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-10">
											<button type="submit" class="btn btn-primary">Guardar</button>
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

	<!-- Acaba o conteudo -->

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>