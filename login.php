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
		</div>
		<!-- fim login - container -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</html>