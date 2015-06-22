<?php
/**
 * Esta classe contem os atributos necessários para gerir e guardar todas as ações por utilizador, efetuadas no sistema, exatamente como um log automático.
 *
 * Atributo utilizador:
 * - Indica que utilizador realizou determinada ação.
 * Atributo data:
 * - Indica a data de uma determinada ação.
 * Atributo hora:
 * - Indica a hora de uma determinada ação.
 * Atributo acao:
 * - Indica que ação foi realizada.
 */
class LogUtilizadores {
    private $id;
    private $idUtilizador;
    private $dataHora;
    private $acao;
		private $nomeUtilizador;
    
     /*
         * Construtor da classe AcoesUtilizadores
         * 
         * @param id
         * @param idUtilizador
         * @param data
         * @param hora
         * @param acao
         * @return 
         *          */
    function __construct($id, $idUtilizador, $acao, $datahora, $nomecompleto) {
        $this->id= $id;
        $this->idUtilizador = $idUtilizador;
        $this->datahora = $datahora;
        $this->acao = $acao;
				$this->nomecompleto = $nomecompleto;
    }

    /**
     * @return mixed
     */
    public function getNomecompleto()
    {
        return $this->nomecompleto;
    }

    /**
     * @param mixed $nomecompleto
     */
    public function setNomecompleto($nomecompleto)
    {
        $this->nomecompleto = $nomecompleto;
    }

    /**
     * @return mixed
     */
    public function getNomeUtilizador()
    {
        return $this->nomeUtilizador;
    }

    /**
     * @param mixed $nomeUtilizador
     */
    public function setNomeUtilizador($nomeUtilizador)
    {
        $this->nomeUtilizador = $nomeUtilizador;
    }

    /**
     * @return mixed
     */
    public function getIdUtilizador()
    {
        return $this->idUtilizador;
    }

    /**
     * @param mixed $idUtilizador
     */
    public function setIdUtilizador($idUtilizador)
    {
        $this->idUtilizador = $idUtilizador;
    }

    /*
         *
         * @param 
         * @return id 
         */
    function getId() {
        return $this->id;
    }
    /*
         *
         * @param 
         * @return idUtilizador 
         */
    function getUtilizador() {
        return $this->idUtilizador;
    }
    /*
         *
         * @param 
         * @return data 
         */
    function getDataHora() {
        return $this->datahora;
    }
     /*
         *
         * @param 
         * @return hora 
         */
    function getHora() {
        return $this->hora;
    }
    /*
         *
         * @param 
         * @return acao 
         */
    function getAcao() {
        return $this->acao;
    }
     /*
         * Setter da
         * @param id
         * @return  
         */
    function setId($id) {
        $this->id = $id;
    }
    /*
         * Setter da
         * @param idUtilizador
         * @return  
         */
    function setUtilizador($idUtilizador) {
        $this->idUtilizador = $idUtilizador;
    }
/*
         * Setter da classe data
         * @param idUtilizador
         * @return  
         */
    function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }
/*
         * Setter da classe acao
         * @param idUtilizador
         * @return  
         */
    function setAcao($acao) {
        $this->acao = $acao;
    }

}
