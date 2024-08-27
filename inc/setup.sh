#!/bin/bash

wait_for_db() { mysqladmin -u root -h localhost ping; }

until wait_for_db; do
    sleep 1
done

mysqladmin -u root -h localhost password 5364ea964e8784e1c35ffb651acc6780
mysqladmin -u root -h localhost --password="5364ea964e8784e1c35ffb651acc6780" create bates

mysql -u root -h localhost --password="5364ea964e8784e1c35ffb651acc6780" bates <<EOF
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    about TEXT,
    is_admin BOOLEAN DEFAULT FALSE
);
EOF