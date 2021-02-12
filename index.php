
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/qrcode.min.js"></script>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['orgName'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['orgName']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    	<div id="qrcode"></div>
    <?php endif ?>
</div>
		
</body>
<!--QR #generate -->
<script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), window.location.href);
</script>
</html>
