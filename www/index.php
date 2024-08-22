<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>The Bates Motel</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom JS -->
    <script src="js/script.js"></script>
    
</head>
<?php
include 'util.php';
if(!is_logged_in())
{
    header("Location: login.php");
}
?>
<body>
    <!-- Custom Navbar -->
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">The Bates Motel</a>
        </div>
        <div id="navbar" class="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="static.php?page=about.txt">About</a></li>
            <li><a href="lookup.php">Lookup a user</a></li>
            <li><a href="static.php?page=test.txt">Testimonials</a></li>
            <?php
            $mysqli = connect_db();
            if(is_admin($mysqli, get_user()))
            {
              echo "<li><a href='admin.php'>Admin panel</a></li>";
            } 
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="jumbotron">
        <h2>Welcome to the Bates Motel, <?php echo get_user(); ?>!</h2>
        <p>We hope you enjoy your stay, please take a look around this site if you need anything.</p>
      </div>
    </div>
</body>
</html>
