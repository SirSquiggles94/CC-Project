<?php

	$login_state = check_login();
	
	if($login_state == true)
	{
		header('Location: home.php');
	}
	else
	{
		header('Location: login.php');
	}
	
	
	function check_login()
	{
		return true;
	}
?>
