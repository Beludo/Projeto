<?php
	include_once "acessobd.php";
	
	$mostra_password = "";
	
	$bd = new BaseDados();
	
	// recuperar a password
	if(isset($_POST["email"]) && !empty($_POST["email"])){

		$sql = 'SELECT * FROM utilizadores WHERE U_EMAIL = :U_EMAIL';
		
		$dados = array(
            'U_EMAIL' => $_POST["email"]
        );

        $dados_bd = $bd->query($sql, $dados);
		
		if(count($dados_bd) > 0){
		
			// gerar uma password aleatoria
			$alfabeto = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$nova_pass = "";
			for($i=0; $i < 10; $i++){
				$nova_pass = $nova_pass . $alfabeto[rand(0, strlen($alfabeto)-1)];
				$mostra_password = '<div class="alert alert-success">A sua nova password é ' . $nova_pass . '</div>';
			}
			
			$dados = array(
				"U_PASSWORD" => md5($nova_pass),
				"U_EMAIL" => $_POST["email"]
			);
			$bd->editar("UPDATE utilizadores SET U_PASSWORD = :U_PASSWORD WHERE U_EMAIL = :U_EMAIL LIMIT 1", $dados);
			
			$mensagem = '<div id="div-sucesso"><img src="img/ok.png" alt=""> Nova password: ' . $nova_pass . '</div><div><a href="index.php">Voltar ao login</a><br><br></div>';
		}else{
			$mostra_password = '<div class="alert alert-danger">Email não registado!</div>';
		}
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
        <p class="login-box-msg">Insira o seu email para recuperar a password</p>
        <form method="post" action="rec-password.php">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
			<?php
				echo $mostra_password;
            ?>
          <div class="row">
            <div class="col-xs-6">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Recuperar password"/>
            </div><!-- /.col -->
						 <div class="col-xs-6">
							 <a type="button" href="index.php" class="btn btn-danger btn-block btn-flat">Voltar</a>
            </div><!-- /.col -->
          </div>
        </form>

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