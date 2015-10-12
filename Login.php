<?php
  require_once('mysqlconnect_php.php');

  $query = "SELECT Username, Password FROM Users";

  $response = @mysqli_query($dbc, $query);

  if($response){
	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($response)){

	echo '<h3 id="theUser">';
	echo $row['Username'];
  echo '</h3><br/>';
  echo '<h5 id="thePassword" style="display: none";> <strong>Answer:</strong> ';
  $realAnswer = $row['Password'];
  echo $realAnswer;
  echo '</h5><br/>';
}
}


 ?>
