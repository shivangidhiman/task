<?php

session_start();

$username = "";
$email = "";
$errors = array();

//connect to the database	
$db = mysqli_connect('localhost', 'root', '', 'registration');

//if the register button is clicked
if (isset($_POST['register'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);

	//ensure that form fields are filled properly
	if (empty($username)) {
			array_push($errors, "Username is required"); //add error to error's array
		}

		if (empty($email)) {
			array_push($errors, "Email is required"); //add error to error's array
		}

		if (empty($password1)) {
			array_push($errors, "Password is required"); //add error to error's array
		}

		if($password1 != $password2) {
			array_push($errors, "Passwords don't match");
		}

		$check_username = mysqli_query($db, "SELECT * FROM users WHERE username='$username'");
		if(mysqli_num_rows($check_username) == 1){
			array_push($errors, "Sorry! Username already exists");
		}

		$check_email = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email) == 1){
			array_push($errors, "Sorry! This email has already been registered");
		}

		// if there are no errors, save user to database
		if(count($errors) == 0){
			$password = md5($password1); //encrypt password before storing in database
			$sql = "INSERT INTO users (username, email, password) 
			VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			header('location: login.php');
		}
	}

	// log user in from login page
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		//ensure that form fields are filled properly
		if (empty($username)) {
			array_push($errors, "Username required"); //add error to errors array
		}

		if (empty($password)) {
			array_push($errors, "Password required"); //add error to errors array
		}

		if(count($errors) == 0){
			$password= md5($password); //encrypt password before comparing with database
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			
			if(mysqli_num_rows($result) == 1) {
				//log user in
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php'); //redirect to homepage
			}
			else {
				array_push($errors, "The username/password is incorrect");
			}
		}
	}

	//logout
	if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}

	?>