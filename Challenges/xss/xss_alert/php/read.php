<html>
	<head>
	 <title>
		Congratulations!
	</title>
	</head>
<body style=" background-color: lightblue; ">

<?php
	session_start();
	//echo $_SESSION['open_cookie_value'];
	if (isset($_SESSION['cookie_name'])
		&& isset($_COOKIE[$_SESSION['cookie_name']]) 
		&& isset($_SESSION['open_cookie_value'])
		&& $_COOKIE[$_SESSION['cookie_name']] == $_SESSION['open_cookie_value'])
	{
		$filename = "../hid/flag.txt";
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		echo "
		<div>
			<h1 id='level-title'style='color:Red; text-align: center;' >
				Congratulations!
			</h1>
			<h3 style='text-align: center;' > $contents </h3>
		</div>
		";
		fclose($handle);
	}
	else{
		echo "
		<link type='text/css' rel='stylesheet' href='/static/game.css'>
		<script src='/static/game.js'></script>
		<h1 id='level-title'style='color:Red'>! T^T !  </h1>
		<h2>Oops! Something wrong heppened.</h2>
		<div id='instructions'>
		  Based on your browser it seems like you haven't passed the
		  the game. Please go back to the previous page
		  and complete the challenge. Or back later, try to refresh this page, it might work ;) Good Luck!<br><br>
		</div>
		";
	} 
?>
</body>
</html>
	
	