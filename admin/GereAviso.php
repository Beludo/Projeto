<?php

include_once "aviso.php";
include_once "acessobd.php";

class GereAviso {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaAviso($avisos){

           $sql = "INSERT into avisos ( AV_TITULO, AV_AVISO, AV_ATIVO) VALUES( :AV_TITULO, :AV_AVISO, :AV_ATIVO)";
           $dados_aviso = array(
						 'AV_TITULO' => $avisos->getTitulo(),
						 'AV_AVISO' => $avisos->getAviso(),
						 'AV_ATIVO' => $avisos->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_aviso);
    }
	
	public function listarAvisos(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM avisos");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new aviso(
										$registo[$i]["AV_ID"],
										$registo[$i]["AV_TITULO"],
                    $registo[$i]["AV_AVISO"],
										$registo[$i]["AV_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	public function listarUltimoAvisoAtivo(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM avisos where AV_ATIVO = 1 ORDER BY AV_ID DESC LIMIT 1");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new aviso(
										$registo[$i]["AV_ID"],
										$registo[$i]["AV_TITULO"],
                    $registo[$i]["AV_AVISO"],
										$registo[$i]["AV_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	function verDadosAvisos($id) {
        try {
            $idA = array("AV_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM avisos WHERE AV_ID = :AV_ID", $idA);
 
            if (isset($registo)) {
				
                $aviso = new aviso(
									$registo[$i]["AV_ID"],
									$registo[$i]["AV_TITULO"],
									$registo[$i]["AV_AVISO"],
									$registo[$i]["AV_ATIVO"]
				);
                return $aviso;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarAviso($avisos){
		
		$sql = "UPDATE eventos SET AV_TITULO=:AV_TITULO , AV_AVISO=:AV_AVISO, AV_ATIVO=:AV_ATIVO WHERE  AV_ID=:AV_ID";
           $dados_eventos = array(
						 'AV_TITULO' => $avisos->getTitulo(),
						 'AV_AVISO' => $avisos->getAviso(),
						 'AV_ATIVO' => $avisos->getAtivo(),
						 'AV_ID' => $eventos->getId()
        );
		
        $this->bd->editar($sql, $dados_aviso);

 	}
	
		
}

?>