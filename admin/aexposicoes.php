<?php

include_once "acessobd.php";

class exposicoes
{
    private $id;
    private $teID;
    private $nome;
    private $observacoes;
    private $ativo;
    private $teNome;

    function __construct($id, $teID, $nome, $observacoes, $ativo, $teNome)
    {
        $this->id = $id;
        $this->teID = $teID;
        $this->nome = $nome;
        $this->observacoes = $observacoes;
        $this->ativo = $ativo;
        $this->teNome = $teNome;
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
    public function getTeID()
    {
        return $this->teID;
    }

    /**
     * @param mixed $teID
     */
    public function setTeID($teID)
    {
        $this->teID = $teID;
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
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * @param mixed $observacoes
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
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
        $sql = "UPDATE exposicoes SET EX_ATIVO = :EX_ATIVO WHERE EX_ID = :EX_ID";
        $dados = array(
            'EX_ATIVO' => $ativo,
            'EX_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

    /**
     * @return mixed
     */
    public function getTeNome()
    {
        return $this->teNome;
    }

    /**
     * @param mixed $teNome
     */
    public function setTeNome($teNome)
    {
        $this->teNome = $teNome;
    }

}


?>