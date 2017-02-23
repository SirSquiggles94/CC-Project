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
							if(win_size > 720)
							{
								document.getElementById("nav_bar").style.display = "block";
								click_count = 1;
							}
							else if(win_size < 720)
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
					<a href = "home.php?p=1">	
						<div id = "account_nav">
							&nbsp; Your Account
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=2">	
						<div id = "orders_nav">
							&nbsp; Your Orders
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=3">	
						<div id = "stock_nav">
							&nbsp; Your Stock
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=4">	
						<div id = "basket_nav">
							&nbsp; Your Basket
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=5">	
						<div id = "plOrder_nav">
							&nbsp; Place an Order
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=6">	
						<div id = "browse_nav">
							&nbsp; Browse Products
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=7">	
						<div id = "favSupplier_nav">
							&nbsp; Favourite Suppliers
						</div>
					</a>
				</li>
				<li>
					<a href = "home.php?p=8">	
						<div id = "favProduct_nav">
							&nbsp; Favourite Products
						</div>
					</a>
				</li>
			</ul>
			
		</nav>
		<content id = "content">
			
			<ul class = "category_box">
				<li>
					<div id = "account">
						Your Account
						<img src = "Images/account_icon.png" class = "tile_icon">	
					</div>
				</li>
				<li >
					<div id = "orders">
						Your Orders
						<img src = "Images/orders_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "stock">
						Your Current Stock
						<img src = "Images/stock_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "basket">
						Your Basket
						<img src = "Images/basket_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "plOrder">
						Place an Order
						<img src = "Images/plcOrder_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "browse">
						Browse Products
						<img src = "Images/browse_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "favSupplier">
						Favourite Suppliers
						<img src = "Images/favSupplier_icon.png" class = "tile_icon">
					</div>
				</li>
				<li>
					<div id = "favProduct">
						Favourite Products
						<img src = "Images/favProduct_icon.png" class = "tile_icon">
					</div>
				</li>
			</ul>
			
		</content>
		
	</body>
</html>