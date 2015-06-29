<?php

include_once "acessobd.php";

class parceria
{
	
	 private $id;
    private $entidade;
    private $condicao;
    private $data;
    private $ativo;
		private $bd;

    function __construct($id, $entidade, $condicao, $data, $ativo)
    {
        $this->id = $id;
        $this->entidade = $entidade;
        $this->condicao = $condicao;
        $this->data = $data;
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
    public function getEntidade()
    {
        return $this->entidade;
    }

    /**
     * @param mixed $entidade
     */
    public function setEntidade($entidade)
    {
        $this->entidade = $entidade;
    }

    /**
     * @return mixed
     */
    public function getCondicao()
    {
        return $this->condicao;
    }

    /**
     * @param mixed $condicao
     */
    public function setCondicao($condicao)
    {
        $this->condicao = $condicao;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
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
        $sql = "UPDATE parcerias SET PA_ATIVO = :PA_ATIVO WHERE PA_ID = :PA_ID";
        $dados = array(
            'PA_ATIVO' => $ativo,
            'PA_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

}

?>
