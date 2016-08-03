<?php
$connection = mysqli_connect("localhost", "root", "iNfC16s3c", "inj3");

if(mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}