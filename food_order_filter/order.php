<?php
	
	echo"<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel='stylesheet' type='text/css' href='order.css'>
</head>
<body >
<div class='header'><p> Mainland China</p></div> 
<form name ='frm_order'  method ='post' onsubmit=' return verify(this)' action='order1.php'>
<div class = 'or_menu'>
<label class='or'>Order</label>
<label id = 'oname'> Order </label><label id='pname'>Price</label><label id='qname'>Qty</label> <br>

<br>
<hr>
<input type='checkbox' name='soup' value='Veg Sweet Corn soup' id='soup' > <label id='sl'>Veg Sweet Corn soup</label> 
<label id='s_label'> Rs. 190/-</label>
<input type='text' name='soup_qty' id='soup_qty' maxlength='1'><br>

<input type='checkbox' name='starter' value='Chilli Teriyaki Potatoes' id='starter'><label id='stl'>Chilli Teriyaki Potatoes</label> 
<label id='st_label'> Rs. 395/-</label>
<input type='text' name='starter_qty' id='starter_qty'><br>

<input type='checkbox' name='main-course' value='Fiery Sapo Vegetable' id='main-course'> <label id='mcl'>Fiery Sapo Vegetable </label>
<label id='m_label'> Rs. 430/-</label>
<input type='text' name='mc_qty' id='mc_qty'><br>

<input type='checkbox' name='dessert' value='Honey Noodles' id='dessert'><label id='desl'>Honey Noodles </label>
<label id='d_label'> Rs. 170/-</label>
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
