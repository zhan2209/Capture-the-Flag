<!DOCTYPE HTML>
<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['first-attempt'])) {
	$_SESSION['first-attempt'] = true;
}
?>
<html>
<head>
	<title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
<img id='verisign' src='./verisign.png'>

<header>
	<h1>Flags-R-Us</h1>
</header>

<div class='container'>

<div class="center">
	<div class='content'>
		<h1>Admin Tools</h1>
<?php

			function authenticate($your_password) {
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

			if(isset($_POST["your_password"]) && authenticate($_POST["your_password"])) { 				?>
				<p>Welcome back admin! We'll authenticate your session.</p>
<?php			$_SESSION['is_admin'] = true;
			} else { 																					?>
				<p>Please identify yourself as the admin by entering your credentials below.</p>
				<form action='admin.php' method='post'>
					<input type='password' name='your_password' maxlength='9'>
					<input type='submit' value='Authenticate'>
				</form>
<?php			if(!$_SESSION['first-attempt']) {
					echo "<p>That's not the password... Are you sure you're the admin?</p>";
				}
				$_SESSION['first-attempt'] = false;
			}

			$time2 = microtime(true);
			$res = ceil(($time2-$time1) * 1000);
																										?>
			<br>
			<font size=1><b>Page generated in <?php print("$res ms."); ?> </b> <a href='src.php'>debug</a></font>
			<br><br><a href='.'>Back</a>
	</div>
</div>

<footer>COPYRIGHT &#169; 2016 FLAGS-R-US</footer>

</div>

</body>
</html