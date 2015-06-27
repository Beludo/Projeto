<?php
	include "sessaoAtiva.php";
	include_once "/admin/GerePecas.php";
	include_once "admin/Pecas.php";

$gere_artigos = new GerePecas();
$artigos = $gere_artigos ->listarArtigos();

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
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Exposições</li>
		</ol>

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="#" class="list-group-item">Exposição 1</a>
				<a href="#" class="list-group-item">Exposição 2</a>
				<a href="#" class="list-group-item">Exposição 3</a>
				<a href="#" class="list-group-item">Exposição 4</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;">

			<h3>Exposições</h3>
			<hr>

			<div class="row">
						<?php
                      $artigos = $gere_artigos->listarArtigos();
                      if($artigos != null) {
                          for($i = 0; $i<count($artigos); $i++) {
                      ?>
				<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					<a class="thumbnail" href="mostra-peca.php?id=<?php echo $artigos[$i]->getId() ?>">
						<img src="admin/img-pecas/<?php echo $artigos[$i]->getFotografia()?>" alt="">
					</a>
				</div>
				<?php
							}
						}
							?>
			</div>





		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>