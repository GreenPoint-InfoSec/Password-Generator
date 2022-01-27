# Password-Generator

  python3 passwordGen.py <length> <amount> <lower> <upper> <numbers> <special characters>

length: integer - total number of characters
amount: integer - total number of passwords to generate

Password Format:

To include lower, upper, numbers, special character:
  
- set 0 for no
- set 1 for yes
  
e.g.  python3 passwordGen.py 10 5 0 1 1 0
  5 passwords, 10 characters long, using upper case and numbers
