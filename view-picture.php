<?php
require_once('picture.php');
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
				<h2 class="text-center">Picture <?php echo $currentPicture->path ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 text-center">
				<img src="<?php echo $currentPicture->path ?>"/>
			</div>
			<div class="col-sm-4">
				<a href="preview-picture.php?pictureId=<?php echo $currentPicture->id?>&action=grayscale" class="btn btn-primary btn-block">Grayscale</a>
				<a href="preview-picture.php?pictureId=<?php echo $currentPicture->id?>&action=sepia" class="btn btn-primary btn-block">Sepia</a>
				<a href="preview-picture.php?pictureId=<?php echo $currentPicture->id?>&action=gaussian-blur" class="btn btn-primary btn-block">Gaussian Blur</a>
				<a href="preview-picture.php?pictureId=<?php echo $currentPicture->id?>&action=edge-detect" class="btn btn-primary btn-block">Edge Detection</a>
				<form method="GET" action="preview-picture.php" class="form-inline" style="margin-top: 5px;">
					<input type="hidden" name="pictureId" value="<?php echo $currentPicture->id?>"/>
					<input type="hidden" name="action" value="brighten"/>
					<input type="number" min="-255" max="255" name="degree" class="form-control" placeholder="-255 to 255" style="width: 50%;"/>
					<input type="submit" value="Brighten" class="btn btn-primary" />
				</form>
				<form method="GET" action="preview-picture.php" class="form-inline" style="margin-top: 5px;">
					<input type="hidden" name="pictureId" value="<?php echo $currentPicture->id?>"/>
					<input type="hidden" name="action" value="contrast"/>
					<input type="number" min="-100" max="100" name="degree" class="form-control" placeholder="-100 to 100" style="width: 50%;"/>
					<input type="submit" value="Contrast" class="btn btn-primary" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>