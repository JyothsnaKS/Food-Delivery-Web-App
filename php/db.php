<?php
	extract($_GET);
		
	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','foodicted');
	$sql="Select * from feedback";
	$res=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($res)){
		echo "<div id=\"fd$c\">";
		$c=$c+1;
		echo "<strong style=\"position:absolute;top:1vh;left:5vw;color:black\">".$row['username']."<br></strong>";
		echo "<p class=\"stat\"><span style=\"color:blue;\">".$row['postdate']."</span><br>".$row['post']."</p>";
		echo "<input type=\"button\" value=\"Like(0)\" id=\"likebtnsave$c\" onclick=\"likefn(this.id)\">
		<input type=\"button\" value=\"Comment\" id=\"commentbtnsave$c\" onclick=\"commentfn(this.id)\">
		echo "</div>";
		}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . '/webtech_project/feedbkform.php');

?>