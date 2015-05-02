<?php
require_once('picture.php');
require_once('image-editor.php');

$pxImage = new PxImage();

if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'grayscale') {
	try {
		$pxImage->grayscale($currentPicture->path);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		$error = "Sorry, an error occured, please try again";
	}
}
else if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'sepia') {
	try {
		$pxImage->sepia($currentPicture->path);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		$error = "Sorry, an error occured, please try again";
	}
}
else if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'gaussian-blur') {
	try {
		$pxImage->gaussian_blur($currentPicture->path);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		$error = "Sorry, an error occured, please try again";
	}
}
else if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'brighten'
	&& isset($_GET['degree']) && !empty($_GET['degree'])) {
	try {
		$pxImage->brighten($currentPicture->path);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		$error = "Sorry, an error occured, please try again";
	}
}
else if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'contrast'
	&& isset($_GET['degree']) && !empty($_GET['degree'])) {
	try {
		$pxImage->contrast($currentPicture->path, $_GET['degree']);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		
	}
}
else if (isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'edge-detect') {
	try {
		$pxImage->edge_detect($currentPicture->path);
		$encodedImage = base64_encode($pxImage->previewPicture->get($currentPictureFileType));
	} catch (RuntimeException $e) {
		$error = "Sorry, an error occured, please try again";
	}
}
else {
	header('Location: view-picture.php?pictureId=' . $currentPicture->id);
}
if (isset($_GET) && isset($_GET['action']) && isset($_GET['save']) && $_GET['save'] == 'true') {
	$pxImage->previewPicture->save($currentPicture->path);
	header('Location: view-picture.php?pictureId=' . $currentPicture->id);
}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Pictures</title>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">420px</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown active">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My pictures <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li class="active"><a href="pictures.php?userId=<?php echo $user_id ?>">See my pictures album<span class="sr-only">(current)</span></a></li>
	            <li><a href="add-picture-form.php">Add/delete a picture</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <p class="navbar-text">Signed in as <?php echo $username ?></p>
	        <li><a href="signout-form.php">Sign out</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-12">
				<h2 class="text-center">Preview</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php if (isset($encodedImage)) : ?>
					<img src='data:image;base64,<?php echo $encodedImage ?>'/>
				<?php endif; ?>
				<?php if (isset($error)) : ?>
					<p><?php echo $error ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row" style="margin-top: 10px;">
			<div class="col-sm-12 text-center">
				<a href="view-picture.php?pictureId=<?php echo $currentPicture->id?>" class="btn btn-default">Back</a>
				<a href="preview-picture.php?pictureId=<?php echo $currentPicture->id?>&
				action=<?php echo $_GET['action']?>&
				<?php if (isset($_GET['degree'])) { echo 'degree=' . $_GET['degree'] . '&'; }?>
				save=true" class="btn btn-success">Save</a>
			</div>
		</div>
	</div>
</body>
</html>