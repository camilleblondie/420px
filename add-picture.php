<?php
require_once('bdd-connect.php');
require_once('auth.php');
require('vendor/autoload.php');

use Imagine\Image\Box;
use Imagine\Image\Point;
$imagine = new Imagine\Gd\Imagine();

$uploadOk = 1;
$uploaddir = 'pictures/' . $user_id . '/';
if (!file_exists($uploaddir)) {
	mkdir($uploaddir);
}
$uploadfile = $uploaddir . basename($_FILES['picture']['name']);
$imageFileType = pathinfo($uploadfile, PATHINFO_EXTENSION);

if (empty($_FILES["picture"]["tmp_name"])) {
	echo "Please select a picture. ";
	$uploadOk = 0;
}

if ($uploadOk && $check = getimagesize($_FILES["picture"]["tmp_name"]) == false) {
	echo "File is not an image.";
    $uploadOk = 0;
}

if ($uploadOk && $_FILES['picture']['size'] > 2097152) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk && file_exists($uploadfile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($uploadOk == 1) {
	if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
		try {
			$image = $imagine->open($uploadfile);
			$image->resize(new Box(420, 420))->save($uploadfile);
		} catch (Exception $e) {
			echo $e->getMessage();
		}

		$insert = $bdd->prepare('INSERT INTO pictures(path, user_id) VALUES(:uploadfile, :user_id)');
		$insert->bindParam(':uploadfile', $uploadfile, PDO::PARAM_STR, strlen($uploadfile));
		$insert->bindParam(':user_id', $user_id, PDO::PARAM_STR, strlen($user_id));
		if ($insert->execute()) {
			echo "Saving to database succeeded.\n";
		}
		else {
			print_r($insert->errorInfo());
			echo "Saving to database failed\n";
		}
	    echo "File is valid and has been uploaded with success.\n";
	    header('Location: pictures.php?userId=' . $user_id);
	} else {
	    echo "Could not upload file to server.\n";
	}
}
/*else {
	echo "Errors";
}*/

?>