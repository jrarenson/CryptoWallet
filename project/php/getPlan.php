<?php
	session_start();
	if($_SESSION["user"] == ""){
        echo '<h1>You must be logged in. </h1><br><a href="../html/login.html">LogIn</a>';
    }
    else{    
        $user = $_SESSION["user"];
        $servername = "mars.cs.qc.cuny.edu";
        $username = "kiye0230";
        $password = "23550230";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $username);

        // Check connection
        if (!$conn->connect_error) {
            $sql = "SELECT plan FROM accounts WHERE username = '$user'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row=$result->fetch_assoc();
                echo $row["plan"];
            } 
             
            $conn->close();                     
            }
    }
?>