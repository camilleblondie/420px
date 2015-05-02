<?php
require_once('bdd-connect.php');
require_once('auth.php');

if (isset($_GET) && isset($_GET['pictureId'])) {
	$picture_id = $_GET['pictureId'];
}
else {
	echo "Picture id not specified.";
	exit();
}

$currentPicture;
$getPicture = $bdd->prepare('SELECT * FROM pictures WHERE id = :picture_id');
$getPicture->bindParam(':picture_id', $picture_id, PDO::PARAM_INT);
$getPicture->execute();
$getPicture->setFetchMode(PDO::FETCH_OBJ);
while ($picture = $getPicture->fetch()) {
	if ($picture->user_id != $user_id) {
		echo "You do not have access to this picture";
		exit();
	}
	$currentPicture = $picture;
	$currentPictureFileType = pathinfo($currentPicture->path, PATHINFO_EXTENSION);
}
?>