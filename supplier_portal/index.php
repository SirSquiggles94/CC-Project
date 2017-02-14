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
	
				<form id = "login_form" method = "POST" action = "login.php">
				
					<label id = "email_address_label" for = "email_address">Email Address: </label><br>
					<input id = "email_address" name = "email_address" type = "text" class = "form_field"><br>
					
					<label id = "password_label" for = "password">Password: </label><br>
					<input id = "password" name = "password" type = "password" class = "form_field">
					
					<hr class = "fancy_hr">
					
					<h5><a href = "login_help.php">Having trouble signing in?</a></h5>
					
					<input id = "next" class = "choice_button" type = "submit" value = "Login">

				</form>
				
			</div>
	
		</content>
	</body>
</html>
