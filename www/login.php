<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>The Bates Motel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/navbar-fixed-top.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">The Bates Motel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="static.php?page=about.txt">About</a></li>
	    <li><a href="lookup.php">Lookup a user</a></li>
	    <li><a href="static.php?page=test.txt">Testimonials</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

<?php
include 'util.php';
include 'config.php';
if(isset($_POST["username"]))
{
	# log them in bub
  # roger that bub
	$mysqli = connect_db()
	$user = $_POST["username"];
	if((strpos($user, '#') !== FALSE) || strpos($user, ';') !== FALSE)
	{
		header('Location: error.php');
		die("nuhuh");	
	}
	//$pass = $_POST["password"];
	$pass = encrypt_password($_POST["password"]);

	$q = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
	$count = mysqli_stmt_num_rows($q);
	if($count == 1)
	{
		# we found a match!
		$row = mysqli_fetch_assoc($q);
		#set_user($_POST["username"]);
		set_user($row['username']); # prevent sql injection through session stuff
		header('Location: index.php');
	} else {
		//echo "Login error<br />";
		header('Location: error.php');
	}
}
?>
<form method="post" action="login.php">
Username: <input type='text' name='username' id='username'/><br />
Password: <input type='password' name='password' id='password'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
</div>
</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
