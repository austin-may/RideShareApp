<?php
session_start();
//calling the api for the web service
 $requests_list = file_get_contents('http://localhost:8080/RideShareApp/api.php?action=get_rider_list');
 $requests_list = json_decode($requests_list, true);
 ?>

 <?php

 $i = 0;
 $theRider = "";
 $userID = "";
 foreach($requests_list as $request){
   echo '<img src="tooltip_pulse.gif" height="42" width="42"/>';
   foreach($request as $key => $val)
    {
       $numItems = count($request);
       if(++$i == $numItems){
         $theRider = $val;
         break;
       }
        echo $val . " ";
    }
    $i = 0;


    echo "<button class='pickupbtn' id = $theRider>Pick up!</button>";
    //chat window after each person
    echo "<form action='http://localhost:5000'>
    <input type='submit' value='Chat!' id='chatwindow'>
    </form>";
    echo "<br>";
 }

 echo $userID;

?>
