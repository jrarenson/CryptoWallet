<?php 
session_start();
      if($_SESSION["loggedin"] == 1){
        echo '<a class="btn btn-primary" href="../html/buysell.html"><h3>Buy/Sell</h3></a>';
        echo '<a class="btn btn-primary" href="../html/send.html"><h3>Send</h3></a>';
        echo '<a class="btn btn-primary" href="../php/graphs.php"><h3>Graphs</h3></a>'; 
        echo '<a class="btn btn-primary" href="../html/myAccount.html"><h3>My Account</h3></a>';
        echo '<a class="btn btn-primary" href="../php/logout.php"><h3>Sign Out</h3></a>';
        echo 'Logged in as: ', $_SESSION["user"];
      }
      else{
        echo '<a class="btn btn-primary" href="../html/login.html"><h3>Login</h3></a>';
        echo '<a class="btn btn-primary" href="signup.html"><h3>SignUp</h3></a>';
      }
    ?>