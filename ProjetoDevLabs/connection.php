<?php 

	
	$userDB = "root" ;
	$pwdDB = "";
	$hostDB = "localhost";
	$dbName = "devlabs2";



	try {
		//$con = new PDO('mysql: host=localhost;dbname=tarefa;','root','');

		$pdo = new PDO("mysql:host=$hostDB;dbname=$dbName;charset=utf8", $userDB, $pwdDB);
		


	} catch (PDOException $e) {
		
		echo "Erro ao conectar ao Banco";

	}

 ?>