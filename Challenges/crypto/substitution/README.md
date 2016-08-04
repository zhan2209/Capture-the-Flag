# Substitution

## Description

Putin has encrypted a file containing his favorite song, along with the flag! Can you crack it? Remember to format the flag as: flag{foo}

## Hint

 Hints link: https://en.wikipedia.org/wiki/Letter_frequency

 ## Flag

 flag{letitgo}

 ## Category

 Intermediate

## Write-Up

Substitution.py is one example of how this problem can be solved. It reads the .txt file and counts
letter and word frequency (using n_grams and n_words, respectively). Using a letter frequency chart, try to match
the most common letters in the cipher with the most common letters used in English. As you replace more
letters, it is easier to discover n-tuples in the cipher, allowing for larger replacements. Eventually,
you will be able to get all the letters replaced and decrypt the entire song.