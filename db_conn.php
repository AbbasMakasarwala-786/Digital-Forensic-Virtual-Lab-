<?php

$sname= "localhost";
$unmae= "root";
$password = "Abbas@786";
$db_name = "login";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>