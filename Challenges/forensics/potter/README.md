# Description

Congratulations! you get the offer of a magic school! try to find the "permission number"(flag) to get points!  Remember to format the flag as: flag{foo_foo}

## Hints:

Once you get the flag, please use the format "flag{ }" and please use underscore between words.


## Write up

check the hex code of pdf file, will find the flag at the end of file
````
" 74 68 65 20 66 6c 61 67 20 69 73 20 48 61 72 72 79 20 50 6f 74 74 65 72" or for hints : dGhlIGZsYWcgaXMgSGFycnkgUG90dGVy
````
 the first part is the Hex code for the magic message, and the second part is the hints in base64 for the magic message. 
 
 decode either part you will get the flag.



## The flag
flag{Harry_Potter}
