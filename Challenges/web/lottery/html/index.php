<?php
	if(!session_id()) session_start();
	if(!isset($_SESSION['wallet'])) {
		$_SESSION['wallet'] = 50;
	}
	if(!isset($_SESSION['won'])) {
		$_SESSION['won'] = false;
	}
	/* just in case you run out... */
	$_SESSION['reset-chips'] = $_POST['reset-chips'];
	if($_SESSION['reset-chips'] == 1) {
		$_SESSION['wallet'] = 50;
	}

	$seed = $_COOKIE['TIMESTAMP'];
	srand($seed);
	$randval = rand(0, 1000);
	
	if($_POST) {
		$valid = true;
		echo "<div class='output'>";
		if($_POST['bet'] > $_SESSION['wallet']) {
			$valid = false;
			$message = "<p>You don't have enough money to make that bet!</p>";
		} else if($_POST['bet'] < 0) {
			$valid = false;
			$message = "<p>Did you really think I'd let you get away with that?</p>";
		} else if($_POST['guess'] < 0 || $_POST['guess'] > 1000) {
			$valid = false;
			$message = "<p>Your guess must be between 0 and 1000.</p>";			
		} else if($_POST['bet'] == '') {
			$valid = false;
			$message = "<p>You think this is a charity? Make a bet!</p>";
		} else if($_POST['guess'] == '') {
			$valid = false;
			$message = "<p>You'll need to make a guess. Not that it'll be right...</p>";
		} else if(!ctype_digit($_POST['guess'])) {
			$valid = false;
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
			$_SESSION['won'] = true;
			$message = "<p>You probably just got lucky... Click <a href='./download.php' download>here</a> for the flag.</p>";
		} else {
			$_SESSION['won'] = false;
		}
		echo "</div>";
	}
?>
<html>
<head><title>Lottery</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<h1>Welcome to Guess-a-Number!</h1>
<div class='center'>
	
	<h3>Earn over $500 to win a very special prize!</h3>
	<p id='wallet'>Wallet: $<?php echo $_SESSION['wallet']; ?></p>
	<form method='post' onsubmit="timer()">
		<div class='guess-line'>
			<label for='guess'>Guess a number between 0-1000:</label>
			<input type='text' id='guess' name='guess' autofocus='autofocus'>
			<input type='submit' id='submit-guess' value='Submit Guess'>
		</div>
		<div class='bet-btns'>
			<input type='radio' name='bet' value='5'><label for='bet'>$5</label>
			<input type='radio' name='bet' value='20'><label for='bet'>$20</label>
			<input type='radio' name='bet' value='50'><label for='bet'>$50</label>
			<input type='radio' name='bet' value='100'><label for='bet'>$100</label>
			<input type='radio' name='bet' value='250'><label for='bet'>$250</label>
		</div><br>
		<?php 	if($_POST['guess'] != '' && $valid) echo "<p>You guessed: ".$_POST['guess']." | Correct value: ".$randval."</p>";
				if(isset($message)) echo $message; ?>
		<!-- for testing only! malicious users get outta here -->
		<input type="hidden" name="reset-chips" value="0">
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