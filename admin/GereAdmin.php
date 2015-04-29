<?php

include_once "acessobd.php";

class GereAdmin{
	
	/*   POR FAZER!!!   */

    public function adicionarUtilizador($utilizador){
        try{
            $DBH = getDBH();
            $instrucao = $DBH->prepare("INSERT INTO Utilizadores (
				U_numeroFuncionario, U_nome, U_morada, U_contactoTelefonico, U_dataNascimento, U_nomeUtilizador, U_palavraPasse, U_tipoUtilizador, U_dataRegisto, U_fotografia, U_funcao, U_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $instrucao->bind_param($utilizador->numero, $utilizador->nome,
                $utilizador->morada, $utilizador->telefone, $utilizador->dataNascimento,
                $utilizador->username, $utilizador->password, $utilizador->tipoUtilizador,
                $utilizador->dataRegisto, $utilizador->caminhoFoto, $utilizador->funcao, "True");
            // Executar

            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }
	
	/*   POR FAZER!!!   */
	
    public function editarUtilizador($id, $nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (
				U_numeroFuncionario, U_nome, U_morada, U_contactoTelefonico, U_dataNascimento, U_nomeUtilizador, U_palavraPasse, U_tipoUtilizador, U_dataRegisto, U_fotografia, U_funcao, U_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
				WHERE U_id = ?");
            $instrucao->bind_param($numero, $nome, $morada, $telefone, $dataNascimento, $username, $password, $tipoUtilizador, $dataRegisto, $caminhoFoto, $funcao, "True", $id);
            // Executar

            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }
	
	/*   POR FAZER!!!   */
    public function activarDesativarConta($id, $ativo){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_activo) VALUES (?) WHERE U_id = ?");
            $instrucao->bind_param($ativo, $id);
            //Executar

            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            return "True";
        } else {
            return "False";
        }
    }
	
	/*   POR FAZER!!!   */

    public function listarUtilizadores(){
        try{
            $bd = new BaseDados();
            $instrucao = $bd->query("SELECT * FROM Utilizadores", NULL);
            //Executar
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($instrucao != NULL){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            while($registo = $instrucao->fetch()){
                $dados[] = $registo;
            }
            return $dados;
        } else {
            return NULL;
        }
    }
}
?>