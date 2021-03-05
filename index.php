<?php include('connection.php') ?>
    <?php 
  session_start(); 
    
  if (!isset($_SESSION['orgName'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['orgName']);
  	header("location: login.php");
  }
   include('displayQR.php');
 //$orgName = $_SESSION['orgName'];
 //$getQR = "SELECT qrFilePath FROM organisations WHERE orgName='test'";
 //$qr = $rows['qrFilePath'];
 
    
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="style.css"> </head>

        <body>
            <div class="header">
                <h2>Home Page</h2> </div>
            <div class="content">
                <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success">
                        <h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3> </div>
                    <?php endif ?>
                        <!-- logged in user information -->
                        <?php  if (isset($_SESSION['orgName'])) : ?> <img src="<?php echo $filePath ?>" alt="qr">
                            <p>Welcome <strong><?php echo 
        $_SESSION['orgName']; ?></strong></p> <a href="displayQR.php">Display QR</a>
                            <div id="map"></div>
                            <!--<?php// include('displayQR.php');?> -->
                            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                            <?php endif ?>
            </div>

        </body>

        </html>