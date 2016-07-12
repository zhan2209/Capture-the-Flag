# Fast Hashes

## Description

The webmasters knew it was not safe to store passwords in plaintext. So they hashed them. 
Unfortunetly, they had another vulnerability that resulted in their password hashes getting leaked and posted online. 
We grabbed a copy for you to analyze. Are they safe?

Download the stolen password hashes. Download the rockyou word list (http://downloads.skullsecurity.org/passwords/rockyou.txt.bz2). Crack the passwords. The cracked password will be the flag.

## Hint

The passwords were hashed using SHA-256.

## Write-Up

Create a script to perform hashes of the entire word list. Once you find a match, you have the flag. See crack.py for an example solution.

You can also use hashcat to solve this.

    hashcat -m 1400 ./stolen-passwords.txt ./rockyou.txt