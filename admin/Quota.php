<?php
include_once "acessobd.php";

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

    function __construct($id, $sId, $janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $novembro, $ano){
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
        $this->bd = new BaseDados();
    }
	
	// Pagar janeiro
	public function setJaneiro($sId, $ano, $pago){
        $this->janeiro = $pago;
        $sql = "UPDATE cotas SET CA_JANEIRO = :CA_JANEIRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_JANEIRO' => $pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
}

?>