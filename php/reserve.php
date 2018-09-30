<html>
<head>
	<style>
		.filter{
			position:relative;
			float:left;
			width: 20vw;
			height: 116vh;
			top:15vh;
			background-color: #eee;
			border-radius: 2vh;
			padding: 2vh;
			padding-top: 5vh;
			padding-left: 5vw;
			float: left;
			left: 15vh;
		}
		.filter_name{
			font-size:25px;
		}
		label{
			font-size:15px;
		}
	</style>
</head>

<body>
	<div class="filter">
			<form action="reserveform.php">
			<label class="filter_name">Cuisine</label><br>
			<label><input type="checkbox" name="cuisine[]" value="chinese"/>Chinese</label><br>
			<label><input type="checkbox" name="cuisine[]" value="indian" selected="selected"/>Indian</label><br>
			<label><input type="checkbox" name="cuisine[]" value="continental"/>Continental</label><br>
			<label><input type="checkbox" name="cuisine[]" value="mexican"/>Mexican</label><br>
			<br>
			<label class="filter_name">Cost for 2 people</label><br>
			<label><input type="radio" name="cost" value="&lt 500"/>&lt 500</label><br>
			<label><input type="radio" name="cost" value="500 - 1000"/>500 - 1000</label><br>
			<label><input type="radio" name="cost" value="1000 - 2000"/>1000 - 2000</label><br>
			<label><input type="radio" name="cost" value="&gt 2000"/>&gt 2000</label><br>
			<br>
			<label class="filter_name">Location</label><br>
			<label><input type="checkbox" name="location[]" value="indiranagar"/>Indiranagar</label><br>
			<label><input type="checkbox" name="location[]" value="kormangala"/>Kormangala</label><br>
			<label><input type="checkbox" name="location[]" value="jayanagar"/>Jayanagar</label><br>
			<br>
			
			<label><input type="reset"/></label><br><br>
			<label><input type="submit" value="Search Restaurants"/></label><br><br>
		</form>
	</div>
</body>
</html>


