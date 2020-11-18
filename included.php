<?php
	include 'database/connection.php';
	include 'classes/users.php'; 
	include 'classes/admin.php';
	include 'classes/ticket.php';
	include "classes/session.php";
	

	global $pdo;

	session_start();

	$userClass = new User ($pdo);
	$adminClass = new Admin ($pdo);
	$ticketClass = new Ticket($pdo);
	$sess= new Session();


	define("BASE_URL","http://localhost/BlogN'Roll/");
?>