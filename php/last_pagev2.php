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
				position: absolute;
				top: 50vh;
				left: 6vw;
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
				top:160vh;
				background-color:rgb(223,27,41);
				padding:20px 25px;
				transition:all;
				transition-duration;0.2s;
			}
			.submit:hover{background-color:lightgray;}
			#address{
				position: relative;
				top: 31vh;
				left: 5vw;
				font-size: 18px;
			}
		</style>
	</head>
		<script>
			//var elem=document.querySelector(".submit");
			//elem.addEventListener("click",gotosubmit,false);
			function gotosubmit(e){
				var elem1=document.querySelector("form");
				var elem2=document.querySelector("#address");
				q=elem2.innerHTML;
				<?php
					if(!isset($_SESSION['username']))
						echo "swal({title: \"Error\",text: \"Please login first\",type: \"error\",confirmButtonText: \"OK\"});return false;";
				?>
			}
		</script>
	<body>

	<button class="map">Your current location</button>
	<?php include('geo.php');?>
		<div class="radioButton">
			<hr>
			<form action="submit.php" onsubmit="return gotosubmit()">
				<input type="radio" name="address" value="current"> Deliver to current location</input><br>
				<input type="radio" name="address" value="home"> Deliver to home address</input><br>
				<input type="radio" name="address" value="work"> Deliver to work address</input><br>
				<input type="submit" class="submit"/>
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

<?php
	
	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="Select * from orderDelivery";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)==0)
		echo "<script>swal({title: \"Your cart is empty\",text: \"Please place an order and come back here\",type: \"warning\",confirmButtonText: \"OK\"})</script>";

	while($row=mysqli_fetch_assoc($res)){
		echo "<tr>";
		echo "<td>".$row['item']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>Rs.".$row['price']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	$sql="Select sum(price) as billsum from orderDelivery";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	echo "<h2 style=\"color:rgb(223,27,41);\">Total bill : ".$row['billsum']."</h2>";
?>					
			<br><br><br><hr>
		</div>
		
<?php include('footer.php');?>