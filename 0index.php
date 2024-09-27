<?php
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<img id="googlel" src="google.png"> <a id="log" href="'.$google_client->createAuthUrl().'"><b>Login  With  Google</b></a>';
}

?>

<!DOCTYPE html>
<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="0style.css">
	<title>Digital forencis vlab</title>
	<link rel="icon" href="logo_head.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="name">KJSIT</div>
	<div id="header"><b>Digital Forencis Virtal lab</b> </div>
	<div id="faculty">
		<a href="0index_faculty.php"><u><b>Faculty Login</b></u>
	</a></div>
	<div id="sign_in">
		<form action="0login.php" method="post">
			<h2>Login</h2>
      <pre>(First time here use the vlab login only)</pre>
	
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<label>User Name</label>
			<input class="input" type="text" name="uname" placeholder="User Name"><br>


			<label>password</label>
			<input class="input" type="password" name="password" placeholder="Password"><br>
			<br>

			<button id="button" type="submit">Login</button>
			<br>
	<p id="link"><b>First time here the Register</b><a href="Registration.php">Register</a></p>
	<p id="link"><b>Forgot Password</b><a href="forgot_pass.php">Forgot pass</a></p>
	
  </form>
	</div>
 
   <br />
   <br />
   <div class="panel panel-default" >
   <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
	
</body>

</html>