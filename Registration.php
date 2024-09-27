<?php
$error_message = ""; 

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $Department = $_POST['Department'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $div=$_POST['div'];

    if (empty($name) || empty($roll) || empty($Department) || empty($email) || empty($pass) || empty($div)) {
        $error_message = "Please fill in all the required fields.";
    } 
    elseif (!is_valid_email($email)) {
        $error_message = "Please enter a valid email address.";
    }
    else {
        $host = 'localhost';
        $user = 'root';
        $password = 'Abbas@786';
        $db = 'Login';

        $conn = mysqli_connect($host, $user, $password, $db);

        // Check if the connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

              $stmt = $conn->prepare("INSERT INTO registration (Name, Roll_no, Department, Email, password,Division) VALUES (?, ?, ?, ?, ?,? )");
              $stmt->bind_param("ssssss", $name, $roll, $Department, $email, $pass, $div);

            if ($stmt->execute()) {
            // Data has been successfully inserted
            $stmt->close();
            $conn->close();
        } else {
             $error_message = "Error occurred while saving data.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital forensics vlab</title>
    <link rel="icon" href="logo_head.png">
    <style>
        

        * {
            margin: 0;
            border: border-box;
        }

        #login {
            height: fit-content;
            width: 28vw;
            background-color: rgb(230, 224, 224);
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
            background-color: #817777;
            color: whitesmoke;
            border-radius: 6px;
        }

        label {
            font-size: 3vh;
            padding-bottom: 30px;
            font-weight: bolder;
        }

        input,
        input::placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgb(0, 0, 0);
            background-color: rgb(189, 186, 186);
            border-bottom: 5px solid rgb(0, 0, 0);
            height: 4.5vh;
            width: 20vw;
            font-size: 2vh;
            padding-bottom: 10px;
        }
        #dep {
            height: 4vh;
            width: 22vw;
            font-size: 2vh;
            font-weight: bold;
            background-color: rgb(152, 152, 152);
            color: black;
        }

        #animation-bg {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            top: 10vh;
        }

        #logo {
            z-index: 1;
            position: fixed;
            float: left;
            width: auto;
            height: auto;
            background-color: rgb(153, 31, 0);
        }

        #header {
            z-index: 1;
            position: relative;
            left: 40vw;
            margin-left: 2px;
            width: 80vw;
            display: flex;
            align-items: center;
            justify-content: right;
            border: 2px solid rgb(153, 31, 0);
            background-color: rgb(153, 31, 0);
            height: 72px;
        }
        #error-message {
            color: red;
            margin-bottom: 10px;
        }
        #signup {
            text-align: left;
            font-size: 4.5vh;
            text-decoration:black;
            float:left;
            border-right: 6px solid black;
            padding-right: 1vw;
        }
        #link {
            color:black;
            font-size:4.5vh;
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

            #link {
                left: 28vw;
            }
        }
    </style>
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
        });
    </script>
    <div id="logo">
        <img src="logo.jpg" id="logo">

        <div id="header">

        </div>
    </div>
    <div id="login">
        <form action="#" method="post">
        <div class="head"><b id="signup">Registration</b>
            <a href="1index.php">
            <b id="link">Login</b>
            </a>
            </div>
            <br>
            <br>
            <br>
            <?php if (!empty($error_message)) { ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php } ?>

            <label>Username</label>
            <input class="inputbox" type="text" placeholder="Name" name="name" required /><br>

            <label>Roll no</label>
            <input class="inputbox" type="text" placeholder="Roll_no" name="roll" required /><br>

            <label>Department</label><br>
            <select id="dep" name="Department" required>
                <option>Computer Engineering</option>
                <option>IT Engineering</option>
                <option>AI-DS</option>
                <option>EXTC</option>
            </select><br>
                <br>
            <label>Division</label><br>
            <select id="dep" name="div" required>
                <option>A</option>
                <option>B</option>
            </select><br>
                <br>
            <label>Email</label>
            <input class="inputbox" type="email" placeholder="Email" name="email" id="email" required oninput="validateEmail()" /><br>

            <label>Password</label>
            <input class="inputbox" type="password" placeholder="Password" name="password" required /><br>

            <input id="submit" type="submit" value="Submit" name="submit">
        </form>
    </div>
    <a href="1index.php">
        <p id="link"><b>Login</b></p>
    </a>
    <footer>
        abbas
    </footer>
</body>
</html>
