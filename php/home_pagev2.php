<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="main_style.css">
		<title>Foodicted</title>
		<style>
		
			* {box-sizing:border-box}
			body {font-family:sans-serif;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  margin: auto;
			  margin-top:200px;
			}

			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			  height: 13px;
			  width: 13px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active {
			  background-color: #f2f2f2;
			}

			/* Fading animation */
			.fade {
			  animation-name: fade;
			  animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4}
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4}
			  to {opacity: 1}
			}

			.dropdown input[type=text]{
				background-color: #f9f9f9;
				border:1px solid red;
				position:relative;
				top: 450px;
				left: 2vw;
				width: 60%;
				padding: 12px 20px;
				margin: auto;
				box-sizing: border-box;
				font-size:2ex;
			}			

			.dropdown {
				position: absolute;
				top:720px;
				left:400px;
				width:50%;
				display: inline-block;
			}

			.dropdown-content {
				display: none;
				position: relative;
				top: 54.5vh;
				left: 7vw;
				background-color: #ff5e5e;
				width: 55%;
			}

			.dropdown-content p {
				color: black;
				padding: 12px 16px;
				display: block;
			}

			.dropdown-content p:hover {background-color: lightgray}

			.dropdown:hover .dropdown-content {
				display:block;
			}

			#show{
				position: relative;
				top: 58vh;
				left: 7vw;
				width: 55%;
				padding: 10px 20px;
				margin: auto;
				box-sizing: border-box;
				font-size: 4vh;
				background-color: #ff5e5e;
				color: white;
				border-radius: 10px;
				transition-property: all;
				transition-duration: 0.2s;
				transition-timing-function: ease-out;
			}
			
			#show:hover{transform:scale(1.1);}
			
			.note{
				    position: relative;
					top: 100px;
					left: 20vw;
					border: 1px solid red;
					box-shadow: gray;
					padding: 20px 10px;
					width: 800px;
					height: 250px;
					color: black;
			}
			.note hr{border:2px solid red;}
		</style>
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
			function gotodeliver(){
				window.location = "http://localhost/webtech_project/food_order_filter/filter.php";
			}
			function gotocart(){
				window.location = "http://localhost/webtech_project/last_pagev2.php";
			}
			function gotoreserve(){
				window.location = "http://localhost/webtech_project/reserveform.php";
			}
			function gotofeed(){
				window.location = "http://localhost/webtech_project/finalfeed.php";
			}
			function openNav() {
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
		<div class="slideshow-container">
			<div class="mySlides fade">
			  <div class="numbertext">1 / 3</div>
			  <img src="f1.jpg" style="height:400px;width:1000px">
			  <div class="text">Mexican Pizza</div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">2 / 3</div>
			  <img src="f2.jpg" style="height:400px;width:1000px">
			  <div class="text">Grilled Panner</div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">3 / 3</div>
			  <img src="f3.jpg" style="height:400px;width:1000px">
			  <div class="text">Grilled Sandwich with Chocolate sauce</div>
			</div>

		</div>
		<br>

		<div style="text-align:center">
		  <div class="dot"></div>
		  <div class="dot"></div>
		  <div class="dot"></div>
		</div>

		<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				var dots = document.getElementsByClassName("dot");
				for (i = 0; i < slides.length; i++) {
				   slides[i].style.display = "none";
				}
				slideIndex++;
				if (slideIndex> slides.length) {slideIndex = 1}
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";
				dots[slideIndex-1].className += " active";
				setTimeout(showSlides, 3000); // Change image every 3 seconds
			}
		</script>
		<div class="note">
			<span style="color:rgb(223,27,41)"><strong>Welcome Foodies !</strong><span>
			<hr>
			<p>Welcome to the Foodicted site. Here you can find all that can please you taste buds. Hope you enjoy our services.
			</p>
		</div>

		<div class="dropdown">
			<button id="show">SHOW RESTAURANTS</button>
			<div class="dropdown-content">
				<p class="gotofd">Bangalore</p>
				<p class="gotofd">Mumbai</p>
				<p class="gotofd">Pune</p>
			</div>
		</div>

		<div id="bottom">
			<div class="bottom-content">
				PES University, BSK 3rd Stage, Bangalore, India <br>
				Copyright &#169 PES University 2016. All rights reserved. No part of this site or its contents may be copied or replicated elsewhere<br>
			</div>
			
			<div class="icons">
				<p style="color:white">Contact the founders:
				<img class="fb" src="fb_white.png" id="link" height="40px" width="40px" style="margin-left:50px;"/>
				<img class="li" src="in_w.png" id="link" height="40px" width="40px" style="margin-left:50px;"/></p>
				<p style="color:white">Tweet about us...
				<img class="t" src="twit_w.png" id="link" height="40px" width="40px" style="margin-left:50px;"/></p>
			</div>
			<script>
				var elem = document.querySelectorAll("#link");
				var city = document.querySelectorAll(".gotofd");
				for(var i=0;i<elem.length;i++){
					elem[i].addEventListener("click",links,false);
					city[i].addEventListener("click",cities,false);
				}
				function links(e){
					var t=e.target.className;
					if(t=="fb")
						window.location = "http://facebook.com/Jyothsna.Somanna";
					if(t=="t")
						window.location = "https://twitter.com/intent/tweet?text=Check%20out%20this%20awesome%20web%20application%20called%20Foodicted";
					if(t=="li")
						window.location = "https://www.linkedin.com/in/jyothsna-somanna-087a55123";
				}
				function cities(e){
					var t=e.target.innerHTML;
					if(t=="Bangalore")
						window.location = "http://localhost/webtech_project/food_order_filter/filter.php?q=" + encodeURIComponent(t);
					if(t=="Mumbai")
						swal({title: "An ERROR occurred",text: "No restaurants are available in the requested city",type: "error",confirmButtonText: "OK"});
					if(t=="Pune")
						swal({title: "An ERROR occurred",text: "No restaurants are available in the requested city",type: "error",confirmButtonText: "OK"});

				}
			</script>
		</div>
	</body>
</html>