<!doctype html>
<head>
<title>Guessing Game</title>
</head>
<body>
<h1>Let's Play a Guessing Game!</h1>
<p>Guess the password!</p>
<?php
	$file = '/var/www/hid/web/guessing-game/secret-password.txt';
	extract($_GET);
	if(isset($attempt)) {
		$password = trim(file_get_contents($file));
		if($attempt === $password) {
			echo "<p>How did you figure out the secret password?!</p>";
			$flag = trim(file_get_contents('/var/www/hid/web/guessing-game/flag.txt'));
			echo "<p>The flag is $flag</p>";
		} else {
			echo "<p>Nope! The secret password is not $attempt...</p>";
		}
	}
?>
<form action='#' method='GET'>
	<p><input type='text' name='attempt'></p>
	<p><input type='submit' value='Guess!'></p>
</form>
<a href='source.txt'>Source</a>
</body>
</html>