<?php
include('includes/connect.php');
include('includes/html_templates.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Contact us
	</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/login.css"/>
</head>
<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		<aside id="left_side">
			<img src="images/logo.png">
		</aside>
		<section id="right_side">
			<form id="form" class="container" method="post" action="login.php">
			<h3>Contact Information</h3>
			<?php echo $error_message; ?>
			<div class="field">
				<label for="username">Contact no:</label>
				<input type="text" class="input" id="username" name="username" maxlength="25"/>
			</div>
			<div class="field">
				<label for="password">Email id:</label>
				<input type="password" class="input" id="password" name="password" maxlength="25"/>
			</div>
			<input type="submit" name="submit" id="submit" class="button" value="Submit" />
			</form>
		</section>
		<?php mainFooter(); ?>
	</div>
</body>
</html>