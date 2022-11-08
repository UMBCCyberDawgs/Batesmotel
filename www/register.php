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
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="register.php">Register</a></li>
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
if(isset($_POST["username"]) && $_POST["code"] == "sp00ky")
{
	# register them
	$mysqli = connect_db();
	$user = mysqli_real_escape_string($mysqli, $_POST["username"]);
	$name = mysqli_real_escape_string($mysqli, $_POST["name"]);
	//$pass = $_POST["password"];
	$pass = encrypt_password($mysqli, $_POST["password"]);
	$about = $_POST["about"];

	$q = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user'");
	$count = mysqli_stmt_num_rows($q);
	if($count == 0)
	{
		# insert into table
		# todo: encrypt password
		# todo: add in name to db
		$q = mysqli_query($mysqli, "INSERT INTO users (username, password, name, about, is_admin) VALUES('$user', '$pass', '$name', '$about', 'f')");
		set_user($_POST["username"]);
		header('Location: index.php');
	} else
	{
		echo "Register error! <br />";
		header("Location: error.php");
	}
}
if(isset($_POST["code"]) && $_POST["code"] != "sp00ky")
{
	echo "Incorrect authentication code <br />";
	header("Location: error.php");
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
	</div>
</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
