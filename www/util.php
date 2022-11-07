<?php
include 'config.php';
# Utitlity functions for the site

# gets the currently logged in user
function get_user()
{
	if(!isset($_COOKIE["session"]))
	{
		return false;
	}
	return base64_decode($_COOKIE["session"]);
}

function set_user($username)
{
	setcookie("session", base64_encode($username), 0);
}

function is_logged_in()
{
	return isset($_COOKIE["session"]);
}

# opens a db connection
function connect_db()
{
	include 'config.php';
	mysqli_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysqli_select_db("$dbname") or die("cannot select db");
}

# checks if admin
# must call connect_db first
function is_admin($username)
{
	$u = mysqli_real_escape_string($username);
	$q = mysqli_query("SELECT * FROM users WHERE username='$u'");
	if($row = mysqli_fetch_assoc($q))
	{
		if($row['is_admin'] == 't')
		{
			return true;
		}
	}
	return false;
}

# encrypts the password with xor encryption and base64
function encrypt_password($pass)
{
	$key = 42;
	$out = '';
	# iterate
	for($i=0; $i<strlen($pass); $i++)
	{
		$out .= chr(ord($pass{$i}) ^ $key);
	}
	return base64_encode($out);
}

?>
