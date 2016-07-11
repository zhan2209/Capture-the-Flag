<?php
	// This must match the cookie value in xss-bot.js.
	$admin_cookie_value = "e80e0c8cc5d90593bfd980f64c85ca5a";
	$flag = "flag{xss-challenge-accepted}";
	
	$comments_file_name = "./comments.json";
	$comments_json = json_decode(file_get_contents($comments_file_name), true);
	
	//TODO: Update to PHP 7 and use a session cookie with specific name and path.
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
<title>Lorem Ipsum Blog</title>
<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
<div class="center">
<?php if (isAdmin()): ?>
	<h1>Welcome Admin</h1>
	<div class="flag">Congratulations! The flag is <?= $flag ?>.</div>
<?php else: ?>
		<h1>Welcome Anonymous</h1>
<?php endif; ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae ligula metus. Integer pellentesque mauris eget tempor viverra. Ut mi nulla, molestie malesuada consequat porttitor, consectetur at diam. Nam condimentum justo vitae tristique rutrum. Nullam consequat lectus et nulla condimentum, vel sagittis sem molestie. Aenean viverra ex a metus sagittis bibendum. Phasellus vitae faucibus lacus. Sed interdum viverra arcu a pellentesque. Sed vehicula risus vitae metus varius ornare. Proin rhoncus nunc a ornare dignissim.</p>
<p>Nam ac imperdiet elit. Nam pretium felis semper consectetur condimentum. Sed interdum nisl non aliquet blandit. Donec tortor sapien, scelerisque sit amet est vitae, luctus sagittis massa. Ut nec consequat tellus, nec tempus ligula. Pellentesque fringilla ullamcorper fermentum. Etiam nec iaculis est. Duis fermentum imperdiet arcu, in faucibus odio ultricies nec.</p>

<h2>Comments</h2>

<form method="post" action="add-comment.php">
	<textarea name="comment" placeholder="Post a new comment" rows="4" cols="50"></textarea>
	<br/>
	<input type="submit" value="Post Comment"></input>
</form>

<?php
	foreach ($comments_json["comments"] as $index=>$comment) {
		echo '
			<div class="comment">
				<p>'.$comment.'</p>
				<form method="post" action="delete-comment.php">
					<input type="hidden" name="index" value="'.$index.'"></input>
					<input type="submit" value="Delete"></input>
				</form>
			</div>
			';
	}
?>
</div>
</body>
</html>