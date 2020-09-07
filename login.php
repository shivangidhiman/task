<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav>
		<label class="logo">Welcome!</label>
		<ul>
			<li><a href="register.php">Register</a></li>
			<li><a class="active" href="login.php">Login</a></li>
		</ul>
	</nav>

	<div class="header">
		<h2>Login</h2>		
	</div>

	<form method="post" action="login.php">
		<!-- display validation errors here -->
		<?php include('errors.php') ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>

		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>

		<p>
			Not a member yet? <a href="register.php">Sign Up</a>
		</p>

	</form>
</body>
</html>