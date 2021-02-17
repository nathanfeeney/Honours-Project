<?php include('connection.php') ?>
<?php 
    

$displayQuery = "SELECT * FROM organisations WHERE orgTypeID = '2'";

//$filePath = $row["qrFilePath"];



if ($result = $conn->query($displayQuery)) {

    while ($row = $result->fetch_assoc()) {
        $filePath = $row["qrFilePath"];
        
        echo '<img src="'.$filePath.'" />';
    }

/*freeresultset*/
$result->free();
}
?>
