import hashlib, uuid

print 'This will generate hashes that you can use to create the initial list of stolen passwords'

print '\nHashes of strong, randomly generated passwords:'
for x in range(0,50):
	password = str(uuid.uuid4())
	h = hashlib.sha256()
	h.update(password)
	print h.hexdigest()

print '\nHash of the flag:'
password = "mrb00mb@stic"
h = hashlib.sha256()
h.update(password)
print h.hexdigest()