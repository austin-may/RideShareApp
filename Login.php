<?php
  session_start();
  require_once('connectMySQL.php');
  $query = "SELECT * FROM Log_in JOIN User USING (UserName)";


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
	  if($username == $row['UserName'] && $password == $row['Password']){
		$valid = true;
		$_SESSION['Username'] = $row['UserName'];
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
        echo "<div id = 'welcome'>Welcome ". $firstname ."!"."</div> <div id = 'driverfound'>A driver has taken on your request!</div>";
        $deleteQuery = "DELETE FROM PickUps WHERE UserName = '" . $_SESSION['Username'] . "'";
        if ($dbc->query($deleteQuery) === TRUE)
         {
            $updateQuery = "UPDATE User SET PickedUp = false WHERE UserName ='" . $_SESSION['Username']. "'";
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
      echo "<div class='container-fluid' ><div class = 'col-md-12' id = 'welcome'>Welcome " . $firstname . "!".'</div></div>';
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
    function addMarker(map, title, address, lat, lng, color, bounds) {
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
		var colorURL = "http:\/\/chart.apis.google.com\/chart?cht=d&chdp=mapsapi&chl=pin\'i\\\'[\'-2\'f\\hv\'a\\]h\\]o\\" + color + "\'fC\\000000\'tC\\000000\'eC\\Lauto\'f\\&ext=.png";
		marker.setIcon(colorURL);
		
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

<?php
	require_once('connectMySQL.php');
	$query = "SELECT * FROM LocationTypes JOIN Locations USING (LocationType)";
	$response = @mysqli_query($dbc, $query);
	if($response){
	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
		while($row = mysqli_fetch_array($response)){
			$title = $row["LocationName"];
			$address = $row["Address"];
			$lat = $row["Latitude"];
			$lng = $row["Longitude"];
			$color = $row["LocationColor"]; 
			echo "\t\taddMarker(var_map, \"$title\", \"$address\", \"$lat\", \"$lng\", \"$color\", var_bounds);\n";
		}
	}
?>
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
            <form action="Home.html">
            <button type = "submit" id = "btn-primary" class="btn btn-primary pull-right" data-toggle="modal" class="navbar-brand">Home</a>
          </form>
    				<div class="navbar-header">
    					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    					</button>
              <img src = "WaldoLogo.png" id = "logo">
              <h2 class="navbar-text">Waldo</h2>
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
      <div class = "container-fluid" >
      <form action="http://localhost:5000">
        <center><button id = "btn-center" class = "btn btn-success" type="submit" value="Chat!">Chat!</button></center>
      </form>
      <br>
    	<center><div id="map-container" class="col-md-12"></div></center>

    </body>

    </html>

  </body>
</html>
