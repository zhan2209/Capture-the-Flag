<?php
if(!session_id()) session_start();
if($_SESSION['won']) {
	$flag_file = '/var/www/hid/web/lottery/flag.txt.gpg';
	header("Content-type: text/plain");
	header("Content-disposition: attachment; filename='flag.txt.gpg'");
	readfile($flag_file);
} else {
	$troll_file = '/var/www/hid/web/lottery/troll.txt';
	header("Content-type: text/plain");
	header("Content-disposition: attachment; filename='flag.txt'");
	readfile($troll_file);
}
?>