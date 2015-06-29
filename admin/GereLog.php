<?php

include_once "acessobd.php";
include_once "LogUtilizadores.php";

class GereLog{
            private $bd;

            public function __construct() {
                $this->bd = new BaseDados();
            }
    function guardarLogUtilizador($acao){
        try{
            $instrucao = $LigacaoBD->prepare("INSERT INTO Logs SET (U_id, L_dataHora, L_acao) VALUES(?, ?, ?)");
            $instrucao->bind_param($acao->userId, $acao->dataHora, $acao->acao);
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
	
	public function listarLog(){
			$dados = array();

            $registo = $this->bd->query("SELECT l.*, u.U_NOMECOMPLETO FROM log l, utilizadores u where l.u_id = u.u_id");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new LogUtilizadores(
						$registo[$i]["L_ID"],
                        $registo[$i]["U_ID"],
						$registo[$i]["L_ACAO"],
                        $registo[$i]["L_DATAHORA"],
										$registo[$i]["U_NOMECOMPLETO"]
                        );
            }
            return $dados;
    }
	

    function pesquisarLogData($dataHora){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Logs WHERE L_dataHora = ?");
            $instrucao->bind_param($dataHora);
            $sucesso_funcao = $instrucao->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            while($registo = $instrucao->fetch()){
                $dados[] = $registo;
            }
            return $dados;
        } else {
            return NULL;
        }
    }

    function pesquisarLogUtilizador ($nome){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT U_id FROM Utilizadores WHERE U_nome = ?");
            $instrucao->bind_param($nome);
            $sucesso_funcao = $instrucao->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            $registo = $instrucao->fetch();
            try{
                $instrucao = $LigacaoBD->prepare("SELECT * FROM Logs WHERE U_id = ?");
                $instrucao->bind_param($registo);
                $sucesso_funcao = $instrucao->execute();
            } catch(PDOException $e){
                echo $e->getMessage();
            }
            if($sucesso_funcao){
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                while($registo = $instrucao->fetch()){
                    $dados[] = $registo;
                }
                return $dados;
            }
        } else {
            return NULL;
        }
    }
	
	function adicionarEntradaLog($u_id, $acao){
		$data = date("Y-m-d H:i:s");

        $sql = "INSERT INTO log (U_ID, L_ACAO, L_DATAHORA) VALUES (:U_ID, :L_ACAO, :L_DATAHORA);";

        $dados_quotas = array(
            'U_ID' => $u_id,
            'L_ACAO' => $acao,
			'L_DATAHORA' => $data
        );

        $this->bd->inserir($sql, $dados_quotas);
    }
}
?>