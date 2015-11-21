<?php
session_start();
//calling the api for the web service
 $requests_list = file_get_contents('http://localhost/RideShareApp/api.php?action=get_rider_list');
 $requests_list = json_decode($requests_list, true);
 ?>

 <?php
 $i = 0;
 $theRider = "";
 $userID = "";
   echo "<table class ='table table-striped table-bordered table-condensed'>";
   echo "<tr>";
   echo "<th class ='col-sm-1'>Firstname</th>";
   echo "<th class ='col-sm-1'>Lastname</th>";
   echo "<th class ='col-sm-2'>Location</th>";
   echo "<th class ='col-sm-2'>Pick Up</th>";
   echo "<th class ='col-sm-2'>Chat!</th>";
 foreach($requests_list as $request){
   echo "<tr>";
   foreach($request as $key => $val)
    {
       $numItems = count($request);
       if(++$i == $numItems){
         $theRider = $val;
         break;
       }
	   if($i ==1){
		    echo '<td><img src="tooltip_pulse.gif" height="42" width="42"/>'. $val .'</td>';
	   }
	   else{
		   echo "<td>".$val . " ".'</td>';
	   }
	    
        //echo "<div id = 'homereq'>".$val . " ".'</div>';
		//echo $request;
    }
    $i = 0;
	

    echo "<td><button class='pickupbtn' id = $theRider>Pick up!</button></td>";
    //chat window after each person
    echo "<td><form action='http://localhost:5000'>
    <button class = 'btn-success' input type='submit' value='Chat!' id='chatwindow'>Chat!</button>
    </form></td>";
	echo "</tr>";
    echo "<br>";
	
 }
echo "</table>";
 echo $userID;
?>
