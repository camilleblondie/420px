<?php
require_once('bdd-connect.php');

if (isset($_GET) && isset($_GET['userId'])) {
	$user_id = $_GET['userId'];
}
else {
	echo "User id not specified.";
	exit();
}

$getUser = $bdd->prepare('SELECT * FROM users WHERE id = :user_id');
$getUser->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$getUser->execute();
$getUser->setFetchMode(PDO::FETCH_OBJ);
while ($user = $getUser->fetch()) {
	$currentUser = $user;
}


$userPictures = array();
$getPictures = $bdd->prepare('SELECT * FROM pictures WHERE user_id = :user_id');
$getPictures->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$getPictures->execute();
$getPictures->setFetchMode(PDO::FETCH_OBJ);
while ($picture = $getPictures->fetch()) {
	array_push($userPictures, $picture); 
}
?>