<?php

include_once "GerePermissoes.php";
include_once "acessobd.php";
include_once "Utilizadores.php";

class GereUtilizadores {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarUtilizador(){
        if(
            !empty($_POST["nome"]) && !empty($_POST["username"]) &&
            !empty($_POST["morada"]) && !empty($_POST["telefone"]) &&
            !empty($_POST["password"]) && !empty($_POST["email"]) &&
            !empty($_POST["foto"])){
            $data = time();

            $novaFoto = $_POST["username"].$_POST["foto"];
            $separar = explode(".", $_FILES["foto"]["name"]);
            $ext = $separar[count($separar)-1];
            $nome_foto = $_POST["username"].".". $ext;

            // apagar o ficheiro actual
            if(file_exists("fotos/" . $nome_foto)){
                unlink("fotos/" . $nome_foto);
            }

            move_uploaded_file($_FILES["logo"]["temp_nome"], "fotos/" . $nome_foto);

            $utilizador = new Utilizadores(0, $_POST["nome"], $_POST["username"], $_POST["password"], date("y-m-d", $data), $_POST["telefone"], $_POST["email"], $_POST["morada"], $nome_foto, true, 1);

        $sql = "INSERT into utilizadores (U_NOMECOMPLETO,U_USERNAME, U_PASSWORD, U_DATAREGISTO, U_CONTATOTELEFONICO,
        U_EMAIL,U_MORADA, U_FOTOGRAFIA, U_ATIVO) VALUES(:U_NOMECOMPLETO , :U_USERNAME, :U_PASSWORD, :U_DATAREGISTO, :U_CONTATOTELEFONICO,
        :U_EMAIL,:U_MORADA, :U_FOTOGRAFIA, :U_ATIVO)";

        $dados_utilizador = array(
            'U_NOMECOMPLETO' => $utilizador->getNomeCompleto(),
            'U_USERNAME' => $utilizador->getUsername(),
            'U_PASSWORD' => $utilizador->getPassword(),
            'U_DATAREGISTO' => $utilizador->getDataRegisto(),
            'U_CONTATOTELEFONICO' => $utilizador->getContatoTelefonico(),
            'U_EMAIL' => $utilizador->getEmail(),
            'U_MORADA' => $utilizador->getMorada(),
            'U_FOTOGRAFIA' => $utilizador->getFotografia(),
            'U_ATIVO' => $utilizador->getAtivo()
        );

        $this->bd->inserir($sql, $dados_utilizador);

        $registo = $this->bd->query("SELECT U_ID FROM utilizadores WHERE U_NOMECOMPLETO = :U_NOMECOMPLETO", $utilizador->getNomeCompleto());

        $gerePermissoes = new GerePermissoes();

        $gerePermissoes->atribuiPermissao($registo, $utilizador->getPermissao());
        }
    }
	
	/*  POR FAZERR !!!!!!!! */
			function alterarPalavraPasse($palavraPasse, $id) {
				try {
						$instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_palavraPasse = ? WHERE U_id = ?) VALUES (?, ?)");
						$instrucao->bind_param($palavraPasse, $id);
						$sucesso_funcao = $instrucao->execute();
						$instrucao->close();
				} catch (PDOException $e) {
						echo $e->getMessage();
				}
				if ($sucesso_funcao) {
						return "True";
				} else {
						return "False";
				}
    	}
	
	/*  POR FAZERR !!!!!!!! */

    function verDadosUtilizador($id) {
        try {
            $registo = $this->bd->query("SELECT * FROM Utilizadores WHERE U_ID = :U_ID", $id);
 
            if (isset($dados)) {
                $utilizador = new Utilizadores($registo["u_id"], $registo["u_nome"], $registo["u_numerofuncionario"], 
                                           $registo["u_nomeutilizador"], $registo["u_palavrapasse"], 
                                           $registo["u_tipoutilizador"], $registo["u_dataregisto"], 
                                           $registo["u_morada"], $registo["u_contatotelefonico"], 
                                           $registo["u_datanascimento"], $registo["u_funcao"],
                                           $registo["u_ativo"], $registo["u_fotografia"]);
                return $utilizador;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function obtemUtilizadorUsername($nomeUtilizador) {

        try {
            $user = array("U_USERNAME" => $nomeUtilizador);

            $registo = $this->bd->query("SELECT * FROM utilizadores WHERE U_USERNAME = :U_USERNAME", $user);

            $id = array("U_ID" => $registo[0]["U_ID"]);
            $permissao = $this->bd->query("SELECT P_ID FROM utilizadores_permissoes WHERE U_ID = :U_ID", $id);
            if ($registo != null && $permissao != null) {
                $utilizador = new Utilizadores($registo[0]["U_ID"], $registo[0]["U_NOMECOMPLETO"], $registo[0]["U_USERNAME"],
                    $registo[0]["U_PASSWORD"], $registo[0]["U_DATAREGISTO"],
                    $registo[0]["U_CONTATOTELEFONICO"], $registo[0]["U_EMAIL"],
                    $registo[0]["U_MORADA"], $registo[0]["U_FOTOGRAFIA"],
                    $registo[0]["U_ATIVO"], $permissao);

                $id = array("U_ID" => $utilizador->getId());
                $permissao = $this->bd->query("SELECT * FROM utilizadores_permissoes WHERE U_ID = :U_ID", $id);

                if($permissao != null){
                    $utilizador->setPermissao($permissao[0]["P_ID"]);
                }

                return $utilizador;
            }else{
                return NULL;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listarUtilizador(){
		$dados = array();

            $registo = $this->bd->query("SELECT * FROM utilizadores");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new Utilizadores(
						$registo[$i]["U_ID"],
						$registo[$i]["U_NOMECOMPLETO"],
						$registo[$i]["U_USERNAME"],
                        $registo[$i]["U_PASSWORD"],
						$registo[$i]["U_DATAREGISTO"],
                        $registo[$i]["U_CONTATOTELEFONICO"],
						$registo[$i]["U_EMAIL"],
                        $registo[$i]["U_MORADA"],
						$registo[$i]["U_FOTOGRAFIA"],
                        $registo[$i]["U_ATIVO"],
                        null);
            }
            return $dados;
    }

}