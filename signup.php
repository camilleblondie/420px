<?php
	require_once('bdd-connect.php');
	require_once('auth.php');

	if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
		$username = htmlspecialchars($_POST['username']);
		$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
		$insertUser = $bdd->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
		$insertUser->bindParam(':username', $username, PDO::PARAM_STR, strlen($username));
		$insertUser->bindParam(':password', $password, PDO::PARAM_STR, strlen($password));
		if ($insertUser->execute()) {
			echo "User saved";
			header('Location: signin-form.php');
		}
		else {
			echo "User cannot be saved";
		}
	}

?>