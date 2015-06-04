<?php
	// ajax-graficos.php - devolve os dados dos graficos de intervalo e hora
	
	include "sessaoAtiva.php";
	include "conf.php";
	include "acessobd.php";
	
	$bd = new BaseDados();
	
	// Graficos de intervalo de tempo
	if(isset($_GET["datas"]) && !empty($_GET["datas"])) {
		
		// Separar as datas
		$datas = explode("*", $_GET["datas"]);
		
		/*  Este trabalho foi para o lado do cliente :)
		
		// Formatar corretamente as datas
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
				echo "<sensor endereco=\"" . $dados_bd[$i]["CL_ENDERECO_SENSOR"] . "\"><temperatura>" . $dados_bd[$i]["CL_TEMPERATURA"] . "</temperatura><humidade>" . $dados_bd[$i]["CL_HUMIDADE"] . "</humidade><data>" . $dados_bd[$i]["CL_DATAHORA"] . "</data></sensor>";
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
	}
	
	
	// Graficos de intervalo de hora
	if(isset($_GET["dia"]) && !empty($_GET["dia"])) {
	
		// Separar os componentes da data (dia-mes-ano)
		$dia = explode("-", $_GET["dia"]);
		
		$dados = array(
			"DIA" => $dia[0],
			"MES" => $dia[1],
			"ANO" => $dia[2]
		);
		
		/*
		  exemplo de query - http://127.0.0.1/Projeto/admin/ajax-graficos.php?dia=05-06-2015
		  $dados_bd = $bd->query("SELECT * FROM clima WHERE CL_ENDERECO_SENSOR = :CL_ENDERECO_SENSOR AND CL_DATAHORA BETWEEN :DATA_INF AND :DATA_SUP", $dados);
		*/
		
		$dados_bd = $bd->query("SELECT CL_ID, CL_ENDERECO_SENSOR, DATE_FORMAT(CL_DATAHORA,'%H:%i:%s') HORAS, CL_TEMPERATURA, CL_HUMIDADE FROM clima WHERE DAY(CL_DATAHORA) = :DIA AND MONTH(CL_DATAHORA) = :MES AND YEAR(CL_DATAHORA) = :ANO", $dados);

		// Devolver XML com dados apenas se houver dados para mostrar
		if(count($dados_bd) > 0) {
			header('Content-Type: text/xml');
			echo "<?xml version=\"1.0\" standalone=\"yes\"?><valores>";
	
			// Dados de um sensor num determinado instante
			$num_dados = count($dados_bd);
			for($i=0; $i<$num_dados; $i++) {
				echo "<sensor endereco=\"" . $dados_bd[$i]["CL_ENDERECO_SENSOR"] . "\"><temperatura>" . $dados_bd[$i]["CL_TEMPERATURA"] . "</temperatura><humidade>" . $dados_bd[$i]["CL_HUMIDADE"] . "</humidade><hora>" . $dados_bd[$i]["HORAS"] . "</hora></sensor>";
			}
			
			// Obter a contagem dos dados por sensor
			$dados_bd = $bd->query("SELECT CL_ENDERECO_SENSOR, COUNT(*) as NUMERO FROM clima WHERE DAY(CL_DATAHORA) = :DIA AND MONTH(CL_DATAHORA) = :MES AND YEAR(CL_DATAHORA) = :ANO GROUP BY CL_ENDERECO_SENSOR", $dados);
			$num_dados = count($dados_bd);
			for($i=0; $i<$num_dados; $i++) {
				echo "<contagem endereco=\"" . $dados_bd[$i]["CL_ENDERECO_SENSOR"] . "\">" . $dados_bd[$i]["NUMERO"] . "</contagem>";
			}
			echo "</valores>";
		} else {
			echo 'Sem dados! <a href="graficos-teste.php">Voltar</a>';
		}
	}
?>