<html>
<head><title>The Bates Motel</title></head>
<?php
include 'util.php';
include 'config.php';
if(isset($_POST["username"]) && $_POST["code"] == "sp00ky")
{
	# register them
	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysql_select_db("$dbname") or die("cannot select db");
	$user = mysql_real_escape_string($_POST["username"]);
	$name = mysql_real_escape_string($_POST["name"]);
	$pass = $_POST["password"];
	$about = $_POST["about"];

	$q = mysql_query("SELECT * FROM users WHERE username='$user'");
	$count = mysql_num_rows($q);
	if($count == 0)
	{
		# insert into table
		# todo: encrypt password
		# todo: add in name to db
		$q = mysql_query("INSERT INTO users (username, password, name, about, is_admin) VALUES('$user', '$pass', '$name', '$about', 'f')");
		set_user($_POST["username"]);
		header('Location: index.php');
	} else
	{
		echo "Register error! <br />";
	}
}
if(isset($_POST["code"]) && $_POST["code"] != "sp00ky")
{
	echo "Incorrect authentication code <br />";
}
?>
<p>Due to lots of spam, we now require a registration code to sign up. Please see the front desk to get the code.</p>
<form method="post" action="register.php">
Username:          <input type='text' name='username' id='username'/><br />
Password:          <input type='password' name='password' id='password'/><br />
Name:              <input type='text' name='name' id='name'/><br />
Registration Code: <input type='text' name='code' id='code'/><br />
<!--psst, the registration code is: sp00ky-->
Tell us about you: <input type='text' name='about' id='about'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
</body>
</html>
