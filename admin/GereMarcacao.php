<?php

include_once "marcacao.php";
include_once "acessobd.php";

class GereMarcacao {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarMarcacao($marcacao){

           $sql = "INSERT into marcacao (MA_NOME, MA_ENTIDADE, MA_TELEFONE, MA_MORADA, MA_EMAIL, MA_DATA, MA_NPESSOAS, MA_ACEITE) VALUES( :MA_NOME, :MA_ENTIDADE, :MA_TELEFONE, :MA_MORADA, :MA_EMAIL, :MA_DATA, :MA_NPESSOAS, :MA_ACEITE)";
           $dados_marcacao = array(
						 'MA_NOME' => $marcacao->getNome(),
						 'MA_ENTIDADE' => $marcacao->getEntidade(),
						 'MA_TELEFONE' => $marcacao->getTelefone(),
						 'MA_MORADA' => $marcacao->getMorada(),
						 'MA_EMAIL' => $marcacao->getEmail(),
						 'MA_DATA' => $marcacao->getData(),
						 'MA_NPESSOAS' => $marcacao->getNPessoas(),
						 'MA_ACEITE' => $marcacao->getAceite()
						 );
			
        $this->bd->inserir($sql, $dados_marcacao);
    }
	
	public function listarMarcacao(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM marcacao");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new marcacao(
										$registo[$i]["MA_ID"],
										$registo[$i]["MA_NOME"],
										$registo[$i]["MA_ENTIDADE"],
										$registo[$i]["MA_TELEFONE"],
                    $registo[$i]["MA_MORADA"],
										$registo[$i]["MA_EMAIL"],
										$registo[$i]["MA_DATA"],
                    $registo[$i]["MA_NPESSOAS"],
										$registo[$i]["MA_ACEITE"]
                        );
            }
            return $dados;
    }
	
	
	function verDadosMarcacao($id) {
        try {
            $idA = array("MA_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM marcacao WHERE MA_ID = :MA_ID", $idA);
 
            if (isset($registo)) {
				
                $marcacao = new marcacao(
					$registo[0]["MA_ID"],
					$registo[0]["MA_NOME"],
					$registo[0]["MA_ENTIDADE"],
					$registo[0]["MA_TELEFONE"],
					$registo[0]["MA_MORADA"],
					$registo[0]["MA_EMAIL"],
					$registo[0]["MA_DATA"],
					$registo[0]["MA_NPESSOAS"],
					$registo[0]["MA_ACEITE"]
				);
                return $marcacao;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
		
}

?>