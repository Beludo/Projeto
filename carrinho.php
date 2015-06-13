<?php

class Carrinho {
    private $idProduto;
    private $nome;
    private $preco;
    private $descricao;
    private $quantidade;

    function __construct($idProduto, $nome, $preco, $descricao, $quantidade){
        $this->idProduto = $idProduto;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $idProduto
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
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


} 