<!DOCTYPE HTML>
<html>
<head>
	<title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
	<div class="center">
		<h1>Admin Tools</h1>
<?php
	function authenticate($your_password) {
		// TODO: Change this to a complicated password using alpha characters only. No dictionary words!
		$password = "jdmnaziwx";

		if (!is_string($your_password) || strlen($your_password) != strlen($password))
			return(0);

		$your_password = strtolower($your_password);

		for ($i = 0; $i < strlen($password); $i++) {
			if($password[$i] != $your_password[$i])
				return(0);

			usleep(150000);
		}

		return(1);
	}

	$time1 = microtime(true);
	if (isset($_POST["your_password"]) && authenticate($_POST["your_password"])) { ?>
		<div class="flag">Congratulations! The password you used to login is the flag.</div>
<?php } else { ?>
		<form action="index.php" method="post">
			<input type="password" name=your_password maxlength="9">
			<input type="submit" value="Authenticate">
		</form>
<?php }

	$time2 = microtime(true);
	$res = ceil(($time2-$time1) * 1000);
?>
		<br><br>
		<font size=1><b>Page generated in <?php print("$res ms."); ?> </b> <a href=src.php>debug</a></font>
	</div>
</body>
</html>