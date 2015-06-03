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
            'U_ATIVO' => $produto->getAtivo(),
            'LA_ADICIONADO' => $produto->getAdicionado(),
            'LA_REMOVIDO' => $produto->getRemovido()
        );
        $this->bd->inserir($sql, $dados_produtos);
    }
}

?>