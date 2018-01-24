<?php
include('includes/html_templates.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Successfully Registered
	</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/register.css"/>
	<style>
		img.newimage{
			display: block;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
		}
		h3{
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		<img class="newimage" src="images/success_register.jpg">
		<h3>You are Successfully Registered with us. Now you can Login</h3>
	</div>
<?php mainFooter(); ?>
</body>
</html>


