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
    <?php echo '<p>Hello World</p>'; ?>
    
    <?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['store_name'] . "<br>";
            echo $row['qr_code']. "<br>";
            echo $row['location']. "<br>";
            echo $row['password']. "<br>";
            echo $row['menu']. "<br>";
            echo $row['deals']. "<br>";
            echo $row['events']. "<br>";
            
        }
    }
    ?>
    
</body>
</html>