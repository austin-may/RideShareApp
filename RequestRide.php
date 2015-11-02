<?php
  session_start();
  require_once("connectMySQL.php");
  $insertQuery = "INSERT INTO Locations (ComplexName, Username) VALUES (?, ?)";
  $statement = mysqli_prepare($dbc, $insertQuery);
  $location = $_POST['location'];

  mysqli_stmt_bind_param($statement, "ss", $location, $_SESSION['Username']);
  mysqli_stmt_execute($statement);
  $affected_rows = mysqli_stmt_affected_rows($statement);
  if($affected_rows == 1){
    echo 'You have notified the community that you are at '. $location . '!';
    mysqli_stmt_close($statement);
    mysqli_close($dbc);
  }
  else{
    echo 'Error has occured';
    echo mysql_error();
  }

?>
