<div id = "browse_panel">

	<form action = "get_products.php" method = "post">
		<ul class = "product_search">
			<li>
				Filter by Category: 
			</li>
			<li>
				<select name = "category" onChange = "this.form.submit()" class = "product_textbox" type = "dropdown"><option selected disabled hidden>Category</option><?php get_category(); ?></select>
			</li>
			<li>
				Filter by Supplier: 
			</li>
			<li>
				<select name = "supplier" onChange = "this.form.submit()" class = "product_textbox" type = "textbox"><option selected disabled hidden>Supplier</option><?php get_supplier(); ?></select>
			</li>
		</ul>
	</form>
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
	
	<script>
	
		function add_to_basket()
		{
			window.alert("Item added to basket.");
			
			document.getElementById('basket_form').form.submit();
			
		}
		
	</script>
	
	
	
	
</div>