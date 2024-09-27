<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$_SESSION['uname']=$uname;
	if (empty($uname)) {
		header("Location: 0index_faculty.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: 0index_faculty.php?error=Email is required");
	    exit();
	}else{
		$sql = "SELECT Name,Email FROM faculty WHERE Name='$uname' AND Email='$pass'";

		$result = mysqli_query($conn, $sql);
        $s=mysqli_num_rows($result);
        echo $s;
		if (mysqli_num_rows($result)===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Name'] === $uname && $row['Email'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
				header('Location:database.php');
		        exit();
            }else{
				header("Location: 0index_faculty.php?error=Incorect User name or Email");
		        exit();
			}
		}else{
			header("Location:0index_faculty.php?error=Incorect User name or Email");
	        exit();
		}
	}
	
}else{
	header("Location: 0index_faculty.php");
	exit();
}
?>