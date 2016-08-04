# Caesar's Final Words

Description: Many people believe "Et tu, Brute?" to be Julius Caesar's final words; those people are wrong. Caesar actually muttered a cipher with his final breathe. Can you figure out what his intended last words were? cipher: igkygxtkbkxigxkjsainluxygrgj
Hint: Isn't there a cipher named after Caesar?
Flag: caesarnevercaredmuchforsalad

## Write-Up

This is a simple caesar cipher. Using a short script like caesar.py, you can rotate each
letter in the cipher by n letters (wrapping from z back to a), and take a look at the 26
strings that result. It should be obvious (in the context of the challenge) which line is
the flag, because it is the only one with several English words.

## Flag

flag{caesarnevercaredmuchforsalad}