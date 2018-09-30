<?php
	session_start();
	$username=$_SESSION['username'];
	extract($_GET);
	setcookie('idlastused',$id, time()+36000000);
	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="Insert into feedback values ('$username','$dt','$txt',0,'','$id')"; // Insert values for all attributes
	mysqli_query($con,$sql);
	
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . '/webtech_project/feedbkform.php');
?>