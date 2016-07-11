import hashlib, uuid, random

def generate_salt():
	ALPHABET = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
	chars=[]
	for i in range(16):
		chars.append(random.choice(ALPHABET))
	
	return "".join(chars)

print 'This will generate hashes that you can use to create the initial list of stolen passwords'

print '\nHashes of strong, randomly generated passwords:'
for x in range(0,50):
	password = str(uuid.uuid4())
	salt = generate_salt()
	h = hashlib.sha256()
	h.update(salt)
	h.update(password)
	print salt + ':' + h.hexdigest()

print '\nHash of the flag:'
password = "0916554994843125"
salt = generate_salt()
h = hashlib.sha256()
h.update(salt)
h.update(password)
print salt + ':' + h.hexdigest()