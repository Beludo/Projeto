<?php
include_once "acessobd.php";

class Loja {

    private $id;
    private $nome;
    private $codigo;
    private $fotografia;
    private $stock;
    private $observacoes;
    private $preco;
    private $disponibilidade;
    private $ativo;
    private $adicionado;
    private $removido;
    private $bd;

    function __construct($id, $nome,$codigo,$fotografia,$stock, $observacoes, $preco, $disponibilidade, $ativo, $adicionado, $removido){
        $this->id = $id;
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->fotografia = $fotografia;
        $this->stock = $stock;
        $this->observacoes = $observacoes;
        $this->preco = $preco;
        $this->disponibilidade = $disponibilidade;
        $this->ativo = $ativo;
        $this->adicionado = $adicionado;
        $this->removido = $removido;
        $this->bd = new BaseDados();
    }

    /**
     * @param mixed $adicionado
     */
    public function setAdicionado($adicionado)
    {
        $this->adicionado = $adicionado;
    }

    /**
     * @return mixed
     */
    public function getAdicionado()
    {
        return $this->adicionado;
    }

    /**
     * @param mixed $ativo
     */
    public function setAtivo($ativo, $id)
    {
          $this->ativo = $ativo;
        $sql = "UPDATE loja SET LA_ATIVO = :LA_ATIVO WHERE LA_ID = :LA_ID";
        $dados = array(
            'LA_ATIVO' => $ativo,
            'LA_ID' => $id
        );

        $this->bd->editar($sql, $dados);
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
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
     * @param mixed $disponibilidade
     */
    public function setDisponibilidade($disponibilidade)
    {
        $this->disponibilidade = $disponibilidade;
    }

    /**
     * @return mixed
     */
    public function getDisponibilidade()
    {
        return $this->disponibilidade;
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
     * @param mixed $observacoes
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }

    /**
     * @return mixed
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $removido
     */
    public function setRemovido($removido)
    {
        $this->removido = $removido;
    }

    /**
     * @return mixed
     */
    public function getRemovido()
    {
        return $this->removido;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }
}

?>