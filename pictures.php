<?php
require_once('get-pictures.php');
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
	        <p class="navbar-text">Signed in as <?php echo $currentUser->username ?></p>
	        <li><a href="signout-form.php">Sign out</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-12">
				<h2 class="text-center">
				Pictures of <?php echo $currentUser->username; ?>
				</h2>
			</div>
		</div>
		<div class="row">
			<?php foreach ($userPictures as $picture) : ?>
				<div class="col-sm-3">
					<a href="view-picture.php?pictureId=<?php echo $picture->id ?>" class="thumbnail">
						<img src='<?php echo $picture->path ?>'/>
					</a>
				</div>
			<?php endforeach; ?>
			<?php if (count($userPictures) == 0) :?>
				<p>You have not added any pictures yet. Click <a href="add-picture-form.php">here</a> to add one</p>
			<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>