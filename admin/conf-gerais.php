<?php

include_once "sessaoAtiva.php";
include_once "acessobd.php";

$bd = new BaseDados();

// verificar se todos os campos foram preenchidos
if(
    isset($_POST["nome-museu"]) && !empty($_POST["nome-museu"]) &&
    isset($_POST["morada"]) && !empty($_POST["morada"]) &&
    isset($_POST["gmaps"]) && !empty($_POST["gmaps"]) &&
	isset($_POST["abertura"]) && !empty($_POST["abertura"]) &&
	isset($_POST["encerr"]) && !empty($_POST["encerr"]) &&
	isset($_POST["atend-tlf"]) && !empty($_POST["atend-tlf"]) &&
	isset($_POST["normas"]) && !empty($_POST["normas"]) &&
	isset($_POST["corf1"]) && !empty($_POST["corf1"]) &&
	isset($_POST["corf2"]) && !empty($_POST["corf2"]) &&
	isset($_POST["cort"]) && !empty($_POST["cort"])
){
	
    // verificar se foi escolhido um ficheiro de icone
    if(file_exists($_FILES["icone"]["tmp_name"])){

        // verificar o tipo e tamanho do ficheiro (< 2Mb)
        if(
            (($_FILES["icone"]["type"] == "image/gif") ||
                ($_FILES["icone"]["type"] == "image/jpeg") ||
                ($_FILES["icone"]["type"] == "image/jpg") ||
                ($_FILES["icone"]["type"] == "image/png")) &&
            $_FILES["icone"]["size"] < 2000000 &&
            $_FILES["icone"]["error"] == 0
        ){
            // corrigir o nome do ficheiro
            $separar = explode(".", $_FILES["icone"]["name"]);
            $ext = $separar[count($separar)-1];
            $nome_foto = "icone." . $ext;

            // apagar o ficheiro actual
            if(file_exists("img-users/" . $nome_foto)){
                unlink($nome_foto);
            }

            move_uploaded_file($_FILES["icone"]["tmp_name"], $nome_foto);


        }else{
            // mostrar mensagem de erro
            header("Location: conf-gerais.php.php?erro=1");
        }
    }else{
        // usar a foto antiga (não alterar)
        $nome_foto = $_POST["icone-original"];
    }
	
	$sql = "UPDATE conf_gerais SET CONF_NOME=:CONF_NOME, CONF_MORADA=:CONF_MORADA, CONF_GMAPS=:CONF_GMAPS, CONF_ABERTURA=:CONF_ABERTURA, CONF_ENCERR=:CONF_ENCERR, CONF_ATEND_TELEF=:CONF_ATEND_TELEF, CONF_NORMAS=:CONF_NORMAS, CONF_ICONE=:CONF_ICONE, CONF_COR_F1=:CONF_COR_F1, CONF_COR_F2=:CONF_COR_F2, CONF_COR_TXT=:CONF_COR_TXT WHERE CONF_ID=1;";
	
	$dados = array(
		'CONF_NOME' => $_POST["nome-museu"],
		'CONF_MORADA' => $_POST["morada"],
		'CONF_GMAPS' => $_POST["gmaps"],
		'CONF_ABERTURA' => $_POST["abertura"],
		'CONF_ENCERR' => $_POST["encerr"],
		'CONF_ATEND_TELEF' => $_POST["atend-tlf"],
		'CONF_NORMAS' => $_POST["normas"],
		'CONF_ICONE' => $nome_foto,
		'CONF_COR_F1' => $_POST["corf1"],
		'CONF_COR_F2' => $_POST["corf2"],
		'CONF_COR_TXT' => $_POST["cort"]
	);

    $bd->editar($sql, $dados);
}

$conf_atuais = $bd->query("SELECT * FROM conf_gerais WHERE CONF_ID = 1;");

/*
if(isset($_GET["erro"]) && !empty($_GET["erro"])){
    // erro 1 - ficheiro invalido
    $p_erro1 = '';
    if($_GET["erro"] == 1){
        $p_erro1 = ' has-error';
    }
}
*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin | Configurações gerais</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap Color Picker -->
    <link href="../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- AJAX para ver so o utilizador já está registado -->
    <script src="ajax-username.js" ></script>

    <!-- Verificações no formulario -->
    <script src="verificacoes-form.js" ></script>
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
                Configurações gerais
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li>Configurações gerais</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Dados do museu</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="conf-gerais.php" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nome do museu</label>
                                    <input type="text" class="form-control" placeholder="Insira o nome" id="nome-museu" name="nome-museu" value="<?php echo $conf_atuais[0]["CONF_NOME"]; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Morada</label>
                                    <input type="text" class="form-control" placeholder="Insira a morada" name="morada" value="<?php echo $conf_atuais[0]["CONF_MORADA"]; ?>"/>
                                </div>
								<div class="form-group">
									<label>Código do google maps (localização)</label>
									<textarea class="form-control" rows="3" id="gmaps" name="gmaps" placeholder="Insira uma descrição"><?php echo $conf_atuais[0]["CONF_GMAPS"]; ?></textarea>
								</div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Abertura</label>
                                    <input type="text" class="form-control" id="abertura" name="abertura" placeholder="Insira os dias e a hora de abertura" value="<?php echo $conf_atuais[0]["CONF_ABERTURA"]; ?>">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Encerramento</label>
                                    <input type="text" class="form-control" id="encerr" name="encerr" placeholder="Insira os dias e a hora de encerramento" value="<?php echo $conf_atuais[0]["CONF_ENCERR"]; ?>">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Horário de atendimento telefónico</label>
                                    <input type="text" class="form-control" id="atend-tlf" name="atend-tlf" placeholder="Insira o horário de atendimento" value="<?php echo $conf_atuais[0]["CONF_ATEND_TELEF"]; ?>">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Normas de conduta</label>
                                    <textarea class="form-control" rows="3" id="normas" name="normas" placeholder="Insira as normas"><?php echo $conf_atuais[0]["CONF_NORMAS"]; ?></textarea>
                                </div>
								<div class="form-group<?php echo $p_erro1; ?>">
                                    <label for="exampleInputFile">Icone</label>
									<p><img src="<?php echo $conf_atuais[0]["CONF_ICONE"]; ?>" style="height:120px;width:120px;" alt="Icone do site"></p>
									<input type="hidden" name="icone-original" value="<?php echo $conf_atuais[0]["CONF_ICONE"]; ?>">
                                    <input type="file" id="exampleInputFile" name="icone">
                                    <p class="help-block">Seleccione um icone para o site</p>
                                </div>
								<div class="form-group">
									<label>Cor de fundo 1</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="corf1" value="<?php echo $conf_atuais[0]["CONF_COR_F1"]; ?>">
								</div>
								<div class="form-group">
									<label>Cor de fundo 2</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="corf2" value="<?php echo $conf_atuais[0]["CONF_COR_F2"]; ?>">
								</div>
								<div class="form-group">
									<label>Cor do texto</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="cort" value="<?php echo $conf_atuais[0]["CONF_COR_TXT"]; ?>">
								</div>
                            </div><!-- /.box-body -->
                            <br>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>   <!-- /.row -->
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
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
</body>
</html>
