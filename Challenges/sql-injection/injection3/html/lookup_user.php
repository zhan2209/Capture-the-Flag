<?php
	include 'db.inc.php';
	include 'globals.php';
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";

	$id = mysqli_real_escape_string($connection, $_GET["id"]);

	$query = "SELECT * FROM ${table_prefix}users WHERE id=$id";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) !== 1) {
	  die("<p>Could not find user.</p><a href='.'>Go back</a>");
	}

	$row = mysqli_fetch_array($result);
	echo "<div class='info-cont'>";
	echo "<div class='infobox'>";
	echo "<div id='textline'><p class='left'>User info for id:</p><p class='right'>".htmlspecialchars($row['id'])."</p></div>";
	echo "<div id='textline'><p class='left'>Username:</p><p class='right'>".htmlspecialchars($row['username'])."</p></div>";
	echo "<div id='textline'><p class='left'>Email:</p><p class='right'>".htmlspecialchars($row['email'])."</p></div>";
	echo "<div id='textline'><p class='left'>Authrorization:</p><p class='right'>".htmlspecialchars($row['authorization'])."</p></div>";
	echo "<a id='back' class='link' href='.'>Go back</a>";
	echo "</div></div>";
?>