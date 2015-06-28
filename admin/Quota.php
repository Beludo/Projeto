<?php

// Classe de quotas de sócios
class Quota{

    private $id;
    private $sId;
    private $janeiro;
    private $fevereiro;
    private $marco;
    private $abril;
    private $maio;
    private $junho;
    private $julho;
    private $agosto;
	private $setembro;
	private $outubro;
	private $novembro;
	private $dezembro;
	private $ano;
    private $bd;

    function __construct($id, $sId, $janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro, $ano){
		$this->id = $id;
        $this->sId = $sId;
		$this->janeiro = $janeiro;
		$this->fevereiro = $fevereiro;
		$this->marco = $marco;
		$this->abril = $abril;
		$this->maio = $maio;
		$this->junho = $junho;
		$this->julho = $julho;
		$this->agosto = $agosto;
		$this->setembro = $setembro;
		$this->outubro = $outubro;
		$this->novembro = $novembro;
		$this->dezembro = $dezembro;
		$this->ano = $ano;
    }
	
	// Getters
	
	public function getId(){
        return $this->id;
    }
	
	public function getSId(){
        return $this->sId;
    }
	
	public function getJaneiro(){
        return $this->janeiro;
    }
	
	public function getFevereiro(){
        return $this->fevereiro;
    }
		
	public function getMarco(){
        return $this->marco;
    }
	
	public function getAbril(){
        return $this->abril;
    }
	
	public function getMaio(){
        return $this->maio;
    }
	
	public function getJunho(){
        return $this->junho;
    }
	
	public function getJulho(){
        return $this->julho;
    }
	
	public function getAgosto(){
        return $this->agosto;
    }
	
	public function getSetembro(){
        return $this->setembro;
    }
	
	public function getOutubro(){
        return $this->outubro;
    }
	
	public function getNovembro(){
        return $this->novembro;
    }
	
	public function getDezembro(){
        return $this->dezembro;
    }
	
	public function getAno(){
		return $this->ano;
	}
	
	// Setters
	
	public function setId($id){
        $this->id = $id;
    }
	
	public function setSId($sId){
        $this->sId = $sId;
    }
	
	public function setJaneiro($pago){
        $this->janeiro = $pago;
    }
	
	public function setFevereiro($pago){
        $this->fevereiro = $pago;
    }
		
	public function setMarco($pago){
        $this->marco = $pago;
    }
	
	public function setAbril($pago){
        $this->abril = $pago;
    }
	
	public function setMaio($pago){
        $this->maio = $pago;
    }
	
	public function setJunho($pago){
        $this->junho = $pago;
    }
	
	public function setJulho($pago){
        $this->julho = $pago;
    }
	
	public function setAgosto($pago){
        $this->agosto = $pago;
    }
	
	public function setSetembro($pago){
        $this->setembro = $pago;
    }
	
	public function setOutubro($pago){
        $this->outubro = $pago;
    }
	
	public function setNovembro($pago){
        $this->novembro = $pago;
    }
	
	public function setDezembro($pago){
        $this->dezembro = $pago;
    }
	
	public function setAno($ano){
		$this->ano = $ano;
	}
}

?>