<?php
  session_start();
  require_once("connectMySQL.php");
  $insertQuery = "INSERT INTO PickUps (UserName, LocationName, Date) VALUES (?, ?, ?)";
  $locationSet = "SELECT PickedUp FROM User WHERE UserName ='" . $_SESSION['Username'] . "'";
  $statement = mysqli_prepare($dbc, $insertQuery);
  $location = $_POST['location'];
  $date = date("m/d/Y, h:i:sa");
  mysqli_stmt_bind_param($statement, "sss", $_SESSION['Username'], $location, $date);
  $updateQuery = "UPDATE User SET PickedUp = true WHERE UserName ='" . $_SESSION['Username']. "'";

  $locationSetResult = $dbc->query($locationSet);

  // $affected_rows = mysqli_stmt_affected_rows($statement);
  // if($affected_rows == 1){
    if ($locationSetResult->num_rows > 0) {
        // output data of each row
        while($row = $locationSetResult->fetch_assoc()) {
            if($row["PickedUp"] == 1) //if true
            {
              echo "You've already chosen a location!";

            }
            else
            {
              mysqli_stmt_execute($statement);

              if ($dbc->query($updateQuery) === TRUE) {}
                else {
                echo "Error updating record: " . $dbc->error;
            }

              echo 'You have notified the community that you are at '. $location . '!';
              mysqli_stmt_close($statement);
              mysqli_close($dbc);
            }
        }
    }
    else {
        echo "0 results";
    }

  // }
  // else{
  //   echo 'Error has occured';
  //   echo mysql_error();
  // }

?>
