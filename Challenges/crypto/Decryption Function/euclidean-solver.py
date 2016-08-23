"""		FILE:	euclidean-solver.py

	This program solves the Euclidean algorithm of form:
		
		ax - qm = 1 for x
		
	where a and m are known, x is the modular multiplicative
	inverse of a, and q is a disposible integer multiple
"""

import sys

a = 17
m = 26

for x in range (1, m):
	for q in range (1, m):
		if a*x - q*m == 1 :
			print 'Solution:'
			print 'a = ' + str(a) + ', x = ' + str(x)
			print 'q = ' + str(q) + ', m = ' + str(m)
			sys.exit()
# else
print 'No solution found'