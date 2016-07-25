<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
</html>
<?php
include "db.inc.php";
$username = $_POST["username"];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query);

if(mysqli_num_rows($result) !== 0) {
	echo "<p>Someone has already registered with the username '" . htmlspecialchars($username) . "'</p>";
	die("<a href='.'>Go back</a>");
}

if($username == '') {
	die("<p>You didn't enter a username... what're you trying to pull?</p>");
} else {
	die("<p>'$username' is available, but registration is currently disabled.</p>");
}
?>