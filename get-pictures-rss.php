<?php
require_once('bdd-connect.php');

$user_id = $_GET['userId'];

$getUser = $bdd->prepare('SELECT * FROM users WHERE id = :user_id');
$getUser->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$getUser->execute();
$getUser->setFetchMode(PDO::FETCH_OBJ);
while ($user = $getUser->fetch()) {
	$currentUser = $user;
}


$picturesPath = array();
$getPictures = $bdd->prepare('SELECT * FROM pictures WHERE user_id = :user_id');
$getPictures->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$getPictures->execute();
$getPictures->setFetchMode(PDO::FETCH_OBJ);

$rss = new SimpleXmlElement("<rss></rss>");
$rss->addAttribute("version", "2.0");
$rss->addChild('channel');
while ($picture = $getPictures->fetch()) {
	$item = $rss->addChild('item');
	$item->addChild('title', $picture->id);
	$item->addChild('description', "<![CDATA'<img src='" . $picture->path. "']]>'");
}

Header('Content-type: text/xml');
echo $rss->asXML();

?>