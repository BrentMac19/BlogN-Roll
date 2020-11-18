<?php
include "included.php";
if(isset($_POST["add"])){
	if(isset($_POST["id"]) && $_POST["id"] != ""){
		if(isset($_POST["band"]) && $_POST["band"] != ""){
			if(isset($_POST["qty"]) && $_POST["qty"] != "" && $_POST["qty"] > 0){
	
				
					$itemData = [
						"id"		=> $_POST["id"],
						"isConcert"	=> 1,
						"band"		=> $_POST["band"],
						"qty"		=> $_POST["qty"]
					
						
					];
					$sess->addItem($itemData);
					exit("item added to cart");

			}
			else exit("invalid quantity");
		}
		else exit("invalid Band");
	}
	else exit("invalid id");
}

else if(isset($_POST["remove"])){
	if(isset($_POST["id"]) && $_POST["id"] != ""){
		
		$rem = $sess->removeItem("p-" . $_POST["id"]);
		exit($rem ? "item has been removed from cart" : "item not on cart");
	}
	else exit("invalid id");
}
else if(isset($_POST['place-order'])){
	if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['contact']) && $_POST['contact'] != ""){
	
		$or = $tickets->placeOrder($_POST['name'], $_POST['contact'], $sess->getCart());
		echo "success:+:".$or;
		//$sess->endSession();
	}
	else exit("failed:+:Please complete the required feild");
}
?>