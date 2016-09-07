<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Injection 2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Login</h1>
  <div class="stand">
  	<div class="outer-screen">
  		<div class="inner-screen">
  			<div class="form">
 				<form action="index.php" method="POST">
			  		<input type="text" id="username" name="username" placeholder="USERNAME" autofocus='autofocus' required>
			  		<input type="password" id="password" name="password" placeholder="PASSWORD" required>
			  		<input type="submit" id="submit" value="Submit">
					<input type="hidden" name="debug" value="0">
					<?php session_start();$_SESSION['debug']=$_POST['debug'];?>
				</form>
			</div>
		</div>
		<a href='./source.html' id='source-btn'>Source</a>
	</div>
</div> 
</body>
</html>