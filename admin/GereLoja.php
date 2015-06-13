<?php

include_once "Loja.php";
include_once "acessobd.php";

class GereLoja {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaProduto($produto){
        $sql = "INSERT into loja (LA_NOME, LA_CODIGO, LA_FOTOGRAFIA, LA_STOCK,
        LA_OBSERVACOES, LA_PRECO, LA_DISPONIBILIDADE, LA_ATIVO, LA_ADICIONADO, LA_REMOVIDO) VALUES(:LA_NOME, :LA_CODIGO, :LA_FOTOGRAFIA, :LA_STOCK,
        :LA_OBSERVACOES, :LA_PRECO, :LA_DISPONIBILIDADE, :LA_ATIVO, :LA_ADICIONADO, :LA_REMOVIDO)";

        $dados_produtos = array(
            'LA_NOME' => $produto->getNome(),
            'LA_CODIGO' => $produto->getCodigo(),
            'LA_FOTOGRAFIA' => $produto->getFotografia(),
            'LA_STOCK' => $produto->getStock(),
            'LA_OBSERVACOES' => $produto->getObservacoes(),
            'LA_PRECO' => $produto->getPreco(),
            'LA_DISPONIBILIDADE' => $produto->getDisponibilidade(),
            'LA_ATIVO' => $produto->getAtivo(),
            'LA_ADICIONADO' => $produto->getAdicionado(),
            'LA_REMOVIDO' => $produto->getRemovido()
        );
        $this->bd->inserir($sql, $dados_produtos);
    }
	
		public function listarProdutos(){
			$dados = array();

							$registo = $this->bd->query("SELECT * FROM loja");
							for($i=0; $i<count($registo); $i++){
										$dados[] = new Loja(
							$registo[$i]["LA_ID"],
							$registo[$i]["LA_NOME"],
							$registo[$i]["LA_CODIGO"],
													$registo[$i]["LA_FOTOGRAFIA"],
							$registo[$i]["LA_STOCK"],
													$registo[$i]["LA_OBSERVACOES"],
							$registo[$i]["LA_PRECO"],
													$registo[$i]["LA_DISPONIBILIDADE"],
							$registo[$i]["LA_ATIVO"],
													$registo[$i]["LA_ADICIONADO"],
													$registo[$i]["LA_REMOVIDO"]);
							}
							return $dados;
			}

        public function verProdutoId($idProduto){
            $dados = array (
                'LA_ID'=> $idProduto
            );

            $registo = $this->bd->query("SELECT * FROM loja WHERE LA_ID = :LA_ID", $dados);
            return $registo;
        }
}

?>