<div id = "basket_panel">

	<table id = "products">

		<?php
			include 'get_basket.php';
		
			$returned_products = get_basket();
			
			if(mysqli_num_rows($returned_products) == 0)
			{
				echo "No Items in basket.";
			}
			else
			{
			
				while($item = mysqli_fetch_assoc($returned_products))
				{
					echo'
				
						<tr>
							<td rowspan = "4" style = "width: 250px; height: 250px;">
								<img style = "width: 250px;" src = "' . $item['image_path'] . '">			
							</td>
						</tr>
					
					';
				
					echo'
					
						<tr>
							<td colspan = 4 style = "height: 30px; border-top: 2px solid #DDDDDD">
								' . $item['product_name'] . '
							</td>
						</tr>
				
					';
				
					echo'
				
						<tr>
							<td colspan = "4" style = "height: 180px; border-top: 2px solid #DDDDDD; border-bottom: 2px solid #DDDDDD;">
								' . $item['product_description'] . '
							</td>
						</tr>
	
					';
				
					echo'
					
						<tr>
							<td>
								Total: £' . $item['price'] * $item['quantity'] . ' 
							</td>
							<td>
								<form id = "basket_form" action = "change_quantity.php" method = "post">
									<input id = "item_id" name = "item" type = "hidden" value = "' . $item['item_id'] . '"><br>
									Quantity: <input id = "quantity" name = "quantity" type = "textbox" style = "width: 30px;" value = "' . $item['quantity'] . '">
							</td>
							<td>
									<button onClick = "submit" class = "button">Update Quantity</button>
								</form>
							</td>
							<td>
								<form action = "remove_item.php" method = "post"><br>
									<input name = "rm_item" type = "hidden" value = "' . $item['item_id'] . '">
									<button onClick = "remove_item.php" class = "button">Remove Item</button>
								</form>
							</td>
						</tr>
					';
				}
				
				echo '
				
				
					<tr>
						<td>
							<button onClick = "" class = "button">Place Order</button>
						</td>
					</tr>
				
				
				
				';
			}
		?>
		
		
	</table>
	
	
</div>