<?php
extract($_POST);
$con = mysqli_connect('localhost','root','','foodicted');

//if the item selected is there in the $_POST array 
$soup = array_key_exists('soup', $_POST);
$starter = array_key_exists('starter', $_POST);
$main = array_key_exists('main-course', $_POST);
$dessert = array_key_exists('dessert', $_POST);
//initialising the qty variables
$soup_qty =0;
$starter_qty =0;
$main_qty =0;
$dessert_qty=0;
//the price for 1 order of the item
$soup_price = 0; //190
$starter_price =0;//395
$main_price =0;//430
$dessert_price =0 ;//170

// to get the name of the orders
$sname='';//soup
$stname='';//starter
$mname='';//main course
$dname='';//dessert
$sql="";

//if the item is selected their respective qty is obtained from the $_POSt array else they are equal to 0.
if($soup)
{
	// getting the name of the order
	$sname = $_POST['soup'];
	if($sname=="Veg Sweet Corn soup")//Mainland china
		{$soup_price = 190;}
	else
	{
		$soup_price = 180;//Jalpaan
	}
	$soup_qty = $_POST['soup_qty'];
	$soup_qty=intval($soup_qty);//converting to int type
	$soup_price = $soup_price*$soup_qty; 
	$sql = "INSERT into orderdelivery(item,quantity,price)VALUES('".$sname."',$soup_qty,$soup_price)";
	$retval = mysqli_query($con,$sql);


}
if($starter)
{	
	$stname = $_POST['starter'];
	if($stname=="Chilli Teriyaki Potatoes")
	{
		$starter_price =395;
		
	}
	else
	{
		$starter_price =340;
		
	}
	$starter_qty =$_POST["starter_qty"];
	$starter_qty=intval($starter_qty);
	$starter_price =$starter_price*$starter_qty;
	$sql = "INSERT into orderdelivery(item,quantity,price)VALUES('".$stname."',$starter_qty,$starter_price)";
	$retval = mysqli_query($con,$sql);
}
if($main)
{
	$mname = $_POST['main-course'];
	if($mname =="Fiery Sapo Vegetable")
	{
		$main_price =430;
		
	}
	else
	{
		$main_price =400;
		
	}
	$main_qty =$_POST["mc_qty"];
	$main_qty=intval($main_qty);
	$main_price= $main_price*$main_qty;
	$sql = "INSERT into orderdelivery(item,quantity,price)VALUES('".$mname."',$main_qty,$main_price)";
	$retval = mysqli_query($con,$sql);

}
if($dessert)
{
	$dname = $_POST['dessert'];
	if($dname=="Honey Noodles")
	{
		$dessert_price = 170;
		
	}
	else
	{
		$dessert_price = 150;
		
	}

	$dessert_qty =$_POST["dessert_qty"];
	$dessert_qty=intval($dessert_qty);
	$dessert_price=$dessert_price*$dessert_qty;
	$sql = "INSERT into orderdelivery(item,quantity,price)VALUES('".$dname."',$dessert_qty,$dessert_price)";
	$retval = mysqli_query($con,$sql);
}

	mysqli_close($con);
	echo "<script>window.location=\"http://localhost/webtech_project/last_pagev2.php\"</script>";
?>