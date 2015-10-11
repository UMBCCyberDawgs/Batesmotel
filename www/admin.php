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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="static.php?page=about.txt">About</a></li>
	    <li><a href="lookup.php">Lookup a user</a></li>
	    <li><a href="static.php?page=test.txt">Testimonials</a></li>
	    <?php
            if(is_admin(get_user()))
	    {
                  echo "<li><a href='admin.php'>Admin panel</a></li>";
            } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
<h2>Note to all admins (aka just me):</h2>
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
	</div>
</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
