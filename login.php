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
                <a class="navbar-brand" style="padding: 5px 5px" href="#"><img src="./imagens/logotipo-pequeno-menu.png" alt="logotipo" style="margin-top:0px;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Página Inicial</a>
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
                    <li class="active"><a href="#">Iniciar sessão</a>
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
        <ol class="breadcrumb" style="margin-bottom:1px;">
            <li><a href="index.php">Página Inicial</a>
            </li>
            <li class="active">Autenticação</li>
        </ol>
        
        <!-- login - container -->
        
    <div class="panel panel-default" style="padding:10px; margin: auto; margin-top: 10px; max-width: 350px;">


        <form class="form-signin">
            <h2 class="form-signin-heading">Autenticação</h2>
            <input type="text" class="form-control" placeholder="Utilizador" title="Introduza o seu nome de utilizador" autofocus>
            <input type="password" class="form-control" placeholder="Palavra-passe" title="Introduza a sua palavra-passe de autenticação">
            <br>
            <label class="">
                <a href="esquecer_pass.html">Esqueceu-se da palavra-passe?</a>
            </label>
            <a class="btn btn-lg btn-primary btn-block" title="Pressione para concluir a autenticação" href="inicial.php">Entrar</a>
        </form>
        </div> <!-- fim login - container -->

    </div>
        
        
       
        
        
    </div>
 <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>


</body>

</html>