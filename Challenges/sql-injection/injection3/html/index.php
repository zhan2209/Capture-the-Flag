<?php
  session_start();
  include('globals.php');
  include 'Encryption.php';
  
  //login
  if(isset($_POST['username'])) {
	include 'db.inc.php';
	
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);
	$encoded_password = base64_encode($password);
	$query = "SELECT * FROM ${table_prefix}users WHERE username='$username' AND password='$encoded_password'";
	$result = mysqli_query($connection, $query);
	
	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
	$_SESSION['query'] = $query;
	
	if(mysqli_num_rows($result) == 1) { // login successful
	  $row = mysqli_fetch_array($result);
	  $_SESSION['userinfo'] = $row;
	  header('location: loggedin.html.php');
	}
	else { header('location: loginfailed.html.php'); } // login failed
  }
  
  //register
  if(isset($_GET['reg_username'])) {
	  include 'db.inc.php';
	  
	  $new_username = mysqli_real_escape_string($connection, $_GET["reg_username"]);
	  $new_password = mysqli_real_escape_string($connection, $_GET["reg_password"]);
	  $new_email = mysqli_real_escape_string($connection, $_GET["reg_email"]);
	  $query = "SELECT * FROM ${table_prefix}users WHERE username='$new_username'";
	  $result = mysqli_query($connection, $query);
	  
	  $encrypted_password = base64_encode($new_password);
	  
	  if(mysqli_num_rows($result) == 0) { //username available
	    $sql = "INSERT INTO ${table_prefix}users SET 
		  username='" . $new_username . "',
		  password='" . $encrypted_password . "',
		  authorization=3, email='" . $new_email . "';";
		if(!mysqli_query($connection, $sql)) {
		  $error = 'Error registering: '.mysqli_error($connection);
		  include 'error.html.php';
		  exit();
		}
		else { header('location: registrationsuccess.html.php'); }
	  }
	  else { header('location: registrationfailed.html.php'); }// username unavailable
  }
  
  include 'home.html.php';
?>



