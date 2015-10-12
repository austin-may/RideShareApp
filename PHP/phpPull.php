<!DOCTYPE html>
<html>
<body>
<h3> Location: </h3>
<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "SELECT * FROM rideshareapp.locations";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1);
    while ($stmt->fetch()) {
        printf("%s\n", $field1);
    }
    $stmt->close();
}

$con->close();

?>  

</body>

</html>