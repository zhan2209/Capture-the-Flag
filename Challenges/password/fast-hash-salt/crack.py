import hashlib, sys

stolen_hashes = []
stolen_salts = []
with open('./attachments/stolen-passwords.txt') as f:
	for line in f:
		line = line.rstrip('\n').split(':')
		stolen_salts.append(line[0])
		stolen_hashes.append(line[1])

with open('./rockyou.txt', 'r') as f:
	for line in f:
		password = line.rstrip('\n')
		
		for salt in stolen_salts:
			h = hashlib.sha256()
			h.update(salt)
			h.update(password)
			hash = h.hexdigest()
		
			if hash in stolen_hashes:
				print 'Cracked password! ' + password
				sys.exit()