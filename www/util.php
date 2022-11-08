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

# opens a db connection and returns the $mysqli object
# using the procedural style throughout this site
function connect_db()
{
	include 'config.php';

	$mysqli = mysqli_connect("$dbhost", "$dbuser", "$dbpass");
  if ($mysqli->connect_errno) {
    printf("mysqli connection error with code %d: %s\n", mysqli_connect_errno(), mysqli_connect_error());
  }
	if (!mysqli_select_db("$dbname")) {
		printf("cannot select db with code %d: %s\n", mysqli_errno($mysqli), mysqli_error($mysqli));
	}

	return $mysqli;
}

# checks if admin
# must use the $mysqli object from connect_db
function is_admin($mysqli, $username)
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
