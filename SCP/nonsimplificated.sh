#!/bin/bash

/usr/sbin/sshd -D &
php-fpm7 -F &
/usr/sbin/nginx -g "daemon off;" &
php -S 0.0.0.0:8000 -t /PHP &
crond -f
