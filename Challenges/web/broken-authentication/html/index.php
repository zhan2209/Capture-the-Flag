<!doctype html>
<html style="background-color:powderblue;">
<link rel="stylesheet" type="text/css" href="style.css">
	<head>
    <title>Cherry Arden's Personal Site</title>
	</head>
	<body>
	
	<div style="text-align:center;">
		<h1>Welcome to My Website!</h1>
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
			$cookie_value = "81993dad8195b9a2ce4573c5cf9805a0";	// JOHN+DOE
			$cookie_name2 = "welcome";
			$cookie_welcome_yes_value = "7469a286259799e5b37e5db9296f00b3"; // YES
			$cookie_value2 = "c2f3f489a00553e7a01d369c103c7251"; // NO
			$admin_cookie_value = "f7d99f4b625cfe7538e196b11af8a4e5"; // CHERRY+ARDEN
			
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
							Because it seems you are not the owner of this page.<br>
							Can you change that?<br>
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
								Welcome back Cherry!
							</h3>
							<p>
								Here's your flag: flag{broken_authentication}
							</p>
						</div>";
				}
			}
		?>


	</body>
</html>