<?php
	include "sessaoAtiva.php";
    include "admin/GereLoja.php";
    include "GereCarrinho.php";
    $gereLoja = new GereLoja();
    $gereCarrinho = new GereCarrinho();
    $produto = $gereLoja->verProdutoId($_GET["id"]);

    if(isset($_POST["quantidade"]) && !empty($_POST["quantidade"])){
        $gereCarrinho->adicionaProduto($_GET["id"], $_SESSION["visit"], $_POST["quantidade"]);
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
	<?php $pagina="mostra-produto" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->

		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="loja.php">Loja</a>
			</li>
			<li class="active"><?php echo $produto[0]["LA_NOME"]  ?></li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

			<div class="container">
				<!-- details-photo -->
				<div class="details-photo col-sm-5">
					<a href="#"><img class="img-responsive" src="admin/img-produtos/<?php echo $produto[0]["LA_FOTOGRAFIA"]?>" height="400" width="350">
					</a>
				</div>
				<!-- .details-photo -->


				<!-- Sidebar Grid -->
				<div class="col-sm-6 details-right">

					<div class="col-md-6 pull-left">
						<h3 class="h3"><a href="#"><strong><?php echo $produto[0]["LA_NOME"]?></strong></a></h3>
						<p class="product-code">Código do Produto: <strong><?php echo $produto[0]["LA_CODIGO"]?></strong>
						</p>
					</div>

					<div class="col-md-6 pull-right text-right">
						<h1 class="big-price"><strong><?php echo $produto[0]["LA_PRECO"]?>€</strong></h1>
					</div>

					<div class="clearfix"></div>
					<hr />

					<div class="col-md-12">
						<form method="post" class="form-horizontal" action="mostra-produto.php?id=<?php echo $produto[0]["LA_ID"] ?>" role="form" enctype="multipart/form-data">
							<div class="form-group">
								<label for="quantity" class="col-sm-2 control-label">Quantidade</label>
								<div class="col-xs-9">
									<input style="max-width: 50px;" id="quantity" type="number" min="1" max="<?php echo $produto[0]["LA_STOCK"]; ?>" value="1" name="quantidade" />
								</div>
                                <br>
                            <div class="col-md-12 text-center">
                                <?php
                                if(!empty($_SESSION["visit"]) ){
                                ?>
                                <button type="submit" id="loadToSuccess" class="btn btn-primary-custom btn-lg pull-left"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button>
                                <?php
                                } else {
                                ?>
                                <a href="login.php"><button type="button" id="loadToSuccess" class="btn btn-primary-custom btn-lg pull-left"><i class="fa fa-shopping-cart"></i> Faça o login!</button></a>
                                <?php
                                }
                                ?>
                            </div>
						</form>
					</div>
					<hr>



					<div class="col-md-12">
						<br>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#detalhes">Detalhes</a>
							</li>
							<li><a data-toggle="tab" href="#informacao">Informação Adicional</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="detalhes">
								<h4>Informação do Produto</h4>
								<p><?php echo $produto[0]["LA_OBSERVACOES"]?></p>
							</div>

							<div class="tab-pane" id="informacao">
								<h4>Stock</h4>
								<p><?php echo $produto[0]["LA_STOCK"]?></p>
								<hr>
								<h4>Disponibilidade</h4>
								<?php
                                    if($produto[0]["LA_DISPONIBILIDADE"] == true){
                                        ?>
                                <p>Está Dísponivel</p>
                                    <?php
                                    } else {
                                        ?>
                                <p>Não está Disponivel</p>
                                   <?php } ?>
							</div>
						</div>
						<!-- tab-content-->

					</div>
					<!-- col-md-12 -->
				</div>
				<!--col-sm-6 -->
				<!-- /Sidebar Grid -->

				<div class="clearfix"></div>

			</div>
			<!-- /container -->
			<!-- /content -->
			
			<a class="btn btn-primary btn-flat pull-right" href="loja.php"><i class="fa fa-fw glyphicon glyphicon-arrow-left"></i> Voltar</a>

		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>