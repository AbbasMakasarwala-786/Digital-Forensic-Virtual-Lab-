<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="3exp1.html">
    <title>Digital forencis vlab</title>
	<link rel="icon" href="logo_head.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<header>
    <style>
        @import url(3exp1.css);
    </style>
</header>
<div id="header">
    <i class="fa-solid fa-grip-vertical" style="color: #ffffff;"> EXPERIMENT NO:1</i>
    <a id="home" href="1first.php"><b>Home</b></a>
</div>
<input type="checkbox" id="check">
<label for="check">
    <i class="fa-solid fa-bars-staggered" style="color: #ffffff;" id="btn"></i>
    <i class="fa-solid fa-xmark" style="color: #fafcff;" id="cancel"></i>
</label>
<div class="sidepanel">
    <a id="elements" href="4aim.html">
        Aim
    </a>

    <a id="elements" href="5theory.html">

        Theory
    </a>

    <a id="elements" href="5result.html">

        Result
    </a>

    <a id="elements" class="active" href="6simulation.php">

        Simulation
    </a>
    <a id="elements" href="grader0.html">
        Test
    </a>
    <a id="elements" 
        href="References.html">
        Referencs
    </a>
</div>
<h1 ><u>Record system date and time
    </u></h1>
<div id="content">
    <div id="terminal"><a rel="terminal" href="https://bellard.org/jslinux/vm.html?url=https://bellard.org/jslinux/buildroot-x86.cfg">
            <i class="fa-solid fa-terminal fa-lg" style="color: #f8f8f8;"></i>
            <br>Terminal</a>
    </div>
</div>
<br>
<div id="hiddenLink" style="display: none;">
</div>
<div id="test">
    <form method="post">
        <ol>
            <li>
                <h3>select right command for display date and time</h3>
                <input type="radio" name="q1" value="a"> a)system date
                <br>
                <input type="radio" name="q1" value="b"> b) date
                <br>
                <input type="radio" name="q1" value="c"> c) SysDate
                <br>
            </li>
            <li>
                <h3>Which of the following options is used to set the system time to 12:00 PM?
                </h3>
                <input type="radio" name="q2" value="a"> a) date 12:00
                <br>
                <input type="radio" name="q2" value="b"> b) date -s 12:00
                <br>
                <input type="radio" name="q2" value="c"> c) date +12:00<br>
            </li>
        </ol>
        <input id="submit" type="submit" value="Submit">
    </form>
</div>

</html>
<div id="result">
    <a href="6simulation.php"><i id="prev" class="fa-solid fa-circle-arrow-left fa-shake" style="color: #700000;"></i></a>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correct_answers = array('b', 'b');

        $score = 0;


        for ($i = 1; $i <= 2; $i++) {
            $user_answer = isset($_POST["q$i"]) ? $_POST["q$i"] : '';
            if ($user_answer === $correct_answers[$i - 1]) {
                $score++;
            }
            if ($score == 2) {
    ?>

                <a href="7simulation.php"><i id="next" class="fa-solid fa-circle-arrow-right fa-shake" style="color: #65011a;"></i></a>
    <?php
            }
        }

        echo "<p>Your score: $score / 2</p>";
    }
    ?>
</div>