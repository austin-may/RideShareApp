<?php
  session_start();
  require_once('connectMySQL.php');
  $query = "SELECT Username, Password, FirstName FROM Users";

  $response = @mysqli_query($dbc, $query);
  $username = $_POST['username'];
  $password = $_POST['password'];
  $valid = false;

  if($response){
	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($response)){
  if($username == $row['Username'] && $password == $row['Password']){
    $valid = true;
    $_SESSION['Username'] = $row['Username'];
    $firstname = $row['FirstName'];
    break;
  }
}
  if($valid == true){echo "<div id = 'welcome'>Welcome ". $firstname ."!".'</div>';}
  else{ echo "Incorrect";}
}



 ?>

 <html>
 <head>
 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/app.js"></script>
 <meta charset="utf-8">
 <title>Ride Share Home</title>
 <meta name="description" content="Share a ride with fellow students.  Get low prices on trips back home to see your family.">
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <!--Social Media-->
 <link href="bootstrap-social.css" rel="stylesheet">
 <link rel="stylesheet" href="stylesheets/stylesheet.css">
 <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
 <!--<link rel="stylesheet" href="font-awesome.css">-->
 <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
 <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

 <script>

/*     function init_map() {
   var var_location = new google.maps.LatLng(32.423125, -81.787235);
   var var_location2 = new google.maps.LatLng(32.426758, -81.792868);

       var var_mapoptions = {
         center: var_location,
         zoom: 14,
         mapTypeId: google.maps.MapTypeId.HYBRID
       };

   var var_marker = new google.maps.Marker({
     position: var_location,
     map: var_map,
     title:"IT Building"});

   var var_marker2 = new google.maps.Marker({
     position: var_location2,
     map: var_map,
     title:"Austin's Location"});

       var var_map = new google.maps.Map(document.getElementById("map-container"),
           var_mapoptions);

   var_marker.setMap(var_map);
   var_marker2.setMap(var_map);

     }

     google.maps.event.addDomListener(window, 'load', init_map);
*/
	function codeAddress(map, geocoder, address, title, bounds) {
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			var infoWindow = new google.maps.InfoWindow({
			  content: title
			});
			var marker = new google.maps.Marker({
			  map: map,
			  position: results[0].geometry.location,
			  title: title
			});
			google.maps.event.addListener(marker, 'mouseover', function() {
			  infoWindow.open(map, marker);
			});
			google.maps.event.addListener(marker, 'mouseout', function() {
			  infoWindow.close(map, marker);
			});
			google.maps.event.addListener(marker, 'click', function() {
			  alert(results[0].formatted_address);
			});
			marker.setMap(map)
			bounds.extend(marker.position);
			map.fitBounds(bounds);
		  } else {
			alert("Geocode was not successful for the following reason: " + status);
		  }
		});
	  }
	  
	  function init_map() {
		

		var var_mapoptions = {
		  center: new google.maps.LatLng(32.419750, -81.783195),
		  zoom: 14,
		  mapTypeId: google.maps.MapTypeId.HYBRID
		};

		var var_map = new google.maps.Map(document.getElementById("map-container"),
			var_mapoptions);
		var var_bounds = new google.maps.LatLngBounds();
		var var_geocoder = new google.maps.Geocoder();
		
		codeAddress(var_map, var_geocoder, "Centennial Place, Statesboro", "Centennial Place", var_bounds);
		codeAddress(var_map, var_geocoder, "Eagle Village, Statesboro", "Eagle Village", var_bounds);
		codeAddress(var_map, var_geocoder, "Freedom's Landing, Statesboro", "Freedom's Landing", var_bounds);
		codeAddress(var_map, var_geocoder, "Kennedy Hall, Statesboro", "Kennedy Hall", var_bounds);
		codeAddress(var_map, var_geocoder, "Southern Courtyard, Statesboro", "Southern Courtyard", var_bounds);
		codeAddress(var_map, var_geocoder, "Southern Pines, Statesboro", "Southern Pines", var_bounds);
		codeAddress(var_map, var_geocoder, "University Villas, Statesboro", "University Villas", var_bounds);
		codeAddress(var_map, var_geocoder, "Watson Hall, Statesboro", "Watson Hall", var_bounds);
		codeAddress(var_map, var_geocoder, "Forum at Statesboro Student Apartments, 831 S Main St, Statesboro, GA 30458", "The Forum", var_bounds);
		codeAddress(var_map, var_geocoder, "Cambridge at Southern, 130 Lanier Dr, Statesboro, GA 30458", "Cambridge at Southern", var_bounds);
		codeAddress(var_map, var_geocoder, "111 South Apartments, 111 Rucker Ln, Statesboro, GA 30458", "111 South Apartments", var_bounds);

	  }

	  google.maps.event.addDomListener(window, 'load', init_map);
</script>
 </head>
  <body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
    	<meta charset="utf-8">
    	<title>Ride Share Home</title>
    	<meta name="description" content="Share a ride with fellow students.  Get low prices on trips back home to see your family.">
    	<!-- Latest compiled and minified CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<!--Social Media-->
    	<link href="bootstrap-social.css" rel="stylesheet">
    	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    	<!-- Optional theme -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    	<!--<link rel="stylesheet" href="font-awesome.css">-->
    	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
    	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

    	<script>

/*          function init_map() {
    		var var_location = new google.maps.LatLng(32.423125, -81.787235);
    		var var_location2 = new google.maps.LatLng(32.426758, -81.792868);

            var var_mapoptions = {
              center: var_location,
              zoom: 14,
              mapTypeId: google.maps.MapTypeId.HYBRID
            };

    		var var_marker = new google.maps.Marker({
    			position: var_location,
    			map: var_map,
    			title:"IT Building"});

    		var var_marker2 = new google.maps.Marker({
    			position: var_location2,
    			map: var_map,
    			title:"111 South"});

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

    		var_marker.setMap(var_map);
    		var_marker2.setMap(var_map);

          }

          google.maps.event.addDomListener(window, 'load', init_map);
*/




/*COMMENTED OUT FOR NOW; ENABLING RESULTS IN OVER_QUERY_LIMIT ERRORS,
OBTAINING API KEY SHOULD RESOLVE THAT*/
/*
			function codeAddress(map, geocoder, address, title, bounds) {
				geocoder.geocode( { 'address': address}, function(results, status) {
				  if (status == google.maps.GeocoderStatus.OK) {
					var infoWindow = new google.maps.InfoWindow({
					  content: title
					});
					var marker = new google.maps.Marker({
					  map: map,
					  position: results[0].geometry.location,
					  title: title
					});
					google.maps.event.addListener(marker, 'mouseover', function() {
					  infoWindow.open(map, marker);
					});
					google.maps.event.addListener(marker, 'mouseout', function() {
					  infoWindow.close(map, marker);
					});
					google.maps.event.addListener(marker, 'click', function() {
					  alert(results[0].formatted_address);
					});
					marker.setMap(map)
					bounds.extend(marker.position);
					map.fitBounds(bounds);
				  } else {
					alert("Geocode was not successful for the following reason: " + status);
				  }
				});
			  }
			  
			  function init_map() {
				

				var var_mapoptions = {
				  center: new google.maps.LatLng(32.419750, -81.783195),
				  zoom: 14,
				  mapTypeId: google.maps.MapTypeId.HYBRID
				};

				var var_map = new google.maps.Map(document.getElementById("map-container"),
					var_mapoptions);
				var var_bounds = new google.maps.LatLngBounds();
				var var_geocoder = new google.maps.Geocoder();
				
				codeAddress(var_map, var_geocoder, "Centennial Place, Statesboro", "Centennial Place", var_bounds);
				codeAddress(var_map, var_geocoder, "Eagle Village, Statesboro", "Eagle Village", var_bounds);
				codeAddress(var_map, var_geocoder, "Freedom's Landing, Statesboro", "Freedom's Landing", var_bounds);
				codeAddress(var_map, var_geocoder, "Kennedy Hall, Statesboro", "Kennedy Hall", var_bounds);
				codeAddress(var_map, var_geocoder, "Southern Courtyard, Statesboro", "Southern Courtyard", var_bounds);
				codeAddress(var_map, var_geocoder, "Southern Pines, Statesboro", "Southern Pines", var_bounds);
				codeAddress(var_map, var_geocoder, "University Villas, Statesboro", "University Villas", var_bounds);
				codeAddress(var_map, var_geocoder, "Watson Hall, Statesboro", "Watson Hall", var_bounds);
				codeAddress(var_map, var_geocoder, "Forum at Statesboro Student Apartments, 831 S Main St, Statesboro, GA 30458", "The Forum", var_bounds);
				codeAddress(var_map, var_geocoder, "Cambridge at Southern, 130 Lanier Dr, Statesboro, GA 30458", "Cambridge at Southern", var_bounds);
				codeAddress(var_map, var_geocoder, "111 South Apartments, 111 Rucker Ln, Statesboro, GA 30458", "111 South Apartments", var_bounds);

			  }

			  google.maps.event.addDomListener(window, 'load', init_map);
*/
        </script>

    	<style>
    		#map-container{
    			height: 800px;
    		}
    	</style>
    </head>
    <body>
    	<header>
    		<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    			<div class="container">
    				<div class="navbar-header">
    					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    					</button>
    					<a href="" class="navbar-brand">RideShare</a> <!--Change to logo-->
    				</div>
    				<div class="collapse navbar-collapse" id="example">
    					<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-1">Riders</button>

    				</div>
    			</div>
    		</div>
    	</header>

      <!-- <input onkeypress="if(this.value) {if (window.event.keyCode == 13) { sendMessage(this.value); this.value = null; }}"/>
    			<div id="output"></div> -->
      <div id = "notificationCenter">
      </div>
      <form action="RequestRide.php" method="post">
        <!--input to type in location. will turn into map-->
                  <input type = "text" name="location" placeholder="Where you at?"></input><br>
                  <input type ="submit" name="submit" value="Send"/>
      </form>
      <br>
    	<center><div id="map-container" class="col-md-12"></div></center>

    </body>

    </html>

  </body>
</html>
