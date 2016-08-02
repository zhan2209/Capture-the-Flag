<!doctype html>
<html>
  <head><title>Logged In</title>
  <link rel="stylesheet" type="text/css" href="style.css"></head>
  <body>
  	<h1>.</h1>
<?php session_start(); 
	$info = $_SESSION['userinfo'];
	if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
		echo "<div class='stand'><div class='outer-screen'><div class='inner-screen'><div class='form'>";
		echo "<h1 id='log'>Login successful!</h1>";
		echo "<p>You're logged in as '".$info['username']."'</p>";
		echo "<p>Your authorization level is ".$info['authorization']."</p>";
		if($info['authorization'] == 9) {
	 		$FLAG = file_get_contents("/var/www/hid/sql-injection/injection2/flag.txt");
	  		echo "<p>The flag is: $FLAG</p>";
		} else {
			echo "<p>You need authorization level 9 to access the flag.<p>";
		} 
		echo "<a href='.'>Go back</a>";
		echo "</div></div></div></div>";
	} else {
		header('Location: loginfailed.html.php');
	}
?>
  </body>
</html>