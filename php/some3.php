<?php
	extract($_GET);
	
	$txtfile=$status.".txt";

	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="SELECT filename from feedback WHERE divid='$status'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	if($row['filename']==''){
		$sql="UPDATE feedback SET filename='$txtfile' WHERE divid='$status'";
		mysqli_query($con,$sql);
		$myfile = fopen("$txtfile", "w") or die("Unable to open file!");
	}
	else $myfile = fopen("$txtfile", "a") or die("Unable to open file!");

	fwrite($myfile, "<p style=\"position: relative;left: 10vw;\">Comment : $txt</p>");
	fclose($myfile);

	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . '/webtech_project/feedbkform.php');
?>