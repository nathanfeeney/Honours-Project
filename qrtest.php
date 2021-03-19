<!-- QR CODE GENERATOR -->
<?php
    
    include('phpqrcode/qrlib.php');
    include('config.php');
   // how to save PNG codes to a folder on the server
    $tempDir = "qrcodes/";
    // This gets the name of the currently logged in user and 
    // encodes the name using md5.
    $orgNameAfter = md5($orgName);
    // this saves the unique url using the encoded organisation name as id
    $codeContents = 'https://192.168.0.23/dissertation/user-template.php?id='.$orgNameAfter;
    
    // this give the file a unique name using the encoded organisatio name
    $fileName = '005_file_'.$orgNameAfter.'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    $qrFilePath = $pngAbsoluteFilePath;
    
    // generating the contents as a QR code
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
    
    // displaying the QR code
    echo '<img src="'.$urlRelativeFilePath.'" />';
