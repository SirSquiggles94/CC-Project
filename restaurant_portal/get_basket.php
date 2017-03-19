<?php

	function get_basket()
	{		
		
	
		$db = config_db();
		$user = check_login();
		
		$get_basket_query = "SELECT basket_items.item_id, basket_items.product_id, basket_items.quantity, products.product_name, products.product_description, products.image_path, products.price FROM basket_items INNER JOIN products ON basket_items.product_id = products.product_id WHERE basket_items.user_id = ?";
	
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $get_basket_query);
		mysqli_stmt_bind_param($stmt, "i", $user);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
		
		return $result;
	}
	
	
	
	
	
?>