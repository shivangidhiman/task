<?php include('server.php'); ?>

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
			<li><a class="active" href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
	</nav>

	<div class="header">
		<h2>Register</h2>		
	</div>


	<form method="post" action="register.php">
		<!-- display validation errors here -->
		<?php include('errors.php') ?>


		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password1">
		</div>

		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password2">
		</div>

		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>

		<p>
			Already a member? <a href="login.php">Sign In</a>
		</p>

	</form>
</body>
</html>