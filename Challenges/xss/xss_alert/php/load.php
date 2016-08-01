<?php
// page1.php
	if( isset($_POST['action']) 
		&& $_POST['action'] == 'call_this') {
	
	session_start();
	
	$_SESSION['cookie_name'] = 'CTF_XSS';
	$_SESSION['cookie_value'] = ' ';
	
	$_SESSION['open_cookie_value'] = 'e80e0c8cc5d90593bhjui0f64c85ca5a';
	
	if (isset($_COOKIE[$_SESSION['cookie_name']])) {
		$_SESSION['cookie_value'] = $_COOKIE[$_SESSION['cookie_name']];
	} else {
		$_SESSION['cookie_value'] = $_SESSION['open_cookie_value'];
		setcookie($_SESSION['cookie_name'], $_SESSION['cookie_value']);
	}
	echo $_SESSION['cookie_name'].'<br>'.$_SESSION['cookie_value'];
	}
?>