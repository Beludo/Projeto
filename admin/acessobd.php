<?php
	/*
		acessobd.php - classe para manipular a base de dados
		
		funções:
			|- construct($host, $db, $user, $pass)
			|- destruct()
			|- inserir($sql, $dados[] = null)
			|- editar($sql, $dados[] = null)
			|- apagar($sql, $id = 0)
			|- query($sql, $param[] = null)
			`- contar($tabela)

	*/
	
	include_once "conf.php";

	class BaseDados{
		public $DBH;
		
		// Liga��o � base de dados
		function __construct(){
			global $conf_servidor;
			global $conf_bd;
			global $conf_user;
			global $conf_pass;
			
			try{
				$this->DBH = new PDO("mysql:host=$conf_servidor;dbname=$conf_bd", $conf_user, $conf_pass);
			}catch(PDOException $e) {
				echo $e->getMessage();
				return false;
			}
			return true;
		}
		
		/*
			Desligar da base de dados
			(assim que seja apagada a ultima referencia ao objeto)
		*/
		function __destruct(){
			$this->DBH == null;
		}
		
		// inserir dados numa tabela
		public function inserir($sql, $dados = null){
		try{
			$STH = $this->DBH->prepare($sql);
			
			if(!$STH->execute($dados)){
				echo "Ocorreu um erro ao inserir os dados!<br>";
			}
		
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
		
		// acutalizar dados de uma tabela
		public function editar($sql, $dados = null){
			try{
				$STH = $this->DBH->prepare($sql);
				
				if(!$STH->execute($dados)){
					echo "Ocorreu um erro ao actualizar os dados!<br>";
				}
			
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		// apagar dados de uma tabela
		public function apagar($sql, $id = 0){
			try{
				$STH = $this->DBH->prepare($sql);
				$STH->bindParam(1, $id);

				if(!$STH->execute()){
					echo "Ocorreu um erro ao apagar os dados!<br>";
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		// obter registos de uma tabela
		public function query($sql, $param = null){
			$dados =null;
		
			try{
				$STH = $this->DBH->prepare($sql);

				if(!$STH->execute($param)){
					echo "Ocorreu um erro ao processar a query! ";
				}else{
					$STH->setFetchMode(PDO::FETCH_ASSOC);
					while($row = $STH->fetch()){
						$dados[] = $row;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		// contar registos de uma tabela
		public function contar($tabela){
			try{
				$STH = $this->DBH->prepare("SELECT count(*) FROM " . $tabela);
				if($STH->execute()){
					return $STH->fetchColumn();
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return 0;
		}
		
		// debug
		public function contar_query($sql, $param = null){
			$dados = 0;
		
			try{
				$STH = $this->DBH->prepare($sql);

				if(!$STH->execute($param)){
					echo "Ocorreu um erro ao processar a query! ";
				}else{
					$STH->setFetchMode(PDO::FETCH_ASSOC);
					while($row = $STH->fetch()){
						$dados++;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}

        public function getDBH()
        {
            return $this->DBH;
        }


	}
?>