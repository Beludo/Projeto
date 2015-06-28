<?php
include_once "sessaoAtiva.php";
include_once "GereParceria.php";
include_once "parceria.php";

$gereParceria = new GereParceria();
if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
    $parceria_editar = $gereParceria->verDadosParceria($_GET["id"]);
}else if(!empty($_POST["id"]) && is_numeric($_POST["id"])) {
    $parceria_editar = $gereParceria->verDadosParceria($_POST["id"]);
} else{
	header("Location: gerir-parcerias.php");
}



// verificar se todos os campos foram preenchidos
if(
   isset($_POST["nome"]) && !empty($_POST["nome"]) &&
   isset($_POST["condicao"]) && !empty($_POST["condicao"])
	){
    $parceria_editado = new parceria($_POST["id"], $_POST["nome"], $_POST["condicao"], $_POST["data"], true);
	
		$gereParceria->editarParceria($parceria_editado);
	
		header("Location: gerir-parcerias.php");
		
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
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Editar Parceria</title>
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
			Editar Parceria
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-eventos.php">Gestão de Parcerias</a></li>
			<li class="active">Editar Parceria</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Dados da Parceria</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="editar-parceria.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group">
					  <label>Entidade Parceira</label>
					  <input type="text" class="form-control" name ="nome" placeholder="Insira o nome"/ value="<?php echo $parceria_editar->getEntidade()?>">
					</div>
					<div class="form-group">
                      <label>Condição da Parceria</label>
                      <textarea class="form-control" rows="3"  name ="condicao" placeholder="Insira a condicao"><?php echo $parceria_editar->getCondicao()?></textarea>
                    </div>
						<div class="form-group<?php echo $p_erro1; ?>"></div>
					<div class="form-group">
					  <label for="exampleInputFile">Data da Parceria</label>
					  <input type="date" class="form-control" name ="data" placeholder="Insira o nome"/ value="<?php echo $parceria_editar->getData()?>">
						</div>
						<input type="text" value="<?php echo $parceria_editar->getId() ?>" hidden="hidden" name="id" id="id">
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