<?php
include_once "sessaoAtiva.php";

?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Caixa de entrada</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- DATA TABLES -->
	<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
		 folder instead of downloading all of them to reduce the load. -->
	<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	
	<!-- Estilos para formatar a tabela de utilizadores -->
	<style>
		.accoes-tabela{
			width: 100px;
		}
	</style>

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
			Mensagens
			<small>descrição</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active"><a href="#">Caixa de entrada</a></li>
		  </ol>
		</section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Caixa Entrada</h3>
                  <div class="box-tools pull-right">
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Titulo da mensagem</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 5 mins</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 28 mins</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 11 horas</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 15 horas</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">Ontem</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 2 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 2 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 2 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 2 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 2 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 4 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">à 12 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 12 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 14 dias</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td class="mailbox-name"><a href="read-mail.html">Diogo Alexandre</a></td>
                          <td class="mailbox-subject"><b>Aqui aparece o titulo</b> - Aqui vão aparecer os primeiros 40 caracteres da mensagem</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">à 15 dias</td>
                        </tr>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>                    
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
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
	<!-- DATA TABES SCRIPT -->
	<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- FastClick -->
	<script src='plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js" type="text/javascript"></script>
	<!-- page script -->
	<script type="text/javascript">
	  $(function () {
		$("#example1").dataTable();
		$('#example2').dataTable({
		  "bPaginate": true,
		  "bLengthChange": false,
		  "bFilter": false,
		  "bSort": true,
		  "bInfo": true,
		  "bAutoWidth": false
		});
	  });
	</script>

  </body>
</html>
