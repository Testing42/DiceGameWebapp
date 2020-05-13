<?php
include_once "source/config.php";

$username =$_SESSION["username"];


if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT *from users WHERE username='" .$username. "'");
    $row = mysqli_fetch_array($result);
    if (trim($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($con, "UPDATE users set password='" . trim($_POST["newPassword"]) . "' WHERE username='" .$username. "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/message.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>

<div class="jumbotron">
<h1 class="display-2 blue-text text-center font-italic">Change Password</h1>
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
            <li class="active"><a href="home.php">Back</a></li>
          </ul>
        </div>
</nav>

<form class="form-horizontal" method="post" action="changepw.php"
    onSubmit="return validatePassword()">
  <div class="container">
  <h1 div class="message"><?php if(isset($message)) { echo $message; } ?></h1>
    <div class="form-group">
      <label class="control-label col-sm-2" for="currentPassword">Old Password:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="currentPassword" onkeypress = "return Disable_Space();" name="currentPassword" placeholder="Current Password..." required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="newPassword">New Password:</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="newPassword" onkeypress = "return Disable_Space();" name="newPassword" placeholder="newpassword..." required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="confirmPassword">Confirmed Password:</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="confirmPassword" onkeypress = "return Disable_Space();" name="confirmPassword" placeholder="Confirm Password..." required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="Submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </div>
</form>

<script src="js/scripts.js"></script>
</body>
</html>