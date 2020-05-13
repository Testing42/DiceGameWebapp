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
<h1 class="display-2 blue-text text-center font-italic">Welcome 
<?= 
$username=$_SESSION["username"]
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
            <li class="active"><a href="delete.php">Delete Account</a></li>
            <form method='post' action="">
                <input type="submit" value="Logout" name="but_logout" id="but_logout">
            </form>
          </ul>
        </div>
</nav>


<?php



    $sql = "SELECT image FROM users WHERE username='".$username."' LIMIT 1";
    $result = $con->query( $sql );
?>

  <div id="content">
      <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="container">
                <div class="form-group">
                      <div class="col-sm-2">
                              <?php
                                  while( $row = $result->fetch_assoc() ){ ?>
                                        
                                        <img alt='Profile Pic' width='150px' height='150px' src="data:avatar/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['image']); ?>" />          
                                                <input type="file" name="image" id="imageupload">
                                                <input type="submit" name="submit" id="imageupload" value="Upload">
                              <?php
                              }
                              ?> 
                      </div> 
                </div> 
          </div>
      </form>

              <?php 
              // Include the database configuration file  
              
              
              // Get image data from database 
              $result = $con->query("SELECT image FROM images WHERE imageId=1"); 
              ?>

              <?php if($result->num_rows > 0){ ?> 
                
                    <div class="container">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php while($row = $result->fetch_assoc()){ ?> 
                                        <div id="dice">
                                          <img width='250px' height='250px' id="diceimg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
                                              <div class="col-sm-offset-2 col-sm-10" id="button">
                                                  <button type="submit" onclick="Random()" class="btn btn-danger">roll dice</button>
                                                  <h3 id="result"></h3>
                                              </div>
                                        </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                         
              <?php }else{ ?> 
                  <p class="status error">Image(s) not found...</p> 
              <?php } ?>
  </div>      
      
      <script src="js/scripts.js"></script>
</body>
</html>

