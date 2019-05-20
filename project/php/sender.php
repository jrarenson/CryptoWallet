<?php
	session_start();

    include 'functions.php';
    $recp = $_POST["recipient"];
    $amt = $_POST["amountToSend"];

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
                //check
                if ($result->num_rows > 0) {
                    $sql = "SELECT coins FROM accounts WHERE username = '$user'";
                    $result =  $conn->query($sql);
					
					if(!$result) { 
						echo 'Could not run query: ' . mysql_error();
						exit;
					}
					
					$row = $result->fetch_assoc();
					$sendbank = (int) $row['coins'];
					
                    if ($amt > $sendbank) {
                        echo 'Too much man u cant do that';
                    } else {
                        $sql = "UPDATE accounts SET coins = " . $sendbank - $amt . " WHERE username = '$user'";
                        $conn->query($sql);
						
                        $sql = "SELECT coins FROM accounts WHERE username = '$recp'";
                        $result = $conn->query($sql);
						
						if(!$result) {
							echo 'Could not run query: ' . mysql_error();
							exit;
						}
						
						$row = $result->fetch_assoc();
						$recpbank = (int) $row['coins'];
						
                        $sql = "UPDATE accounts SET coins = " . $recpbank + $amt . " WHERE username = '$recp'";
                        $conn->query($sql);
                    }                          
                }
                echo 'Transaction completed';
            //here good                    
            }
        }
        $conn->close();



?>