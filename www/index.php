<html>
<head><title>The Bates Motel</title></head>
<?php
include 'util.php';
if(!is_logged_in())
{
	header("Location: login.php");
}
echo "Hello world!";
echo "<br / >" . get_user();
?>
