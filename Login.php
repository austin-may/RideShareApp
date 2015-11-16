<?php
  session_start();
  require_once('connectMySQL.php');
  $query = "SELECT Username, Password, FirstName FROM Users";


  $response = @mysqli_query($dbc, $query);
  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }
  if(isset($_POST['password'])){
    $password = $_POST['password'];
  }
  $valid = false;
  if(isset($_POST['rider'])){
    $_SESSION['pickupuser'] = $_POST['rider'];
    $_SESSION['count'] = 1;
  }


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
}
  if($valid == true)
  {
    if(isset($_SESSION['pickupuser']) && $_SESSION['Username'] == $_SESSION['pickupuser'])
    {
      if($_SESSION['count'] == 1)
      {
        $_SESSION['count']++;
        echo "<div id = 'welcome'>Welcome ". $firstname ."!"."</div> <div>You have a driver!</div>";
        $deleteQuery = "DELETE FROM Locations WHERE Username = '" . $_SESSION['Username'] . "'";
        if ($dbc->query($deleteQuery) === TRUE)
         {
            $updateQuery = "UPDATE Users SET PickedUp = false WHERE Username ='" . $_SESSION['Username']. "'";
            if ($dbc->query($updateQuery) === TRUE) {}
              else {
              echo "Error updating record: " . $dbc->error;
          }
         }
        else
        {
          echo "Error deleting record: " . $dbc->error;
        }

      $dbc->close();
    }
    else{
      echo "<div id = 'welcome'>Welcome ". $firstname . "!".'</div>';
    }
  }

    else
    {
      echo "<div id = 'welcome'>Welcome ". $firstname . "!".'</div>';
    }

  }

  else
  {
    echo "<script>alert('Incorrect username/password'); window.location = 'home.html';</script>";
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
    function addMarker(map, title, address, lat, lng, onCampus, bounds) {
		var infoWindow = new google.maps.InfoWindow({
			content: title
		});
		var marker = new google.maps.Marker({
			map: map,
			position: new google.maps.LatLng(lat, lng),
			title: title
		});
		google.maps.event.addListener(marker, 'mouseover', function() {
			infoWindow.open(map, marker);
		});
		google.maps.event.addListener(marker, 'mouseout', function() {
			infoWindow.close(map, marker);
		});
		google.maps.event.addListener(marker, 'click', function() {
			var setPickupPoint = confirm("Get picked up at " + title + "?");
			if(setPickupPoint == true){
				$launchPickupPoint(title);
			}
			else{}
		});
		if (onCampus){
			marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
		}
		marker.setMap(map)
		bounds.extend(marker.position);
		map.fitBounds(bounds);
	}

	$(document).ready(function(){
		$launchPickupPoint = function(address) {
			$.ajax({
				type: "POST",
				url: "RequestRide.php",
				data:{ location: address},
				success: function(data){
					alert(data);
				}
			})
		};
	});


	function init_map() {
		var var_mapoptions = {
			center: new google.maps.LatLng(32.419750, -81.783195),
			zoom: 14,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};

		var var_map = new google.maps.Map(document.getElementById("map-container"),
			var_mapoptions);
		var var_bounds = new google.maps.LatLngBounds();

		addMarker(var_map, "Centennial Place", "30458, 98 Georgia Ave, Statesboro, GA 30460, United States", "32.42321", "-81.78048", true, var_bounds);
		addMarker(var_map, "Eagle Village", "Eagle Village, Statesboro, GA 30458, United States", "32.42037", "-81.7781", true, var_bounds);
		addMarker(var_map, "Freedom's Landing", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.40948", "-81.78382", true, var_bounds);
		addMarker(var_map, "Kennedy Hall", "191 Knight Dr, Statesboro, GA 30458, United States", "32.41887", "-81.77858", true, var_bounds);
		addMarker(var_map, "Russell Union", "Russell Union, 85 Georgia Ave, Statesboro, GA 30458, United States", "32.42495", "-81.77973", true, var_bounds);
		addMarker(var_map, "Southern Courtyard", "Southern Courtyard, Statesboro, GA 30458, United States", "32.4168", "-81.78069", true, var_bounds);
		addMarker(var_map, "Southern Pines", "Southern Pines, Statesboro, GA 30458, United States", "32.41726", "-81.78451", true, var_bounds);
		addMarker(var_map, "University Villas", "University Villas, Statesboro, GA 30458, United States", "32.41892", "-81.78173", true, var_bounds);
		addMarker(var_map, "Watson Hall", "Watson Hall Commons, Statesboro, GA 30458, United States", "32.42181", "-81.78233", true, var_bounds);
		addMarker(var_map, "IT Building", "Information Technology Building, Statesboro, GA 30458, United States", "32.42327", "-81.78647", true, var_bounds);


		addMarker(var_map, "111 South Apartments", "111 Rucker Ln, Statesboro, GA 30458, United States", "32.4259818", "-81.7935383", false, var_bounds);
		addMarker(var_map, "Aspen Heights Statesboro", "17358 GA-67 #100, Statesboro, GA 30458, United States", "32.401364", "-81.7579530", false, var_bounds);
		addMarker(var_map, "Cambridge at Southern", "130 Lanier Dr, Statesboro, GA 30458, United States", "32.4141068", "-81.7789642", false, var_bounds);
		addMarker(var_map, "Campus Club Apartments", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.4134953", "-81.7818281", false, var_bounds);
		addMarker(var_map, "Campus Crossings at Statesboro", "133 Lanier Dr, Statesboro, GA 30458, United States", "32.414945", "-81.7814230", false, var_bounds);
		addMarker(var_map, "Campus Evolution Villages - Statesboro", "1699 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4101841", "-81.7762072", false, var_bounds);
		addMarker(var_map, "Caribe Court Condos", "210 Caribe Ct, Statesboro, GA 30458, United States", "32.424891", "-81.795186", false, var_bounds);
		addMarker(var_map, "College Walk Apartments", "210 Lanier Dr, Statesboro, GA 30458, United States", "32.4098133", "-81.7806015", false, var_bounds);
		addMarker(var_map, "Copper Beech Townhomes", "1400 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4078744", "-81.7740085", false, var_bounds);
		addMarker(var_map, "Eagle Villa Suites", "202 Lanier Dr, Statesboro, GA 30458, United States", "32.41219", "-81.78107", false, var_bounds);
		addMarker(var_map, "Eaglecreek Townhouses", "220 Lanier Dr # 1, Statesboro, GA 30458, United States", "32.4084231", "-81.7801617", false, var_bounds);
		addMarker(var_map, "Eastview Apartments", "Eastview Apartments, Statesboro, 30458, United States", "32.4246000", "-81.7916000", false, var_bounds);
		addMarker(var_map, "Forum at Statesboro Student Apartments", "831 S Main St, Statesboro, GA 30458, United States", "32.420392", "-81.797303", false, var_bounds);
		addMarker(var_map, "Garden District Apartments", "17931 GA-67, Statesboro, GA 30458, United States", "32.4051561", "-81.7654424", false, var_bounds);
		addMarker(var_map, "Legacy", "100 Woodland Dr, Statesboro, GA 30458, United States", "32.426715", "-81.7893420", false, var_bounds);
		addMarker(var_map, "Monarch 301", "816 S Main St, Statesboro, GA 30458, United States", "32.4206794", "-81.7932385", false, var_bounds);
		addMarker(var_map, "Seasons Apartments", "819 Robin Hood Trail, Statesboro, GA 30458, United States", "32.4126130", "-81.7760840", false, var_bounds);
		addMarker(var_map, "Southern Downs Apartments", "710 Georgia Ave, Statesboro, GA 30458, United States", "32.4173163", "-81.7741763", false, var_bounds);
		addMarker(var_map, "Stadium View Apartments", "1822 Chandler Rd, Statesboro, GA 30458, United States", "32.4143277", "-81.7840105", false, var_bounds);
		addMarker(var_map, "The Connection at Statesboro", "2000 Stambuk Ln, Statesboro, GA 30458, United States", "32.4021709", "-81.7687900", false, var_bounds);
		addMarker(var_map, "The Grove Apartments Statesboro", "1150 Brampton Ave, Statesboro, GA 30458, United States", "32.4102354", "-81.7728094", false, var_bounds);
		addMarker(var_map, "The Hamptons Statesboro", "815 S Main St, Statesboro, GA 30458, United States", "32.423031", "-81.7925511", false, var_bounds);
		addMarker(var_map, "The Islands", "The Islands, 104, Statesboro, GA 30458, United States", "32.40064", "-81.77767", false, var_bounds);
		addMarker(var_map, "The Renaissance Apartment Homes", "1818 Chandler Rd, Statesboro, GA 30458, United States", "32.414935", "-81.7867770", false, var_bounds);
		addMarker(var_map, "Tillman Park", "121 Tillman Rd, Statesboro, GA 30461, United States", "32.43181", "-81.78662", false, var_bounds);
		addMarker(var_map, "Trace Villas", "Trace Villas, Statesboro, GA 30461, United States", "32.42149", "-81.79452", false, var_bounds);
		addMarker(var_map, "University Pointe Apartments", "109 Harvey Dr, Statesboro, GA 30458, United States", "32.419813", "-81.780417", false, var_bounds);
		addMarker(var_map, "University Village at Southern", "100 Bermuda Run, Statesboro, GA 30458, United States", "32.4156670", "-81.7735630", false, var_bounds);
		addMarker(var_map, "Varsity Apartments", "111 Rucker Ln # 40, Statesboro, GA 30458, United States", "32.4249085", "-81.7918944", false, var_bounds);


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
              <img src = "WaldoLogo.png" id = "logo">
    					<a href="" class="navbar-brand">Waldo</a> <!--Change to logo-->
    				</div>
    				<div class="collapse navbar-collapse" id="example">

    				</div>
    			</div>
    		</div>
    	</header>

      <!-- <input onkeypress="if(this.value) {if (window.event.keyCode == 13) { sendMessage(this.value); this.value = null; }}"/>
    			<div id="output"></div> -->
      <div id = "notificationCenter">
      </div>
      <form action="http://localhost:5000">
    <input type="submit" value="Chat!">
      </form>
      <br>
    	<center><div id="map-container" class="col-md-12"></div></center>

    </body>

    </html>

  </body>
</html>
