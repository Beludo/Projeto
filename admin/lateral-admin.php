	  <!-- Left side column. contains the logo and sidebar -->
	  <aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
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
				<i class="fa fa-dashboard"></i>
				<span>Geral</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="info-gerais.php"><i class="fa fa-dashboard"></i> Informações gerais</a></li>
				<li><a href="conf-gerais.php"><i class="fa fa-cog"></i> Configurações gerais</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-files-o"></i>
				<span>Artigos</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="ad-artigo.php"><i class="fa fa-edit"></i> Adicionar Artigo</a></li>
				<li><a href="gerir-artigos.php"><i class="fa fa-book"></i> Gerir Artigos</a></li>
			  </ul>
			</li>
			<li>
			  <a href="../widgets.html">
				<i class="fa fa-credit-card"></i>
				<span>Loja</span>
				<i class="fa fa-angle-left pull-right"></i>
				<small class="label pull-right bg-green">novo</small>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="ad-produto.php"><i class="fa fa-edit"></i> Adicionar Produto</a></li>
				<li><a href="gerir-produtos.php"><i class="fa fa-book"></i> Gerir Produtos</a></li>
			  </ul>
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
				<span>Funcionarios</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="ad-funcionario.php"><i class="fa fa-user"></i> Adicionar funcionário</a></li>
				<li><a href="gerir-funcionarios.php"><i class="fa fa-users"></i> Gerir funcionários</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-users"></i>
				<span>Utilizadores</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="ad-utilizador.php"><i class="fa fa-user"></i> Adicionar utilizador</a></li>
				<li><a href="gerir-utilizadores.php"><i class="fa fa-users"></i> Gerir utilizadores</a></li>
				<li><a href="gerir-quotas.php"><i class="fa fa-users"></i> Quotas de sócios</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="log-utilizadores.php">
				<i class="fa fa-users"></i>
				<span>Log</span>
				<span class="label label-primary pull-right">4</span>
			  </a>
			</li>
			<li class="treeview">
              <a href="mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mensagens</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="mensagens.php"><i class="fa fa-download"></i>Caixa de entrada <span class="label label-primary pull-right">13</span></a></li>
                <li><a href="nova-mensagem.php"><i class="fa fa-pencil-square-o"></i>Nova mensagem</a></li>
                <li><a href="read-mail.html"><i class="fa fa-upload"></i>Mensagens enviadas</a></li>
              </ul>
            </li>
			<!--
			<li class="treeview active">
			  <a href="#">
				<i class="fa fa-users"></i>
				<span>Utilizadores</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li class="active"><a href="#"><i class="fa fa-user"></i> Adicionar utilizador</a></li>
				<li><a href="gerir-utilizadores.php"><i class="fa fa-users"></i> Gerir utilizadores</a></li>
			  </ul>
			</li>
			-->
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-camera"></i> <span>Visita virtual</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="general.html"><i class="fa fa-circle-o"></i> Adicionar fotos</a></li>
				<li><a href="gerir-visita.php"><i class="fa fa-circle-o"></i> Gerir visita virtual</a></li>
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