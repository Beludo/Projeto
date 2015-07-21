<?php
	include_once "sessaoAtiva.php";
	include_once "admin/noticia.php";
	include_once "admin/gere_noticias.php";
	
	$bd = new BaseDados();
	
	$gere_noticias = new GereNoticias();
	if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
		$noticia = $gere_noticias->verDadosNoticia($_GET["id"]);
		
		// Adicionar comentario (se for o caso)
		if(isset($_POST["comentario"]) && !empty($_POST["comentario"])){
	
			$dados = array(
				'CNOT_EVENTO' => $_GET["id"],
				'CNOT_VISITANTE' => $_SESSION["v-id"],
				'CNOT_COMENTARIO' => $_POST["comentario"],
				'CNOT_DATAHORA' => date("Y-m-d H:i:s")
			);
		
			$bd->inserir("INSERT INTO comentarios_noticias (CNOT_EVENTO, CNOT_VISITANTE, CNOT_COMENTARIO, CNOT_DATAHORA) VALUES (:CNOT_EVENTO, :CNOT_VISITANTE, :CNOT_COMENTARIO, :CNOT_DATAHORA);", $dados);
		}
		
		// Carregar os comentários do evento
		$dados = array(
			'CNOT_EVENTO' => $noticia->getId()
		);
		$comentarios = $bd->query("SELECT v.V_FOTOGRAFIA, v.V_USERNAME, cno.CNOT_COMENTARIO, cno.CNOT_DATAHORA FROM comentarios_noticias cno, eventos e, visitantes v WHERE cno.CNOT_EVENTO = e.E_ID AND cno.CNOT_VISITANTE = v.V_ID AND cno.CNOT_EVENTO = :CNOT_EVENTO;", $dados);
	}else{
		header("Location: noticias.php");
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
	<?php $pagina="noticias" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->
	
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="noticias.php">Noticias</a>
			</li>
			<li class="active">Mostra Noticia</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel panel-default" style="padding:10px; margin-top:10px;">


			<h3><?php echo $noticia->getNome()?></h3>
			<hr>
			<!-- Date/Time -->
			<p><i class="fa fa-clock-o"></i> 18 de Julho de 2013 ás 19:42</p>

			<hr>

			<!-- Preview Image -->
			<img class="img-responsive" src="admin/img-noticias/<?php echo $noticia->getFoto()?>" alt="" style="margin:auto;">

			<hr>
			<div style="padding:10px;">
				<!-- Post Content -->
				<p class="lead"><?php echo $noticia->getDescricao()?></p>
			</div>
			<a class="btn btn-primary btn-flat pull-right" href="noticias.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>
			<br>
			<hr>

			<?php 
				// Só os visitantes resgistados é que podem comentar
				if(isset($_SESSION["visit"])){
			?>
			<!-- Enviar comentario -->
			<div class="well">
				<h4>Deixar Comentário:</h4>
				<form role="form" method="post" action="mostra-noticias.php?id=<?php echo $_GET["id"]; ?>">
					<div class="form-group">
						<textarea class="form-control" rows="3" name="comentario" id="comentario"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
			<hr>
			<?php
				}else{
			?>
				<div class="well">
				<h4>Inicie sessão para comentar - <a href="login.php">Iniciar sessão</a></h4>
				</div>
				<hr>
			<?php
				}
			?>

			<!-- Comentarios -->
			<?php 
				for($i=0; $i<count($comentarios); $i++){
			?>
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" style="width:64px; height:64px;" src="fotos/<?php echo $comentarios[$i]["V_FOTOGRAFIA"]; ?>" alt="Imagem do utilizador">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $comentarios[$i]["V_USERNAME"]; ?>
							<small><?php echo $comentarios[$i]["CNOT_DATAHORA"]; ?></small>
						</h4><?php echo nl2br($comentarios[$i]["CNOT_COMENTARIO"]); ?>
					</div>
				</div>
			<?php
				}
			?>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>