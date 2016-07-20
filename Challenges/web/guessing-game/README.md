# Guessing Game

## Description

All you need to do is guess the correct password to get the flag! Should be easy, right?

Category: Easy

## Hint

Look at the source - how does PHP's extract() work?

## Flag

flag{untrusted_input}

## Write-Up

In this challenge, we use PHP's extract function to get the user's input. Extract takes input in 
the form of parameter/value pairs in the URL and turns them into variables in the current scope, while
also overwriting pre-existing parameter/value assignments.

$file is declared above extract in the source (which is available to the user), so entering

	?file=&attempt=
	
at the end of the URL will set both $file and $attempt to empty strings, satisfying the if statement
that allows access to the flag.