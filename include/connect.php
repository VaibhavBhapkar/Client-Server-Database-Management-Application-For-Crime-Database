<?php

$connect=mysql_connect('localhost','root','');

if(!$connect) {
	die('Unable to connect to Server. Error !! <br><br>'.mysql_error() );
}

$db=mysql_select_db('pvground');

if(!$db) {
	die('Unable to connect to Database. Error !! <br><br>'.mysql_error() );
}

?>
