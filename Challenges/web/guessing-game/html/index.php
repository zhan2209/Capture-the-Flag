<!doctype html>
<html>
<head>
<title>Guessing Game</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div id='sidebar'><p id="source"><span>Source</span></p></div>
<div class='container'>
<h1>Let's Play a Guessing Game!</h1>
	<p id='desc'>Guess the password below. <span id='hint'>HINT</span>
	<span id='hinttext'>Use your keyboard to type your guess, then use your mouse to click the guess button.</span></p>
	<div id='form'>
	<form action='#' method='GET'>
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
				echo "<p class='outcome'><b>Nope!</b> The secret password is not $attempt...</p>";
				if($attempt) { array_push($guesses_json["guesses"], $attempt); }
				file_put_contents($guesses_file, json_encode($guesses_json, true));
			}
		}
	?>
<div id='prev-guesses'>
	<p>Previous guesses:</p>
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
<div id='popup'>
	<xmp>
	<?php echo $src; ?>
	</xmp>
</div>
</div>
<script>
$("#source span").hover(function() {
	$('#popup').css({'display' : 'inline-block'});
	}, function() {
	$('#popup').css({'display' : 'none'});
});
$(document).on('click', '#hint', function() {
	$('#hinttext').css({'color' : 'white'});
});
</script>
</body>
</html>