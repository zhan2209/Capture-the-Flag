<?php
  session_start();
  include("global.php");
  
  //login
  if(isset($_POST['username'])) {
	include 'db.inc.php';
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $query);
	
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
	  
	  $new_username = $_GET["reg_username"];
	  $new_password = $_GET["reg_password"];
	  $query = "SELECT * FROM user WHERE username='$new_username'";
	  $result = mysqli_query($connection, $query);
	  
	  if(mysqli_num_rows($result) == 0) { //username available
	    $sql = 'INSERT INTO user SET 
		  username="' . $new_username . '",
		  password="' . $new_password . '",
		  authorization=3;';
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



