<?php
	include "sessaoAtiva.php";
	include_once "admin/pecas.php";
	include_once "admin/GerePecas.php";
	
	$gerePecas = new GerePecas();
	if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
		$pecas = $gerePecas->verDadosArtigo($_GET["id"]);
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
	
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="exposicoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="exposicoes.php">Exposições</a>
				</li>
			<li class="active"><?php echo $pecas->getNome()?></li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

			<div class="container">
				<!-- details-photo -->
				<div class="details-photo col-sm-5">
					<a href="#"><img class="img-responsive" style="width:350px; height: 400px;" src="admin/img-pecas/<?php echo $pecas->getFotografia() ?>">
					</a>
					<br>
				</div>
				<!-- .details-photo -->


				<!-- Sidebar Grid -->
				<div class="col-sm-6 details-right">

					<div class="col-md-12 pull-left">
						<h3 class="h3"><a href="#"><strong><?php echo $pecas->getNome()?></strong></a></h3>
						<p class="product-code">Nº de Inventário: <strong><?php echo $pecas->getNInventario()?></strong>
						</p>
					</div>

					<div class="clearfix"></div>
					<hr />
					<div class="col-md-12">
						<h4>Datação</h4>
						<p>
						<?php echo $pecas->getDatacao()?>
						</p>
						<h4>Categoria</h4>
						<p>
						<?php echo $pecas->getCategoria()?>
						</p>
						<h4>Origem</h4>
						<p>
						<?php echo $pecas->getOrigem()?>
						</p>
						<h4>Descrição</h4>
						<p><?php echo $pecas->getDescricao()?></p>
					</div>

				</div>
				<!--col-sm-6 -->
				<!-- /Sidebar Grid -->

				<div class="clearfix"></div>

			</div>
			<!-- /container -->
			<!-- /content -->
			
			<a class="btn btn-primary btn-flat pull-right" href="exposicoes.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>

		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>