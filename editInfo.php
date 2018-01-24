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

<?php

if(isset($_POST['submit'])) {
	$error = array();
	
	//Name
	if(empty($_POST['name'])) {
		$error[] = 'You must enter your name';
	}else {
		$name = $_POST['name'];
	}
	
	//Nationality
	if(empty($_POST['nationality'])) {
		$error[] = 'You must enter nationality';
	}else {
		$nationality = $_POST['nationality'];
	}
	
	//Gender
	if(empty($_POST['gender'])) {
		$error[] = 'You must enter gender of person';
	}else {
		$gender = $_POST['gender'];
	}

	//Age
	if(empty($_POST['age'])) {
		$error[] = 'Age not entered';
	}else {
		$age = $_POST['age'];
	}
	
	//Address
	if(empty($_POST['address'])) {
		$error[] = 'You must enter Address of person';
	}else {
		$address = $_POST['address'];
	}
	
	//State
	if(empty($_POST['state'])) {
		$error[] = 'You must enter state';
	}else{
		$state = $_POST['state'];
	}
	
	//Education
	if(empty($_POST['education'])) {
		$error[] = 'Please enter Educational Qualification';
	}else{
		$education = $_POST['education'];
	}
	
	//Contact No
	if(empty($_POST['contact'])) {
		$error[] = 'Please enter contact number';
	}else{
		$contact = $_POST['contact'];
	}
	
	//Occupation
	if(empty($_POST['occupation'])) {
		$error[] = 'Please enter Occupation';
	}else{
		$occupation = $_POST['occupation'];
	}
	
	//Income
	if(empty($_POST['income'])) {
		$income = '';
	}else{
		$income = $_POST['income'];
	}
	//Blood Group
	if(empty($_POST['bloodg'])) {
		$error[] = 'Please select blood group';
	}else{
		$bloodgroup = $_POST['bloodg'];
	}
	
	//Disease
	if(empty($_POST['disease'])) {
		$error[] = 'Please select disease or NA';
	}else{
		$disease = $_POST['disease'];
	}
	
	//Crime
	if(empty($_POST['crime'])) {
		$error[] = 'Please select crime or NA';
	}else{
		$crime = $_POST['crime'];
	}
	
	//Case ID
	if(empty($_POST['caseid'])) {
		$caseid = '';
	}else{
		$caseid = $_POST['caseid'];
	}
	
	//Storing Image on server
	$pname = $_FILES['userpic']['name'];
	$tmploc = $_FILES['userpic']['tmp_name'];
	if(!preg_match("/\.(gif|jpg|png)$/i",$pname))
	{
		$error[] = 'Upload file must be an image.';
	}
	$size = $_FILES['userpic']['size'];
	if($size > 5242880)
	{
		$error[] = 'Uploded files size is greater than 5MB. Try again';
	}
	$ext = pathinfo($pname, PATHINFO_EXTENSION);
	$randname = uniqid(rand(), true).'.'.$ext;
	
	$uplad_suc = move_uploaded_file($tmploc,"uploads/$randname");
	$profile_pic = "uploads/$randname";
	if($uplad_suc == false)
	{
		$error[] = 'Unable to Upload image. Try after sometime';
	}

	if(empty($error)) {
		//OK
		$result = mysql_query(" SELECT * FROM persons WHERE id='$pid' ") or die(mysql_error());

		if(mysql_num_rows($result) == 1) {
			//OK
			$result2 = mysql_query( "INSERT INTO persons (id,name,nationality,gender,age,address,state,education,contact,occupation,income,bloodgroup,disease,crime,caseid,profile_pic) VALUES('','$name','$nationality','$gender','$age','$address','$state','$education','$contact','$occupation','$income','$bloodgroup','$disease','$crime','$caseid','$profile_pic')" ) or die(mysql_error());
			if(!$result2) {
				die('Could not modify information !! Sorry for inconvinence.');
			}else {
				header('Location: add_entry.php');
			}
		}else {
			echo '<span class="error">
				Following person information is not present in Database. Please try again.	
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

<!DOCTYPE HTML>
<html>
<head>
	<title>Add Entry</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/forms.css"/>
	<link rel="stylesheet" href="css/dashboard.css"/>
</head>

<body>
	<div id="big_wrapper">
		<?php searchBarCode(); ?>
		
		<section id="right_side">
			<form id="form" class="container" method="post" action="add_entry.php" enctype="multipart/form-data">
					<h3 style="text-align:left; font-weight:normal; color:#ccccb3;">Edit Information</h3>
					<?php echo $error_message; ?>

					<div class="image_field">
						<label for="userpic">Profile Image:</label>
						<?php 
							echo '<div>';
							echo "<img src=\"$img_loc\" height=\"70\" width=\"80\" />"; 
							echo '</div>';
						?>
						<span style="margin-left:4px"> <input type="file" id="userpic" name="userpic" /> </span>
					</div>

					<div class="image_field" style="text-align:left">
						<h2>Personal Information</h2>
					</div>
					<div class="field">
						<label for="name">Name:</label>
						<?php echo '<input type="text" class="input" id="name" name="name" maxlength="50" />' ;
					</div>
					<div class="field">
						<label for="nationality">Nationality:</label>
						<input type="text" class="input" id="nationality" name="nationality" maxlength="25"/>
					</div>
					<div class="field">
						<label for="gender">Gender:</label>
						<select class="input" id="gender" name="gender" style="width:262px">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Others">Others</option>
						</select>
					</div>
					<div class="field">
						<label for="age">Age:</label>
						<input type="text" class="input" id="age" name="age" maxlength="5"/><br><br>
					</div>
					<div class="field">
						<label for="address">Address:</label>
						<input type="text" class="input" id="address" name="address" maxlength="255"/>
					</div>
					<div class="field">
						<label for="state">State:</label>
						<input type="text" class="input" id="state" name="state" maxlength="50"/>
					</div>
					<div class="field">
						<label for="education">Education:</label>
						<select class="input" id="education" name="education" style="width:262px">
							<option value="Primary School">Primary School (Till class 5)</option>
							<option value="Secondary School">Secondary School (Till class 10)</option>
							<option value="Senior Secondary">Senior Secondary (Till class 12)</option>
							<option value="Graduation">Graduation</option>
							<option value="Post Graduation">Post Graduation or more</option>
						</select>
					</div>
					<div class="field">
						<label for="contact">Contact No:</label>
						<input type="text" class="input" id="contact" name="contact" /><br><br>
					</div>
					<div class="field">
						<label for="occupation">Occupation:</label>
						<input type="text" class="input" id="occupation" name="occupation"/>
					</div>
					<div class="field">
						<label for="income">Income:</label>
						<input type="text" class="input" id="income" name="income" />
						<br><br>
					</div>					
					
					<div class="image_field" style="text-align:left">
						<h2>Health Information</h2>
					</div>
					<div class="field">
						<label for="bloodg">Blood Group:</label>
						<select class="input" id="bloodg" name="bloodg" style="width:262px">
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select>
					</div>
					<div class="field">
						<label for="disease">Disease:</label>
						<select class="input" id="disease" name="disease" style="width:262px">
							<option value="NA">Not Applicable</option>
							<option value="Viral">Viral</option>
							<option value="Bacterial">Bacterial</option>
							<option value="Fungal">Fungal</option>
						</select>
						<br><br>
					</div>
					
					<div class="image_field" style="text-align:left">
						<h2>Crime Record</h2>
					</div>
					<div class="field">
						<label for="crime">Crime:</label>
						<select class="input" id="crime" name="crime" style="width:262px">
							<option value="NA">Not Applicable</option>
							<option value="Tax evasion">Tax Evasion</option>
							<option value="Traffic violation">Traffic Rule Violation</option>
							<option value="Kidnapping">Kidnapping</option>
							<option value="Property damage">Property Damage</option>
							<option value="Theft">Theft</option>
							<option value="Mental harrasment">Mental Harrasment</option>	
							<option value="Others">Others</option>
						</select>
					</div>
					<div class="field">
						<label for="caseid">Case ID:</label>
						<input type="text" class="input" id="caseid" name="caseid" maxlength="25"/>
					</div>
					<div class="image_field">
						<input type="submit" name="submit" id="submit" class="button" value="Submit" />			
					</div>
			</form>
		</section>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>