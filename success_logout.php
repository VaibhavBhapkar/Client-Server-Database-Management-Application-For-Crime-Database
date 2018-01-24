<?php
include('includes/html_templates.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Successfully Logout
	</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/register.css"/>
	<style>
		img.newimage{
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
		}
		h3{
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		<img class="newimage" src="images/logoutImage.jpg">
		<h3>You have been successfully logout. See you soon</h3>
	<?php mainFooter(); ?>
	</div>
</body>
</html>


