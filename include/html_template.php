<?php
//Logo and Main header area
function searchBarCode(){
	
	echo '
		<header id="main_header">
			<div id="rightAlign">
	';
	//links for login and register
	topRightLinks();
	echo "
			</div>
			<a href=\"index.php\">
				<img src=\"images/mainLogo.png\">
			</a>
		</header>
		
		<div id=\"menuitems\">
			<div id=\"search\">
				<form name=\"input\" action=\"search.php\" method=\"GET\">
					<input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"50\" class=\"searchBox\" /> 
					<input type=\"submit\" value=\"Search\" class=\"button\" />
					
					<span style=\"margin-left:400px\" >
						<a href=\"add_entry.php\" style=\"color:#ffffff\">Add Entry</a>&nbsp&nbsp|&nbsp&nbsp
						<a href=\"index.php\" style=\"color:#ffffff\">Report</a>&nbsp&nbsp
					</span>
				</form>
				
			</div>
		</div>";
		
	echo "
		
	";
}


//Top right links
function topRightLinks() {
	if( !isset($_SESSION['user_id']) ) {
		echo '<a href="register.php">Register</a> | <a href="login.php">Log In</a>';
	}
	else {
		$uid = $_SESSION['user_id'];
		$result=mysql_query("SELECT * from users WHERE id='$uid'") or die(mysql_error() );
		$row=mysql_fetch_array($result);
		$uname=$row['name'];
		echo 'Hello '.$uname.' | <a href="logout.php">Log Out</a>';	
	}
}


//Main Footer
function mainFooter() {
	echo '
		<div id="main_footer">
			<table>
				<tr>
					<th><a href="conus.php">Contact Us</a></th>
					<th><a href="about.php">About Us</a></th>
					<th><a href="founder.php">Our Founders</a></th>
				</tr>
			</table>
		</div>
		';
}
