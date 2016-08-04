# Basic Authentication

## Description

The top secret organization protected their pages with a password.
While we were on their network we monitored the traffic and noticed they didn't always use TLS. This allowed us to see the requests listed below.
Find the admin's password. It is the flag.


	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic amFzb24uYm91cm5lOmlkZW50aXR5MTk4MA==
	
	
	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic YWdlbnQ6Ym9uZDAwNw==
	
	
	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic YWRtaW46VWNAbid0Q3JhY2tUaGlzIUN1ekl0J3NTdXBlckxvb29uZyE=

## Write-Up

The username and password are base64-encoded in each request. Decode the values and submit the admin's password.

## Flag

flag{Uc@n'tCrackThis!CuzIt'sSuperLooong!}