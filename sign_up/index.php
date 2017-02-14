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
				<form id = "signup_form" method = "POST" action = "signup_process.php">
				
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
					
					<div id = "part_2">
					
						<h6 id = "missing_info">Please enter missing information.</h6>
					
						<div id = "col_1">
						
							<div id = "restaurant">
								<label id = "restaurant_name_label" for = "business_name">Restaurant Name</label><br>
							</div >
							
							<div id = "supplier">
								<label id = "supplier_name_label" for = "business_name">Business Name</label><br>
							</div>
							<input id = "business_name" name = "business_name" type = "text" class = "form_field"><br>
					
							<label id = "forename_label" for = "forename">Owner/Manager Forename</label><br>
							<input id = "forename" name = "forename" type = "text" class = "form_field"><br>
							
							<label id = "surname_label" for = "surname">Owner/Manager Surname</label><br>
							<input id = "surname" name = "surname" type = "text" class = "form_field"><br>
					
							<label id = "email_label" for = "email">Email Address</label><br>
							<input id = "email" name = "email_addr" type = "text" class = "form_field"><br>
							
							<label id = "tel_label" for = "tel_num">Telephone Number</label><br>
							<input id = "tel_num" name = "telNum" type = "text" class = "form_field"><br>
							
						</div>
						
						<div id = "col_2">
					
							<label id = "str_name" for = "street">Street Name</label><br>
							<input id = "street" name = "street" type = "text" class = "form_field"><br>
							
							<label id = "city_label" for = "city">Town/City</label><br>
							<input id = "city" name = "city" type = "text" class = "form_field"><br>
							
							<label id = "county_label" for = "county">County</label><br>
							<input id = "county" name = "county" type = "text" class = "form_field"><br>
							
							<label id = "post_label" for = "postcode">Postcode</label><br>
							<input id = "postcode" name = "postcode" type = "text" class = "form_field"><br>
					
					
						</div>
						
						<input class = "choice_button" type = "button" id = "next" onClick = "part3();" value = "Next">
					</div>
					
					
					<div id = "part_3">
					
						Choose payment signal.<br><br>
					
						<label id = "pay_success_label" for = "pay_success">Successful Payment:</label>
						<input id = "pay_success" name =  "pay_success" type = "radio"><br><br>
						
						<label id = "pay_decline_label" for = "pay_decline">Payment Declined:</label>
						<input id = "pay_decline" name = "pay_decline" type = "radio"><br><br>
						
						<label id = "incorrect_label" for = "incorect">Invalid Details:</label>
						<input id = "incorrect" name = "incorrect" type = "radio"><br><br>
						
						<input class = "choice_button" id = "next" type = "submit" value = "Finish">
						
					</div>
					
					<script>
					
					
						function setChoice(val)
						{							
							document.getElementById('signup_choice').value = val;
							document.getElementById('part_1').style.display = "none";
							document.getElementById('part_2').style.display = "block";
							
							if(val == 1)
							{
								document.getElementById("restaurant").style.display = "block";
							}
							else if(val == 2)
							{
								document.getElementById("supplier").style.display = "block";
							}
							
							
						}
						
						function validate()
						{							
							var inputs = document.getElementsByTagName('input');
							var labels = document.getElementsByTagName('label');
							
							var err = 0;
							
							for(count = 0; count < inputs.length - 8; count++)
							{
								var input = inputs[count + 3].value;
								var label = labels[count + 1];
								if(input == "")
								{
									err++;
									label.style.color = "red";
								}
								else if(input != "")
								{
									label.style.color = "black";
									err - 1;
								}
								
							}
							
							input = inputs[3].value;
							
							
							if(input == "")
							{
								label = labels[0];
								label.style.color = "red";
								label = labels[1];
								label.style.color = "red";
							}
							else if(input != "")
							{
								label = labels[0];
								label.style.color = "black";
								label = labels[1];
								label.style.color = "black";
							}
							
							if(err != 0)
							{
								document.getElementById("missing_info").style.visibility = "visible";
							}
							else if(err == 0)
							{
								return true;
							}
						}
					
						function part3()
						{
							if(validate() == true)
							{							
								document.getElementById('part_2').style.display = "none";
								document.getElementById('part_3').style.display = "block";
							}
						}
					</script>
					
					
				
				</form>
			
			
			</div>
		
		</content>
	</body>
</html>