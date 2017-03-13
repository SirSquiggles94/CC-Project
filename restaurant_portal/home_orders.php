<div id = "orders_panel">

	Your Orders:
	
	<table class = "order_items">
	
	<?php
	
		
		
		
		
		if(!$db_conn)
		{
			die("Connection Failed: " .mysqli_connect_error());
		}
		else
		{
			
			$get_distinct_orders = "SELECT order_id FROM orders WHERE customer_id = ?";
			$stmt = mysqli_stmt_init($db_conn);
			mysqli_stmt_prepare($stmt, $get_distinct_orders);
			mysqli_stmt_bind_param($stmt, "s", $user);
			mysqli_stmt_execute($stmt);
			$order_id = mysqli_stmt_get_result($stmt);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
			
			$order_count = mysqli_num_rows($order_id);
			
			if($order_count > 0)
			{
			
			
				for($c = 0; $c < $order_count; $c++)
				{
					while($order_num = mysqli_fetch_assoc($order_id))
					{
						$get_orders_query = "SELECT order_details.order_id, order_details.product_id, order_details.quantity, orders.date_placed, products.product_name, products.product_description, products.image_path, products.price, suppliers.supplier_id, suppliers.supplier_name FROM order_details INNER JOIN orders ON order_details.order_id = orders.order_id INNER JOIN products ON order_details.product_id = products.product_id INNER JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE order_details.order_id IN (".implode(',' , $order_num).")";
						$orders_result = mysqli_query($db_conn, $get_orders_query);
					
						echo '
							<tr>
								<td style = "margin-top: 10px;">
									
									Order Number: #' . $order_num['order_id'] . '
								</td>
							</tr>
							';
					
					
					
					
						while($item_num = mysqli_fetch_assoc($orders_result))
						{					
						
							echo '
								
								<tr style = "">
									<td rowspan = "5" style = "width: 250px; padding: 0px; border-bottom: 50px solid white;">
										<img style = "width: 250px;" src = "' . $item_num['image_path'] . '">
									</td>
								</tr>
					
								';
					
							echo '
					
								<tr>
									<td colspan = "4" style = "background-color: #DDDDDD; width: 530px; height: 30px;" >'
									. $item_num['product_name'] . '
									</td>
								</tr>
							
								';
						 
							echo '
						
								<tr>
									<td colspan = "4" style = "width: 540px; text-align: top;">'
										. $item_num['product_description'] . '
									</td>
								</tr>
								<tr>
									<td colspan = "4" style = "background-color: #DDDDDD; width: 540px; height: 30px;">
										Supplier: ' . $item_num['supplier_name'] . '
									</td>
								</tr>
							
								';
						 
							echo '
					
								<tr>
									<td style = "width: 100px; height: 30px; border-bottom: 50px solid white;" >
										Quantitly Ordered: ' . $item_num['quantity'] . '
									</td>
									<td style = "width: 175px; height: 30px; border-bottom: 50px solid white;">
										Product Price: £' . $item_num['price'] . '
									</td>
									<td style = "width: 175px; height: 30px; border-bottom: 50px solid white;">
										Total Product Price: £' . $item_num['price'] * $item_num['quantity'] . '
									</td>
									<td style = "width: 175px; height: 30px; border-bottom: 50px solid white;" >
										Date Placed: ' . $item_num['date_placed'] . '
									</td>
								</tr>
														
								';
						}
					}
				}
			}
			else
			{
				echo "You have not yet placed any orders.";
			}
		}			
			
	
	?>
		
		
		






								


		
		
		
		
		
		
	</table>
	
	

</div>