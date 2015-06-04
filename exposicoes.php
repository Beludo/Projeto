<?php
	include "sessaoAtiva.php";
	include_once "/admin/GerePecas.php";
	include_once "admin/pecas.php";

$gere_artigos = new GerePecas();
$artigos = $gere_artigos ->listarArtigos();
if(isset($_GET["ativo"]) && !empty($_GET["ativo"]) &&
    isset($_GET["id"]) && !empty($_GET["id"]) &&
    isset($_GET["i"]) && !empty($_GET["i"])){
    if($_GET["ativo"] == 1){
        $artigos[$_GET["i"]]->setAtivo(false, $artigos[$_GET["i"]]->getId());
    } elseif($_GET["ativo"] == 0) {
        $artigos[$_GET["i"]]->setAtivo(true, $artigos[$_GET["i"]]->getId());
    } else {
        header("Location: gerir-artigos.php?erro=1");
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
						<img src="./admin/fotos-pecas/<?php echo $artigos[$i]->getFotografia()?>" alt="">
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