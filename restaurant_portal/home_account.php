<ul id = "account_panel" class = "account_panel">
	<li id = "info_panel">
		Account Details:
		
		<br>
		<br>
		
		<div id = "labels">
		
			Restaurant Name:<br>
			Owner:<br>
			Telephone Number:<br>
			Email Address:<br>
			Physical Address:<br>
		
		</div>
		
		<div id = "details">
		
			<?php
				
				$get_user_info_query = "SELECT restaurant_name, owner_forename, owner_surname, restaurant_telephone, restaurant_email, restaurant_address_Ln1, restaurant_address_Ln2, restaurant_address_Ln3, restaurant_address_Ln4 FROM customers WHERE customer_id = '$user'";
				$get_user_info_query_result = mysqli_query($db_conn, $get_user_info_query);
				
				$user_info = mysqli_fetch_array($get_user_info_query_result);
				
				for($i = 0; $i < 9; $i++)
				{
					echo $user_info[$i] . "<br>";
				}
			
			?>
			
			<br> <br>
			<button class = "button" onClick = "change_details();">Change details</button>
		
		</div>
		
	</li>
	<li id = "password_update">
		
		Update your Password:
		
		<form action = "change_password.php" method = "POST"> 
			<br>
			
			<label>Old Password:</label><br>
			<input name = "old_password" type = "textbox"><br><br>
			
			<label>New Password:</label><br>
			<input name = "new_password" type = "textbox"><br><br>
			
			<label>Re-Type New Password:</label><br>
			<input name = "password_validation" type = "textbox"><br><br>
			
			<input class = "button" type = "submit" value = "Submit">
		
		</form>
	
		
	
	</li>
	
</ul>

<div id = "change_details_panel">

	<h2>Change Details</h2>

	<form action = "change_details_process.php" method = "POST">
		<div id = "col_1">
						
		
			<label id = "restaurant_name_label" for = "business_name">Restaurant Name</label><br>
			<input id = "restaurant_name" name = "restaurant_name" type = "text" class = "form_field"><br><br>
	
			<label id = "forename_label" for = "forename">Owner/Manager Forename</label><br>
			<input id = "forename" name = "forename" type = "text" class = "form_field"><br><br>
							
			<label id = "surname_label" for = "surname">Owner/Manager Surname</label><br>
			<input id = "surname" name = "surname" type = "text" class = "form_field"><br><br>
					
			<label id = "email_label" for = "email">Email Address</label><br>
			<input id = "email" name = "email_addr" type = "text" class = "form_field"><br><br>
							
			<label id = "tel_label" for = "tel_num">Telephone Number</label><br>
			<input id = "tel_num" name = "telNum" type = "text" class = "form_field"><br><br>
							
		</div>
							
		<div id = "col_2">
					
			<label id = "str_name" for = "street">Street Name</label><br>
			<input id = "street" name = "street" type = "text" class = "form_field"><br><br>
		
			<label id = "city_label" for = "city">Town/City</label><br>
			<input id = "city" name = "city" type = "text" class = "form_field"><br><br>
		
			<label id = "county_label" for = "county">County</label><br>
			<input id = "county" name = "county" type = "text" class = "form_field"><br><br>
							
			<label id = "post_label" for = "postcode">Postcode</label><br>
			<input id = "postcode" name = "postcode" type = "text" class = "form_field"><br><br>
					
			
		</div>
		
		<br>
	
		<div id = "submit_div">
	
			<input id = "change_details_button" class = "button" type = "submit" value = "Submit">
		</div>

	</form>
</div>

<script>

	function change_details()
	{
		document.getElementById("account_panel").style.display = "none";
		document.getElementById("change_details_panel").style.display = "block";
	}

	function check_pass_change()
	{
		<?php
		
			if(isset($_SESSION['change_state']))
			{
				echo 'var change_state = ' . $_SESSION['change_state'] . ';';
				unset($_SESSION['change_state']);
			}
			else
			{
				echo 'var change_state = null';
			}		
		?>
		
		if(change_state == 0)
		{
			window.alert("Password has been changed.");
		}
		else if(change_state == 1)
		{
			window.alert("New Passwords do not match.");
		}
		else if(change_state == 2)
		{
			window.alert("Old password is incorrect.");
		}
	}

	check_pass_change();




</script>