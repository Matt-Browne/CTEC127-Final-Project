<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Green Room Surf Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="orders">
	<div id="wrapper">		
		<div id="content">
			<?php 
				require "includes/header.inc.php";
				// process order form and assign values to variables
				if($_SERVER['REQUEST_METHOD'] == "POST") {
					$fname = $_POST['f_name'];
					$lname = $_POST['l_name'];
					$address1 = $_POST['address'];
					if(!empty($_POST['address2'])){
						$address2 = $_POST['address2'];
					} else {
						$address2 = "";
					}// end if
					$city = $_POST['city'];
					$state = $_POST['state'];
					$zip = $_POST['zip'];

					if(!empty($_POST['products'])){
						$order = implode(", ", $_POST['products']); 
					} else{
						$order = "";
					} // end if
					# build sql and query database to add order info from form to orders database 
					$sql = "INSERT INTO `orders` VALUES(null, '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$order')";
					$result = mysqli_query($dbc,$sql);

					$order_number = mysqli_insert_id($dbc);  // returns last entered value for auto incrementing primary key(order id)
					
					if(mysqli_affected_rows($dbc) == 1) {		# if order successfully added to database...

						# display values added to database on screen for user.			
						echo "<div id=\"ord_response\">\n<p>Thank you for your order <strong>$fname $lname!</strong></p>\n";
						echo "<p>Please save the information below for your records:</p>\n";
						echo "<p><strong>Order No. :</strong> $order_number<br></p>\n";
						echo "<p><strong>First Name:</strong> $fname<br></p>\n";
						echo "<p><strong>Last Name:</strong> $lname<br></p>\n";
						echo "<p><strong>Address:</strong> $address1<br></p>\n";
						echo "<p><strong>Address 2:</strong> $address2<br></p>\n";
						echo "<p><strong>City:</strong> $city<br></p>\n";
						echo "<p><strong>State:</strong> $state<br></p>\n";
						echo "<p><strong>Zip Code:</strong> $zip<br></p>\n";

						echo "<p><strong>Products Ordered:</strong><br>\n\n";
						# check for products being array and use loop to print to screen one at a time if array
						if(is_array($order)){
							foreach ($order as $key => $value) {
								echo $value . "<br>\n";
							} // end foreach
						} else {	# otherwise, print products
								echo "$order\n";
						} // end if
						echo "</p>";

						# build button to reload fresh order form
						?>
						<form action="orders.php" method="get">
							<input class="btn" type="submit" value="New Order">
						</form> <?php
						echo "<div class=\"clear\"></div>";
						echo "</div>";
					} else {
						echo "<p><strong>Your order was unsuccessful, please try again!</strong></p>";  
					}// end if

				} else {  #If not being posted, display order form
					?>
					<div id="default_title_image"><h6>Place an Order</h6></div>

					<form action="#" method="POST" enctype="multipart/form-data">
						<fieldset><legend id="formleg">Please fill out the order form below.<br>Fields marked with a * are required:</legend>
							<label for="f_name">First Name<em>*</em>:</label>
							<input type="text" name="f_name" id="f_name" placeholder="First Name" required autofocus>
							<label for="l_name">Last Name<em>*</em>:</label>
							<input type="text" name="l_name" id="l_name" placeholder="Last Name" required autofocus><br>
							<label for="address">Address 1<em>*</em>:</label>
							<input type="text" name="address" id="address" size="90" placeholder="Address" required autofocus><br>
							<label class="optional" for="address2">Address 2:</label>
							<input type="text" name="address2" id="address2" size="90" placeholder="Address 2" autofocus><br>
							<label class="zipalign" for="city">City<em>*</em>:</label>
							<input type="text" name="city" id="city" placeholder="City" required autofocus>
							<label for="state">State<em>*</em>:</label>
							<select name="state" id="state" required>
								<option value="">-- Select --</option>
								<option value="WA">Washington</option>
								<option value="OR">Oregon</option>
								<option value="ID">Idaho</option>
								<option value="CA">California</option>
								<option value="MT">Montana</option>
							</select>
							<label for="zip">Zip Code<em>*</em>:</label>
							<input type="text" name="zip" id="zip" placeholder="Zip Code" required autofocus>
							<fieldset> <legend>Select Products</legend>					
								<input type="checkbox" name="products[]" id="oneill" value="Oneill"><label for="oneill">O'neill  Mens Wetsuit</label><br>					
								<input type="checkbox" name="products[]" id="xcelm" value="Xcel M"><label for="xcelm">Xcel Mens Wetsuit</label><br>					
								<input type="checkbox" name="products[]" id="roxy" value="Roxy"><label for="roxy">Roxy Womens Wetsuit</label><br>					
								<input type="checkbox" name="products[]" id="xcelw" value="Xcel W"><label for="xcelw">Xcel Womens Wetsuit</label><br>				
								<input type="checkbox" name="products[]" id="libt" value="Lib Tech"><label for="libt">Lib Tech Ramp</label><br>					
								<input type="checkbox" name="products[]" id="linden" value="Gary Linden"><label for="linden">Gary Linden 8'6"</label><br>			
								<input type="checkbox" name="products[]" id="jldesign" value="JL Designs"><label for="jldesign">JL Designs 9'0" Soft Top</label><br>					
								<input type="checkbox" name="products[]" id="coldw" value="Cold Wax"><label for="coldw">Sticky Bumps Cold Temp Wax</label><br>					
								<input type="checkbox" name="products[]" id="tropw" value="Tropical Wax"><label for="tropw">Sticky Bumps Tropical Temp Wax</label><br>					
								<input type="checkbox" name="products[]" id="dayglo" value="DayGlo Wax"><label for="dayglo">Sticky Bumps DayGlo Cold Temp Wax</label><br>
							</fieldset>
							<div class="buttonholder">
							<input class="btn" type="submit" value="Place Order">
							</div>
						</fieldset>
					</form>
				<?php  
				}
				
			?>

			



		</div> <!-- end of content -->
		<?php 
			require "includes/footer.inc.php"
		?>
	</div> <!-- end of wrapper -->


	
	
</body>
</html>