<?php
session_start();

if (!isset($_SESSION['user_id'])) {
	echo "You must be logged in";
	exit();
}
else {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
}

?>