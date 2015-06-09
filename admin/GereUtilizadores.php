<?php

include_once "GerePermissoes.php";
include_once "acessobd.php";
include_once "Utilizadores.php";

class GereUtilizadores {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarUtilizador($utilizador, $permissoes){
		$data = time();

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
        $nomeCompleto = $utilizador->getNomeCompleto();
		/*
		echo
            $utilizador->getNomeCompleto() . "<br>" .
            $utilizador->getUsername() . "<br>" .
            $utilizador->getPassword() . "<br>" .
            $utilizador->getDataRegisto() . "<br>" .
            $utilizador->getContatoTelefonico() . "<br>" .
            $utilizador->getEmail() . "<br>" .
            $utilizador->getMorada() . "<br>" .
            $utilizador->getFotografia() . "<br>" .
            $utilizador->getAtivo() . "<br>"
        ;
		*/

        $this->bd->inserir($sql, $dados_utilizador);

        $user = array('U_NOMECOMPLETO' => $nomeCompleto);
        $registo = $this->bd->query("SELECT U_ID FROM utilizadores WHERE U_NOMECOMPLETO = :U_NOMECOMPLETO", $user);
        $gerePermissoes = new GerePermissoes();

		// Atribuir permissões

		if($permissoes->getPermTotal() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 1);
		}

        if($permissoes->getPermLoja() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 2);
		}

		if($permissoes->getPermEspaco() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 3);
		}
		
		if($permissoes->getPermInventario() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 4);
		}
		
		if($permissoes->getPermAcervo() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 5);
		}
		
		if($permissoes->getPermSocios() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 6);
		}
		
		if($permissoes->getPermMuseuVirt() == "sim") {
			$gerePermissoes->atribuiPermissao($registo[0]["U_ID"], 7);
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
            $idA = array("U_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM Utilizadores WHERE U_ID = :U_ID", $idA);
 
            if (isset($registo)) {
			
                $utilizador = new Utilizadores(
					$registo[0]["U_ID"],
					$registo[0]["U_NOMECOMPLETO"],
					$registo[0]["U_USERNAME"],
					$registo[0]["U_PASSWORD"],
					$registo[0]["U_DATAREGISTO"],
					$registo[0]["U_CONTATOTELEFONICO"],
					$registo[0]["U_EMAIL"],
					$registo[0]["U_MORADA"],
					$registo[0]["U_FOTOGRAFIA"],
					$registo[0]["U_ATIVO"],
					"0"
				);
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