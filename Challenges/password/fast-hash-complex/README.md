# Fast Hashes with Complex Passwords

## Description

After many hacked accounts, the webmasters realized they needed to enforce complex passwords to prevent dictionary attacks. 
They required everyone to update their passwords to include at least one number and one symbol. 
However, they never fixed the other vulnerability and the new hashes were leaked again! Can you crack any?

Download the stolen password hashes. Download the rockyou word list (http://downloads.skullsecurity.org/passwords/rockyou.txt.bz2). Crack the passwords. The cracked password will be the flag.

## Hint

What is a common way lots of people add numbers and symbols to make their passwords more complex?

## Write-Up

Perform another dictionary attack, but replace 'a' with '@' and 'l' with '1', and 'o' with '0'. See crack.py for an example.