<?php 
session_start();
extract($_GET);
$email = $_GET['email'];
$pwd = $_GET['password'];
$con = mysqli_connect('localhost','root','','foodicted');

$sql ="SELECT * from detail WHERE email = '$email'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
if($pwd == $row['password']){
	$_SESSION['username']=$row['uname'];
	echo "<script>window.location = \"http://localhost/webtech_project/home_pagev2.php\"</script>";
}
else{
	echo "<script type='text/javascript'> alert('Invalid email or password. Try again!');</script>";
	echo "<script>window.location = \"http://localhost/webtech_project/login.php\"</script>";
}
?>






















