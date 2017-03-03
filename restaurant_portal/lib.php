<?php

	function config_db()
	{
		$server_name = "localhost";
		$username = "root";
		$password = "";
		$db_name = "cc-project";
		
		$db_conn = mysqli_connect($server_name, $username, $password, $db_name);
		
		if(!$db_conn)
		{
			die("Database Error: " . mysqli_connect_error());
		}
		else
		{
			return $db_conn;
		}
	}
	
	function hash_value($hash_data)
	{
		$hashed_value = hash('sha512', $hash_data);
		return $hashed_value;
	}
	
	function check_login()
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		if(!isset($_SESSION['user_id']))
		{
			header('Location: login.php');
		}
		else
		{
			return $_SESSION['user_id'];
		}
	}
	
	






?>