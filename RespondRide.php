<?php
require_once('connectMySQL.php');
$query =
"SELECT Users.FirstName, Users.LastName, Locations.ComplexName
 FROM Locations
 JOIN Users
 ON Locations.Username=Users.Username";

$response = @mysqli_query($dbc, $query);

if($response){
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){
    echo '<img src="tooltip_pulse.gif" height="42" width="42"/>'. $row['ComplexName'] . " " . $row['FirstName'] . " ". $row['LastName'] . "<button class = 'pickup'>SCOOP</button>";
    echo "<br>";
  }
}
?>
