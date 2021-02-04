<?php
    include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEst  PHP</title>
</head>
<body>
    <?php
    $sql = "SELECT organisations.orgName, organisations.password, orgtypes.orgType FROM organisations INNER JOIN orgtypes ON organisations.orgTypeID=orgtypes.orgTypeID;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['orgName'] . "<br>";
            echo $row['orgType']. "<br>";
            echo $row['password']. "<br>";
                
        }
    }
    ?>
</body>
</html>