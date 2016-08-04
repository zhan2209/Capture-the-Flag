# Basic Authentication

## Description

The top secret organization protected their pages with a password.
While we were on their network we monitored the traffic and noticed they didn't always use TLS. This allowed us to see the requests listed below.
Find the admin's password. It is the flag.

=================================================================
	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic
WVcxR2VtSXlOSFZaYlRreFkyMDFiRTl0Ykd0YVZ6VXdZVmhTTlUxVWF6Uk5RVDA5
=================================================================
=================================================================
	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic
Vm0weGQxSXhiRmhTV0d4VFYwZDRWVmxVU205V1ZteDBaVWRHVjAxV2NIbFdNalZyVjJ4YWRHVkljRmRXZWxaUVZrZDRZV1JHVm5WaVJtUlhUVEZLVFZkV1VrSmxSa3BYVjJ4c2FsSnNjRlJaYTFaYVpXeGFWbGRyV2xCV2EwcFRWVVpSZDFCUlBUMD0=
=================================================================
=================================================================
	GET http://www.example.com/top-secret HTTP/1.1
	Host: www.example.com
	Authorization: Basic
Vm0wd2VFNUhSWGhWV0doVFlrZG9WVmx0ZEV0aFJsWnlWbXQwVmsxV1NsWlZWelZyWVZVeFdGVnNXbFpOYmtKRVZtcEdXbVF4WkhKaVJuQm9UVzFuZWxaVVNqUlpWbHB5VGxWc2FGSXdXbGhVVkVaTFRteGFSMVpzWkd0aVZscDZWbGMxVDFadFNsbFZiR3hXWWtaYU0xcFhlR3RXVms1eFVXczVVMDFWYjNkV1ZFWnZZekZXUjFwRlpGaGlWMmhvVm0xNFlWWXhVWGhTVkd4UlZWUXdPUT09
=================================================================

## Write-Up

The username and password are base64-encoded in each request. Decode the values and submit the admin's password.

## Flag

flag{Uc@n'tCrackThis!CuzIt'sSuperLooong!}