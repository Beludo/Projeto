<?php
/**
 * Created by PhpStorm.
 * User: Beludo
 * Date: 28-04-2015
 * Time: 10:54
 */

include_once "Utilizadores.php";
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

    function listaPermissoes(){
        $sql = "SELECT * FROM permissoes";
        $dados = $this->bd->query($sql);
        if($dados != null){
            return $dados;
        }
    }
	
	function permissoesUtilizador($idUtilizador){
		
		$dados_tabela = array(
            'U_ID' => $idUtilizador
        );
	
        $sql = "SELECT P_ID FROM utilizadores_permissoes WHERE U_ID = :U_ID";
        $dados = $this->bd->query($sql, $dados_tabela);
		
		$dados_devolver = array();
		
		// Simplificar o array associativo para um array simples
		for($i=0; $i<count($dados); $i++){
			$dados_devolver[] = $dados[$i]["P_ID"];
		}
		
        if($dados_devolver != null){
            return $dados_devolver;
        }
    }
} 