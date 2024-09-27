<?php
session_start();
include "0connection.php";
if(isset($_POST['name']) && isset($_POST['pass'])){
    function validate($data)
     {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
     } 

$name=validate($_POST['name']);
$pass=validate($_POST['$pass']);
    }
if(empty($name)){
    header("Location:0login.php?error=User Name is required");
    exit();
}
else if(empty($pass)){
    header("Location:0login.php?error=User Name is required");
    exit();
}

$sql="SELECT + FROM registration WHERE Name='name' AND password='pass'";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    if($row['Name']==$name && $row['password']==$pass){
        echo "Logging In Sucessfully!";
        $_SESSION['Name']=$row['Name'];
        $_SESSION['password']=$row['pass'];
        header("Location:1first.php");
        exit();
    }
    else{
        header("Location:0login.php?error=Incorrect User name or password");
        exit();
    }

}
else{
    header("Location:0login.php");
    exit();
}