<?php
if(!session_id()) session_start();
?>
<!doctype html>
<html>
<head>
  <title>Injection 1</title>
  <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<div class='intro'>
<h1>Good Wood</h1>
<h3>Your number 1 online retailer of fine wood!</h3>
<p>Due to massive demand for our wood, you'll need to login below in order to make a purchase. And no, we don't sell flags. Stop asking.</p>
</div>
<div class='container'>
  	<section class='loginform cf'>
  	<h1>Login</h1>
  	<form name='login' action='index.php' method='POST' accept-charset='utf-8'>
  		<ul>
  			<li><label for="username">Username</label>
		  	<input type="text" id="username" name="username" placeholder="Username" required></li>
		  	<li><label for="password">Password</label>
		  	<input type="password" id="password" name="password" placeholder="Password" required></li>
		  	<li>
		  	<input type="submit" id="login-button" value="Login"></li>
		  	<input type="hidden" id="debug" name="debug" value="0">
		  	<a href='./source.html' id='source-btn'>Source</a>
		  	<?php $_SESSION['debug']=$_POST['debug']; ?>
		</ul>
 	</form>
	</section>
</div>
<div class='pics'><br>
<h3>Some examples of our finest wood:</h3>
<div class='img'>
	<img src='./pics/horse.jpeg'>
</div>
<div class='img'>
	<img src='./pics/wood.jpg'>
</div>
<div class='img'>
	<img src='./pics/elijah.jpg'>
</div>
</div>
</body>
</html>