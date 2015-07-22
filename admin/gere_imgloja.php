<?php

include_once "imgloja.php";
include_once "acessobd.php";

class gere_imgloja {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaAviso($imagens){

           $sql = "INSERT into img_banner_loja ( IL_FICHEIRO, IL_ATIVO) VALUES( :IL_FICHEIRO, :IL_ATIVO)";
           $dados_imgloja = array(
						 'IL_FICHEIRO' => $imagens->getFicheiro(),
						 'IL_ATIVO' => $imagens->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_imgloja);
    }
	
	public function listarImagens(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM img_banner_loja");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new imgloja(
										$registo[$i]["IL_ID"],
										$registo[$i]["IL_FICHEIRO"],
										$registo[$i]["IL_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	public function listarImgAtivo(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM img_banner_loja where IL_ATIVO = 1");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new imgloja(
										$registo[$i]["IL_ID"],
										$registo[$i]["IL_FICHEIRO"],
										$registo[$i]["IL_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	function verDadosAviso($id) {
        try {
            $idA = array("AV_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM img_banner_loja WHERE IL_ID = :IL_ID", $idA);
 
            if (isset($registo)) {
				
                $imgloja = new imgloja(
									$registo[0]["IL_ID"],
									$registo[0]["IL_FICHEIRO"],
									$registo[0]["IL_ATIVO"]
				);
                return $imagens;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarImgLoja($imagens){
		
		$sql = "UPDATE img_banner_loja SET IL_FICHEIRO=:IL_FICHEIRO, IL_ATIVO=:IL_ATIVO WHERE  IL_ID=:IL_ID";
           $dados_aviso = array(
						 'IL_FICHEIRO' => $imagens->getFicheiro(),
						 'IL_ATIVO' => $imagens->getAtivo(),
						 'IL_ID' => $imagens->getId()
        );
		
        $this->bd->editar($sql, $dados_imgloja);

 	}
	
		
}

?>