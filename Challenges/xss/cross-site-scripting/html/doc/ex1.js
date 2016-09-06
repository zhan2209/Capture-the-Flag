
$(function() {
    var Exercises = {
        ex1: {
            initialize: function() {
                
                var nativeAlert = window.alert;
                var lastAlert = null;
                window.alert = function(msg) {
                    nativeAlert(msg);
                    lastAlert = msg;
                }
                $("form.ex1").submit(function(evt) {
                    evt.preventDefault();
                    var siteName = $(".ex1 input[type='text']").val().trim().replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    var siteURL = $(".ex1 input[type='url']").val().trim().replace(/</g, "&lt;").replace(/>/g, "&gt;");

                    $("<p class='lead'><span class='label label-success'>" 
						+ siteName 
						+ "</span>" 
						+ siteURL 
						+ "</p>").appendTo(".ex1.links-place");
						
                    if (testForScript("flag", [siteName, siteURL], lastAlert)) {

                        $("#demo").removeClass("alert-info").addClass("alert-success");
						c();
                    }
                })
            }
        }
    }
    Exercises.ex1.initialize();
})
//start it
function spitRegex(text) {
    return  new RegExp("<script>\\s*alert\\(['\"]{1}" + text + "['\"]{1}\\);*\\s*<\\/script>", "g");
}
function testForScript(patternText, variablesToCheck, lastAlert) {
    var regex = spitRegex(patternText);
    for (var i = 0; i < variablesToCheck.length; i++) {
        if (regex.test(variablesToCheck[i])) {
            if (lastAlert === patternText) {
                return true;
            }
        }
    }
    return false;
}
