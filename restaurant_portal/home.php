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

						function enable_nav()
						{
							var win_size = window.innerWidth;
							if(win_size > 775)
							{
								document.getElementById("nav_bar").style.visibility = "visible";
								click_count = 1;
							}
							else if(win_size < 775)
							{
								document.getElementById("nav_bar").style.visibility = "hidden";
								click_count = 0;
							}
						}
						
						function show_menu()
						{	
							if(click_count == 0)								
							{
								document.getElementById("nav_bar").style.visibility = "visible";
								click_count = 1;
							}
							else if(click_count == 1)
							{
								document.getElementById("nav_bar").style.visibility = "hidden";
								click_count = 0;
							}
						}
						
					</script>
					
				
				</li>
			
			
			
			
			
			</ul>
			
			
			
		
		</header>
		<nav id = "nav_bar">
		
		
			Nav Text
		
		</nav>
		<content>
			
			Content Text
			
		</content>
	</body>
</html>