<?php

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

?>
