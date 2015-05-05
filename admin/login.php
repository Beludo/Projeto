<?php

include_once "Utilizadores.php";
include_once "GereUtilizadores.php";

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

    header("Location: ./index.php?logout=1");
    exit;
}

if(
    isset($_POST["username"]) && !empty($_POST["username"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])){

    // abrir ligação à base de dados
    $bd = new BaseDados();
    $gereUtilizador = new GereUtilizadores();
    $utilizador = new Utilizadores("", "", "", "", "", "", "");

    // carrega o utilizador com o username dado

    $utilizador = $gereUtilizador->obtemUtilizadorUsername($_POST["username"]);

    // verifica se foi carregado um objeto na variável "utilizador"
    if ($utilizador == null){
        header("Location: index.php?erro=1");
    }else{

        //verifica se o username que veio da base de dados é igual ao inserido
        if(
            !strcmp($_POST["username"], $utilizador->getUsername()) &&
            !strcmp($_POST["password"], $utilizador->getPassword()) &&
            $utilizador->getAtivo() == 1){

            // Guardar o nome de utilizador da sessão
            $_SESSION["user"] = $utilizador->getUsername();
            echo $utilizador->getPermissao();
            // Verificar se se trata de um utilizador comum ou administrador
            if($utilizador->getPermissao() == 1){
                header("Location: gerir-utilizadores.php");
            } else {
                //header("Location: loja.php");
            }

        }else{
            header("Location: index.php?erro=1");
        }
    }
}else{
    header("Location: index.php?erro=2");
}

?>