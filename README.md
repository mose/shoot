Shoot
================

A single-file app in php that stores your screenshots. It is also displaying
its own source code for total software freedom.

Install
-------------
- Just get the `index.php` and drop it in a dir in your web tree
- on GNU/Linux systems, get `scrot` and create an alias and change the scp destination part as indicated on the web page.
- otherwise, just get your screen capture preferred software do the job
- optionnaly protect this dir with some basic http auth
- and tweak the css

```
alias shoot="scrot -s -b -t 15 -e 'scp -pC *_grab*png yourdomain.com:shoot/ && echo http://yourdomain.com/shoot/\$f' '%Y-%m-%d-%H-%M_grab.png' && rm -f *_grab*png"
```

Example
-------------
- http://eye.mose.com
- (if you have a public shoot app running, send me the link or a PR I will add it here)

License
--------------
This piece of code is available under Public Domain.

Copy is Right
--------------
Copyleft (c) 2003-2015 mose


