<?php
session_start();
include('includes/connect.php');
include('includes/html_templates.php');

if(!isset($_SESSION['user_id'])) {
	header('Location: login.php');		
}

$keywords = htmlentities($_GET['keywords']);
$error = array();
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
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
					<h3 style="text-align:left; font-weight:normal; color:#ccccb3;">Following items match your search</h3>

					<?php
						if(!empty($keywords)) {
							$result = mysql_query(" SELECT * FROM persons WHERE name='$keywords' ") or die(mysql_error());
							if(mysql_num_rows($result) == 0) {
								$error[] = 'No match found. Try again !';
							} else {		

								while($row = mysql_fetch_assoc($result)) {
								echo '
										<div id="searchfield">
									';
									$pid = $row['id'];
										echo '<div style="width:90px; float:left;">';
											$img_loc = $row['profile_pic'];
											echo "<img src=\"$img_loc\" height=\"70\" width=\"80\" />";
										echo '</div>';
										echo '<div style="width:400px; float:left;">';
											echo $row['name'].'<br>Contact No.:&nbsp'.$row['contact'].'<br><br>';

											echo '<a href="viewinfo.php?id='.$pid.'">';
											echo "<img src=\"images/viewIcon.png\" height=\"20\" width=\"20\" style=\"margin-right:100px\" />";
											echo '</a>';
											
											echo '<a href="editinfo.php?id='.$pid.'">';
											echo "<img src=\"images/editIcon.png\" height=\"20\" width=\"20\" style=\"margin-right:100px\" />";
											echo '</a>';
											
											echo '<a href="deleteinfo.php?id='.$pid.'">';
											echo "<img src=\"images/deleteIcon.png\" height=\"20\" width=\"20\" style=\"margin-right:100px\" />";
											echo '</a>';
										echo '</div>';
								echo '	
										</div>
								';
								}

							}
						} else {
							$error[] = 'Please enter a name to Search';
						}

						if(!empty($error)) {
							$error_message = '<span class="error">';
							foreach($error as $val) {
								$error_message.= "$val<br><br>";
							}
						$error_message.="</span><br><br>";
						}
					?>

					<?php echo $error_message; ?>

			</div>
		</section>
		
		<?php mainFooter(); ?>
	</div>
</body>
</html>