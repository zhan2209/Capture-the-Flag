<?php
  session_start();
  
  //login
  if(isset($_POST['username'])) {
	include 'db.inc.php';
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$query = "SELECT * FROM user WHERE username='$username'";
	$result = mysqli_query($connection, $query);
	
	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
	$_SESSION['quer'] = $query;
	
	if(mysqli_num_rows($result) == 1) { // username valid
	  $row = mysqli_fetch_array($result);
	  $_SESSION['userinfo'] = $row;

	  if($password === $row['password']) { // login successful
	  	$_SESSION['login'] = true;
	    header('location: loggedin.html.php');
	  }
	  else { // login failed
	  	$_SESSION['login'] = false;
	  	header('location: loginfailed.html.php'); 
	  }
	}
	else { header('location: loginfailed.html.php'); } // login failed
  }
  
  include 'home.html.php';
?>



