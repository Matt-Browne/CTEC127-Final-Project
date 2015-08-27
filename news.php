<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Green Room Surf Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="news">
	<div id="wrapper">		
		<div id="content">
			<?php 
				require "includes/header.inc.php";
			?>
			<div id="default_title_image"><h6>News</h6></div>
			<?php 
				# query database to get news stories
				$sql = "SELECT post_date, title, content  FROM news ORDER BY id DESC";
				$query = mysqli_query($dbc,$sql);
				# loop through querey 1 row at a time, assign data to variables, display on page
				while($row = mysqli_fetch_array($query)) {
					$post_date =  $row['post_date'];
					$timestamp = strtotime($post_date);
					$date = date("F jS, Y", $timestamp);
					$title = $row['title'];
					$content = $row['content'];
					echo "<div class=\"item\">";
					echo "<div class=\"newsDate\"><p><strong>$title</strong></p><p>$date</p></div>";
					echo "<div class=\"newsContent\"><p>$content</p></div>";
					echo "</div>";
				}
			?>
			



		</div> <!-- end of content -->
		<?php 
			require "includes/footer.inc.php"
		?>
	</div> <!-- end of wrapper -->


	
	
</body>
</html>