<?php
	session_start();
	if($_SESSION["user"] == ""){
        echo '<h1>You must be logged in. </h1><br><a href="../html/login.html">LogIn</a>';
    }
    else{

        $recp = $_POST["plan"];
        
        $user = $_SESSION["user"];
        $servername = "mars.cs.qc.cuny.edu";
        $username = "kiye0230";
        $password = "23550230";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $username);

        // Check connection
        if (!$conn->connect_error) {
            $sql = "UPDATE accounts SET plan =  $recp WHERE username = '$user'";
            if($conn->query($sql) === TRUE){
                echo '<div class="container"> Youre plan has been updated  <br><br> <a href="../html/home.html" class="btn btn-primary">Return Home</a>';
            }
            else {
                echo '<div class="container"> Failure <br><br> <a href="../html/plans.html" class="btn btn-primary">Try Again</a>';               
            }
        }
        $conn->close();  
    }
?>
