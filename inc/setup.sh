#!/bin/bash

wait_for_db() { mysqladmin -u root -h localhost ping; }

until wait_for_db; do
    sleep 1
done

mysqladmin -u root -h localhost password 5364ea964e8784e1c35ffb651acc6780
mysqladmin -u root -h localhost --password="5364ea964e8784e1c35ffb651acc6780" create bates

sed -i.bak 's/^\(\$dbpass\ =\ \).*/\1\"5364ea964e8784e1c35ffb651acc6780\"\;/' /var/www/html/config.php

if [ -f "/var/www/html/install.php" ]; then
    curl http://localhost/install.php
    rm /var/www/html/install.php
else
    echo "install.php file missing. Redownload this file and curl it if it hasn't already been"
fi

echo "Please run: rm /tmp/setup.sh"
