import hashlib, sys

stolen_hashes = []
with open('./attachments/stolen-passwords.txt') as f:
	stolen_hashes = f.read().splitlines()

with open('./rockyou.txt', 'r') as f:
	for line in f:
		password = line.rstrip('\n')
		
		password = password.replace('a', '@')
		password = password.replace('o', '0')
		password = password.replace('l', '1')
		
		h = hashlib.sha256()
		h.update(password)
		hash = h.hexdigest()
		
		if hash in stolen_hashes:
			print 'Cracked password! ' + password
			sys.exit()