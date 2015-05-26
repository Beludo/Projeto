<?php
/**
 * Created by PhpStorm.
 * User: Beludo
 * Date: 28-04-2015
 * Time: 10:51
 */

class Permissoes {

    private $idUser;
    private $permTotal;
	private $permLoja;
	private $permEspaco;
	private $permInventario;
	private $permAcervo;
	private $permSocios;
	private $permMuseuVirt;

    function __construct($idUser, $permTotal, $permLoja, $permEspaco, $permInventario, $permAcervo, $permSocios, $permMuseuVirt){
        $this->idUser = $idUser;
		$this->permTotal = $permTotal;
		$this->permLoja = $permLoja;
		$this->permEspaco = $permEspaco;
		$this->permInventario = $permInventario;
		$this->permAcervo = $permAcervo;
		$this->permSocios = $permSocios;
		$this->permMuseuVirt = $permMuseuVirt;
    }

    /**
     * @param mixed idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

	/**
     * @param mixed permTotal
     */
    public function setPermTotal($permTotal)
    {
        $this->permTotal = $permTotal;
    }

    /**
     * @return mixed permTotal
     */
    public function getPermTotal()
    {
        return $this->permTotal;
    }
	
	/**
     * @param mixed permLoja
     */
    public function setPermLoja($permLoja)
    {
        $this->permLoja = $permLoja;
    }

    /**
     * @return mixed permLoja
     */
    public function getPermLoja()
    {
        return $this->permLoja;
    }
	
	/**
     * @param mixed permEspaco
     */
    public function setPermEspaco($permEspaco)
    {
        $this->permEspaco = $permEspaco;
    }

    /**
     * @return mixed permEspaco
     */
    public function getPermEspaco()
    {
        return $this->permEspaco;
    }
	
	/**
     * @param mixed permInventario
     */
    public function setPermInventario($permInventario)
    {
        $this->permInventario = $permInventario;
    }

    /**
     * @return mixed permInventario
     */
    public function getPermInventario()
    {
        return $this->permInventario;
    }
	
	/**
     * @param mixed permAcervo
     */
    public function setPermAcervo($permAcervo)
    {
        $this->permAcervo = $permAcervo;
    }

    /**
     * @return mixed permAcervo
     */
    public function getPermAcervo()
    {
        return $this->permAcervo;
    }
	
	/**
     * @param mixed permSocios
     */
    public function setPermSocios($permSocios)
    {
        $this->permSocios = $permSocios;
    }

    /**
     * @return mixed permSocios
     */
    public function getPermSocios()
    {
        return $this->permSocios;
    }
	
	/**
     * @param mixed permMuseuVirt
     */
    public function setPermMuseuVirt($permMuseuVirt)
    {
        $this->permMuseuVirt = $permMuseuVirt;
    }

    /**
     * @return mixed permMuseuVirt
     */
    public function getPermMuseuVirt()
    {
        return $this->permMuseuVirt;
    }
	
} 