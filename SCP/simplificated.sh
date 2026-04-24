#!/bin/bash

php-fpm7 -F &
/usr/sbin/nginx -g "daemon off;" &
crond -f
