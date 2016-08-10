<!doctype html>
<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!isset($_SESSION['num_guesses'])) {
		$_SESSION['num_guesses'] = 0;
	}
?>
<html>
<head>
<title>Guessing Game</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div id='sidebar'><?php if($_SESSION['num_guesses'] >= 4) echo "<p id='source'><span>Source</span></p>";?></div>
<div class='container'>
<h1>Let's Play a Guessing Game!</h1>
	<p id='desc'>Guess the password below.</p>
	<div id='form'>
	<form action='' method='GET'>
		<input type='text' name='attempt'>
		<input type='submit' value='Guess!'>
	</form>	
	</div>
	<?php
		$src = file_get_contents('source.txt');
		$file = '../hid/secret-password.txt';
		$guesses_file = "./guesses.json";
		$guesses_json = json_decode(file_get_contents($guesses_file), true);
		extract($_GET);
		if(isset($attempt)) {
			$password = trim(file_get_contents($file));
			if($attempt === $password) {
				echo "<p class='outcome'>How did you figure out the secret password?!</p>";
				$flag = trim(file_get_contents('../hid/flag.txt'));
				echo "<p class='outcome'>The flag is <b>$flag</b></p>";
			} else {
				if(trim($attempt)) {
					echo "<p class='outcome'><b>Nope!</b> The secret password is not $attempt...</p>";
					array_push($guesses_json["guesses"], trim($attempt));
					file_put_contents($guesses_file, json_encode($guesses_json, true));
					$_SESSION['num_guesses']++;
				} else {
					echo "<p class='outcome'>We don't want no empty strings</p>";
				}
			}
		}
	?>
<div id='prev-guesses'>
	<p>Total guesses: <?php echo $_SESSION['num_guesses']; ?> </p>
	<p>Last five guesses:</p>
	<?php
		$guess_arr = [];
		foreach($guesses_json["guesses"] as $index=>$guess) {
			array_push($guess_arr, $guess);
		}
		$i = 0;
		if(count($guess_arr) == 0) {
			echo '<div class="guess">
					<p>no guesses made yet</p>
				  </div>';
		} else {
			for($j = count($guess_arr); $i <= 5; $i++, $j--) {
				echo '
					<div class="guess">
						<p>'.$guess_arr["$j"].'</p>
					</div>
					';
			}
		}
	?>
</div>
<span id='hint'>HINT</span>
<?php if($_SESSION['num_guesses'] >= 5) {
echo "<span id='hinttext'>Use your keyboard to type your guess, then use your mouse to click the guess button.</span>";
echo "<div id='popup'>";
echo "	<xmp>";
echo $src;
echo "	</xmp>";
echo "</div>";
} else {
	echo "<span id='hinttext'>Available after 5 guesses.";
}
?>
</div>
<script>
$("#source span").hover(function() {
	$('#popup').css({'display' : 'inline-block'});
	}, function() {
	$('#popup').css({'display' : 'none'});
});
$(document).on('click', '#hint', function() {
	$('#hinttext').css({'display' : 'inline'});
});
</script>
</body>
</html>