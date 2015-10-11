<html>
<head><title>The Bates Motel</title></head>
<?php
include 'config.php';
include 'util.php';
connect_db();
if(!is_logged_in() || !is_admin(get_user()))
{
	header("Location: error.php");
	die("no");
}
?>
<h1>Note to all admins (aka just me):</h1>
<p>dont_let_them_find_out</p>
<br />
<br />
<p>Here is a helpful tool that will help you test network connectivity:</p>
<form method="get" action="admin.php">
IP or domain name: <input type='text' name='target' id='target'/><br />
<input type='submit'/>
</form>
<?php
if(isset($_GET["target"]))
{
	# ping it!
	# check for command injection first
	$t = $_GET["target"];
	if(strpos($t, ";") == FALSE)
	{
		echo "<pre>" . shell_exec("ping -c 3 " . $t) . "</pre>";
	}
	else
	{
		#header("Location: error.php");
		#die("no");
		echo "plsno";
	}
}
?>
</body>
</html>
