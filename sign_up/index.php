<html>
	<head>	
		<?php
			include 'page_head.php';
		?>
	
	</head>
	
	<body>
		<header>
	
			
	
		</header>
		<content>
	
			<img id = "logo" src = "Images/logo.png">
			<h2>Sign Up</h2>
			
			<div class = "form_panel">
				<form>
				
					<input name = "signup_choice" id = "signup_choice" type = "hidden" value = "">
					
					
				
					<div id = "part_1">
					
						Are you a restauraunt or a supplier?
						
						<ul id = "signup_type">
							<li>
								<input class = "choice_button" type = "button" id = "rest" onClick = "setChoice(1);" value = "Restaurant">
							</li>
							<li>
								<input class = "choice_button" type = "button" id = "sup" onClick = "setChoice(2);" value = "Supplier">
							</li>
						</ul>
					
					</div>
					
					<div id = "part_2_restaraunt">
					
					<h6 id = "missing_info">Please enter missing information.</h6>
					
						<div id = "col_1">
					
							<label id = "restauraunt_name_label">Restaurant Name</label><br>
							<input id = "restauraunt_name" name = "restauraunt_name" type = "text" class = "form_field"><br>
							
							<label id = "ofnl">Owner Forename</label><br>
							<input id = "owner_forename" name = "owner_forename" type = "text" class = "form_field"><br>
							
							<label id = "osnl">Owner Surname</label><br>
							<input id = "owner_surname" name = "owner_surname" type = "text" class = "form_field"><br>
							
							<label id = "email_label">Email Address</label><br>
							<input id = "email" name = "email" type = "email" class = "form_field"><br>
							
							<label id = "tel_label">Telephone Number</label><br>
							<input id = "tel_num" name = "telNum" type = "text" class = "form_field"><br>
					
						</div>
					
						<div id = "col_2">
					
							<label id = "str_name">Street Name</label><br>
							<input id = "street" name = "street" type = "text" class = "form_field"><br>
							
							<label id = "city_label">Town/City</label><br>
							<input id = "city" name = "city" type = "text" class = "form_field"><br>
							
							<label id = "county_label">County</label><br>
							<input id = "county" name = "county" type = "text" class = "form_field"><br>
							
							<label id = "post_label">Postcode</label><br>
							<input id = "postcode" name = "postcode" type = "text" class = "form_field"><br>
					
					
						</div>
						
						<input class = "choice_button" type = "button" id = "next" onClick = "part3();" value = "Next">
				
					</div>
					
					<div id = "part_2_supplier">
					
					<h6 id = "missing_info">Please enter missing information.</h6>
					
						<div id = "col_1">
					
							<label>Supplier Name</label><br>
							<input name = "supplier_name" type = "text" class = "form_field"><br>
							
							<label>Manager Forename</label><br>
							<input name = "manager_forename" type = "text" class = "form_field"><br>
							
							<label>Manager Surname</label><br>
							<input name = "manager_surname" type = "text" class = "form_field"><br>
							
							<label>Email Address</label><br>
							<input name = "email" type = "email" class = "form_field"><br>
							
							<label>Telephone Number</label><br>
							<input name = "telNum" type = "text" class = "form_field"><br>
					
						</div>
					
						<div id = "col_2">
					
							<label>Unit Number</label><br>
							<input name = "unit_num" type = "text" class = "form_field"><br>
					
							<label>Street Name</label><br>
							<input name = "street" type = "text" class = "form_field"><br>
							
							<label>Town/City</label><br>
							<input name = "city" type = "text" class = "form_field"><br>
							
							<label>County</label><br>
							<input name = "county" type = "text" class = "form_field"><br>
							
							<label>Postcode</label><br>
							<input name = "postcode" type = "text" class = "form_field"><br>
					
					
						</div>
						
						<br>
						
						<input class = "choice_button" type = "button" id = "next" onClick = "part3();" value = "Next">
				
					</div>
					
					<div id = "part_3">
					
						Payment Screen
						
					</div>
					
					<script>
					
						function setChoice(val)
						{							
							document.getElementById('signup_choice').value = val;
							document.getElementById('part_1').style.display = "none";
							
							
							if(val == 1)
							{
								document.getElementById('part_2_restaraunt').style.display = "block";
							}
							else if(val == 2)
							{
								document.getElementById('part_2_supplier').style.display = "block";
							}
						}
						
						function validate()
						{
							val = document.getElementById('signup_choice').value;
							
							
							if(val == 1)
							{
								var name = document.getElementById('restauraunt_name').value;
								var O_Fname = document.getElementById('owner_forename').value;
								var O_Sname = document.getElementById('owner_surname').value;
								var email = document.getElementById('email').value;
								var tel = document.getElementById('tel_num').value;
								var AddrLn1 = document.getElementById('street').value;
								var AddrLn2 = document.getElementById('city').value;
								var AddrLn3 = document.getElementById('county').value;
								var AddrLn4 = document.getElementById('postcode').value;
								
								var valState = 0;
								
								function show_err()
								{
									if(valState <= 0)
									{
										document.getElementById('missing_info').style.visibility = "hidden";
									}
									else
									{
										document.getElementById('missing_info').style.visibility = "visible";
									}
								}
								
								if(name == "")
								{
									document.getElementById('restauraunt_name_label').style.color = "red";
									valState++;
									show_err();
								}
								else
								{
									document.getElementById('restauraunt_name_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(O_Fname == "")
								{
									document.getElementById('ofnl').style.color = "red";
									valState++;	
									show_err();																
								}
								else
								{
									document.getElementById('ofnl').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(O_Sname == "")
								{
									document.getElementById('osnl').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('osnl').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(email == "")
								{
									document.getElementById('email_label').style.color = "red";
									valState++;
									show_err();
								}
								else
								{
									document.getElementById('email_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(tel == "")
								{
									document.getElementById('tel_label').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('tel_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(AddrLn1 == "")
								{
									document.getElementById('str_name').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('str_name').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(AddrLn2 == "")
								{
									document.getElementById('city_label').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('city_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(AddrLn3 == "")
								{
									document.getElementById('county_label').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('county_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								if(AddrLn4 == "")
								{
									document.getElementById('post_label').style.color = "red";
									valState++;	
									show_err();
								}
								else
								{
									document.getElementById('post_label').style.color = "black";
									valState - 1;
									show_err();
								}
								
								alert(valState);
								
								if(valState == 0)
								{
									return true;
								}
							}
						}
					
						function part3()
						{
							if(validate() == true)
							{							
								document.getElementById('part_2_restaraunt').style.display = "none";
								document.getElementById('part_2_supplier').style.display = "none";
								document.getElementById('part_3').style.display = "block";
							}
						}
					</script>
					
					
				
				</form>
			
			
			</div>
		
		</content>
	</body>
</html>