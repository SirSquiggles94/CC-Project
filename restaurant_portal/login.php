<html>
	<head>
	
	<?php

		include 'page_head.php';
	?>
	
	
	</head>
	
	<body>
	
		<content>
	
			<img id = "logo" src = "Images/logo.png">
			<h2>Login</h2>
			
			<div class = "form_panel">
	
				<form id = "login_form" method = "POST" action = "login_process.php">
				
					<h3 id = "incorrect_details">Incorrect Details - Please Try Again.</h3><br><br>
				
					<label id = "email_address_label" for = "email_address">Email Address: </label><br>
					<input id = "email_address" name = "email_address" type = "text" class = "form_field"><br>
					
					<label id = "password_label" for = "password">Password: </label><br>
					<input id = "password" name = "password" type = "password" class = "form_field"><br>
					
					<label id = "remember_pass_label" for = "remember_pass">Remember Login? </label>
					<input id = "remember_pass" name = "remember_pass" type = "checkbox">
					
					<hr class = "fancy_hr">
					
					<h5><a href = "login_help.php">Having trouble signing in?</a></h5>
					
					<input id = "next" class = "choice_button" type = "submit" value = "Login">

				</form>
				
			</div>
			
			
			<script>
			
				var err = 0;
				
				<?php
					if(!isset($_SESSION))
					{
						session_start();
					}
					if(!isset($_SESSION['err_num']))
					{
						$err_num = 0;
					}
					else
					{
						$err_num = $_SESSION['err_num'];
					}
					
					if($err_num == 1)
					{
						echo 'err = 1;';
					}
					
					
					session_destroy();
				?>
			
				if(err == 1)
				{
					document.getElementById('email_address_label').style.color = "red";
					document.getElementById('password_label').style.color = "red";
					document.getElementById('incorrect_details').style.display = "inline";
				}
			
			
			</script>
	
		</content>
	</body>
</html>