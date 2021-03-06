<?php
	include_once "sessaoAtiva.php";
	include "acessobd.php";

	if(isset($_GET["id"]) && !empty($_GET["id"])){
	
		$bd = new BaseDados();
		
		// Apagar (se foi pedido)
		if(isset($_GET["apagar"]) && !empty($_GET["apagar"])){
			
		}
		
		//DELETE FROM mensagens WHERE ME_ID = 6;
	
		// Mostrar a mensagem
		$dados = array(
			'ME_REMETENTE' => $_SESSION["iduser"],
			'ME_ID' => $_GET["id"]
		);
		$mensagens = $bd->query("SELECT u.U_NOMECOMPLETO, m.ME_ID, m.ME_REMETENTE, m.ME_ASSUNTO, m.ME_MENSAGEM, m.ME_DATAHORA, m.ME_VISTA FROM mensagens m, utilizadores u WHERE m.ME_DESTINATARIO = u.U_ID AND m.ME_REMETENTE = :ME_REMETENTE AND ME_ID = :ME_ID;", $dados);		
		
	}else{
		header("Location: mensagens.php");
	}
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Ver mensagem</title>
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
	
	<!-- Função para imprimir -->
	<script>
		function imprimirMail() {
			window.print();
		}
	</script>
	
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
			Ver mensagem
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active"><a href="mensagens.php">Mensagens</a></li>
			<li class="active"><a href="#">Ver mensagem</a></li>
		  </ol>
		</section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="box-tools pull-right">
                    <a data-original-title="Previous" href="#" class="btn btn-box-tool" data-toggle="tooltip" title=""><i class="fa fa-chevron-left"></i></a>
                    <a data-original-title="Next" href="#" class="btn btn-box-tool" data-toggle="tooltip" title=""><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3><?php echo $mensagens[0]["ME_ASSUNTO"]; ?></h3>
                    <h5>De: <?php echo $mensagens[0]["U_NOMECOMPLETO"]; ?> <span class="mailbox-read-time pull-right"><?php echo $mensagens[0]["ME_DATAHORA"]; ?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-read-message">
                    <?php echo $mensagens[0]["ME_MENSAGEM"]; ?>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <ul class="mailbox-attachments clearfix">
                    <li>
                      <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Relatorio_Semanal_6.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-default"><i class="fa fa-reply"></i> Responder</button>
                  </div>
                  <a href="ver-mensagem.php?apagar=1&id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class="fa fa-trash-o"></i> Apagar</a>
                  <button onclick="imprimirMail()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div>
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