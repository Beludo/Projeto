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
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding: 5px 5px" href="./index.php"><img src="./imagens/logotipo-pequeno-menu.png" alt="logotipo" style="margin-top:0px;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="./index.php">Página Inicial</a>
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
                    <li  class="active"><a href="contatos.php">Informações</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Iniciar sessão</a>
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

        <div class="jumbotron" style="margin:1px; padding-bottom:1px;">
            <img src="./imagens/logotipo-banner.png" alt="logotipo">
        </div>
        <!-- /banner -->
        
         <!-- BREADCRUMB -->
        <ol class="breadcrumb" style="margin-bottom:1px;">
            <li><a href="index.php">Página Inicial</a>
            </li><li><a href="contatos.php">Informações</a>
            </li>
            <li class="active">Contatos</li>
        </ol>
		
		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
			<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
			  <a href="contatos.php" class="list-group-item">Contatos</a>
			  <a href="horario.php" class="active list-group-item">Horário de Funcionamento</a>
			  <a href="mapasite.php" class="list-group-item">Mapa do Site</a>
			  <a href="normas.php" class="list-group-item">Normas de Conduta</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;">
               Conteudo principal <br>
                    Linha 1 <br>
                    Linha 2 <br>
                    Linha 3 <br>
        </div>
		<!-- Acaba o conteudo -->
		
	</div>
    
     <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

</body>

</html>