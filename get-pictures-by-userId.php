<?php

require_once('bdd-connect.php');
require_once('auth.php');

$pictureIds = array();
$getPicture = $bdd->prepare('SELECT * FROM pictures WHERE user_id = :user_id');
$getPicture->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$getPicture->execute();
$getPicture->setFetchMode(PDO::FETCH_OBJ);
while ($picture = $getPicture->fetch()) {
	array_push($pictureIds, $picture);
}

?>