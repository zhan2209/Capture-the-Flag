# Broken Authentication Challenge

## Description

This is a cookie attack. Find and change the cookies vulnerability to set the admin's session ID.
Once you have their session ID and visit permit, log in as admin and capture the flag. Remember to format the flag as: flag{foo_foo}

## Hints:

Once you get the flag, please use the format "flag{ }" and please use underscore between words.

## Write-Up

The index page shows your user name is John Doe and the info of you. But the page name is Cherry Arden's site, 
so you are not the owner of the current page, in ture, the owner should be Cherry Arden.
Also, the welcome cookie value is 'no', which means you are not welcome to visit this page. 
	
You will need to change the user to Cherry Arden and the welcome value to yes, then you can visit this page.

## The flag

Flag{broken_authentication}