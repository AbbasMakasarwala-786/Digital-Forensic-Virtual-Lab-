<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="grader.php">
</head>
<header>
    <style>
 @import url(3exp1.css);
 </style>
</header>
<body>
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
    <a id="elements"  href="4aim.html">
        Aim
    </a>
    
    <a id="elements"  href="5theory.html">

        Theory
    </a>
    
    <a id="elements" href="5result.html">

        Result
    </a>
    
    <a id="elements" href="6simulation.html">

  Simulation
    </a>
    <a id="elements" class="active" href="grader.php">
        Test
    </a>
    <a id="elements" 
        href="References.html">
        Referencs
    </a>
</div>
</body>
</html>
<link href="grader.php">
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

    echo "<p>Your score: $score / 5</p>";
    $name=$_SESSION['uname'];
    $sql = "UPDATE registration
    SET marks='$score'
    WHERE Name = '$name';
    ";
    mysqli_query($conn, $sql);
}   
?>
</div>