<?php include('header.php');?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#bottom{top:2000px !important;}
			/*Show current location button*/
			button.map{
				position:absolute;
				top:200px;
				left:75px;
				background-color:rgb(223,27,41);
				padding:15px 20px;
				color:white;
			}
			/*Container to display google map*/
			#mapholder{
				position:absolute;
				top:300px;
				left:200px;
				height:250px;
				width:500px;
			}
			/*Food Delivery options*/
			.radioButton{
				position:absolute;
				width:90%;
				top:700px;
				left:75px;
			}
			.radioButton input{
				margin-bottom:75px;
			}
			.radioButton hr{
				border:2px solid rgb(223,27,41);
				margin-bottom:100px;
			}
			/*Bill summary*/
			.bill{
				position:absolute;
				top:1200px;
				left:75px;
				width:90%;
			}
			.bill table, td, th {
				border-collapse: collapse;
				border: 1px solid #ddd;
				text-align: center;
			}

			.bill table {
				width: 100%;
			}

			.bill th, td {
				padding: 15px;
			}
			.bill hr{
				border:2px solid rgb(223,27,41);
				margin-bottom:100px;
			}
			/*Submit button to confirm order*/
			.submit{
				position:absolute;
				top:1700px;
				left:75px;
				background-color:rgb(223,27,41);
				padding:20px 25px;
				transition:all;
				transition-duration;0.2s;
			}
			
			.submit:hover{background-color:lightgray;}
		</style>
	</head>
	<body>

		<button class="map" onclick="getLocation()">Show my current location</button>

		<div id="mapholder"></div>
		
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="geo_location.js"></script>
		
		<div class="radioButton">
			<hr>
			<form>
				<input type="radio" name="address" value="current"> Deliver to current location</input><br>
				<input type="radio" name="address" value="home"> Deliver to home address</input><br>
				<input type="radio" name="address" value="work"> Deliver to work address</input><br>
			</form>
			<hr>
		</div>
		
		<div class="bill">
			<h2 style="color:rgb(223,27,41);text-weight:bold;">Order Summary:</h2>
			<table>
				<tr style="background-color:rgb(223,27,41);">
					<th>Item</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
				<tr>
					<td>Dew Drop Sundae</td>
					<td>1</td>
					<td>Rs.140</td>
				</tr>
				<tr>
					<td>Death by chocolate</td>
					<td>2</td>
					<td>Rs.360</td>	

<?php
	
	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="Select * from orderDelivery";
	$res=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($res)){
			echo "<tr>";
			echo "<td>".$row['item']."</td>";
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['price']."</td>";
			echo "</tr>";
		}
	echo "</table>";

?>					
			</table>
			<br><br><br><hr>
		</div>
		<form class="submit">
			<input type="submit"></input>
		</form>
<?php include('footer.php');?>