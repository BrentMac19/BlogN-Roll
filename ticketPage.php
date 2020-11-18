<?php 

	include "included.php";

	$userData=$sess->getData();
	$cart=$sess->getCart();

	$con=$ticketClass->getConcert();
	$con=$adminClass->convert_obj_to_arr($con);
	$concerts = array_merge($con);
	$grandTotal=0;

	foreach ($concerts as $val){


		foreach($cart as $row){
			$subTotal = $row["qty"] * $row['price'];
			
			$grandTotal += $subTotal;
		}
	}

	echo "<pre>";
	print_r($cart);
	echo "</pre>";

	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Ticket System</title>
	<script src="jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="main.css?<?=date("His")?>">
	
	<script>
		$(document).ready(function(){
			$(".add").click(function(){
				var id = $(this).attr("data-concert");
				if(!$("input[name='band-" + id + "']:checked").val()) alert("select Concert Please");
				else{
					var band = $("input[name='band-" + id + "']:checked").val();
					var qty = $("input[name='qty-" + id + "']").val();
					if(qty > 0){
						var data = "add" + "&id=" + encodeURIComponent(id) + "&band=" + encodeURIComponent(band) + "&qty=" + encodeURIComponent(qty);
						$.ajax({
							url: "request.php",
							type: "post",
							data: data,
							success: function(ret){
								alert(ret);
								location.reload();
							}
						});
					}
					else alert("enter quantity");
				}
			});
			

			$(".remove").click(function(){
				var id = $(this).attr("data-concert");
				var data = "remove&id=" + encodeURIComponent(id);
				$.ajax({
					url: "request.php",
					type: "post",
					data: data,
					success: function(ret){
						alert(ret);
						location.reload();
					}
				});
			});

			
		});
	</script>
</head>
<body>
	<header></header>
	<div class="intro">
		<div class="instructions">
			<h4></h4>
		
		</div>

		<div class="summary">
			<p class="total_purchase_order">TOTAL PURCHASE ORDER</p>
			<div class="total"><?=number_format($grandTotal, 2)?></div>
			<p class="note">All sales </p>
		</div>
	</div>

	<form>
		<table id="menu">
			<tr class="row_header">
				<td>Tickets</td>
				<td>
					<p>Select</p>
					
				</td>
				<td>QTY</td>
				<td>Sub Total</td>
				<td>Add</td>
				<td>Remove</td>
			</tr><?php
			foreach($concerts as $row){ 
				$onCart = isset($cart["p-" . $row["ConcertID"]]);
				$cart["p-".$row['ConcertID']]["price"]=[$row['price']];?>
				<tr>
					<td>
						<p><?=$row["Band"]?></p>
						<p><?=$row["Place"]?></p>
						<p><?=$row['conDate']?></p>
						<p><?=$row['conTime']?></p>
						<p>$<?=$row['price']?></p>
					</td>
					<td>
						<input title="<?=$row['BandID']?>" type="radio" value="$row['BandID']" name="band-<?=$row["ConcertID"]?>"<?=$onCart && $cart["p-" . $row["ConcertID"]]["BandID"] == $row['BandID']? " checked" : "";?>>
					
					
					</td>
					<td><input type="number" value="<?=$onCart ? $cart["p-" . $row["ConcertID"]]["qty"] : 0?>" name="qty-<?=$row["ConcertID"]?>"></td>
					<td>
						<!-- calculate subtotal: price of size * quantity -->
						<p><?=$onCart ? number_format($cart["p-" . $row["ConcertID"]]["qty"] * $row['price'], 2) : "0.00"?></p>
					</td>
					<td>
					<td><button type="button" class="add" data-concert="<?=$row["ConcertID"]?>"><?=$onCart ? "UPDATE" : "ADD"?></button></td>
					<td><button type="button" class="remove" data-concert="<?=$row["ConcertID"]?>">REMOVE</button></td>
				</tr>
			<?php }
			?><!-- vertical white space-->
			

			
			
		</table>
	</form>
	<a id="place-order" href="order.php">PLACE ORDER</a>
	
</body>
<footer>
</footer>
</html>

