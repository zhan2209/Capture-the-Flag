<?php include('globals.php'); ?>
<!doctype html>
<html>
<head><title>Pictures</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
	<?php $pictures = scandir('uploads/');
	foreach($pictures as $pic): ?>

		<?php
			if(pathinfo($pic, PATHINFO_EXTENSION) == 'jpeg') {
				echo "<div class='img'><img src='./uploads/$pic'></div>";
			}
		?>

	<?php endforeach; ?>
	<div id='picback'>
		<a class='link' href='.'>Go back</a>
	</div>
</body>
</html>