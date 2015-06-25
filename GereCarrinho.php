<?php
include_once "admin/acessobd.php";
include "Carrinho.php";
include_once "admin/ALoja.php";

class GereCarrinho {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaProduto($idLoja, $username, $quantidade){
        $sql = "SELECT V_ID FROM visitantes WHERE V_USERNAME = :V_USERNAME;";
        $dados = array(
            'V_USERNAME' => $username
        );
        $idVisitante = $this->bd->query($sql, $dados);

        $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID";
        $dados2 = array(
            'V_ID' => $idVisitante[0]["V_ID"]
        );
        $vista = $this->bd->query($sql2, $dados2);
        $variavel = true;
        for($i=0; $i<sizeof($vista); $i++){
            if(!$vista[$i]["C_VISTA"]){
                $sql4 = "INSERT INTO loja_carrinho (C_ID, LA_ID, C_QUANTIDADE) VALUES(:C_ID , :LA_ID, :C_QUANTIDADE);";
                $dadosCarrinho = array(
                    'C_ID' => $vista[$i]["C_ID"],
                    'LA_ID' => $idLoja,
                    'C_QUANTIDADE' => $quantidade
                );
                $this->bd->inserir($sql4, $dadosCarrinho);
                $variavel = false;
            } else {
                $variavel = true;
            }
        }
        if($variavel == true){
            $sql3 = "INSERT INTO carrinho (V_ID, C_VISTA) VALUES(:V_ID , :C_VISTA);";
            $dadosCarrinho = array(
                'V_ID' => $idVisitante[0]["V_ID"],
                'C_VISTA' => false
            );

            $this->bd->inserir($sql3, $dadosCarrinho);

            $sql4 = "INSERT INTO loja_carrinho (C_ID, LA_ID, C_QUANTIDADE) VALUES(:C_ID , :LA_ID, :C_QUANTIDADE);";
            $dadosCarrinho = array(
                'C_ID' => $vista[$i]["C_ID"],
                'LA_ID' => $idLoja,
                'C_QUANTIDADE' => $quantidade
            );
            $this->bd->inserir($sql4, $dadosCarrinho);
        }
    }

    function verIdCarrinho($username){
        $produtos = array();
        $sql = "SELECT * FROM visitantes WHERE V_USERNAME = :V_USERNAME";
        $dados = array(
            'V_USERNAME' => $username
        );
        $idVisitante = $this->bd->query($sql, $dados);

        $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID AND C_VISTA = :C_VISTA;";
        $dados2 = array(
            'V_ID' => $idVisitante[0]["V_ID"],
            'C_VISTA' => false
        );
        $dadosCarrinho = $this->bd->query($sql2, $dados2);

        $sql3 = "SELECT * FROM loja_carrinho WHERE C_ID = :C_ID;";
        $dados3 = array(
            'C_ID' => $dadosCarrinho[0]["C_ID"]
        );
        $dadosCarrinho1 = $this->bd->query($sql3, $dados3);


        $sql4 = "SELECT * FROM loja WHERE LA_ID = :LA_ID;";
        $dados4 = array(
            'LA_ID' => $dadosCarrinho1[0]["LA_ID"]
        );
        $produto = $this->bd->query($sql4, $dados4);
        for($i=0; $i<sizeof($produto); $i++){
        array_push($produtos, new Loja($produto[$i]["LA_ID"],$produto[$i]["LA_NOME"],$produto[$i]["LA_CODIGO"], $produto[$i]["LA_FOTOGRAFIA"], $produto[$i]["LA_STOCK"],
            $produto[$i]["LA_OBSERVACOES"],$produto[$i]["LA_PRECO"],$produto[$i]["LA_DISPONIBILIDADE"],$produto[$i]["LA_ATIVO"],$produto[$i]["LA_ADICIONADO"],$produto[$i]["LA_REMOVIDO"]));
        }
        $carrinho = new Carrinho($dadosCarrinho[0]["C_ID"], $produtos);
        return $carrinho;
        }
}
