<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Green Room Surf Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="home">
	<div id="wrapper">		
		<div id="content">
			<?php 
				require "includes/header.inc.php";
				
			?>
			<!-- get images and paragraphs from DB to build home page -->
			<div id="col1">
				<?php
					getImage($dbc,1);
				?>
				<p class="content">
					<?php 
						getWords($dbc,5);
					?>			
				</p>
				<?php
					getImage($dbc,2);
				?>
				<p class="content">
					<?php 
						getWords($dbc,6)
					?>
				</p>
				
				<div class="clear"></div>
			</div> <!-- end of col1 -->
			<div id="col2">	
				<p class="content">
					<?php
						echo "<strong>";
						getWords($dbc,7);
						echo "</strong>";
						getWords($dbc,4);
					?>
				</p>
				<?php
					getImage($dbc,3);
				?>
				<hr />
				<div class="clear"></div>
				<?php 
					#process form, update mailing list table with new addition
					if($_SERVER['REQUEST_METHOD'] == 'POST') { # check for form posting
						if(!empty($_POST['name']) && !empty($_POST['email'])){ 
							#check for both fields being filled out and assign fields to variables
							$name = $_POST['name'];
							$email = $_POST['email'];
							#build query string
							$sql = "INSERT IGNORE INTO `mailing_list`(`name`,`email`) VALUES ('$name','$email')";
							$result = mysqli_query($dbc, $sql); # query Database
							if(mysqli_affected_rows($dbc) == 1) { # check for update and provide user feedback
								echo "<p class=\"formResult\">Thank you, you have been added to the mailing list!</p>\n";
							} else {
								echo "<p class=\"formError\">This email address already exists on the mailing list.</p>\n";
							}	// end if
						} else{
							echo "<p class=\"formError\">You did not enter valid informaton, please try again.</p>\n"; # at least one fiield was not filled out
						} // end if						
					} //end if
				?>

				<!-- build form for mailing list addition -->
				<form  id="mail" action="#" name="mailing_list" method="POST">
					<fieldset><legend>Mailing List</legend>
						<div><label for="name">Name: </label>
						<input type="text" name="name" id="name" /></div>
						<div><label for="email">Email: </label>
						<input type="email" name="email" id="email" /></div>
						<div class="buttonholder"><input class="btn" type="submit" value="Add to List"></div>
					</fieldset>				
				</form>
				<div class="clear"></div>
			</div> <!-- end of col2 -->

			<div class="clear"></div>
		</div> <!-- end of content -->
		<?php 
			require "includes/footer.inc.php"
		?>
	</div> <!-- end of wrapper -->


	
	
</body>
</html>