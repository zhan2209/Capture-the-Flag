<?php include('globals.php'); ?>
<!doctype html>
<html>
<head><title>Welcome</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<div id='uploadform'>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<div>Select a .<?php echo "$acceptableFileType";?> to upload:</div>
	<div>
		<input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" onchange="validate()">
		<label for="fileToUpload">Choose a file</label>
	</div>
	<div><input id='sub' type="submit" value="Upload Image" name="submit" disabled></div>
	<div id='validity'><p>No file selected.</p></div>
</form>
</div>
<script>
	function validate() {
		var file = document.getElementById("fileToUpload");
		var len = file.value.length;
		var i = len-1;
		var j = len;
		var ftype = '';
		while(file.value.substring(i, j) !== '.') {
			ftype = file.value.substring(i, j) + ftype;
			i--;
			j--;
		}
				
		if(ftype === <?php echo json_encode($acceptableFileType); ?>) {
			document.getElementById('sub').disabled = false;
			document.getElementById('validity').innerHTML = '<p>Ready to upload.<p>';
		}
		else {
			document.getElementById('sub').disabled = true;
			document.getElementById('validity').innerHTML = '<p>Invalid file type.<p>';
		}
	}
</script>
</body>
</html>