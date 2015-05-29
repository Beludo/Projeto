<?php
	
	include_once "GereVisitante.php";
	
	$gereVistantes = new GereVisitante();
	
	
	
	// verificar se todos os campos foram preenchidos
	if(
	isset($_POST["nome"]) && !empty($_POST["nome"]) &&
	isset($_POST["username"]) && !empty($_POST["username"]) &&
	isset($_POST["morada"]) && !empty($_POST["morada"]) &&
	isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
	isset($_POST["password"]) && !empty($_POST["password"]) &&
	isset($_POST["password2"]) && !empty($_POST["password2"]) &&
	isset($_POST["email"]) && !empty($_POST["email"])
	){
		// verificar se foi escolhido um ficheiro de foto
		if(file_exists($_FILES["foto"]["tmp_name"])){
			
			// verificar o tipo e tamanho do ficheiro (< 2Mb)
			if(
			(($_FILES["foto"]["type"] == "image/gif") ||
			($_FILES["foto"]["type"] == "image/jpeg") ||
			($_FILES["foto"]["type"] == "image/jpg") ||
			($_FILES["foto"]["type"] == "image/png")) &&
			$_FILES["foto"]["size"] < 2000000 &&
			$_FILES["foto"]["error"] == 0
			){
				// corrigir o nome do ficheiro
				$separar = explode(".", $_FILES["foto"]["name"]);
				$ext = $separar[count($separar)-1];
				$nome_foto = $_POST["username"] . "." . $ext;
				
				// apagar o ficheiro actual
				if(file_exists("fotos/" . $nome_foto)){
					unlink("fotos/" . $nome_foto);
				}
				
				move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/" . $nome_foto);
				
				
				}else{
				// mostrar mensagem de erro
				header("Location: registo-visitante.php?erro=1"); 
			}
			}else{
			// usar uma foto por omissão
			$nome_foto = "sem-foto.png";
		}
		
		$gereUtilizadores->adicionarVisitante(new Visitante(0, $_POST["nome"], $_POST["username"], $_POST["password"], date("y-m-d", time()), $_POST
		["telefone"], $_POST["email"], $_POST["morada"], $nome_foto, true, 1));
	}
	
	
	if(isset($_GET["erro"]) && !empty($_GET["erro"])){
		// erro 1 - ficheiro invalido
		$p_erro1 = '';
		if($_GET["erro"] == 1){
			$p_erro1 = ' has-error';
		}
	}
	
?>

<!DOCTYPE html>
<html lang="pt">
	
	<head>
		<title>Registo</title>
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
		
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Registo</li>
		</ol>
		
		<!-- Conteudo -->
		<!-- registo -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div id="edit-profile" class="tab-pane">
						<div class="panel-body bio-graph-info">
							<form class="form-horizontal" role="form" method="post">
								<div class="form-group">
									<label class="col-lg-3 control-label">Nome</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="name" placeholder="Insira o Nome..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Username</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="username" placeholder="Insira o Username..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Telefone</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="mobile" placeholder="Insira o Contato Telefónico..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Morada</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="address" placeholder="Insira a Morada..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Email</label>
									<div class="col-lg-4">
										<input type="email" class="form-control" id="email" placeholder="Insira o Email..." value="">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label" for="exampleInputPassword1">Password</label>
									<div class="col-lg-4">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" onKeyUp="forcaPassword();" onBlur="verificaPasswords();">
										<div id="div-barra-forca-password" name="div-barra-forca-password" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 20px;"></div>
										<div id="div-forca-password"></div>
									</div>
								</div>
								
								<div id="div-password-visitante" class="form-group">
									<label class="col-lg-3 control-label" for="exampleInputPassword1">Confirmar Password</label>
									<div class="col-lg-4">
										<div id="div-caixa-erro-password"></div>
										<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme a password" onBlur="verificaPasswords();">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label" for="exampleInputEmail1">Email</label>
									<div class="col-lg-4">
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o email" name="email">
									</div>
								</div>
								<div class="form-group<?php echo $p_erro1; ?>">
									<label class="col-lg-3 control-label" for="exampleInputFile">Foto</label>
									<div class="col-lg-4">
										<input type="file" id="exampleInputFile" name="foto">
										<p class="help-block">Seleccione uma foto de perfil.</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-10">
										<button type="submit" class="btn btn-primary">Registar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.col -->
			</div>   <!-- /.row -->
		</section><!-- /.content -->
		
		
		<!-- Acaba o conteudo -->
		
		<!-- RODAPÉ!! -->
		<?php include "inc-rodape.php" ?>
		<!-- Acaba RODAPÉ!! -->
		
				</body>
				
			</html>			