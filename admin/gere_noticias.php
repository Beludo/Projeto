<?php

include_once "noticia.php";
include_once "acessobd.php";

class GereNoticias {
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionaNoticia($noticia){

           $sql = "INSERT into noticias ( NO_NOME , NO_DESCRICAO , NO_FOTO, NO_ATIVO) VALUES( :NO_NOME, :NO_DESCRICAO, :NO_FOTO, :NO_ATIVO)";
           $dados_noticia = array(
						 'NO_NOME' => $noticia->getNome(),
						 'NO_DESCRICAO' => $noticia->getDescricao(),
						 'NO_FOTO' => $noticia->getFoto(),
						 'NO_ATIVO' => $noticia->getAtivo()
						 );
			
        $this->bd->inserir($sql, $dados_noticia);
    }
	
	public function listarNoticias(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM noticias");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new noticia(
										$registo[$i]["NO_ID"],
										$registo[$i]["NO_NOME"],
										$registo[$i]["NO_DESCRICAO"],
										$registo[$i]["NO_FOTO"],
										$registo[$i]["NO_ATIVO"]
                        );
            }
            return $dados;
    }
	
	public function listarNoticiasAtivas(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM noticias where NO_ATIVO = 1");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new noticia(
										$registo[$i]["NO_ID"],
										$registo[$i]["NO_NOME"],
										$registo[$i]["NO_DESCRICAO"],
										$registo[$i]["NO_FOTO"],
										$registo[$i]["NO_ATIVO"]
                        );
            }
            return $dados;
    }
	
	public function listarUltimasTresNoticias(){
			$dados = array();

            $registo = $this->bd->query("SELECT * FROM noticias ORDER BY NO_ID DESC LIMIT 3");
            for($i=0; $i<count($registo); $i++){
                	$dados[] = new noticia(
										$registo[$i]["NO_ID"],
										$registo[$i]["NO_NOME"],
										$registo[$i]["NO_DESCRICAO"],
										$registo[$i]["NO_FOTO"],
										$registo[$i]["NO_ATIVO"]
                        );
            }
            return $dados;
    }
	
	
	function verDadosNoticia($id) {
        try {
            $idNoticia = array("NO_ID" => $id);
            $registo = $this->bd->query("SELECT * FROM noticias WHERE NO_ID = :NO_ID", $idNoticia);
 
            if (isset($registo)) {
				
                $noticia = new noticia(
					$registo[0]["NO_ID"],
					$registo[0]["NO_NOME"],
					$registo[0]["NO_DESCRICAO"],
					$registo[0]["NO_FOTO"],
					$registo[0]["NO_ATIVO"]
				);
                return $noticia;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	
	function editarNoticia($noticia){
		
		$sql = "UPDATE noticias SET NO_NOME=:NO_NOME , NO_DESCRICAO=:NO_DESCRICAO , NO_FOTO=:NO_FOTO, NO_ATIVO=:NO_ATIVO WHERE  NO_ID=:NO_ID";
           $dados_noticia = array(
						 'NO_NOME' => $noticia->getNome(),
						 'NO_DESCRICAO' => $noticia->getDescricao(),
						 'NO_FOTO' => $noticia->getFoto(),
						 'NO_ATIVO' => $noticia->getAtivo(),
						 'NO_ID' => $noticia->getId()
        );
		
        $this->bd->editar($sql, $dados_noticia);

 	}
	
		
}

?>