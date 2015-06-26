<?php

include_once "acessobd.php";

class tipoexposicoes
{
    private $id;
    private $nome;
	private $ativo;

    function __construct($id, $nome, $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
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

	public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $nome
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }
}

?>