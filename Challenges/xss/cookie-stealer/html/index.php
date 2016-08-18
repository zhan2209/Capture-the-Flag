<?php
	// This must match the cookie value in xss-bot.js.
	$admin_cookie_value = "e80e0c8cc5d90593bfd980f64c85ca5a";
	$flag = "flag{xss-challenge-accepted}";
	
	$comments_file_name = "./comments.json";
	$comments_json = json_decode(file_get_contents($comments_file_name), true);
	
	// This cookie name must match the cookie name in xss-bot.js.
	$cookie_name = "XSS_COOKIE_STEALER_SESSION_ID";
	$cookie_value = "";
	
	if (isset($_COOKIE[$cookie_name])) {
		$cookie_value = $_COOKIE[$cookie_name];
	} else {
		$cookie_value = bin2hex(openssl_random_pseudo_bytes(16));
		setcookie($cookie_name, $cookie_value);
	}
	
	function isAdmin() {
		return $GLOBALS['cookie_value'] == $GLOBALS['admin_cookie_value'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Super Football Blog</title>
	<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
<div class="center">
	<div class='posted'>
		<?php if (isAdmin()): ?>
		<div class='trans-box'>
			<div class='header'>
				<h1><img src='madden.png'>Welcome Admin</h1>
			</div>
		</div>
		<div class="flag">Congratulations! The flag is <?= $flag ?>.</div>
		<?php else: ?>
		<div class='trans-box'>
			<div class='header'>
				<h1><img src='anon.png'>Welcome Anonymous</h1>
			</div>
		</div>
		<?php endif; ?>
		<div class='trans-box'>
			<div class='content'>
				<p>The 2016 NFL season, the 97th season in the history of the National Football League (NFL), is scheduled to begin on Thursday, September 8, 2016, with the annual kickoff game featuring the defending Super Bowl 50 champion Denver Broncos hosting the Carolina Panthers. The season will conclude with Super Bowl LI, the league's championship game, on Sunday, February 5, 2017, at NRG Stadium in Houston, Texas.</p>
				<p>For the first time since the Houston Oilers relocated to Tennessee in 1997, an NFL team relocated from one state to another, as the former St. Louis Rams moved out of St. Louis, Missouri and returned to Los Angeles, California, its home from 1946 to 1994.</p>
			</div>
		</div>
	</div>

	<div class='posting'>
		<div class='trans-box'>
			<h2>Leave a Comment</h2>
			<p id='disclaimer'>But please; nothing malicious!</p>
		</div>

		<div id='comment-box'>
			<form method="post" action="add-comment.php">
				<textarea name="comment" placeholder="Post a new comment" rows="4" cols="50"></textarea>
				<br/>
				<input id='btn' type="submit" value="Post Comment"></input>
			</form>
		</div>
	</div>

	<?php
	foreach ($comments_json["comments"] as $index=>$comment) {
		echo '
			<div class="comment">
				<p>'.$comment.'</p>
				<form method="post" action="delete-comment.php">
					<input type="hidden" name="index" value="'.$index.'"></input>
					<input id="btn" type="submit" value="Delete"></input>
				</form>
			</div>
			';
	}
?>
</div>
</body>
</html>