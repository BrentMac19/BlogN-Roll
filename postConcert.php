<?php

	if(isset($_POST['post']) && !empty($_POST['place'])&& !empty($_POST['date'])&& !empty($_POST['time'])){
		$place = $_POST['place'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$place= $userClass->checkInput($place);
		$date= $userClass->checkInput($date);
		$time=$userClass->checkInput($time);
		$timeRN=$userClass->getTime();
		$dateRN=$userClass->getDate();

		$newDate = date("m/d/Y", strtotime($date));

		if($dateRN>=$newDate){
			$error="Please enter valid date";
		}

		else{
			$band=$user->BandName;
			$userClass->concert($place,$newDate,$time,$band);
		}
	}
?>


	<form method="post">
		<h2>Post Concerts</h2>

			<div class="tweet-body">
				<input type="text" name="place" placeholder="place"><br>

				<input type="date" name="date"><br>
		
				<input type="time" name="time">
			</div>
			<div class="t-fo-right">
		
				<input type="submit" name="post" value="post">
			</div>
		<?php 
		  if(isset($error)){
		  	echo ' <li class="error-li">
	  				<div class="span-fp-error">'.$error.'</div>
				 	</li> ';
		  }
		?>

	</form>
</div>

