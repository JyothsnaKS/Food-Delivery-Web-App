<?php
extract($_POST);
session_start(); 					
$conn = mysqli_connect('localhost','root','', 'foodicted');
					// Check connection
	if(!$conn)
	{
		 echo "Error: Unable to connect to MySQL." . PHP_EOL;
		 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		 exit;	
	}


	$name = $_POST['name'];
	$uname = $_POST['uname'];
	if(empty($uname))
	{ $uname = $name;}
	$phno = $_POST['number'];
	if(empty($phno))
	{ echo "<script> alert('$phno') ;</script>" ;}
	$email = $_POST['email'];
	//$cpwd = $_POST['cpassword'];
	$pwd = $_POST['password'];
	$add = $_POST['add'];
	
	$sql = "INSERT INTO detail (name, uname, phno, email, password, address)VAlUES('$name','$uname',$phno ,'$email','$pwd','$add')";
	$retval = mysqli_query($conn,$sql);
	mysqli_close($conn);
	echo"
	<!DOCTYPE html>
	<html>
	<head>
	<style>
	 #pic
	 {
	 	position: absolute;
	 	top: 30%;
	 	left:40%;
	 	width: 20%;
	 	height: 30%;
	 }
	 #txt
	 {
	 	position: absolute;
	 	top: 65%;
	 	left:35%;
	 }
	 </style>
	</head>
	<body>
	<img src='thankyou.jpg' id ='pic'>
	<p id='txt'>Thank you for signing up with us. <a href='http://localhost/webtech_project/login.php'>Click here </a>to sign in.</p>
	</body>
	</html>";

?>
	