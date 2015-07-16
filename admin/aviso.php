<?php

include_once "acessobd.php";

class aviso
{
    private $id;
    private $titulo;
    private $aviso;
    private $ativo;
    private $bd;

    function __construct($id, $titulo, $aviso, $ativo)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->aviso = $aviso;
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getAviso()
    {
        return $this->aviso;
    }

    /**
     * @param mixed $aviso
     */
    public function setAviso($aviso)
    {
        $this->aviso = $aviso;
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
        $sql = "UPDATE avisos SET AV_ATIVO = :AV_ATIVO WHERE AV_ID = :AV_ID";
        $dados = array(
            'AV_ATIVO' => $ativo,
            'AV_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

}

?>