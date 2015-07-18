<?php

include_once "acessobd.php";
include_once "TipoExposicoes.php";

class GereTipoExposicoes{
		private $bd;

		public function __construct() {
				$this->bd = new BaseDados();
		}

	public function listarTipoExposicoes(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM TIPOEXPOSICOES");
            for($i=0; $i<count($registo); $i++){
               $dados[] = new tipoexposicoes(
								$registo[$i]["TE_ID"],
								$registo[$i]["TE_NOME"],
								$registo[$i]["TE_ATIVO"]
                        );
            }
            return $dados;
    }
	
	public function listarTipoExposicoesAtivas(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM TIPOEXPOSICOES where TE_ATIVO = 1");
            for($i=0; $i<count($registo); $i++){
               $dados[] = new tipoexposicoes(
								$registo[$i]["TE_ID"],
								$registo[$i]["TE_NOME"],
								$registo[$i]["TE_ATIVO"]
                        );
            }
            return $dados;
    }
	
	 function adicionaTipoExposicao($tipo_exposicao){
        $sql = "INSERT into  tipoexposicoes  ( TE_NOME ) VALUES(:TE_NOME)";

        $dados_tipo_exposicoes = array(
            'TE_NOME' => $tipo_exposicao->getNome(),
        );
        $this->bd->inserir($sql, $dados_tipo_exposicoes);
    }
	
}

?>