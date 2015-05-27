<?php
	// username-ajax.php - indica se o utilizador j? existe
	
	include "sessaoAtiva.php";
	include "conf.php";
	include "acessobd.php";
	
	$bd = new BaseDados();
	
	// verificar se existe algum utilizador com o username escolhido
	$dados = array( "U_USERNAME" => $_GET["username"] );
	$dados_bd = $bd->query("SELECT U_ID FROM utilizadores WHERE U_USERNAME = :U_USERNAME", $dados);
	
	if(count($dados_bd) == 0){
		$valor = "0";
	}else{
		$valor = "1";
	}

	header('Content-Type: text/xml');
	echo "<?xml version=\"1.0\" standalone=\"yes\"?><username><existe>" . $valor . "</existe></username>";
?>