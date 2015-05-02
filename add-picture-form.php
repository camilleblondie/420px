<?php
require_once('get-pictures-by-userId.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Manage pictures</title>
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
	            <li><a href="pictures.php?userId=<?php echo $user_id ?>">See my pictures album</a></li>
	            <li class="active"><a href="add-picture-form.php">Add/delete a picture<span class="sr-only">(current)</span></a></li>
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
		<div class="row">
			<div class="col-sm-4 col-md-offset-4">
				<h1 class="text-center">Welcome on 420px!</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
			<h2 class="text-center">Add a picture</h2>
				<form method="POST" action="add-picture.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="picture">Submit a file: </label>
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" name="picture" id="picture" class="form-control" />
					</div>
					<input type="submit" name="add-file" value="Ajouter" class="btn btn-default" />
				</form>
			</div>
			<div class="col-sm-6">
			<h2 class="text-center">Delete a picture</h2>
				<form method="POST" action="delete-picture.php">
					<div class="form-group">
						<label>Choose file: </label>
						<select name="pictureId" class="form-control">
							<?php foreach ($pictureIds as $picture) {
								echo "<option value=" . $picture->id . ">" . $picture->path . "</option>";
							}?>
						</select>
					</div>
					<input type="submit" name="delete-file" value="Supprimer" class="btn btn-default" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>