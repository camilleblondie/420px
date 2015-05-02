<?php
require_once('signup.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Sign up</title>
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
	     	<?php if (isset($user_id)) : ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My pictures <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li class="active"><a href="pictures.php?userId=<?php echo $user_id ?>">See my pictures album</a>
	            </li>
	            <li><a href="add-picture-form.php">Add/delete a picture</a></li>
	          </ul>
	        </li>
	    	<?php endif; ?>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php if (!isset($user_id)) : ?>
	        <li><a href="signin-form.php">Sign in</a></li>
	    	<?php endif; ?>
	        <li class="active"><a href="signup-form.php">Sign up<span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
			<h1 class="text-center">Welcome on 420px!</h1>
			<h2 class="text-center">Sign up</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
			<form method="POST" action="signup.php">
				<div class="form-group">
					<label for="username">Choose an username</label>
					<input type="text" name="username" id="username" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Enter a password</label>
					<input type="password" name="password" id="password" class="form-control" />
				</div>
				<input name="add-user" type="submit" value="Go!" class="btn btn-default" />
			</form>
		</div>
	</div>
</body>
</html>