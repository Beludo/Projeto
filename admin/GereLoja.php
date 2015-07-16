<?php

include_once "ALoja.php";
include_once "acessobd.php";

class GereLoja {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaProduto($produto){
        $sql = "INSERT into loja (LA_NOME, LA_CODIGO, LA_FOTOGRAFIA, LA_STOCK,
        LA_OBSERVACOES, LA_PRECO, LA_DISPONIBILIDADE, LA_ATIVO, LA_ADICIONADO, LA_REMOVIDO, LA_PESO) VALUES(:LA_NOME, :LA_CODIGO, :LA_FOTOGRAFIA, :LA_STOCK,
        :LA_OBSERVACOES, :LA_PRECO, :LA_DISPONIBILIDADE, :LA_ATIVO, :LA_ADICIONADO, :LA_REMOVIDO, :LA_PESO)";

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
            'LA_REMOVIDO' => $produto->getRemovido(),
            'LA_PESO' => $produto->getPeso()
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
													$registo[$i]["LA_REMOVIDO"],
                            $registo[$i]["LA_PESO"]
                                        );
							}
							return $dados;
			}
	
		public function listarProdutosAtivos(){
			$dados = array();

							$registo = $this->bd->query("SELECT * FROM loja where la_ativo = 1");
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
													$registo[$i]["LA_REMOVIDO"],
                            $registo[$i]["LA_PESO"]
                                        );
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
	
		function verDadosProdutos($id) {
        try {
            $idA = array("LA_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM loja WHERE LA_ID = :LA_ID", $idA);
 
            if (isset($registo)) {
				
                $produtos = new Loja(
					$registo[0]["LA_ID"],
					$registo[0]["LA_NOME"],
					$registo[0]["LA_CODIGO"],
					$registo[0]["LA_FOTOGRAFIA"],
					$registo[0]["LA_STOCK"],
					$registo[0]["LA_OBSERVACOES"],
					$registo[0]["LA_PRECO"],
					$registo[0]["LA_DISPONIBILIDADE"],
					$registo[0]["LA_ATIVO"],
					$registo[0]["LA_ADICIONADO"],
					$registo[0]["LA_REMOVIDO"],
                    $registo[0]["LA_PESO"]
				);
                return $produtos;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarProdutos($produtos){
		$sql = "UPDATE eventos SET LA_NOME=:LA_NOME , LA_CODIGO=:LA_CODIGO , LA_FOTOGRAFIA=:LA_FOTOGRAFIA, LA_STOCK=:LA_STOCK, LA_OBSERVACOES=:LA_OBSERVACOES, LA_PRECO=:LA_PRECO, LA_DISPONIBILIDADE=:LA_DISPONIBILIDADE, LA_ATIVO=:LA_ATIVO, LA_ADICIONADO=:LA_ADICIONADO, LA_REMOVIDO=:LA_REMOVIDO, LA_PESO=:LA_PESO  WHERE  LA_ID=:LA_ID";
           $dados_loja = array(
						 'LA_NOME' => $produtos->getNome(),
						 'LA_CODIGO' => $produtos->getCodigo(),
						 'LA_FOTOGRAFIA' => $produtos->getFotografia(),
						 'LA_STOCK' => $produtos->getStock(),
						 'LA_OBSERVACOES' => $produtos->getObservacoes(),
						 'LA_PRECO' => $produtos->getPreco(),
						 'LA_DISPONIBILIDADE' => $produtos->getDisponibilidade(),
						 'LA_ATIVO' => $produtos->getAtivo(),
						 'LA_ADICIONADO' => $produtos->getAdicionado(),
						 'LA_REMOVIDO' => $produtos->getRemovido(),
						 'LA_ID' => $produtos->getId(),
                         'LA_PESO' => $produtos->getPeso()
        );
		
        $this->bd->editar($sql, $dados_loja);

    }
}

?>