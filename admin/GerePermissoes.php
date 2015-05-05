<?php
/**
 * Created by PhpStorm.
 * User: Beludo
 * Date: 28-04-2015
 * Time: 10:54
 */

class GerePermissoes {
    private $bd;
    function __construct(){
      $this->bd = new BaseDados();
    }

    function adicionaPermissao(Permissoes $permissoes){
        $sql = "INSERT into permissoes (P_PERMISSOES) VALUES (:P_PERMISSOES)";

        $dados_permissao = array(
            'P_PERMISSOES' => $permissoes->getPermissao()
        );

        if($this->bd->inserir($sql, $dados_permissao)){
            return true;
        } else {
            return false;
        }
    }

    function atribuiPermissao($idUtilizador, $idPermissao){
        $sql = "INSERT into utilizadores_permissoes (P_ID, U_ID) VALUES (:P_ID, :U_ID)";

        $dados_tabela = array(
            'P_ID' => $idPermissao,
            'U_ID' => $idUtilizador
        );

        $this->bd->inserir($sql, $dados_tabela);
    }
} 