<?php
require_once('connectMySQL.php');
if( $_REQUEST["uname"] ) {

   $uname = $_REQUEST['uname'];
   $query = "SELECT Username FROM Users WHERE Username = '" . $uname . "'";
   $response = @mysqli_query($dbc, $query);
   $x = mysqli_fetch_array($response)['Username'];
   if($uname == $x){
		echo (int) (0);
   }
   else{
	   echo (int) (1);
   }
}


?>