<?php	
	
	include 'lib.php';
	
	$db_conn = config_db();
	$user = check_login();
	
	if(isset($_POST['category']) && isset($_POST['supplier']))
	{
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$get_products_query = "SELECT products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE product_category.cat_id = '$category' AND suppliers.supplier_id = '$supplier'";

		
	}
	else if(isset($_POST['category']))
	{
		$category = $_POST['category'];
		$get_products_query = "SELECT products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE product_category.cat_id = '$category'";
	}
	else if(isset($_POST['supplier']))
	{
		$supplier = $_POST['supplier'];
		$get_products_query = "SELECT products.product_name, products.product_description, products.image_path, products.price, product_category.cat_name, suppliers.supplier_name FROM products INNER JOIN product_category ON products.cat_id = product_category.cat_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE suppliers.supplier_id = '$supplier'";
	}
	
	$get_products_query_result = mysqli_query($db_conn, $get_products_query);
	
	if(!isset($_SESSION))
	{
		session_start();
	}
			
	$_SESSION['product_result'] = $get_products_query_result;
	$_SESSION['supplier'] = $supplier;
	$_SESSION['category'] = $category;
	
	header('Location: home.php?p=6');
?>