<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- O logotipo e o menu para telemovel estão agrupados -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Menu pequeno</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="padding:5px" href="index.php"><img src="./imagens/logotipo-pequeno-menu.png" alt="logotipo" style="margin-top:0px;">
			</a>
		</div>

		<!-- Guardar as opções de menu para o menu movel (lá pra cima) -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php echo($pagina=="index" ? "class=\"active\"" : ""); ?>> <a href="index.php">Página Inicial</a>
				</li>
				<li <?php echo($pagina=="noticias" ? "class=\"active\"" : ""); ?>> <a href="noticias.php">Notícias</a>
				</li>
				<li <?php echo($pagina=="visitavirtual" ? "class=\"active\"": ""); ?>><a href="visitavirtual.php">Visita virtual</a>
				</li>
				<li <?php echo($pagina=="loja" ? "class=\"active\"": ""); ?>><a href="loja.php">Loja</a>
				</li>
				<li <?php echo($pagina=="exposicoes" ? "class=\"active\"": ""); ?>><a href="exposicoes.php">Exposições</a>
				</li>
				<li <?php echo($pagina=="eventos" ? "class=\"active\"": ""); ?>><a href="eventos.php">Eventos</a>
				</li>
				<li <?php echo($pagina=="informacoes" ? "class=\"active\"": ""); ?>><a href="contatos.php">Informações</a>
				</li>
				<li <?php echo($pagina=="marcacao" ? "class=\"active\"": ""); ?>><a href="marcacao_visita.php">Marcação de Visita</a>
				</li>
			</ul>
					<?php
						if(isset($_SESSION["visit"])){
					?>
						
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown" role="menu" aria-labelledby="menu1" style="z-index: 1">
					<?php
							echo '<a id="menu1" data-toggle="dropdown" href="area-cliente.php" style="padding-top:10px;padding-bottom:8px;"><img src="fotos/' . $_SESSION["v-foto"] . '" alt="Imagem de perfil" style="width:32px;height:32px;margin-right:5px;">' . $_SESSION["visit"] . '<span class="caret"></span></a>';
					?>
									<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										<li><a href="area-cliente.php"><i class="fa fa-user"></i> Área de cliente</a>
										</li>
										<li><a href="carrinho-compras.php"><i class="fa fa-shopping-cart"></i> Carrinho de Compras</a>
										</li>
										<li><a href="iniciaSessao.php?logout=1"><i class="fa fa-sign-out"></i> Terminar Sessão</a>
										</li>
									</ul>
								</li>
							</ul>
					<?php	
						}else{
					?>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="login.php"><i class="fa fa-sign-in"></i> Iniciar sessão</a>
							</li>
						</ul>
					<?php		
						}
					?>
					
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<div class="" style="margin:1px; margin-top:50px; padding-bottom:1px;">
			
			<div class="col-md-14">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php
								include_once "admin/acessobd.php";
								$bd = new BaseDados();
								
								$imagens_cabecalho = $bd->query("SELECT * FROM img_cabecalho;");
								
								for($i=0; $i<count($imagens_cabecalho); $i++){
							?>
									<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"<?php if($i == 0) {echo ' class="active"';} ?>></li>
							<?php
								}
							?>
						</ol>
						<div class="carousel-inner">
						<?php
							for($i=0; $i<count($imagens_cabecalho); $i++){
						?>
								<div class="item<?php if($i == 0) {echo ' active';} ?>">
									<a href="#"><img class="slide-image" style="width:1140px; height:150px;" src="img-cabecalho/<?php echo $imagens_cabecalho[$i]["IR_FICHEIRO"]; ?>" alt="">
									</a>
								</div>
						<?php
							}
						?>
						<!-- exemplo
							<div class="item">
								<a href="mostra-evento.php"><img class="slide-image" src="http://placehold.it/1140x150" alt="">
								</a>
							</div>
						-->
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>

		</div>
		<!-- /banner -->