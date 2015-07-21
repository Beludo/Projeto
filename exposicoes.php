<?php
	include "sessaoAtiva.php";
	include_once "admin/GerePecas.php";
	include_once "admin/Pecas.php";
	include_once "admin/GereExposicoes.php";
	include_once "admin/aexposicoes.php";

$gere_artigos = new GerePecas();
$artigos = $gere_artigos ->listarArtigos();
$gere_exposicoes = new GereExposicoes();
$exposicoes = $gere_exposicoes ->listarExposicoesAtivas();

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

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width: 100%">
		<section class="panel">


				<ul class="nav nav-tabs">
					<?php
						if($exposicoes != null) {
								for($i = 0; $i<count($exposicoes); $i++) {
						?>
					
						<li <?php if($i == 0) {echo ' class="active"';} ?>>
							<a data-toggle="tab" <?php if($i == 0) {echo ' aria-expanded="true"';} ?> href="#<?php echo $exposicoes[$i]->getId(); ?>">
								<?php echo $exposicoes[$i]->getNome() ?>
							</a>
						</li>
					
						<?php
								}
							}
							?>

				</ul>
		
				<div class="tab-content">

					<?php
						if($exposicoes != null) {
								for($i = 0; $i<count($exposicoes); $i++) {
						?>
							<div id="<?php echo $exposicoes[$i]->getId(); ?>" class="tab-pane<?php if($i == 0) {echo ' active';} ?>">
								<div class="col-lg-2 col-sm-2" style="width:100%; padding-top:10px;">
										<div class="col-lg-2 col-sm-2" style="width:100%;">
													<?php
																		$artigos = $gere_artigos->listarArtigosPorExposicao($exposicoes[$i]->getId());
																		if($artigos != null) {
																				for($j = 0; $j<count($artigos); $j++) {
																		?>
													<div class="col-lg-2 col-md-3 col-xs-5 thumb">
														<a class="thumbnail" href="mostra-peca.php?id=<?php echo $artigos[$j]->getId() ?>">
															<img src="admin/img-pecas/<?php echo $artigos[$j]->getFotografia()?>" alt="">
														</a>
													</div>
													<?php
																}
															}
																?>
									</div>
								</div>
						</div>
					
						<?php
								}
							}
							?>					
				</div>
		</div>
		</section>
	
		<!-- Acaba o conteudo -->

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->
</body>

</html>