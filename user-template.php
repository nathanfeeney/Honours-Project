<?php
include('connection.php');
?>
<?php

$sq = "SELECT * FROM organisations WHERE orgID='5'";

echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $conn->query($sq)) {

    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        $orgName = $row["orgName"];
        

        echo '<b>'.$email.'</b><br />';
        
    }

/*freeresultset*/
$result->free();
}
?>
