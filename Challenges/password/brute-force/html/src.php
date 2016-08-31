<html>
<head>
	<title>Debug</title>
	<link rel="stylesheet" type="text/css" href="app.css">
</head>
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
		$password = ********************;

		if (!is_string($your_password) || strlen($your_password) != strlen($password))
			return(0);

		for ($i = 0; $i &lt; strlen($password); $i++) {
			if($password[$i] != $your_password[$i])
				return(0);

			usleep(150000);
		}

		return(1);
	}

	$time1 = microtime(true);

	if (isset($_POST["your_password"]) && authenticate($_POST["your_password"])) { 		?&gt;
		&lt;p&gt;Welcome back admin! We'll authenticate your session.&lt;/p&gt;
&lt;?php 		$_SESSION['is_admin'] = true;

	} else { 										?&gt;
		&lt;p&gt;Please identify yourself as the admin by entering your credentials below.&lt;/p&gt;
		
		&lt;form action="admin.php" method="post"&gt;
			&lt;input type="password" name=your_password maxlength="9"&gt;
			&lt;input type="submit" value="Authenticate"&gt;
		&lt;/form&gt;

&lt;?php 		if(!$_SESSION['first-attempt']) {
			echo "&lt;p&gt;That's not the password... Are you sure you're the admin?&lt;/p&gt;";
		}
		$_SESSION['first-attempt'] = false;
	}

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
<a href='admin.php' style='margin-left:15px'>Back</a>
</html>