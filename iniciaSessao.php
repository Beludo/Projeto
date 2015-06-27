<?php

include_once "Visitantes.php";
include_once "GereVisitante.php";

session_start();
// accao "logout" - terminar a sessão, se for pedido
if(
    isset($_GET["logout"]) && !empty($_GET["logout"]) &&
    !strcmp($_GET["logout"], "1")
){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();

    header("Location: ./login.php?logout=1");
    exit;
}

if(
    isset($_POST["username"]) && !empty($_POST["username"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])){

    // abrir ligação à base de dados
    $bd = new BaseDados();
    $gereVisitante = new GereVisitante();
    $visitante = new Visitantes(0, "", "", "", "", 0, "", "", "", 1);

    // carrega o utilizador com o username dado

    $visitante = $gereVisitante->obtemVisitanteUsername($_POST["username"]);

    // verifica se foi carregado um objeto na variável "utilizador"
    if ($visitante == null){
        header("Location: login.php?erro=1");
    }else{

        //verifica se o username que veio da base de dados é igual ao inserido
        if(
            !strcmp($_POST["username"], $visitante->getUsername()) &&
            !strcmp(md5($_POST["password"]), $visitante->getPassword()) &&
            $visitante->getAtivo() == 1){

            // Guardar o nome de utilizador da sessão
            $_SESSION["visit"] = $visitante->getUsername();
			$_SESSION["v-foto"] = $visitante->getFotografia();
            $_SESSION["produtos"] = array();
            header("Location: index.php");
            }else{
            header("Location: login.php?erro=1");
        }
    }
}else{
    header("Location: login.php?erro=2");
}

?>