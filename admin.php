<?php 

class Admin{
	
	protected $pdo;
	public $con_arr=array();

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	public function adminName($user_id){
		$stmt = $this->pdo->prepare('SELECT * FROM `admin` WHERE `id` = :id');
		$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$admin=$stmt->fetch(PDO::FETCH_OBJ);
		

		return $admin->Name;
		


	}
	public function concertCall(){
		$stmt= $this->pdo->prepare('SELECT * FROM concert WHERE approved ="NC"');
		$stmt->execute();
		$conCall=$stmt->fetchAll(PDO::FETCH_OBJ);
	
		return $conCall;

	}
	public function updateCon($conID){
		$stmt=$this->pdo->prepare("UPDATE concert SET approved = 'YES' WHERE concertID = :conID");
		$stmt->bindParam(":conID",$conID,PDO::PARAM_INT);
		$stmt->execute();
	}
	public function convert_obj_to_arr($data) {

	    if (is_object($data)) {
	        $data = get_object_vars($data);
	    }

	    if (is_array($data)) {
	        return array_map(array($this,'convert_obj_to_arr'), $data);
	    }
	    else {
	        return $data;
	    }
	}
	public function getConInfo($conID){
		$stmt=$this->pdo->prepare("SELECT * FROM concert WHERE concertID = :concertID ");
		$stmt->bindParam(":concertID",$conID,PDO::PARAM_INT);
		$stmt->execute();
		$conCall=$stmt->fetch(PDO::FETCH_OBJ);

		return $conCall;
	}


}
?>