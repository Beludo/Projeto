<?php
include_once "sessaoAtiva.php";
include_once "GereUtilizadores.php";
include_once "Utilizadores.php";
include_once "acessobd.php";

$gere_utilizador = new GereUtilizadores();
$utilizadores = $gere_utilizador->listarUtilizador();

// verificar se todos os campos foram preenchidos
if(
   isset($_POST["msg_dest"]) && !empty($_POST["msg_dest"]) &&
   isset($_POST["msg_assunto"]) && !empty($_POST["msg_assunto"]) &&
	isset($_POST["msg_corpo"]) && !empty($_POST["msg_corpo"])
	){
	
	$bd = new BaseDados();
	$dados = array(
		'ME_REMETENTE' => $_SESSION["iduser"],
		'ME_DESTINATARIO' => $_POST["msg_dest"],
		'ME_ASSUNTO' => $_POST["msg_assunto"],
		'ME_MENSAGEM' => $_POST["msg_corpo"],
		'ME_DATAHORA' => date("Y-m-d H:i:s"),
		'ME_VISTA' => 0
	);
	
	$mensagens = $bd->inserir("INSERT INTO mensagens (ME_REMETENTE, ME_DESTINATARIO, ME_ASSUNTO, ME_MENSAGEM, ME_DATAHORA, ME_VISTA) VALUES (:ME_REMETENTE, :ME_DESTINATARIO, :ME_ASSUNTO, :ME_MENSAGEM, :ME_DATAHORA, :ME_VISTA);", $dados);
	
	header("Location: mensagens.php");
	
	// Verificar se o ID do utilizador é igual ao ID do remetente!
}
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Nova mensagem</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- fullCalendar 2.2.5-->
    <link href="plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
	<!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
		 folder instead of downloading all of them to reduce the load. -->
	<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtmhl5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	
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
			Nova mensagem
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active"><a href="mensagens.php">Mensagens</a></li>
			<li class="active"><a href="#">Nova mensagem</a></li>
		  </ol>
		</section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Escrever uma nova mensagem</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
					<form role="form" method="post" action="nova-mensagem.php" enctype="multipart/form-data">
					  <div class="form-group">
						<select class="form-control" name="msg_dest" id="msg_dest">
								<option value="0">-- Seleccione o destinatário --</option>
								 <?php
									if($utilizadores != null) {
										for($i = 0; $i<count($utilizadores); $i++) {
											echo '<option value="'. $utilizadores[$i]->getID().'">'. $utilizadores[$i]->getNomeCompleto() . '</option>';
										}
									}
							?>
							</select>
					  </div>
					  <div class="form-group">
						<input class="form-control" placeholder="Assunto" name="msg_assunto" id="msg_assunto"/>
					  </div>
					  <div class="form-group">
						<textarea id="compose-textarea" class="form-control" style="height: 300px" name="msg_corpo" id="msg_corpo">
						  <h1><u>Apps MEO Music com mais de 1 milhão de downloads</u></h1>
						  <h4>Sub-titulo</h4>
						  <p>Os serviços de música via Streaming estão na moda. A nível mundial o Spotify lidera a preferência dos utilizadores à  mas em Portugal está disponível o Meo Music da Portugal Telecom. O serviço está disponível para utilizadores de todas as redes móveis nacionais, com vantagens exclusivas para clientes MEO.</p>
						  <ul>
							<li>Item um</li>
							<li>Item dois</li>
							<li>Item três</li>
						  </ul>
						  <p>Fica bem,</p>
						  <p>Zé Tobias</p>
						</textarea>
					  </div>
					  <div class="form-group">
						<div class="btn btn-default btn-file">
						  <i class="fa fa-paperclip"></i> Anexo
						  <input type="file" name="anexo" id="anexo"/>
						</div>
						<p class="help-block">Max. 2MB</p>
					  </div>
					</div><!-- /.box-body -->
					<div class="box-footer">
					  <div class="pull-right">
						<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
					  </div>
					  <a href="mensagens.php" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
					</div><!-- /.box-footer -->
				</form>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
	<!-- SlimScroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- FastClick -->
	<script src='plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js" type="text/javascript"></script>
	<!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
  </body>
</html>