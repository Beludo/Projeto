<?php
	// ajax-graficos.php - devolve os dados do grafico
	
	//include "sessaoAtiva.php";
	include "conf.php";
	include "acessobd.php";
	
	$bd = new BaseDados();
	
	// verificar se existe algum utilizador com o username escolhido
	$dados = array(
		"CL_ENDERECO_SENSOR" => $_GET["esensor"],
		"DATA_INF" => $_GET["datai"],
		"DATA_SUP" => $_GET["datas"]
	);
	/*
	$dados_bd = $bd->query("SELECT * FROM clima WHERE CL_ENDERECO_SENSOR = :CL_ENDERECO_SENSOR", $dados);
	
	exemplo de query - 127.0.0.1/Projeto/admin/ajax-graficos.php?esensor=123&datai=2015-06-02 16:19:00&datas=2015-06-02 16:41:00
	*/
	
	$dados_bd = $bd->query("SELECT * FROM clima WHERE CL_ENDERECO_SENSOR = :CL_ENDERECO_SENSOR AND CL_DATAHORA BETWEEN :DATA_INF AND :DATA_SUP", $dados);

	header('Content-Type: text/xml');
	echo "<?xml version=\"1.0\" standalone=\"yes\"?><valores>";
	
	$num_pontos = count($dados_bd);
	for($i=0; $i<$num_pontos; $i++) {
		echo "<valor><temperatura>" . $dados_bd[$i]["CL_TEMPERATURA"] . "</temperatura><humidade>" . $dados_bd[$i]["CL_HUMIDADE"] . "</humidade><data>" . $dados_bd[$i]["CL_DATAHORA"] . "</data></valor>";
	}
	echo "</valores>"
?>