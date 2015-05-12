<?php

include_once "GereUtilizadores.php";
include_once "sessaoAtiva.php";
include_once "GerePermissoes.php";

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
				header("Location: ad-utilizador.php?erro=1"); 
			}
		}else{
			// usar uma foto por omissão
			$nome_foto = "sem-foto.png";
		}
			
			$gereUtilizadores->adicionarUtilizador(new Utilizadores(0, $_POST["nome"], $_POST["username"], $_POST["password"], date("y-m-d", time()), $_POST["telefone"], $_POST["email"], $_POST["morada"], $nome_foto, true, 1));
			//$bd->editar("UPDATE empresas SET nome = :nome, email = :email, url = :url, tlf = :tlf, fax = :fax, morada = :morada, logo = :logo WHERE id = :id LIMIT 1", $dados);
	}
	

	if(isset($_GET["erro"]) && !empty($_GET["erro"])){
		// erro 1 - ficheiro invalido
		$p_erro1 = '';
		if($_GET["erro"] == 1){
			$p_erro1 = ' has-error';
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
			<small>Texto pequeno</small>
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
				<!-- form start -->
				<form role="form" method="post" action="ad-utilizador.php" enctype="multipart/form-data" style="height: 100%">
				  <div class="box-body">
					<div class="form-group">
					  <label>Nome completo</label>
					  <input type="text" class="form-control" placeholder="Insira o nome" name="nome"/>
					</div>
					<div class="form-group has-error">
					  <label>Nome de utilizador</label>
					  <br><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Já existe alguém com este nome de utilizador</label><br>
					  <input type="text" class="form-control" placeholder="Insira o nome de utilizador" name="username"/>
					</div>
					<div class="form-group">
					  <label>Morada</label>
					  <input type="text" class="form-control" placeholder="Insira a morada" name="morada"/>
					</div>
					<div class="form-group">
					  <label>Contacto telefonico</label>
					  <input type="text" class="form-control" placeholder="Insira o numero de telefone" name="telefone"/>
					</div>
					<div class="form-group has-warning">
					  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Password demasiado simples!</label>
					  <br><label for="exampleInputPassword1">Password</label>
					  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
					</div>
					<div class="form-group has-error">
					  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> As passwords não são iguais!</label>
					  <br><label for="exampleInputPassword1">Confirmar Password</label>
					  <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme a password">
					</div>
					<div class="form-group has-success">
					  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> O Email ta OK</label>
					  <br><label for="exampleInputEmail1">Email</label>
					  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o email" name="email">
					</div>
					<div class="form-group<?php echo $p_erro1; ?>">
					  <label for="exampleInputFile">Foto</label>
					  <input type="file" id="exampleInputFile" name="foto">
					  <p class="help-block">Seleccione uma foto de perfil.</p>
					</div>
                    <div class="form-group">
                        <label >Permissões</label>
                        <br><div class="col-lg-3" style="padding-left: 0px">
                            <?php
                            $gerePermissoes = new GerePermissoes();
                            $dados = $gerePermissoes->listaPermissoes();
                            for($i=0; $i<sizeof($dados); $i++){
                            ?>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="...">
                              </span>
                                <input type="text" class="form-control" aria-label="..." value="<?php echo  $dados[$i]["P_PERMISSAO"]?>"><br>
                            </div><!-- /input-group -->
                            <?php } ?>
                        </div><!-- /.col-lg-3 -->
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
