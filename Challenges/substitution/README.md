# Substitution

This challenge uses a classic cipher to encrypted the song 'Let It Go' from Disney's Frozen. The flag
is hidden within the lyrics.

## Write-Up

Substitution.py is one example of how this problem can be solved. It reads the .txt file and counts
letter frequency, as well as n-tuple frequencies. As you figure out letters, you can make the program
put them into the .txt file to make things more readable. You can figure out which letters should go
where by using a letter frequencies chart, such as the one at http://scottbryce.com/cryptograms/stats.htm