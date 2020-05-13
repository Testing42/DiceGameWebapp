<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin Page</title>
  <meta name="dice game" content="dice game">
  <meta name="Andres Morales" content="SitePoint">

  <link rel="stylesheet" href="css/signin.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>


<div class="jumbotron">
<h1 class="display-2 blue-text text-center font-italic">Signin Page</h1>
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
<div class="container">
    <form method="post" action="source/sess.php">
        <div id="div_login">
            <div>
            <input type="text" class="textbox" id="username" onkeypress = "return Disable_Space();" name="username" placeholder="Username" required/>
            </div>
            <div>
                <input type="password" class="textbox" id="password" onkeypress = "return Disable_Space();" name="password" placeholder="Password" required/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script src="js/scripts.js"></script>
</body>
</html>