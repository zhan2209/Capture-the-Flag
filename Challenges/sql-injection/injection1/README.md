# Injection 1

## Description

Good Wood(TM) had to add a login feature to their site due to high demand for their exceptional product; your goal is to find a way around it.

Category: Easy

## Hint

Try logging in as 'admin'

## Flag

flag{sql_injection_is_craazzyyyy}

## Write-Up

This is a classic SQL injection example - solvable with a closing quote and comment:

	admin'#