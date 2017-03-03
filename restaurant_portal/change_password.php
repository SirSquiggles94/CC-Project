<?php

	include 'lib.php';
	
	$db_conn = config_db();
	
	if(isset($_POST))
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		
		$user_id = check_login();
		
		$password = $_POST['old_password'];
		$secure_password = hash_value($password);
		
		$salt_query = "SELECT salt FROM customers WHERE customer_id = '$user_id'";
		$salt_query_result = mysqli_query($db_conn, $salt_query);
		
		if(mysqli_num_rows($salt_query_result) != 1)
		{
			echo 'Server Error, Please Try Again.';
			break;
		}
		
		$salt = mysqli_fetch_assoc($salt_query_result);
		$salt = strtolower($salt['salt']);
		$secure_password .= $salt;
		$combined_password_salt = hash_value($secure_password);
		
		$check_password_query = "SELECT password FROM customers WHERE customer_id = '$user_id'";
		$check_password_query_result = mysqli_query($db_conn, $check_password_query);
		
		if(mysqli_num_rows($check_password_query_result) != 1)
		{
			echo 'Server Error, Please Try Again.';
			break;
		}
		
		$fetched_password = mysqli_fetch_assoc($check_password_query_result);
		
		if($fetched_password['password'] == $combined_password_salt)
		{
			$new_pass = $_POST['new_password'];
			$val_pass = $_POST['password_validation'];
			
			if($new_pass == $val_pass)
			{
				$date = date_create();
				$timestamp = date_timestamp_get($date);
				$new_salt = hash_value($timestamp);
				$new_password = hash_value($new_pass);
				$new_password .= $new_salt;
				
				$final_password = hash_value($new_password);
				
				$update_salt_query = "UPDATE customers SET salt = '$new_salt' WHERE customer_id = '$user_id'";
				$update_password_query = "UPDATE customers SET password = '$final_password' WHERE customer_id = '$user_id'";
				
				mysqli_query($db_conn, $update_salt_query);
				mysqli_query($db_conn, $update_password_query);
				
				$_SESSION['change_state'] = 0; //Successful Password Change
				
				header('Location: home.php?p=1');

			}
			else
			{
				$_SESSION['change_state'] = 1; //New passwords do not match
				header('Location: home.php?p=1');
			}
		}
		else
		{
			$_SESSION['change_state'] = 2; //Incorrect current password enered
			header('Location: home.php?p=1');
		}
		
	}
	else
	{
		echo 'Server Error, Please Try Again.';
		break;
	}





?>