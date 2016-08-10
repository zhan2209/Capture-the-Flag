<?php

	$admin_cookie_value = "7468697369736e6f74666c6167";	//thisisnotflag
	
	$cookie_value = '44656c6963696f757320436f6f6b696573';//deliciouscookies
	$cookie_name = 'User';
	$Delicious_cookie_name = 'Delicious';
	$flag ='666c61677b64656c6963696f75735f636f6f6b69657d';//flag.....
	
	if (isset($_COOKIE[$cookie_name])) {
		$cookie_value = $_COOKIE[$cookie_name];
	} else {
		$cookie_value = $admin_cookie_value;
		setcookie($cookie_name, $cookie_value);
	}
	function isDelicious() {
		return $GLOBALS['cookie_value'] == $GLOBALS['Delicious_cookie_name'];
	}
?>

<!DOCTYPE html>
<html>
<body>

<?php if (isDelicious()): ?>
		<h1>Welcome Back!</h1>
		<div class="flag">Congratulations! <?= "<br><br>".hex2bin($flag) ?>.</div>
<?php else: ?>

<?php endif; ?>
		<body onload="checkCookie()">
		<h2>Cookie is always delicious, isn't it?</h2>
		<div>
			<img src="./images/cookie.jpg" alt="Cookie Monster" width="40%" height="700">
			<img src="./images/Monster.jpg" alt="Cookie Monster" width="40%" height="700">
		</div>
		<script src="./js/Questions.js"></script>
		<!-- <script src="backup.js"> -->
</body>
</html>