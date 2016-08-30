# Description

It seems that this image is damaged, Could you repire it? Remember to format the flag as: flag{foo_foo}


## Write up
Download the picture, and it can't open with the photo viewer, and check this file use cmd/terminal shows that this is not a .png file.

Open this file use some other source code editor such as NotePad++, it will show :
````
Ik9jZG4geXRkaWIgZG4gd2ptZGliLiINCiAtTWR4Y3ZteSBBenRpaHZpDQphZ3Zie2F2aGpwbl9ndm5vX3JqbXlufQ==
````
and abviously it is base64 encoded. Decode it we will get 
````
Ocdn ytdib dn wjmdib --Mdxcvmy Aztihvi --  Agvb { avhjpn gvno rjmyn}.
````
which we can see the flag format, and use ROT-x to get the correct words:

````
This dying is boring --Richard Feynman -- Flag { famous last words}.
````
and here is the flag =) 



## The flag

flag{famous_last_words}.
