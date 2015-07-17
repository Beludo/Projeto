<?php

include_once "sessaoAtiva.php";
include_once "../GereCarrinho.php";
include_once "ALoja.php";
include_once "GereLog.php";
include_once "../GereVisitante.php";

$gere_log = new GereLog();

$gereCarrinho = new GereCarrinho();
$gereVisitantes = new GereVisitante();
if(isset($_GET["idCarrinho"]) && !empty($_GET["idCarrinho"]) &&
    isset($_GET["visitante"]) && !empty($_GET["visitante"])){
    $idVisitante = $_GET["visitante"];
    $idCarrinho = $_GET["idCarrinho"];
    $carrinho = $gereCarrinho->buscarEncomenda($idCarrinho);
} elseif(isset($_POST["accao"]) && !empty($_POST["accao"]) &&
        isset($_POST["idCarrinho"]) && !empty($_POST["idCarrinho"])) {
    $gereCarrinho->encomendarEncomenda($_POST["idCarrinho"]);
    header("Location: encomendas.php?sucesso=true");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin | Encomenda</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Estilos para formater a tabela de produtos -->
    <style>
        td img {
            width: 90px;
            height: 90px;
        }

        .imagem-tabela{
            width: 100px;
        }

        .descricao-tabela{
            width: 150px;
        }
    </style>

</head>
<body class="skin-blue">
<div class="wrapper">

    <?php
    include("cabecalho-admin.php");
    include("lateral-admin.php");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Encomenda
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><a href="#">Encomendas</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Produtos na Encomenda</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>NOME PRODUTO</th>
                                    <th>QUANTIDADE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $produtos = $carrinho->getProduto();
                                $quantidades = $carrinho->getQuantidade();
                                $visitantes = $gereVisitantes->verDadosVisitante($idVisitante);
                                if($carrinho != null) {
                                    for($i = 0; $i<sizeof($produtos); $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $produtos[$i]->getNome(); ?></td>
                                            <td><?php echo $quantidades[$i]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                        <form action="ver-encomendas.php" method="post">
                        <div class="panel-footer">
                            <div class="row text-center">
                                <div class="col-xs-9">
                                    <h4 class="text-right"><strong><?php echo $carrinho->getPreco(); ?>€</strong></h4>
                                </div>
                                <input type="hidden" value="encomendar" name="accao">
                                <input type="hidden" value="<?php echo $idCarrinho; ?>" name="idCarrinho">
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-success btn-block">
                                        Encomendar
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php
    include("rodape-admin.php");
    ?>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>
