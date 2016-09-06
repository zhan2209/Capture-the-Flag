<html>
	<head>
	 <title>
		Congratulations!
	</title>
	</head>
<body style=" background-color: lightblue; ">

<?php
	session_start();

	if (isset($_SESSION['cookie_name'])
		&& isset($_COOKIE[$_SESSION['cookie_name']]) 
		&& isset($_SESSION['open_cookie_value'])
		&& $_COOKIE[$_SESSION['cookie_name']] == $_SESSION['open_cookie_value'])
	{
		$contents = "flag{frame_media_onerror_events}";
		echo "
		<div>
			<h1 id='level-title'style='color:Red; text-align: center;' >
				Congratulations!
			</h1>
			<h3 style='text-align: center;' > $contents </h3>
		</div>
		";
	}
	else{
		echo "
		<link type='text/css' rel='stylesheet' href='/static/game.css'>
		<script src='/static/game.js'></script>
		<h1 id='level-title'style='color:Red'>! T^T !  </h1>
		<h2>Oops! Something went wrong.</h2>
		<div id='instructions'>
		  Based on your browser it seems like you haven't passed the
		  the challenge. Please go back to the <a href='..'>previous page</a>
		  and complete the challenge. Good Luck!<br><br>
		</div>
		";
	} 
?>
</body>
</html>
	
	