<?php
include_once "admin/acessobd.php";
class Visitantes{

    private $id;
    private $nomeCompleto;
    private $username;
    private $password;
    private $dataRegisto;
    private $contatoTelefonico;
    private $email;
    private $morada;
    private $fotografia;
    private $ativo;
    private $bd;

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
        $this->bd = new BaseDados();
    }

    /**
     * @param boolean $ativo
     */
    public function setAtivo($ativo, $idVisitante)
    {
        $this->ativo = $ativo;
        $sql = "UPDATE visitante SET V_ATIVO = :V_ATIVO WHERE V_ID = :V_ID";
        $dados = array(
            'V_ATIVO' => $ativo,
            'V_ID' => $idVisitante
        );

        $this->bd->editar($sql, $dados);
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
    public function setContatoTelefonico($contatoTelefonico, $idVisitante)
    {
        $this->contatoTelefonico = $contatoTelefonico;
        $this->contatoTelefonico = $contatoTelefonico;
        $sql = "UPDATE visitante SET V_CONTATOTELEFONICO = :V_CONTATOTELEFONICO WHERE V_ID = :V_ID";
        $dados = array(
            'V_CONTATOTELEFONICO' => $contatoTelefonico,
            'V_ID' => $idVisitante
        );

        $this->bd->editar($sql, $dados);
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
    public function setEmail($email, $idVisitante)
    {
        $this->email = $email;
        $sql = "UPDATE visitante SET V_EMAIL = :V_EMAIL WHERE V_ID = :V_ID";
        $dados = array(
            'V_EMAIL' => $email,
            'V_ID' => $idVisitante
        );

        $this->bd->editar($sql, $dados);
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
    public function setMorada($morada, $idVisitante)
    {
        $this->morada = $morada;
        $sql = "UPDATE visitante SET V_MORADA = :V_MORADA WHERE V_ID = :V_ID";
        $dados = array(
            'V_MORADA' => $morada,
            'V_ID' => $idVisitante
        );

        $this->bd->editar($sql, $dados);
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
    public function setNomeCompleto($nomeCompleto, $idVisitante)
    {
        $this->nomeCompleto = $nomeCompleto;
        $sql = "UPDATE visitante SET V_NOMECOMPLETO = :V_NOMECOMPLETO WHERE V_ID = :V_ID";
        $dados = array(
            'V_EMAIL' => $nomeCompleto,
            'V_ID' => $idVisitante
        );

        $this->bd->editar($sql, $dados);
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