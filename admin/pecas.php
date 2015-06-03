<?php
include_once "acessobd.php";

class pecas {
    private $id;
    private $museu;
    private $nInventário;
    private $categoria;
    private $nome;
    private $datacao;
    private $materia;
    private $dimensoes;
    private $descricao;
    private $fotografia;
    private $origem;
    private $ativo;

    function __construct($id, $museu, $nInventário, $categoria, $nome, $datacao, $materia, $dimensoes, $descricao, $fotografia, $origem, $ativo)
    {
        $this->id = $id;
        $this->museu = $museu;
        $this->nInventário = $nInventário;
        $this->categoria = $categoria;
        $this->nome = $nome;
        $this->datacao = $datacao;
        $this->materia = $materia;
        $this->dimensoes = $dimensoes;
        $this->descricao = $descricao;
        $this->fotografia = $fotografia;
        $this->origem = $origem;
        $this->ativo = $ativo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMuseu()
    {
        return $this->museu;
    }

    /**
     * @param mixed $museu
     */
    public function setMuseu($museu)
    {
        $this->museu = $museu;
    }

    /**
     * @return mixed
     */
    public function getNInventário()
    {
        return $this->nInventário;
    }

    /**
     * @param mixed $nInventário
     */
    public function setNInventário($nInventário)
    {
        $this->nInventário = $nInventário;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
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
    public function getDatacao()
    {
        return $this->datacao;
    }

    /**
     * @param mixed $datacao
     */
    public function setDatacao($datacao)
    {
        $this->datacao = $datacao;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * @param mixed $materia
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

    /**
     * @return mixed
     */
    public function getDimensoes()
    {
        return $this->dimensoes;
    }

    /**
     * @param mixed $dimensoes
     */
    public function setDimensoes($dimensoes)
    {
        $this->dimensoes = $dimensoes;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
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
    public function getFotografia()
    {
        return $this->fotografia;
    }

    /**
     * @param mixed $fotografia
     */
    public function setFotografia($fotografia)
    {
        $this->fotografia = $fotografia;
    }

    /**
     * @return mixed
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * @param mixed $origem
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }



}
?>