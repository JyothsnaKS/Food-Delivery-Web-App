<?php include('header.php');?>
<?php include('reserve.php') ?>
<html>
<head>
	<style>
		.search_result{
			font-size:2.5vh;
			color: #444;
			background-color: #eee;
			margin-bottom: 6vh;
			width: 40vw;
			height: 20vh;
			border-radius: 2vh;
			padding: 2vh;
			float: right;
			position: relative;
			top: 15vh;
			right: 15vh;
			padding-left:10vh;
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
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head>
<body>

<?php
	//session_start();
	if(isset($_SESSION['rname']))
		session_unset($_SESSION['rname']);
	extract($_GET);
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="Select * from reserve";
	$res=mysqli_query($con,$sql);
	$i=0;
	
	if(isset($location)){
		if(isset($cost)){
			while($row=mysqli_fetch_assoc($res)){
				foreach($location as $x){
					if(strcmp($row['location'],$x)==0 && strcmp($row['cost'],$cost)==0){
						$arr[$i]=$row;
						$i++;
						break;
					}
				}
			}
		}
		else{
			while($row=mysqli_fetch_assoc($res)){
				foreach($location as $x){
					if(strcmp($row['location'],$x)==0){
						$arr[$i]=$row;
						$i++;
						break;
					}
				}
			}
		}
		$j=0;
		if(isset($arr)){
			if(isset($cuisine)){
				for($i=0;$i<sizeof($arr);$i++){
					foreach($cuisine as $x){
						if(strcmp($arr[$i]['cuisine'],$x)==0){
							$narr[$j]=$arr[$i];
							$j++;
							break;
						}
					}
				}
			}
			else $narr=$arr;
		}
		if(isset($narr)){
			for($i=0;$i<sizeof($narr);$i++)
				echo "<div class=\"search_result\"><pre><span class=\"rating\">".$narr[$i]['rating']."</span>".$narr[$i]['name']." ,  ".$narr[$i]['location']."</pre><pre class=\"s\"><span class=\"cuisine\">    ".$narr[$i]['cuisine']."</span>       Cost for 2 people : ".$narr[$i]['cost']."   <button class=\"reservebtn\">Reserve Now</button></pre></div>";
		}
		else echo "<script>swal({title: \"Sorry\",text: \"No restaurants of your choice is available..\",type: \"warning\",confirmButtonText: \"OK\"})</script>";

	}
	else{
		echo "<script>swal({title: \"Warning\",text: \"Please select at least one location..\",type: \"warning\",confirmButtonText: \"OK\"})</script>";
		while($row=mysqli_fetch_assoc($res)){
			$narr[$i]=$row;
			echo "<div class=\"search_result\"><pre><span class=\"rating\">".$narr[$i]['rating']."</span>".$narr[$i]['name']." ,  ".$narr[$i]['location']."</pre><pre class=\"s\"><span class=\"cuisine\">    ".$narr[$i]['cuisine']."</span>       Cost for 2 people : ".$narr[$i]['cost']."   <button class=\"reservebtn\">Reserve Now</button></pre></div>";
		}
	}
		//echo "".$arr[$i]['name']."".$arr[$i]['cost']."".$arr[$i]['location']."".$arr[$i]['cuisine']."<br>";
?>

	<script>
		var elem = document.querySelectorAll(".search_result");
		var btn = document.querySelectorAll(".reservebtn");
		for(var i=0;i<elem.length;i++){
			elem[i].setAttribute("id",i.toString());
			btn[i].addEventListener("click",reservefn,false);
		}
		function reservefn(e){
			var z= (e.target).parentNode.parentNode ;
			var s= z.firstChild.innerHTML.toString();
			s= s.split("</span>")[1];
			s = s.split(",")[0];
			window.location = "http://localhost/webtech_project/confirm_reserve.php?q=" + encodeURIComponent(s);
<?php


?>
		}
	</script>
</body>
</html>
<?php include('footer.php');?>


