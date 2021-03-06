<?php

include_once "sessaoAtiva.php";

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">PAINEL DE CONTROLO</li>

            <?php
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1){
                ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>Geral</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="conf-gerais.php"><i class="fa fa-cog"></i> Configurações gerais</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 4){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Artigos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-artigo.php"><i class="fa fa-edit"></i> Adicionar Artigo</a>
                        </li>
                        <li><a href="gerir-artigos.php"><i class="fa fa-book"></i> Gerir Artigos</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 2){
                ?>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Loja</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-produto.php"><i class="fa fa-edit"></i> Adicionar Produto</a>
                        </li>
                        <li><a href="gerir-produtos.php"><i class="fa fa-book"></i> Gerir Produtos</a>
                        </li>
                        <li><a href="encomendas.php"><i class="fa fa-book"></i> Gerir Encomendas</a>
                        </li>
												<li class="treeview">
													<a href="#">
															<i class="fa fa-bars"></i> <span>Banner da Loja</span>
															<i class="fa fa-angle-left pull-right"></i>
													</a>
													<ul class="treeview-menu">
															<li><a href="ad-imgloja.php"><i class="fa fa-circle-o"></i> Adicionar Banner da Loja</a>
															</li>
															<li><a href="gerir-imgloja.php"><i class="fa fa-circle-o"></i> Gerir Banners</a>
															</li>
													</ul>
                				</li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 3){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Registo climatico</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="graficos-hora.php"><i class="fa fa-clock-o"></i>Por hora</a>
                        </li>
                        <li><a href="graficos-intervalo.php"><i class="fa fa-calendar"></i>Intervalo de Tempo</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Utilizadores</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-utilizador.php"><i class="fa fa-user"></i> Adicionar utilizador</a>
                        </li>
                        <li><a href="gerir-utilizadores.php"><i class="fa fa-users"></i> Gerir utilizadores</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 6){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Visitantes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="gerir-visitantes.php"><i class="fa fa-users"></i> Gerir Visitantes</a>
                        </li>
                        <li><a href="gerir-quotas.php"><i class="fa fa-eur"></i> Quotas de Sócios</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1){
                ?>
                <li class="treeview">
                    <a href="log-utilizadores.php">
                        <i class="fa fa-archive"></i>
                        <span>Log</span>
                    </a>
                </li>
                <?php
                }
            }
            ?>
			<li class="treeview">
				<a href="mailbox.html">
					<i class="fa fa-envelope"></i> <span>Mensagens</span>
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
            <?php
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 7){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-camera"></i> <span>Visita virtual</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-fotos.php"><i class="fa fa-circle-o"></i> Adicionar fotos</a>
                        </li>
                        <li><a href="gerir-visita.php"><i class="fa fa-circle-o"></i> Gerir visita virtual</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 5){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i> <span>Exposições</span>
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
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1 || $_SESSION["permissoes"][$i] == 3){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-calendar-o"></i> <span>Eventos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-eventos.php"><i class="fa fa-edit"></i> Adicionar Eventos</a>
                        </li>
                        <li><a href="gerir-eventos.php"><i class="fa fa-book"></i> Gerir Eventos</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            for($i=0; $i < sizeof($_SESSION["permissoes"]); $i++){
                if($_SESSION["permissoes"][$i] == 1){
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-calendar-o"></i> <span>Parcerias</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-parceria.php"><i class="fa fa-edit"></i> Adicionar Parcerias</a>
                        </li>
                        <li><a href="gerir-parcerias.php"><i class="fa fa-book"></i> Gerir Parcerias</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
            }
            ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>Avisos</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="ad-aviso.php"><i class="fa fa-edit"></i> Adicionar Avisos</a>
					</li>
					<li><a href="gerir-aviso.php"><i class="fa fa-book"></i> Gerir Avisos</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>Marcação de Visitas</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="gerir-marcacao.php"><i class="fa fa-book"></i> Gerir Marcação</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>Noticias</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ad-noticias.php"><i class="fa fa-circle-o"></i> Adicionar noticia</a>
                        </li>
                        <li><a href="gerir-noticias.php"><i class="fa fa-circle-o"></i> Gerir noticias</a>
                        </li>
                    </ul>
                </li>
			<li><a href="documentacao/GM_ManualUtilizador_28-06-2015_V1.0.pdf"><i class="fa fa-question-circle"></i> Ajuda</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>