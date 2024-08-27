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
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="register.php">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="login-container">
      <div  lang="en"class="registration-info">
              <p><b>Due to lots of spam, we now require a registration code to sign up and view our website. Please see the Bates Motel front desk to get the code.</b></p>
              <!--So I don't forget, the registration code is: sp00ky-->
            </div>
    </div>
    
    <div class="container">
        <div class="form">
            <?php
            include 'util.php';

            if (isset($_POST["username"]) && $_POST["code"] == "sp00ky") {
                // Register them
                $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                $user = mysqli_real_escape_string($mysqli, $_POST["username"]);
                $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
                $pass = encrypt_password($_POST["password"]);
                $about = mysqli_real_escape_string($mysqli, $_POST["about"]);

                $q = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user'");
                $count = mysqli_num_rows($q);

                if ($count == 0) {
                    // Insert into table
                    $q = mysqli_query($mysqli, "INSERT INTO users (username, password, name, about, is_admin) VALUES('$user', '$pass', '$name', '$about', 0)");
                    set_user($_POST["username"]);
                    echo "<script>alert('Account Created Successfully.')</script>";
                } else {
                  echo "<script>alert('Registration Error')</script>";
                }
                }

                if (isset($_POST["code"]) && $_POST["code"] != "sp00ky") {
                    echo "<script>alert('Incorrect authentication code')</script>";
                }
            ?>
            <form method="post" action="register.php">
                <label for="username">Username:</label>
                <input type='text' name='username' id='username' required/><br />
                <label for="password">Password:</label>
                <input type='password' name='password' id='password' required/><br />
                <label for="name">Name:</label>
                <input type='text' name='name' id='name' required/><br />
                <label for="code">Registration Code:</label> <!--So I don't forget, the registration code is: sp00ky-->
                <input type='text' name='code' id='code' required/><br />
                <label for="about">Tell us about you:</label>
                <input type='text' name='about' id='about' required/><br />
                <input type='submit' name='Submit' value='Submit' />
            </form>
        </div>
    </div>
</body>
</html>
