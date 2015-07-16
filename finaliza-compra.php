<?php

include "sessaoAtiva.php";
include "GereCarrinho.php";

if(isset($_POST["metodo"]) && !empty($_POST["metodo"]) &&
   isset($_POST["peso"]) && !empty($_POST["peso"]) &&
   isset($_POST["preco"]) && !empty($_POST["preco"]) &&
    isset($_POST["idCarrinho"]) && !empty($_POST["idCarrinho"])){
    $peso = $_POST["peso"];
    $preco = $_POST["preco"];
    $idCarrinho = $_POST["idCarrinho"];
    $gereCarrinho = new GereCarrinho();
    $metodo = $gereCarrinho->verMetodo($_POST["metodo"], $peso);
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
<?php $pagina="finaliza-carrinho" ; include "inc-cabecalho.php" ?>
<!-- Acaba MENU!! -->

<!-- /conteudo -->
<div>

    <!-- BREADCRUMB -->
    <ol class="breadcrumb" style="margin-bottom:1px;">
        <li><a href="loja.php">Carrinho</a>
        </li>
        <li class="active">Finalizar Carrinho</li>
    </ol>

    <!-- Conteudo -->
    <div class="panel-default" style="margin-top:10px;">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h5><span class="glyphicon glyphicon-shopping-cart"></span>Métodos de Entrega</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
           <span>Preço total a Pagar
               <?php
                     echo $preco;
               ?>
               € + Portes de Envio
               <?php
               if($metodo[0]["T_PRECO"] == 0)
                   echo 0;
               else
                   echo $metodo[0]["T_PRECO"];
               ?>
               €
           </span>
            <br>
            <span><strong>Total a Pagar =
                <?php
                echo $preco += $metodo[0]["T_PRECO"];
                ?>
                    €</strong>
            </span>

        </div>
        <form method="post" action="finaliza-compra.php" enctype="multipart/form-data">
        <div class="col-xs-3">
            <input type="hidden" value="<?php echo $metodo[0]["T_ID"]; ?>" name="metodoFinal">
            <input type="hidden" value="<?php echo $idCarrinho; ?>" name="idCarrinho">
            <input type="hidden" value="<?php echo $preco; ?>" name="preco">
            <button type="submit" class="btn btn-success btn-block">
                Finalizar
            </button>
        </div>
        </form>
    </div>
</div>
<!-- Acaba o conteudo -->

<!-- RODAPÉ!! -->
<?php include "inc-rodape.php" ?>
<!-- Acaba RODAPÉ!! -->

</body>

</html>
<?php
} elseif(isset($_POST["metodoFinal"]) && !empty($_POST["metodoFinal"]) &&
         isset($_POST["idCarrinho"]) && !empty($_POST["idCarrinho"]) &&
        isset($_POST["preco"]) && !empty($_POST["preco"])) {
    $gereCarrinho = new GereCarrinho();
    $gereCarrinho->finalizarCarrinho($_POST["idCarrinho"], $_POST["metodoFinal"], $_POST["preco"]);

}
?>