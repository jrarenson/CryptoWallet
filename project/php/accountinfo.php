<?php
 session_start();
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
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
    
            $db_selected = mysqli_select_db($conn, 'kiye0230');
            if (!$db_selected) {
                die ('Can\'t use DB : ' . mysql_error());
            } else{
                
                $sql = "SELECT coins FROM accounts WHERE username = '$user'";
                $result = $conn->query($sql);
                //echo $result;
                if ($result->num_rows > 0) {
                    $result = $result->fetch_assoc();
                    echo '<h1>', $_SESSION["user"], '\'s balance is: ', $result["coins"], ' QCoins</h1>';
                } else {
                    echo "Error";
                }
            }
        }
        $conn->close();
    }
?>