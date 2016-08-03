<!doctype html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Injection 3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class='login'>
	<?php
		session_start();
		if(mysqli_num_rows($_SESSION['result']) == 1) {
			$row = mysqli_fetch_array($_SESSION['result']);
			echo "<h3>Welcome back, ".$row['username']."!</h3>";
			echo "<div class='login-info'>";
			echo "<p>Authorization: ".$row['authorization']."</p>";

			if($row['authorization'] == 9) {
				$FLAG = file_get_contents("/var/www/hid/sql-injection/injection3/flag.txt");
				echo "<p>The flag is ".$FLAG."</p>";
			} else {
				echo "<p>Authorization 9 required to view the flag.</p>";
			}
		} else {
			echo "<div class='login-info'>";
			echo "</p>Invalid credentials.</p>";
		}
		echo "<a class='link' href='.'>Go back</a>";
		echo "</div>";
	?>
</div>
</body>
</html>









