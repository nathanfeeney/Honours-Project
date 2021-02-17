<?php include('connection.php') ?>
<?php 
    

$displayQuery = "SELECT * FROM qrCodes WHERE qrCodeID = '1'";

//$filePath = $row["qrFilePath"];



if ($result = $conn->query($displayQuery)) {

    while ($row = $result->fetch_assoc()) {
        $filePath = $row["qrFilePath"];
        $qrCodeID = $row["qrCodeID"];
        
        
        echo '<b>'.$qrCodeID.'</b><br />';
        echo '<img src="'.$filePath.'" />';
    }

/*freeresultset*/
$result->free();
}
?>
