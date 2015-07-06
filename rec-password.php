<?php
	include_once "admin/acessobd.php";
	
	$mostra_password = "";
	
	$bd = new BaseDados();
	
	// recuperar a password
	if(isset($_POST["email"]) && !empty($_POST["email"])){

		$sql = 'SELECT * FROM visitantes WHERE V_EMAIL = :V_EMAIL';
		
		$dados = array(
            'V_EMAIL' => $_POST["email"]
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
				"V_PASSWORD" => md5($nova_pass),
				"V_EMAIL" => $_POST["email"]
			);
			$bd->editar("UPDATE visitantes SET V_PASSWORD = :V_PASSWORD WHERE V_EMAIL = :V_EMAIL LIMIT 1", $dados);
			
			$mensagem = '<div id="div-sucesso"><img src="img/ok.png" alt=""> Nova password: ' . $nova_pass . '</div><div><a href="index.php">Voltar ao login</a><br><br></div>';
		}else{
			$mostra_password = '<div class="alert alert-danger">Email não registado!</div>';
		}
	}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
	
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="login" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Recuperação de password</li>
		</ol>

		<!-- login - container -->

		<div class="panel panel-default" style="padding:10px; margin: auto; margin-top: 10px; max-width: 350px;">


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
			</div>
        </form>
      </div><!-- /.login-box-body -->
		</div>
		<!-- fim login - container -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->
</body>
</html>
