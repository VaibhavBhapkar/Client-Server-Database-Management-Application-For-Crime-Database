<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');

if(isset($_SESSION['user_id'])) {
	header('Location: index.php');
}

if(isset($_POST['submit'])) {
	$error = array();
	
	//Username
	if(empty($_POST['username'])) {
		$error[] = 'You must enter a username';
	}else if( ctype_alnum($_POST['username']) ) {
		$username = $_POST['username'];
	}else {
		$error[] = 'Username must consist of letters and alphabets only';
	}
	
	//Password
	if(empty($_POST['password'])) {
		$error[] = 'You must enter a password';
	}else{
		$password = md5($_POST['password']);
	}

	if(empty($error)) {
		$result = mysql_query( "SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysql_error());
		if(mysql_num_rows($result) == 1) {
			//Proceed to Login
			while($row = mysql_fetch_array($result)) {
				$_SESSION['user_id'] = $row['id'];
				header('Location: index.php');
			}
		}else{
			$error_message = '<span class="error">Username or Password is incorrect. Please try again.</span><br><br>';
		}
	}else {
		$error_message = '<span class="error">';
		foreach($error as $val) {
			$error_message.= "$val<br><br>";
		}
		$error_message.="</span><br><br>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/login.css"/>
</head>
<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		<aside id="left_side">
			<img src="images/loginImage.jpg">
		</aside>
		<section id="right_side">
			<form id="form" class="container" method="post" action="login.php">
			<h3>Login</h3>
			<?php echo $error_message; ?>
			<div class="field">
				<label for="username">Username:</label>
				<input type="text" class="input" id="username" name="username" maxlength="25"/>
			</div>
			<div class="field">
				<label for="password">Password:</label>
				<input type="password" class="input" id="password" name="password" maxlength="25"/>
			</div>
			<input type="submit" name="submit" id="submit" class="button" value="Submit" />
			</form>
		</section>
		<?php mainFooter(); ?>
	</div>
</body>
</html>