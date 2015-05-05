<!-- 

<    ?php
include_once "sessaoAtiva.php";
include_once "GereUtilizadores.php";

$gere_utilizador = new GereUtilizadores();
$utilizador = new Utilizadores(0, "username", "password", "2015/05/25", 213752357, "xpto@email.pt", "morada", "urlfotografia",0);

$utilizador = $gere_utilizador->listarUtilizador();
< ?

-->

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Gerir Utilizadores</title>
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
			Gerir Utilizadores
			<small>descrição</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active"><a href="#">Gestão de utilizadores</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">Utilizadores registados</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>Nome completo</th>
						<th>Nome de utilizador</th>
						<th>Email</th>
						<th>Estado</th>
						<th>Sócio</th>
						<th class="accoes-tabela">Acções</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Marco Beludo</td>
						<td>marcobeludo</td>
						<td>marcobeludo@hotmail.com</td>
						<td><span class="label label-success">Ativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="#"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>Diogo Ressurreição</td>
						<td>diogoalex</td>
						<td>diogoalex@hotmail.com</td>
						<td><span class="label label-danger">Desativo</span></td>
						<td><span class="label label-success">Sim</span></td>
						<td>
						  <div class="btn-group">
							<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							  <li><a href="editar-utilizador.php"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-plus-square"></i>Ativar</a></li>
							  <li><a href="#"><i class="fa fa-fw fa-minus-square"></i>Desativar</a></li>
							</ul>
						  </div>
						</td>
					  </tr>
					</tfoot>
				  </table>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
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
