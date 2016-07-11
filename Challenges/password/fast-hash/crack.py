import hashlib, sys

stolen_hashes = []
with open('./attachments/stolen-passwords.txt') as f:
	stolen_hashes = f.read().splitlines()

with open('./rockyou.txt', 'r') as f:
	for line in f:
		password = line.rstrip('\n')
		h = hashlib.sha256()
		h.update(password)
		hash = h.hexdigest()
		
		if hash in stolen_hashes:
			print 'Cracked password! ' + password
			sys.exit()