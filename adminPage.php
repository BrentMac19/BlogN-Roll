<?php
	
	include 'included.php';
	$user_id=$_SESSION['user_id'];
	$user_id=$adminClass->convert_obj_to_arr($user_id);
	$adminName=$adminClass->adminName($user_id);
	$adminName=$adminClass->convert_obj_to_arr($adminName);

?>
<html>
	<head>
		<title>Admin</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="starterPageDesign.css"/>
		<link rel="stylesheet" href="BRdesign.css"/>
		<style>
			 .Center { 
  				width:700px; 
    			height:680px; 
   				position: fixed; 
   				background-color: #A9A9A9; 
    			top: 25%; 
    			left: 32%; 
    			margin-top: -100px; 
   				margin-left: -100px; 
   				 } 
   				 .container {
 					 border: 2px solid black;
  					background-color: white;
 					 border-radius: 10px;
  					padding: 50px;
  					margin: 10px 0;
					}
			.in-center{


				}
				.in-center-wrap{

				}
				.tweet-wrap{
					width: 95%;
					height: 160px;
					background: rgba(141, 255, 0, 0.07);
					border-radius: 4px;
					border: 1px solid #d5d8d4;
				}

				.tweet-inner{
					overflow: auto;
				}

				.tweet-h-left{
					width: 15%;
					float: left;
					margin-top: 18px;
				}
				.tweet-body{
					width: 95%;
					float: right;
					margin: 20px 0px;
				}
				.tweet-body textarea{
					overflow: hidden;
					resize: none;
					width: 95%;
					height: 200px;
					border: 5px solid #4B0082;
					border-radius: 5px;
					padding: 10px;
					font-size: 14px;
				}
				.tweet-body input[type="text"]{
					overflow: hidden;
					resize: none;
					width: 45%;
					height: 15px;
					border: 3px solid #4B0082;
					border-radius: 5px;
					padding: 10px;
					font-size: 14px;
				}
				.tweet-body input[type="date"]{
					overflow: hidden;
					resize: none;
					width: 45%;
					height: 15px;
					border: 3px solid #4B0082;
					border-radius: 5px;
					padding: 10px;
					font-size: 14px;
				}
				.tweet-body input[type="time"]{
					overflow: hidden;
					resize: none;
					width: 45%;
					height: 15px;
					border: 3px solid #4B0082;
					border-radius: 5px;
					padding: 10px;
					font-size: 14px;
				}

				.t-fo-right{
					width:25%;
					float: right;
					color: #727171;
				}
				.t-fo-right input[type="submit"]{
					padding: 5px 10px;
					font-weight: bold;
					color: #fff;
					background: #DAA520;
					border: 1px solid #aaa;
					border-radius: 4px;
					cursor:pointer;
				}
				h1{
					text-align: center;
					background-color:#FFD700; 
					border-radius: 250px;
 					color: white;
 					font-weight: bold;
 					font-size: 60px;
					}
				h2{
					text-align: center;
					background-color:#FFD700; 
					border-radius: 250px;
 					color: white;
 					font-weight: bold;
 					font-size: 60px;

				}
				p{
					text-align:left;
					background-color:#4B0082;
					color:white;
					font-weight:bold;
					font-size:26px;
					width:80%;
					height:55px;
				}
				.button {
				  border:3px solid #4B0082; 
				  color: black;
				  float: right;
				  padding: 15px 32px;
				  text-align: center;
				  text-decoration: none;
				  display: inline-block;
				  font-size: 16px;
				  cursor: pointer;
				}
				.button:hover{
					color:#A9A9A9;
					background-color:#FFD700;
				}
								
   			

		</style>
			
	</head>
	<body>
		<div class="front-img">
		<img src="homeBackground.jpg"></img>  
		</div>	
		<div class="wrapper">
			<div class="header">
				<a href="#default" class="logo">BlogN'Roll</a>
 				 <div class="header-right">
    				<a class="active" href="home.php">Home</a>
    				<a href="#contact">Tickets</a>
   					 <a href="logout.php">Logout</a>
  				</div>
			</div>
				<div class="Center">
					<br><br>
					<p>Welcome <?php echo " ".$adminName; ?> <br> Please choose one of the options</p>
				
					<br><br><br>
						<p>Approve Tickets<button id="myButton"class="button"  >Click</button></p>
						

						<script type="text/javascript">
   						 document.getElementById("myButton").onclick = function () {
       					 location.href = "http://localhost/BlogN'Roll/ticketApproval.php";
    					};
						</script>
						<br><br><br><br>

						<p>Send Message To Users<button id="Button" class="button" >Click</button></p>
						
						<script type="text/javascript">
   						 document.getElementById("Button").onclick = function () {
       					 location.href = "http://localhost/BlogN'Roll/message.php";
    					};
						</script>
						<br><br><br><br>

						<p>Check Purchases<button id="ticPurc" class="button" >Click</button></p>
						
						<script type="text/javascript">
   						 document.getElementById("ticPurc").onclick = function () {
       					 location.href = "http://localhost/BlogN'Roll/purchases.php";
    					};
						</script>
						


					
					
					
				
			</div>
		
			
	</body>

</html>