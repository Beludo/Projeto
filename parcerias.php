<?php
	include_once "sessaoAtiva.php";
	include_once "admin/parceria.php";
	include_once "admin/GereParceria.php";


$gere_parceria = new GereParceria();
$parceria = $gere_parceria->listarParceria();
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
	<?php $pagina="informacoes" ; include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! Conteudo e Banner-->
	
		<!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="index.php">Página Inicial</a>
			</li>
			<li><a href="contatos.php">Informações</a>
			</li>
			<li class="active">Parcerias</li>
		</ol>

		<!-- Menu Lateral -->
		<div style="float:left; margin-top:10px; margin-right:0px; width:25%;">
			<div class="list-group">
				<!-- Exemplo de opção ativa
			
			  <a href="#" class="list-group-item active">
				Cras justo odio
			  </a>
			  -->
				<a href="contatos.php" class="list-group-item">Contatos</a>
				<a href="horario.php" class="list-group-item">Horário de Funcionamento</a>
				<a href="normas.php" class="list-group-item">Normas de Conduta</a>
				<a href="parcerias.php" class="active list-group-item">Parcerias</a>

			</div>
		</div>
		<!-- Acaba menu Lateral -->

		<!-- Conteudo -->
		<div class="panel panel-default" style="float:right; padding:10px; margin-top:10px; width:74%;min-height: 205px;">
			<h3>Parcerias</h3>
			<hr>
			
			 <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>Entidade Parceira</th>
						<th>Condição da Parceria</th>
					  </tr>
					</thead>
					 <?php
                      if($parceria != null) {
                          for($i = 0; $i<count($parceria); $i++) {
                      ?>
					  <tr>
						<td><?php echo $parceria[$i]->getEntidade(); ?></td>
						<td><?php echo $parceria[$i]->getCondicao(); ?></td>
							
					  </tr>
						<?php
                            }
                      }
					?>
				  </table>
		</div>
		<!-- Acaba o conteudo -->

	</div>

	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</html>