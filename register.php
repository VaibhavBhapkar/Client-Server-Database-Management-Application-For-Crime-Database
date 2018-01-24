<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');

if(isset($_SESSION['user_id'])) {
	header('Location: index.php');
}
?>

<?php

if(isset($_POST['submit'])) {
	$error = array();
	
	//Name
	if(empty($_POST['name'])) {
		$error[] = 'You must enter your name';
	}else {
		$name = $_POST['name'];
	}
	
	//Username
	if(empty($_POST['username'])) {
		$error[] = 'You must enter a username';
	}else if( ctype_alnum($_POST['username']) ) {
		$username = $_POST['username'];
	}else {
		$error[] = 'Username must consist of letters and alphabets only';
	}
	
	//Email
	if(empty($_POST['email'])) {
		$error[] = 'You must enter an email';
	}else {
		$email = $_POST['email'];
	}

	//Mobile No
	if(empty($_POST['mobileno'])) {
		$error[] = 'You must enter your mobile number';
	}else {
		$mobileno = $_POST['mobileno'];
	}
	
	//Service No
	if(empty($_POST['serviceno'])) {
		$error[] = 'You must enter your service number';
	}else {
		$serviceno = $_POST['serviceno'];
	}
	
	//Password
	if(empty($_POST['password'])) {
		$error[] = 'You must enter a password';
	}else{
		$password = md5($_POST['password']);
	}
	
	//Confirm Password
	if(empty($_POST['cpassword'])) {
		$error[] = 'Password mismatch';
	}else{
		$cpassword = md5($_POST['cpassword']);
		if($password != $cpassword) {
			$error[] = 'Password mismatch';
		}
	}

	if(empty($error)) {
		//OK
		$result = mysql_query( "SELECT * FROM users WHERE email='$email' OR username='$username'") or die(mysql_error());
		if(mysql_num_rows($result) == 0) {
			//OK
			$result2 = mysql_query( "INSERT INTO users (id,name,service_no,mobile_no,email,username,password) VALUES('','$name','$serviceno','$mobileno','$email','$username','$password')" ) or die(mysql_error());
			if(!$result2) {
				die('Could not register !! Sorry for inconvinence.');
			}else {
				header('Location: success_register.php');
			}
		}else {
			echo '<span class="error">
				This account is already registered with us. Please try again.	
				</span>
			';
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
		Register
	</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/register.css"/>
</head>
<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<aside id="left_side">	<img src="images/registerImage.jpg">	</aside>
		
		<section id="right_side">
			<form id="form" class="container" method="post" action="register.php">
			<h3>Register</h3>
			<?php echo $error_message; ?>
			<div class="field">
				<label for="name">Name:</label>
				<input type="text" class="input" id="name" name="name" maxlength="255"/>
			</div>
			<div class="field">
				<label for="username">Username:</label>
				<input type="text" class="input" id="username" name="username" maxlength="25"/>
				<p class="info">Maximum length of username 25 characters</p>
			</div>
			<div class="field">
				<label for="email">Email:</label>
				<input type="text" class="input" id="email" name="email" />
			</div>
			<div class="field">
				<label for="name">Mobile No:</label>
				<input type="text" class="input" id="mobileno" name="mobileno" maxlength="15"/>
			</div>
			<div class="field">
				<label for="name">Service No:</label>
				<input type="text" class="input" id="serviceno" name="serviceno" maxlength="12"/>
			</div>
			<div class="field">
				<label for="password">Password:</label>
				<input type="password" class="input" id="password" name="password" maxlength="25"/>
				<p class="info">Password is case-sensitive</p>
			</div>
			<div class="field">
				<label for="cpassword">Confirm Password:</label>
				<input type="password" class="input" id="cpassword" name="cpassword" maxlength="25"/>
				<p class="info">Password is case-sensitive</p>
			</div>
			<input type="submit" name="submit" id="submit" class="button" value="Submit" />
			</form>
		</section>
		
		<?php mainFooter(); ?>
	</div>
</body
</html>