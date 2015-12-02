<?php

  function get_rider_list(){
    require_once('connectMySQL.php');
    require_once('Requests.php');
    $query =
    "SELECT User.FirstName, User.LastName, PickUps.LocationName, User.UserName
     FROM PickUps
     JOIN User
     ON Pickups.UserName=User.UserName";
     $requests_array = array();
     if($result = $dbc->query($query)){
       while($obj = $result->fetch_object()){

         $temp_requests = new RequestsDB($obj->FirstName, $obj->LastName, $obj->LocationName, $obj->UserName);

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
