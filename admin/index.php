<?php

include_once "Utilizadores.php";
include_once "GereUtilizadores.php";

session_start();
// accao "logout" - terminar a sessão, se for pedido
if(
    isset($_GET["logout"]) && !empty($_GET["logout"]) &&
    !strcmp($_GET["logout"], "1")
){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();

    header("Location: ./index.php?logout=1");
    exit;
}

if(
    isset($_POST["username"]) && !empty($_POST["username"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])){

    // abrir ligação à base de dados
    $bd = new BaseDados();
    $gereUtilizador = new GereUtilizadores();
    $utilizador = new Utilizadores("", "", "", "", "", "", "", "", "", "", "", "", "");

    // carrega o utilizador com o username dado
    $utilizador = $gereUtilizador->obtemUtilizadorUsername($_POST["username"]);

    // verifica se foi carregado um objeto na variável "utilizador"
    if ($utilizador == null){
        header("Location: index.php?erro=1");
    }else{

        //verifica se o username que veio da base de dados é igual ao inserido
        if(
            !strcmp($_POST["username"], $utilizador->getUsername()) &&
            !strcmp($_POST["password"], $utilizador->getPassword()) &&
            $utilizador->getAtivo() == 1){

            // Guardar o nome de utilizador da sessão
            $_SESSION["user"] = $utilizador->getUsername();

            // Verificar se se trata de um utilizador comum ou administrador
            if($utilizador->getPermissao() == "1"){
                header("Location: Admin/gerir-utilizadores.php");
            } else {
                header("Location: loja.php");
            }

        }else{
            header("Location: index.php?erro=1");
        }
    }
}else{
    header("Location: index.php?erro=2");
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
        <form action="index.php" method="post" action="index.php">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-7">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Manter sessão iniciada
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sessão</button>
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