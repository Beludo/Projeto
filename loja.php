<?php
	include "sessaoAtiva.php";
	include_once "./admin/GereLoja.php";
	include_once "./admin/ALoja.php";

$gere_produtos = new GereLoja();
$produtos = $gere_produtos ->listarProdutos();
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
	<link rel="stylesheet" href="./css/bootstrap.min.css">
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

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="#" class="list-group-item">Categoria 1</a>
				<a href="#" class="list-group-item">Categoria 2</a>
				<a href="#" class="list-group-item">Categoria 3</a>
				<a href="#" class="list-group-item">Categoria 4</a>
			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel-default" style="float:right; padding:10px; width:74%;">

			<div class="row carousel-holder">

				<div class="col-md-12" style="padding-bottom: 15px;">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
							<div class="item">
								<a href="mostra-produto.php"><img class="slide-image" src="http://placehold.it/800x300" alt="">
								</a>
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>

			</div>

			<div class="row">
				<?php
                      $produtos = $gere_produtos->listarProdutos();
                      if($produtos != null) {
                          for($i = 0; $i<count($produtos); $i++) {
                      ?>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<a href="mostra-produto.php?id=<?php echo $produtos[$i]->getId() ?>"><img src="./admin/img-produtos/<?php echo $produtos[$i]->getFotografia()?>" height="320px" width="150px" alt="">
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