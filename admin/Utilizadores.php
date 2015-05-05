<?php

class Utilizadores{

    private $id;
    private $nomeCompleto;
    private $username;
    private $password;
    private $dataRegisto;
    private $contatoTelefonico;
    private $email;
    private $morada;
    private $fotografia;
    private $permissao;

    /**
     * @param mixed $permissao
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    /**
     * @return mixed
     */
    public function getPermissao()
    {
        return $this->permissao;
    }
    private $ativo;

    function __construct($id, $nomeCompleto, $username, $password, $dataRegisto, $contatoTelefonico, $email, $morada, $fotografia, $ativo = true){
				$this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->username = $username;
        $this->password = $password;
        $this->dataRegisto = date("Y-m-d");
        $this->contatoTelefonico = $contatoTelefonico;
        $this->email = $email;
        $this->morada = $morada;
        $this->fotografia = $fotografia;
        $this->ativo = $ativo;
    }

    /**
     * @param boolean $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * @return boolean
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $contatoTelefonico
     */
    public function setContatoTelefonico($contatoTelefonico)
    {
        $this->contatoTelefonico = $contatoTelefonico;
    }

    /**
     * @return mixed
     */
    public function getContatoTelefonico()
    {
        return $this->contatoTelefonico;
    }

    /**
     * @param bool|string $dataRegisto
     */
    public function setDataRegisto($dataRegisto)
    {
        $this->dataRegisto = $dataRegisto;
    }

    /**
     * @return bool|string
     */
    public function getDataRegisto()
    {
        return $this->dataRegisto;
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
    public function getEmail()
    {
        return $this->email;
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
    public function getFotografia()
    {
        return $this->fotografia;
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
    public function getId()
    {
        return $this->id;
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
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param mixed $nomeCompleto
     */
    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    /**
     * @return mixed
     */
    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


}

?>