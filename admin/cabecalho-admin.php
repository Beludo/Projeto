<?php
include_once "GereUtilizadores.php";
include_once "acessobd.php";

$bd = new BaseDados();

$gereUtilizadores = new GereUtilizadores();
$utilizador = $gereUtilizadores->obtemUtilizadorUsername($_SESSION["user"]);

$dados = array('ME_DESTINATARIO' => $_SESSION["iduser"]);
	
$num_mensagens = $bd->query("SELECT COUNT(m.ME_ID) as 'NUM_MENSAGENS' FROM mensagens m, utilizadores u WHERE m.ME_REMETENTE = u.U_ID AND m.ME_DESTINATARIO = :ME_DESTINATARIO AND ME_VISTA = 0;", $dados);

$n_msg = $num_mensagens[0]["NUM_MENSAGENS"];

$menu_mensagens = $bd->query("SELECT u.U_NOMECOMPLETO, u.U_FOTOGRAFIA, m.ME_ID, m.ME_REMETENTE, m.ME_ASSUNTO, SUBSTR(m.ME_MENSAGEM, 1, 20) as 'MSG', m.ME_DATAHORA, m.ME_VISTA FROM mensagens m, utilizadores u WHERE m.ME_REMETENTE = u.U_ID AND m.ME_DESTINATARIO = :ME_DESTINATARIO AND ME_VISTA = 0 LIMIT 5;", $dados);

// Mostra o tempo passado desde o tempo passado por parâmetro
function tempo_passado($tempo){
	$tempo_contar = time() - $tempo;

	if ($tempo_contar < 1){
		return 'agora!';
	}

	// Quantidade de sugundos correspondente
	$valores = array(
		31536000  =>  'ano',
		2592000  =>  'mês',
		86400  =>  'dia',
		3600  =>  'hora',
		60  =>  'minuto',
		1  =>  'segundo'
	);
	
	// Nomes a apresentar
	$nomes_mostrar = array(
		'ano'   => 'anos',
		'mês'  => 'meses',
		'dia'    => 'dias',
		'hora'   => 'horas',
		'minuto' => 'minutos',
		'segundo' => 'segundos'
	);

	// Retirar anos, meses, etc até não haverem mais segundos (resto da divisão)
	foreach ($valores as $segundos => $str){
		$d = $tempo_contar / $segundos;
		if ($d >= 1){
			$r = round($d);
			return 'há ' . $r . ' ' . ($r > 1 ? $nomes_mostrar[$str] : $str);
		}
	}
}

?>

<header class="main-header">
		<a href="info-gerais.php" class="logo"><b>Admin</b>Backoffice</a>
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
				  <span class="label label-success"><?php echo $num_mensagens[0]["NUM_MENSAGENS"]; ?></span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header">Tem <?php echo $n_msg . ($n_msg == 1 ? ' mensagem nova' : ' mensagens novas'); ?></li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu">
					<?php 
						for($i=0; $i<count($menu_mensagens); $i++){
					?>
					  <li>
						<a href="ver-mensagem.php?id=<?php echo $menu_mensagens[$i]["ME_ID"]; ?>">
						  <div class="pull-left">
							<img src="img-users/<?php echo $menu_mensagens[$i]["U_FOTOGRAFIA"]; ?>" class="img-circle" alt="Imagem do utilizador"/>
						  </div>
						  <h4>
							<?php echo $menu_mensagens[$i]["ME_ASSUNTO"]; ?>
							<small><i class="fa fa-clock-o"></i> <?php echo tempo_passado(strtotime($menu_mensagens[$i]["ME_DATAHORA"])); ?></small>
						  </h4>
						  <p><?php echo strip_tags($menu_mensagens[$i]["MSG"]); ?></p>
						</a>
					  </li>
					  <?php
						  }
					  ?>
					</ul>
				  </li>
				  <li class="footer"><a href="mensagens.php">Ver todas as mensagens</a></li>
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
				  <img src="img-users/<?php echo $utilizador->getFotografia(); ?>" class="user-image" alt="User Image"/>
				  <span class="hidden-xs"><?php echo $_SESSION["user"]; ?></span>
				</a>
				<ul class="dropdown-menu">
				  <!-- Imagem grande do utilizador (160x160 pixels) -->
				  <li class="user-header">
					<img src="img-users/<?php echo $utilizador->getFotografia(); ?>" class="img-circle" alt="User Image" />
					<p>
					  <?php echo $_SESSION["user"]; ?>
					  <small>Membro desde Abril de 2015</small>
					</p>
					</li>
				  <!-- Menu Footer-->
				  <li class="user-footer">
					<div class="pull-left">
					  <a href="perfil.php" class="btn btn-default btn-flat">Perfil</a>
					</div>
					<div class="pull-right">
					  <a href="login.php?logout=1" class="btn btn-default btn-flat">Terminar sessão</a>
					</div>
				  </li>
				</ul>
			  </li>
			</ul>
		  </div>
		</nav>
	  </header>