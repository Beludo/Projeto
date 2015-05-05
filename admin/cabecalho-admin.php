<?php
include_once "GereUtilizadores.php";

$gereUtilizadores = new GereUtilizadores();
$utilizador = $gereUtilizadores->obtemUtilizadorUsername($_SESSION["user"]);

?>

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
				  <!-- Imagem do icone do utilizador (160x160 pixels) -->
				  <img src="<?php echo $utilizador->getFotografia(); ?>"class="user-image" alt="User Image"/>
				  <span class="hidden-xs"><?php echo $_SESSION["user"]; ?></span>
				</a>
				<ul class="dropdown-menu">
				  <!-- Imagem grande do utilizador (160x160 pixels) -->
				  <li class="user-header">
					<img src="<?php echo $utilizador->getFotografia(); ?>" class="img-circle" alt="User Image" />
					<p>
					  <?php echo $_SESSION["user"]; ?> - Administrador
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