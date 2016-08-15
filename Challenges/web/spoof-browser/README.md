# Change Browser Challenge

## Description

Spoof your browser so that it says "HACKED" in the request. Once you do that, it will return the flag.

Category: Easy

## Hint

Check out the User-Agent header.

## Flag

flag{i-control-my-browser}

## Write-Up

Use a proxy tool like Burp to intercept the request. Change the User-Agent header to "HACKED" and submit the request.
If it worked, the browser will display the flag on the page.

ALTERNATE METHOD: This can be solved without downloading any additional tools. Using Firefox's dev tools, go to the network
tab and select the spoof-browser row. In the response information column, click edit and resend, then change the
User-Agent to 'HACKED'. Hit send, then look at the response tab (the actual response will not be reflected on the
page); there will be a congratulations message along with the flag.