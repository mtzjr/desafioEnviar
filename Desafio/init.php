<?php
// conexão com o banco de dados
session_start();

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','scilink');

global $pdo;

if(isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['cpf']) && !empty($_POST['cpf'])){
	try{
		$pdo = new PDO("mysql:dbname=".$BD_BANCO."; host=".$BD_SERVIDOR, $BD_USUARIO, $BD_SENHA);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Falha na conexão: Erro ".$e->getMessage();
		exit;
	}
}