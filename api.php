<?php

  function get_rider_list(){
    require_once('connectMySQL.php');
    require_once('Requests.php');
    $query =
    "SELECT Users.FirstName, Users.LastName, Locations.ComplexName, Users.Username
     FROM Locations
     JOIN Users
     ON Locations.Username=Users.Username";
     $requests_array = array();
     if($result = $dbc->query($query)){
       while($obj = $result->fetch_object()){

         $temp_requests = new RequestsDB($obj->FirstName, $obj->LastName, $obj->ComplexName, $obj->Username);

         $requests_array[] = $temp_requests;
       }
     }
       return $requests_array;

  }

  if(isset($_GET["action"])){
    $value = get_rider_list();
  }

  exit(json_encode($value));


?>
