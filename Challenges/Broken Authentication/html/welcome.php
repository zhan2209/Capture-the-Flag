<!doctype html>
<html style="background-color:powderblue;">
<link rel="stylesheet" type="text/css" href="style.css">
	<head>
    <title>Cherry Arden's personal site</title>
	</head>
	<body>
	
	<div style="text-align:center;">
		<h1>Welcome to Broken Authentication!</h1>
	</div>
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 64%;	
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: center;
				padding: 8px;
			}
			tr:nth-child(even) {
				background-color: #dddddd;
			}
		</style>
	
		<?php
			$cookie_name = "user";
			$cookie_value = "Sk9ITitET0U%3D";	//JOHN+DOE	
			$cookie_name2 = "welcome";
			$cookie_welcome_yes_value = "WUVT";// YES
			$cookie_value2 = "Tk8%3D"; // NO	
			$admin_cookie_value = "Q0hFUlJZK0FSREVO";
			
			if (isset($_COOKIE[$cookie_name])) {
				$cookie_value = $_COOKIE[$cookie_name];
				$cookie_value2 = $_COOKIE[$cookie_name2];
			} else {
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
				setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");
			}
		?>
		
		<?php
			if(!isset($_COOKIE[$cookie_name]) || $cookie_value != $admin_cookie_value ) //CHERRY+ARDEN
			{
				echo "<table align='center' class = 'table01'>
						  <tr style='background-color: #dddddd;'>
							<th>Name</th>
							<th>Age</th>
							<th>Nationality</th>
						  </tr>
						  <tr>
							<td>John Doe</td>
							<td>18</td>
							<td>Italy</td>
						  </tr>
					 </table>
					<div style='text-align:center;'>
						<h2>We do not want you around... </h2>
					</div>";
				echo "<div style='text-align:center;'>
						<p >
							It seems you are not the owner of current page. <br>
							Knowing what websites typically use to identify their users<br>
							- try to get rid of that ban.
						</p>
					</div>";
			} 
			else 
			{
				if($cookie_value == $admin_cookie_value && $cookie_value2 == $cookie_welcome_yes_value  )
				{
					
					echo "<table align='center' class = 'table01'>
						  <tr style='background-color: #dddddd;'>
							<th>Name</th>
							<th>Age</th>
							<th>Nationality</th>
						  </tr>
						  <tr>
							<td>Cherry Arden</td>
							<td>16</td>
							<td>US</td>
						  </tr>
						</table>";
					echo "<div style='text-align:center;'>
							<h3>
								The flag is broken authentication
							</h3>
						</div>";
				}
			}
		?>


	</body>
</html>