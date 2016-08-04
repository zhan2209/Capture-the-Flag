# Campus Email

## Description

What is the FULL regular expression used for the local part of an email address (everything before '@') in the campus code?

## Hint

Take a look at the external libraries... specifically hibernate-validator

## Flag

flag{[a-z0-9!#$%&'*+/=?^_`{|}~-]+(\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*}

## Write-Up

This challenge just requires you to search around the campus code. Looking in

	External Libraries/hibernate-validator-5.0.1.Final.jar/org.hibernate.validator/internal/constraintvalidators

will reveal an EmailValidator class file. Within this file, you'll see

	ATOM = "[a-z0-9!#$%&'*+/=?^_`{|}~-]";
	
	...
	
	/**
	 * Regular expression for the local part of an email address (everything before '@')
	 */
	private Pattern localPattern = java.util.regex.Pattern.compile(
			ATOM + "+(\\." + ATOM + "+)*", CASE_INSENSITIVE
	);