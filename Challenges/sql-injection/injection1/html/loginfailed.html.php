<!doctype html>
<html>
  <head><title>Login Failed</title></head>
  <body>
    <h1>Login failed.</h1>
	<?php
	  session_start();
	  if($_SESSION['debug'] == 1) {
	    echo "<pre>";
	    echo 'username: '.$_SESSION['thisuser'], "\n";
	    echo 'password: '.$_SESSION['thispass'], "\n";
	    echo 'query: '.$_SESSION['thisquer'], "\n";
	    echo "</pre>";
	  }
	?>
	<a href='.'>Go back</a>
  </body>
</html>