<?php
include_once "admin/acessobd.php";
include_once "Visitantes.php";

class GereVisitante {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarVisitante($visitante){
		$data = time();

        $sql = "INSERT into visitantes (V_NOMECOMPLETO,V_USERNAME, V_PASSWORD, V_DATAREGISTO, V_CONTATOTELEFONICO,
        V_EMAIL,V_MORADA, V_FOTOGRAFIA, V_ATIVO, V_SOCIO) VALUES(:V_NOMECOMPLETO , :V_USERNAME, :V_PASSWORD, :V_DATAREGISTO, :V_CONTATOTELEFONICO, :V_EMAIL,:V_MORADA, :V_FOTOGRAFIA, :V_ATIVO, :V_SOCIO)";

        $dados_visitante = array(
            'V_NOMECOMPLETO' => $visitante->getNomeCompleto(),
            'V_USERNAME' => $visitante->getUsername(),
            'V_PASSWORD' => $visitante->getPassword(),
            'V_DATAREGISTO' => $visitante->getDataRegisto(),
            'V_CONTATOTELEFONICO' => $visitante->getContatoTelefonico(),
            'V_EMAIL' => $visitante->getEmail(),
            'V_MORADA' => $visitante->getMorada(),
            'V_FOTOGRAFIA' => $visitante->getFotografia(),
            'V_ATIVO' => $visitante->getAtivo(),
						'V_SOCIO' => $visitante->getSocio()
        );

		/*
		echo
            $visitante->getNomeCompleto() . "<br>" .
            $visitante->getUsername() . "<br>" .
            $visitante->getPassword() . "<br>" .
            $visitante->getDataRegisto() . "<br>" .
            $visitante->getContatoTelefonico() . "<br>" .
            $visitante->getEmail() . "<br>" .
            $visitante->getMorada() . "<br>" .
            $visitante->getFotografia() . "<br>" .
            $visitante->getAtivo() . "<br>".
						$visitante->getSocio() . "<br>"
        ;
		*/

        $this->bd->inserir($sql, $dados_visitante);

        $sql = "SELECT V_ID FROM visitantes WHERE V_USERNAME = :V_USERNAME;";
        $dados = array(
            'V_USERNAME' => $visitante->getUsername()
        );
        $idVisitante = $this->bd->query($sql, $dados);

        $sql2 = "INSERT INTO carrinho (V_ID, C_VISTA) VALUES(:V_ID , :C_VISTA);";
        $dadosCarrinho = array(
            'V_ID' => $idVisitante[0]["V_ID"],
            'C_VISTA' => false
        );

        $this->bd->inserir($sql2, $dadosCarrinho);
    }
	
	/*  POR FAZERR !!!!!!!! */
			function alterarPalavraPasse($palavraPasse, $id) {
				try {
						$instrucao = $LigacaoBD->prepare("UPDATE Visitantes SET (V_palavraPasse = ? WHERE V_id = ?) VALUES (?, ?)");
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

    function verDadosVisitante($id) {
        try {
            $registo = $this->bd->query("SELECT * FROM Visitantes WHERE V_ID = :V_ID", $id);
 
            if (isset($dados)) {
                $visitante = new Visitantes($registo["v_id"], $registo["v_nome"], $registo["v_numerofuncionario"], 
                                           $registo["v_nomevisitante"], $registo["v_palavrapasse"], 
                                           $registo["v_tipovisitante"], $registo["v_dataregisto"], 
                                           $registo["v_morada"], $registo["v_contatotelefonico"], 
                                           $registo["v_datanascimento"], $registo["v_funcao"],
                                           $registo["v_ativo"], $registo["v_fotografia"]);
                return $visitante;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function obtemVisitanteUsername($nomeVisitante) {

        try {
            $user = array("V_USERNAME" => $nomeVisitante);

            $registo = $this->bd->query("SELECT * FROM visitantes WHERE V_USERNAME = :V_USERNAME", $user);

            $id = array("V_ID" => $registo[0]["V_ID"]);
            if ($registo != null) {
                $visitante = new Visitantes($registo[0]["V_ID"], $registo[0]["V_NOMECOMPLETO"], $registo[0]["V_USERNAME"],
                    $registo[0]["V_PASSWORD"], $registo[0]["V_DATAREGISTO"],
                    $registo[0]["V_CONTATOTELEFONICO"], $registo[0]["V_EMAIL"],
                    $registo[0]["V_MORADA"], $registo[0]["V_FOTOGRAFIA"],
                    $registo[0]["V_ATIVO"]);
							
					return $visitante;
            }else{
                return NULL;
					}
              
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listarVisitante(){
		$dados = array();

            $registo = $this->bd->query("SELECT * FROM Visitantes");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new Visitantes(
						$registo[$i]["V_ID"],
						$registo[$i]["V_NOMECOMPLETO"],
						$registo[$i]["V_USERNAME"],
                        $registo[$i]["V_PASSWORD"],
						$registo[$i]["V_DATAREGISTO"],
                        $registo[$i]["V_CONTATOTELEFONICO"],
						$registo[$i]["V_EMAIL"],
                        $registo[$i]["V_MORADA"],
						$registo[$i]["V_FOTOGRAFIA"],
						$registo[$i]["V_ATIVO"],
                        $registo[$i]["V_SOCIO"]);
            }
            return $dados;
    }

}