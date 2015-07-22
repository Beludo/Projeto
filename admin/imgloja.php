<?php
include_once "acessobd.php";

class imgloja
{

    private $id;
    private $ficheiro;
    private $ativo;
		private $bd;

    function __construct($id, $ficheiro, $ativo)
    {
        $this->id = $id;
        $this->ficheiro = $ficheiro;
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
    public function getFicheiro()
    {
        return $this->ficheiro;
    }

    /**
     * @param mixed $ficheiro
     */
    public function setFicheiro($ficheiro)
    {
        $this->ficheiro = $ficheiro;
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
        $sql = "UPDATE img_banner_loja SET IL_ATIVO = :IL_ATIVO WHERE IL_ID = :IL_ID";
        $dados = array(
            'IL_ATIVO' => $ativo,
            'IL_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }





}

?>
