<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Editar Utilizador</title>
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
			Editar Utilizador
			<small>Texto pequeno</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-utilizadores.php">Gestão de utilizadores</a></li>
			<li class="active">Editar utilizador</li>
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
				<form role="form">
				  <div class="box-body">
					<div class="form-group">
					  <label>Nome completo</label>
					  <input type="text" class="form-control" placeholder="Insira nome" value="Diogo Ressureição"/>
					</div>
					<div class="form-group has-error">
					  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Password errada!</label>
					  <br><label for="exampleInputPassword1">Password atual</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirme a password">
					</div>
					<div class="form-group has-warning">
					  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Password demasiado simples!</label>
					  <br><label for="exampleInputPassword1">Nova password</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="">
					</div>
					<div class="form-group has-error">
					  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> As passwords não são iguais!</label>
					  <br><label for="exampleInputPassword1">Confirmar nova Password</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirme a password">
					</div>
					<div class="form-group has-success">
					  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> O Email ta OK</label>
					  <br><label for="exampleInputEmail1">Email</label>
					  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o email" value="diogo.alenxandre99@hotmail.com">
					</div>
					<div class="form-group">
					  <label for="exampleInputFile">Foto</label>
					  <br>
					  <img class="img-circle" src="fotos/user1.jpg" alt="Foto do utilizador">
					  <input type="file" id="exampleInputFile">
					  <p class="help-block">Seleccione uma foto de perfil.</p>
					</div>
				  </div><!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
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