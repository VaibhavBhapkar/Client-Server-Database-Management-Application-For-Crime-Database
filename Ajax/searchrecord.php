<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
	$keyword = $_GET['keyword'];
	
	if($keyword == 'as') {
		echo 'Match found';
	} else {
		echo 'Match not found';
	}
echo '</response>';
?>
