<?php

require_once('bdd-connect.php');
require_once('auth.php');

if (isset($_POST['delete-file']) && isset($_POST['pictureId'])) {
	$getPicture = $bdd->prepare('SELECT * FROM pictures WHERE id = :pictureId and user_id = :user_id');
	$getPicture->bindParam(':pictureId', $_POST['pictureId'], PDO::PARAM_INT);
	$getPicture->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$getPicture->execute();
	$getPicture->setFetchMode(PDO::FETCH_OBJ);
	while ($picture = $getPicture->fetch()) {
		if (unlink($picture->path)) {
			echo "File deleted from server.\n";
		}
		else {
			echo "File could not be deleted from server. ";
			exit();
		}
	}
	$deletePicture = $bdd->prepare('DELETE FROM pictures WHERE id = :pictureId');
	$deletePicture->bindParam(':pictureId', $_POST['pictureId'], PDO::PARAM_INT);
	$nbDeletedPictures = $deletePicture->execute();
	if ($nbDeletedPictures == 1) {
		echo "File delete from database.";
	}
}
?>