<?php
include_once "admin/acessobd.php";
include "carrinho.php";
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

        $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID AND C_FINALIZADO = :C_FINALIZADO;";
        $dados2 = array(
            'V_ID' => $idVisitante[0]["V_ID"],
            'C_FINALIZADO' => false
        );
        $vista = $this->bd->query($sql2, $dados2);
        $variavel = false;

        $sqlTemp = "SELECT COUNT(*) FROM loja_carrinho WHERE C_ID = :C_ID AND LA_ID = :LA_ID GROUP BY C_ID;";
        $dadosTemp = array(
            'C_ID' => $vista[0]["C_ID"],
            'LA_ID' => $idLoja
        );
        $existe = $this->bd->query($sqlTemp, $dadosTemp);
        if(!empty($vista)){
                if($existe <= 0){
                    $sql4 = "INSERT INTO loja_carrinho (C_ID, LA_ID, C_QUANTIDADE) VALUES(:C_ID , :LA_ID, :C_QUANTIDADE);";
                    $dadosCarrinho = array(
                        'C_ID' => $vista[0]["C_ID"],
                        'LA_ID' => $idLoja,
                        'C_QUANTIDADE' => $quantidade
                    );
                    $this->bd->inserir($sql4, $dadosCarrinho);

                    $sql5 = "UPDATE loja SET LA_ADICIONADO = LA_ADICIONADO + 1 WHERE LA_ID = :LA_ID;";
                    $produto = array(
                        'LA_ID' => $idLoja
                    );
                    $this->bd->editar($sql5, $produto);
                    header("Location: loja.php?sucesso=true");
                } else {
                    header("Location: loja.php?erro=3");
                }
        } else {
            $variavel = true;
        }
        if($variavel == true){
            $sql3 = "INSERT INTO carrinho (V_ID, C_VISTA, C_FINALIZADO) VALUES(:V_ID , :C_VISTA, :C_FINALIZADO);";
            $dadosCarrinho = array(
                'V_ID' => $idVisitante[0]["V_ID"],
                'C_VISTA' => false,
                'C_FINALIZADO' => false
            );

            $this->bd->inserir($sql3, $dadosCarrinho);

            $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID AND C_VISTA = :C_VISTA";
            $dados2 = array(
                'V_ID' => $idVisitante[0]["V_ID"],
                'C_VISTA' => false
            );
            $vista = $this->bd->query($sql2, $dados2);

            $sql4 = "INSERT INTO loja_carrinho (C_ID, LA_ID, C_QUANTIDADE) VALUES(:C_ID , :LA_ID, :C_QUANTIDADE);";
            $dadosCarrinho = array(
                'C_ID' => $vista[0]["C_ID"],
                'LA_ID' => $idLoja,
                'C_QUANTIDADE' => $quantidade
            );
            $this->bd->inserir($sql4, $dadosCarrinho);

            $sql5 = "UPDATE loja SET LA_ADICIONADO = LA_ADICIONADO + 1 WHERE LA_ID = :LA_ID;";
            $produto = array(
                'LA_ID' => $idLoja
            );
            $this->bd->editar($sql5, $produto);
            header("Location: loja.php?sucesso=true");
        }
    }

    function removerProduto($idLoja, $idCarrinho){
        $sql = "DELETE FROM loja_carrinho WHERE LA_ID = :LA_ID AND C_ID = :C_ID;";
        $dados = array(
            'LA_ID'=> $idLoja,
            'C_ID' => $idCarrinho
        );
        $this->bd->apagar($sql,$dados, $idCarrinho);

        $sql2 = "UPDATE loja SET LA_REMOVIDO = LA_REMOVIDO + 1 WHERE LA_ID = :LA_ID;";
        $produto = array(
            'LA_ID' => $idLoja
        );
        $this->bd->editar($sql2, $produto);
        header("Location: carrinho-compras.php?sucesso=true");
    }

    function verIdCarrinho($username){
        $produtos = array();
        $quantidades = array();
        $sql = "SELECT * FROM visitantes WHERE V_USERNAME = :V_USERNAME";
        $dados = array(
            'V_USERNAME' => $username
        );
        $idVisitante = $this->bd->query($sql, $dados);

        $sql2 = "SELECT * FROM carrinho WHERE V_ID = :V_ID AND C_FINALIZADO = :C_FINALIZADO;";
        $dados2 = array(
            'V_ID' => $idVisitante[0]["V_ID"],
            'C_FINALIZADO' => false
        );
        $dadosCarrinho = $this->bd->query($sql2, $dados2);

        $sql3 = "SELECT * FROM loja_carrinho WHERE C_ID = :C_ID;";
        $dados3 = array(
            'C_ID' => $dadosCarrinho[0]["C_ID"]
        );
        $dadosCarrinho1 = $this->bd->query($sql3, $dados3);

        for($i=0; $i<sizeof($dadosCarrinho1); $i++){
            $sql4 = "SELECT * FROM loja WHERE LA_ID = :LA_ID;";
            $dados4 = array(
                'LA_ID' => $dadosCarrinho1[$i]["LA_ID"]
            );
            $produto = $this->bd->query($sql4, $dados4);
            array_push($produtos, new Loja($produto[0]["LA_ID"],$produto[0]["LA_NOME"],$produto[0]["LA_CODIGO"], $produto[0]["LA_FOTOGRAFIA"], $produto[0]["LA_STOCK"],
            $produto[0]["LA_OBSERVACOES"],$produto[0]["LA_PRECO"],$produto[0]["LA_DISPONIBILIDADE"],$produto[0]["LA_ATIVO"],$produto[0]["LA_ADICIONADO"],$produto[0]["LA_REMOVIDO"], $produto[0]["LA_PESO"]));

            array_push($quantidades, $dadosCarrinho1[$i]["C_QUANTIDADE"]);
        }
            $carrinho = new Carrinho($dadosCarrinho[0]["C_ID"], $produtos, $quantidades);
            return $carrinho;
    }

    function listarMetodosPagamentos(){
        $sql = "SELECT distinct T_NOME FROM taxasentrega;";

        $dados = $this->bd->query($sql, null);

        return $dados;
    }

    function verMetodo($nome, $peso){
        if($peso > 30){
            $sql = "SELECT * FROM taxasentrega WHERE T_NOME = :T_NOME AND T_PESOINF = 30;";

            $dados = array(
                'T_NOME' => $nome
            );

            $metodo = $this->bd->query($sql, $dados);
            return $metodo;
        } else {
            $sql = "SELECT * FROM taxasentrega WHERE T_NOME = :T_NOME AND :PESO BETWEEN T_PESOINF AND T_PESOSUP;";

            $dados = array(
                'T_NOME' => $nome,
                'PESO' => $peso
            );
            $metodo = $this->bd->query($sql, $dados);
            return $metodo;
        }

    }

    function finalizarCarrinho($idCarrinho, $idMetodo, $preco){
        $sql = "UPDATE loja_carrinho SET T_ID = :T_ID WHERE C_ID = :C_ID;";
        $dados = array(
            'T_ID' => $idMetodo,
            'C_ID' => $idCarrinho
        );
        $this->bd->editar($sql, $dados);

        $sql2 = "UPDATE carrinho SET C_FINALIZADO = :C_FINALIZADO, C_PRECO = :C_PRECO WHERE C_ID = :C_ID;";

        $dados2 = array(
            'C_FINALIZADO' => true,
            'C_ID' => $idCarrinho,
            'C_PRECO' => $preco
        );

        $this->bd->editar($sql2, $dados2);

        $sql3 = "SELECT * FROM loja_carrinho WHERE C_ID = :C_ID;";

        $dados3 = array(
            'C_ID' => $idCarrinho
        );

        $produtos = $this->bd->query($sql3, $dados3);

        for($i=0; $i < sizeof($produtos); $i++){
            $sql4 = "UPDATE loja SET LA_STOCK = LA_STOCK - :LA_STOCK WHERE LA_ID = :LA_ID;";

            $dados4 = array(
                'LA_STOCK' => $produtos[$i]["C_QUANTIDADE"],
                'LA_ID' => $produtos[$i]["LA_ID"]
            );

            $this->bd->editar($sql4, $dados4);
        }
        header("Location: carrinho-compras.php?sucesso=true");
    }
}
