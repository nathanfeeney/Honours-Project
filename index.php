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

 
 $orgName = $_SESSION['orgName'];
 //$getQR = "SELECT qrFilePath FROM organisations WHERE orgName='test'";
 //$qr = $rows['qrFilePath'];
 $testMenu = "SELECT orgID, uniqueID FROM organisations WHERE orgName ='$orgName'";
    if ($result = $conn->query($testMenu)) {

            while ($row = $result->fetch_assoc()) {
                $orgID = $row["orgID"];
                $uID = $row["uniqueID"];
            }
        /*freeresultset*/
        $result->free();
        }

        ?>
        <!DOCTYPE html>
        <html>
        <?php include('head.php'); ?>

            <body>
                <div class="header">
                    <?php include('nav.php'); ?>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="content">
                                <h2>Dashboard</h2>
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
                                        <?php  if (isset($_SESSION['orgName'])) : ?>
                                            <p>Welcome <strong><?php echo 
                            $_SESSION['orgName']; 
                                ;?></strong></p>
                                           <p> <?php echo '<a href="http://localhost/dissertation/user-template.php?id='.$uID.'">
                                        Click to view customers from customers perspective </a>'?></p>
                                            <div id="menu">
                                                <?php echo "orgID for testing purposes: <b>".$orgID."</b>"; ?> </div>
                                            <!--<?php// include('displayQR.php');?> -->
                                            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                                            <div class="col">
                                                <h2>This is your unique QR code</h2>
                                                <?php include('displayQR.php'); ?>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                   <h3>Add menu(s) to your account </h3>
                                                    <div class="container">
                                                        <?php include ('event-reg.php');?>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </body>

        </html>