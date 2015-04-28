<?php
/**
 * Created by PhpStorm.
 * User: Beludo
 * Date: 28-04-2015
 * Time: 10:26
 */
include_once "GerePermissoes.php";
class GereUtilizadores {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarUtilizador(Utilizadores $utilizador){
        $sql = "INSERT into 'gm'.'utilizadores' ('U_nomeCompleto','U_username', 'U_password', 'U_dataRegisto', 'U_contatoTelefonico',
        'U_email','U_morada', 'U_fotografia', 'U_ativo') VALUES(:U_nomeCompleto , :U_username, :U_password, :U_dataRegisto, :U_contatoTelefonico,
        :U_email,:U_morada, :U_fotografia, :U_ativo)";

        $dados_utilizador = array(
            'U_nomeCompleto' => $utilizador->getNomeCompleto(),
            'U_username' => $utilizador->getUsername(),
            'U_password' => $utilizador->getPassword(),
            'U_dataRegisto' => $utilizador->getDataRegisto(),
            'U_contatoTelefonico' => $utilizador->getContatoTelefonico(),
            'U_email' => $utilizador->getEmail(),
            'U_morada' => $utilizador->getMorada(),
            'U_fotografia' => $utilizador->getFotografia(),
            'U_ativo' => $utilizador->getAtivo()
        );

        $this->bd->inserir($sql, $dados_utilizador);

        $registo = $this->bd->query("SELECT FROM 'gm'.'utilizadores' WHERE U_nomeCompleto = :U_nomeCompleto", $utilizador->getNomeCompleto());

        $gere = new GerePermissoes();

        $gere->atribuiPermissao($registo['U_id'], $utilizador->getPermissao());
    }

    function carregaUtilizador($id){

    }
} 