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
	<?php $pagina="informacoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->
	
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li><a href="contatos.php">Informações</a>
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
				<a href="contatos.php" class="active list-group-item">Contatos</a>
				<a href="horario.php" class="list-group-item">Horário de Funcionamento</a>
				<a href="mapasite.php" class="list-group-item">Mapa do Site</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="ligacoes.php" class="list-group-item">Ligações</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%; min-height: 205px;">

			<!-- Content Row -->
			<div class="row">
				<!-- Map Column -->
				<div class="col-md-8">
					<!-- Embedded Google Map -->
					<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d194196.948980895!2d-7.597556!3d40.4901443!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xebe374323bbcfce1!2sEscola+Secund%C3%A1ria+de+Gouveia!5e0!3m2!1sen!2s!4v1429020387178"></iframe>
				</div>
				<!-- Contact Details Column -->
				<div class="col-md-4">
					<h3>Contatos</h3>
					<hr>
					<p>
						<i class="fa fa-envelope-o"></i> Travessa Dona Eulália Tavares Ferreira
						<br>
					</p>
					<p>
						6290-335 Gouveia
						<br>Portugal
						<br>
					</p>

					<p><i class="fa fa-phone"></i> Telefone: (+351) 238491018</p>
					<p><i class="fa fa-envelope-o"></i> Email: <a href="mailto:geral@esgouveia.pt">geral@esgouveia.pt</a>
					</p>
				</div>
			</div>
			<!-- /.row -->

			<!-- Contact Form -->

			<div class="row">
				<div class="col-md-8">
					<h3>Enviar uma Mensagem</h3>
					<form name="sentMessage" id="contactForm" novalidate>
						<div class="control-group form-group">
							<div class="controls">
								<label>Nome Completo:</label>
								<input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Número Telefone:</label>
								<input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Email:</label>
								<input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Mensagem:</label>
								<textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
							</div>
						</div>
						<div id="success"></div>
						<!-- For success/fail messages -->
						<button type="submit" class="btn btn-primary">Enviar Mensagem</button>
					</form>
				</div>

			</div>
			<!-- /.row -->


		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->


</body>

</html>