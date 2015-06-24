<?php

include_once "eventos.php";
include_once "acessobd.php";

class GereEventos {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaEventos($eventos){

           $sql = "INSERT into eventos ( E_NOME , E_DESCRICAO , E_FOTO, E_ATIVO) VALUES( :E_NOME, :E_DESCRICAO, :E_FOTO, :E_ATIVO)";
           $dados_eventos = array(
						 'E_NOME' => $eventos->getNome(),
						 'E_DESCRICAO' => $eventos->getDescricao(),
						 'E_FOTO' => $eventos->getFoto(),
						 'E_ATIVO' => $eventos->getAtivo(),
						 );
			
        $this->bd->inserir($sql, $dados_eventos);
    }
	
	public function listarEventos(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM eventos");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new eventos(
										$registo[$i]["E_ID"],
										$registo[$i]["E_NOME"],
										$registo[$i]["E_DESCRICAO"],
                    $registo[$i]["E_FOTO"],
										$registo[$i]["E_ATIVO"]
                        );
            }
            return $dados;
    }
		
}

?>