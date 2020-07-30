<?php 
	include("connection.php");
	
	$sql = $pdo->prepare("SELECT * FROM user");
	
	$sql->execute();
	$info = $sql->fetchAll();

 ?>