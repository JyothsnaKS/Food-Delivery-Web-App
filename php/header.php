<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<!--Feedback styles-->
		<link rel="stylesheet" type="text/css" href="feed_style.css">
		<link rel="stylesheet" type="text/css" href="main_style.css">
		<script src="sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

		<title>Foodicted</title>
		<script>
			function login(){
				//$.get("login.php");
				window.location = "http://localhost/webtech_project/login.php";
			}
			function logout(){
				$.get("logout.php");
				window.location = "http://localhost/webtech_project/home_pagev2.php";
			}
			function signup(){
				window.location = "http://localhost/webtech_project/sign_up.php";
			}
			function gotohome(){
				window.location = "http://localhost/webtech_project/home_pagev2.php";
			}
			function gotoreserve(){
				window.location = "http://localhost/webtech_project/reserveform.php";
			}
			function gotodeliver(){
				window.location = "http://localhost/webtech_project/food_order_filter/filter.php";
			}
			function gotocart(){
				window.location = "http://localhost/webtech_project/last_pagev2.php";
			}
			function gotofeed(){
				window.location = "http://localhost/webtech_project/finalfeed.php";
			}
			function openNav(){
				document.getElementById("myNav").style.width = "30%";
			}
			function closeNav() {
				document.getElementById("myNav").style.width = "0%";
			}
		</script>
	</head>
	
	<body>		
		
		</div><div id="myNav" class="overlay">

		<!-- Button to close the overlay navigation.void(0) evaluates to undefined and redirects browser to the same page -->
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 

		<!-- Overlay content -->
		<div class="overlay-content">
		<a style="cursor:pointer" onclick="gotohome()">Home</a>
		<a style="cursor:pointer" onclick="gotodeliver()">Food Delivery</a>
		<a style="cursor:pointer" onclick="gotocart()">Go to my order cart </a>
		<a style="cursor:pointer" onclick="gotoreserve()">Table Reservation</a>
		<a style="cursor:pointer" onclick="gotofeed()">Feedback</a>
		</div>

		</div>
		
		<div id="topHome">
			<div id="menuIcon" onclick="openNav()"><img src="home.png" height="40px" width="40px"/></div>
			<div id="name">Foodicted</div>
		<?php
			//session_start();
			if(isset($_SESSION["username"]) && $_SESSION["username"]!="" )
				echo "<h3 style=\"position:absolute;left:68vw;\">Welcome ".$_SESSION["username"]."</h3>
					  <button class=\"button2\" onclick=\"logout()\">LOG OUT</button>";
			else
				echo "<h3 style=\"position:absolute;left:62vw;\">Welcome Guest</h3>
					  <button class=\"button1\" onclick=\"login()\">LOG IN</button>
					  <button class=\"button2\" onclick=\"signup()\">SIGN UP</button>";		
		?>
		</div>