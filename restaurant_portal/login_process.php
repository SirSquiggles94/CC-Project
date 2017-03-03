<?php

	include 'lib.php';
	
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	$db = config_db();
	
	if(isset($_POST))
	{
		$username = mysqli_real_escape_string($db, $_POST['email_address']);
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
		
		$salt_query = "SELECT salt FROM customers WHERE restaurant_email = '$username'";
		$salt_query_result = mysqli_query($db, $salt_query);
		echo $salt_query;
		
		if(mysqli_num_rows($salt_query_result) != 1)
		{
			echo 'Server Error, Please Try Again.';
			break;
		}
		
		$salt = mysqli_fetch_assoc($salt_query_result);
		$salt = strtolower($salt['salt']);
		$secure_password .= $salt;
		$combined_password_salt = hash_value($secure_password);
			
		$login_query = "SELECT customer_id FROM customers WHERE restaurant_email = '$username' AND password = '$combined_password_salt'";
		$login_query_result = mysqli_query($db, $login_query);
		
		echo $login_query;
		
		if(mysqli_num_rows($login_query_result) != 1)
		{
			$_SESSION['err_num'] = 1;
			header('Location: login.php');
		}
		else
		{
			$user_id = mysqli_fetch_assoc($login_query_result);
			$user = $user_id['customer_id'];
			$_SESSION['user_id'] = $user;
			
			if($remember_login == "on")
			{
				$date = date_create();
				$hash_date = hash_value(date_timestamp_get($date));
				$hash_user = hash_value($user);
				$hash_user .= $hash_date;
				$cookie_name = "set_log";
				$cookie_value =  hash_value($hash_user);
			
				$rem_log_query = "UPDATE customers SET rem_log = '$cookie_value' WHERE customer_id = '$user'";
				mysqli_query($db, $rem_log_query);
				
				echo $rem_log_query;
				
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
				
				$cookie_name = "set_usr";
				$cookie_value = $user;
				
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}
			else
			{
				$rem_log_query = "UPDATE customers SET rem_log = 'NULL' WHERE customer_id = '$user'";
				mysqli_query($db, $rem_log_query);
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