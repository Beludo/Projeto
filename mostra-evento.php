<?php
	include_once "sessaoAtiva.php";
	include_once "admin/evento.php";
	include_once "admin/GereEventos.php";
	
	$gereEventos = new GereEventos();
	if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
		$evento = $gereEventos->verDadosEventos($_GET["id"]);
	}else{
		header("Location: eventos.php");
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
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="eventos" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->
	
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="eventos.php">Eventos</a>
			</li>
			<li class="active">Mostra Evento</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel panel-default" style="padding:10px; margin-top:10px;">


			<h3><?php echo $evento->getNome()?></h3>
			<hr>
			<!-- Date/Time -->
			<p><i class="fa fa-clock-o"></i> Posted on August 24, 2013 at 9:00 PM</p>

			<hr>

			<!-- Preview Image -->
			<img class="img-responsive" src="admin/img-eventos/<?php echo $evento->getFoto()?>" alt="" style="margin:auto;">

			<hr>
			<div style="padding:10px;">
				<!-- Post Content -->
				<p class="lead"><?php echo $evento->getDescricao()?></p>
			</div>
			<a class="btn btn-primary btn-flat pull-right" href="eventos.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>
			<br>
			<hr>

			<!-- Blog Comments -->

			<!-- Comments Form -->
			<div class="well">
				<h4>Deixar Comentário:</h4>
				<form role="form">
					<div class="form-group">
						<textarea class="form-control" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>

			<hr>

			<!-- Posted Comments -->

			<!-- Comment -->
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
				</div>
			</div>

			<!-- Comment -->
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					<!-- Nested Comment -->
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/64x64" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						</div>
					</div>
					<!-- End Nested Comment -->
				</div>
			</div>

		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>