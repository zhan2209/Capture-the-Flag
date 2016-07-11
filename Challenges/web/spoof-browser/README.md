# Change Browser Challenge

## Description

Spoof your browser so that it says "HACKED" in the request. Once you do that, it will return the flag.

## Hint

Check out the User-Agent header.

## Write-Up

Use a proxy tool like Burp to intercept the request. Change the User-Agent header to "HACKED" and submit the request.
If it worked, the browser will display the flag on the page.