<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>XSS Hacking</title>
	<link rel="stylesheet" href="./doc/bootstrap.min.css">
	<script src="./doc/jquery.min.js"></script>
	<link rel="stylesheet" href="./doc/styles.css">
</head>

<body style ='background-color: powderblue;'>
	<div class="container" >
		<div class="col-md-6 col-md-offset-1">
        <h1 class="well text-center">Add your favorites link here</h1>
			<div class="jumbotron text-center">
				<form class="ex1">
					<!-- Lable for Site Name -->
					<label>Site Name <input type="text" placeholder="Name of site" maxsize="10" 
							class="form-control" pattern="[A-Za-z]+" required=""  name="name">
					</label>
					<!-- Lable for Site URL -->
					<label>Site URL <input class="form-control" placeholder="URL of site" 
							type="url" required="" maxsize="15" name="url">
					</label>
					<div class="text-center">
						<input type="submit" class="btn btn-md btn-primary" value="Add Link">
					</div>
				</form>
			</div>
		</div>
		<div class="ex1 links-place col-md-3">
			<h3 class="text-center">My Sites:</h3>
		</div>	
		<div class="col-md-8 col-md-offset-3 alert alert-info text-center">
			<h1 id="demo">Hints:</h1>
			<img src="img/test.png" class="ex1 links-place col-md-4">
			<h3>The flag is currently under construction. <br>
				It will be available in a few weeks. <br>
				See you soon!
			</h3>
		</div>	
	</div>
	<script src="./doc/ex1.js" type="text/javascript"></script>

</body>
</html>