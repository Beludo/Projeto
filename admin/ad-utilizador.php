<?php

include_once "sessaoAtiva.php";
include_once "GereUtilizadores.php";
include_once "Permissoes.php";
include_once "GerePermissoes.php";
include_once "GereLog.php";

$gere_log = new GereLog();
$gereUtilizadores = new GereUtilizadores();



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
		// Não permitir registar um nome de utilizador que já existe
		if($gereUtilizadores->verificaUserNaoExiste($_POST["username"])){
		
			$permissoesUser = new Permissoes(0, "nao", "nao", "nao", "nao", "nao", "nao", "nao");
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
					if(file_exists("img-users/" . $nome_foto)){
						unlink("img-users/" . $nome_foto);
					}
					
					move_uploaded_file($_FILES["foto"]["tmp_name"], "img-users/" . $nome_foto);
					
					
				}else{
					// mostrar mensagem de erro
					header("Location: ad-utilizador.php?erro=1"); 
				}
			}else{
				// usar uma foto por omissão
				$nome_foto = "sem-foto.png";
			}
			$utilizador = new Utilizadores(0, $_POST["nome"], $_POST["username"], md5($_POST["password"]), date("y-m-d", time()), $_POST["telefone"], 		$_POST["email"], $_POST["morada"], $nome_foto, true, 0);

			// Obter as permissoes

			$modifica = false;
			if(isset($_POST['total']) && !empty($_POST['total']) && $_POST['total'] == 1) {

                $permissoesUser->setPermTotal("sim");
                $modifica = true;

			}
            if(isset($_POST['loja']) && !empty($_POST['loja']) && $_POST['loja'] == 2) {

				$permissoesUser->setPermLoja("sim");
                $modifica = true;

            }
            if(isset($_POST['espaco']) && !empty($_POST['espaco']) && $_POST['espaco'] == 3) {

				$permissoesUser->setPermEspaco("sim");
                $modifica = true;

			}
            if(isset($_POST['inventario']) && !empty($_POST['inventario']) && $_POST['inventario'] == 4) {

				$permissoesUser->setPermInventario("sim");
                $modifica = true;

			}
            if(isset($_POST['acervo']) && !empty($_POST['acervo']) && $_POST['acervo'] == 5) {

				$permissoesUser->setPermAcervo("sim");
                $modifica = true;

			}
            if(isset($_POST['socios']) && !empty($_POST['socios']) && $_POST['socios'] == 6) {

				$permissoesUser->setPermSocios("sim");
                $modifica = true;

			}
            if(isset($_POST['museu_virtual']) && !empty($_POST['museu_virtual']) && $_POST['museu_virtual'] == 7) {

				$permissoesUser->setPermMuseuVirt("sim");
                $modifica = true;

			}

            if($modifica){
                $gereUtilizadores->adicionarUtilizador($utilizador, $permissoesUser);
							$gere_log->adicionarEntradaLog($_SESSION["iduser"], 'Adicionado o utilizador "' . $_POST["nome"] . '"');
            }else{
                header("Location: ad-utilizador.php?erro=1");
            }
		}else{
			header("Location: ad-utilizador.php?erro=2");
		}
						//$bd->editar("UPDATE empresas SET nome = :nome, email = :email, url = :url, tlf = :tlf, fax = :fax, morada = :morada, logo = :logo WHERE id = :id LIMIT 1", $dados);
	}
	
	$p_erro1 = '';
	$p_erro2 = 0;
	if(isset($_GET["erro"]) && !empty($_GET["erro"])){
		// erro 1 - ficheiro invalido
		
		if($_GET["erro"] == 1){
			$p_erro1 = ' has-error';
		}
		
		// erro 2 - utilizador já existe
		
		if($_GET["erro"] == 2){
			$p_erro2 = 1;
		}
	}

	// obter os dados da empresa
	//$dados_empresa = $bd->query("SELECT * FROM empresas LIMIT 1");

?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Adicionar Utilizador</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
		 folder instead of downloading all of them to reduce the load. -->
	<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- AJAX para ver so o utilizador já está registado -->
	<script src="ajax-username.js" ></script>
	
	<!-- Verificações no formulario -->
	<script src="verificacoes-form.js" ></script>
  </head>
  <body class="skin-blue">
	<div class="wrapper">
	  
	<?php
		include("cabecalho-admin.php");
		include("lateral-admin.php");
	?>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Adicionar Utilizador
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-utilizadores.php">Gestão de utilizadores</a></li>
			<li class="active">Adicionar utilizador</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Dados do utilizador</h3>
				</div><!-- /.box-header -->
				
				<?php
					if($p_erro2 == 1){
				?>
					<div class="alert alert-danger alert-dismissable" style="margin:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    Já existe alguém com este nome de utilizador
					</div>
				<?php
					}
				?>
				<!-- form start -->
				<form role="form" method="post" action="ad-utilizador.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group">
					  <label>Nome completo</label>
					  <input type="text" class="form-control" placeholder="Insira o nome" id="nome" name="nome"/>
					</div>
					<div class="form-group" id="div-username-ajax">
					  <label>Nome de utilizador</label>
					  <div id="div-caixa-erro-username"></div>
					  <input type="text" class="form-control" placeholder="Insira o nome de utilizador" id="username" name="username" onKeyUp="verificaUsernameExiste();"/>
					</div>
					<div class="form-group">
					  <label>Morada</label>
					  <input type="text" class="form-control" placeholder="Insira a morada" name="morada"/>
					</div>
					<div class="form-group">
					  <label>Contacto telefonico</label>
					  <input type="text" class="form-control" placeholder="Insira o numero de telefone" name="telefone"/>
					</div>
					<div class="form-group">
					  <label for="exampleInputPassword1">Password</label>
					  <input type="password" class="form-control" id="password" name="password" placeholder="Password" onKeyUp="forcaPassword();" onBlur="verificaPasswords();">
					  <div id="div-barra-forca-password" name="div-barra-forca-password" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 20px;"></div>
					  <div id="div-forca-password"></div>
					</div>
					
					<div id="div-password-utilizador" class="form-group">
					  <label for="exampleInputPassword1">Confirmar Password</label>
                      <div id="div-caixa-erro-password"></div>
					  <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme a password" onBlur="verificaPasswords();">
					</div>
					<div class="form-group">
					  <label for="exampleInputEmail1">Email</label>
					  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o email" name="email">
					</div>
					<div class="form-group<?php echo $p_erro1; ?>">
					  <label for="exampleInputFile">Foto</label>
					  <input type="file" id="exampleInputFile" name="foto">
					  <p class="help-block">Seleccione uma foto de perfil.</p>
					</div>
          <div class="form-group">
            	<hr> 
						<label >Permissões</label>
						<br>
					              
							<?php
							$gerePermissoes = new GerePermissoes();
							$dados = $gerePermissoes->listaPermissoes();
							for($i=0; $i<count($dados); $i++){
							?>
												
									<label><input type="checkbox"  value="<?php echo $dados[$i]["P_ID"] ?>" id="<?php echo  $dados[$i]["P_PERMISSAO"]?>" name="<?php echo  $dados[$i]["P_PERMISSAO"]?>"><?php echo  $dados[$i]["P_NOME"]?></label><br>
							<?php } ?> 
          </div>
                    
        </div><!-- /.box-body -->
                    <br>
				  <div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Guardar"/>
				  </div>
				</form>
			  </div><!-- /.box -->
			</div><!-- /.col -->
		  </div>   <!-- /.row -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  
	  <?php
		include("rodape-admin.php");
	  ?>
	</div><!-- ./wrapper -->

	<!-- jQuery 2.1.3 -->
	<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- FastClick -->
	<script src='plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
