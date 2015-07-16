<?php

include_once "pecas.php";
include_once "acessobd.php";

class GerePecas {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaArtigos($pecas){
        $sql = "INSERT into  pecas  ( PE_MUSEU , PE_NUMEROINVENTARIO , PE_CATEGORIA , PE_NOME , PE_DATACAO , PE_DESCRICAO , PE_FOTOGRAFIA , PE_ORIGEM , PE_ATIVO )
        VALUES(:PE_MUSEU , :PE_NUMEROINVENTARIO , :PE_CATEGORIA , :PE_NOME , :PE_DATACAO , :PE_DESCRICAO , :PE_FOTOGRAFIA , :PE_ORIGEM , :PE_ATIVO)";

        $dados_pecas = array(
            'PE_MUSEU' => $pecas->getMuseu(),
            'PE_NUMEROINVENTARIO' => $pecas->getNInventario(),
            'PE_CATEGORIA' => $pecas->getCategoria(),
            'PE_NOME' => $pecas->getNome(),
            'PE_DATACAO' => $pecas->getDatacao(),
            'PE_DESCRICAO' => $pecas->getDescricao(),
            'PE_FOTOGRAFIA' => $pecas->getFotografia(),
            'PE_ORIGEM' => $pecas->getOrigem(),
            'PE_ATIVO' => $pecas->getAtivo()
        );
        $this->bd->inserir($sql, $dados_pecas);
    }
	
		public function listarArtigos(){
			$dados = array();

							$registo = $this->bd->query("SELECT * FROM pecas");
							for($i=0; $i<count($registo); $i++){
										$dados[] = new pecas(
											$registo[$i]["PE_ID"],
											$registo[$i]["PE_MUSEU"],
											$registo[$i]["PE_NUMEROINVENTARIO"],
											$registo[$i]["PE_CATEGORIA"],
											$registo[$i]["PE_NOME"],
											$registo[$i]["PE_DATACAO"],
											$registo[$i]["PE_DESCRICAO"],
											$registo[$i]["PE_FOTOGRAFIA"],
											$registo[$i]["PE_ORIGEM"],
											$registo[$i]["PE_ATIVO"]
										);
							}
							return $dados;
			}
	
	public function listarArtigosAtivos(){
			$dados = array();

							$registo = $this->bd->query("SELECT * FROM pecas where PE_ATIVO = 1");
							for($i=0; $i<count($registo); $i++){
										$dados[] = new pecas(
											$registo[$i]["PE_ID"],
											$registo[$i]["PE_MUSEU"],
											$registo[$i]["PE_NUMEROINVENTARIO"],
											$registo[$i]["PE_CATEGORIA"],
											$registo[$i]["PE_NOME"],
											$registo[$i]["PE_DATACAO"],
											$registo[$i]["PE_DESCRICAO"],
											$registo[$i]["PE_FOTOGRAFIA"],
											$registo[$i]["PE_ORIGEM"],
											$registo[$i]["PE_ATIVO"]
										);
							}
							return $dados;
			}
	
	
	
	function verDadosArtigo($id) {
        try {
            $idA = array("PE_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM pecas WHERE PE_ID = :PE_ID", $idA);
 
            if (isset($registo)) {
				
                $artigo = new pecas(
									$registo[0]["PE_ID"],
									$registo[0]["PE_MUSEU"],
									$registo[0]["PE_NUMEROINVENTARIO"],
									$registo[0]["PE_CATEGORIA"],
									$registo[0]["PE_NOME"],
									$registo[0]["PE_DATACAO"],
									$registo[0]["PE_DESCRICAO"],
									$registo[0]["PE_FOTOGRAFIA"],
									$registo[0]["PE_ORIGEM"],
									$registo[0]["PE_ATIVO"]
				);
                return $artigo;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarArtigo($artigo){
		
		$sql = "UPDATE pecas SET PE_MUSEU = :PE_MUSEU, PE_NUMEROINVENTARIO = :PE_NUMEROINVENTARIO, PE_CATEGORIA = :PE_CATEGORIA , PE_NOME = :PE_NOME , PE_DATACAO = :PE_DATACAO, PE_DESCRICAO = :PE_DESCRICAO , PE_FOTOGRAFIA = :PE_FOTOGRAFIA , PE_ORIGEM = :PE_ORIGEM , PE_ATIVO = :PE_ATIVO WHERE PE_ID = :PE_ID;";
           $dados_artigo = array(
						 'PE_MUSEU' => $artigo->getMuseu(),
						 'PE_NUMEROINVENTARIO' => $artigo->getNInventario(),
						 'PE_CATEGORIA' => $artigo->getCategoria(),
						 'PE_NOME' => $artigo->getNome(),
						 'PE_DATACAO' => $artigo->getDatacao(),
						 'PE_DESCRICAO' => $artigo->getDescricao(),
						 'PE_FOTOGRAFIA' => $artigo->getFotografia(),
						 'PE_ORIGEM' => $artigo->getOrigem(),
						 'PE_ATIVO' => $artigo->getAtivo(),
						 'PE_ID' => $artigo->getId()
        );
		
        $this->bd->editar($sql, $dados_artigo);

 	}
	
}

?>