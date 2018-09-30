<!DOCTYPE html>
<html>
	<head>
		<title>fb</title>
		<script src="sweetalert-master/dist/sweetalert.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

		<style>
			#userfd{
				position:relative;
				top:10vh;
			}
			div[id^="fd"]{
				position:relative;
				padding:5px;
				left:5vw;
				background-color:#f7f7f7;
				color:#a7a7a7;
				border-radius:20px;
				width:75vw;
				margin-bottom:5vh;
			}
			input[name="txt"]{
				outline-color:black;
				background-color:lightgray;
			}
			input[name="txt"]:focus{
				background-color:white;
				outline-color:blue;
			}
			input[type=text]{
				display:block;
				margin-bottom:vh;
			    position: relative;
				left: 5vw;
				top:3vh;
			}
			input[id^="comsave"]{
			    position: relative;
				margin-top:5vh;
				left: 5vw;
			}
			
			textarea{
				display:block;
				margin-bottom:20px;
			    position: relative;
				left: 5vw
			}
			
			.stat{
				position:absolute;
				top:4vh;
				left:8vw;
			}
			input[id*="btnsave"]{
				margin-top:18vh;
				margin-left: 5vw;
			}
			input[id$="btnsave"]{
				position: relative;
				top: -8vh;
				margin-top:15vh;
				margin-left: 5vw;
			}

			fieldset{
				display:none;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<script>
			<?php
				if (isset($_COOKIE['idlastused'])){
					$temp=$_COOKIE['idlastused'];
					$temp=substr($temp,2);
					echo "var c =\"$temp\";c++;";
				}
				else
					echo "var c=1;";
				
				if (isset($_SESSION['username'])){
					echo "var username =\"".$_SESSION['username']."\";";
				}
				else
					echo "var username=\"\";swal({title: \"You need to login to post a feedback\",text:\"\",type: \"warning\",confirmButtonText: \"OK\"});";
			?>
			//var c=10;
			var cc=c+1;
			var month = ['Jan','Feb','Mar','April','May','June','July','Aug','Sept','Oct','Nov','Dec']
			
			function sa(){
				swal({title: "Warning",text: "Cannot submit empty text!",type: "warning",confirmButtonText: "OK"});
			}

			// to enable and disable buttons when one is clicked
			var stat_state=0;
			var comment_state=0;
			var reply_state=0;
			// add user feedback to the list of feedbacks
			function add(){
				if (stat_state==1)
					return 0;
				else{
					stat_state=1;
					comment_state=1;
					reply_state=1;
					var maindiv=document.createElement("div");
					
					// create textbox for user input
					var collcontent=document.createElement("input");
					collcontent.setAttribute("type","text");
					collcontent.setAttribute("name","txt");
					collcontent.setAttribute("placeholder","Type your feedback here");
					//collcontent.setAttribute("rows","5");
					//collcontent.setAttribute("cols","100");
					
					// save the entered feedback
					var savebtn=document.createElement("input");
				
					savebtn.setAttribute("value","Submit");
					savebtn.setAttribute("id","btnsave");
					savebtn.setAttribute("type","submit");
					savebtn.setAttribute("onclick","savefn(this.id)");

					maindiv.appendChild(collcontent);
					maindiv.appendChild(savebtn);
					var z=document.getElementById("userfd");
					z.appendChild(maindiv);
				}
			}
			
			function savefn(x){	
				var date=new Date();
				var hours =(date.getHours()<10)?('0'+date.getHours()):date.getHours();
				var min =(date.getMinutes()<10)?('0'+date.getMinutes()):date.getMinutes();
				sd =month[date.getMonth()]+" "+date.getDate()+" , "+date.getFullYear()+" "+hours+":"+min;
				z=(date.getHours()>=12)?'pm':'am';
				sd+=z;
				var btn=document.getElementById(x);
				var maindiv=btn.parentNode;
				var status=btn.parentNode.children[0].value;
				
				if(status=='')
					sa();
				else if(username!=""){
					while(btn.parentNode)
						btn.parentNode.removeChild(btn.parentNode.firstChild);
					$.get("some.php",{txt:status,dt:'#'+sd, id:"fd"+c});
					maindiv.setAttribute("id","fd"+c);
					maindiv.innerHTML="<strong style=\"position:absolute;top:1vh;left:5vw;color:black\">"+username+"<br></strong><p class=\"stat\"><span style=\"color:blue;\"># "+sd+"</span><br><span>"+status+"</span></p>";
					
					var likebtn=document.createElement("input");
					likebtn.setAttribute("type","button");
					likebtn.setAttribute("value","Like(0)");
					likebtn.setAttribute("id","likebtnsave"+cc);
					likebtn.setAttribute("onclick","likefn(this.id)");
					
					var commentbtn=document.createElement("input");
					commentbtn.setAttribute("type","button");
					commentbtn.setAttribute("value","Comment");
					commentbtn.setAttribute("id","commentbtnsave"+c);
					commentbtn.setAttribute("onclick","commentfn(this.id)");
					
					var delbtn=document.createElement("input");
					delbtn.setAttribute("type","button");
					delbtn.setAttribute("value","Delete");
					delbtn.setAttribute("id","delbtnsave"+c);
					delbtn.setAttribute("onclick","delfn(this.id)");
					c++;

					maindiv.appendChild(likebtn);
					maindiv.appendChild(commentbtn);
					maindiv.appendChild(delbtn);
					stat_state=0;
					comment_state=0;
					reply_state=0;
				}
				else
					swal({title: "You need to login to post a feedback",text:"",type: "warning",confirmButtonText: "OK"});
			}
			
			// to increase likes for a feedback
			function likefn(x){
				var btn=document.getElementById(x);
				var s = btn.getAttribute("value");
				var par=btn.parentNode;
				var start = s.indexOf('(');
				var end = s.indexOf(')');
				var n = Number(s.slice(start+1,end))+1;
				
				var s=((par.children[1]).children[2]).innerHTML;

				$.get("some1.php",{status:s,lk:n});
				btn.setAttribute("value","Like("+n.toString()+")");
			}

			//to comment on the feedback
			function commentfn(x){
				if (comment_state==1)
					return 0;
				else{
					stat_state=1;
					comment_state=1;
					var btn=document.getElementById(x);
					
					var cdiv=document.createElement("div");
					var txt=document.createElement("input");
					txt.setAttribute("type","text");
					txt.setAttribute("id","com-text"+c);
					txt.setAttribute("placeholder","Enter your comment here");
					var savebtn=document.createElement("input");
					savebtn.setAttribute("value","comment");
					savebtn.setAttribute("id","comsave"+cc);
					savebtn.setAttribute("type","button");
					savebtn.setAttribute("onclick","com(this.id)");
					
					btn.parentNode.appendChild(cdiv);
					cdiv.appendChild(txt);
					cdiv.appendChild(savebtn);
				}
			}
			
			//to read comment and save it
			function com(x){
				var elem=document.getElementById(x);
				var maindiv=elem.parentNode;
				var s=maindiv.firstChild.value;
				if(s=='')
					sa();
				else{
					cc++;
					var p = maindiv.parentNode;
					pv = p.getAttribute("id");
					$.get('some3.php',{txt:s,status:pv});
					p.removeChild(p.lastChild);
					
					ptag=document.createElement("p");
					ptag.style.position="relative";
					ptag.style.left="10vw";
					ptag.innerHTML="Comment : "+s;
					p.appendChild(ptag);
					
					stat_state=0;
					comment_state=0;
				}
			}
			
			//to delete the whole feedback
			function delfn(x){
				stat_state=0;
				comment_state=0;
				reply_state=0;

				var elem=document.getElementById(x);
				
				var s=((elem.parentNode.children[1]).children[2]).innerHTML;
				$.get("some2.php",{status:s});
				var par=elem.parentNode.parentNode;
				par.removeChild(elem.parentNode);
			}
			
		</script>
	</head>
	
	<body>
	<div id="userfd">
		<?php	
		$c=1;
		//Create a connection to the DB Server
		$con=mysqli_connect('localhost','root','','foodicted');
		$sql="Select * from feedback";
		$res=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($res)){
			echo "<div id=".$row['divid'].">";
			$c=$c+1;
			echo "<strong style=\"position:absolute;top:1vh;left:5vw;color:black\">".$row['username']."<br></strong>";
			echo "<p class=\"stat\"><span style=\"color:blue;\">".$row['postdate']."</span><br><span>".$row['post']."</span></p>";
			echo "<input type=\"button\" value=\"Like(".$row['likes'].")\" id=\"likebtnsave$c\" onclick=\"likefn(this.id)\">
			<input type=\"button\" value=\"Comment\" id=\"commentbtnsave$c\" onclick=\"commentfn(this.id)\">";
			if($row['filename']!=''){
				$myfile = fopen("".$row['filename']."", "r") or die("Unable to open file!");
				echo fread($myfile,filesize("".$row['filename'].""));
				fclose($myfile);
			}
			echo "</div>";
		}
		?>
		<input type="button" value="Update Status" style="position:relative;top:-5vh;left: 5vw;margin-top: 5vh;" onclick="add()"/>
			
	</div>
	</body>
	
</html>