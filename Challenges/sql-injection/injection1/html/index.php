<?php
session_start();
  
//login
if(isset($_POST['username'])) {
	include 'db.inc.php';
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($result) == 1) { // login successful
		$_SESSION['login'] = true;
		$row = mysqli_fetch_array($result);
		$_SESSION['userinfo'] = $row;
		header('location: loggedin.html.php');
	}
	else { header('location: loginfailed.html.php'); } // login failed
}
  
include 'home.html.php';
?>