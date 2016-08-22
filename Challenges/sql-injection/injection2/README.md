# Injection 2

## Description

Only those with a high level of authorization are able to log in and get the flag off of this PC! Will you be one of them?

Category: Intermediate

## Hint

Maybe there's a way to add fake rows to the result of a query...

## Flag

flag{0k4y_N0t_tH47_cR@zY}

## Write-Up

This challenge contains a more difficult SQL injection vulnerability, where you must format your attack to
make the table return a fake row containing fake information.

As seen in the code, user and password are check separately, meaning we can't just comment out the password check.
We can turn debug mode on using Chrome's dev tools, which allows us to see the query we make.

The first step to constructing our query is to invalidate the first half, since we'll be passing in fake data and
don't want to check the username. This can be done like so:

	foo' and 1=0; #

The second step is to provide the fake data. This can be done using a union all statement:

	foo' and 1=0 union all select 'admin' as username, 'pass' as password, '9' as authorization; #

and then passing 'pass' as the password. However, this will return an incorrect number of columns, so we need to
add a dummy attribute:

	foo' and 1=0 union all select null, 'admin' as username, 'pass' as password, '9' as authorization;#

Finally, we'll need to reduce the number of rows returned by our query to one, or else our login will fail (code
checks number of user's passed in):

	foo' and 1=0 union all select null, 'admin' as username, 'pass' as password, '9' as authorization limit 1;#