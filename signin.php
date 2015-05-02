<?php
require_once('bdd-connect.php');
if (isset($_POST) && isset($_POST['username']) && isset($_POST['password']) && !isset($_SESSION)) {
	session_start();
	$username = htmlspecialchars($_POST['username']);
	$getUser = $bdd->prepare('SELECT * FROM users WHERE username = :username');
	$getUser->bindParam(':username', $username, PDO::PARAM_STR, strlen($username));
	$getUser->execute();
	$getUser->setFetchMode(PDO::FETCH_OBJ);
	while ($user = $getUser->fetch()) {
		if (password_verify($_POST['password'], $user->password)) {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['user_id'] = $user->id;
			echo "Welcome ".$_SESSION['username']."!";
			header('Location: pictures.php?userId='.$user->id);
		}
		else {
			echo "Wrong password";
		}
	}
}

?>