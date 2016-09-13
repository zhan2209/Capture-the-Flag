<!doctype html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main-header">
		<h1>Welcome! Login or register below.</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h3 class="panel-title">Log In</h3>
			</div>
			<div class="panel-body">
				<form action="login.php" method="POST">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" class="form-control" maxlength="75">
					</div>
					<input type="hidden" name="debug" value="0">
					<input type="submit" name="action" value="Login" class="btn btn-primary">
				</form>
			</div>
			<a href='./login-source.html' style='display:none'>Source</a>
			<hr>
			<div class="panel-heading">
				<h3 class="panel-title">Register</h3>
			</div>
			<div class="panel-body">
				<form action="register.php" method="POST">
					<div class="form-group">
						<label for="reg_username">Username:</label>
						<input type="text" id="reg_username" name="username" class="form-control" autofocus='autofocus'>
					</div>
					<input type="submit" name="action" value="Register" class="btn btn-primary">
				</form>
			</div>
			<a href='./register-source.html' style='display:none'>Source</a>
		</div>
	</div>
</body>
</html>