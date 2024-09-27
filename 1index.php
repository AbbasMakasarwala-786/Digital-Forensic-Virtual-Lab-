<?php
// Database connection
$sname = "localhost";
$uname = "root";
$password = "Abbas@786";
$db_name = "login";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



include('config.php');

$login_button = '';

// ...

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        print_r($data);

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];

            // Store user data in the database
            $query = "INSERT INTO registration (Name, Email) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'], $_SESSION['user_email_address']);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Record inserted successfully!";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
        print_r ($_SESSION['user_first_name']);

        echo "Authentication Code: " . $_GET["code"] . "<br>";
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        echo "Token: ";
        print_r($token);
    }
}

if (!isset($_SESSION['access_token'])) {
    $login_button = '<img id="googlel" src="google.png"> <a id="log" href="' . $google_client->createAuthUrl() . '"><b>Login With Google</b></a>';
}

// Close the database connection when you are done with it
mysqli_close($conn);
?>




<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" type="text/css" href="1style.css">
  <title>Digital forencis vlab</title>
  <link rel="icon" href="logo_head.png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<div id="logo">
  <img src="logo.jpg" id="logo">
</div>
<div id="header">
</div>
<div id="animation-bg"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
<script>
  VANTA.WAVES({
    el: "#animation-bg",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x868686,
    shininess: 0.00,
    waveHeight: 19.50,
    waveSpeed: 1.05,
    zoom: 0.65
  })
</script>

<body>
  <br>
  <br>
  <div id="header1"><b>Digital Forencis Virtal Lab</b> </div>
  <div id="faculty">
    <a href="0index_faculty.php"><u><b>Faculty Login</b></u>
    </a>
  </div>

  <div id="sign_in">
    <form action="0login.php" method="post">
      <h2>Login</h2>
      <pre>(First time here use the vlab login only)</pre>

      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <label>User Name</label>
      <input class="input" type="text" name="uname" placeholder="User Name" required><br>


      <label>Password</label>
      <input class="input" type="password" name="password" placeholder="Password" required><br>
      <br>

      <button id="button" type="submit">Login</button>
      <br>
      <p id="link"><b>First time here the Register</b><a href="Registration.php">Register</a></p>
      <p id="link"><b>Forgot Password</b><a href="forgot_pass.php">Forgot pass</a></p>

    </form>
  </div>

  <br />
  <br />
  <div class="panel panel-default">
    <?php
    if ($login_button == '') {
      echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
      echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
      echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
      echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
      echo '<h3><a href="logout.php">Logout</h3></div>';
    } else {
      echo '<div align="center">' . $login_button . '</div>';
    }
    ?>
  </div>

</body>
<footer>
  abbas
</footer>

</html>