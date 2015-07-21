<?php

include_once "acessobd.php";

class noticia
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
        $sql = "UPDATE noticias SET NO_ATIVO = :NO_ATIVO WHERE NO_ID = :NO_ID";
        $dados = array(
            'NO_ATIVO' => $ativo,
            'NO_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

}

?>