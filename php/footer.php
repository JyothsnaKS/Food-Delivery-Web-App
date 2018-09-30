<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="main_style.css">
		<title>Foodicted</title>
		<style>
			#bottom{top:1250px;}
		</style>
	</head>
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
				for(var i=0;i<elem.length;i++)
					elem[i].addEventListener("click",links,false);
				function links(e){
					var t=e.target.className;
					if(t=="fb")
						window.location = "http://facebook.com/Jyothsna.Somanna";
					if(t=="t")
						window.location = "https://twitter.com/intent/tweet?text=Check%20out%20this%20awesome%20web%20application%20called%20Foodicted";
					if(t=="li")
						window.location = "https://www.linkedin.com/in/jyothsna-somanna-087a55123";
				}
			</script>
		</div>
	</body>
</html>