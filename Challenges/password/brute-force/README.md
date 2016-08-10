# Passsword Timing Attack

## Description

Flags-R-Us recently deployed their new website, where you can generate an endless supply of flags! However, they're keeping the admin's flag a secret. Find a way to sign in as the admin and get steal his special flag!

Difficulty: Hard

## Hint

How long does it take to validate a password?

## Write-Up

The bottom of the page says how long it takes to load the page. This can be used in a timing attack to get the password.
There is also a link at the bottom of the page the lets you see the source code. 
In the source code, we can see that it will validate the password character by character. If it finds a valid character, it sleeps for 0.15 seconds.
This allows us to write a script that can loop over every character and the one that takes the longest is likely to be the right one.

See password-timing.py for an example solution.

## Flag

flag{use_the_brute_Force_Luke}