import re
from collections import Counter

FILE = 'attachments/encrypted_song.txt'
code = {}

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
	

print("most common 1-letter tuples")
table(n_grams[0])
print("most common 2-letter tuples")
table(n_grams[1])
print("most common 3-letter tuples")
table(n_grams[2])
print("most common 4-letter tuples")
table(n_grams[3])
print("most common 5-letter tuples")
table(n_grams[4])
print("most common 1-letter words")
table(n_words[0])
print("most common 2-letter words")
table(n_words[1])
print("most common 3-letter words")
table(n_words[2])
print("most common 4-letter words")
table(n_words[3])
print("most common 5-letter words")
table(n_words[4])








	
	
	
	
	