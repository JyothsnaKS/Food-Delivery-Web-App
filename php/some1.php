<?php
	extract($_GET);

	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="UPDATE feedback SET likes=$lk WHERE post='$status'";
	mysqli_query($con,$sql);
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . '/webtech_project/feedbkform.php');
?>
