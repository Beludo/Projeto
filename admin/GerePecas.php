<?php

include_once "Pecas.php";
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
	
}

?>