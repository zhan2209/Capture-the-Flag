# Injection 1

Description: Login to get the flag! But not as just any user; you'll need max authorization. I wonder which users get that level of clearance...
Hint: Try logging in as 'admin'
Flag: flag{sql_injection_is_craazzyyyy}
Category: Easy

## Write-Up

This is a classic SQL injection example - solvable with a closing quote and comment:

	admin'#