<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Museu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
</head>

<body style="height:2000px;">
    <!-- TIRAR DEPOIS O 2000 QUANDO NAO PRECISARMOS!!! -->
    
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
                    <li class="active"><a href="exposicoes.php">Exposições</a>
                    </li>
                    <li><a href="#">Ligações</a>
                    </li>
                    <li><a href="#">Atividades</a>
                    </li>
                    <li><a href="#">Contatos</a>
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
            <li>Página Inicial
            </li>
            <li class="active">Exposições</li>
        </ol>
        
        
        <!-- Opções Laterais -->
        <div id="sub-menu" style="float:left; margin:1px; width:10%;">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active" style="background-color: grey"><a href="#">Exposições Atuais</a></li>
                <li role="presentation"><a href="#">Exposições Feitas</a></li>
                <li role="presentation"><a href="#">Exposições Reservadas</a></li>
            </ul>
        </div>

</body>

</html>