# Description
You are provided the following encryption function: f(x)=17x+13[26]; First, you have to encrypt the word INFINITE_CAMPUS with this function.Then, your mission is to find the decryption function g.Finally, you have to decrypt the word HXAVONIFGNIPXA.

## Indications:

[26] means "modulo 26".
The decryption function will be of the following form: g(y)=ay+b[26], with a and b natural integers lower than 26, and y=f(x).
You will enter the flag lowercase on the form
(crypted word)_(decryption function)_(decrypted word).


## Example:
If the encryption of INFINITE_CAMPUS was AEXAEAJO_IUWLHK, that the function was g(y)=15y+3[26], and that the decryption of HXAVONIFGNIPXAL was SECUTRITYWORLD, then the flag would be: AEXAEAJO_IUWLHK_15y+3[26]_SECUTRITYWORLD


## write up
### Method 1

The encryption function is f(x)=(17x+13)mod 26,

y = (17x + 13 )mod 26   |  x = (17y +13 ) mod 26
----------------------- | ----------------------
y - 13 = 17x mod 26     |  x - 13 = 17y mod 26


then we need to solve : 17x = 1 mod 26 = 26*n + 1 

since 23 * 17 = 391 = 390 + 1 = 26 * 15 + 1, 

in this case, a = 23, 
the function gose this: x = (23y+b) mod 26, So b = 13

So the decryption function is:<b> g(y) = (23y + 13) mod 26</b>
 
So encryption the INFINITE_CAMPUS is :<u><b> TAUTATYD_VNJIPH </b></u>

and decryption the word HXAVONIFGNIPXAL is: <u><b>CONGRATULATION</u></b>



### Method 2
you can calculate each letter one by one, and get the corresponding encryption/decryption letter.

````
	A 0   <==>  13 N
	B 1   <==>  4  E
	C 2   <==>  21 V
	D 3   <==>  12 M
	E 4   <==>  3  D
	F 5   <==>  20 U
	G 6   <==>  11 L
	H 7   <==>  2  C
	I 8   <==>  19 T
	J 9   <==>  10 K
	K 10  <==>  1  B
	L 11  <==>  18 S
	M 12  <==>  9  J
	N 13  <==>  0  A
	O 14  <==>  17 R
	P 15  <==>  8  I
	Q 16  <==>  25 Z
	R 17  <==>  16 Q
	S 18  <==>  7  H
	T 19  <==>  24 Y
	U 20  <==>  15 P
	V 21  <==>  6  G
	W 22  <==>  23 X
	X 23  <==>  14 O
	Y 24  <==>  5  F
	Z 25  <==>  22 W
````

## The flag

 flag{TAUTATYD_VNJIPH_23y+13[26]_CONGRATULATION}
 
 
 