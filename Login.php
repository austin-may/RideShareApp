<?php
  require_once('connectMySQL.php');

  $query = "SELECT Username, Password FROM Users";

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
    break;
  }
}
  if($valid == true){ echo "WELCOME!";}
  else{ echo "Incorrect";}
}


 ?>
