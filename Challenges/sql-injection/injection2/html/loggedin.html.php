<!doctype html>
<html>
  <head><title>Logged In</title>
  <link rel="stylesheet" type="text/css" href="style.css"></head>
  <body>
    <?php session_start(); 
	$info = $_SESSION['userinfo']; ?>
	<h1>.</h1>
<div class="stand"><div class="outer-screen"><div class="inner-screen"><div class="form">
	<h1 id='log'>Login successful!</h1>
	<p>You're logged in as '<?php echo $info['username']; ?>'</p>
	<p>Your authorization level is <?php echo $info['authorization']; ?></p>
	<?php if($info['authorization'] == 9) {
	  $FLAG = file_get_contents("/var/www/hid/sql-injection/injection2/flag.txt");
	  echo "<p>The flag is: $FLAG</p>";
	}
	else {
		echo "<p>You need authorization level 9 to access the flag.<p>";
	} ?>
	<a href='.'>Go back</a>
</div></div></div></div>
  </body>
</html>