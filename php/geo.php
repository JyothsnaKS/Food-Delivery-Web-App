<!DOCTYPE html>
<html>
     <head>
     <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFH106CFT2Yx6biqfrTOLzGM4LtYwVXnA&v=3.exp&signed_in=true"></script>
	 </head>

     <body>
		<p>Address: <div id="address"></div></p>
		  <div id="mapholder">
		  </div>
     </body>

     <script type="text/javascript" charset="utf-8">

     $(document).ready(function() {
         var currgeocoder;

         //Set geo location lat and long

         navigator.geolocation.getCurrentPosition(function(position, html5Error) {

             geo_loc = processGeolocationResult(position);
             currLatLong = geo_loc.split(",");
             initializeCurrent(currLatLong[0], currLatLong[1]);

        });

        //Get geo location result

       function processGeolocationResult(position) {
             html5Lat = position.coords.latitude; //Get latitude
             html5Lon = position.coords.longitude; //Get longitude
             html5TimeStamp = position.timestamp; //Get timestamp
             html5Accuracy = position.coords.accuracy; //Get accuracy in meters
			     lat = position.coords.latitude;
    lon = position.coords.longitude;
    latlon = new google.maps.LatLng(lat, lon)
    mapholder = document.getElementById('mapholder')
    mapholder.style.height = '250px';
    mapholder.style.width = '500px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
             return (html5Lat).toFixed(8) + ", " + (html5Lon).toFixed(8);
       }

        //Check value is present or not & call google api function

        function initializeCurrent(latcurr, longcurr) {
             currgeocoder = new google.maps.Geocoder();
             console.log(latcurr + "-- ######## --" + longcurr);

             if (latcurr != '' && longcurr != '') {
                 var myLatlng = new google.maps.LatLng(latcurr, longcurr);
                 return getCurrentAddress(myLatlng);
             }
       }

        //Get current address

         function getCurrentAddress(location) {
              currgeocoder.geocode({
                  'location': location

            }, function(results, status) {
           
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results[0]);
                    $("#address").html(results[0].formatted_address);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
         }
    });

    </script>

</html>