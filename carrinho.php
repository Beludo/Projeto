<?php

class Carrinho {
    private $idCarrinho;
    private $produto;
    private $quantidade;
    private $preco;

    function __construct($idCarrinho, $produto, $quantidade, $preco){
        $this->idCarrinho = $idCarrinho;
        $this->produto = $produto;
        $this->quantidade  = $quantidade;
        $this->preco = $preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }



    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
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