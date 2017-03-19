<?php

	include 'lib.php';
	
	$db = config_db();
	$item = sanitize_input($_POST['rm_item']);
	
	echo $item;
	
	$remove_item_query = "DELETE FROM basket_items WHERE item_id = ?";
	
	$stmt = mysqli_stmt_init($db);
	mysqli_stmt_prepare($stmt, $remove_item_query);
	mysqli_stmt_bind_param($stmt, "i", $item);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	header('Location: home.php?p=4');
	
?>
	