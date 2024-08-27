<html>
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
<body>
    <!-- Custom Navbar -->
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">The Bates Motel</a>
        </div>
        <div id="navbar" class="navbar-collapse">
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
        </div>
      </div>
    </nav>

    <div class="login-container">
      <div class="form">
        <?php
        include 'util.php';
        require_once('config.php');
        if(isset($_POST["username"]))
        {
            $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $user = $_POST["username"];
            if((strpos($user, '#') !== FALSE) || strpos($user, ';') !== FALSE)
            {
              echo "<script>alert('Illegal Character Used')</script>";
              echo "<script>window.location.replace('login.php')</script>";
            }
            $pass = encrypt_password($_POST["password"]);

            $q = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
            $count = mysqli_num_rows($q);
            if($count == 1)
            {
              $row = mysqli_fetch_assoc($q);
              set_user($row['username']);
              header('Location: index.php');
            } else {
              echo "<script>alert('Username or Password Incorrect')</script>";
              echo "<script>window.location.replace('login.php')</script>";
            }
        }
        ?>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type='text' name='username' id='username' required/><br />
            <label for="password">Password:</label>
            <input type='password' name='password' id='password' required/><br />
            <input type='submit' name='Submit' value='Submit' />
        </form>
      </div>
    </div>
</body>
</html>
