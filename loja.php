<?php
	include "sessaoAtiva.php";
	include_once "admin/GereLoja.php";
	include_once "admin/ALoja.php";
	include_once "admin/gere_imgloja.php";
	include_once "admin/imgloja.php";

$gere_produtos = new GereLoja();
$gere_imgloja = new gere_imgloja();
$produtos = $gere_produtos ->listarProdutosAtivos();
$imagens = $gere_imgloja->listarImgAtivo();
if(isset($_GET["ativo"]) && !empty($_GET["ativo"]) &&
    isset($_GET["id"]) && !empty($_GET["id"]) &&
    isset($_GET["i"]) && !empty($_GET["i"])){
    if($_GET["ativo"] == 1){
        $produtos[$_GET["i"]]->setAtivo(false, $produtos[$_GET["i"]]->getId());
		} elseif($_GET["ativo"] == 0) {
        $produtos[$_GET["i"]]->setAtivo(true, $produtos[$_GET["i"]]->getId());
		} else {
        header("Location: gerir-produtos.php?erro=1");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
	<!-- MENU!! -->
	<?php $pagina="loja" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->


		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Loja</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="float:right; padding:10px; width:100%;">

			<div class="row carousel-holder center-block" style="height: 200px; width: 800px;">

					<div id="slide_loja" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php
                      if($imagens != null) {
                          for($i = 0; $i<count($imagens); $i++) {
                      ?>
							<li data-target="#slide_loja" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) {echo 'active';} ?>"></li>
							<?php
											}
													}
							?>
						</ol>
						<div class="carousel-inner">	
							<?php
                      if($imagens != null) {
                          for($i = 0; $i<count($imagens); $i++) {
                      ?>
						<div class="item <?php if($i == 0) {echo ' active';} ?>">
							<a href="#"><img class="slide-image" src="admin/img-loja/<?php echo $imagens[$i]->getFicheiro(); ?>" alt="" style="height: 200px; width: 800px;"></a>
						</div>
					<?php
							}
						}
							?>
						</div>
						<a class="left carousel-control" href="#slide_loja" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#slide_loja" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
			

			</div>

			<div class="row" style="padding-top: 15px;">
				<?php
                      if($produtos != null) {
                          for($i = 0; $i<count($produtos); $i++) {
                      ?>
				<div class="col-sm-3 col-lg-3 col-md-3">
					<div class="thumbnail">
						<a href="mostra-produto.php?id=<?php echo $produtos[$i]->getId() ?>"><img src="admin/img-produtos/<?php echo $produtos[$i]->getFotografia()?>" height="320px" width="150px" alt="">
						</a>
						<div class="caption">
							<h4 class="pull-right"><?php echo $produtos[$i]->getPreco() ?>€</h4>
							<h4><a href="mostra-produto.php?id=<?php echo $produtos[$i]->getId() ?>"><?php echo $produtos[$i]->getNome() ?></a>
                                </h4>
							<p><?php echo $produtos[$i]->getObservacoes() ?></p>
						</div>
					</div>
				</div>
					<?php
							}
						}
							?>

			</div>

			<!-- Pagination -->
			<div class="row text-center">
				<div class="dataTables_paginate paging_bootstrap">
					<ul class="pagination">
							<li class="prev disabled"><a href="#">← Previous</a></li>
							<li class="active"><a href="#">1</a></li>
							<li class="next disabled"><a href="#">Next → </a></li>
					</ul>
				</div>
			</div>

			<!--/. Pagination -->

		</div>

		<!-- /.container -->


	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>
</html>