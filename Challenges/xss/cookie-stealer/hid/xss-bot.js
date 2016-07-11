var page = require('webpage').create();
var host = "10.11.10.11";
var path = "/xss/cookie-stealer/index.php"
var url = "http://"+host+path;
var timeout = 2000;

// This must match the cookie value in index.php.
var adminCookieValue = 'e80e0c8cc5d90593bfd980f64c85ca5a';

// This must match the cookie name in index.php.
var cookieName = "XSS_COOKIE_STEALER_SESSION_ID";

phantom.addCookie({
    'name': cookieName,
    'value': adminCookieValue,
    'domain': host,
    'path': path,
    'httponly': false
});

page.onNavigationRequested = function(url, type, willNavigate, main) {
    console.log("[URL] URL="+url);  
};

page.settings.resourceTimeout = timeout;
page.onResourceTimeout = function(e) {
    setTimeout(function(){
        console.log("[INFO] Timeout")
        phantom.exit();
    }, 1);
};

page.open(url, function(status) {
    console.log("[INFO] rendered page");
    setTimeout(function(){
        phantom.exit();
    }, 1);
});