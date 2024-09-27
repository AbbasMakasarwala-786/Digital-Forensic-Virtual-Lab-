<?php
    $host='localhost';
    $user='root';
    $password='Abbas@786';
    $db='Login';

    $conn=mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        echo "failed";
    }
?>