<?php 
	
	function getImage($dbc, $row)	{
	// requires database connection and record id as $row of picture requested, displays selected image on page	
		$sql = "SELECT `image_link`, `img_data` FROM `home_page_content` WHERE id LIKE '$row'";
		$result = mysqli_query($dbc,$sql); 
		$imagelist = mysqli_fetch_array($result);
		
		echo "<img src=\"" . $imagelist['image_link'] . "\" " .$imagelist['img_data'] . ">\n";
	} // end function

	
	function getWords($dbc, $row)	{
	// requires database connection and record id as $row of paragraph requested, displays on page
		$sql = "SELECT `paragraph` FROM `home_page_content` WHERE id LIKE '$row'";
		$result = mysqli_query($dbc,$sql);
		$textlist = mysqli_fetch_array($result);
		echo $textlist['paragraph'] . "\n";
	} // end function

	function buildHeader($result, $page) {
		// requires query result and table name 
		echo "<table>\n";
		echo "<thead><tr>";
		// take one row of query as associateive array and use $key (column name) to build table header
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		# builder headers for edit and delete button columns
		echo "<th><p>Edit Record</p></th>\n";
		echo "<th><p>Delete Record</p></th>\n";
		# build headers for each table column, providing links to sort
		foreach ($row as $key => $value) {			
			echo "<th><p><a href=\"admin.php?page=$page&amp;amp;sort=$key&amp;amp;order=ASC\">$key</a></p> <a class= \"arrows\" href=\"admin.php?page=$page&amp;sort=$key&amp;order=ASC\"> &darr;</a> <a class= \"arrows\" href=\"admin.php?page=$page&amp;sort=$key&amp;order=DESC\"> &uarr;</a></th>\n";
		}
		echo "</tr></thead>";
	} // end function

	function renderData($result, $page) {
		# build table 1 row at a time with edit and delete buttons and table info($value) from each query row
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<tr>\n";
			echo "<td><a class=\"btn\" href=\"admin.php?page=$page&amp;action=edit&amp;id=" . $row['id'] . "\">Edit</a></td>\n";
			echo "<td><a class=\"btn\" href=\"admin.php?page=$page&amp;action=verify&amp;id=" . $row['id'] . "\">Delete</a></td>\n";
			foreach ($row as $key => $value) {
				echo "<td>$value</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n"; # close table
	}
?>

<?php 
	function create_record($dbc,$page) {
		//requires dabases connection($dbc) and table id($page)
	// queries database and provides form with an input text area for column, id column will be read only
		//submit button will call save_record function
		echo "<p>Create Record</p>\n";
		$sql = "SELECT * FROM $page";
		$result = mysqli_query($dbc,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo "<form method=\"post\" action=\"admin.php?page=$page&amp;action=save\">\n";
		foreach ($row as $key => $value) {
			if($key == 'id') {
				echo "<p class=\"createRec\"><label for=\"$key\">$key:</label>\n";
				echo "<textarea rows=4 cols=50 name=$key id=$key placeholder=\"Auto Asigned!\"readonly></textarea>\n";
			} else {
				echo "<p class=\"createRec\"><label for=\"$key\">$key:</label>\n";
				echo "<textarea rows=3 cols=50 name=$key id=$key></textarea>\n";
			}
		}
		echo "<p><input class=\"btn\" type=\"submit\" value=\"Save Record\"></p>\n";
		echo "</form>\n";
		
		
		
	} # end of create_record function
?>

<?php
	function save_record($dbc, $page){
	// requires dabases connection($dbc) and table id($page)
	// takes data from create table form and inserts into database tabke specified
	
		if($_SERVER['REQUEST_METHOD'] == "POST"){

			// build 2 arrays, one with column names, one with column values for row to be inserted
			$cols = [];
			$vals = [];
			foreach ($_POST as $key => $value) {
				if($key != 'id'){
					$cols[]=  $key;
					if(is_array($value)) {
						$value = implode(", ", $value);
						$vals[] = $value;
					} else {
						$vals[] = $value;
					}
				}
			}	// end foreach
			// implode() take each array and convert to comma seperated string for using in DB query, each value will be wrapped in (' ')
			$cols = implode(", ", $cols);
			$vals = implode("', '", $vals);
			
			# generate the SQL
		$sql = "INSERT INTO $page ($cols) VALUES ('$vals')";
		$result = mysqli_query($dbc,$sql); # insert into database
		if(mysqli_affected_rows($dbc) == 1) { # verify insert and provide user feedback
				echo "<p class=\"update_status\">Record has been added successfully!</p>";
			} else {
				echo "<p class=\"update_status\"><strong>WARNING: </strong>Record Insert Failed</p>";
			} // end if
		 		
		}  // end if
	} //end of function		

?>

<?php 
	function edit_record($dbc, $page, $recID) {
		// requires db connection($dbc), table name($page), and record id to be edited ($recID)
		# query database and retrieve selected record to edit
		# submit button will call update_record function
		$sql = "SELECT * FROM $page WHERE id LIKE '$recID'";
		$query = mysqli_query($dbc, $sql);
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		# build form with text area for each table column prepopulated with data currently saved in record
		# id column text area will be read only, $key is column name, $value=table cell value
		echo "<form method=\"post\" action=\"admin.php?page=$page&amp;action=update&amp;id=$recID\">\n";
		foreach ($row as $key => $value) {
			if($key == 'id') {
				echo "<p class=\"createRec\"><label for=\"$key\">$key:</label>\n";
				echo "<textarea rows=4 cols=50 name=$key id=$key readonly>$value</textarea>\n";
			} else {
				echo "<p class=\"createRec\"><label for=\"$key\">$key:</label>\n";
				echo "<textarea rows=3 cols=50 name=$key id=$key>$value</textarea>\n";
			} //end if
		}
		
		echo "<p><input class=\"btn\" type=\"submit\" value=\"Update Record\"></p>\n";
		echo "</form>\n";


	} // end of function

?>

<?php 
	function update_record($dbc, $page, $recID){
		// requires db connection($dbc), table name($page), and record id to be edited ($recID)
		// updates information submitted by edit_record function to specified row and table
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$query_build = []; # for building a query string using table data
			# check for column id and make read only, cconvert an arrays into comma seperated strings
			foreach ($_POST as $key => $value) {
				if($key != 'id'){
					if(is_array($value)) {
						$value = implode(", ", $value);
					} // end if	
					# add data pair to query string in format (`column name` = value) based on data submitted by edit_record form			
					$query_build[] =  "`$key` = \"" . htmlspecialchars($value) . "\"";
				} // end if
			}	// end foreach
			# convert query array to string
			$query_build = implode(", ", $query_build);
					
			# generate the SQL
			$sql = "UPDATE $page SET $query_build WHERE id LIKE $recID";
			$result = mysqli_query($dbc,$sql); #update database record
			if(mysqli_affected_rows($dbc) == 1) { # verify update success and provide user feedback
				echo "<p class=\"update_status\">Record with <strong>ID #$recID</strong> has been updated successfully!</p>";
			} else {
				echo "<p class=\"update_status\"><strong>WARNING: </strong>Update Failed</p>";
			} // end if
		} //end if
	} // end of function
?>

<?php 
	function verify_delete($dbc,$page,$recID){
	// requires db connection($dbc), table name($page), and record id to be edited ($recID)
	// makes user confirm delete before deleting record, calls delete_record function if confirmed, cancel reloads admin page to selected table
		echo "<form method=\"post\" action=\"admin.php?page=$page&amp;action=delete&amp;id=$recID\">\n";">";
		echo "<p>Are you sure you want to delete <strong>Record $recID</strong>?  This record will be permanently Deleted!</p>";
		echo "<a class=btn href=\"admin.php?page=$page\">Cancel Delete</a>";
		echo "<input class=\"btn\"type=\"submit\" value=\"Delete Record\">";
		echo "</form>";

	}	// end of function
?>

<?php

	function delete_record($dbc, $page, $recID) {		
		// requires db connection($dbc), table name($page), and record id to be edited ($recID)
		// deletes selected record from selected table 
		# generate sql string
		$sql = "DELETE FROM $page WHERE id = '$recID' LIMIT 1";
		mysqli_query($dbc, $sql);
		if(mysqli_affected_rows($dbc) == 1) {
			echo "<p class=\"update_status\">Record with ID of $recID has been deleted!</p>";
		} else {
			echo "<p class=\"update_status\"><strong>DELETE FAILED: </strong>Record with ID of $recID has not been deleted!</p>";
		} // end if
	} // end of function

?>