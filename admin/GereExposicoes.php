<?php

include_once "exposicoes.php";
include_once "acessobd.php";

class GereExposicoes {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaExposcioes($exposicoes){
					
           $sql = "INSERT into  exposicoes (TE_ID , EX_NOME , EX_OBSERVACOES , EX_ATIVO) VALUES( :TE_ID, :EX_NOME, :EX_OBSERVACOES, :EX_ATIVO)";
			
           $dados_exposicoes = array(
						 'TE_ID' => $exposicoes->getTeID(),
						 'EX_NOME' => $exposicoes->getNome(),
						 'EX_OBSERVACOES' => $exposicoes->getObservacoes(),
						 'EX_ATIVO' => $exposicoes->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_exposicoes);
					
	
	public function listarExposicoes(){
			$dados = array();

            $registo = $this->bd->query("SELECT e.*, t.TE_NOME FROM exposicoes e, tipoexposicoes t where t.te_id = e.te_id");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new exposicoes(
										$registo[$i]["EX_ID"],
										$registo[$i]["TE_ID"],
										$registo[$i]["EX_NOME"],
                    $registo[$i]["EX_OBSERVACOES"],
										$registo[$i]["EX_ATIVO"],
										$registo[$i]["TE_NOME"]
                        );
            }
            return $dados;
    }
		
}

?>