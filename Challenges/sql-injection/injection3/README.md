# Injection 3

## Description

All user input is being escaped for this login form, so there's no way that you could inject anything malicious. If that's a problem, the admin's contact info is available - take it up with him!

Category: Difficult

## Hint

You'll need the name of the table that user information is stored in. There should be a SQL function that can help you create a string while getting past the mysqli_real_escape_string function.

## Flag

flag{w0w_$UcH_1nJ3c710N}

## Write-Up

This challenge contains a more difficult SQL injection vulnerability, where you must first find the name of the
table used to store user information, and then perform a similar query to Injection 2 to find the admin password,
and finally log in to find the flag.

Start by trying to get the table name out of information_schema.TABLES. Due to the mysqli_real_escape_string function 
used to escape the user's input, we can't just search for a table name using LIKE "%user"; what we can do is use SQL's
CONCAT function to get around the escape function. After some trial and error on the number of table columns, we can
get the table name by using this URL:

	{base_url}/lookup_user.php?id=1 AND 1=0 UNION SELECT TABLE_NAME AS id, TABLE_NAME AS username, TABLE_NAME as password, TABLE_NAME as email, TABLE_NAME as authorization FROM information_schema.TABLES WHERE TABLE_NAME LIKE CONCAT(CHAR(37), CHAR(117), CHAR(115), CHAR(101), CHAR(114), CHAR(115)) LIMIT 1

This returns 'ultra_secret_users' for all attributes - the name of the table we want to perform our query on. Similar to
Injection 2's query, we will need to return false rows to trick the query into returning real information:

	{base_url}/lookup_user.php?id=1 AND 0=1 UNION SELECT username, password as email, password as authorization, password as id, password as authorization from ultra_secret_users limit 1
	
This gives us the password for the admin user - login with the admin's credentials and the flag is revealed!