<?php
//Variable that holds connection information
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dissertaion";

//Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


?>