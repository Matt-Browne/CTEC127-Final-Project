<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Green Room Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="admin">
	<?php
		# Database connection is ($dbc)
		require_once "includes/connect.inc.php";
		require_once "includes/functions.inc.php";
	?>
	<div id="main">
		<div id="admin_splash">
			<div id="admin_head"><p>Green Room<br>Admin</p></div>
			<div class="buttons">	
				<!-- links to declare which table to edit -->
				<ul>
					<li><a href="admin.php?page=home_page_content" class="btn">Edit Home</a></li>
					<li><a href="admin.php?page=mailing_list" class="btn">Edit Mailing</a></li>
					<li><a href="admin.php?page=products" class="btn">Edit Products</a></li>
					<li><a href="admin.php?page=orders" class="btn">Edit Orders</a></li>
					<li><a href="admin.php?page=news" class="btn">Edit News</a></li>
					<li><a href="admin.php?page=social" class="btn">Edit Social</a></li>
				</ul>
			</div>	
			<div class="clear"></div>
			<?php
				$showTable = 1;		# controls whether or not table is displayed based on action being performed
				# assign query parameters to variables (passed in by url) or assign default
				if(isset($_GET['sort'])){
					$sort = $_GET['sort'];
				} else {
					$sort = "id";
				}
				if(isset($_GET['order'])) {
					$order = $_GET['order'];
				} else{
					$order = "ASC";
				}
				if(isset($_GET['page']))	{
					$page = $_GET['page'];
						# call various functions to manipulate tables based on which button is clicked			
						if(isset($_GET['action'])) {
							$action = $_GET['action'];
							switch ($action) {
								case 'create':
									$showTable = 0;
									create_record($dbc, $page);
									break;
								case 'save':
									$showTable = 1;	
									save_record($dbc, $page);
									break;
								case 'edit':
									$showTable = 0;
									$recordID = $_GET['id'];
									edit_record($dbc, $page, $recordID);
									break;
								case 'update':
									$showTable = 1;
									$recordID = $_GET['id'];
									update_record($dbc, $page, $recordID);
									break;
								case 'verify':
									$showTable = 0;
									$recordID = $_GET['id'];
									verify_delete($dbc, $page, $recordID);
									break;								
								case 'delete':
									$showTable = 1;
									$recordID = $_GET['id'];
									delete_record($dbc, $page, $recordID);
									break;								
							} // end switch

						} // end if
						# provide query to build header and additional query to build table
						# The first row of the header query is lost durinh header build, requiring second query
						if($showTable == 1) {
							$sql = "SELECT * FROM $page ORDER BY {$sort} {$order}";
							$result1 = mysqli_query($dbc,$sql);
							$result2 = mysqli_query($dbc,$sql);
							# build button to create record
							echo "<p><a class=\"btn\" href=\"admin.php?page=$page&amp;action=create\">Create New Record</a></p>";
							# build selected($page) table
							buildHeader($result1, $page);
							renderData($result2, $page);
						} // end if
				} // end if
			?>
		</div>
	</div>
</body>
</html>