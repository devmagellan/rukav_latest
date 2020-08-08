#!/bin/bash
php-fpm -D
chmod 777 /app -R
cd /app
#php artisan socketpush:serve > /tmp/phplog 2>&1
#chmod 400 /app/config/server_a.pem
#php artisan tunneler:activate
/usr/bin/supervisord -n -c /etc/supervisord.conf
