# Fast Hashes

The webmasters learned that they need to salt their passwords to prevent rainbow table attacks.
They forced everyone to reset their passwords yet again so that they could be re-hashed with a salt.
They still haven't figured out how their password hashes are being leaked though, so shortly after the reset another dump was posted online.

Download the stolen password hashes. Download the rockyou word list (http://downloads.skullsecurity.org/passwords/rockyou.txt.bz2). Crack the passwords. The cracked password will be the flag.

## Hint
The hash was calculated using sha256(salt + password) and stored as salt:hash.

## Write-Up

Create a script to perform hashes of the entire word list, trying each salt from the stolen hashes. Once you find a match, you have the flag. See crack.py for an example solution.
