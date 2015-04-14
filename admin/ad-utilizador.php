<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Admin | Adicionar Utilizador</title>
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
	  
	  <header class="main-header">
		<a href="index2.html" class="logo"><b>Admin</b>Backoffice</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
		  <!-- Sidebar toggle button-->
		  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Ativar navegação</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
			  <!-- Messages: style can be found in dropdown.less-->
			  <li class="dropdown messages-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-envelope-o"></i>
				  <span class="label label-success">4</span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header">Tem 4 mensagens novas</li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu">
					  <li><!-- start message -->
						<a href="#">
						  <div class="pull-left">
							<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="Imagem do utilizador"/>
						  </div>
						  <h4>
							Equipa de suporte
							<small><i class="fa fa-clock-o"></i> 5 mins</small>
						  </h4>
						  <p>Heyyyy</p>
						</a>
					  </li><!-- end message -->
					  <li>
						<a href="#">
						  <div class="pull-left">
							<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
						  </div>
						  <h4>
							Boa tarde
							<small><i class="fa fa-clock-o"></i> 2 hours</small>
						  </h4>
						  <p>Heyyyy</p>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <div class="pull-left">
							<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
						  </div>
						  <h4>
							Meu
							<small><i class="fa fa-clock-o"></i> Hoje</small>
						  </h4>
						  <p>Heyyyy ta tudo?</p>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <div class="pull-left">
							<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
						  </div>
						  <h4>
							Olá
							<small><i class="fa fa-clock-o"></i> Ontem</small>
						  </h4>
						  <p>E adeus!</p>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <div class="pull-left">
							<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
						  </div>
						  <h4>
							Coiso 1
							<small><i class="fa fa-clock-o"></i> 2 dias</small>
						  </h4>
						  <p>Descrição</p>
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer"><a href="#">Ver todas as mensagens</a></li>
				</ul>
			  </li>
			  <!-- Notifications: style can be found in dropdown.less -->
			  <li class="dropdown notifications-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-bell-o"></i>
				  <span class="label label-warning">10</span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header">Tem 10 novas notificações</li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu">
					  <li>
						<a href="#">
						  <i class="fa fa-users text-aqua"></i> Foram adicionados 5 novos utilizadores
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-warning text-yellow"></i> Texto longo para testar a folha de estiloooooooooooooooooooooooooooooooooooooooooooooooooooo
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-users text-red"></i> 5 coisas novas aconteceram
						</a>
					  </li>

					  <li>
						<a href="#">
						  <i class="fa fa-shopping-cart text-green"></i> Foram vendias 25 peças
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-red"></i> Alterou o nome de utilizador
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer"><a href="#">Ver tudo</a></li>
				</ul>
			  </li>
			  <!-- Tasks: style can be found in dropdown.less -->
			  <li class="dropdown tasks-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-flag-o"></i>
				  <span class="label label-danger">9</span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header">Tem 9 tarefas novas</li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu">
					  <li><!-- Task item -->
						<a href="#">
						  <h3>
							Especificação de software
							<small class="pull-right">20%</small>
						  </h3>
						  <div class="progress xs">
							<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
							  <span class="sr-only">20% Completo</span>
							</div>
						  </div>
						</a>
					  </li><!-- end task item -->
					  <li><!-- Task item -->
						<a href="#">
						  <h3>
							Prototipos
							<small class="pull-right">40%</small>
						  </h3>
						  <div class="progress xs">
							<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
							  <span class="sr-only">40% Completo</span>
							</div>
						  </div>
						</a>
					  </li><!-- end task item -->
					  <li><!-- Task item -->
						<a href="#">
						  <h3>
							Levantamento de requisitos
							<small class="pull-right">60%</small>
						  </h3>
						  <div class="progress xs">
							<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
							  <span class="sr-only">60% Completo</span>
							</div>
						  </div>
						</a>
					  </li><!-- end task item -->
					  <li><!-- Task item -->
						<a href="#">
						  <h3>
							Criar o repositorio
							<small class="pull-right">80%</small>
						  </h3>
						  <div class="progress xs">
							<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
							  <span class="sr-only">80% Completo</span>
							</div>
						  </div>
						</a>
					  </li><!-- end task item -->
					</ul>
				  </li>
				  <li class="footer">
					<a href="#">Ver todas as tarefas</a>
				  </li>
				</ul>
			  </li>
			  <!-- User Account: style can be found in dropdown.less -->
			  <li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
				  <span class="hidden-xs">Diogo Novais</span>
				</a>
				<ul class="dropdown-menu">
				  <!-- User image -->
				  <li class="user-header">
					<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
					<p>
					  Diogo Novais - Administrador
					  <small>Membro desde Abril de 2015</small>
					</p>
				  </li>
				  <!-- Menu Body -->
				  <li class="user-body">
					<div class="col-xs-4 text-center">
					  <a href="#">Opção 1</a>
					</div>
					<div class="col-xs-4 text-center">
					  <a href="#">Opção 2</a>
					</div>
					<div class="col-xs-4 text-center">
					  <a href="#">Opção 3</a>
					</div>
				  </li>
				  <!-- Menu Footer-->
				  <li class="user-footer">
					<div class="pull-left">
					  <a href="#" class="btn btn-default btn-flat">Perfil</a>
					</div>
					<div class="pull-right">
					  <a href="#" class="btn btn-default btn-flat">Terminar sessão</a>
					</div>
				  </li>
				</ul>
			  </li>
			</ul>
		  </div>
		</nav>
	  </header>
	  <!-- Left side column. contains the logo and sidebar -->
	  <aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
		  <!-- Sidebar user panel -->
		  <div class="user-panel">
			<div class="pull-left image">
			  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
			  <p>Diogo Novais</p>

			  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		  </div>
		  <!-- search form -->
		  <form action="#" method="get" class="sidebar-form">
			<div class="input-group">
			  <input type="text" name="q" class="form-control" placeholder="Pesquisa..."/>
			  <span class="input-group-btn">
				<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
			  </span>
			</div>
		  </form>
		  <!-- /.search form -->
		  <!-- sidebar menu: : style can be found in sidebar.less -->
		  <ul class="sidebar-menu">
			<li class="header">PAINEL DE CONTROLO</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-dashboard"></i> <span>Visão Geral</span></i>
			  </a>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-files-o"></i>
				<span>Artigos</span>
				<span class="label label-primary pull-right">4</span>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="ad-artigo.php"><i class="fa fa-edit"></i> Adicionar Artigo</a></li>
				<li><a href="gere-artigos.php"><i class="fa fa-book"></i> Gerir Artigos</a></li>
			  </ul>
			</li>
			<li>
			  <a href="../widgets.html">
				<i class="fa fa-credit-card"></i> <span>Loja</span> <small class="label pull-right bg-green">novo</small>
			  </a>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-bar-chart-o"></i>
				<span>Graficos</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="graficos-temp.php"><i class="fa fa-fire"></i> Temperatura</a></li>
				<li><a href="graficos-humid.php"><i class="fa fa-tint"></i> Humidade</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-users"></i>
				<span>Utilizadores</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-user"></i> Adicionar utilizador</a></li>
				<li><a href="gere-utilizadores.php"><i class="fa fa-users"></i> Gerir utilizadores</a></li>
			  </ul>
			</li>
			<li class="treeview active">
			  <a href="#">
				<i class="fa fa-camera"></i> <span>Visita virtual</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li class="active"><a href="general.html"><i class="fa fa-circle-o"></i> Adicionar fotos</a></li>
				<li><a href="advanced.html"><i class="fa fa-circle-o"></i> Gerir museu virtual</a></li>
			  </ul>
			</li>
			<li>
			  <a href="../calendar.html">
				<i class="fa fa-archive"></i> <span>Exposições</span>
				<small class="label pull-right bg-red">3</small>
			  </a>
			</li>
			<li>
			  <a href="../mailbox/mailbox.html">
				<i class="fa fa-calendar"></i> <span>Eventos</span>
				<small class="label pull-right bg-yellow">12</small>
			  </a>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-share"></i> <span>Menus multi-nivel</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-circle-o"></i> Nivel 1</a></li>
				<li>
				  <a href="#"><i class="fa fa-circle-o"></i> Nivel 1 <i class="fa fa-angle-left pull-right"></i></a>
				  <ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Nivel 2</a></li>
					<li>
					  <a href="#"><i class="fa fa-circle-o"></i> Nivel 2 <i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-circle-o"></i> Nivel 3</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i> Nivel 3</a></li>
					  </ul>
					</li>
				  </ul>
				</li>
				<li><a href="#"><i class="fa fa-circle-o"></i> Nivel 1</a></li>
			  </ul>
			</li>
			<li><a href="documentation/index.html"><i class="fa fa-question-circle"></i> Ajuda</a></li>
			<li class="header">AVISOS</li>
			<li><a href="#"><i class="fa fa-circle-o text-danger"></i> Importante</a></li>
			<li><a href="#"><i class="fa fa-circle-o text-warning"></i> Aviso</a></li>
			<li><a href="#"><i class="fa fa-circle-o text-info"></i> Informação</a></li>
		  </ul>
		</section>
		<!-- /.sidebar -->
	  </aside>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Adicionar Utilizador
			<small>Texto pequeno</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="#">Gestão de utilizadores</a></li>
			<li class="active">Adicionar utilizador</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">

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
					  <input type="text" class="form-control" placeholder="Insira nome"/>
					</div>
					<div class="form-group">
					  <label>Nome de utilizador</label>
					  <input type="text" class="form-control" placeholder="Insira o nome de utilizador"/>
					</div>
					<div class="form-group has-warning">
					  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Password demasiado simples!</label><br>
					  <label for="exampleInputPassword1">Password</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group has-error">
					  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> As passwords não são iguais!</label><br>
					  <label for="exampleInputPassword1">Confirmar Password</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group has-success">
					  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> O Email ta OK</label><br>
					  <label for="exampleInputEmail1">Email</label>
					  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o email">
					</div>
					<div class="form-group">
					  <label for="exampleInputFile">Foto</label>
					  <input type="file" id="exampleInputFile">
					  <p class="help-block">Seleccione uma foto de perfil.</p>
					</div>
					<div class="checkbox">
					  <label>
						<input type="checkbox"> Li e concordo com os <a href="">termos</a>
					  </label>
					</div>
				  </div><!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
				  </div>
				</form>
			  </div><!-- /.box -->

		  </div>   <!-- /.row -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  <footer class="main-footer">
		<div class="pull-right hidden-xs">
		  <b>Versão</b> 0.1
		</div>
		<strong>Copyright &copy; 2015 <a href="http://www.facebook.com/dnovais91">Novais</a>, <a href="http://www.facebook.com/diogoalexandre99">Ressureição</a> e <a href="http://www.facebook.com/marco.beludo">Beludo</a>.</strong> Todos os direitos reservados.
	  </footer>
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
