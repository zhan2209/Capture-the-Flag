# Special char with XSS

## Description
	Inject script code into the input area.

## Hints
	For this website hints has the id=demo
	
		<h1 id="demo">Hints:</h1> 
		
	and check the ex1.js will find the flag will show at the same place:
	
		if (testForScript("flag", [siteName, siteURL], lastAlert)) {

                        $("#demo").removeClass("alert-info").addClass("alert-success");
                        $("#demo").text("You made it!")
						levelCompleted();
                    }

## Write up

	First this website allow user to add their favorite link. and only the legal name and URL could be added.
	
	there are two ways to solve this problem:
		 1st method:
			Make the function levelCompleted() work, such as change if(condition) to if(!condition) 
		 2nd method:
			1. check the html code, you will find for the site name and site URL are all patterned:
			
					<label>Site Name <input type="text" placeholder="Name of site" maxsize="10" class="form-control" pattern="[A-Za-z]+" required="" name="name"> </label>
				
			Delete the pattern format, then you can inject some script into the input area. but it still doesn't work. :(
			2. check the javascript code, you will find all the input script will be replaced:
			
					var siteName = $(".ex1 input[type='text']").val().trim().replace(/</g, "&lt;").replace(/>/g, "&gt;");
					var siteURL = $(".ex1 input[type='url']").val().trim().replace(/</g, "&lt;").replace(/>/g, "&gt;");
				
			then you can change the siteName to :
			
					var siteName = $(".ex1 input[type='text']").val().trim(); 
			
			then it won't replace anything of your input.
					
			3. check the js code, you will find that the defult input should be a script alert() with content "flag" then input :
						
					<script>alert("flag");</script>
				
				it will show the flag in the hints area. :)

## Flag
 
	The flag is untrust data xss