<?php
	include_once "sessaoAtiva.php";
	include_once "GereExposicoes.php";
	include_once "exposicoes.php";
	include_once "tipoexposicoes.php";
	include_once "GereTipoExposicoes.php";
include_once "GereLog.php";

$gere_log = new GereLog();

$gere_tipoExposicoes = new GereTipoExposicoes();
$gereExposicoes = new GereExposicoes();
if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
    $exposicoes_editar = $gereExposicoes->verDadosExposicoes($_GET["id"]);
}else if(!empty($_POST["ex_id"]) && is_numeric($_POST["ex_id"])) {
  $exposicoes_editar = $gereExposicoes->verDadosExposicoes($_POST["ex_id"]);
} else{
	header("Location: gerir-exposicoes.php");
}

// verificar se todos os campos foram preenchidos
if(
   isset($_POST["nome"]) && !empty($_POST["nome"]) &&
   isset($_POST["observacoes"]) && !empty($_POST["observacoes"]) &&
	 isset($_POST["te_id"]) && !empty($_POST["te_id"])
	){
	
		$te_nome = "SELECT T.TE_NOME FROM exposicoes e, tipoexposicoes t WHERE TE_ID = :TE_ID";
		
	$dados = array(
			"TE_ID" => $_POST["te_id"]
	);
	
	$exposicoes_editado = new exposicoes($_POST["ex_id"],$_POST["te_id"], $_POST["nome"], $_POST["observacoes"], true, $te_nome);
	
		$gereExposicoes->editarExposicoes($exposicoes_editado, $dados);
	$gere_log->adicionarEntradaLog($_SESSION["iduser"], 'editou a exposição "' . $_POST["nome"] . '"');
	
		header("Location: gerir-exposicoes.php");
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
	<title>Admin | Editar Exposicoes</title>
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
			Editar Exposicoes
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-exposicoes.php">Gestão de Exposicoes</a></li>
			<li class="active">Editar Exposicoes</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Dados da Exposição</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="editar-exposicoes.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group">
						<label>Tipo de Exposição:</label>
						<select class="form-control" name="te_id">
							<option value="">Indique Tipo de Exposição</option>
							 <?php
											$tipo_exposicoes = $gere_tipoExposicoes->listarTipoExposicoes();
                      if($tipo_exposicoes != null) {
                          for($i = 0; $i<count($tipo_exposicoes); $i++) {
                      
							echo '<option value="'. $tipo_exposicoes[$i]->getID().'"' . ($tipo_exposicoes[$i]->getID() == $exposicoes_editar->getTeID() ? ' selected' : '') . '>'. $tipo_exposicoes[$i]->getNome() . '</option>';
													}
											}
						?>
						</select>
					</div>			
					<div class="form-group">
					  <label>Nome</label>
					  <input type="text" class="form-control" name ="nome" value="<?php echo $exposicoes_editar->getNome(); ?>"  placeholder="Insira o nome"  >
					</div>
					<div class="form-group">
                      <label>Observações</label>
                      <textarea class="form-control" rows="3"  name ="observacoes" placeholder="Insira uma descrição"><?php echo $exposicoes_editar->getObservacoes(); ?></textarea>
                    </div>
						<div class="form-group<?php echo $p_erro1; ?>"></div>
						<input type="text" value="<?php echo $exposicoes_editar->getId(); ?>" hidden="hidden" name="ex_id" id="ex_id">
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
