<?php

include_once "parceria.php";
include_once "acessobd.php";

class GereParceria {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaParceria($parceria){

           $sql = "INSERT into parcerias (PA_ENTIDADEPARCEIRA, PA_CONDICAOPARCERIA, PA_DATAPARCERIA, PA_ATIVO) VALUES( :PA_ENTIDADEPARCEIRA, :PA_CONDICAOPARCERIA, :PA_DATAPARCERIA, :PA_ATIVO)";
           $dados_parceria = array(
						 'PA_ENTIDADEPARCEIRA' => $parceria->getEntidade(),
						 'PA_CONDICAOPARCERIA' => $parceria->getCondicao(),
						 'PA_DATAPARCERIA' => $parceria->getData(),
						 'PA_ATIVO' => $parceria->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_parceria);
    }
	
	public function listarParceria(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM parcerias");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new parceria(
										$registo[$i]["PA_ID"],
										$registo[$i]["PA_ENTIDADEPARCEIRA"],
										$registo[$i]["PA_CONDICAOPARCERIA"],
                    $registo[$i]["PA_DATAPARCERIA"],
										$registo[$i]["PA_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	function verDadosParceria($id) {
        try {
            $idA = array("PA_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM parcerias WHERE PA_ID = :PA_ID", $idA);
 
            if (isset($registo)) {
				
                $parceria = new parceria(
					$registo[0]["PA_ID"],
					$registo[0]["PA_ENTIDADEPARCEIRA"],
					$registo[0]["PA_CONDICAOPARCERIA"],
					$registo[0]["PA_DATAPARCERIA"],
					$registo[0]["PA_ATIVO"]
				);
                return $parceria;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarParceria($parceria){
		
		$sql = "UPDATE parcerias SET PA_ENTIDADEPARCEIRA=:PA_ENTIDADEPARCEIRA , PA_CONDICAOPARCERIA=:PA_CONDICAOPARCERIA , PA_DATAPARCERIA=:PA_DATAPARCERIA, PA_ATIVO=:PA_ATIVO WHERE  PA_ID=:PA_ID";
           $dados_parceria = array(
						 'PA_ENTIDADEPARCEIRA' => $parceria->getEntidade(),
						 'PA_CONDICAOPARCERIA' => $parceria->getCondicao(),
						 'PA_DATAPARCERIA' => $parceria->getData(),
						 'PA_ATIVO' => $parceria->getAtivo(),
						 'PA_ID' => $parceria->getId()
        );
		
        $this->bd->editar($sql, $dados_parceria);

 	}
	
		
}

?>