<?php
require_once('signout.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Sign out</title>
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
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My pictures <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="pictures.php?userId=<?php echo $user_id ?>">See my pictures album</a></li>
	            <li><a href="add-picture-form.php">Add/delete a picture<span class="sr-only">(current)</span></a></li>
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
	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
			<h2 class="text-center">Sign out</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-md-offset-4 text-center">
	<?php if (isset($_SESSION) && isset($_SESSION['username'])) : ?>
		<form method="POST" action="signout.php">
			<input type="submit" name="signout" value="Click here to sign out" class="btn btn-default">
		</form>
	<?php else : ?>
		<p>You can't sign out if you're logged in.</p>
	<?php endif ?>
		</div>
	</div>
</body>
</html>
