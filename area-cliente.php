<?php
	include "sessaoAtiva.php";
	include_once "GereVisitante.php";

$gereVisitante = new GereVisitante();
$visitante = $gereVisitante->obtemVisitanteUsername($_SESSION["visit"]);

if(
    isset($_POST["nome"]) && !empty($_POST["nome"]) &&
    isset($_POST["username"]) && !empty($_POST["username"]) &&
    isset($_POST["morada"]) && !empty($_POST["morada"]) &&
    isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
    isset($_POST["email"]) && !empty($_POST["email"])){

    $visitante->setNomeCompleto($_POST["nome"]);
    $visitante->setUsername($_POST["username"]);
    $visitante->setMorada($_POST["morada"]);
    $visitante->setContatoTelefonico($_POST["telefone"]);
    $visitante->setEmail($_POST["email"]);

}

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
									<h4><?php echo $_SESSION["visit"]; ?></h4>
									<div class="follow-ava">
										<img src="fotos/<?php echo $visitante->getFotografia()?>" height="128px" width="128px" alt="">
									</div>
								</div>
								<div class="row">
									<div class="bio-row">
										<p><span>Nome Completo </span>: <?php echo $visitante->getNomeCompleto()?> </p>
									</div>
									<div class="bio-row">
										<p><span>Data de Registo </span>: <?php echo $visitante->getDataRegisto() ?> </p>
									</div>
									<div class="bio-row">
										<p><span>Morada </span>: <?php echo $visitante->getMorada()?> </p>
									</div>
									<div class="bio-row">
										<p><span>Email </span>: <?php echo $visitante->getEmail()?> </p>
									</div>
									<div class="bio-row">
										<p><span>Telefone </span>: <?php echo $visitante->getContatoTelefonico()?> </p>
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
								<form class="form-horizontal" role="form" method="post" action="area-cliente.php">
									<div class="form-group">
										<label class="col-lg-3 control-label">Nome</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="name" placeholder="Insira o Nome..." value="<?php echo $visitante->getNomeCompleto()?>" name="nome">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Username</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="username" placeholder="Insira o Username..." value="<?php echo $visitante->getUsername()?>" name="username">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Telefone</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="mobile" placeholder="Insira o Contato Telefónico..." value="<?php echo $visitante->getContatoTelefonico()?>" name="telefone">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Morada</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="address" placeholder="Insira a Morada..." value="<?php echo $visitante->getMorada()?>" name="morada">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Email</label>
										<div class="col-lg-4">
											<input type="email" class="form-control" id="email" placeholder="Insira o Email..." value="<?php echo $visitante->getEmail()?>" name ="email">
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
					<!-- edit-passorw -->
					<div id="edit-password" class="tab-pane">
						<section class="panel">
							<div class="panel-body bio-graph-info">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-3 control-label">Palavra-Passe Antiga</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="password-antiga" placeholder="Insira a Palavra-Passe...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Palavra-Passe Nova</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="password" placeholder="Insira a Palavra-Passe...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Confirmar Palavra-Passe</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="confirma-password" placeholder="Confirme a Palavra-Passe...">
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