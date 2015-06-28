<?php

include_once "sessaoAtiva.php";

/*
$gereUtilizadores = new GereUtilizadores();
if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
    $utilizador_editar = $gereUtilizadores->verDadosUtilizador($_GET["id"]);
} else if(!empty($_POST["u_id"]) && is_numeric($_POST["u_id"])) {
    $utilizador_editar = $gereUtilizadores->verDadosUtilizador($_POST["u_id"]);
}else{
	header("Location: gerir-utilizadores.php");
}
*/


/*
// verificar se todos os campos foram preenchidos
if(
    isset($_POST["nome"]) && !empty($_POST["nome"]) &&
    isset($_POST["morada"]) && !empty($_POST["morada"]) &&
    isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
    isset($_POST["email"]) && !empty($_POST["email"])
){
	
    // verificar se foi escolhido um ficheiro de foto
    if(file_exists($_FILES["foto"]["tmp_name"])){

        // verificar o tipo e tamanho do ficheiro (< 2Mb)
        if(
            (($_FILES["foto"]["type"] == "image/gif") ||
                ($_FILES["foto"]["type"] == "image/jpeg") ||
                ($_FILES["foto"]["type"] == "image/jpg") ||
                ($_FILES["foto"]["type"] == "image/png")) &&
            $_FILES["foto"]["size"] < 2000000 &&
            $_FILES["foto"]["error"] == 0
        ){
            // corrigir o nome do ficheiro
            $separar = explode(".", $_FILES["foto"]["name"]);
            $ext = $separar[count($separar)-1];
            $nome_foto = $_POST["id"] . "." . $ext;

            // apagar o ficheiro actual
            if(file_exists("img-users/" . $nome_foto)){
                unlink("img-users/" . $nome_foto);
            }

            move_uploaded_file($_FILES["foto"]["tmp_name"], "img-users/" . $nome_foto);


        }else{
            // mostrar mensagem de erro
            header("Location: editar-utilizador.php?erro=1");
        }
    }else{
        // usar a foto antiga (n�o alterar)
        $nome_foto = $_POST["foto-original"];
    }	

    // Obter as permissoes
    $permissoesUser = new Permissoes(0, 0, 0, 0, 0, 0, 0, 0);

	if(isset($_POST["total"]) && !empty($_POST["total"])){
		if($_POST['total'] == 'sim') {
			$permissoesUser->setPermTotal("1");
		}
	}

	if(isset($_POST["loja"]) && !empty($_POST["loja"])){
		if($_POST['loja'] == 'sim') {
			$permissoesUser->setPermLoja("1");
		}
	}

	if(isset($_POST["espaco"]) && !empty($_POST["espaco"])){
		if($_POST['espaco'] == 'sim') {
			$permissoesUser->setPermEspaco("1");
		}
	}

	if(isset($_POST["inventario"]) && !empty($_POST["inventario"])){
		if($_POST['inventario'] == 'sim') {
			$permissoesUser->setPermInventario("1");
		}
	}

	if(isset($_POST["acervo"]) && !empty($_POST["acervo"])){
		if($_POST['acervo'] == 'sim') {
			$permissoesUser->setPermAcervo("1");
		}
	}

	if(isset($_POST["socios"]) && !empty($_POST["socios"])){
		if($_POST['socios'] == 'sim') {
			$permissoesUser->setPermSocios("1");
		}
	}

	if(isset($_POST["museu_virtual"]) && !empty($_POST["museu_virtual"])){
		if($_POST['museu_virtual'] == 'sim') {
			$permissoesUser->setPermMuseuVirt("1");
		}
	}
	
	// Guardar dados
	if(isset($_POST["password"]) && !empty($_POST["password"]) &&
    isset($_POST["password2"]) && !empty($_POST["password2"])){
	
		// Alterar também a password
		$gereUtilizadores->alterarPalavraPasse($_POST["password"], $_POST["u_id"]);
	}
	
	$utilizador_editado = new Utilizadores($_POST["u_id"], $_POST["nome"], "", $_POST["password"], "", $_POST["telefone"], $_POST["email"], $_POST["morada"], $nome_foto, true, $permissoesUser);
	
	$gereUtilizadores->editarUtilizador($utilizador_editado, $permissoesUser);
	
	header("Location: gerir-utilizadores.php");
	
	

	/* AQUI é EDITAR!!!
	
    $gereUtilizadores->adicionarUtilizador(new Utilizadores($utilizador->getId(), $_POST["nome"], $utilizador->getUsername(), $_POST["password"], $utilizador->getDataRegisto(), $_POST["telefone"], $_POST["email"], $_POST["morada"], $nome_foto, true, 1), $permissoesUser);
    *
	
	//$bd->editar("UPDATE empresas SET nome = :nome, email = :email, url = :url, tlf = :tlf, fax = :fax, morada = :morada, logo = :logo WHERE id = :id LIMIT 1", $dados);
}
*/

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
                        <form role="form" method="post" action="editar-utilizador.php" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nome do museu</label>
                                    <input type="text" class="form-control" placeholder="Insira o nome" id="nome-museu" name="nome-museu" value="<?php //echo $utilizador_editar->getNomeCompleto(); ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Morada</label>
                                    <input type="text" class="form-control" placeholder="Insira a morada" name="morada" value="<?php //echo $utilizador_editar->getMorada(); ?>"/>
                                </div>
								<div class="form-group">
									<label>Código do google maps (localização)</label>
									<textarea class="form-control" rows="3" id="gmaps" name="gmaps" placeholder="Insira uma descrição"></textarea>
								</div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Abertura</label>
                                    <input type="password" class="form-control" id="abertura" name="email" placeholder="Insira os dias e a hora de abertura">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Encerramento</label>
                                    <input type="password" class="form-control" id="encerr" name="encerr" placeholder="Insira os dias e a hora de encerramento">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Horário de atendimento telefónico</label>
                                    <input type="password" class="form-control" id="abertura" name="email" placeholder="Insira o horário de atendimento">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputPassword1">Normas de conduta</label>
                                    <textarea class="form-control" rows="3" id="normas" name="normas" placeholder="Insira as normas"></textarea>
                                </div>
								<div class="form-group<?php echo $p_erro1; ?>">
                                    <label for="exampleInputFile">Icone</label>
									<p><img src="img-users/<?php //echo $utilizador_editar->getFotografia(); ?>" style="height:120px;width:120px;" alt="Icone do site"></p>
									<input type="hidden" name="foto-original" value="<?php //echo $utilizador_editar->getFotografia(); ?>">
                                    <input type="file" id="exampleInputFile" name="foto">
                                    <p class="help-block">Seleccione um icone para o site</p>
                                </div>
								<div class="form-group">
									<label>Cor de fundo 1</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="corf1">
								</div>
								<div class="form-group">
									<label>Cor de fundo 2</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="corf2">
								</div>
								<div class="form-group">
									<label>Cor do texto</label>
									<input class="form-control my-colorpicker1 colorpicker-element" type="text" name="cort">
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
