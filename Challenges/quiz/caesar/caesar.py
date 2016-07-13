STRING = "igkygxtkbkxigxkjsainluxygrgj"

def main():

	count = 0
	flag = ''
	
	for i in range(1, 26):
		str = increment_ascii(STRING, i)
		print(str)		
		
def increment_ascii(str, i):
	ret = list()
	for char in str:
		if ord(char) == 32:
			c = ''
		elif ord(char) + i > 122: # letters 'wrap around'
			c = chr(ord(char) + i - 26)
		else:
			c = chr(ord(char) + i)
		ret.append(c)
	return ''.join(ret).strip()
	
main()