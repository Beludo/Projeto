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

            $registo = $this->bd->query("SELECT * FROM TIPOEXPOSICOES`");
            for($i=0; $i<count($registo); $i++){
               $dados[] = new tipoexposicoes(
								$registo[$i]["TE_ID"],
								$registo[$i]["TE_NOME"]
                        );
            }
            return $dados;
    }
	
	
	
	
}

?>