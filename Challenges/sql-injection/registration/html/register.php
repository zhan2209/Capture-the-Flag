<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
</html>
<?php
include "db.inc.php";
$username = $_POST["username"];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query);

echo "<div class='login'>";
if(mysqli_num_rows($result) !== 0) {
	echo "<p>There is already a(n) '" . htmlspecialchars($username) . "' in our database. Try another username.</p>";
	die("<a href='.'>Go back</a>");
}

if($username == '') {
	echo "<p>You didn't enter a username... what're you trying to pull?</p>";
	die("<a href='.'>Go back</a>");
} else {
	echo "<p>'$username' is available, but registration is currently disabled.</p>";
	die("<a href='.'>Go back</a>");
}
echo "</div>";
?>