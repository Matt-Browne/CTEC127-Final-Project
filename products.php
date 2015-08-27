<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Green Room Surf Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="products">
	<div id="wrapper">		
		<div id="content">
			<?php 
				require "includes/header.inc.php";
				
			?>
			<div id="sidebar">
				<h4>Search by Product:</h4>
				<ul>
					<li><a href="products.php?action=wetsuits" class="button">Wetsuits</a></li>
					<li><a href="products.php?action=boards" class="button">Boards</a></li>
					<li><a href="products.php?action=wax" class="button">Wax</a></li>
					<li><a href="products.php" class="button">All</a></li>
				</ul>
			</div>
			<!-- # title image/text -->
			<div id="proimg"><h6>Our Merchandise</h6></div>
			<div class="clear"></div>
			<div class="row">
				<!-- # build mock table headers to display products -->
				<div id="img" class="tabhead"><p>Item</p></div>
				<div id="description" class="tabhead"><p>Description</p></div>
				<div id="price" class="tabhead"><p>Price</p></div>
				<?php 
					if($_SERVER['REQUEST_METHOD'] == "GET"){
						# build action parametr to control search by product feature
						if(isset($_GET['action'])){
							$action = $_GET['action'];
						} else {
							$action = "";
						} // end if
						# sort products by category type, if none selected, display all
						switch ($action) {
							case 'wetsuits':
								$sql = "SELECT * FROM products WHERE category LIKE 'wetsuits'"; 
								break;
							case 'boards':
								$sql = "SELECT * FROM products WHERE category LIKE 'boards'";
								break;
							case 'wax':
								$sql = "SELECT * FROM products WHERE category LIKE 'wax'";
								break;	
							
							default:
								$sql = "SELECT * FROM products";
								break;
						} // end switch
						# query database, using list() to assign variables from each row and display the info on the screen
						$result = mysqli_query($dbc, $sql);						
						while (list($id, $imgpath, $imgdat, $p_name, $desc, $price, $catg) = mysqli_fetch_array($result)) {

							echo "<div class=\"image\">\n";
							echo "<img src=\"$imgpath\" $imgdat><br />\n";
							echo "<strong>$p_name</strong></div>\n";

							echo "<div class=\"description\">\n";
							echo "<p>$desc</p></div>\n";

							echo "<div class=\"price\">\n";
							echo "<p><strong>\$$price</strong></p></div>\n";

						}	// end while					
					} // end if
				?>				
			</div> <!-- end row div -->	
			<div class="clear"></div>
		</div> <!-- end of ppcontent -->
		<?php 
			require "includes/footer.inc.php"
		?>
	</div> <!-- end of wrapper -->


	
	
</body>
</html>