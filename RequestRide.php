<?php
  session_start();
  require_once("connectMySQL.php");
  $insertQuery = "INSERT INTO Locations (ComplexName, Username) VALUES (?, ?)";
  $locationSet = "SELECT PickedUp FROM Users WHERE Username ='" . $_SESSION['Username'] . "'";
  $statement = mysqli_prepare($dbc, $insertQuery);
  $location = $_POST['location'];
  mysqli_stmt_bind_param($statement, "ss", $location, $_SESSION['Username']);
  $updateQuery = "UPDATE Users SET PickedUp = true WHERE Username ='" . $_SESSION['Username']. "'";

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
