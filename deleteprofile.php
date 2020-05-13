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
<h1 class="display-2 blue-text text-center font-italic">Sorry to see you go.


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
            <li class="active"><a href="index.html">Home</a></li>
          </ul>
        </div>
</nav>

<?php 
        if(isset($_POST['delete'])){
            $username=$_SESSION["username"];
            $sql = "DELETE FROM users WHERE username='".$username."'";
    
            if (mysqli_query($con, $sql)) {
                $success_message = "Record deleted successfully.";
            } else {
                $error_message = "Error deleting record:" . mysqli_error($con);
            }
            mysqli_close($con);
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