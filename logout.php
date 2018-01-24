<?php
session_start();
session_destroy();
header('Location: success_logout.php');
?>