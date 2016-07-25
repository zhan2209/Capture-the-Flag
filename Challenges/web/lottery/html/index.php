<?php
	if(!session_id()) session_start();
	if(!isset($_SESSION['wallet'])) {
		$_SESSION['wallet'] = 50;
	}

	$file_dir = '/var/www/hid/web/lottery/';
	$file_name = 'flag.txt.asc';
	$flag_file = $file_dir.$file_name;

	$seed = $_COOKIE['TIMESTAMP'];
	srand($seed);
	$randval = rand(0, 1000);
	
	if($_POST) {
		echo "<div class='output'>";
		if($_POST['bet'] > $_SESSION['wallet']) {
			$message = "<p>You don't have enough money to make that bet!</p>";
		} else if($_POST['guess'] < 0 || $_POST['guess'] > 1000) {
			$message = "<p>Your guess must be between 0 and 1000.</p>";			
		} else if($_POST['bet'] == '') {
			$message = "<p>You think this is a charity? Make a bet!</p>";
		} else if($_POST['guess'] == '') {
			$message = "<p>You'll need to make a guess. Not that it'll be right...</p>";
		} else if(!ctype_digit($_POST['guess'])) {
			$message = "<p>Hey wise guy, integers only.</p>";
		} else {
			if($_POST['guess'] == $randval) {
				$message = "<p>Good job I guess... Here's $".$_POST['bet']."</p>";
				$_SESSION['wallet'] += $_POST['bet'];
			} else {
				$message = "<p>HA! I knew you wouldn't get it. I'm taking $".$_POST['bet']."</p>";
				$_SESSION['wallet'] -= $_POST['bet'];
			}
		}
		if($_SESSION['wallet'] >= 500) { // overwrite message if they win
			$message = "<p>You probably just got lucky... Click <a href='./$flag_file' download>here</a> for the flag.</p>";
		} 
		echo "</div>";
	}
?>
<html>
<head><title>Lottery</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<div class='center'>
	
	<h3>Earn more than $500 and get a very special prize!</h3>
	<p>Wallet: $<?php echo $_SESSION['wallet']; ?></p>
	<form method='post' onsubmit="timer()">
		<label for='guess'>Guess a number between 0-1000:</label>
		<input type='text' id='guess' name='guess'>
		<input type='submit' id='submit-guess' value='Submit Guess'>
		<div class='bet-btns'>
			<input type='radio' name='bet' value='5'> $5
			<input type='radio' name='bet' value='20'> $20
			<input type='radio' name='bet' value='100'> $100
		</div><br>
		<?php 	if($_POST['guess'] != '') echo "<p>You guessed: ".$_POST['guess']." | Correct value: ".$randval."</p>";
				if(isset($message)) echo $message; ?>
	</form>
</div>
</body>
<script>
function timer() {
	var cname = "TIMESTAMP";
	var d = new Date();
	var time = d.getTime();
	document.cookie = cname + "=" + time;
}
</script>
</html>