<?php
include('connection.php');
?>
<?php
$id = $_GET['id'];
$sq = "SELECT * FROM organisations WHERE orgID='$id'";

echo "<b> <center>Database Output</center> </b> <br> <br>";
echo '<a href="user-template.php?id=1"> 2 </a>';
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
