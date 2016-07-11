import re
from collections import Counter

FILE = 'lyrics.txt'
code = {'a':'R', 'b':'X', 'c':'T', 'd':'F', 'e':'P', 'f':'V', 'g':'L', 'h':'O',
		'i':'K', 'j':'U', 'k':'B', 'l':'M', 'm':'C', 'n':'A', 'o':'Y', 'p':'J',
		'q':'Z', 'r':'W', 's':'E', 't':'S', 'u':'H', 'v':'N', 'w':'I', 'x':'D',
		'y':'Q', 'z':'G'}

def decrypt(word):
	decoded = ''
	for letter in word:
		try:
			decoded += code[letter]
		except KeyError:
			decoded += letter
	return decoded
	
def table(counter, n=10):
	total = sum(counter.values())
	for word, freq in counter.most_common(n):
		print '{0: <10.1f}{1}'.format(float(freq) / total * 100, decrypt(word))

def get_ctext(filename):
	data = ""
	with open(filename, 'r') as f:
		data = f.read()
	return data

ctext = get_ctext(FILE)
#print(ctext)
ctext_words = filter(bool, re.split('\s', ctext))
max_gram = 15 # no more than 15 letters per word
n_grams = []
n_words = []

for i in range(1, max_gram + 1):
	a = Counter()
	for j in range(len(ctext) - i):
		gram = ctext[j:j + i]
		if ' ' in gram or '\n' in gram:
			continue # skip grams seperated by space
		a[gram] += 1
	n_grams.append(a)

	b = Counter()
	for word in ctext_words:
		if len(word) != i:
			continue
		b[word] += 1
	n_words.append(b)
	
starting_letters = Counter()
ending_letters = Counter()
for word in ctext_words:
	starting_letters[word[0]] += 1
	ending_letters[word[-1]] += 1

print(decrypt(ctext))
	
'''
print("three letter words")
table(n_words[2])
print("four letter words")
table(n_words[3])
print("five letter words")
table(n_words[4])
print("six letter words")
table(n_words[5])
print("seven letter words")
table(n_words[6])
print("eight letter words")
table(n_words[7])
'''

	
	
	
	
	
	
	
	
	
	