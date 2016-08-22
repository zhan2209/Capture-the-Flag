<!DOCTYPE HTML>
<html>
<head>
	<title>Browser Challenge</title>
<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
	<div class="center">
<?php if($_SERVER['HTTP_USER_AGENT'] == "HACKED"): ?>
		<div class="flag">Congratulations. The flag is flag{i-control-my-browser}.</div>
<?php else: ?>
		<p style="font-size:50px">Change your browser to: <strong>HACKED</strong></p>
		<p class="hint" style="display:none"><span style="color:black">Hint: your browser is </span><strong><?= $_SERVER['HTTP_USER_AGENT'] ?></strong></p>
<?php endif; ?>
	</div>
</body>
</html>