# Lottery

## Description

This lottery game has you guessing a number between 0 and 1000, so odds aren't exactly in your favor. Can you even them a bit and break the bank?

Category: Intermediate

## Hint

How are random numbers generally seeded?

## Flag

flag{w1NN3r_w1NN3r_ch1CK3n_d1NN3r}

## Write-Up

For this challenge, you'll want a program like Burp Suite to intercept requests.

You'll quickly realize that you'll quickly be out of money if you simply guess, so after searching
around a bit, you'll find two key things that will help: 1) There is a cookie called TIMESTAMP, and
2) it is created in a Javascript function when you click the 'guess' button. This means that the time
is taken BEFORE the PHP code loads, and you can therefore manipulate the data before it does it's job.

Realizing that random numbers are generally seeded with time, you can notice that changing the value of
TIMESTAMP effects the random value generated. After a few rounds of manipulating the seed, you'll make
the $500 necessary to win and recieve the flag.