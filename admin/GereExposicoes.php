<?php

include_once "exposicoes.php";
include_once "acessobd.php";

class GereExposicoes {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaExposcioes($exposicoes){

        try{
            $instrucao = $LigacaoBD->prepare("INSERT into  exposicoes SET ( EX_ID , TE_ID , EX_NOME , EX_OBSERVACOES , EX_ATIVO) VALUES(?, ?, ?, ?, ?)");
            $instrucao->bind_param($exposicoes->id, $exposicoes->teID, $exposicoes->nome, $exposicoes->observacoes, $exposicoes->ativo);
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