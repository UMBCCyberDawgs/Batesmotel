<html>
<head><title>The Bates Motel</title></head>
<?php
include 'util.php';
include 'config.php';
if(!is_logged_in())
{
	header("Location: login.php");
}
?>
<p>Here you can look up another user on the system by their username</p>
<form method="get" action="lookup.php">
Username: <input type='text' name='username' id='username'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
<?php
if(isset($_GET["username"]))
{
	# lookup user
	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die("cannot connect");
	mysql_select_db("$dbname") or die("cannot select db");
	$user = $_GET["username"];
	$q = mysql_query("SELECT * FROM users WHERE username='$user'");
	# since there might be multiple users with the same username, just dump all of them
	$count = mysql_num_rows($q);
	if($count > 0)
	{
		while($row = mysql_fetch_assoc($q))
		{
			echo "Username: " . $row['username'] . "<br />Real Name: " . $row['name'] . "<br />About me: " . $row['about'];
			if($row['is_admin'] == 't')
			{
				echo "<br />Adminstrator: yes";
			}
			echo "<br /><br />";
		}
	}
	else
	{
		echo "No users found with that username"; # todo: redirect to error page
	}
}
?>
</body>
</html>

