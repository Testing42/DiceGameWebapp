<?php
include_once "source/config.php";

if(!isset($_SESSION['username'])){
    header('Location: signin.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: signin.php');
}
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
<h1 class="display-2 blue-text text-center font-italic">DON'T LEAVE  
<?= 
$_SESSION["username"]
?>

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
            <li class="active"><a href="change-password.php">Change Password</a></li>
            <li class="active"><a href="home.php">Home</a></li>
            <form method='post' action="">
                <input type="submit" value="Logout" name="but_logout" id="but_logout">
            </form>
          </ul>
        </div>
</nav>

    <form class="form-horizontal" action="deleteprofile.php" method="post" enctype="multipart/form-data">
        <div class="col-sm-offset-5 col-sm-10">
            <button type="submit" name="delete" id="delete" class="btn btn-danger"><h1>DELETE</h1></button>
        </div>
    </form>


    
      
      <script src="js/scripts.js"></script>
</body>
</html>

