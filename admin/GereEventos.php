<?php

include_once "evento.php";
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
						 'E_ATIVO' => $eventos->getAtivo()
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
	
	
	public function listarEventos3(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM eventos ORDER BY E_ID DESC LIMIT 3");
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
	
	
	function verDadosEventos($id) {
        try {
            $idA = array("E_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM eventos WHERE E_ID = :E_ID", $idA);
 
            if (isset($registo)) {
				
                $eventos = new eventos(
					$registo[0]["E_ID"],
					$registo[0]["E_NOME"],
					$registo[0]["E_DESCRICAO"],
					$registo[0]["E_FOTO"],
					$registo[0]["E_ATIVO"]
				);
                return $eventos;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarEventos($eventos){
		
		$sql = "UPDATE eventos SET E_NOME=:E_NOME , E_DESCRICAO=:E_DESCRICAO , E_FOTO=:E_FOTO, E_ATIVO=:E_ATIVO WHERE  E_ID=:E_ID";
           $dados_eventos = array(
						 'E_NOME' => $eventos->getNome(),
						 'E_DESCRICAO' => $eventos->getDescricao(),
						 'E_FOTO' => $eventos->getFoto(),
						 'E_ATIVO' => $eventos->getAtivo(),
						 'E_ID' => $eventos->getId()
        );
		
        $this->bd->editar($sql, $dados_eventos);

 	}
	
		
}

?>