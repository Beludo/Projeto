<?php

include "sessaoAtiva.php";

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
                            <h5><span class="glyphicon glyphicon-shopping-cart"></span> Finalizar o Carrinho</h5>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="carrinho-compras.php?sucesso=true" enctype="multipart/form-data">
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-success btn-block">
                                Finalizar
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