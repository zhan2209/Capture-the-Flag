<?php
	include('globals.php');
	$target_dir = 'uploads/';
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
	$uploadValid = true;
	$e = '';
	
	echo target_file.' --- ';
	echo $uploadFileType;
	
	# check validity of file upload
	if(file_exists($target_file)) {
		$e = "File already exists.";
		$uploadValid = false;
	}
	if($_FILES['fileToUpload']['size'] > 5000000) {
		$e = "File must be less than 5MB";
		$uploadValid = false;
	}
	
	if($uploadValid == false) {
		include 'error.html.php';
	} else {
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
			echo "File upload successful. <a href='.'>Go back</a>";
		} else {
			echo "Error uploading file: " . $_FILES['fileToUpload']['error'];
		}
	}
?>

