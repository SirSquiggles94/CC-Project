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
		
			<?php
			
				if(isset($_GET['p']))
				{
					$url = $_GET['p'];
				}
				else 
				{
					$url = null;
				}
				
				switch ($url)
				{
					case 1 :
						echo $url;
						break;
					case 2 :
						echo $url;
						break;
					case 3 :
						echo $url;
						break;
					case 4 :
						echo $url;
						break;	
					case 5 :
						echo $url;
						break;
					case 6 :
						echo $url;
						break;
					case 7 :
						echo $url;
						break;
					case 8 :
						echo $url;
						break;
					default:
						include 'home_default.php';
						break;
				}
			?>
			
			
			
		</content>
	</body>
</html>