<?php

include_once "exposicoes.php";
include_once "acessobd.php";

class GereExposicoes {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaExposicoes($exposicoes){
					
           $sql = "INSERT into  exposicoes (TE_ID , EX_NOME , EX_OBSERVACOES , EX_ATIVO) VALUES( :TE_ID, :EX_NOME, :EX_OBSERVACOES, :EX_ATIVO)";
			
           $dados_exposicoes = array(
						 'TE_ID' => $exposicoes->getTeID(),
						 'EX_NOME' => $exposicoes->getNome(),
						 'EX_OBSERVACOES' => $exposicoes->getObservacoes(),
						 'EX_ATIVO' => $exposicoes->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_exposicoes);
		}
					
	
		function listarExposicoes(){
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
			
		function editarExposicoes($exposicoes){
		
		$sql = "UPDATE exposicoes SET TE_ID=:TE_ID , EX_NOME=:EX_NOME , EX_OBSERVACOES=:EX_OBSERVACOES, EX_ATIVO=:EX_ATIVO WHERE  EX_ID=:EX_ID";
           $dados_exposicoes = array(
						 'TE_ID' => $exposicoes->getTeID(),
						 'EX_NOME' => $exposicoes->getNome(),
						 'EX_OBSERVACOES' => $exposicoes->getObservacoes(),
						 'EX_ATIVO' => $exposicoes->getAtivo(),
						 'EX_ID' => $exposicoes->getId()
        );
		
        $this->bd->editar($sql, $dados_exposicoes);

 	}
	
	function verDadosExposicoes($id) {
        try {
            $idA = array("EX_ID" => $id);
            $registo = $this->bd->query("SELECT e.*, T.TE_NOME FROM exposicoes e, tipoexposicoes t WHERE EX_ID = :EX_ID", $idA);
 
            if (isset($registo)) {
				
                $exposicoes = new exposicoes(
					$registo[0]["EX_ID"],
					$registo[0]["TE_ID"],
					$registo[0]["EX_NOME"],
					$registo[0]["EX_OBSERVACOES"],
					$registo[0]["EX_ATIVO"],
					$registo[0]["TE_NOME"]
				);
                return $exposicoes;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
		
}

?>