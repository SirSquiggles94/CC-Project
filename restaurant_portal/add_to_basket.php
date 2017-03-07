<?php
	
	include 'lib.php';
	
	if(isset($_POST))
	{
		$db_conn = config_db();
		$user = check_login();
		$item = mysqli_real_escape_string($db_conn, $_POST['item']);
		$quantity = mysqli_real_escape_string($db_conn, $_POST['quantity']);
		
		echo $item . $quantity;
		
		$basket_query = "INSERT INTO basket_items (user_id, product_id, quantity) VALUES ('$user', '$item', '$quantity')";
		mysqli_query($db_conn, $basket_query);
		
		header('Location: home.php?p=6');
	}
	else
	{
		echo'Server Error, Please try again.';
		break;
	}











?>