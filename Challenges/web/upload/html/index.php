<?php
	$dirName = 'uploads';
	
	if(!is_dir($dirName)) {
		mkdir($dirName, 0755);
	}
	
	include('home.html.php');
?>

