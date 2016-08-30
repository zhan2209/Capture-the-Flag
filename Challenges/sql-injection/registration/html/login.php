<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
</html>
<?php
include "db.inc.php";
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$query = "SELECT * FROM users WHERE username='$username' AND BINARY password=BINARY '$password'";
$result = mysqli_query($connection, $query);
echo "<div class='login'>";
if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_array($result);
	echo "<h1>Logged in!</h1>";
	echo "<p>Welcome back ".$row['username'].".</p>";
	if($row['username'] == 'admin') {
		$FLAG = file_get_contents('/var/www/hid/sql-injection/registration/flag.txt');
		echo "<p>The flag is: $FLAG</p>";
	} else {
		echo "<p>Only the admin may view the flag.</p>";
	}
} else {
	echo "<h1>Login failed.</h1>";
	if($_POST['debug'] != 0) {
		echo "<p>$query</p>";
	}
}
echo "<a href='.'>Go back</a>";
echo "</div>";
?>