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
	<title>Add Entry</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/dashboard.css"/>
	
	<script type="text/javascript" src="js/searchrecord.js" ></script>
</head>

<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<section id="right_side">
			<form id="form" class="container" method="get" action="search.php" />
					<h3>Search</h3>
					<div class="image_field">
						<label for="search_key">Enter name:</label>
						<input type="text" class="input" id="search_key" name="search_key"/>
						<input type="submit" name="submit" id="submit" value="Search" class="button" onclick="process()" />
					</div>
					<div id="search_result"></div> 
		
			</form>
		</section>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>
