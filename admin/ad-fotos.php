<?php

include_once "sessaoAtiva.php";
include_once "acessobd.php";

$bd = new BaseDados();

if(isset($_POST["hafoto"])){
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
			// $separar = explode(".", $_FILES["foto"]["name"]);
			// $ext = $separar[count($separar)-1];
			// $nome_foto = $_POST["username"] . "." . $ext;
			$nome_foto = $_FILES["foto"]["name"];
			
			// apagar o ficheiro actual
			if(file_exists("img-vvirt/" . $nome_foto)){
				unlink("img-vvirt/" . $nome_foto);
			}
			
			move_uploaded_file($_FILES["foto"]["tmp_name"], "img-vvirt/" . $nome_foto);
			
			// Registar na base de dados
			$sql = "INSERT INTO visita_virtual (V_FOTO) VALUES (:V_FOTO);";

			$dados_visita_virtual = array('V_FOTO' => $nome_foto);

			$bd->inserir($sql, $dados_visita_virtual);
		}else{
			// mostrar mensagem de erro
			if(isset($_POST["hafoto"])){
				header("Location: ad-fotos.php?erro=1"); 
			}
			
		}
	}else{
		// não há imagem
		if(isset($_POST["hafoto"])){
			header("Location: gerir-visita.php");
		}
	}
}
	
	$p_erro1 = '';
	$p_erro2 = 0;
	if(isset($_GET["erro"]) && !empty($_GET["erro"])){
		// erro 1 - ficheiro invalido
		
		if($_GET["erro"] == 1){
			$p_erro1 = ' has-error';
			$mensagem_erro = "Ficheiro invalido!";
		}
		
		// erro 2 - sem foto
		
		if($_GET["erro"] == 2){
			$mensagem_erro = "Sem foto seleccionada!";
		}
	}

	// obter os dados da empresa
	//$dados_empresa = $bd->query("SELECT * FROM empresas LIMIT 1");

?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Adicionar fotos</title>
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
			Adicionar fotos
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-visita.php">Visita virtual</a></li>
			<li class="active">Adicionar fotos</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Insira uma foto para a visita virtual</h3>
				</div><!-- /.box-header -->
				
				<?php
					if($p_erro1 == 1 || $p_erro2 == 1){
				?>
					<div class="alert alert-danger alert-dismissable" style="margin:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    <?php echo $mensagem_erro; ?>
					</div>
				<?php
					}
				?>
				<!-- form start -->
				<form role="form" method="post" action="ad-fotos.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group<?php echo $p_erro1; ?>">
					  <label for="exampleInputFile">Foto</label>
					  <input type="file" id="exampleInputFile" name="foto">
					  <input type="hidden" name="hafoto" value="1">
					  <p class="help-block">Seleccione uma foto</p>
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
