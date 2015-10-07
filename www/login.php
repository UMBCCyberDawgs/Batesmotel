<html>
<head><title>The Bates Motel</title></head>
<body>
<?php
include 'util.php';
include 'config.php';
if(isset($_POST["username"]))
{
	# log them in bub
	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysql_select_db("$dbname") or die("cannot select db");
	$user = $_POST["username"];
	if((strpos($user, '#') !== FALSE) || strpos($user, ';') !== FALSE)
	{
		die("nuhuh");	
	}
	$pass = $_POST["password"];

	$q = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
	$count = mysql_num_rows($q);
	if($count == 1)
	{
		# we found a match!
		$row = mysql_fetch_assoc($q);
		#set_user($_POST["username"]);
		set_user($row['username']); # prevent sql injection through session stuff
		header('Location: index.php');
	} else {
		echo "Login error<br />";
	}
}
?>
<form method="post" action="login.php">
Username: <input type='text' name='username' id='username'/><br />
Password: <input type='text' name='password' id='password'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
</body>
</html>
