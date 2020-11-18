<?php
	$dsn = 'mysql:host=localhost; dbname=rockbase';
	$user = 'root';
	$pass = '';

	try{
		$pdo = new PDO($dsn, $user, $pass);
	}catch(PDOException $e){
		echo 'Connection error! ' . $e->getMessage();
	}
?>