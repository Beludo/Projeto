<?php

include_once "acessobd.php";
include_once "LogUtilizadores.php";



class GereLog{
            private $bd;

            public function __construct() {
                $this->bd = new BaseDados();
            }
    function guardarAcaoUtilizador($acao){
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

    function listarAcoesUtilizadores(){
            $dados=array();
            $instrucao = $this->bd->query("SELECT * FROM logs");
           
            
            for($i=0; $i<count($instrucao); $i++){
                    $dados[] = new AcoesUtilizadores($instrucao[$i]["L_ID"],$instrucao[$i]["U_ID"],$instrucao[$i]["L_DATAHORA"],$instrucao[$i]["L_acao"]);


            }
            return $dados;
    }

    function pesquisarAcoesData($dataHora){
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

    function pesquisarAcoesUtilizador ($nome){
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
}
?>