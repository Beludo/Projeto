<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">PAINEL DE CONTROLO</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-dashboard"></i>
					<span>Geral</span><!-- retirar --><small class="label pull-right bg-red">Não</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="info-gerais.php"><i class="fa fa-dashboard"></i> Informações gerais</a>
					</li>
					<li><a href="conf-gerais.php"><i class="fa fa-cog"></i> Configurações gerais</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>Artigos</span><!-- retirar --><small class="label pull-right bg-green">feito!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-artigo.php"><i class="fa fa-edit"></i> Adicionar Artigo</a>
					</li>
					<li><a href="gerir-artigos.php"><i class="fa fa-book"></i> Gerir Artigos</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-shopping-cart"></i>
					<span>Loja</span><!-- retirar --><small class="label pull-right bg-red">não</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-produto.php"><i class="fa fa-edit"></i> Adicionar Produto</a>
					</li>
					<li><a href="gerir-produtos.php"><i class="fa fa-book"></i> Gerir Produtos</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-bar-chart-o"></i>
					<span>Registo climatico</span><!-- retirar --><small class="label pull-right bg-green">feito!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="graficos-hora.php"><i class="fa fa-clock-o"></i>Por hora</a>
					</li>
					<li><a href="graficos-intervalo.php"><i class="fa fa-calendar"></i>Intervalo de Tempo</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i>
					<span>Utilizadores</span><!-- retirar --><small class="label pull-right bg-green">Feito</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-utilizador.php"><i class="fa fa-user"></i> Adicionar utilizador</a>
					</li>
					<li><a href="gerir-utilizadores.php"><i class="fa fa-users"></i> Gerir utilizadores</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i>
					<span>Visitantes</span><!-- retirar --><small class="label pull-right bg-yellow">Parcial!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="gerir-visitantes.php"><i class="fa fa-users"></i> Gerir Visitantes</a>
					</li>
					<li><a href="gerir-quotas.php"><i class="fa fa-eur"></i> Quotas de Sócios</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="log-utilizadores.php">
					<i class="fa fa-archive"></i>
					<span>Log</span><!-- retirar --><small class="label pull-right bg-green">feito!</small><!-- retirar até aqui -->
				</a>
			</li>
			<li class="treeview">
				<a href="mailbox.html">
					<i class="fa fa-envelope"></i> <span>Mensagens</span><!-- retirar --><small class="label pull-right bg-red">não!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="mensagens.php"><i class="fa fa-inbox"></i>Caixa de entrada</a>
					</li>
					<li><a href="nova-mensagem.php"><i class="fa fa-pencil-square-o"></i>Nova mensagem</a>
					</li>
					<li><a href="mensagens-enviadas.php"><i class="fa fa-upload"></i>Mensagens enviadas</a>
					</li>
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
					<i class="fa fa-camera"></i> <span>Visita virtual</span><!-- retirar --><small class="label pull-right bg-red">não!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-fotos.php"><i class="fa fa-circle-o"></i> Adicionar fotos</a>
					</li>
					<li><a href="gerir-visita.php"><i class="fa fa-circle-o"></i> Gerir visita virtual</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-bars"></i> <span>Exposições</span><!-- retirar --><small class="label pull-right bg-green">feito!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-exposicoes.php"><i class="fa fa-circle-o"></i> Adicionar Exposições</a>
					</li>
					<li><a href="gerir-exposicoes.php"><i class="fa fa-circle-o"></i> Gerir Exposições</a>
					</li>
					<li class="treeview">
				<a href="#">
					<i class="fa fa-bars"></i> <span>Tipo de Exposições</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-tipoexp.php"><i class="fa fa-circle-o"></i> Adicionar Tipo de Exposições</a>
					</li>
					<li><a href="gerir-tipoexp.php"><i class="fa fa-circle-o"></i> Gerir Tipo de Exposições</a>
					</li>
				</ul>
			</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa  fa-calendar-o"></i> <span>Eventos</span><!-- retirar --><small class="label pull-right bg-green">feito!</small><!-- retirar até aqui -->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-eventos.php"><i class="fa fa-edit"></i> Adicionar Eventos</a>
					</li>
					<li><a href="gerir-eventos.php"><i class="fa fa-book"></i> Gerir Eventos</a>
					</li>
				</ul>
			</li>
			<li><a href="documentation/index.html"><!-- retirar --><small class="label pull-right bg-red">Manual!</small><!-- retirar até aqui --><i class="fa fa-question-circle"></i> Ajuda</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>