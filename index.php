<?php include('server.php'); 

	//if the user is not logged in, they cannot access this page
if (empty($_SESSION['username'])) {
	header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h3>Welcome</h3>		
	</div>

	<div class="content">
		<?php if(isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<div class="msg">
			<?php if (isset($_SESSION["username"])): ?>
				<p>Welcome <strong><?php echo $_SESSION["username"]; ?></strong></p>
				<p><a href="index.php?logout='1" style="color: red">Logout</a></p>
			<?php endif ?>
		</div>

	</div>

</body>
</html>