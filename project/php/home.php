<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
  <title>QCoin</title>
</head>
<body>
  <div class="container">
    <?php 
      if($_SESSION["loggedin"] == 1){
        echo '<a class="btn btn-primary notComplete" href="buy.php"><h3>Buy</h3></a>';
        echo '<a class="btn btn-primary notComplete" href="sell.php"><h3>Sell</h3></a>';
        echo '<a class="btn btn-primary notComplete" href="send.php"><h3>Send</h3></a>';
        echo '<a class="btn btn-primary notComplete" href="graphs.php"><h3>Graphs</h3></a>'; 
        echo '<a class="btn btn-primary" href="myAccount.php"><h3>My Account</h3></a>';
        echo '<a class="btn btn-primary" href="logout.php"><h3>Sign Out</h3></a>';
        echo 'Logged in as: ', $_SESSION["user"];
      }
      else{
        echo '<a class="btn btn-primary" href="../html/login.html"><h3>Login</h3></a>';
        echo '<a class="btn btn-primary" href="../php/signup.php"><h3>SignUp</h3></a>';
      }
    ?>
  </div>
  <div class="container">
    <div class="jumbotron">
      <h1 id="clock">
        <span id="logo"><img src="../img/logo.png" height="200" width="200"></span>
      </h1> 
    </div>
    <p class="centered">Q-Coin Hub</p> 
    <p></p>
  </div>

</body>
</html>