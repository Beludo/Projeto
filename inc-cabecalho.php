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
				<li <?php echo($pagina=="index" ? "class=\"active\ "" : ""); ?>><a href="index.php">Página Inicial</a>
				</li>
				<li <?php echo($pagina=="visitavirtual" ? "class=\"active\ "": ""); ?>><a href="visitavirtual.php">Visita virtual</a>
				</li>
				<li <?php echo($pagina=="loja" ? "class=\"active\ "": ""); ?>><a href="loja.php">Loja</a>
				</li>
				<li <?php echo($pagina=="exposicoes" ? "class=\"active\ "": ""); ?>><a href="exposicoes.php">Exposições</a>
				</li>
				<li <?php echo($pagina=="eventos" ? "class=\"active\ "": ""); ?>><a href="eventos.php">Eventos</a>
				</li>
				<li <?php echo($pagina=="informacoes" ? "class=\"active\ "": ""); ?>><a href="contatos.php">Informações</a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php">Iniciar sessão</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<form class="navbar-form navbar-left" role="search" method="POST">
						<input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Search">
					</form>
				</li>

			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>