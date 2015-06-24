<?php

include_once "eventos.php";
include_once "acessobd.php";

class GereEventos {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaEventos($eventos){

        try{
            $instrucao = $LigacaoBD->prepare("INSERT into eventos SET ( E_ID , E_NOME , E_DESCRICAO , E_FOTO, E_ATIVO) VALUES(?, ?, ?, ?, ?)");
            $instrucao->bind_param($eventos->id, $eventos->nome, $eventos->descricao, $eventos->foto, $eventos->ativo);
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            return "True";
        } else {
            return "False";
        }
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