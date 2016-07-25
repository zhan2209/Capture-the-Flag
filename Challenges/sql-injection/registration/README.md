# Registration

## Description

Okay, I finally added escaping to all the login input. There's no way anybody could get into my site without proper
credentials now!

Category: Hard

## Hint

There seems to be a registration feature now... maybe you could guess what a password is LIKE?

## Flag

flag{r3G1$tR@ti0N_1Nj3ct10N}

## Write-Up

To get around the sql-escape string function used on the login forms, you'll need to do some sort of injection on the
registration. From the other challenges, you've probably gathered that you want to login as admin (although any user
will do for this challenge). Entering an unused name will result in a page saying that the username is available, but
registration is closed. However, if you enter a name already used (say, admin), then you'll get a message saying that
username is taken (rather than closed registration).

Knowing this, you can begin to probe the admin user for a password by using the LIKE sql command, i.e.

	admin' AND password LIKE "a%" #
	
This will check if the admin's password starts with the letter a. If it does not, then the 'registration closed' page
will come up. However, if it does, then it will return a row from the query and the 'username taken' page will appear
instead. Continuing with this process will eventually yield the answer.