<?php
	// ajax-graficos.php - devolve os dados do grafico
	
	//include "sessaoAtiva.php";
	include "conf.php";
	include "acessobd.php";
	
	if(isset($_GET["datas"]) && !empty($_GET["datas"])) {
	
		$bd = new BaseDados();
		
		// verificar se existe algum utilizador com o username escolhido
		
		// Separar e formatar corretamente as datas
		$datas = explode("*", $_GET["datas"]);
		
		/*  Este trabalho foi para o lado do cliente :)
		
		$data_inf = new DateTime($datas[0]);
		$data_inf->format('Y-m-d H:i:s');
		$data_sup = new DateTime($datas[1]);
		$data_sup->format('Y-m-d H:i:s');
		*/
		
		$dados = array(
			// "CL_ENDERECO_SENSOR" => $_POST["esensor"],
			"DATA_INF" => $datas[0],
			"DATA_SUP" => $datas[1]
		);
		
		/*
		  exemplo de query - http://127.0.0.1/Projeto/admin/ajax-graficos.php?datas=2015-06-01%2000:00*2015-06-16%2012:00
		  $dados_bd = $bd->query("SELECT * FROM clima WHERE CL_ENDERECO_SENSOR = :CL_ENDERECO_SENSOR AND CL_DATAHORA BETWEEN :DATA_INF AND :DATA_SUP", $dados);
		*/
		
		$dados_bd = $bd->query("SELECT * FROM clima WHERE CL_DATAHORA BETWEEN :DATA_INF AND :DATA_SUP ORDER BY CL_ENDERECO_SENSOR ASC", $dados);

		// Devolver XML com dados apenas se houver dados para mostrar
		if(count($dados_bd) > 0) {
			header('Content-Type: text/xml');
			echo "<?xml version=\"1.0\" standalone=\"yes\"?><valores>";
			
			// Dados de um sensor num determinado instante
			$num_dados = count($dados_bd);
			for($i=0; $i<$num_dados; $i++) {
				echo "<sensor id=\"" . $dados_bd[$i]["CL_ID"] . "\"><temperatura>" . $dados_bd[$i]["CL_TEMPERATURA"] . "</temperatura><humidade>" . $dados_bd[$i]["CL_HUMIDADE"] . "</humidade><data>" . $dados_bd[$i]["CL_DATAHORA"] . "</data></sensor>";
			}
			
			// Obter a contagem dos dados por sensor
			$dados_bd = $bd->query("SELECT CL_ENDERECO_SENSOR, COUNT(*) as NUMERO FROM clima WHERE CL_DATAHORA BETWEEN :DATA_INF AND :DATA_SUP GROUP BY CL_ENDERECO_SENSOR", $dados);
			$num_dados = count($dados_bd);
			for($i=0; $i<$num_dados; $i++) {
				echo "<contagem endereco=\"" . $dados_bd[$i]["CL_ENDERECO_SENSOR"] . "\">" . $dados_bd[$i]["NUMERO"] . "</contagem>";
			}
			echo "</valores>";
			
		} else {
			echo 'Sem dados! <a href="graficos-teste.php">Voltar</a>';
		}
	} else {
		echo 'Datas não definidas! <a href="graficos-teste.php">Voltar</a>';
	}
?>