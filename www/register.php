<html>
<head><title>The Bates Motel</title></head>
<?php
include 'util.php';
include 'config.php';
if(isset($_POST["username"]))
{
	# register them
	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysql_select_db("$dbname") or die("cannot select db");
	$user = mysql_real_escape_string($_POST["username"]);
	$pass = $_POST["password"];

	$q = mysql_query("SELECT * FROM users WHERE username='$user'");
	$count = mysql_num_rows($q);
	if($count == 0)
	{
		# insert into table
		# todo: encrypt password
		$q = mysql_query("INSERT INTO users (username, password) VALUES('$user', '$pass')");
		set_user($_POST["username"]);
		header('Location: index.php');
	} else
	{
		echo "Register error! <br />";
	}
}
?>
<p>Due to lots of spam, we now require a registration code to sign up. Please see the front desk to get the code.</p>
<form method="post" action="login.php">
Username:          <input type='text' name='username' id='username'/><br />
Password:          <input type='password' name='password' id='password'/><br />
Registration Code: <input type='text' name='code' id='code'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
</body>
</html>
