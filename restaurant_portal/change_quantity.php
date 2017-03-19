<?php	

	include 'lib.php';
	
	$update_item_query = "UPDATE basket_items SET quantity = ? WHERE item_id = ?";
	
	$item_id = sanitize_input($_POST['item']);
	$quantity = sanitize_input($_POST['quantity']);
		
	echo $item_id;
	echo $quantity;
		
	$db = config_db();
		
	$stmt = mysqli_stmt_init($db);
	mysqli_stmt_prepare($stmt, $update_item_query);
	mysqli_stmt_bind_param($stmt, "ii", $quantity, $item_id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	header ('Location: home.php?p=4');
		
?>