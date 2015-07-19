<?php
include_once "acessobd.php";

class marcacao
{

    private $id;
    private $nome;
    private $entidade;
    private $telefone;
    private $morada;
    private $email;
    private $data;
    private $nPessoas;
    private $aceite;
	private $bd;

    function __construct($id, $nome, $entidade, $telefone, $morada, $email, $data, $nPessoas, $aceite)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->entidade = $entidade;
        $this->telefone = $telefone;
        $this->morada = $morada;
        $this->email = $email;
        $this->data = $data;
        $this->nPessoas = $nPessoas;
        $this->aceite = $aceite;
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
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param mixed $morada
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getNPessoas()
    {
        return $this->nPessoas;
    }

    /**
     * @param mixed $nPessoas
     */
    public function setNPessoas($nPessoas)
    {
        $this->nPessoas = $nPessoas;
    }

    /**
     * @return mixed
     */
    public function getAceite()
    {
        return $this->aceite;
    }

    /**
     * @param mixed $aceite
     */
    public function setAceite($aceite, $id)
    {
       $this->aceite = $aceite;
        $sql = "UPDATE marcacao SET MA_ACEITE = :MA_ACEITE WHERE MA_ID = :MA_ID";
        $dados = array(
            'MA_ACEITE' => $aceite,
            'MA_ID' => $id
        );
    }




}

?>