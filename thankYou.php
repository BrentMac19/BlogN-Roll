<?php
	include 'included.php';

if($_SESSION['userType']=="Band"){
			$user_id=$_SESSION['user_id'];
	$user=$userClass->bandData($user_id);
	$user_id=$user->bandID;

	if(isset($_POST['submit']) && !empty($_POST['news'])){
		$news = $_POST['news'];
		$news= $userClass->checkInput($news);
		$time= $userClass->getTime();
		$date= $userClass->getDate();
		$band=$user->BandName;
		$userClass->insertMessage($news,$time,$date,$band);
	
	}

		header("Location: bandUpdate.php");
}
	else if($_SESSION['userType']=="Admin"){
		$user_id=$_SESSION['user_id'];

		if(isset($_POST['submit']) && !empty($_POST['news'])){
			$news = $_POST['news'];
			$news= $userClass->checkInput($news);
			$time= $userClass->getTime();
			$date= $userClass->getDate();
			
				$name="Admin";
				$userClass->insertMessage($news,$time,$date,$name);
				header("Location: ticketApproval.php");
			
		}
	
			
		}
?>