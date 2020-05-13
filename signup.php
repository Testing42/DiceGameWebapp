<?php
require_once 'source/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Creation Message</title>


  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <div class="jumbotron">
<h1 class="display-2 blue-text text-center font-italic">Create account</h1>
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
            <li class="active"><a href="index.html">Back</a></li>
            <li class="active"><a href="signin.php">Signin</a></li>
            <li class="active"><a href="createaccount.html">Create Account</a></li>
          </ul>
        </div>
</nav>

  <?php

if(isset($_POST['signup-btn'])) {

    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $isValid = true;

      
    


            // Check if confirm password matching or not
            if($isValid && ($password != $confirmpassword) ){
              $isValid = false;
              $error_message = "Confirm password not matching.";
            }
        
            
              
            }
        
            // Insert records
            if($isValid && password_verify($password, $hashed_password)){
              $insertSQL = "INSERT INTO users(username,firstname,lastname,password) values(?,?,?,?)";
              $stmt = $con->prepare($insertSQL);
              $stmt->bind_param("ssss",$username,$firstname,$lastname,$hashed_password);
              $stmt->execute();
              $stmt->close();
              
        
              $success_message = "Account created successfully.";
            }
       
    ?>
</head>
<body>
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
												
			
		</div>
	</div>
</body>
</html>