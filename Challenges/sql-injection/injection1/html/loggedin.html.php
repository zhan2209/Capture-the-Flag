<!doctype html>
<html>
  <head><title>Logged In</title>
  <link rel='stylesheet' type='text/css' href='style.css'></head>
  <body>
  	<div class='cont'>
  		<div class='login-box'>
    <?php 
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
		$info = $_SESSION['userinfo'];
	    echo "<h1>Login successful!</h1>";
		echo "<p>You're logged in as ".$info['username']."</p>";
		echo "<p>Your authorization level is ".$info['authorization']."</p>";
		if($info['authorization'] == 9) {
			$FLAG = file_get_contents("/var/www/hid/sql-injection/injection1/flag.txt");
			echo "<p>The flag is: $FLAG</p>";
		} else {
			echo "<p>You need authorization level 9 to access the flag.<p>";
		}
	} else {
		echo "<h1>Hey!</h1>";
		echo "<p>You didn't actually login... Did you think I wouldn't notice??</p>";
	}
	?>
	<a href='.'>Go back</a>
</div>
</div>
  </body>
</html>