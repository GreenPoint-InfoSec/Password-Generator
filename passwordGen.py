import sys
import random

length = int(sys.argv[1])
amount = int(sys.argv[2])

lower = sys.argv[3] != "0"
upper = sys.argv[4] != "0"
nums = sys.argv[5] != "0"
chars = sys.argv[6] != "0"

lowercase = "abcdefghijklmnopqrstuvwxyz"
uppercase = lowercase.upper()
digits = "0123456789"
characters = "!£\"£$€%^&*()_+-=[]{};:'@#~\\|,./<>?"

all = ""

if upper:
    all += uppercase
if lower:
    all += lowercase
if nums:
    all += digits
if chars:
    all += characters

for x in range(amount):
    password = "".join(random.sample(all, length))
    print(password)
