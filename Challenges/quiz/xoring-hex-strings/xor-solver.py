from binascii import a2b_hex

ctext = '9486b98aafa312b37889895ff5b5542aeecf9bfa'
key = 'ccc9ebe3c1c432da0ba9e73081951665bca6f59d'

def hexXOR(s1, s2):
	if len(s1) != len(s2):
		print "Strings must be of equal length"
		return
	
	# convert each of the hex strings to integer representation to use ^ (xor) operator
	b1 = int(s1, 16)
	b2 = int(s2, 16)
	return hex(b1 ^ b2).lstrip('0x').rstrip('L')
	
if __name__ == "__main__":
	hex_text = hexXOR(ctext, key)
	print a2b_hex(hex_text)