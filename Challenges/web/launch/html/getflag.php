<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$_SESSION['flag'] = "flag{never_know_what_hit_em}";
	header("Location: ./");
?>