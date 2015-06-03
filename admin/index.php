<?php

session_start();

if(isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
	header("Location: gerir-utilizadores.php");
}

include_once "acessobd.php";

$bd = new BaseDados();
if($bd->contar("utilizadores") == 0){
    header("Location: index.php?erro=3");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>Admin</b>backoffice</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicie sessão para entrar na área de administração</p>
        <form method="post" action="login.php">
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
            <div class="col-xs-5">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Iniciar Sessão"/>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="rec-password.php">Esqueci-me da palavra-passe</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>