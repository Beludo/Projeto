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
				<li class="active"><a href="index.php">Página Inicial</a>
				</li>
				<li><a href="#">Visita virtual</a>
				</li>
				<li><a href="#">Loja</a>
				</li>
				<li><a href="exposicoes.php">Exposições</a>
				</li>
				<li><a href="#">Ligações</a>
				</li>
				<li><a href="#">Atividades</a>
				</li>
				<li><a href="contatos.php">Informações</a>
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
			</form></li>
			
			</ul>
			
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>