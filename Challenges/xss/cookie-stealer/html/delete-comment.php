<?php
	$comments_file_name = "./comments.json";
	$comments_json = json_decode(file_get_contents($comments_file_name), true);
	$index = $_POST["index"];
	
	if ($index >= 0 && $index < count($comments_json["comments"])) {
		array_splice($comments_json["comments"], $index, 1);
	}
	
	file_put_contents($comments_file_name, json_encode($comments_json, true));
	
	header("Location: ./");
?>