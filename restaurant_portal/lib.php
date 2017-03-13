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
	
	function get_category()
	{
		$db_conn = config_db();
		$category_query = "SELECT cat_id, cat_name FROM product_category";
		$category_query_result = mysqli_query($db_conn, $category_query);
		$selected_category = $_SESSION['category'];
		
		while($output = mysqli_fetch_assoc($category_query_result))
		{
			echo '<option ' . (($selected_category == $output['cat_id'])?'selected = "selected"' : "") . ' value = "' . $output['cat_id'] . '">' . $output['cat_name'] . '</option>';
		}
	}
	
	function get_supplier()
	{
		$db_conn = config_db();
		$supplier_query = "SELECT supplier_id, supplier_name FROM suppliers";
		$supplier_query_result = mysqli_query($db_conn, $supplier_query);
		$selected_supplier = $_SESSION['supplier'];
		
		while($output = mysqli_fetch_assoc($supplier_query_result))
		{
			echo '<option ' . (($selected_supplier == $output['supplier_id'])?'selected = "selected"' : "") . '  value = "' . $output['supplier_id'] . '">' . $output['supplier_name'] . '</option>';
		}
	}
	
	function return_products()
	{
		$user = check_login();
		$db = config_db();
		$get_products_query = "SELECT products.product_id, products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id";	
	
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $get_products_query);
	
		if(isset($_SESSION['category']) && isset($_SESSION['supplier']))
		{
			$category = $_SESSION['category'];
			$supplier = $_SESSION['supplier'];
			$get_products_query = "SELECT products.product_id, products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE product_category.cat_id = ? AND suppliers.supplier_id = ?";
		
			$stmt = mysqli_stmt_init($db);
			mysqli_stmt_prepare($stmt, $get_products_query);
			mysqli_stmt_bind_param($stmt, "ii", $category, $supplier);
		}
		else if(isset($_SESSION['category']))
		{
			$category = $_SESSION['category'];
			$get_products_query = "SELECT products.product_id, products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE product_category.cat_id = ?";
		
			$stmt = mysqli_stmt_init($db);
			mysqli_stmt_prepare($stmt, $get_products_query);
			mysqli_stmt_bind_param($stmt, "i", $category);
		}
		else if(isset($_SESSION['supplier']))
		{
			$supplier = $_SESSION['supplier'];
			$get_products_query = "SELECT products.product_id, products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE suppliers.supplier_id = ?";
		
			$stmt = mysqli_stmt_init($db);
			mysqli_stmt_prepare($stmt, $get_products_query);
			mysqli_stmt_bind_param($stmt, "i", $supplier);
		}
		
		
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
			
		return $result;
	}
	
	function get_basket_count($user)
	{
		$db = config_db();
		$count_query = "SELECT COUNT(*) FROM basket_items WHERE user_id = ?";
		
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $count_query);
		mysqli_stmt_bind_param($stmt, "i", $user);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
		
		while($item = mysqli_fetch_array($result))
		{
			return $item;
		}
	}
	
	function sanitize_input($dirty_input)
	{
		$bad_char = array("{", "}", "(", ")", "[", "]", "<", ">", "/", "\"", ";", ":");
		$clean_data = str_ireplace($bad_char, "", $dirty_input);
		
		return $clean_data;
	}
	






?>