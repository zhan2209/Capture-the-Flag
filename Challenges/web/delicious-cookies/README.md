# Description

Such a cute cookie monster! It seems that he wants to tell you something, pay attentation and remember to format the flag as: flag{foo_foo}

## Hints:

Once you get the flag, please use the format "flag{ }" and please use underscore between words.


## Write up

Type your name, and refresh the pages, the welcome page will keep showing again and again.

Check the source cood, you will find a command javascript file, and try to use ..../js/backup.js to open the source code, 
````javascript

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
		if(user == "Cookies" && window.File && window.FileReader && window.FileList && window.Blob){
			alert("Congrts! You get the delicious hints: Cookie must be Delicious" );}
	else{
		alert("Welcome again " + user);}
	} else { user = prompt("Please enter your name:","");
	if (user != "" && user != null) 
	{setCookie("username", user, 30);}}
}

````
You will get the <b>hints</b>: cookie must be Delicious. Which indicate that you must change the cookie to delicious.

Back to your cookie change the cookie user to 'Delicious' and refresh the webpage
you will get the flag.

````
666c61677b64656c6963696f75735f636f6f6b69657d
````
Which is Hex code, then decode it you will get the ASCII text of the flag.


## The flag
flag{delicious_cookie}
