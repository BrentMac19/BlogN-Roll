<?php 

class User{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}
	public function checkInput($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		return $data;
	}
	  public function register($email, $password, $screenName){
	    $passwordHash = md5($password);
	    $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password`, `screenName`) VALUES (:email, :password, :screenName)");
	    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
 	    $stmt->bindParam(":password", $passwordHash , PDO::PARAM_STR);
	    $stmt->bindParam(":screenName", $screenName, PDO::PARAM_STR);
	    $stmt->execute();

	    $user_id = $this->pdo->lastInsertId();
	    $_SESSION['user_id'] = $user_id;
	    header("Location: home.php");
	  }
	  	public function login($email, $password){
		$passwordHash = md5($password);
		$stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":password", $passwordHash, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		$user = $stmt->fetch(PDO::FETCH_OBJ);

		if($count > 0){
			$_SESSION['userType']="user";
			$_SESSION['user_id'] = $user->id;
			header('Location: home.php');
		}else{
			return false;
		}
	}
	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: ../index.php');
	}
		public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}
	public function checkPassword($password){
		$stmt = $this->pdo->prepare("SELECT `password` FROM `users` WHERE `password` = :password");
		$stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkEmail($email){
		$stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}	
	public function loggedIn(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}
	public function adminLogin($email,$password){
		$stmt=$this->pdo->prepare("SELECT * FROM `admin` WHERE `Email` = :email AND `Password` = :password");
		$stmt->bindParam(":email",$email, PDO::PARAM_STR);
		$stmt->bindParam(":password",$password,PDO::PARAM_STR);
		$stmt->execute();

		$count=$stmt->rowcount();
		$admin=$stmt->fetch(PDO::FETCH_OBJ);

		if($count>0){
			$_SESSION['user_id']=$admin->id;
			$_SESSION['userType']="Admin";
			header("Location: adminPage.php");	
		
		}
		else{
			return false;
		}

	}
	public function bandLogin($email,$password){
	$stmt=$this->pdo->prepare("SELECT `bandID` FROM `band` WHERE `BEmail` = :email AND `password` = :password");
		$stmt->bindParam(":email",$email, PDO::PARAM_STR);
		$stmt->bindParam(":password",$password,PDO::PARAM_STR);
		$stmt->execute();

		$count=$stmt->rowcount();
		$band=$stmt->fetch(PDO::FETCH_OBJ);

		if($count>0){
			$_SESSION['user_id']=$band;
			$_SESSION['userType']="Band";
			header("Location: bandUpdate.php");
			
		}
		else{
			return false;
		}

	}
	public function getTime(){
		date_default_timezone_set('America/New_York');
		$time=date('h:i:sa');
		
		return $time;

	}
	public function getDate(){
		$date=date('m/d/Y');
		
		return $date;

	}
	public function insertMessage($message,$time,$date,$band){
		$stmt=$this->pdo->prepare("INSERT INTO `news` (`message`, `MesTime`, `MesDate`,`band`) VALUES (:message, :MesTime, :MesDate,:band)");
		$stmt->bindParam(":message",$message,PDO::PARAM_STR);
		$stmt->bindParam(":MesTime",$time,PDO::PARAM_STR);
		$stmt->bindParam(":MesDate",$date,PDO::PARAM_STR);
		$stmt->bindParam(":band",$band,PDO::PARAM_STR);
		$stmt->execute();


	}

	public function bandData($user_id){
		$stmt = $this->pdo->prepare('SELECT * FROM `band` WHERE `bandID` = :user_id');
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function concert($place, $date, $time, $band){
		$stmt=$this->pdo->prepare('INSERT INTO `concert`(`band`,`place`,`conDate`,`conTime`,`approved`)VALUES (:band, :place, :conDate,:conTime,"NC")');
		$stmt->bindParam(":band",$band,PDO::PARAM_STR);
		$stmt->bindParam(":place",$place,PDO::PARAM_STR);
		$stmt->bindParam(":conDate",$date,PDO::PARAM_STR);
		$stmt->bindParam(":conTime",$time,PDO::PARAM_STR);
		$stmt->execute();


	}
	public function getNews(){
		$stmt=$this->pdo->prepare("SELECT message, MesTime, MesDate, band FROM news ORDER BY messageID DESC");
		$stmt->execute();
		$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}
	public function getUserName($id){
		$stmt=$this->pdo->prepare("SELECT * FROM users WHERE id = :id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$name=$stmt->fetch(PDO::FETCH_OBJ);

		return $name->screenName;

	}
	public function getBandName($id){
		$stmt=$this->pdo->prepare("SELECT * FROM band WHERE bandID = :id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$name=$stmt->fetch(PDO::FETCH_OBJ);

		return $name->BandName;

	}

}
?>
