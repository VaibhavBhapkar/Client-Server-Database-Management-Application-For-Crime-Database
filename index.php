<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Home Page | PVGROUND</title>
	<link rel="stylesheet" href="css/main.css"/>
</head>

<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<?php
			echo 'Hello User';
		?>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>