<!DOCTYPE html>
<html>
	<head>
		<title>
		
		</title>
		<link rel="stylesheet" type="text/css" href="sign_up.css">
	</head>
	<body>

	<form name ='frm_signup'  method ='post' onsubmit=" return validate(this)" action="signup-v1.php">
	<!-- if validate() returns true the the submit will be successfull else re-eval -->
	<div class ='first'> </div>
	<div class ='second'></div>
	<div class ='third'></div>
	<div class ='fourth'></div>
	<div class ='sign-in'> 
	<label class="head">
			Sign up 
	</label>
	<!-- name -->
	<label class ='name' id="txt">  Name<span class='red'>*</span> : </label>
	<input type="text" name="name" id='name' />
	<!-- username -->
	<label class ='uname' id ='txt'> User Name : </label>
	<input type="text" name="uname" id='uname' />
	<!-- phone -->
	<label class ='number' id="txt"> Phone Number<span class='red'>*</span> : </label>
	<input type="text" name="number" id='number' />
	<!-- email -->
	<label class = 'email' id="txt"> Email id<span class='red'>*</span> :</label>
	<input type="text" name="email" id='email' />
	<!-- password -->
	<label class = 'password' id="txt"> Password<span class='red'>*</span> :</label>
	<input type="password" name="password" id='password' />
	<!-- confirm password -->
	<label class = 'cpassword' id="txt"> Confirm password<span class='red'>*</span>:</label>
	<input type="password" name="cpassword" id='cpassword' />
	<!-- address -->
	<label class = 'add' id="txt"> Address :</label>
	<textarea id="add" name="add"></textarea> 
	<!-- submit machine -->
	<input type="submit" value="Sign up" id="signup">
	</form>



	</div>
	<script type="text/javascript" src = "check.js" ></script>
	
	</body>
</html>
	