<?php include('header.php');?>
<!DOCTYPE HTML>
<html>
	<head> 
		<title>
			Login page
		</title>
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>

	<body>
		<div class='image'></div>
		<form class="main" action="trialv1.php" method="get" onsubmit="check(this)" name ="main">
		<div class ="login">
		<h2 class = "login">
		 Sign-in
		</h2>
		<hr>
		<br>
		<label class = "dets"> Email id:</label>
  		<input type="text" name="email" placeholder="Enter your email ID" id="email">
 		<br><br>
  		<label class="dets">Password: </label>
		<input type="password" name="password" placeholder="Enter your password" id="password">
  		<br>
  		<br>
		<input type="submit" value="Sign in" id="signin">
		<br>
		 <a href="sign_up.html" class = "text1"> Sign up </a>
		</div>
		</form>
		<script type="text/javascript" src = "validate.js" ></script>
	</body>
	
</html>
<?php include('footer.php');?>