<?php include('connection.php') ?>
<?php 
    
    
$orgName= $_SESSION['orgName'];
$displayQuery = "SELECT * FROM organisations WHERE orgName='$orgName'";

//$filePath = $row["qrFilePath"];



if ($result = $conn->query($displayQuery)) {

    while ($row = $result->fetch_assoc()) {
        $filePath = $row["qrFilePath"];
        //echo $orgName;
        //echo '<img src="'.$filePath.'" />';
    }

/*freeresultset*/
$result->free();
}
?>
