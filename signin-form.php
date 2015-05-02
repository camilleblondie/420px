<?php
require_once('signin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Sign in</title>
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
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="signin-form.php">Sign in<span class="sr-only">(current)</span></a></li>
	        <li><a href="signup-form.php">Sign up</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
			<h1 class="text-center">Welcome on 420px!</h1>
			<h2 class="text-center">Sign in</h2>
			<p class="text-center">Don't have an account ? <a href="signup.html">Sign up!</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
			<form method="POST" action="signin.php">
				<div class="form-group">
					<label for="username">Username</label>
					<input name="username" type="text" id="username" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input name="password" type="password" id="password" class="form-control" />
				</div>
				<input name="valider" type="submit" class="btn btn-default" />
			</form>
		</div>
	</div>
</body>
</html>