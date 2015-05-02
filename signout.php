<?php
require_once('auth.php');

if (isset($_POST) && isset($_POST['signout']) && isset($_SESSION['username'])) {
	session_destroy();
	header('Location: signin-form.php');
}
?>