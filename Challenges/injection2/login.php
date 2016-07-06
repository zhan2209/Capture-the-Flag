<?php
	$connection = mysqli_connect("localhost", "root", "iNfC16s3c", "ohno");
	if(!$connection) {
		echo "Oh no!";
	}
	$username = $_POST["username"];
	$password = $_POST["password"];
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $query);
	
	$logged_in = false;
	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$logged_in = true;
		echo "<h1>Logged in!</h1>";
		if($row["authorization"] == 9) {
			$FLAG = file_get_contents("flag.txt");
			echo "The flag is: ".$FLAG;
		} else {
			echo "You are not authorized to view the flag.";
		}
	}
	
	if(!$logged_in) {
		echo "<h1>Login failed.</h1><br>";
		echo "<a href='.'>Go Back</a>";
	}
?>