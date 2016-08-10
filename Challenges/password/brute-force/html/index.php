<!DOCTYPE HTML>
<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['is_admin'])) {
	$_SESSION['is_admin'] = false;
}
if($_SESSION['is_admin']) {
	$flag = 'flag{use_the_brute_Force_Luke}';
} else {
	$flag = 'flag{yourenoadminofmine}';
}
$_SESSION['first-attempt'] = true;
?>
<html>
<head>
	<title>Admin Tools</title>
	<link rel="stylesheet" type="text/css" href="app.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class='container'>

<header>
	<h1>Flags-R-Us</h1>
</header>

<nav>
	<ul>
		<li><a href='#' onclick=aboutFlags()>About Flags</a></li>
		<li><a href='#' onclick=getFlag()>Get a Flag</a></li>
		<li><a href='#' onclick=adminFlag()>Admin's Flag</a></li>
		<li><a href='admin.php'>Admin Tools</a></li>
	</ul>
</nav>

<article>
	<h1 id='head'>About Flags</h1>
	<p id='content1'>
		Flags are used as a means to verify the completion of CTF challenges. They are generally in a prespecified
		format, such as flag{foobar}, and must be difficult to guess. Only those who have solved a challenge should
		have access to a flag.
	</p>
	<p id='content2'>
		You may be thinking, &quot;Surely there's a flag for me on this site somewhere.&quot; And there is! Click 
		the 'Get a Flag' link to the left for your own personalized flag. Don't bother with the 'Admin's Flag' link though; 
		there's no way we're sharing that with the likes of you.
	</p>

</article>

<footer>COPYRIGHT &#169; 2016 FLAGS-R-US</footer>

</div>
</body>

<script>
function aboutFlags() {
	document.getElementById('head').innerHTML = "About Flags";
	document.getElementById('content1').innerHTML = "Flags are used as a means to verify the completion of CTF challenges. They are generally in a prespecified format, such as flag{foobar}, and must be difficult to guess. Only those who have solved a challenge should have access to a flag.";
	document.getElementById('content2').innerHTML = "You may be thinking, &quot;Surely there's a flag for me on this site somewhere.&quot; And there is! Click the 'Get a Flag' link to the left for your own personalized flag. Don't bother with the 'Admin's Flag' link though; there's no way we're sharing that with the likes of you.";
}
function getFlag() {
	var requestUrl = "http://randomword.setgetgo.com/get.php";

	$.ajax({
		type: "GET",
		url: requestUrl,
		dataType: "jsonp",
		jsonpCallback: 'getFlagComplete'
    });
}
function getFlagComplete(data) {
	var flag = "flag{" + data.Word + "}";
	document.getElementById('head').innerHTML = "Get a Flag";
	document.getElementById('content1').innerHTML = "We generate our flags using the finest random dictionary words. Never again worry about duplicate flags! NOTE: Each flag you generate will automatically charge your credit card for $9.99; a fair price for such high-quality flags!";
	document.getElementById('content2').innerHTML = "Your flag is " + flag;
}
function adminFlag() {
	var flag = <?php echo json_encode($flag); ?>;
	document.getElementById('head').innerHTML = "Admin's Flag";
	document.getElementById('content1').innerHTML = "If you are the admin, the flag displayed below will be correct. To prove you are the admin, you must sign in using the 'Admin Tools' link to the left. Timing is everything.";
	document.getElementById('content2').innerHTML = "The admin's flag is " + flag;
}
</script>
</html>