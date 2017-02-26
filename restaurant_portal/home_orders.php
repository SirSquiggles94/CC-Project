<div id = "orders_panel">

	Your Orders:
	
	<table class = "order_items">
	
	<?php
	
		$db_conn = new mysqli("localhost", "root", "", "cc-project");
		$get_orders_query = "SELECT order_details.order_id, order_details.product_id, order_details.quantity, orders.date_placed, products.product_name, products.product_description, products.image_path, products.price FROM order_details INNER JOIN orders ON order_details.order_id = orders.order_id INNER JOIN products ON order_details.product_id = products.product_id WHERE customer_id = 1";
		$get_orders_result = mysqli_query($db_conn, $get_orders_query);
		
		if(!$db_conn)
		{
			die("Connection Failed: " .mysqli_connect_error());
		}
		else
		{
			if(mysqli_num_rows($get_orders_result) > 0)
			{
				while($row = mysqli_fetch_assoc($get_orders_result))
				{
					echo '
							<tr>
								<td>
									Order Number: #' . $row['order_id'] . '
						 ';
					
					echo '
							<tr>
								<td rowspan = "4" style = "width: 250px; padding: 0px;">
									<img style = "width: 250px;" src = "' . $row['image_path'] . '">
								</td>
							</tr>
					
						 ';
					
					echo '
					
							<tr>
								<td colspan = "3" style = "width: 530px; height: 30px;" >'
								. $row['product_name'] . '
								</td>
							</tr>
					
					
					
						 ';
						 
					echo '
					
							<tr>
								<td colspan = "3" style = "width: 540px; text-align: top;">'
									. $row['product_description'] . '
								</td>
							</tr>
					
						 ';
						 
					echo '
					
							<tr>
								<td style = "width: 135px; height: 30px;" >
									Quantitly Ordered: ' . $row['quantity'] . '
								</td>
								<td style = "width: 135px; height: 30px;">
									Product Price: £' . $row['price'] . '
								</td>
								<td style = "width: 135px; height: 30px; margin-bottom: 10px;">
									Total Product Price: £' . $row['price'] * $row['quantity'] . '
								</td>
								<td style = "width: 135px; height: 30px;" >
									Date Placed: ' . $row['date_placed'] . '
								</td>
							</tr>
							
						 ';
				}
			}
			else
			{
				echo "No Results";
			}
			
		}			
			
	
	?>
		
		
		






								


		
		
		
		
		
		
	</table>
	
	

</div>