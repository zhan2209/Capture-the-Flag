
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
