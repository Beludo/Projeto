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
	<?php $pagina="login" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Autenticação</li>
		</ol>

		<!-- login - container -->

		<div class="panel panel-default" style="padding:10px; margin: auto; margin-top: 10px; max-width: 350px;">


			   <div class="login-box-body">
        <p class="login-box-msg">Inicie sessão para entrar na área de visitante</p>
        <form method="post" action="iniciaSessao.php">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
					<?php
              if(isset($_GET["erro"]) && !empty($_GET["erro"])){
                  if($_GET["erro"] == 1){
                      echo '<div class="alert alert-danger">Utilizador ou palavra-passe errados!</div>';
                  }

                  if($_GET["erro"] == 2){
                      echo '<div class="alert alert-danger">Não inseriu o utilizador ou palavra-passe!</div>';
                  }

              }

              if(isset($_GET["logout"]) && !empty($_GET["logout"]) && $_GET["logout"] == 1){
                  echo '<div class="alert alert-success">Acabou de fazer logout!</div>';
              }
              ?>
          <div class="row">
            <div class="col-xs-6">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Iniciar Sessão"/>
            </div><!-- /.col -->
						<div class="col-xs-6">
							<a href="registo-visitante.php"  class="btn btn-success btn-block btn-flat">Registar</a>
            </div><!-- /.col -->
          </div>
        </form>

        <br><a href="rec-password.php">Esqueci-me da palavra-passe</a><br>

      </div><!-- /.login-box-body -->
		</div>
		<!-- fim login - container -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->
</body>

</html>