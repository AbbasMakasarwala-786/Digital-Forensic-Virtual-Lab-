<?php
function phpAlert() {
    echo '<script type="text/javascript">alert("You have logged in!!!")</script>';
}
?>
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
		header("Location: 1index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: 1index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT Name,password FROM registration WHERE Name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
        $s=mysqli_num_rows($result);
        echo $s;
		if (mysqli_num_rows($result)===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
				phpAlert();
				header('Location:1first.php');
		        exit();
			}
            else{
				header("Location: 1index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: 1index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: 1index.php");
	exit();
}
?>