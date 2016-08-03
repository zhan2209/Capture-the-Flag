<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>XSS game</title>
    <link type="text/css" rel="stylesheet" href="./xss_files/game.css"/>
    <script src="./xss_files/game.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script>
      window.onload = function() { setInputFieldReturnHandler(); }
    </script>
  </head>
<body style=" background-color: darkblue; ">
    <h1 id="level-title"> Persistence is key</h1>
    <div id="instructions">
		<h2>Mission Objective</h2>
		<p>
			Inject a script to pop up an <code>alert()</code> in the context of the application.  <br><br>
		<b>Note</b>
			: the application saves your posts so if you sneak in code to execute the alert, this level will be solved every time you reload it.<br>
			And please use my favourite browser Chrome, Thanks  =)
		</p>
		<h2>Your Target</h2>
		<div id="next-controls" >
			<a class="next-button" href="./php/read.php" onclick="ShowNext()" > Advance to flag </a>
		</div>
	</div>
	<div id="game-frame-container">
		<div id="topbar">
		</div>
		<iframe class="game-frame" src="./xss_files/frame.html">
		</iframe>
	</div>

	<h2> 
	  <a onclick="false"  style="display: none" >Show Hints</a>
	</h2>
	
	<div id="hints">
		<ol>
			<li style="display: none" data-hidden="true"><b>1.</b> 
			Entering a &lt;script&gt; tag on this level will not work.
				 Try an element with a JavaScript attribute instead.
			</li>
			
			<li style="display: none" data-hidden="true"><b>2.</b> 
			This level is sponsored by the letters <i>i</i>, <i>m</i> and 
				 <i>g</i> and try the Window Event Attributes..
			</li>
		</ol>
	</div>
</body>
</html>