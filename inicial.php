<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
	<!-- MENU!! -->
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
					<li><a href="index.php">Página Inicial</a>
					</li>
					<li><a href="visitavirtual.php">Visita virtual</a>
					</li>
					<li><a href="loja.php">Loja</a>
					</li>
					<li><a href="exposicoes.php">Exposições</a>
					</li>
					<li><a href="eventos.php">Eventos</a>
					</li>
					<li><a href="contatos.php">Informações</a>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" role="menu" aria-labelledby="menu1" style="z-index: 1">
						<a id="menu1" data-toggle="dropdown">Zé Tobias<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
							<li><a href="area-cliente.php">Área de Cliente</a>
							</li>
							<li><a href="carrinho.php">Carrinho de Compras</a>
							</li>
							<li><a href="#">Terminar Sessão</a>
							</li>
						</ul>
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

		<!-- /banner -->
		<div class="jumbotron" style="margin:0px; margin-bottom:1px; padding-bottom:1px;">
			<img src="./imagens/logotipo-banner.png" alt="logotipo">
		</div>
		<!-- /Acaba o banner -->

        <!-- BREADCRUMB -->
        <ol class="breadcrumb" style="margin-bottom:0px;">
            <li class="active">Página Inicial
            </li>
        </ol>


        <!-- Informações Laterais -->
        <div style="float:left; margin-top:10px; margin-right:0px; width:25%;">

            <!-- Primeiro Painel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Noticias</h3>
                </div>
                <div class="panel-body">
                    Noticia 1
                    <br> Noticia 2
                    <br> Noticia 3
                    <br> Noticia 4
                    <br>
                </div>
            </div>

            <!-- Segundo Painel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Outras Cenas</h3>
                </div>
                <div class="panel-body">
                    Outras cenas 1
                    <br> Outras cenas 2
                    <br> Outras cenas 3
                    <br> Outras cenas 4
                    <br>
                </div>
            </div>
        </div>

        <div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;">
            Conteudo principal
            <br> Linha 1
            <br> Linha 2
            <br> Linha 3
            <br>
        </div>

    </div>

    <!-- RODAPÉ!! -->
    <?php include "inc-rodape.php" ?>
    <!-- Acaba RODAPÉ!! -->


</html>