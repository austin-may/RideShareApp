<?php
  session_start();
  require_once('connectMySQL.php');
  $query = "SELECT Username, Password, FirstName FROM Users";

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
    $_SESSION['Username'] = $row['Username'];
    $firstname = $row['FirstName'];
    break;
  }
}
  if($valid == true){echo "WELCOME ". $firstname ."!";}
  else{ echo "Incorrect";}
}



 ?>

 <html>
 <head>
 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/app.js"></script>
 </head>
  <body>
    <input onkeypress="if(this.value) {if (window.event.keyCode == 13) { sendMessage(this.value); this.value = null; }}"/>
  			<div id="output"></div>
    <div id = "notificationCenter">
    </div>
    <br>
    <form action="RequestRide.php" method="post">
                <input type = "text" name="location" placeholder="Where you at?"></input><br>
                <input type ="submit" name="submit" value="Send"/>
    </form>
  </body>
</html>
