<?php
include_once "sessaoAtiva.php";
include_once "gere_noticias.php";
include_once "noticia.php";
include_once "GereLog.php";

$gere_log = new GereLog();

$gere_noticias = new GereNoticias();
if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
    $noticia_editar = $gere_noticias->verDadosNoticia($_GET["id"]);
}else if(!empty($_POST["e_id"]) && is_numeric($_POST["e_id"])) {
    $noticia_editar = $gere_noticias->verDadosNoticia($_POST["e_id"]);
} else{
	header("Location: gerir-noticias.php");
}



// verificar se todos os campos foram preenchidos
if(
   isset($_POST["nome"]) && !empty($_POST["nome"]) &&
   isset($_POST["descricao"]) && !empty($_POST["descricao"])
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
            $nome_foto = $_POST["nome"] . "." . $ext;

            // apagar o ficheiro actual
            if(file_exists("img-noticias/" . $nome_foto)){
                unlink("img-noticias/" . $nome_foto);
            }

            move_uploaded_file($_FILES["foto"]["tmp_name"], "img-noticias/" . $nome_foto);


        }else{
            // mostrar mensagem de erro
            header("Location: gerir-noticias.php?erro=1");
        }
    }else{
        // usar a foto antiga (não alterar)
        $nome_foto = $_POST["foto-original"];
    }
    $noticia_editada = new noticia($_POST["e_id"], $_POST["nome"], $_POST["descricao"], $nome_foto, true);
	
		$gere_noticias->editarNoticia($noticia_editada);
	$gere_log->adicionarEntradaLog($_SESSION["iduser"], 'Editou a noticia "' . $_POST["nome"] . '"');
	
		header("Location: gerir-noticias.php");
		
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
	<title>Admin | Editar Noticias</title>
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
			Editar Noticias
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-noticias.php">Gestão de Noticias</a></li>
			<li class="active">Editar Noticia</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Dados da Noticia</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="editar-noticias.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group">
					  <label>Nome</label>
					  <input type="text" class="form-control" name ="nome" placeholder="Insira o nome"/ value="<?php echo $noticia_editar->getNome()?>">
					</div>
					<div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" rows="3"  name ="descricao" placeholder="Insira uma descrição"><?php echo $noticia_editar->getDescricao()?></textarea>
                    </div>
						<div class="form-group<?php echo $p_erro1; ?>"></div>
					<div class="form-group">
					  <label for="exampleInputFile">Imagem</label>
					  <p><img src="img-noticias/<?php echo $noticia_editar->getFoto(); ?>" style="height:120px;width:120px;" alt="Imagem da noticia"></p>
					  <input type="hidden" name="foto-original" value="<?php echo $noticia_editar->getFoto(); ?>">
					  <input type="file" id="exampleInputFile" name="foto">
					  <p class="help-block">Seleccione uma imagem para a noticia.</p>
						</div>
						<input type="text" value="<?php echo $noticia_editar->getId() ?>" hidden="hidden" name="e_id" id="e_id">
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
