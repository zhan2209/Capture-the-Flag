# Function Address

## Description

You found this file, but realized you can't do anything useful without the 'find_string' function. The flag is its address! Format the flag as flag{ADDRESS}

Category: Easy

## Hint

The objdump command can be very powerful in analyzing files

## Flag

flag{08048444}

## Write-Up

As mentioned in the hint, running objdump -d FILENAME > output.txt will give use the assembly code for this program. Search for find_string and get the address.