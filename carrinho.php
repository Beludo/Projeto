<?php

class Carrinho {
    private $idCarrinho;
    private $produto;

    function __construct($idCarrinho, $produto){
        $this->idCarrinho = $idCarrinho;
        $this->produto = $produto;
    }

    /**
     * @param mixed $idProduto
     */
    public function setIdCarrinho($idCarrinho)
    {
        $this->idCarrinho = $idCarrinho;
    }

    /**
     * @return mixed
     */
    public function getIdCarrinho()
    {
        return $this->idCarrinho;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

} 