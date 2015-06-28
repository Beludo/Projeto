<?php
include_once "acessobd.php";
include_once "Quota.php";

class GereQuotas {
	
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

	public function listarQuotasSocio($sId){
		$quotasDevolver = array();

		$dados = array('S_ID' => $sId);
		$quotas = $this->bd->query("SELECT * FROM cotas WHERE S_ID = :S_ID ORDER BY CA_ANO DESC", $dados);
		
		for($i=0; $i<count($quotas); $i++){
			$quotasDevolver[] = new Quota(
				$quotas[$i]["CA_ID"],
				$quotas[$i]["S_ID"],
				$quotas[$i]["CA_JANEIRO"],
				$quotas[$i]["CA_FEVEREIRO"],
				$quotas[$i]["CA_MARCO"],
				$quotas[$i]["CA_ABRIL"],
				$quotas[$i]["CA_MAIO"],
				$quotas[$i]["CA_JUNHO"],
				$quotas[$i]["CA_JULHO"],
				$quotas[$i]["CA_AGOSTO"],
				$quotas[$i]["CA_SETEMBRO"],
				$quotas[$i]["CA_OUTUBRO"],
				$quotas[$i]["CA_NOVEMBRO"],
				$quotas[$i]["CA_DEZEMBRO"],
				$quotas[$i]["CA_ANO"]
			);
		}
		return $quotasDevolver;
	}
	
	function adicionarAno($sId, $ano){

        $sql = "INSERT INTO cotas (S_ID, CA_ANO) VALUES (:S_ID, :CA_ANO);";

        $dados_quotas = array(
            'S_ID' => $sId,
            'CA_ANO' => $ano
        );

        $this->bd->inserir($sql, $dados_quotas);
    }
	
	function removerAno($sId, $ano){
	
        $sql = "DELETE FROM cotas WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO;";
		
        $dados_quotas = array(
            'S_ID' => $sId,
            'CA_ANO' => $ano
        );
		
        $this->bd->apagar($sql, $dados_quotas);
    }
	
	// Pagar janeiro
	public function pagarJaneiro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_JANEIRO = :CA_JANEIRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_JANEIRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar fevereiro
	public function pagarFevereiro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_FEVEREIRO = :CA_FEVEREIRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_FEVEREIRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
			
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar março
	public function pagarMarco($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_MARCO = :CA_MARCO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_MARCO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar abril
	public function pagarAbril($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_ABRIL = :CA_ABRIL WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_ABRIL' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar maio
	public function pagarMaio($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_MAIO = :CA_MAIO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_MAIO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar junho
	public function pagarJunho($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_JUNHO = :CA_JUNHO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_JUNHO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar julho
	public function pagarJulho($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_JULHO = :CA_JULHO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_JULHO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar agosto
	public function pagarAgosto($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_AGOSTO = :CA_AGOSTO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_AGOSTO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar setembro
	public function pagarSetembro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_SETEMBRO = :CA_SETEMBRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_SETEMBRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar outubro
	public function pagarOutubro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_OUTUBRO = :CA_OUTUBRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_OUTUBRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar novembro
	public function pagarNovembro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_NOVEMBRO = :CA_NOVEMBRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_NOVEMBRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
	
	// Pagar dezembro
	public function pagarDezembro($sId, $ano, $pago){
        $sql = "UPDATE cotas SET CA_DEZEMBRO = :CA_DEZEMBRO WHERE S_ID = :S_ID AND CA_ANO = :CA_ANO";
        $dados = array(
			'CA_DEZEMBRO' => !$pago,
            'S_ID' => $sId,
			'CA_ANO' => $ano
        );

        $this->bd->editar($sql, $dados);
    }
}
?>