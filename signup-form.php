<?php
	if(isset($_POST['signup'])){
		$screenName = $_POST['screenName'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$error 		= '';

		if(empty($screenName) or empty($password) or empty($email)){
			$error = 'All fields are required';	
		}else{
			$email 		= $userClass->checkInput($email);
			$screenName = $userClass->checkInput($screenName);
			$password 	= $userClass->checkInput($password);
			
			if(!filter_var($email)){
				$error = 'Invalid email format';
			}else if(strlen($screenName) > 20&&strlen($screenName)<6){
				$error = 'Name must be between 6-20 charachters';
			}else if(strlen($password) < 5){
				$error = 'Password is too short';
			}else{
				if($userClass->checkEmail($email) === true){
					$error = 'Email is already in use';
				}else{
					$userClass->register($email, $password, $screenName);
					

				}
			}	
		}
	}
?>
<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for BlogN'Roll"/>
		</li>
		<?php
		if(isset($error)){
			echo ' <li class="error-li">
	  			   <div class="span-fp-error">'.$error.'</div>
			       </li>';
		}
	?>
	
</ul>
</div>
</form>