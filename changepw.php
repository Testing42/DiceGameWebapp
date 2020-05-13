<?php
include_once "source/config.php";
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <meta name="dice game" content="dice game">
  <meta name="Andres Morales" content="SitePoint">

  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


<div class="jumbotron">
<h1 class="display-2 blue-text text-center font-italic">Create account</h1>
</div>


</h1>
</div>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <div class="navbar-header">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">
	  		<img src="img/dice-logo.jpg" width="110" height="28" border="0" alt="Dice logo"></a>
    </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li class="active"><a href="change-password.php">Change Password</a></li>
          </ul>
        </div>
</nav>


<?php

    if(isset($_POST['submit'])){
        $username=$_SESSION["username"];

        $currentPassword = trim($_POST['currentPassword']);
        $newPassword = trim($_POST['newPassword']);
        $confirmPassword = trim($_POST['confirmPassword']);
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM users WHERE username='".$username."'";
        $tbl = mysqli_query($con,$query);
        $row = mysqli_fetch_array($tbl);

        $hashed_password =$row['password'];

        $isValid = true;


            
        if($isValid && ($newPassword != $confirmPassword) ){
            $isValid = false;
            $error_message = "Confirm password not matching.";
            
        }
        if ($isValid && ($hashed_password != "") && password_verify($currentPassword, $hashed_password)){
            $newhashed_password = password_hash($confirmPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='".$newhashed_password."' WHERE username='".$username."'";
                
            $success_message = "Password successfully updated";
                        
                
        }else {
            $error_message = "Error updating password";               
                    
        }
        $con->close();
    }

?>

<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2></h2>
			</div>

			<div class='col-md-12' >
					
				<form method='post' action=''>

					<?php 
					// Display Error message
					if(!empty($error_message)){
					?>
						<div class="alert alert-danger">
						  	<strong>Error!</strong> <?= $error_message ?>                  
						</div>
            
					<?php
					}
					?>

					<?php 
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>

    
      
      <script src="js/scripts.js"></script>
</body>
</html>