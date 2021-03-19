<?php include('connection.php') ?>
<?php 
    
    
$orgName= $_SESSION['orgName'];
$displayQuery = "SELECT * FROM organisations WHERE orgName='$orgName'";

//$filePath = $row["qrFilePath"];



if ($result = $conn->query($displayQuery)) {

    while ($row = $result->fetch_assoc()) {
        $filePath = $row["qrFilePath"];
        //echo $orgName;
        echo '<img id="imagehtml" src="'.$filePath.'"><br>';
        echo '<a href="#" onclick="PrintImage('.$filePath.'); return false;"><button id="printImage">Print QR</button></a>';
        
    }

/*freeresultset*/
$result->free();
}
?>
<script>
  function ImagetoPrint(source) {
    return "<html><head><script>function step1(){\n" +
            "setTimeout('step2()', 10);}\n" +
            "function step2(){window.print();window.close()}\n" +
            "</scri" + "pt></head><body onload='step1()'>\n" +
            "<img src='" + source + "' /></body></html>";
}
function PrintImage(source) {
    Pagelink = "about:blank";
    var pwa = window.open(Pagelink, "_new");
    pwa.document.open();
    pwa.document.write(ImagetoPrint(source));
    pwa.document.close();
}
                </script>
