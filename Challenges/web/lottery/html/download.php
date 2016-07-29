<?php
if(!session_id()) session_start();
if($_SESSION['won']) {
	$flag_file = '/var/www/hid/web/lottery/flag.txt.asc';
	header("Content-type: text/plain");
	header("Content-disposition: attachment; filename='flag.txt.asc'");
	readfile($flag_file);
} else {
	$troll_file = '/var/www/hid/web/lottery/troll.txt';
	header("Content-type: text/plain");
	header("Content-disposition: attachment; filename='flag.txt'");
	readfile($troll_file);
}
?>