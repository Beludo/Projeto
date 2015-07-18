<?php
include_once "acessobd.php";

class Pecas {
    private $id;
    private $museu;
		private $exposicao;
    private $nInventario;
    private $categoria;
    private $nome;
    private $datacao;
    private $descricao;
    private $fotografia;
    private $origem;
    private $ativo;

    function __construct($id, $exposicao, $museu, $nInventario, $categoria, $nome, $datacao, $descricao, $fotografia, $origem, $ativo)
    {
        $this->id = $id;
        $this->exposicao = $exposicao;
				$this->museu = $museu;
        $this->nInventario = $nInventario;
        $this->categoria = $categoria;
        $this->nome = $nome;
        $this->datacao = $datacao;
        $this->descricao = $descricao;
        $this->fotografia = $fotografia;
        $this->origem = $origem;
        $this->ativo = $ativo;
		$this->bd = new BaseDados();
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
    public function getExposicao()
    {
        return $this->exposicao;
    }

    /**
     * @param mixed $museu
     */
    public function setExposicao($exposicao)
    {
        $this->exposicao = $exposicao;
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
    public function getNInventario()
    {
        return $this->nInventario;
    }

    /**
     * @param mixed $nInventário
     */
    public function setNInventario($nInventario)
    {
        $this->nInventario = $nInventario;
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
    public function setAtivo($ativo, $id)
    {
         $this->ativo = $ativo;
        $sql = "UPDATE pecas SET PE_ATIVO = :PE_ATIVO WHERE PE_ID = :PE_ID";
        $dados = array(
            'PE_ATIVO' => $ativo,
            'PE_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }



}
?>