<!doctype html>
<html>
  <head><title>Logged In</title></head>
  <body>
    <?php session_start(); 
	$info = $_SESSION['userinfo']; ?>	
    <h1>Login successful!</h1>
	<p>You're logged in as '<?php echo $info['username']; ?>'</p>
	<p>Your authorization level is <?php echo $info['authorization']; ?></p>
	<?php if($info['authorization'] == 9) {
	  $FLAG = file_get_contents("../../hid/sql-injection/injection1/flag.txt");
	  echo "<p>The flag is: $FLAG</p>";
	}
	else {
		echo "<p>You need authorization level 9 to access the flag.<p>";
	} ?>
	<a href='.'>Go back</a>
  </body>
</html>