<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            $("#results").append(field.name + ":" + field.value + " ");
        });
    });
});
</script>
</head>
<body>

<form action="">
			<label class="filter_name">Cuisine</label><br>
			<label><input type="checkbox" name="cuisine" value="chinese"/>Chinese</label><br>
			<label><input type="checkbox" name="cuisine" value="indian" selected="selected"/>Indian</label><br>
			<label><input type="checkbox" name="cuisine" value="continental"/>Continental</label><br>
			<br>
			<label class="filter_name">Cost for 2 people</label><br>
			<label><input type="radio" name="cost" value="&lt 500" selected="selected"/>&lt 500</label><br>
			<label><input type="radio" name="cost" value="500 - 1000"/>500 - 1000</label><br>
			<label><input type="radio" name="cost" value="1000 - 2000"/>1000 - 2000</label><br>
			<label><input type="radio" name="cost" value="&gt 2000"/>&gt 2000</label><br>
			<br>
			<label class="filter_name">Location</label><br>
			<label><input type="checkbox" name="location" value="indiranagar"/>Indiranagar</label><br>
			<label><input type="checkbox" name="location" value="kormangala"/>Kormangala</label><br>
			<label><input type="checkbox" name="location" value="jayanagar"/>Jayanagar</label><br>
			<br>
			
			<label><input type="reset"/></label><br><br>
			<label><input type="submit" value="Search Restaurants"/></label><br><br>
		
</form>

<button>Serialize form values</button>

<div id="results"></div>

</body>
</html>