<?php 

namespace core\classes;
use PDO;


class Database{

	/*gestão de base de dados - CRUD*/

	private $ligacao;

//==========================================================

	private function ligar(){

		//ligar a base de dados
		// $this->ligacao = new PDO(
		// 	'mysql:host='.MSQL_SERVER.';dbname='.MSQL_DATABASE.';charset='.MSQL_CHARSET, MSQL_USER, MSQL_PASS, array(PDO::ATTR_PERSISTENT => true));

		// //debug

		// $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$servername = '108.167.132.245';  //localhost
		$dbname = "eagcon25_php_store";
		$username = "eagcon25_dev";
		$password = "jv091019";

		$this->ligacao = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		// set the PDO error mode to exception
		$this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
	}

//==========================================================

	private function desligar(){
		//desliga a base de dados
		$this->ligacao = null;
	}

//==========================================================

	public function select($sql, $parametros = null){

		//pesquisa de sql

		$this->ligar();


		$resultados = null;


		try {
			//comunicacao com o bd

			if (!empty($parametros)) {
				$executar = $this->ligacao->prepare($sql);
				$executar->execute($parametros);
				$resultados = $executar->fetchAll(PDO::FETCH_CLASS);
			}else{
				$executar = $this->ligacao->prepare($sql);
				$executar->execute();
				$resultados = $executar->fetchAll(PDO::FETCH_CLASS);
			}

		} catch (PDOException $e) {
			//erro
			return false;
		}

		$this->desligar();

		return $resultados;

	}



}

/*
define('MSQL_SERVER', 	'108.167.132.245');
define('MSQL_DATABASE', 'php_store');
define('MSQL_USER', 	'eagcon25_dev');
define('MSQL_PASS', 	'jv091019');
define('MSQL_CHARSET', 	'utf-8');

*/