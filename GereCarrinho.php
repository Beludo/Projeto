<?php
include_once "admin/acessobd.php";
include "Carrinho.php";

class GereCarrinho {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaProduto($idLoja, $username){
        $sql = "SELECT V_ID FROM visitantes WHERE V_USERNAME = :V_USERNAME;";
        $dados = array(
            'V_USERNAME' => $username
        );
        $idVisitante = $this->bd->query($sql, $dados);

        $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID";
        $dados2 = array(
            'V_ID' => $idVisitante["V_ID"]
        );
        $vista = $this->bd->query($sql2, $dados2);

        if($vista["C_VISTA"]){
            $sql3 = "INSERT INTO carrinho (V_ID, C_VISTA) VALUES(:V_ID , :C_VISTA);";
            $dadosCarrinho = array(
                'V_ID' => $idVisitante["V_ID"],
                'C_VISTA' => false
            );

            $this->bd->inserir($sql3, $dadosCarrinho);
        } else {
            $sql4 = "INSERT INTO loja_carrinho (C_ID, LA_ID) VALUES(:C_ID , :LA_ID);";
            $dadosCarrinho = array(
                'C_ID' => $vista["C_ID"],
                'LA_ID' => $idLoja
            );
            $this->bd->inserir($sql4, $dadosCarrinho);
        }
    }
}
