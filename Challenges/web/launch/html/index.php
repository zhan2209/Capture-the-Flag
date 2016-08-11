<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!isset($_SESSION['flag'])) {
		$_SESSION['flag'] = "flag{}";
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Command Center</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>

<center>
	<div class='container'>
		<h1 id='head'>Welcome Magistrate</h1>
		<p id='instr'>Enter your credentials to recieve the cancellation code.</p>
		<form name="password" method='post' onsubmit="return validate()">
			<input type="password" id="pass" name="passinp" placeholder="Password" maxlength=16 required>
			<input type="submit" id="sub" value="Login">
		</form>
		<?php
			if($_SESSION['flag'] != "flag{}") {
				echo "<p id='valid'>Password correct! Cancellation code: ".$_SESSION['flag']."</p>";
			} else {
				echo "<p id='valid'></p>";
			}
		?>
	</div>
</center>
</body>

<script>
function validate() {
	var pass = document.forms["password"]["passinp"].value;
	if (pass == "blacksheepwall") {
		window.open('getflag.php', '_self');
	} else {
		document.getElementById("valid").innerHTML = "Password incorrect";
	}
	return false;
}
</script>

</html>