<html>
<pre>
<code>

&lt;!DOCTYPE HTML&gt;
&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;Admin Tools&lt;/title&gt;
	&lt;link rel="stylesheet" type="text/css" href="app.css"&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;div class="center"&gt;
		&lt;h1&gt;Admin Tools&lt;/h1&gt;
&lt;?php
	function authenticate($your_password) {
		// TODO: Change this to a complicated password using alpha characters only. No dictionary words!
		$password = "campus";

		if (!is_string($your_password) || strlen($your_password) != strlen($password))
			return(0);

		$your_password = strtolower($your_password);

		for ($i = 0; $i &lt; strlen($password); $i++) {
			if($password[$i] != $your_password[$i])
				return(0);

			usleep(150000);
		}

		return(1);
	}

	$time1 = microtime(true);
	if (isset($_POST["your_password"]) && authenticate($_POST["your_password"])) { ?&gt;
		&lt;div class=\"flag\"&gt;Congratulations! The password you used to login is the flag.&lt;/div&gt;
&lt;?php } else { ?&gt;
		&lt;form action="index.php" method="post"&gt;
			&lt;input type="password" name=your_password maxlength="9"&gt;
			&lt;input type="submit" value="Authenticate"&gt;
		&lt;/form&gt;
&lt;?php }

	$time2 = microtime(true);
	$res = ceil(($time2-$time1) * 1000);
?&gt;
		&lt;br&gt;&lt;br&gt;
		&lt;font size=1&gt;&lt;b&gt;Page generated in &lt;?php print("$res ms."); ?&gt; &lt;/b&gt; &lt;a href=src.php&gt;debug&lt;/a&gt;&lt;/font&gt;
	&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

</code>
</pre>
</html>