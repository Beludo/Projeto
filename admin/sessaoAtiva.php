<?php
	/*
		sessaoAtiva.php - verifica se a sessão foi iniciada
					   se não estiver, redirecciona o utilizador para a pagina de login
					   
	*/
	
	session_start();
	
	// verificar se a sessão foi iniciada
	if(!isset($_SESSION["user"])){
		header("Location: index.php");
	}
?>