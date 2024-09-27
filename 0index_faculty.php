<!DOCTYPE html>
<html>

<head>
<title>Digital forencis vlab</title>
	<link rel="icon" href="logo_head.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="1style.css">
</head>

<body>
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
    shininess: 123.00,
    waveHeight: 19.50,
    waveSpeed: 1.05,
    zoom: 0.65
  })
</script>
<div id="logo">
    <img src="logo.jpg" id="logo">
</div>
<div id="header">

</div>

	<div id="sign_in">
		<form action="0login_faculty.php" method="post">
			<h2> Faculty Login</h2>
			<br>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<label>User Name</label>
			<input class="input" type="text" name="uname" placeholder="User Name"><br>
			<br>

			<label>Email</label>
			<input class="input" type="text" name="password" placeholder="Email"><br>
			<br>

			<button id="button" type="submit">Login</button>

		</form>
	</div>
</body>

<footer>
    abbas
</footer>

</html>