<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital forencis vlab</title>
    <link rel="icon" href="logo_head.png">
    <style>
        @import url(1style.css);

        #login {
            height: fit-content;
            width: 28vw;
            background-color: rgb(203, 203, 203);
            opacity: 0.8;
            color: rgb(0, 0, 0);
            position: relative;
            top: 15vh;
	        left: 35vw;
            padding: 3%;
            z-index: 0.8;
        }

        #submit {
            position: relative;
            left: 36%;
            height: 5vh;
            width: 7vw;
            font-size: 2vh;
            background-color: #393939;
            color: whitesmoke;
            border-radius: 6px;
        }
        .head{
         display:inline;
        }
        #signup {
            text-align: left;
            font-size: 3.5vh;
            text-decoration:black;
            float:left;
            border-right: 6px solid black;
            padding-right: 1vw;
        }
        #link {
            color:black;
            font-size:4vh;
            text-decoration: none;
            width: fit-content;
            margin-left:1vw;
            background-color:#9c9a9a;
            border-radius:6px;
        }
        @media screen and (max-width: 850px) {
            #login {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50vw;
                height: fit-content;
                left: 25vw;
            }

            input {
                width: 30vw;
            }

            #submit {
                width: 12vw;
            }
        }
    </style>
</head>
<div id="logo">
    <img src="logo.jpg" id="logo">
</div>
<div id="header">
</div>
<div id="err">
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        $host = 'localhost';
        $user = 'root';
        $password = 'Abbas@786';
        $db = 'Login';

        // Create a database connection
        $conn = mysqli_connect($host, $user, $password, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if the provided username, department, and email exist in the database
        // Update the password for all matching users
        $update_query = "UPDATE registration SET password='$new_password' WHERE Name='$name' AND Email='$email'";

        if (mysqli_query($conn, $update_query)) {
            $affected_rows = mysqli_affected_rows($conn);

            if ($affected_rows >= 0) {
                echo "Password updated for user successfully.";
            } else {
                echo "No user found matching the provided information.";
            }
        } else {
            echo "Error updating password: ";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
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
        shininess: 123.00,
        waveHeight: 19.50,
        waveSpeed: 1.05,
        zoom: 0.65
    })
</script>

<body>
    <div id="login">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="head"><b id="signup">Forgot Password</b>
            <a href="1index.php">
            <b id="link">Login</b>
            </a>
            </div>
            <br>
            <br>
            <label>Username</label>
            <input class="inputbox" type="text" placeholder="Name" name="name" />
            <p><br></p>

            <label>Email</label>
            <input class="inputbox" type="email" placeholder="Email" name="email" />
            <p><br></p>

            <label>New password</label>
            <input class="inputbox" type="password" placeholder="New password" name="new_password" />
            <p><br></p>

            <input id="submit" type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>

</html>