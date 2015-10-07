<?php
include 'config.php';
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
mysql_select_db("$dbname") or die("cannot select db");

# drop table
mysql_query("DROP TABLE users");

# create table
mysql_query("CREATE TABLE users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	name VARCHAR(100),
	about VARCHAR(500),
	is_admin VARCHAR(10))");

# todo: insert admin user
?>
