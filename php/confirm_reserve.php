<?php include('header.php');?>
	<style>
		#bottom{top:500px !important;}
		.search_result{
			font-size: 2.5vh;
			color: #444;
			background-color: #eee;
			margin-bottom: 6vh;
			width: 50vw;
			border-radius: 2vh;
			padding: 2vh;
			float: center;
			position: relative;
			top: 35vh;
			left: 15vh;
			padding-left: 10vh;
		}
		.s{font-size:2vh;}
		.cuisine{
			color: #7db701;
			font-size:2.5vh;
		}
		.rating{
			color: white;
			font-size: 2.5vh;
			border-radius: 4vh;
			padding: 2vh;
			margin: 3vh;
			background-color: #7db701;
		}
		.reservebtn{
			color: white;
			font-size: 3vh;
			background-color: #f97157;
			padding: 1vh 4vh;
			border-radius: 1vh;
		}
		.filter_name{
			font-size:20px;
		}
		label{
			font-size:15px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head>
<body>
	<div class="search_result">
<?php
	extract($_GET);
	//session_start();
	if(!isset($_SESSION['rname']))
		$_SESSION['rname']=$q;
	elseif(isset($_SESSION['rname']) && (!isset($ppl)||!isset($time)))
		echo"<script>swal({title: \"ERROR\",text: \"Please fill in the fields...\",type: \"error\",confirmButtonText: \"OK\"})</script>";
	echo "<p>".$_SESSION['rname']."</p>";
?>
	<form action="">
			<label class="filter_name">Number of people :</label><br>
			<label><input type="radio" name="ppl" value="2"/> 2</label><br>
			<label><input type="radio" name="ppl" value="4"/> 4</label><br>
			<label><input type="radio" name="ppl" value="6"/> 6</label><br>
			<br>
			<label class="filter_name">Reservation Time :</label><br>
			<label><input type="radio" name="time" value="1930"/> 7 : 30  PM</label><br>
			<label><input type="radio" name="time" value="2000"/> 8 : 00  PM</label><br>
			<label><input type="radio" name="time" value="2030"/> 8 : 30  PM</label><br>
			<label><input type="radio" name="time" value="2100"/> 9 : 00  PM</label><br>
			<label><input type="radio" name="time" value="2130"/> 9 : 30  PM</label><br>
			<br>
			<input type="submit"/></label><br>
	</form>
<?php
	if(isset($ppl) && isset($time)){
		$con=mysqli_connect('localhost','root','','foodicted');
		$q=$_SESSION['rname'];
		$z=$ppl."table";
		$sql="Select * from tablestat where name='$q'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		$y=$row["$z"];
		$y=$y-1;
		if($y<=0)
			echo"<script>swal({
			  title: \"SORRY !\",
			  text: \"Our restaurant is running full\",
			  timer: 2000,
			  showConfirmButton: false
			});</script>";
		elseif(isset($_SESSION['username'])){
			$sql="UPDATE tablestat SET $z"."=$y WHERE name='$q'";
			mysqli_query($con,$sql);
			/*email confirmation*/
			
			require_once "Mail.php";
			include('Mail/mime.php');
			$from = "Jyothsna Somanna <jyo.somanna@gmail.com>";
			$to = "Jyothsna Somanna <jyo.somanna@gmail.com>";
			$subject = "Foodicted - Reservation Confirmation";
			$body = "Hi!\n\tYour reservation has been confirmed at $time hrs for $ppl people.\n\nCheers\nFoodicted Team";
			 
			$text = 'Text version of email';// text and html versions of email.
			$html = '<html><body>HTML version of email. <strong>This should be bold</strong></body>        </html>';
						 
			$host = "smtp.gmail.com";
			$username = "jyo.somanna@gmail.com";
			$password = "coolsurfer890";
			 
			$headers = array ('From' => $from,
			  'To' => $to,
			  'Subject' => $subject);
		
			$smtp = Mail::factory('smtp',
			  array ('host' => $host,
			 'auth' => true,
			 'username' => $username,
			 'password' => $password));
			 
			$mail = $smtp->send($to, $headers, $body);
			 
			if (PEAR::isError($mail)) echo"<script>swal({title: \"Unexpected error occurred\",text: \"We'll get back to you soon but your table has been reserved\",type: \"error\",confirmButtonText: \"OK\"})</script>"; 
			else echo "<script>swal(\"Reservation confirmed!\", \"A confirmation has been sent to the registered email address\", \"success\")</script>";
		}
		else
			echo "<script>swal({title: \"Error\",text: \"Please login first\",type: \"error\",confirmButtonText: \"OK\"})</script>";
	}
?>
	</div>
</body>
</html>
<?php include('footer.php');?>