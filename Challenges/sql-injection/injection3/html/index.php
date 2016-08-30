<?php
session_start();
include 'globals.php';
include 'Encryption.php';
  
if(isset($_POST['username'])) {
	include 'db.inc.php';
	
	$_SESSION['username'] = mysqli_real_escape_string($connection, $_POST["username"]);
	$_SESSION['password'] = mysqli_real_escape_string($connection, $_POST["password"]);
	$encoded_password = base64_encode($_SESSION['password']);
	$_SESSION['query'] = "SELECT * FROM ${table_prefix}users WHERE username='".$_SESSION['username']."' AND BINARY password=BINARY '$encoded_password'";
	$_SESSION['result'] = mysqli_query($connection, $_SESSION['query']);

	include 'login.html.php';
}
?>



