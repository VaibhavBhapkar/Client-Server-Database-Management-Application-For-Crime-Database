<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');

if(!isset($_SESSION['user_id'])) {
	header('Location: login.php');		
}


$pid = $_GET['id'];
$result = mysql_query(" SELECT * FROM persons WHERE id='$pid' ");

$row = mysql_fetch_array($result);
$img_loc = $row['profile_pic'];
$name = $row['name'];
$nationality = $row['nationality'];
$gender = $row['gender'];
$age = $row['age'];
$address = $row['address'];
$state = $row['state'];
$education = $row['education'];
$contact = $row['contact'];
$occupation = $row['occupation'];
$income = $row['income'];
$bloodgroup = $row['bloodgroup'];
$disease = $row['disease'];
$crime = $row['crime'];
$caseid = $row['caseid'];

?>


<!DOCTYPE HTML>
<html>	
<head>
	<title>View Info</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/dashboard.css"/>
	
	<script type="text/javascript" src="js/searchrecord.js" ></script>
</head>

<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<section id="right_side">
			<div id="form" class="container" />
					<h3 style="text-align:left; font-weight:normal; color:#ccccb3;">Information</h3>
					<?php echo $error_message; ?>

					<div class="image_field">
						<label>Profile Image:</label>
						<?php echo "<img src=\"$img_loc\" height=\"70\" width=\"80\" />"; ?>
					</div>

					<div class="image_field" style="text-align:left">
						<h2>Personal Information</h2>
					</div>

					<div class="field">
						<label>Name:</label>
						<?php echo '<div id="data">'.$name.'</div>'; ?>
					</div>
					<div class="field">
						<label>Nationality:</label>
						<?php echo '<div id="data">'.$nationality.'</div>'; ?>
					</div>
					<div class="field">
						<label>Gender:</label>
						<?php echo '<div id="data">'.$gender.'</div>'; ?>
					</div>
					<div class="field">
						<label>Age:</label>
						<?php echo '<div id="data">'.$age.'</div>'; ?>
					</div>
					<div class="field">
						<label>Address:</label>
						<?php echo '<div id="data">'.$address.'</div>'; ?>
					</div>
					<div class="field">
						<label>State:</label>
						<?php echo '<div id="data">'.$state.'</div>'; ?>
					</div>
					<div class="field">
						<label>Education:</label>
						<?php echo '<div id="data">'.$education.'</div>'; ?>
					</div>
					<div class="field">
						<label>Contact No:</label>
						<?php echo '<div id="data">'.$contact.'</div>'; ?>
					</div>
					<div class="field">
						<label>Occupation:</label>
						<?php echo '<div id="data">'.$occupation.'</div>'; ?>
					</div>
					<div class="field">
						<label>Income:</label>
						<?php echo '<div id="data">'.$income.'</div>'; ?>
						<br><br>
					</div>					
					
					<div class="image_field" style="text-align:left">
						<h2>Health Information</h2>
					</div>
					<div class="field">
						<label>Blood Group:</label>
						<?php echo '<div id="data">'.$bloodgroup.'</div>'; ?>
					</div>
					<div class="field">
						<label>Disease:</label>
						<?php echo '<div id="data">'.$disease.'</div>'; ?>
						<br><br>
					</div>
					
					<div class="image_field" style="text-align:left">
						<h2>Crime Record</h2>
					</div>
					<div class="field">
						<label>Crime:</label>
						<?php echo '<div id="data">'.$crime.'</div>'; ?>
					</div>
					<div class="field">
						<label>Case ID:</label>
						<?php echo '<div id="data">'.$caseid.'</div>'; ?>
					</div>
			</div>
		</section>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>