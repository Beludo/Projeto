<?php
/**
 * Created by PhpStorm.
 * User: Beludo
 * Date: 28-04-2015
 * Time: 10:51
 */

class Permissoes {

    private $id;
    private $permissao;

    function __construct($permissao){
        $this->permissao = $permissao;
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
     * @param mixed $permissao
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    /**
     * @return mixed
     */
    public function getPermissao()
    {
        return $this->permissao;
    }
} 