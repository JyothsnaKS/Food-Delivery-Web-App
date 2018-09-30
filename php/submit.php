<?php
	include('header.php');
	extract($_GET);
	if(!isset($address))
		echo "<h3 style=\"position:relative;top:10vh;left:10vh;\">Please select an address option and resubmit.</h3>";
	else{
	// Authorisation details.
	$username = "jyo.somanna@gmail.com";
	$hash = "8c98b7bc5923ee7f9886f89b53cf1c54db5b4b6d";
	
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0"; // 1 is for testing
	
	// Data for text message. This is the text message data.
	$sender = urlencode("TXTLCL"); // This is who the message appears to be from.
	$numbers = urlencode("9663129500"); // A single number or a comma-seperated list of numbers
	$message = urlencode("Your order will be delivered to $address address. Your order will be delivered in an hour. Thank you for choosing us.");

	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test."";
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	echo $result;
	curl_close($ch);
	echo "<h3 style=\"position:relative;top:10vh;left:10vh;\">Your order has been successfully placed.Your order will be delivered to your $address address</h3>";
	}	
	include('footer.php');
?>


