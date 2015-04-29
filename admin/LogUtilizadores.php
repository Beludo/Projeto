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
class AcoesUtilizadores {
    private $id;
    private $idUtilizador;
    private $dataHora;
    private $acao;
    
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
    function __construct($id, $idUtilizador, $datahora, $acao) {
        $this->id= $id;
        $this->idUtilizador = $idUtilizador;
        $this->datahora = $datahora;
        $this->acao = $acao;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return id 
         */
    function getId() {
        return $this->id;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return idUtilizador 
         */
    function getUtilizador() {
        return $this->idUtilizador;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return data 
         */
    function getDataHora() {
        return $this->datahora;
    }
     /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return hora 
         */
    function getHora() {
        return $this->hora;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return acao 
         */
    function getAcao() {
        return $this->acao;
    }
     /*
         * Setter da classe AcoesUtilizadores
         * @param id
         * @return  
         */
    function setId($id) {
        $this->id = $id;
    }
    /*
         * Setter da classe AcoesUtilizadores
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
