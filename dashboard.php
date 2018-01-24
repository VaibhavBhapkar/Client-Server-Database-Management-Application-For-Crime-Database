<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');

if(!isset($_SESSION['user_id'])) {
	header('Location: login.php');		
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Dashboard | PVGROUND</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/dashboard.css"/>
</head>

<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<div id="wrapper">
			<div id="boxes">
				<h3>Add Entry</h3><br><br><br><p><a href="add_entry.php">Click here to add entry in Database</a></p>
			</div>
			<div id="boxes">
				<h3>Search Record</h3><br><p>Enter name to Search for a record in Database</p>
				<br>&nbsp
				<input type="text" name="search_field" id="search_field"/>
				<div style="margin-left:35px">
					<input type="submit" name="submit" id="submit" value="Search" class="button" />
				</div>
			</div>
			<div id="boxes">
				<h3>Modify Information</h3><br><p><a href="modify_entry.php">Click here to modify an entry in Database</a></p>
			</div>
			<div id="boxes">
				<h3>Delete Entry</h3><br><br><br><p><a href="delete_entry.php">Click here to delete an entry from Database</a></p>
			</div>
		</div>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>