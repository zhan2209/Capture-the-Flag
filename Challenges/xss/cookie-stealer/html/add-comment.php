<?php
	$comments_file_name = "./comments.json";
	$comments_json = json_decode(file_get_contents($comments_file_name), true);
	$comment = $_POST["comment"];
	
	if ($comment) {
		array_push($comments_json["comments"], $comment);
	}
	
	file_put_contents($comments_file_name, json_encode($comments_json, true));
	
	header("Location: ./");
?>