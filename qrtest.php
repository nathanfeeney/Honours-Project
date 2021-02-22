<!-- QR CODE GENERATOR -->
<?php
    
    include('phpqrcode/qrlib.php');
    include('config.php');
   

//Variable that holds connection information
//$server = "localhost";
//$username = "root";
//$password = "";
//$dbname = "dissertation";

//Create connection
//$conn = mysqli_connect($server, $username, //$password, $dbname);

    // how to save PNG codes to server
    
    $tempDir = "qrcodes/";
    $codeContents = md5($orgName);
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.$codeContents.'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    $qrFilePath = $pngAbsoluteFilePath;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />';
    }
    
    echo 'Server PNG File: '.$pngAbsoluteFilePath;
    echo '<hr />';
    
    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />';

//$insQuery = "INSERT INTO qrcodes (qrFilePath) 
 // 			  VALUES('$qrFilePath')";
//mysqli_query($db, $insQuery);