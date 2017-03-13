<?php

	include 'lib.php';
	
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	$db = config_db();
	
	if(isset($_POST))
	{
		$username = sanitize_input($_POST['email_address']);
		$password = $_POST['password'];
		$secure_password = hash_value($password);
		
		if(!isset($_POST['remember_pass']))
		{
			$remember_login = "off";
		}
		else
		{
			$remember_login = $_POST['remember_pass'];
		}
		
		$salt_query = "SELECT salt FROM customers WHERE restaurant_email = ?";
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $salt_query);
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $salt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
		
		if(count($salt) != 1)
		{
			$_SESSION['err_num'] = 1;
			header('Location: login.php');
		}
				
		$secure_password .= $salt;
		$combined_password_salt = hash_value($secure_password);
		
		$login = array($username, $combined_password_salt);
			
		$login_query = "SELECT customer_id FROM customers WHERE restaurant_email = ? AND password = ?";
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $login_query);
		mysqli_stmt_bind_param($stmt, "ss", $username, $combined_password_salt);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $user_id);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	
		if(count($user_id) != 1)
		{
			$_SESSION['err_num'] = 1;
			header('Location: login.php');
		}
		else
		{
			$_SESSION['user_id'] = $user_id;
			
			if($remember_login == "on")
			{
				$date = date_create();
				$hash_date = hash_value(date_timestamp_get($date));
				$hash_user = hash_value($user_id);
				$hash_user .= $hash_date;
				$cookie_name = "set_log";
				$cookie_value =  hash_value($hash_user);
			
				$rem_log_query = "UPDATE customers SET rem_log = ? WHERE customer_id = ?";
				
				$stmt = mysqli_stmt_init($db);
				mysqli_stmt_prepare($stmt, $rem_log_query);
				mysqli_stmt_bind_param($stmt, "si", $cookie_value, $user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
		
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
				
				$cookie_name = "set_usr";
				$cookie_value = $user_id;
				
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}
			else
			{
				$rem_log_query = "UPDATE customers SET rem_log = 'NULL' WHERE customer_id = ?";
				$stmt = mysqli_stmt_init($db);
				mysqli_stmt_prepare($stmt, $rem_log_query);
				mysqli_stmt_bind_param($stmt, "i", $user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
			}
			
			header('Location: home.php');
		}
	}
	else
	{
		echo 'Server Error, Please try again.';
		break;
	}
?>