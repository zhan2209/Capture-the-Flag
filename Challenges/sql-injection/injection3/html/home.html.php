<!doctype html>
<html>
<head>
  <title>Injection 3</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Login</h1>
  <form action="index.php" method="POST">
    <div id="login-box">
		<div class="form-group">
		  <label for="username">Username:</label>
		  <input type="text" id="username" name="username">
		</div>
		<div class="form-group">
		  <label for="password">Password:</label>
		  <input type="password" id="password" name="password">
		</div>
		<div class="form-action">
		  <input type="submit" id="login-button" value="Login">
		</div>
	</div>
  </form>
  <h1>Register</h1>
  <form action="index.php" method="GET">
    <div id="register-box">
	  <div class="form-group">
	    <label for="reg_username">Username:</label>
		<input type="text" id="reg_username" name="reg_username">
	  </div>
	  <div class="form-group">
	    <label for="reg_password">Password:</label>
		<input type="password" id="reg_password" name="reg_password">
	  </div>
	  <div class="form-group">
	    <label for="reg_email">Email:</label>
		<input type="text" id="reg_email" name="reg_email">
	  </div>
	  <div class="form-action">
	    <input type="submit" id="register-button" value="Register">
	  </div>
	</div>
  </form>
  <div class="lookup_user">
	  <p>Due to recent attacks, we've made some changes to the website's security.</p>
	  <p>If you have questions, you can get the admin's contact info <a href="lookup_user.php?id=1">here</a>.</p>
  </div>
</body>
</html>