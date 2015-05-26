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
			<a class="navbar-brand" style="padding: 5px 5px" href="index.php"><img src="./imagens/logotipo-pequeno-menu.png" alt="logotipo" style="margin-top:0px;">
			</a>
		</div>

		<!-- Guardar as opções de menu para o menu movel (lá pra cima) -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php echo($pagina=="index" ? "class=\"active\"" : ""); ?>> <a href="index.php">Página Inicial</a>
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
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
				<?php
					if(isset($_SESSION["user"])){
						echo '<a href="perfil.php">' . $_SESSION["user"] . '</a> <a href="login.php?logout=1">Logout</a>';
					}else{
						echo '<a href="login.php">Iniciar sessão</a>';
					}
				?>
				</li>
			</ul>

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
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/1140x150" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/1140x150" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/1140x150" alt="">
								</a>
							</div>
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