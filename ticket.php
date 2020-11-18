<?php 

class Ticket{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}
	public function addConTickets($price,$place,$band,$time,$date,$conID,$quantity){
		$stmt=$this->pdo->prepare("INSERT INTO tickets (price, place, Band,ticketDate, ticketTime,conID) VALUES (:price, :place, :band, :ticDate, :ticTime,:conID)");
		$stmt->bindParam(":price",$price,PDO::PARAM_STR); 
		$stmt->bindParam(":place",$place,PDO::PARAM_STR); 
		$stmt->bindParam(":band",$band,PDO::PARAM_STR); 
		$stmt->bindParam(":ticDate",$date,PDO::PARAM_STR); 
		$stmt->bindParam(":ticTime",$time,PDO::PARAM_STR); 
		$stmt->bindParam(":conID",$conID,PDO::PARAM_INT); 

		for($i=0;$i<$quantity;$i++){
			$stmt->execute();
		}
		
	}
		public function getInfo($conID){
		$stmt=$this->pdo->prepare("SELECT Band, Place, conDate, conTime FROM concert WHERE concertID = :concertID ");
		$stmt->bindParam(":concertID",$conID,PDO::PARAM_INT);
		$stmt->execute();
		$conCall=$stmt->fetch(PDO::FETCH_OBJ);

		return $conCall;
	}
	public function getConcert(){
		$stmt=$this->pdo->prepare("SELECT * FROM concert WHERE approved= 'YES'");
		$stmt->execute();
		$concerts=$stmt->fetchAll(PDO::FETCH_OBJ);

		return $concerts;
	}
	public function placeOrder($name, $contact, $order){
		date_default_timezone_set('America/New_York');
		$timestamp = date("m/d/Y h:m:sa");
		$stmt=$this->pdo->prepare("INSERT INTO orders (time_placed, name, contact_number) value ('" . $timestamp . "':name, :contact')");
		$stmt->bindParam(":name",$name,PDO::PARAM_STR);
		$stmt->bindParam(":contact",$contact,PDO::PARAM_STR);
		$stmt->execute();

		$id=$this->pdo->lastInsertId();

		return $id;
	}
	public function getPrice($id){

		$stmt=$this->pdo->prepare("SELECT * FROM concert WHERE ConcertID = :id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$concert=$stmt->fetch(PDO::FETCH_OBJ);

		$price=$concert->price;
		return $price;
	}
	
}

?>
