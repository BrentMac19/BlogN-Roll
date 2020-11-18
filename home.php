<?php
	
	include 'included.php';
  	$id = $_SESSION['user_id'];
  	$id=$adminClass->convert_obj_to_arr($id);
  		//if($_SESSION['userType']=="Admin"){
		//	$user_id=$id;
		//}
		//else if($_SESSION['userType']=="Band"){ 
			//$user_id=$id['bandID'];
		//}
		//else if($_SESSION['userType']=="user"){ 
			//$user_id=$id;
		//}


  	

  	
   if($userClass->loggedIn() === false) {
    header('Location: '.BASE_URL.'index.php');
  	}
?>

<!DOCTYPE HTML>
 <html>
	<head>
		<title>BlogN'Roll</title>
		  <meta charset="UTF-8" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
   		  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   		   <link rel="stylesheet" href="starterPageDesign.css"/>
		 <link rel="stylesheet" href="BRdesign.css"/>
		 <style>
		 	.view-tweets{
				text-align: center;
				margin: 10px;
			}
			.view-tweets a{
				text-decoration: none;
				color: #4B0082 ;
			}
			.view-tweets a:hover{
				text-decoration:underline;
			}

			/*TWEET SHOW WRAPPER*/
			.all-tweet{
				border: 5px solid #d5d8d4;
				border-bottom: none;
				width: 55%;
			}
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
					border: 1px solid black;
				}
		 	all-tweet{
				border: 5px solid black;
				border-bottom: none;
				width: 55%;
			}



			.t-show-wrap{
				background:#FFD700;
				width: 100%;
				max-height: 550px;
				overflow: hidden;
				cursor: pointer;
			}
			.t-show-wrap:hover{
				background: #f6f6f6;
			}
			.t-show-wrap img{
				max-height: 420px;
				max-width: 469px;
				border-radius: 4px;
			}
			.t-show-inner{
				padding: 10px;
			}
			.t-show-head{
				width:100%;
			}
			.t-show-img{
				width:10%;
				float: left;
				overflow: hidden;
				margin-right: 4px;
			}
			.t-show-img img{
				width: 50px;
				height: 50px;
				border: 1px solid #e7e7e7;
				border-radius: 4px;
			}
			.t-s-head-content{
				width:90%;
			}
			.t-h-c-name a{
				font-size: 35px;
				color: #d5d8d4;
				font-weight: bold;
				text-decoration: none;
			}
			.t-h-c-name a:hover{
				text-decoration:underline;
			}
			.t-h-c-name span{
				font-weight: normal;
				color: #A2A2A2;
			}
			.t-h-c-dis{
				margin: 0px 0px;
				color: #d5d8d4;
				font-size: 14px;
			}
			.t-h-c-dis a{
				color:#d5d8d4;
				text-decoration:none;
				cursor:pointer;
				font-weight: bold;
			 }
			.t-h-c-dis a:hover{
				text-decoration: underline;
			}
			.t-show-body{
				max-height: 550px;
				overflow: hidden;
			}
			.t-s-b-inner-in{
			 	padding: 10px 0px;
			 	overflow: hidden;
			}
			.t-s-b-inner{
				width: 100%;
				overflow: hidden;
				float: right;
			}
			.t-show-banner-inner{
				width: 88%;
				font-size: 13px;
				color: #d5d8d4;
				padding: 5px 0px;
			}
			.t-show-banner-inner i{
				color: #d5d8d4;
				background: #17dd6d;
				padding: 2px;
				border-radius: 3px;
				margin-right: 5px;
			}

			.t-show-footer{
				width: 100%;
				float: left;
				overflow: hidden;
			}

			.t-s-f-right{
				width:90%;
				float: right;
				margin: 10px 0px;
			}
			.t-s-f-right ul li{
				float: left;
				margin-right: 60px;
			}
			.t-s-f-right ul li button .fa{
				text-decoration:none;
				color: #d5d8d4;
				font-size: 15px;
				cursor: pointer;
			}
			.t-s-f-right ul li a:{
				text-decoration:none;
				color: #999;
			}
			.t-s-f-right ul li button{
				background: none;
				border: none;
				cursor: pointer;
			}
			.t-s-f-right ul li button span{
				font-size: 12px;
				padding: 0px;
				position: relative;
				left: 6px;
				top: -1px;
				color: #d5d8d4;
				font-weight: bold;
			}
			p{
				text-align:center;
				background-color:#4B0082;
				color:white;
				font-weight:bold;
				font-size:26px;
				width:55%;
				height:55px;
				}

		 </style>
	</head>
	<!--Helvetica Neue-->
<body>
		<div class="wrapper">
			<div class="header">
				<a href="#default" class="logo">BlogN'Roll</a>
 				 <div class="header-right">
 				 	<?php if($_SESSION['userType']=="Admin"){ ?>
					<a class="active" href="adminPage.php">Update</a>
				<?php }
				else if($_SESSION['userType']=="Band"){ ?>
					<a class="active" href="bandUpdate.php">Post</a>
				<?php } ?>
    				<a href="ticketPage.php">Tickets</a>
   					 <a href="logout.php">Logout</a>
				
  				</div>
			</div>


		<div class="center">
			<div class="in-center-wrap">
				<br><br>
				<?php		  	
					$news=$userClass->getNews();
					if($_SESSION['userType']=="Admin"){
						$name=$adminClass->adminName($user_id);
					}
					else if($_SESSION['userType']=="Band"){ 
						$name=$userClass->getBandName($user_id);
					}
					else if($_SESSION['userType']=="user"){ 
						$name=$userClass->getUserName($user_id);
					}

					echo "<p> Welcome ".$name."<br> Band Updates and Upcoming Events<br></p>";
											
					foreach($news as $row){
						echo " <div class='view-tweets'><a>
				 	<div class='all-tweet'>
				 		<div class= 't-show-wrap'>
				 			<div class='t-show-head'>
				 				<div class='t-head-content'><a>".$row['band']."</a></div>
									<div class='t-show-body'>
										<div class='t-s-b-inner-in'>
											<div class='t-s-b-inner'>
												<div class ='t-show-banner-inner'>
													<a>".$row['message']."</a>
												</div>
											</div>
										</div> 
									</div> <br> 
									<div class ='t-show-footer'>
										<div class='t-s-right'>
											<ul>
												<li>
													<a>".$row['MesDate']." ".$row['MesTime']."</a>
												</li>
											<ul>
										</div>
									</div>
			 				    </div>
			 				</div>
			 			</div>
			 		</a></div> ";
 				}
 				?>
 			</div>
 				
		</div><!-- in center end -->
</div><!-- ends wrapper -->
</body>

</html>
