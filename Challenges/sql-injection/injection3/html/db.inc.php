<?php
  $connection = mysqli_connect("localhost", "root", "iNfC16s3c", "inj3");
  if(!$connection) {
	  $error = 'Unable to connect to database server: '.mysqli_error($connection);
	  include 'error.html.php';
	  exit();
  }
  if(!mysqli_set_charset($connection, 'utf8')) {
	  $error = 'Unable to set database connection encoding: '.mysqli_error($connection);
	  include 'error.html.php';
	  exit();
  }
  if(!mysqli_select_db($connection, 'inj3')) {
	  $error = 'Unable to select database: '.mysqli_error($connection);
	  include 'error.html.php';
	  exit();
  }
?>