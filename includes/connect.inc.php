<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "ctec127_final_project";

	$dbc = mysqli_connect($host, $username, $password, $db) OR die("<p>Could not connect to Database.</p>");
	mysqli_set_charset($dbc, 'utf8');
		
 ?>