# Description

This page looks like lack of something... Remember to format the flag as: flag{foo_foo}

## Hints:

Once you get the flag, please use the format "flag{ }" and please use underscore between words.


## Write up

Roll down the html code you will find the script, and for the flag it shows:
````
	text = f2QbdAE0LJC1epQ0dZ9xLJoxLHkXWXz=
````
text code is looks like base64 but it can not convert to text, so it is not simply base64 code, then you need to figure out a method to decode the text code.

ROT-x will get:
````
	c2NyaXB0IGZ1bmN0aW9uIGluIEhUTUw=
````
CONVERT TO ASCII:

````
	script function in HTML
````

## The flag
flag{script_function_in_HTML}
