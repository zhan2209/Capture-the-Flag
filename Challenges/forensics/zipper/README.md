# Description

Someone hide a very important info in the .png file. Can you figure out what's that?  Remember to format the flag as: flag{foo_foo}

## Hints:

Once you get the flag, please use the format "flag{ }" and please use underscore between words.


## Write up

1st: this file is not a .png file, it's .zip file use hex file reader find the file signature is :
````
	37 7A BC AF 
````
2nd: then you can change the expand name to .7z (check the [on file signature](http://www.garykessler.net/library/file_sigs.html)) and unzip this file you will get two picture files:

		 --password.jpg 
   		 --zipfile.jpg

3rd: Use hex reader to open the zipfile.jpg file, you will find the flag at the end of hex file.


## The flag

flag {Zip_is_a_good_tool}
