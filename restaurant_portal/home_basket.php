<div id = "basket_panel">

	<table id = "products">

		<?php
		$returned_products = return_products();
		
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
						<td colspan = 3 style = "height: 30px; border-top: 2px solid #DDDDDD">
							' . $item['product_name'] . '
						</td>
					</tr>
				
				';
				
				echo'
				
					<tr>
						<td colspan = "3" style = "height: 180px; border-top: 2px solid #DDDDDD; border-bottom: 2px solid #DDDDDD;">
							' . $item['product_description'] . '
						</td>
					</tr>
	
				';
				
				echo'
				
					<tr>
						<td>
							£' . $item['price'] . ' Per Item
						</td>
						<td>
							<form id = "basket_form" action = "add_to_basket.php" method = "post">
								<input name = "item" type = "hidden" value = "' . $item['product_id'] . '"><br>
								Quantity: <input name = "quantity" type = "textbox" style = "width: 30px;" value = "1">
						</td>
						<td>
								<button onClick = "add_to_basket()" class = "button">Add to Basket</button>
								</form>
						</td>
					</tr>
				
				';
			}
		?>
	</table>

</div>