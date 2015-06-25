<?php

include_once "acessobd.php";

class eventos
{

    private $id;
    private $nome;
    private $descricao;
    private $foto;
    private $ativo;
	private $bd;

    function __construct($id, $nome, $descricao, $foto, $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
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
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
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
        $sql = "UPDATE eventos SET E_ATIVO = :E_ATIVO WHERE E_ID = :E_ID";
        $dados = array(
            'E_ATIVO' => $ativo,
            'E_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

}

?>