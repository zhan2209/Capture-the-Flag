<?php include('globals.php'); ?>
<!doctype html>
<html>
<head><title>Pictures</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
	<p id='path'>/uploads</p>
	<?php $pictures = scandir('uploads/');
	foreach($pictures as $pic): 
		if(substr(pathinfo($pic, PATHINFO_BASENAME), 0, 1) != '.'): // don't display hidden directories or ./.. ?> 
			<div class='img' onmouseover="displayPath('<?php echo $pic ?>')" onmouseleave="clearPath()">
				<img src='./uploads/<?php echo $pic ?>'>
			</div>
		<?php endif;
	endforeach; ?>
	<div id='picback'>
		<a class='link' href='.'>Go back</a>
	</div>
<script>
function displayPath(path) {
	document.getElementById('path').innerHTML = '/uploads/'+path;
}
function clearPath() {
	document.getElementById('path').innerHTML = '/uploads';
}
</script>
</body>
</html>