<?php
	
	include 'included.php';
	if($userClass->loggedIn() === true){
		header('Location: home.php');
	}

?>
<html>
	<head>	
		<title>BlogN'Roll</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="starterPageDesign.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="front-img">
	<img src="BlogN'RollBackground.jpg"></img>
</div>	

<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	
	<div class="nav-container">
		<!-- Nav -->
		<div class="nav">
			
			<div class="nav-left">
				<ul>
					<li><a href="http://localhost/BlogN'Roll/about.php">About</a></li>
				</ul>
			</div><!-- nav left ends-->

		</div><!-- nav ends -->

	</div><!-- nav container ends -->

</div><!-- header wrapper end -->
	
<!---Insid wrappper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- content left-->
		<div class="content-left">
			<h1>Welcome to BlogN'Roll.</h1>
			<br/>
			<p>A RockN'Roll blog where users can get personal updates from the bands they love!</p>
		</div><!-- content left ends -->	

		<!-- content right ends -->
		<div class="content-right">
			<!-- Log In Section -->
			<div class="login-wrapper">
			  <?php include 'login.php';?>
			</div><!-- log in wrapper end -->

			<!-- SignUp Section -->
			<div class="signup-wrapper">
			   <?php include 'signup-form.php';?>
			</div>
			<!-- SIGN UP wrapper end -->

		</div><!-- content right ends -->

	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>
</html>