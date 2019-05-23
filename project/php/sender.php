<?php
	session_start();
	if($_SESSION["user"] == ""){
        echo '<h1>You must be logged in. </h1><br><a href="../html/login.html">LogIn</a>';
    }
    else{
    include 'functions.php';
    $recp = $_POST["recipient"];
    $amt = $_POST["amountToSend"];

        if (islegit($recp) && islegit($amt)) {
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
                //here good
                 
                $sql = "SELECT username FROM accounts WHERE username = '$recp'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $sql = "SELECT coins FROM accounts WHERE username = '$user'";
                    $result =  $conn->query($sql);
					
					if(!$result) {
						echo 'Could not run query: ' . mysql_error();
						exit;
					}
                    $row=$result->fetch_assoc();
                    $sendbank = (int) $row['coins'];
                  
                  
                    $total = $sendbank - $amt;
                    if ($total >= 0) { 
                    
                    $sql = "UPDATE accounts SET coins =  $total WHERE username = '$user' ";
                    $conn->query($sql);

                    
                    $sql = "SELECT coins FROM accounts WHERE username = '$recp'";
                    $result =  $conn->query($sql);
					
					if(!$result) {
						echo 'Could not run query: ' . mysql_error();
						exit;
					}
                    $row=$result->fetch_assoc();
                    $recpbank = (int) $row['coins'];

                    $total = $recpbank + $amt;
                    $sql = "UPDATE accounts SET coins =  $total WHERE username = '$recp' ";
                    $conn->query($sql);
       
                    $sql = " INSERT INTO transactions(id, sender, receiver, amount) VALUES (DEFAULT, '$user', '$recp', $amt)";
                    $conn->query($sql);
                    echo '<p>Transaction completed.</p><a href="../html/send.html">Click to return to Send page.</a>';

                                       
                } else {
                    echo '<p>You do not have enough coins to send.</p><a href="../html/send.html">Click to return to Send page.</a>';
                }
            } 
             
            $conn->close();                     
            }
        }
    } else {
        //echo 'Account not entered. Please do not include slashes and html tags in username.';
        header('Location: ../html/rejected.html');
    }
    }    
        



?>



