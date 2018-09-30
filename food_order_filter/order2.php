<?php

	echo"<!DOCTYPE html>
<html>
<head>$retval = mysqli_query($con,$sql);
	<title>
		
	</title>
	<link rel='stylesheet' type='text/css' href='order.css'>
</head>
<body >
<div class='header'><p> Jalpaan </p></div> 
<form name ='frm_order'  method ='post' onsubmit=' return verify(this)' action='order1.php'>
<div class = 'or_menu'>
<label class='or'>Order</label>
<label id = 'oname'> Order </label><label id='pname'>Price</label><label id='qname'>Qty</label> <br>

<br>
<hr>
<input type='checkbox' name='soup' value='Cream of Tomato soup' id='soup' > <label id='sl'>Cream of Tomato soup</label> 
<label id='s_label'> Rs. 180/-</label>
<input type='text' name='soup_qty' id='soup_qty' maxlength='1'><br>

<input type='checkbox' name='starter' value='Paneer Tikka' id='starter'><label id='stl'>Paneer Tikka</label> 
<label id='st_label'> Rs. 340/-</label>
<input type='text' name='starter_qty' id='starter_qty'><br>

<input type='checkbox' name='main-course' value='Corn Fried Rice' id='main-course'> <label id='mcl'>Corn Fried Rice </label>
<label id='m_label'> Rs. 400/-</label>
<input type='text' name='mc_qty' id='mc_qty'><br>

<input type='checkbox' name='dessert' value='Gulab Jamoon' id='dessert'><label id='desl'> Gulab Jamoon</label>
<label id='d_label'> Rs. 150/-</label>
<input type='text' name='dessert_qty' id='dessert_qty' ><br>

<input type='Submit' name='ORDER' id='sub' value='ORDER'> 
</div>
</form>

<script>

</script>
<script type='text/javascript' src='order.js'></script>
</body>
</html>";


?>