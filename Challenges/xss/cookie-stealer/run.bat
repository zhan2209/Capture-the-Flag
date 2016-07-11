:loop

timeout /t 10
phantomjs.exe --ignore-ssl-errors=true --local-to-remote-url-access=true --web-security=false --ssl-protocol=any xss-bot.js
goto loop