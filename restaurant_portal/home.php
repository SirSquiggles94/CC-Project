<html>
	<head>
	
		<link rel = "stylesheet" href = "home_style.css" type = "text/css">
		<link rel = "icon" type = "image/x-icon" href = "Images/fav.ico">
		<title>The Chef's Pantry</title>
	
	
	</head>
	
	<body>
		
		<header>
			<ul class = "title_menu">
				
				<li>
				
					<img id = "logo" src = "Images/logo.png">
					
				</li>
				<li id = "small_menu" class = "small_menu">
				

					
					<br>
					<button id = "menu_button" onClick = "show_menu()">&#9776; Menu</button>
					
					<script>
			
						var click_count = 0;
		
						window.addEventListener("resize", enable_nav);
						document.getElementById("content").addEventListener("click", test);

						function enable_nav()
						{
							var win_size = window.innerWidth;
							if(win_size > 775)
							{
								document.getElementById("nav_bar").style.display = "block";
								click_count = 1;
							}
							else if(win_size < 775)
							{
								document.getElementById("nav_bar").style.display = "none";
								click_count = 0;
							}
						}
						
						function show_menu()
						{	
							if(click_count == 0)								
							{
								document.getElementById("nav_bar").style.display = "block";
								click_count = 1;
							}
							else if(click_count == 1)
							{
								document.getElementById("nav_bar").style.display = "none";
								click_count = 0;
							}
						}
						
						function test()
						{
							window.alert("Hide Menu");
						}
						
					</script>
					
				
				</li>
			
			
			
			
			
			</ul>
			
			
			
		
		</header>
		<nav id = "nav_bar">
		
			<ul class = "nav_list">
				<li>
					
					<a>Your Account</a>
					
					
				</li>
				<li>
					Your Orders
				</li>
				<li>
					Your Current Stock
				</li>
				<li>
					Your Basket
				</li>
				<li>
					Place an Order
				</li>
				<li>
					Browse Products
				</li>
				<li>
					Favourite Suppliers
				</li>
				<li>
					Favourite Products
				</li>
			</ul>
			
		
		</nav>
		<content id = "content">
			
			<ul class = "category_box">
				<li>
					
					Your Account
					<img src = "Images/account_icon.png" class = "tile_icon">
					
				</li>
				<li>
					Your Orders
					<img src = "Images/orders_icon.png" class = "tile_icon">
				</li>
				<li>
					Your Current Stock
					<img src = "Images/stock_icon.png" class = "tile_icon">
				</li>
				<li>
					Your Basket
					<img src = "Images/basket_icon.png" class = "tile_icon">
				</li>
				<li>
					Place an Order
					<img src = "Images/plcOrder_icon.png" class = "tile_icon">
				</li>
				<li>
					Browse Products
					<img src = "Images/browse_icon.png" class = "tile_icon">
				</li>
				<li>
					Favourite Suppliers
					<img src = "Images/favSupplier_icon.png" class = "tile_icon">
				</li>
				<li>
					Favourite Products
					<img src = "Images/favProduct_icon.png" class = "tile_icon">
				</li>
			</ul>
			
		</content>
		
	</body>
</html>