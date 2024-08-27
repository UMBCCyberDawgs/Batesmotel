<html>
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
include 'util.php';
if(!is_logged_in())
{
  echo "<script>alert('Please Login to View this Page')</script>";
  echo "<script>window.location.replace('login.php')</script>";
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
            <li><a href="index.php">Home</a></li>
            <li><a href="static.php?page=about.txt">About</a></li>
            <li class="active"><a href="lookup.php">Lookup a user</a></li>
            <li><a href="static.php?page=test.txt">Testimonials</a></li>
            <?php
            $mysqli = connect_db();
            if(is_admin($mysqli, get_user()))
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
<p>Here you can look up another user on the system by their username</p>
<form method="get" action="lookup.php">
Username: <input type='text' name='username' id='username'/><br />
<input type='submit' name='Submit' value='Submit' />
</form>
<?php
if(isset($_GET["username"]))
{
	# lookup user
	$user = $_GET["username"];
	$q = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user'");
  if(!$q) {
    header("Location: error.php");
  }
  
	$count = mysqli_num_rows($q);
	if($count > 0)
	{
		while($row = mysqli_fetch_assoc($q))
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
		header("Location: error.php");
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
