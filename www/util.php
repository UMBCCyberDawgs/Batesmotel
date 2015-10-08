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
	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysql_select_db("$dbname") or die("cannot select db");
}

# checks if admin
# must call connect_db first
function is_admin($username)
{
	$u = mysql_real_escape_string($username);
	$q = mysql_query("SELECT * FROM users WHERE username='$u'");
	if($row = mysql_fetch_assoc($q))
	{
		if($row['is_admin'] == 't')
		{
			return true;
		}
	}
	return false;
}

?>
