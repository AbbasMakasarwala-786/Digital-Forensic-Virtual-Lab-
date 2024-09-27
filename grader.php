<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="3exp1.html">
    <title>Digital forencis vlab</title>
	<link rel="icon" href="logo_head.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <title>MCQ Test</title>
</head>
<header>
    <style>
        @import url(3exp1.css);
        h3 {
            font-size: 2.5vh;
        }

        input q1,
        q2,
        q3 {
            font-size: 1.5vh;
        }

        form {
            position: relative;
            top: 2vh;
            left: 1vw;
        }



        #content {
            overflow-x: hidden;
            overflow-y: auto;
            border: 1px solid white;
            position: relative;
            display: inline-block;
            align-items: center;
            justify-content: center;
            top: 10vh;
            left: 4vw;
            width: 70vw;
            font-size: 3vh;
        }

        h1 {
            font-size: 4vh;
            position: relative;
            width: fit-content;
            top: 10vh;
            left: 4vw;
        }
        #test{
            position: relative;
            top: 10vh;
            left: 4vw;
            width: fit-content;
        }
        #submit{
            background-color: rgb(153, 31, 0);
            font-size: 2.5vh;
            font-weight: bolder;
            color:white;
            position:relative;
            top:4.5vh;
        }
        #result{
            position: relative;
            top: 10vh;
            left: 4vw;
            font-size: 3vh;
            width: fit-content;
        }
        #next{
            display: none;
            position: absolute;
            top:36vh;
            left:95%;
            font-size: 6vh;
        }
        #submit{
            background-color: rgb(153, 31, 0);
            font-size: 2.5vh;
            font-weight: bolder;
            color:white;
            position:relative;
            top:1vh;
        }
        #timer{
            border:2px solid rgb(153, 31, 0);
            background-color: #65011a;
            width: fit-content;
            color:#ffffff;
            font-size: 3vh;
        }
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
<script>
        var timerInterval;

        document.addEventListener("DOMContentLoaded", function () {
            var timer = 180; // 3 minutes in seconds
            timerInterval = setInterval(function () {
                document.getElementById("timer").innerText = "Time left: " + timer + "s";
                timer--;

                if (timer < 0) {
                    clearInterval(timerInterval);
                    document.getElementById("timer").innerText = "Time's up!";
                    disableRadioButtons();
                    document.getElementById("submit").disabled = true;
                }
            }, 1000);
        });

        function submitForm() {
            clearInterval(timerInterval);
            disableRadioButtons();
            document.getElementById("test-form").submit();
        }

        function disableRadioButtons() {
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function (radioButton) {
                radioButton.disabled = true;
            });
        }
    </script>
<h1>Multiple Choice Questions</h1>
<div id="test">
<form method="post" id="test-form">
        <ol>
            <!-- Your MCQ questions and answer options go here -->
            <li>
                <h3>What is volatile data in digital forensics?</h3>
                <input type="radio" name="q1" value="a"> a) Data that is encrypted and difficult to access
<br>
                <input type="radio" name="q1" value="b"> b) Data that can change or be lost if the system is powered off
<br>
                <input type="radio" name="q1" value="c"> c) Data that is stored on volatile memory devices
<br>
            </li>
            <li>
                <h3>Which of the following is an example of volatile data?
</h3>
                <input type="radio" name="q2" value="a"> a)  Files stored on a hard drive
<br>
                <input type="radio" name="q2" value="b"> b) System registry entries
<br>
                <input type="radio" name="q2" value="c"> c)  Archived email messages<br>
            </li>
            <li>
                <h3> What is the primary purpose of collecting volatile data in digital forensics?
</h3>
                <input type="radio" name="q3" value="a"> a) To recover deleted files
<br>
                <input type="radio" name="q3" value="b"> b)  To analyze data at a later time
<br>
                <input type="radio" name="q3" value="c"> c) To preserve evidence that may be lost when the system is powered off
<br>
            </li>
            <li>
                <h3> When should a digital forensics investigator collect volatile data from a live system?
</h3>
                <input type="radio" name="q4" value="a"> a) Only after obtaining a court order
<br>
                <input type="radio" name="q4" value="b"> b)  As soon as possible to preserve evidence
<br>
                <input type="radio" name="q4" value="c"> c)  Only when the system is turned off
<br>
            </li>
            <li>
                <h3>Which volatile data source provides information about currently running processes?
</h3>
                <input type="radio" name="q5" value="a"> a) RAM (Random Access Memory)
<br>
                <input type="radio" name="q5" value="b"> b) Hard Drive
<br>
                <input type="radio" name="q5" value="c"> c) Optical Drive
<br>
            </li>
        </ol>
        <input id="submit" type="submit" value="Submit">
        <br>
        <br>
        <p id="timer"></p>
    </form>
</div>
</html>
<div id="result">
    <br><br>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $correct_answers = array('b', 'b', 'c', 'b', 'a');

    $score = 0;

    
    for ($i = 1; $i <= 5; $i++) {
        $user_answer = isset($_POST["q$i"]) ? $_POST["q$i"] : '';
        if ($user_answer === $correct_answers[$i - 1]) {
            $score++;
        }
    }
    ?>
    <style>
        #h1{
            display:none;
        }
        #test-form
        {
            display: none;
        }
        #next{
            display:block;
        }
    </style>
    <?php

    echo "<p>Your score: $score / 5</p>";
    $name=$_SESSION['uname'];
    $sql = "UPDATE registration
    SET marks1='$score'
    WHERE Name = '$name';
    ";
    mysqli_query($conn, $sql);
}   
?>
<a href="feedback.html"><i id="next" class="fa-solid fa-circle-arrow-right fa-shake" style="color: #65011a;"></i></a>
</div>