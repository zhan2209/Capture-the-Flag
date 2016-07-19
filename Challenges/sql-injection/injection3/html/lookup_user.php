<?php
	include 'db.inc.php';
	include 'globals.php';
	// ID is escaped, so this must be safe, right?
	$id = mysqli_real_escape_string($connection, $_GET["id"]);

	$query = "SELECT * FROM ${table_prefix}users WHERE id=$id";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) !== 1) {
	  die("<p>Could not find user.</p><a href='.'>Go back</a>");
	}

	$row = mysqli_fetch_array($result);
	echo "<pre>";
	echo "User info for id #", htmlspecialchars($row["id"]), "\n";
	echo "Username: ", htmlspecialchars($row["username"]), "\n";
	echo "Email: ", htmlspecialchars($row["email"]), "\n";
	echo "Authorization: ", htmlspecialchars($row["authorization"]), "\n";
	echo "</pre>";
	echo '<a href=".">Go back</a>';
?>