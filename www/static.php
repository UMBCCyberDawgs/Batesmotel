<html>
<head><title>The Bates Motel</title></head>
<body>
<?php
include 'util.php';
if(is_logged_in())
{
	# get the file requested
	$filename = 'pages/' . $_GET["page"];
	echo file_get_contents($filename);
} else {
	echo "<b>You must be logged in to do that!</b>";
}
?>

</body>
</html>
