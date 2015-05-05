<?php

include_once "GerePermissoes.php";
include_once "acessobd.php";
include_once "Utilizadores.php";
include_once "Permissoes.php";

class GereUtilizadores {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarUtilizador(Utilizadores $utilizador){
        $sql = "INSERT into utilizadores ('U_nomeCompleto','U_username', 'U_password', 'U_dataRegisto', 'U_contatoTelefonico',
        'U_email','U_morada', 'U_fotografia', 'U_ativo') VALUES(:U_nomeCompleto , :U_username, :U_password, :U_dataRegisto, :U_contatoTelefonico,
        :U_email,:U_morada, :U_fotografia, :U_ativo)";

        $dados_utilizador = array(
            'U_nomeCompleto' => $utilizador->getNomeCompleto(),
            'U_username' => $utilizador->getUsername(),
            'U_password' => $utilizador->getPassword(),
            'U_dataRegisto' => $utilizador->getDataRegisto(),
            'U_contatoTelefonico' => $utilizador->getContatoTelefonico(),
            'U_email' => $utilizador->getEmail(),
            'U_morada' => $utilizador->getMorada(),
            'U_fotografia' => $utilizador->getFotografia(),
            'U_ativo' => $utilizador->getAtivo()
        );

        $this->bd->inserir($sql, $dados_utilizador);

        $registo = $this->bd->query("SELECT FROM 'gm'.'utilizadores' WHERE U_nomeCompleto = :U_nomeCompleto", $utilizador->getNomeCompleto());

        $gere = new GerePermissoes();

        $gere->atribuiPermissao($registo['U_id'], $utilizador->getPermissao());
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

            if ($registo != null) {
                $utilizador = new Utilizadores($registo[0]["U_ID"], $registo[0]["U_NOMECOMPLETO"], $registo[0]["U_USERNAME"],
                    $registo[0]["U_PASSWORD"], $registo[0]["U_DATAREGISTO"],
                    $registo[0]["U_CONTATOTELEFONICO"], $registo[0]["U_EMAIL"],
                    $registo[0]["U_MORADA"], $registo[0]["U_FOTOGRAFIA"],
                    $registo[0]["U_ATIVO"]);

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
                        $registo[$i]["U_ATIVO"]);
            }
            return $dados;
    }

}