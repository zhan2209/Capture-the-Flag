<?php
if(!session_id()) session_start();
?>
<!doctype html>
<html>
  <head><title>Login Failed</title>
  <link rel='stylesheet' type='text/css' href='style.css'></head>
  <body>
  	<div class='cont'>
  		<div class='login-box'>
		    <h1>Login failed.</h1>
			  <a href='.'>Go back</a>
		  </div>
    </div>
    <?php if($_SESSION['debug'] != 0): ?>
    <div class='cont'>
      <div class='query'>
        <p> <?php if($_SESSION['debug'] != 0) echo $_SESSION['query']; ?> </p>
	    </div>
    </div>
    <?php endif; ?>
  </body>
</html>