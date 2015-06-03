<?php
include_once "sessaoAtiva.php";
include_once "GerePecas.php";
include_once "pecas.php";

$gerePeca = new GerePecas();

// verificar se todos os campos foram preenchidos
if(isset($_POST["museu"]) && !empty($_POST["museu"]) &&
   isset($_POST["nInventario"]) && !empty($_POST["nInventario"]) &&
   isset($_POST["categoria"]) && !empty($_POST["categoria"]) &&
   isset($_POST["nome"]) && !empty($_POST["nome"]) &&
   isset($_POST["datacao"]) && !empty($_POST["datacao"]) &&
   isset($_POST["materia"]) && !empty($_POST["materia"]) &&
   isset($_POST["descricao"]) && !empty($_POST["descricao"]) &&
   isset($_POST["origem"]) && !empty($_POST["origem"])
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
            if(file_exists("fotos-pecas/" . $nome_foto)){
                unlink("fotos-pecas/" . $nome_foto);
            }

            move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos-pecas/" . $nome_foto);


        }else{
            // mostrar mensagem de erro
            header("Location: ad-artigo.php?erro=1");
        }
    }else{
        // usar uma foto por omissão
        $nome_foto = "sem-foto.png";
    }
    $artigo = new pecas(0, $_POST["museu"], $_POST["nInventario"], $_POST["categoria"], $_POST["nome"], $_POST["datacao"], $_POST["materia"], $_POST["descricao"], nome_foto, $_POST["origem"], true);
    $gerePecas->adicionaArtigos($artigo);
}

?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Adicionar artigos</title>
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
			Adicionar artigos
			<small>descrição</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="gerir-artigos.php">Gestão de artigos</a></li>
			<li class="active">Adicionar artigos</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <!-- general form elements -->
			  <div class="box box-primary">
				<div class="box-header">
				  <h3 class="box-title">Dados do artigo</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="ad-artigo.php" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="form-group">
					  <label>Nome</label>
					  <input type="text" class="form-control" name ="nome" placeholder="Insira o nome"/>
					</div>
					<div class="form-group">
					  <label>Numero de inventário</label>
					  <input type="text" class="form-control" name ="nInventario" placeholder="Insira o numero de inventário"/>
					</div>
					<div class="form-group">
						<label>Datação</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input class="form-control pull-right" id="datacao"  name ="datacao" type="text">
						</div>
					</div>
					<div class="form-group">
					  <label>Origem</label>
					  <input type="text" class="form-control"  name ="origem" placeholder="Insira a origem"/>
					</div>
					<div class="form-group">
					  <label>Museu</label>
					  <input type="text" class="form-control"  name ="museu" placeholder="Insira o museu"/>
					</div>
					<div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" rows="3"  name ="descricao" placeholder="Insira uma descrição"></textarea>
                    </div>
					<div class="form-group">
					  <label for="exampleInputFile">Fotografia</label>
					  <input type="file" id="exampleInputFile" name="foto">
					  <p class="help-block">Seleccione uma fotografia para o artigo.</p>
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
