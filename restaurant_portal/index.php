<?php
	
	if(isset($_COOKIE['set_log']) && isset($_COOKIE['set_usr']))
	{
		include 'lib.php';
		
		$db = config_db();
		
		$user = mysqli_real_escape_string($db, $_COOKIE['set_usr']);
		$secure_login = mysqli_real_escape_string($db, $_COOKIE['set_log']);
		
	
		
		$login_query = "SELECT customer_id FROM customers WHERE customer_id = '$user' AND rem_log = '$secure_login'";
		$login_query_result = mysqli_query($db, $login_query);
		if(mysqli_num_rows($login_query_result) != 1)
		{
			header('Location: login.php');
			
		}
		else
		{
			if(!isset($_SESSION))
			{
				session_start();
			}
			
			$_SESSION['user_id'] = $user;
			header('Location: home.php');
		}
	}
	else
	{
		header('Location: login.php');
	}
	
	
?>
