<?php
include_once "acessobd.php";
include_once "Quota.php";

class GereQuotas {
	
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

	public function listarQuotasSocio($sId){
		$dados = array();

		$dados = array('S_ID' => $sId);
		$quotas = $this->bd->query("SELECT * FROM cotas WHERE S_ID = :S_ID", $dados);
		
		for($i=0; $i<count($quotas); $i++){
			$dados[] = new Visitantes(
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
		return $dados;
	}
}
?>