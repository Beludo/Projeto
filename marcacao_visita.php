<?php
	include_once "admin/GereMarcacao.php";
	
	$gereMarcacao = new GereMarcacao();
	
	
	
	// verificar se todos os campos foram preenchidos
	if(
	isset($_POST["nome"]) && !empty($_POST["nome"]) &&
	isset($_POST["entidade"]) && !empty($_POST["entidade"]) &&
	isset($_POST["morada"]) && !empty($_POST["morada"]) &&
	isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
	isset($_POST["email"]) && !empty($_POST["email"])
	){
        $marcacao = new marcacao(0, $_POST["nome"], $_POST["entidade"], $_POST["telefone"], $_POST["morada"], $_POST["email"], $_POST["data"], $_POST["pessoas"], 0);
		$gereMarcacao->adicionarMarcacao($marcacao);
		header("Location: marcacao_visita.php?marcado=1"); 
	}
	
	
	if(isset($_GET["erro"]) && !empty($_GET["erro"])){
		// erro 1 - ficheiro invalido
		$p_erro1 = '';
		if($_GET["erro"] == 1){
			$p_erro1 = ' has-error';
		}
	}
	
?>

<!DOCTYPE html>
<html lang="pt">
	
	<head>
		<title>Registo</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.js"></script>
		
		<!-- AJAX para ver so o utilizador já está registado -->
		<script src="ajax-visitante.js" ></script>
	
		<!-- Verificações no formulario -->
		<script src="verificacoes-form.js" ></script>
		
		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
	</head>
	
	<body>
		<!-- MENU!! -->
		<?php $pagina="marcacao" ; include "inc-cabecalho.php" ?>
		<!-- Acaba MENU!! -->
		
		<!-- /conteudo -->
		
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li class="active">Marcação de Visitas</li>
		</ol>
		
		<!-- Conteudo -->
		<?php 
			if(isset($_GET["marcado"]) && !empty($_GET["marcado"]) && $_GET["marcado"] == 1){
                  echo '<div class="alert alert-success">Marcação feita com sucesso! Agora espere pelo contacto do administrador</div>';
      }
		?>
		<section class="content">
					<h3>Marcação de Visita de Grupo</h3>
					<div class="tab-pane">
						<div class="panel-body bio-graph-info">
							<form class="form-horizontal" role="form" method="post" action="marcacao_visita.php">
								<div class="form-group">
									<label class="col-lg-3 control-label">Nome do responsável:</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o Nome..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Entidade Proponente:</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="entidade" name="entidade" placeholder="Insira a entidade..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Telefone</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira o Contato Telefónico..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Morada</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="morada" name="morada" placeholder="Insira a Morada..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Email</label>
									<div class="col-lg-4">
										<input type="email" class="form-control" id="email" name="email" placeholder="Insira o Email..." value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Data proposta para a visita:</label>
									<div class="col-lg-4">
										<div class='input-group date' id='datetimepicker1'>
											<input type='text' id="data" name="data" class="form-control" placeholder="yyyy/MM/dd HH:mm" />
											<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
											</span>
                		</div>
									</div>
											<script type="text/javascript">
													$(function () {
															$('#datetimepicker1').datetimepicker({ 
																												dateFormat: 'yyyy.mm.dd', 
																												timeFormat: 'HH:mm' 
																										 })
													});
											</script>
									</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Nº de Pessoas</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="pessoas" name="pessoas" placeholder="Insira o número de pessoas..." value="">
									</div>
								</div>
								</div>
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-10">
										<button type="submit" class="btn btn-primary">Enviar</button>
									</div>
									<br>
								</div>
							</form>
						<br>
							<strong>*Será contactado mais tarde por email ou telefone, de forma a confirmar a marcação!!</strong>
								<br>
						</div>
					</div>
		</section><!-- /.content -->
		
		
		<!-- Acaba o conteudo -->
		
		<!-- RODAPÉ!! -->
		<?php include "inc-rodape.php" ?>
		<!-- Acaba RODAPÉ!! -->
		
				</body>
				
			</html>			