<?php
session_start();

// initializing variables
$orgName = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dissertation');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $orgName = mysqli_real_escape_string($db, $_POST['orgName']);
  
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $orgTypeID = mysqli_real_escape_string($db, $_POST['orgTypeID']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    

  
    
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($orgName)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
    include('qrtest.php');
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM organisations WHERE orgName='$orgName' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['orgName'] === $orgName) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    $uniqueID = "TESTING";
    include("qrTest.php");
   // $uniqueID = str_replace(' ', '', $uniqueID);
    

  	$query = "INSERT INTO organisations (orgName, uniqueID, email, orgTypeID, qrFilePath, password) 
  			  VALUES('$orgName', '$uniqueID', '$email','$orgTypeID','$qrFilePath', '$password' )";
   
  	mysqli_query($db, $query, $QRquery);
    
  	$_SESSION['orgName'] = $orgName;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $orgName = mysqli_real_escape_string($db, $_POST['orgName']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($orgName)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM organisations WHERE orgName='$orgName' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['orgName'] = $orgName;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>