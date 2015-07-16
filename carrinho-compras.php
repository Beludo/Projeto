<?php
	include "sessaoAtiva.php";
    include_once "GereCarrinho.php";
    include_once "admin/ALoja.php";
    $metodo = null;
    if(isset($_POST["idProduto"]) && !empty($_POST["idProduto"])){
        $gereCarrinho = new GereCarrinho();
        $carrinho = $gereCarrinho->verIdCarrinho($_SESSION["visit"]);
        $metodo = $gereCarrinho->listarMetodosPagamentos();
        $gereCarrinho->removerProduto($_POST["idProduto"], $carrinho->getIdCarrinho());
    } else {
        $gereCarrinho = new GereCarrinho();
        $carrinho = $gereCarrinho->verIdCarrinho($_SESSION["visit"]);
        $metodo = $gereCarrinho->listarMetodosPagamentos();
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
	<?php $pagina="carrinho" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div>
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="loja.php">Loja</a>
			</li>
			<li class="active">Carrinho</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="margin-top:10px;">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho de Compras</h5>
							</div>
							<div class="col-xs-6">
								<a href='loja.php' type="button" class="btn btn-primary btn-sm pull-right">
									<span class="glyphicon glyphicon-share-alt"></span>Continuar a Comprar
								</a>
							</div>
						</div>
					</div>
				</div>
                <form method="post" action="finaliza-compra.php" enctype="multipart/form-data">
                    <?php
                    $produtos = $carrinho->getProduto();
                    $quantidades = $carrinho->getQuantidade();
                    $total_price = 0.00;
                    $total_peso = 0.00;
                    for($i=0; $i<sizeof($produtos); $i++){
                    ?>
				<div class="panel-body">
					<div class="row">
                        <input hidden="hidden" name="idProduto" value="<?php echo $produtos[$i]->getId(); ?>">
						<div class="col-xs-2"><img class="img-responsive" src="<?php $produtos[$i]->getFotografia() ?>">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo $produtos[$i]->getNome(); ?></strong></h4>
							<h4><small><?php echo $produtos[$i]->getObservacoes(); ?></small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $produtos[$i]->getPreco(); ?> <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<label class="form-control input-sm"><?php echo $quantidades[$i]; ?></label>
							</div>
							<div class="col-xs-2">
								<button type="submit" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
                </div>
                        <?php
                        $total_peso += $produtos[$i]->getPeso()*$quantidades[$i];
                        $total_price += $produtos[$i]->getPreco()*$quantidades[$i];
                    }
                    ?>

                    <div class="col-lg-3">
                        <?php
                        for($i=0; $i< sizeof($metodo); $i++){
                        ?>
                        <div class="input-group">
                      <span class="input-group-addon">
                        <input type="radio" aria-label="..." name="metodo" value="<?php echo $metodo[$i]["T_NOME"]; ?>">
                      </span>
                            <label class="form-control" aria-label="..."><?php echo $metodo[$i]["T_NOME"]; ?></label>
                        </div><!-- /input-group -->
                    <?php
                    }
                    ?>
                    </div><!-- /.col-lg-3 -->
                    <input hidden="hidden" name="peso" value="<?php echo $total_peso; ?>">
                    <input hidden="hidden" name="preco" value="<?php echo $total_price; ?>">
                    <input hidden="hidden" name="idCarrinho" value="<?php echo $carrinho->getIdCarrinho(); ?>">

                <hr>

					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Adicionou items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Atualizar Carrinho
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center"> 
						<div class="col-xs-9">
							<h4 class="text-right"><strong><?php echo $total_price ?>€</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-success btn-block">
								Continuar
							</button>
						</div>
					</div>
				</div>
            </form>
			</div>
		</div>
	</div>

	<!-- Acaba o conteudo -->

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>

</html>