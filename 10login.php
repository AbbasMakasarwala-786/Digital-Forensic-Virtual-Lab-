<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: border-box;

        }

        body {
            background-image: url('loginpage1.jpg');
            background-repeat: no-repeat;
            background-position: center;
            z-index: 0.8;
            height: 100vh;

        }

        @media screen and (max-width:740px) {}

        #name {
            position: relative;
            font-size: 16vh;
            color: white;
            z-index: 1;
        }

        #sign_in {
            height: 42vh;
            width: 25vw;
            background-color: black;
            opacity: 0.7;
            color: white;
            position: relative;
            top: 10vh;
            left: 30vw;
            padding: 10px;
            border-radius: 30px;
        }

        #sign_in p {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6vh;
            padding-bottom: 9px;
        }

        label {
            font-size: 4vh;
            padding-bottom: 10px;
        }

        .input {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background-color: black;
            border-bottom: 2px solid white;
        }
        @media screen and (max-width:850px) {
            #sign_in{
                width:fit-content;
            }
        }
    </style>
</header>
<div id="name">KJSIT</div>
<div id="sign_in">
    <p>
        Sign in
    </p>
    <form action="#" method="POST">

    <label>Username:</label><br>

    <input class="input" name="user" type="text" placeholder="Username" >
    <br><br><label>password:</label>

    <br><input class="input" type="text" name="pass" placeholder="password" >
    <input type="submit" >
    </form>
</div>
</html>