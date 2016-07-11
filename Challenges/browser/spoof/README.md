# Change Browser Challenge

To solve this challenge, you need to change your browser to "HACKED". Once you do that, you will see the flag on the page.

## Write-Up

Use a proxy tool like Burp to intercept the request. Change the User-Agent header to "HACKED" and submit the request.
If it worked, the browser will display the flag on the page.