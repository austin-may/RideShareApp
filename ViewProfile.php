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
        echo "<div id = 'welcome'>Welcome ". $firstname ."!"."</div> <div>you have a driver!</div>";
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