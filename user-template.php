<?php
include('connection.php');
?>
<?php

$sq = "SELECT * FROM organisations";

echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $conn->query($sq)) {

    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        $orgName = $row["orgName"];
        $uniqueID = $row["uniqueID"];
        $orgID = $row["orgID"];
        

        echo '<b>'.$email.'</b><br />';
        echo '<b>'.$uniqueID.'</b><br />';
        
    }

/*freeresultset*/
$result->free();
}

$i=
?>
