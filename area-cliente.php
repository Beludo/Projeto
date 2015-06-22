<?php
	include "sessaoAtiva.php";
	include_once "GereVisitante.php";

$gereVisitante = new GereVisitante();
$visitante = $gereVisitante->obtemVisitanteUsername($_SESSION["visit"]);

if(isset($_GET["opcao"]) && !empty($_GET["opcao"])){
    $op = $_GET["opcao"];
    if($op == "editar"){
        if(
            isset($_POST["nome"]) && !empty($_POST["nome"]) &&
            isset($_POST["morada"]) && !empty($_POST["morada"]) &&
            isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
            isset($_POST["email"]) && !empty($_POST["email"])){

            $visitante->setNomeCompleto($_POST["nome"], $visitante->getId());
            $visitante->setMorada($_POST["morada"], $visitante->getId());
            $visitante->setContatoTelefonico($_POST["telefone"], $visitante->getId());
            $visitante->setEmail($_POST["email"], $visitante->getId());
        }
    } elseif($op = "password"){
        if(
            isset($_POST["antigaPass"]) && !empty($_POST["antigaPass"]) &&
            isset($_POST["password"]) && !empty($_POST["password"])){
            if($visitante->getPassword() == md5($_POST["antigaPass"])){
                $visitante->setPassword(md5($_POST["password"]), $visitante->getId());
            }
        }
    }
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
    <!-- AJAX para ver so o utilizador já está registado -->
    <script src="ajax-visitante.js" ></script>

    <!-- Verificações no formulario -->
    <script src="verificacoes-form.js" ></script>
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
					<li class="">
						<a data-toggle="tab" href="#socio">
							<i class="icon-envelope"></i> Torna-te Sócio
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
								<form class="form-horizontal" role="form" method="post" action="?opcao=editar">
									<div class="form-group">
										<label class="col-lg-3 control-label">Nome</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="name" placeholder="Insira o Nome..." value="<?php echo $visitante->getNomeCompleto()?>" name="nome">
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
								<form class="form-horizontal" method="post" role="form" action="?opcao=password">
									<div class="form-group">
										<label class="col-lg-3 control-label">Palavra-Passe Antiga</label>
										<div class="col-lg-4">
											<input type="password" class="form-control" id="password-antiga" name="antigaPass" placeholder="Insira a Palavra-Passe...">
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Palavra-Passe Nova</label>
										<div class="col-lg-4">
											<input type="password" class="form-control" id="password" name="password" placeholder="Insira a Palavra-Passe..." onKeyUp="forcaPassword();" onBlur="verificaPasswords();">
                                            <div id="div-barra-forca-password" name="div-barra-forca-password" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 20px;"></div>
                                            <div id="div-forca-password"></div>
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Confirmar Palavra-Passe</label>
										<div class="col-lg-4">
                                            <div id="div-caixa-erro-password"></div>
											<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme a Palavra-Passe..." onBlur="verificaPasswords();">
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
					
					<!-- tornar sócio -->
					<div id="socio" class="tab-pane">
						<section class="panel">
							<br>
								<div class="row">
			 <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Normal</h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>€</sup>0<sup>00</sup></span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>0%</strong> Desconto</li>
                        <li class="list-group-item"><strong>1</strong> Pin</li>
                        <li class="list-group-item"><strong>3</strong> Bilhetes Mensais</li>
                        <li class="list-group-item"><strong></strong> Disk Space</li>
                        <li class="list-group-item"><strong>100GB</strong> Monthly Bandwidth</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Inscreve-te!!</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sócio</h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>€</sup>39<sup>99</sup></span>
                        <span class="period">mensal</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>10%</strong> Desconto</li>
                        <li class="list-group-item"><strong>2</strong> Pin</li>
                        <li class="list-group-item"><strong>6</strong> Bilhetes Mensais</li>
                        <li class="list-group-item"><strong>1000GB</strong> Disk Space</li>
                        <li class="list-group-item"><strong>10000GB</strong> Monthly Bandwidth</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Inscreve-te!!</a>
                        </li>
                    </ul>
                </div>
            </div>
					</div>
        <!-- /.row -->
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