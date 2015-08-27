<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Green Room Surf Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id="social">
	<div id="wrapper">		
		<div id="content">
			<?php 
				require "includes/header.inc.php";
			?>

			<div id="default_title_image"><h6>Surf Chat</h6></div>
			<?php 
				# query database to get social update entries
				$sql = "SELECT post_date, f_name, avatar, comment  FROM social ORDER BY post_date DESC";
				$query = mysqli_query($dbc,$sql);
				# loop through querey 1 row at a time, assign data to variables, display on page
				while($row = mysqli_fetch_array($query)) {
					$post_date =  $row['post_date'];
					$timestamp = strtotime($post_date);
					$date = date("m/d/y", $timestamp);
					$name = $row['f_name'];
					$avatar = $row['avatar'];
					$comment = $row['comment'];
					echo "<div class=\"item\">";
					echo "<div class=\"socDate\"><strong>$date</strong></div>";
					echo "<div class=\"avatar\"><img src=\"$avatar\" alt=\"avatar pic\" width=150 height=150 /><strong>$name</strong></div>";
					echo "<div class=\"comment\"><p>$comment</p></div>";
					echo "<div class=\"clear\"></div>";
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