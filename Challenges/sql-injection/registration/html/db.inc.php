<?php
$connection = mysqli_connect("localhost", "root", "iNfC16s3c", "registration");
if(!$connection) {
	$error = 'Unable to connect to database server: '.mysqli_error($connection);
	echo "<p>$error</p>";
	exit();
}
if(!mysqli_set_charset($connection, 'utf8')) {
	$error = 'Unable to set database connection encoding: '.mysqli_error($connection);
	echo "<p>$error</p>";
	exit();
}
if(!mysqli_select_db($connection, 'registration')) {
	$error = 'Unable to select database: '.mysqli_error($connection);
	echo "<p>$error</p>";
	exit();
}
?>