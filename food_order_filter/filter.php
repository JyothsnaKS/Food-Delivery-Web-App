<?php
error_reporting(0);
echo"<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<link rel='stylesheet' type='text/css' href='filter.css'>
<body>

<form name='frm_filter' class='m' method ='post' action='filter.php' >
<label id = 'tl'>Type </label><label id = 'price_l'>Price range </label><label id = 'rl'>Rating </label><label id = 'place_label'>Place </label>

	<div id= 'type'  class='tdivs'>
			<input type='checkbox' name='type[]' id ='tc' class ='tc' value='chinese'>Chinese <br>
		<input type='checkbox' name='type[]' id ='ti' class ='ti' value='italian'>Italian <br>
		<input type='checkbox' name='type[]' id ='tin' class ='tin' value='indian'>Indian <br>
	</div>
	<div id= 'price' class='pdivs'>
	<input type='checkbox' name='price[]' id ='lp' class ='pr' value='500'>250-500<br>
		<input type='checkbox' name='price[]' id ='mp' class ='pr' value='1000'>500-1000<br>
		<input type='checkbox' name='price[]' id ='lp' class ='pr' value='2000'>1000 and above<br>
	</div>
	<div id= 'rating' class='rdivs'>
		<input type='checkbox' name='rate[]' id ='three' class ='r' value='3'>3<br>
		<input type='checkbox' name='rate[]' id ='four' class ='r' value='4'>4<br>
		<input type='checkbox' name='rate[]' id ='five' class ='r' value='5'>5<br>	
	</div>
	<div id= 'v-n' class='placedivs'>
		<input type='checkbox' name='place[]' id = 'blore' class ='v' value ='Bangalore'>Bangalore<br>
		<input type='checkbox' name='place[]' id ='hyder' class='v' value='Hyderabad'>Hyderabad<br>
		<input type='checkbox' name='place[]' id ='mum' class='v' value='Mumbai'>Mumbai<br> 	

	</div>
	<input type='submit' name='Submit' value ='SUBMIT' id='sub'>
	<form name = 'reset_frm' action = 'filter.html'>
	<input type='reset' name='Reset' value =RESET id='reset'>
	</form>

</form>

<div class='default' id='def'>
	<p>Select any type of restaurant.</p>
</div>
<!-- <script type='text/javascript' src ='filter.js'></script>
 --></body>
</html>";
	extract($_POST);
	
	$con = mysqli_connect('localhost','root','','foodicted');
	if(!$con)
	{
		 echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
		 echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
		 echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
		 exit;	
	}
	$t = array_key_exists('type', $_POST);
	$p = array_key_exists('price', $_POST);
	$r = array_key_exists('rate', $_POST);
	$pl = array_key_exists('place', $_POST);
	//echo"$t";
	$tnum=0;
	$pnum=0;
	$rnum=0;
	$plnum=0;
	$sql ="";

	echo "<script>";
	echo " var def = document.getElementById('def');";
 	echo "var p = document.querySelector('p');";
	echo"def.removeChild(p);</script>";
	if(!$t && !$p && !$r && !$pl)
	{
		$sql ="SELECT res_name  from res";
	}	

	
	
	else{
		//echo"$tnum <br> $pnum <br> $rnum <br> $plnum<br>";
			$t1 ='';
			$t2 ='';
			$t3 ='';
			$p1 ='';
			$p2 ='';
			$p3 ='';
			$pl1 ='';
			$pl2 ='';
			$pl3 ='';
			$r1 ='';
			$r2 ='';
			$r3 ='';

			if(($t==1))
			{
				$tnum =sizeof($_POST['type']);
				for($i = 0; $i<$tnum ; $i=$i+1)

				{
					
					
					if($_POST['type'][$i]=="chinese")
					{
						$t1=$_POST['type'][$i];
						echo "<script>";
						echo "document.getElementById('tc').checked = true;</script>";
					}
					elseif ($_POST['type'][$i]=="italian") 
					{
						$t2=$_POST['type'][$i];
						echo "<script>";
						echo "document.getElementById('ti').checked = true;</script>";
					}
			
					else
					{
						$t3=$_POST['type'][$i];
						echo "<script>";
						echo "document.getElementById('tin').checked = true;</script>";
					}
					
				}
			}

			if(($p==1))
			 {
			 	$pnum =sizeof($_POST['price']);
			    for($i = 0; $i<$pnum ; $i=$i+1)

				{
					if($_POST['price'][$i]==500)
					{
						$p1=$_POST['price'][$i];
						echo "<script>";
						echo "document.getElementById('lp').checked = true;</script>";

					}
					elseif ($_POST['price'][$i]==1000) 
					{
						$p2=$_POST['price'][$i];
						echo "<script>";
						echo "document.getElementById('mp').checked = true;</script>";
					}
					else
					{
						$p3=$_POST['price'][$i];
						echo "<script>";
						echo "document.getElementById('lp').checked = true;</script>";
					}
					
				}
			}
			// echo" p1 = $p1<br>p2 = $p2 <br>p3= $p3 <br>";
			if(($pl==1))
			 {
			 	$plnum =sizeof($_POST['place']);
			    for($i = 0; $i<$plnum ; $i=$i+1)

				{
					if($_POST['place'][$i]== "Bangalore")
					{
						$pl1=$_POST['place'][$i];
						echo "<script>";
						echo "document.getElementById('blore').checked = true;</script>";
					}
					elseif ($_POST['place'][$i]=="Hyderabad") 
					{
						$pl2=$_POST['place'][$i];
						echo "<script>";
						echo "document.getElementById('hyder').checked = true;</script>";
					}
					else
					{
						$pl3=$_POST['place'][$i];
						echo "<script>";
						echo "document.getElementById('mum').checked = true;</script>";
					}
					
				}
			} 
			if(($r==1))
			 {
			 	$rnum = sizeof($_POST['rate']);
			    for($i = 0; $i<$rnum ; $i=$i+1)

				{
					if($_POST['rate'][$i]==3)
					{
						$r1=$_POST['rate'][$i];
						echo "<script>";
						echo "document.getElementById('three').checked = true;</script>";
					}
					elseif ($_POST['rate'][$i]==4) 
					{
						$r2=$_POST['rate'][$i];
						echo "<script>";
						echo "document.getElementById('four').checked = true;</script>";
					}
					else
					{
						$r3=$_POST['rate'][$i];
						echo "<script>";
						echo "document.getElementById('five').checked = true;</script>";
					}
					
				}
			}
		}
			
		if($tnum==1||$pnum==1|| $plnum==1 || $rnum==1)
		{	
			if($pnum==0 && $plnum==0 && $rnum==0)
			{$sql ="SELECT res_name  from res WHERE type = '".$t1."' OR type='".$t2."' OR type='".$t3."'";}
		elseif($tnum==0 && $plnum==0 && $rnum==0)
				{	
					if($p1!=''&&$p2==''&&$p3=='')
					$sql ="SELECT res_name  from res WHERE price<'".$p1."'";
					if($p1==''&&$p2!=''&&$p3=='')
					$sql ="SELECT res_name  from res WHERE price>='500' and price <'".$p2."'"; 
					if($p1==''&&$p2==''&&$p3!='')
					$sql ="SELECT res_name  from res WHERE price>='1000' and price <'".$p3."'"; 

				}
			
		elseif($tnum==0 && $pnum==0 && $plnum==0 )
				{	
					if($r1!=''&&$r2==''&&$r3=='')
					$sql ="SELECT res_name  from res WHERE rating ='".$r1."'";
					if($r1==''&&$r2!=''&&$r3=='')
					$sql ="SELECT res_name  from res WHERE rating ='".$r2."'";
					if($r1==''&&$r2==''&&$r3!='')
					$sql ="SELECT res_name  from res WHERE rating ='".$r3."'"; 

				}
		elseif($tnum==0 && $pnum==0 && $rnum==0 )
			{	
				if($pl1!=''&&$pl2==''&&$pl3=='')
				$sql ="SELECT res_name  from res WHERE place ='".$pl1."'";
				if($pl1==''&&$pl2!=''&&$pl3=='')
				$sql ="SELECT res_name  from res WHERE place ='".$pl2."'";
				if($pl1==''&&$pl2==''&&$pl3!='')
				$sql ="SELECT res_name  from res WHERE place ='".$pl3."'"; 

			}
		else
		{
			if($t1)//for chinese food in the price range of 500-10000 	with 4 stars in bangalore 
		{$sql="SELECT res_name from res where type= '".$t1."' and price>='500' and price <'".$p2."'and rating =".$r2." and place = '".$pl1."'";}
		if($t1&&$t3)//for chinese and indian food in the price range of 500-10000 	with 4 stars in bangalore 
		{
			$sql="SELECT res_name from res where type= '".$t1."' or type= '".$t3."' and price>='500' and price <'".$p2."'and rating =".$r2." and place = '".$pl1."'";
		}
		else // for indian food in the price range of 250-500 with 3 stars in bangalore
		{
			$sql="SELECT res_name from res where type= '".$t3."' and price <'".$p1."'and rating =".$r1." and place = '".$pl1."'";}
		}

		}
		
		

$res = $con->query($sql);
	
if(!$res)die();
$r = $res->num_rows;
if($r == 0)
{
	echo"<script> var def = document.getElementById('def');";
	$val = "No results found. Try Again!";
	 $sval ="\"".$val."\"";
	echo"def.innerHTML = '<p>' +".$sval."+ '<br> </p>';";
	 // $sval ="\"".$val."\"";
}
else{
		echo"<script> var def = document.getElementById('def');";


		for($j=0;$j<$r;$j++)
		{
			
			$res->data_seek($j);
			$row =$res->fetch_array(MYSQLI_ASSOC);
			$val = $row['res_name'];
			if($val=='Mainland China')
			{
				echo "var ch = document.createElement('div');";
				echo"ch.setAttribute('class','child');";
				$sval ="\"".$val."\"";
				echo"ch.innerHTML = ".$sval."+'<br><br>';";
				echo" var ch2 = document.createElement('input');";
				echo"ch2.setAttribute('type','button');";
				echo "ch2.setAttribute('value','Order now!');";
				echo "ch2.setAttribute('id','order_btn');";
				echo "var e =ch2.addEventListener('click',dem,false);";
				echo" function dem(e){window.location.assign('order.html');}";
				echo "ch.appendChild(ch2);";
				echo"def.appendChild(ch);";	
			}
			if($val =='Jalpaan')
			{
				echo "var ch = document.createElement('div');";
				echo"ch.setAttribute('class','child');";
				$sval ="\"".$val."\"";
				echo"ch.innerHTML = ".$sval."+'<br><br>';";
				echo" var ch2 = document.createElement('input');";
				echo"ch2.setAttribute('type','button');";
				echo "ch2.setAttribute('value','Order now!');";
				echo "ch2.setAttribute('id','order_btn');";
				echo "var e =ch2.addEventListener('click',dem,false);";
				echo" function dem(e){window.location.assign('order2.php');}";
				echo "ch.appendChild(ch2);";
				echo"def.appendChild(ch);";
				
			}
			else if($val!='Mainland China'&&$val !='Jalpaan')
			{
			 echo "var ch = document.createElement('div');";

			 echo"ch.setAttribute('class','child');";
			 $sval ="\"".$val."\"";
			// echo "var val = '".$val."';";
			 echo"ch.innerHTML = ".$sval."+'<br><br>';";
			 echo" var ch2 = document.createElement('input');";
			echo"ch2.setAttribute('type','button');";
			echo "ch2.setAttribute('value','Order now!');";
			echo "ch2.setAttribute('id','order_btn');";
			//echo "var e =ch2.addEventListener('click',dem,false);";
			//echo" function dem(e){window.location.assign('order.html');}";
			echo "ch.appendChild(ch2);";
			
			 echo"def.appendChild(ch);";}
		}
	}
echo '</script>';

	// AND price = '".$p1."' OR price='".$p2."' OR price='".$p3."' AND place = '".$pl1."' OR place='".$pl2."' OR place='".$pl3."' AND rate = '".$r1."' OR rate='".$r2."' OR rate='".$r3."'	
	?>
