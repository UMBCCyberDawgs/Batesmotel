<?php
include 'config.php';
include 'util.php';
$mysqli = connect_db();

# drop table
#mysqli_query("DROP TABLE users");

# create table
mysqli_query("CREATE TABLE users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	name VARCHAR(100),
	about VARCHAR(500),
	is_admin VARCHAR(10))");

function reg_user($mysqli, $username, $password, $name, $about, $is_admin)
{
	$p = encrypt_password($password);
	mysqli_query($mysqli, "INSERT INTO users (username, password, name, about, is_admin) VALUES('$username', '$p', '$name', '$about', '$is_admin')");
}

reg_user($mysqli, 'n0rmanbates', 'ilovemom', 'Norman Bates', 'Hello! I own this motel!', 't');
reg_user($mysqli, 'mcrane', 'helpme', 'Marion Crane', 'Just an average guest, nothing to see here', 'f');
reg_user($mysqli, 'loomyboy1995', 'sex', 'Sam Loomis', 'Have you seen my girlfriend?', 'f');
reg_user($mysqli, 'arbogast', 'trustno1', 'Arbogast', 'PI for hire', 'f');
reg_user($mysqli, 'lovelylila', 'hihihih', 'Lila Crane', 'Do I have to put something here?', 'f');
reg_user($mysqli, 'Norma', 'imthebest', 'Norma', 'Watching over this place since 1925', 'f');
?>
